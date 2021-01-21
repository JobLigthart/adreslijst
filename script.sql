
CREATE DATABASE adreslijst;

USE adreslijst;

CREATE TABLE adres (
    voornaam VARCHAR(50),
    achternaam VARCHAR(50),
    adres VARCHAR(50),
    huisnummer VARCHAR(10),
    woonplaats VARCHAR(50),
    postcode VARCHAR(6)      
)

ALTER TABLE adres ADD adresid INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

