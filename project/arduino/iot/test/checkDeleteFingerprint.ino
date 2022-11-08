void checkDeleteFingerprint() {
  http.begin(wifi, link);
  postData = "check=delete";

  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(postData);

  Serial.println(httpCode);
  String payload = http.getString();
  Serial.println(payload);

  if (payload.substring(0, 7) == "delete") {
    Serial.println("xoa van tay");
    String del_id = payload.substring(8, 11);
    Serial.println("user_id:" + String(id));
    deleteFingerprintID(del_id.toInt());
  }
  http.end();
}
