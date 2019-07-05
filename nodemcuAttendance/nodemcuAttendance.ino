#include <LiquidCrystal.h>
#include <EEPROM.h>
#include <Adafruit_Fingerprint.h>

//int led = 13;
int val = 0;
int validID = 0;
int i;

bool limit[10];

const int rs = D0, en = D1, d4 = D2, d5 = D3, d6 = D4, d7 = D5;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

SoftwareSerial mySerial(D8, D7);

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

void setup()
{
  for (i = 0 ; i <= 10 ; i++)
  {
    limit[i] = true;
  }
  lcd.begin(16, 2);
  Serial.begin(9600);
  Serial.println("\n\nDigital Attendence");
//  lcd.setCursor (0,1);
  lcd.print("Digital Attendance");
  


  finger.begin(57600);
  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
    lcd.print("Found fingerprint sensor!");
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    lcd.print("Did not find fingerprint sensor :(");
    while (1) {
      delay(1);
    }
  }
  finger.getTemplateCount();
  Serial.print("Sensor contains "); Serial.print(finger.templateCount); Serial.println(" templates");
  Serial.println("Waiting for valid finger...");
  lcd.print("Waiting for valid finger...");
  delay(1000);
  lcd.clear();
  lcd.print("Place Finger...");
}

void loop()
{
  validID = getFingerprintIDez();

  delay(50);

  for (i = 0; i <= 10; i++)
  {
    if (validID == i)
    {
      if (limit[i] == true)
      {
        val = EEPROM.read(validID);
        val++;
       // EEPROM.update(validID, val);
        Serial.print("Student ID #"); Serial.print(validID); Serial.print("\n");
        Serial.print("Your Attendance is "); Serial.print(val); Serial.print("\n\n");
        lcd.clear();
        lcd.print("Student ID #"); lcd.setCursor(12, 0); lcd.print(validID);
        lcd.setCursor(0, 1); lcd.print("Attendance is "); lcd.setCursor(14, 1); lcd.print(val);
        delay(3000);
        lcd.clear();
        val = 0;
        limit[i] = false;
      }
      else
      {
        Serial.print("Student ID #"); Serial.print(validID); Serial.print("\n");
        Serial.print("Your Attendance is Already Marked"); Serial.print("\n\n");
        lcd.clear();
        lcd.print("Student ID #"); lcd.setCursor(12, 0); lcd.print(validID);
        lcd.setCursor(0, 1); lcd.print("Already marked");
        delay(3000);
        lcd.clear();
      }
    }
  }
  lcd.clear();
  lcd.print("Place Finger...");
  delay(50);
}

uint8_t getFingerprintID() 
{
  uint8_t p = finger.getImage();
  switch (p) 
  {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  p = finger.image2Tz();
  switch (p) 
  {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  p = finger.fingerFastSearch();
    if (p == FINGERPRINT_OK) 
    {
      Serial.println("Found a print match!");
    } 
    else if (p == FINGERPRINT_PACKETRECIEVEERR) 
    {
      Serial.println("Communication error");
      return p;
    } 
    else if (p == FINGERPRINT_NOTFOUND) 
    {
      Serial.println("Did not find a match");
      return p;
    } 
    else
    {
      Serial.println("Unknown error");
      return p;
    }
  
    Serial.print("Found ID #"); Serial.print(finger.fingerID);
    Serial.print(" with confidence of "); Serial.println(finger.confidence);
  
    return finger.fingerID;
  }

    int getFingerprintIDez() 
    {
      uint8_t p = finger.getImage();
      if (p != FINGERPRINT_OK)  return -1;
    
      p = finger.image2Tz();
      if (p != FINGERPRINT_OK)  return -1;
    
      p = finger.fingerFastSearch();
      if (p != FINGERPRINT_OK)  return -1;
    
     
      Serial.print("Found ID #"); Serial.print(finger.fingerID);
      Serial.print(" with confidence of "); Serial.println(finger.confidence);
      
      return finger.fingerID;
    }







    //id10093143_biometricattendance
