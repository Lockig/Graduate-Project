void displayFingerprintID() {
  if (FingerID > 0) {
    Serial.println("FingerID:" + String(FingerID));
    sendFingerprintID(FingerID);
  } else if (FingerID == 0) {
    Serial.println(".");
  } else if (FingerID == -1) {
    Serial.println(".");
  } else if (FingerID == -2) {
    Serial.println(".");
  } else {
    Serial.println(".");
  }
}
