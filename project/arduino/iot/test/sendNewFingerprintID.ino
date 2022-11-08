
//send fingerprintID to server
void sendNewFingerprintID(int finger) {
  HTTPClient http;
  postData = "newFingerID=" + String(finger);
  Serial.println("FingerID=" + String(finger));
  http.begin(wifi, link);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(postData);
  String payload = http.getString();
  Serial.println(httpCode);
  Serial.print(payload);
  http.end();
}
