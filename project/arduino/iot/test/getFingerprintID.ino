
//get fingerprint from sensor
uint8_t getFingerprintID()
{
  //get image from fingerprint
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.print(".");
      return 0;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.print(".");
      return -2;
    case FINGERPRINT_IMAGEFAIL:
      Serial.print(".");
      return -2;
    default:
      Serial.print(".");
      return -2;
  }

  // OK success!
  // convert image to feature template
  p = finger.image2Tz();
  switch (p)
  {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.print(".");
      return -1;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println(".");
      return -2;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println(".");
      return -2;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println(".");
      return -2;
    default:
      Serial.println(".");
      return -2;
  }

  //search template in device
  p = finger.fingerSearch();
  if (p == FINGERPRINT_OK)
  {
    display.clearDisplay();
    display.setCursor(0, 0);
    display.setTextSize(1);
    display.println(F("Found a print match"));
    display.display();
    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR)
  {
    display.clearDisplay();
    display.setCursor(0, 0);
    display.setTextSize(1);
    display.println(F("Communication error"));
    display.display();
    Serial.println("Communication error!");
    Serial.println("Communication error");
    return -2;
  } else if (p == FINGERPRINT_NOTFOUND)
  {
    Serial.println("Did not find a match");
    display.clearDisplay();
    display.setCursor(0, 0);
    display.setTextSize(1);
    display.println(F("Did not find a match"));
    display.display();
    return -1;
  } else
  {
    display.clearDisplay();
    display.setCursor(0, 0);
    display.setTextSize(1);
    display.println(F("Error"));
    display.display();
    Serial.println("Unknown error");
    return -2;
  }
  Serial.print("Found ID #"); Serial.print(finger.fingerID);
  Serial.print(" with confidence of "); Serial.println(finger.confidence);
  return finger.fingerID;
}
