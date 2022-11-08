//connnect to wifi
void connectToWifi()
{
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  Serial.println();
  Serial.println("=============================================");
  Serial.print("Connecting to ");
  Serial.print(ssid);
  Serial.println();

  WiFi.begin(ssid, password);

  display.clearDisplay();
  display.setTextSize(1);             // Normal 1:1 pixel scale
  display.setTextColor(WHITE);        // Draw white text
  display.setCursor(0, 0);             // Start at top-left corner
  display.print(F("Connecting to \n"));
  display.setCursor(0, 50);
  display.setTextSize(1);
  display.print(ssid);
  display.drawBitmap( 73, 10, Wifi_start_bits, Wifi_start_width, Wifi_start_height, WHITE);
  display.display();

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Connecting ...");
  }
  Serial.println(" ");
  Serial.print("Connected to:");
  Serial.print(ssid);
  Serial.println("=============================================");

  display.clearDisplay();
  display.setTextSize(1);             // Normal 1:1 pixel scale
  display.setTextColor(WHITE);        // Draw white text
  display.setCursor(8, 0);             // Start at top-left corner
  display.print(F("Connected \n"));
  display.drawBitmap( 33, 15, Wifi_connected_bits, Wifi_connected_width, Wifi_connected_height, WHITE);

  display.print("IP address: ");
  display.println(WiFi.localIP()); //IP assigned for ESP
  display.display();
}
