void loop() {

  //check if there's a connection to WiFi or not
  if(WiFi.status() != WL_CONNECTED){
    connectToWiFi();
  }
  //---------------------------------------------
  //If there no fingerprint has been scanned return -1 or -2 if there an error or 0 if there nothing, The ID start form 1 to 127
  FingerID = getFingerprintID();  // Get the Fingerprint ID from the Scanner
  delay(50);            //don't need to run this at full speed.

  //---------------------------------------------

  DisplayFingerprintID();

  //---------------------------------------------

  ChecktoAddID();

  //---------------------------------------------

  ChecktoDeleteID();

  //---------------------------------------------
}
