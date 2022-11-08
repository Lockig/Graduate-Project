
void setup()
{
  Serial.begin(115200);



  //-----------------------------initiate OLED display------------------
  // SSD1306_SWITCHCAPVCC = generate display voltage from 3.3V internally
  if (!display.begin(SSD1306_SWITCHCAPVCC, 0x3C)) { // Address 0x3D for 128x64
    Serial.println(F("SSD1306 allocation failed"));
    for (;;); // Don't proceed, loop forever
  }


  //------------------------------------------------
  //show adafruit logo
  display.display();
  delay(1000);

  //------------------------------------------------
  
  connectToWifi();

  //------------------------------------------------

  // set the data rate for the sensor serial port
  finger.begin(57600);
  Serial.println("AdaFruit finger detect test");
  if (finger.verifyPassword()) {
    Serial.println("Found sensor! :)");
    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(SSD1306_WHITE);        // Draw white text
    display.setCursor(0, 0);            // Start at top-left corner
    display.println(F("Found fingerprint sensor!"));
    display.display();
    delay(1000);

  } else {
    Serial.println("Did not find sensor! :(");
    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(SSD1306_WHITE);        // Draw white text
    display.setCursor(0, 0);            // Start at top-left corner
    display.println(F("Did not find fingerprint sensor!"));
    display.display();
    delay(2000);
    while (1) {
      delay(1);
    }
  }
  finger.getTemplateCount();

  Serial.print("Sensor contains "); Serial.print(finger.templateCount); Serial.println(" templates");
  Serial.println("Waiting for valid finger...");
}
