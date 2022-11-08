void checkEnrollNewFingerprint() {
  Serial.println();
  Serial.println("vào hàm checkEnrollNewFingerprint");
  http.begin(wifi, link);
  postData = "check=enroll";
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  Serial.print("[HTTP] POST...\n");
  int httpCode = http.POST(postData);
  Serial.println(httpCode);
  String payload = http.getString();
  Serial.println(payload);
  if (payload.substring(0, 8) == "register") {
    display.clearDisplay();
    display.setTextSize(1);
    display.println("Waiting to register new fingerprint...");
    display.display();
    Serial.println("dang ky van tay moi");
    String new_id = payload.substring(8, 11);
    id = new_id.toInt();
    Serial.println("user_id:" + String(id));
    Serial.println("FingerID trước khi gán:" + String(FingerID));
    FingerID = enrollNewFingerprint();
    Serial.println("FingerID sau khi gán:"+ String(FingerID));
    Serial.println("FingerID=" + String(FingerID));
    delay(100);
    Serial.println("Chuẩn bị vào hàm sendNewFingerprintID()");
    sendNewFingerprintID(id);
    Serial.println("Đã gửi vân tay");
  }
  http.end();
}
