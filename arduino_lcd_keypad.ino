#include <Keypad.h>
#include <LiquidCrystal.h>

LiquidCrystal lcd(A5,A4,A3,A2,A1,A0);
const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns
char keys[ROWS][COLS] = {
        {'1','2','3','A'},
        {'4','5','6','B'},
        {'7','8','9','C'},
        {'*','0','#','D'}
        };
byte rowPins[ROWS] = {2,3,4,5}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {6,7,8,9}; //connect to the column pinouts of the keypad

Keypad customKeypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
byte ledPin = 13; 

void setup() {
  Serial.begin(9600);
  pinMode(A5,OUTPUT);
  pinMode(A4,OUTPUT);
  pinMode(A3,OUTPUT);
  pinMode(A2,OUTPUT);
  pinMode(A1,OUTPUT);
  pinMode(A0,OUTPUT);
  lcd.begin(16, 2);//initializing LCD
  lcd.print("Hakuna Matata");//message on lcd 

  
  // put your setup code here, to run once:

}

void loop() {
  // put your main code here, to run repeatedly:
lcd.setCursor (0,1);
char key = customKeypad.getKey(); //storing pressed key value in a char

  if (key != NO_KEY)

{
      lcd.print(key); //showing pressed character on LCD
      Serial.println(key);
  }

}
