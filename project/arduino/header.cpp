
//thêm thư viện adafruit io bus nx
#include <WiFiClient.h>
#include <SPI.h>
#include <Wire.h>
#include <ESP8266WiFi.h>
#include <SoftwareSerial.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <Adafruit_Fingerprint.h>

#include <hex_code.h>
//************************************************************************
//Fingerprint scanner Pins
#define Finger_Rx 14 //D5
#define Finger_Tx 12 //D6
// Declaration for SSD1306 display connected using software I2C
#define SCREEN_WIDTH 128 // OLED display width, in pixels
#define SCREEN_HEIGHT 64 // OLED display height, in pixels
#define OLED_RESET     0 // Reset pin # (or -1 if sharing Arduino reset pin)
Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, OLED_RESET);
//************************************************************************
SoftwareSerial mySerial(Finger_Rx, Finger_Tx);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
//************************************************************************
/* Set these to your desired credentials. */
const char *ssid = "SSID";  //ENTER YOUR WIFI SETTINGS
const char *password = "password";
//************************************************************************
String postData ; // post array that will be send to the website
WiFiClient wifi;
String link = "http://YourComputerIP/biometricattendance/getdata.php"; //computer IP or the server domain
int FingerID = 0;     // The Fingerprint ID from the scanner
uint8_t id;
