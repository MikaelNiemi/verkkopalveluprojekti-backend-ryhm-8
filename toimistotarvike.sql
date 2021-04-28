drop database if exists toimistotarvike;

create database toimistotarvike;
use toimistotarvike;

create table tuoteryhma (
	trnro int primary key auto_increment,
	trnimi varchar(30) not null,
	constraint trnimi_uniikki unique (trnimi));

	insert into tuoteryhma(trnimi) value ('elektroniikka');
	insert into tuoteryhma(trnimi) value ('huonekalut');
	insert into tuoteryhma(trnimi) value ('toimistotarvikkeet');

create table tuote (
	tuotenro int primary key auto_increment,
	tuotenimi varchar(30) unique not null,
	hinta decimal(5,2) not null,
	image varchar(50),
    kuvaus varchar(255),
	trnro int not null,
	constraint trnro_viite foreign key (trnro) references 	tuoteryhma (trnro));
	
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Nitoja", 20, "nitoja.png", "Siisti ja helppokäyttöinen nitoja.", 3);

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Lehtikotelo", 5, "lehtikotelo.png", "Tilava ja hyvälaatuinen kotelo papereille ja lehdille.", 3);

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Kansiot 3 kpl, väri", 12.90, "kansiot_väri.png", "Kolme kappaletta muovisia kansioita paperiarkkien lajitteluun ja talletukseen. Värejä harmaa, sininen ja punainen.", 3);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Kansiot 3 kpl, musta", 12.90, "kansiot_musta.png", "Kolme kappaletta muovisia kansioita paperiarkkien lajitteluun ja talletukseen. Väri musta.", 3);

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Lävistin Musta", 24.90, "reiitin_musta.png", "Tehokas ja kestävä musta lävistin, jolla voi lävistää paksunkin paperinipun yhdellä painalluksella.", 3);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Lävistin Valkoinen", 24.90, "reiitin_valkoinen.png", "Tehokas ja kestävä valkoinen lävistin, jolla voi lävistää paksunkin paperinipun yhdellä painalluksella.", 3);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Lävistin Punainen", 24.90, "reiitin_punainen.png", "Tehokas ja kestävä punainen lävistin, jolla voi lävistää paksunkin paperinipun yhdellä painalluksella.", 3);
	

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Pöytälamppu", 30, "pöytälamppu.png", "Hyvin valaiseva pöytälamppu.", 1);

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Webkamera Musta", 24.90, "webkamera_musta.png", "Musta web-kamera sisäisellä mikrofonilla. Kiinnitys kannettavan näyttöön ja litteille alustoille.", 1);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Webkamera Punainen", 24.90, "webkamera_punainen.png", "Punainen web-kamera sisäisellä mikrofonilla. Kiinnitys kannettavan näyttöön ja litteille alustoille.", 1);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Webkamera Kultainen", 24.90, "webkamera_kultainen.png", "Kultainen web-kamera sisäisellä mikrofonilla. Kiinnitys kannettavan näyttöön ja litteille alustoille.", 1);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Webkamera Sininen", 24.90, "webkamera_sininen.png", "Sininen web-kamera sisäisellä mikrofonilla. Kiinnitys kannettavan näyttöön ja litteille alustoille.", 1);
	
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Työtuoli", 49.50, "työtuoli_nojaton.png", "Tyylikäs työtuoli ilmavalla verkkoselkänojalla. Säädettävä istuinkorkeus.", 2);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Työtuoli käsinojilla", 59.50, "työtuoli_nojilla.png", "Tyylikäs työtuoli ilmavalla verkkoselkänojalla ja tukevilla käsinojilla. Säädettävä istuinkorkeus.", 2);
	
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Työpöytä Valkoinen", 299.90, "työpöytä_valkoinen.png", "Yksinkertainen, mutta kaunis valkoinen pöytä työskentelynurkkaukseen. Pöytä on rakenteeltaan tukeva ja takalevy siisti, joten se sopii erinomaisesti myös tilanjakajaksi. ", 2);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Työpöytä Musta", 299.90, "työpöytä_musta.png", "Yksinkertainen, mutta kaunis musta pöytä työskentelynurkkaukseen. Pöytä on rakenteeltaan tukeva ja takalevy siisti, joten se sopii erinomaisesti myös tilanjakajaksi. ", 2);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Työpöytä Ruskea", 299.90, "työpöytä_ruskea.png", "Yksinkertainen, mutta kaunis ruskea pöytä työskentelynurkkaukseen. Pöytä on rakenteeltaan tukeva ja takalevy siisti, joten se sopii erinomaisesti myös tilanjakajaksi. ", 2);

	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Arkistokaappi Valkoinen", 89.90, "arkistokaappi_valkoinen.png", "Valkoinen arkistokaappi. Riippukansiolaatikot helpottavat papereiden lajittelua ja säilytystä. Laatikoissa olevien pysäyttimien ansiosta laatikot eivät putoa kiskoiltaan.", 2);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Arkistokaappi Musta", 89.90, "arkistokaappi_musta.png", "Musta arkistokaappi. Riippukansiolaatikot helpottavat papereiden lajittelua ja säilytystä. Laatikoissa olevien pysäyttimien ansiosta laatikot eivät putoa kiskoiltaan.", 2);
	INSERT INTO tuote (tuotenimi, hinta, image, kuvaus, trnro)
	VALUES ("Arkistokaappi Ruskea", 89.90, "arkistokaappi_ruskea.png", "Ruskea arkistokaappi. Riippukansiolaatikot helpottavat papereiden lajittelua ja säilytystä. Laatikoissa olevien pysäyttimien ansiosta laatikot eivät putoa kiskoiltaan.", 2);


create table asiakas (
	asnro int primary key auto_increment,
	sukunimi varchar(30) not null,
	etunimi varchar(30) not null,
	email varchar(30),
	salasana varchar(100),
	lahiosoite varchar(30),
	postinro char(5),
	astili_luotu TIMESTAMP DEFAULT CURRENT_TIMESTAMP not null,
	-- constraint email_uniikki unique (email),
	constraint asnro_uniikki unique (asnro));

create table tilaus (
	tilausnro int primary key auto_increment,
	asnro int,
	tilauspvm timestamp not null,
	tila varchar(1),
	constraint asnro_viite foreign key (asnro) references asiakas (asnro),
	constraint tilausnro_uniikki unique (tilausnro));

create table tilausrivi (
	tilausnro int not null,
	rivinro smallint not null,
	tuotenro int,
	kpl int not null,
	constraint tilausrivi_perusavain primary key (tilausnro, rivinro),
	constraint tuotenro_viite foreign key (tuotenro) references tuote (tuotenro));

create table yllapitaja (
	yllnro int primary key auto_increment,
	sukunimi varchar(30) not null,
	etunimi varchar(30) not null,
	email varchar(30) not null,
	salasana varchar(100) not null,
	tunnus_luotu TIMESTAMP DEFAULT CURRENT_TIMESTAMP not null,
	constraint yllnro_uniikki unique (yllnro),
	constraint email_uniikki unique (email));

	INSERT INTO yllapitaja (sukunimi, etunimi, email, salasana)
	VALUES ("Meikäläinen", "Matti", "matti.yllapitaja@kauppa.fi", "5eee07f847b11df294c4f7a6177ca7b0c7d524e7626c2bf3902caca9bb276f46");
   
   insert into asiakas (sukunimi, etunimi, email, salasana, lahiosoite, postinro) values ("sukunimi","etunimi","post@post.com","5eee07f847b11df294c4f7a6177ca7b0c7d524e7626c2bf3902caca9bb276f46", "osoite 1","12345");
   INSERT INTO tilaus (asnro, tila) VALUES (1, 'U');
   INSERT INTO tilausrivi (tilausnro, rivinro, tuotenro, kpl) VALUES (1,1,1,12);
INSERT INTO tilausrivi (tilausnro, rivinro, tuotenro, kpl) VALUES (1,2,3,5);