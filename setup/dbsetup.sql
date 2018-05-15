DROP DATABASE IF EXISTS shop;

CREATE DATABASE shop;

USE shop;

CREATE TABLE inventory (
itemid INT(7) ZEROFILL NOT NULL AUTO_INCREMENT PRIMARY KEY,
itemname VARCHAR(256) NOT NULL,
itemprice DECIMAL(6,2) NOT NULL,
cat VARCHAR(256) NOT NULL,
subcat VARCHAR(256),
description VARCHAR(2083)
);

CREATE TABLE img (
itemid INT(7) ZEROFILL NOT NULL,
filename VARCHAR(256) NOT NULL,
uploaded TIMESTAMP NOT NULL,
FOREIGN KEY (itemid) REFERENCES inventory(itemid)
);

CREATE TABLE usr (
uid INT(8) ZEROFILL NOT NULL AUTO_INCREMENT PRIMARY KEY,
uname VARCHAR(30) NOT NULL,
pwd CHAR(60),
access INT(1),
email VARCHAR(256),
UNIQUE (uname)
);

CREATE TABLE address (
addressid INT(8) ZEROFILL NOT NULL AUTO_INCREMENT PRIMARY KEY,
uid INT(8) ZEROFILL NOT NULL,
address1 VARCHAR(40) NOT NULL,
address2 VARCHAR(27),
city VARCHAR(27) NOT NULL,
state VARCHAR(27) NOT NULL,
country VARCHAR(84) NOT NULL,
type VARCHAR(27) NOT NULL,
FOREIGN KEY (uid) REFERENCES usr(uid)
);

CREATE TABLE stores (
storeid INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
storename VARCHAR(40) NOT NULL,
address1 VARCHAR(40) NOT NULL,
address2 VARCHAR(27),
city VARCHAR(27) NOT NULL,
state VARCHAR(27) NOT NULL,
zip VARCHAR(10) NOT NULL,
CONSTRAINT UC_stores UNIQUE (storeid, storename)
);

CREATE TABLE storehours (
storeid INT(4) UNIQUE PRIMARY KEY,
day INT(1) NOT NULL,
open TIME,
close TIME	
);

CREATE TABLE stock (
storeid INT(4) NOT NULL,
itemid INT(7) ZEROFILL NOT NULL,
location ENUM('FLOOR', 'BACK'),
amount INT(5),
FOREIGN KEY (storeid) REFERENCES stores(storeid),
FOREIGN KEY (itemid) REFERENCES inventory(itemid)
);

CREATE TABLE orders (
orderid INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
uid INT(8) ZEROFILL,
addressid INT(8) ZEROFILL NOT NULL,
paymentid VARCHAR(8) NOT NULL,
FOREIGN KEY (uid) REFERENCES usr(uid),
FOREIGN KEY (addressid) REFERENCES address(addressid)
);

CREATE TABLE adminsettings (
paramtype VARCHAR(27) NOT NULL,
param VARCHAR(40) NOT NULL,
setting VARCHAR(40)
);

CREATE VIEW online_stock AS
	SELECT b.*, 
	SUM(a.amount) AS 'amount' 
	FROM stock a 
	JOIN inventory b 
	ON a.itemid = b.itemid 
	AND a.location = 'BACK' 
	GROUP BY itemid;

INSERT INTO inventory VALUES
(NULL, "Fancy Pillow", 19.95, "Home", "Living Room", "A fancy pillow with literally all the frills!"),
(NULL, "Distressed Rug", 99.95, "Home", "Living Room", "Chic rug with a touch of grime."),
(NULL, "Fuzzy Blanket", 29.95, "Home", "Living Room", "Rated coziest blanket by BlanketWatch!"),
(NULL, "Reconstructed Plate", 19.95, "Home", "Kitchen", "This plate was handmade, broken, then reassembled for your aesthetic enjoyment."),
(NULL, "Chicken Holder", 5.95, "Home", "Kitchen", "This plastic vessel is expertly engineered to contain chicken."),
(NULL, "Gold Mug", 9.95, "Home", "Kitchen", "This tiny golden mug will make all your drinks taste luxurious."),
(NULL, "Fake Spectacles", 39.95, "Clothing", "Accessories", "Non-prescription glasses for the distinguished gentleperson."),
(NULL, "Old Belt", 19.95, "Clothing", "Accessories", "A decidedly old-looking belt."),
(NULL, "Pirate Hat", 49.95, "Clothing", "Accessories", "Authentic pirate captain's hat with genuine feather and realistic swashbuckle. Parrot not included."),
(NULL, "Gross Jeans", 149.95, "Clothing", "Pants", "Just a nasty pair of torn up jeans. A best-seller!"),
(NULL, "New Jeans", 49.95, "Clothing", "Pants", "Some assembly required."),
(NULL, "Khaki Shorts", 39.95, "Clothing", "Pants", "Great for expeditions.");

INSERT INTO img VALUES
(2, 'dirtyrug.jpg', CURRENT_TIMESTAMP),
(3, 'fuzzyblanket.jpg', CURRENT_TIMESTAMP),
(4, 'plate.jpg', CURRENT_TIMESTAMP),
(5, 'holder.jpg', CURRENT_TIMESTAMP),
(6, 'goldmug.jpg', CURRENT_TIMESTAMP),
(7, 'specs.jpg', CURRENT_TIMESTAMP),
(8, 'belt1.jpg', CURRENT_TIMESTAMP),
(8, 'belt2.jpg', CURRENT_TIMESTAMP),
(9, 'pirate.jpg', CURRENT_TIMESTAMP),
(10, 'grossjeans1.jpg', CURRENT_TIMESTAMP),
(10, 'grossjeans2.jpg', CURRENT_TIMESTAMP),
(11, 'newjeans1.jpg', CURRENT_TIMESTAMP),
(11, 'newjeans2.jpg', CURRENT_TIMESTAMP),
(12, 'shorts1.jpg', CURRENT_TIMESTAMP),
(12, 'shorts2.jpg', CURRENT_TIMESTAMP);

INSERT INTO usr VALUES
(NULL, 'admin', 'NWRMMjZtZXozdkxUNFVqQ25lZC9adz09', 3, NULL),
(NULL, 'employee', 'YW5MRlM1ZStEc05WNWNFRjdTN3BMUT09', 2, NULL),
(NULL, 'customer', 'RDJsREg2YjhmdkdHMWZlZDl3aGpTQT09', 1, NULL);

INSERT INTO address VALUES 
(NULL, 1, '123 Admin Street', NULL, 'San Francisco', 'CA', 'USA', '94109');

INSERT INTO stores VALUES 
(NULL, 'location1', '123 Test Street', NULL, 'San Francisco', 'CA', '94109'),
(NULL, 'location2', '22 Hypothetical Place', 'Suite 800', 'San Francisco', 'CA', '94109');

INSERT INTO stock VALUES
(1, 4, 'BACK', 10),
(1, 2, 'BACK', 5),
(1, 3, 'FLOOR', 6),
(1, 6, 'BACK', 3),
(1, 10, 'FLOOR', 20),
(2, 7, 'BACK', 15),
(2, 2, 'FLOOR', 6),
(2, 4, 'BACK', 10),
(2, 9, 'FLOOR', 3),
(2, 6, 'BACK', 1),
(2, 10, 'BACK', 6),
(2, 11, 'BACK', 8),
(2, 8, 'BACK', 4);

/*
--Subtract purchased amounts from stock location with highest quantity
UPDATE stock 
SET amount = (amount-@QNT),
	storeid=LAST_INSERT_ID(storeid)
WHERE itemid=@ID 
AND location = 'BACK' 
ORDER BY amount DESC
LIMIT 1;
SELECT LAST_INSERT_ID();

SELECT DISTINCT a.location, b.cat, b.subcat FROM stock a OUTER JOIN inventory b ON a.itemid = b.itemid;

source /srv/cs130b/working/setup/dbsetup.sql;
*/


