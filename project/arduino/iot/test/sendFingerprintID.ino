
//send fingerprintID to server
void sendFingerprintID(int finger) {
  Serial.println("Vào hàm sendFingerprintID : finger = ");
  Serial.print(finger);
  HTTPClient http;
  display.clearDisplay();
  display.setCursor(0,0);
  display.setTextSize(1);
  display.println("Checking!!!!");
  display.display();
  postData = "fingerID=" + String(finger);
  http.begin(wifi, link);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(postData);
  String payload = http.getString();
   Serial.print(payload);
  display.clearDisplay();
  display.setCursor(0,0);
  display.setTextSize(1);
  display.print(payload);
  display.display();
  display.clearDisplay();
  postData = "";
  http.end();
}
