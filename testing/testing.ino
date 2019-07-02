#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <LiquidCrystal.h>
#include <Keypad.h>


LiquidCrystal lcd(A5,A4,A3,A2,A1,A0);

const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns
char keys[ROWS][COLS] = {
        {'1','2','3','A'},
        {'4','5','6','B'},
        {'7','8','9','C'},
        {'*','0','#','D'}
        };

byte rowPins[ROWS] = {4,5,6,7}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {8,9,10,11}; //connect to the column pinouts of the keypad
Keypad customKeypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
byte ledPin = 13; 

uint8_t getFingerprintEnroll(int id);


// pin #2 is IN from sensor (GREEN wire)
// pin #3 is OUT from arduino  (WHITE wire)
SoftwareSerial mySerial(2,3);

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

void setup()  
{
  Serial.begin(9600);
  pinMode(A5,OUTPUT);
  pinMode(A4,OUTPUT);
  pinMode(A3,OUTPUT);
  pinMode(A2,OUTPUT);
  pinMode(A1,OUTPUT);
  pinMode(A0,OUTPUT);

  lcd.begin(16,2);
  lcd.print("Fingerprint Test");
  delay(1000);
  lcd.clear();
  //Serial.println("fingertest");

  // set the data rate for the sensor serial port
  finger.begin(57600);
  
  if (finger.verifyPassword()) {
    //Serial.println("Found fingerprint sensor!");
    lcd.print("Foundfingerprint");
    lcd.setCursor(0, 1);
    lcd.print("sensor");
    delay(6000);
   lcd.clear();
  } else {
    //Serial.println("Did not find fingerprint sensor :(");
    lcd.print("Did not find");
    lcd.setCursor(0, 1);
    lcd.print("sensor");
    delay(6000);
    lcd.clear();
    while (1);
  }
}

void loop()                     // run over and over again
{
  //Serial.println("Type in the ID # you want to save this finger as...");
  lcd.print("Type the ID #");
   delay(4000);
   lcd.clear();
  
  int id = 0;
  while (true) {
    //while (! Serial.available());
    //char c = Serial.read();
    char c = customKeypad.getKey();


    if (! isdigit(c)) break;
    id *= 10;
    id += c - '0';
  }
  //Serial.print("Enrolling ID #");
  lcd.print("Enrolling ID");
   delay(3000);
  lcd.clear();
  //Serial.println(id);
  lcd.setCursor(0,1);
  lcd.print(id);
  
  while (!  getFingerprintEnroll(id) );
}

uint8_t getFingerprintEnroll(int id) {
  uint8_t p = -1;
  //Serial.println("Waiting for valid finger to enroll");
  lcd.print("Waiting for");
  lcd.setCursor(0, 1);
  lcd.print(" valid fingerprint");
  delay(2000);
  lcd.clear();
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      lcd.print("Image taken");
      
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println(".");
      lcd.print(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      lcd.print("Communication ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    case FINGERPRINT_IMAGEFAIL:
      //Serial.println("Imaging error");
      lcd.print("Imaging ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    default:
      //Serial.println("Unknown error");
      lcd.print("Unknown ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      lcd.print("Image covertd");
      delay(2000);
      lcd.clear();
      break;
    case FINGERPRINT_IMAGEMESS:
      //Serial.println("Image too messy");
      lcd.print("Image too");
      lcd.setCursor(0, 1);
      lcd.print(" messy");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      lcd.print("Communication ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      lcd.print("couldnt find");
      lcd.setCursor(0, 1);
      lcd.print("fingerprint featr");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      //Serial.println("Could not find fingerprint features");
      return p;
    default:
      //Serial.println("Unknown error");
      lcd.print("Unknown");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      return p;
  }
  
  //Serial.println("Remove finger");
  lcd.print("Remove finger");
  delay(2000);
  lcd.clear();
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }

  p = -1;
  //Serial.println("Place same finger again");
  lcd.clear();
  lcd.print("Place the same finger again");
  lcd.print("Place same");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      lcd.print("Image ");
      lcd.setCursor(0, 1);
      lcd.print(" taken");
      delay(2000);
      lcd.clear();
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.print(".");
      lcd.print(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      lcd.print("Communication ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    case FINGERPRINT_IMAGEFAIL:
      //Serial.println("Imaging error");
      lcd.print("Imaging");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    default:
      //Serial.println("Unknown error");
      lcd.print("Unknown");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      lcd.print("Image");
      lcd.setCursor(0, 1);
      lcd.print(" ");
      delay(2000);
      lcd.clear();
      break;
    case FINGERPRINT_IMAGEMESS:
      //Serial.println("Image too messy");
      lcd.print("Image too");
      lcd.setCursor(0, 1);
      lcd.print("messy");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      lcd.print("Communication ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      lcd.print("Couldnt find");
      lcd.setCursor(0, 1);
      lcd.print("fingrprint feat");
      delay(2000);
      lcd.clear();
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      //Serial.println("Unknown error");
      lcd.print("Unknown");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
      return p;
  }
  
  
  // OK converted!
  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    //Serial.println("Prints matched!");
    lcd.clear();
    lcd.print("Prints matched");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    lcd.print("Communication ");
    lcd.setCursor(0, 1);
    lcd.print(" error");
    delay(2000);
    lcd.clear();
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    //Serial.println("Fingerprints did not match");
    lcd.print("Prints did");
    lcd.setCursor(0, 1);
    lcd.print("not match");
    return p;
  } else {
    //Serial.println("Unknown error");
    lcd.print("Unknown");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
    return p;
  }   
  
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    //Serial.println("Stored!");
    lcd.clear();
    lcd.print("Prints Stored");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    lcd.print("Communication ");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    //Serial.println("Could not store in that location");
    lcd.print("Couldnt store");
      lcd.setCursor(0, 1);
      lcd.print("in locatn");
      delay(2000);
      lcd.clear();
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    //Serial.println("Error writing to flash");
    lcd.print("Error wrting");
      lcd.setCursor(0, 1);
      lcd.print("to flash");
      delay(2000);
      lcd.clear();
    return p;
  } else {
    //Serial.println("Unknown error");
    lcd.print("Unknown");
      lcd.setCursor(0, 1);
      lcd.print(" error");
      delay(2000);
      lcd.clear();
    return p;
  }   
}
 
