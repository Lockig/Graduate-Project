

//************************************************************************

//************Display the fingerprint ID state on the OLED*************
void DisplayFingerprintID(){
  //Fingerprint has been detected
  if (FingerID > 0){
    display.clearDisplay();
    display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
    display.display();

    SendFingerprintID( FingerID ); // Send the Fingerprint ID to the website.

  }
  //---------------------------------------------
  //No finger detected
  else if (FingerID == 0){
    display.clearDisplay();
    display.drawBitmap( 32, 0, FinPr_start_bits, FinPr_start_width, FinPr_start_height, WHITE);
    display.display();
  }
  //---------------------------------------------
  //Didn't find a match
  else if (FingerID == -1){
    display.clearDisplay();
    display.drawBitmap( 34, 0, FinPr_invalid_bits, FinPr_invalid_width, FinPr_invalid_height, WHITE);
    display.display();
  }
  //---------------------------------------------
  //Didn't find the scanner or there an error
  else if (FingerID == -2){
    display.clearDisplay();
    display.drawBitmap( 32, 0, FinPr_failed_bits, FinPr_failed_width, FinPr_failed_height, WHITE);
    display.display();
  }
}
//************send the fingerprint ID to the website*************
void SendFingerprintID( int finger ){

  HTTPClient http;    //Declare object of class HTTPClient
  //Post Data
  postData = "FingerID=" + String(finger); // Add the Fingerprint ID to the Post array in order to send it
  // Post methode

  http.begin(wifi, link); //initiate HTTP request, put your Website URL or Your Computer IP
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload
  Serial.println(postData);   //Post Data
  Serial.println(finger);     //Print fingerprint ID

  if (payload.substring(0, 5) == "login") {
    String user_name = payload.substring(5);
//  Serial.println(user_name);

    display.clearDisplay();
    display.setTextSize(2);             // Normal 2:2 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(15,0);             // Start at top-left corner
    display.print(F("Welcome"));
    display.setCursor(0,20);
    display.print(user_name);
    display.display();
  }
  else if (payload.substring(0, 6) == "logout") {
    String user_name = payload.substring(6);
//  Serial.println(user_name);

    display.clearDisplay();
    display.setTextSize(2);             // Normal 2:2 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(10,0);             // Start at top-left corner
    display.print(F("Good Bye"));
    display.setCursor(0,20);
    display.print(user_name);
    display.display();
  }
  delay(1000);

  postData = "";
  http.end();  //Close connection
}
//********************Get the Fingerprint ID******************
int getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return 0;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return -2;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return -2;
    default:
      Serial.println("Unknown error");
      return -2;
  }
  // OK success!
  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return -1;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return -2;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return -2;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return -2;
    default:
      Serial.println("Unknown error");
      return -2;
  }
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return -2;
  } else if (p == FINGERPRINT_NOTFOUND) {
    //Serial.println("Did not find a match");
    return -1;
  } else {
    //Serial.println("Unknown error");
    return -2;
  }
  // found a match!
  //Serial.print("Found ID #"); Serial.print(finger.fingerID);
  //Serial.print(" with confidence of "); Serial.println(finger.confidence);

  return finger.fingerID;
}
//******************Check if there a Fingerprint ID to delete******************
void ChecktoDeleteID(){

  HTTPClient http;    //Declare object of class HTTPClient
  //Post Data
  postData = "DeleteID=check"; // Add the Fingerprint ID to the Post array in order to send it
  // Post methode

  http.begin(wifi, link); //initiate HTTP request, put your Website URL or Your Computer IP
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  if (payload.substring(0, 6) == "del-id") {
    String del_id = payload.substring(6);
    Serial.println(del_id);
    deleteFingerprint( del_id.toInt() );
  }

  http.end();  //Close connection
}
//******************Delete Finpgerprint ID*****************
uint8_t deleteFingerprint( int id) {
  uint8_t p = -1;

  p = finger.deleteModel(id);

  if (p == FINGERPRINT_OK) {
    //Serial.println("Deleted!");
    display.clearDisplay();
    display.setTextSize(2);             // Normal 2:2 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0,0);             // Start at top-left corner
    display.print(F("Deleted!\n"));
    display.display();
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0,0);             // Start at top-left corner
    display.print(F("Communication error!\n"));
    display.display();
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    //Serial.println("Could not delete in that location");
    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0,0);             // Start at top-left corner
    display.print(F("Could not delete in that location!\n"));
    display.display();
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    //Serial.println("Error writing to flash");
    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0,0);             // Start at top-left corner
    display.print(F("Error writing to flash!\n"));
    display.display();
    return p;
  } else {
    //Serial.print("Unknown error: 0x"); Serial.println(p, HEX);
    display.clearDisplay();
    display.setTextSize(2);             // Normal 2:2 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0,0);             // Start at top-left corner
    display.print(F("Unknown error:\n"));
    display.display();
    return p;
  }
}
//******************Check if there a Fingerprint ID to add******************
void ChecktoAddID(){

  HTTPClient http;    //Declare object of class HTTPClient
  //Post Data
  postData = "Get_Fingerid=get_id"; // Add the Fingerprint ID to the Post array in order to send it
  // Post methode

  http.begin(wifi, link); //initiate HTTP request, put your Website URL or Your Computer IP
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  if (payload.substring(0, 6) == "add-id") {
    String add_id = payload.substring(6);
    Serial.println(add_id);
    id = add_id.toInt();
    getFingerprintEnroll();
  }
  http.end();  //Close connection
}
//******************Enroll a Finpgerprint ID*****************
uint8_t getFingerprintEnroll() {

  int p = -1;
  display.clearDisplay();
  display.drawBitmap( 34, 0, FinPr_scan_bits, FinPr_scan_width, FinPr_scan_height, WHITE);
  display.display();
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
      display.display();
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println(".");
      display.setTextSize(1);             // Normal 2:2 pixel scale
      display.setTextColor(WHITE);        // Draw white text
      display.setCursor(0,0);             // Start at top-left corner
      display.print(F("scanning"));
      display.display();
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_invalid_bits, FinPr_invalid_width, FinPr_invalid_height, WHITE);
      display.display();
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      break;
    default:
      Serial.println("Unknown error");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
      display.display();
      break;
    case FINGERPRINT_IMAGEMESS:
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_invalid_bits, FinPr_invalid_width, FinPr_invalid_height, WHITE);
      display.display();
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }
  display.clearDisplay();
  display.setTextSize(2);             // Normal 2:2 pixel scale
  display.setTextColor(WHITE);        // Draw white text
  display.setCursor(0,0);             // Start at top-left corner
  display.print(F("Remove"));
  display.setCursor(0,20);
  display.print(F("finger"));
  display.display();
  //Serial.println("Remove finger");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  Serial.print("ID "); Serial.println(id);
  p = -1;
  display.clearDisplay();
  display.drawBitmap( 34, 0, FinPr_scan_bits, FinPr_scan_width, FinPr_scan_height, WHITE);
  display.display();
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
      display.display();
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println(".");
      display.setTextSize(1);             // Normal 2:2 pixel scale
      display.setTextColor(WHITE);        // Draw white text
      display.setCursor(0,0);             // Start at top-left corner
      display.print(F("scanning"));
      display.display();
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      break;
    default:
      Serial.println("Unknown error");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      display.clearDisplay();
      display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
      display.display();
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  Serial.print("Creating model for #");  Serial.println(id);

  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    //Serial.println("Prints matched!");
    display.clearDisplay();
    display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
    display.display();
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    Serial.println("Fingerprints did not match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }

  Serial.print("ID "); Serial.println(id);
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    //Serial.println("Stored!");
    display.clearDisplay();
    display.drawBitmap( 34, 0, FinPr_valid_bits, FinPr_valid_width, FinPr_valid_height, WHITE);
    display.display();
    confirmAdding();
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Could not store in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Error writing to flash");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }
}
//******************Check if there a Fingerprint ID to add******************
void confirmAdding(){

  HTTPClient http;    //Declare object of class HTTPClient
  //Post Data
  postData = "confirm_id=" + String(id); // Add the Fingerprint ID to the Post array in order to send it
  // Post methode

  http.begin(wifi, link); //initiate HTTP request, put your Website URL or Your Computer IP
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  display.clearDisplay();
  display.setTextSize(1.5);             // Normal 1:1 pixel scale
  display.setTextColor(WHITE);        // Draw white text
  display.setCursor(0,0);             // Start at top-left corner
  display.print(payload);
  display.display();
  delay(1000);
  Serial.println(payload);

  http.end();  //Close connection
}

//********************connect to the WiFi******************
void connectToWiFi(){
    WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
    delay(1000);
    WiFi.mode(WIFI_STA);
    Serial.print("Connecting to ");
    Serial.println(ssid);
    WiFi.begin(ssid, password);

    display.clearDisplay();
    display.setTextSize(1);             // Normal 1:1 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(0, 0);             // Start at top-left corner
    display.print(F("Connecting to \n"));
    display.setCursor(0, 50);
    display.setTextSize(2);
    display.print(ssid);
    display.drawBitmap( 73, 10, Wifi_start_bits, Wifi_start_width, Wifi_start_height, WHITE);
    display.display();

    while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
    Serial.println("");
    Serial.println("Connected");

    display.clearDisplay();
    display.setTextSize(2);             // Normal 1:1 pixel scale
    display.setTextColor(WHITE);        // Draw white text
    display.setCursor(8, 0);             // Start at top-left corner
    display.print(F("Connected \n"));
    display.drawBitmap( 33, 15, Wifi_connected_bits, Wifi_connected_width, Wifi_connected_height, WHITE);
    display.display();

    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());  //IP address assigned to your ESP

}
//=======================================================================
