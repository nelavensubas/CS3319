USE assign2db;

-- ---------
-- Part 1 SQL Updates
SELECT * FROM hospital;
UPDATE hospital SET headdoc = "GD56", headdocstartdate = "2010-12-19" WHERE hoscode="BBC";
UPDATE hospital SET headdoc = "SE66", headdocstartdate = "2004-05-30" WHERE hoscode="ABC";
UPDATE hospital SET headdoc = "YT67", headdocstartdate = "2001-06-01" WHERE hoscode="DDE";
SELECT * FROM hospital;

-- ---------
-- Part 2 SQL Inserts
INSERT INTO doctor VALUES ("ZF52", "Lalo", "Salamanca", "1982-04-17", "1952-06-08", "ABC", "Surgeon");
INSERT INTO patient VALUES ("749114245", "Andy", "Serkis", "1964-04-20");
INSERT INTO looksafter VALUES ("ZF52", "749114245");
INSERT INTO hospital VALUES ("EFF", "North York", "Toronto", "ON", 1500, "ZF52", "2022-10-13");
SELECT * FROM doctor;
SELECT * FROM patient;
SELECT * FROM looksafter;
SELECT * FROM hospital;

-- ---------
-- Part 3 SQL Queries
-- Query 1
SELECT lastname FROM patient;
-- Query 2
SELECT DISTINCT lastname FROM patient;
-- Query 3
SELECT * FROM doctor ORDER BY lastname ASC;
-- Query 4
SELECT hosname, hoscode FROM hospital WHERE numofbed>1500;
-- Query 5
SELECT firstname, lastname FROM doctor JOIN hospital ON hosworksat=hoscode WHERE hosname="St. Joseph";
-- Query 6
SELECT firstname, lastname FROM patient WHERE lastname LIKE 'G%';
-- Query 7
SELECT patient.firstname, patient.lastname FROM looksafter JOIN doctor ON looksafter.licensenum=doctor.licensenum JOIN patient ON looksafter.ohipnum=patient.ohipnum WHERE doctor.lastname='Webster';
-- Query 8
SELECT hosname, city, lastname FROM doctor, hospital WHERE headdoc=licensenum;
-- Query 9
SELECT SUM(numofbed) FROM hospital;
-- Query 10
SELECT patient.firstname, patient.lastname, doctor.firstname, doctor.lastname FROM looksafter JOIN patient ON patient.ohipnum=looksafter.ohipnum JOIN doctor ON doctor.licensenum=looksafter.licensenum JOIN hospital ON hospital.headdoc=looksafter.licensenum;
-- Query 11
SELECT lastname, firstname, prov FROM doctor JOIN hospital ON hosworksat=hoscode WHERE speciality="Surgeon" AND hosname="Victoria";
-- Query 12
SELECT firstname FROM doctor WHERE NOT EXISTS (SELECT looksafter.licensenum FROM looksafter WHERE doctor.licensenum=looksafter.licensenum);
-- Query 13
SELECT lastname, firstname, COUNT(doctor.licensenum), hosname
FROM doctor JOIN looksafter ON looksafter.licensenum=doctor.licensenum JOIN hospital ON hoscode=hosworksat
GROUP BY doctor.licensenum
HAVING COUNT(doctor.licensenum) > 1;
-- Query 14
SELECT firstname as "Doctor First Name", lastname as "Doctor Last Name", h1.hosname as "Head of Hospital Name", h2.hosname as "Works at Hospital Name"
FROM hospital h1 JOIN doctor d1 ON h1.headdoc=licensenum JOIN hospital h2 ON d1.hosworksat=h2.hoscode AND h1.hoscode!=h2.hoscode;
-- Query 15 - Display the first name of all patients with last name "Geller"
SELECT firstname FROM patient WHERE lastname="Geller";

-- ---------
-- Part 4 SQL Views/Deletes
CREATE VIEW birthdays AS
SELECT doctor.firstname AS dfirst, doctor.lastname AS dlast, doctor.birthdate AS dbirth, patient.firstname AS pfirst, patient.lastname AS plast, patient.birthdate AS pbirth
FROM doctor, patient, looksafter
WHERE doctor.licensenum=looksafter.licensenum AND patient.ohipnum=looksafter.ohipnum;
SELECT * FROM birthdays;
SELECT dlast, dbirth, plast, pbirth FROM birthdays WHERE dbirth > pbirth;
SELECT * FROM patient;
SELECT * FROM looksafter;
DELETE FROM patient, looksafter USING patient JOIN looksafter ON patient.ohipnum=looksafter.ohipnum WHERE patient.firstname="Andy" AND patient.lastname="Serkis";
SELECT * FROM patient;
SELECT * FROM looksafter;
SELECT * FROM doctor;
DELETE FROM doctor WHERE firstname="Bernie";
SELECT * FROM doctor;
DELETE FROM doctor WHERE firstname="Lalo" AND lastname="Salamanca";
-- Above DELETE query fails because it is attempting to delete a parent row where the child row contains the Primary table identifier as a foreign key.
