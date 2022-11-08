void loop()
{
  //check wifi connection
  if (WiFi.status() != WL_CONNECTED) {
    connectToWifi();
  }

  FingerID = getFingerprintID(); //get the fingerprint id from scanner
  delay(1000);
  Serial.println(FingerID);
  //
  displayFingerprintID();
  delay(500);
  //
  checkEnrollNewFingerprint();

  checkDeleteFingerprint();
  display.clearDisplay();
  display.setCursor(0, 0);
  display.println("Waiting for finger!");
  display.display();
}
