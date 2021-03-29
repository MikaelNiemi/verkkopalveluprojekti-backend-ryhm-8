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
    kuvaus varchar(255),
	trnro int not null,
	constraint trnro_viite foreign key (trnro) references 	tuoteryhma (trnro));
	
	INSERT INTO tuote (tuotenimi, hinta, kuvaus, trnro)
	VALUES ("nitoja", 20, "Siisti ja helppokäyttöinen nitoja.", 3);

	INSERT INTO tuote (tuotenimi, hinta, kuvaus, trnro)
	VALUES ("lehtikotelo", 5, "Tilava ja hyvälaatuinen kotelo papereille ja lehdille.", 3);

	INSERT INTO tuote (tuotenimi, hinta, kuvaus, trnro)
	VALUES ("pöytälamppu", 30, "Hyvin valaiseva pöytälamppu.", 1);


create table asiakas (
	asnro int primary key auto_increment,
	sukunimi varchar(30) not null,
	etunimi varchar(30) not null,
	email varchar(30) not null,
	salasana varchar(30) not null,
	lahiosoite varchar(30),
	postinro char(5),
	astili_luotu TIMESTAMP DEFAULT CURRENT_TIMESTAMP not null,
	constraint asnro_uniikki unique (asnro),
	constraint email_uniikki unique (email));

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
	salasana varchar(30) not null,
	tunnus_luotu TIMESTAMP DEFAULT CURRENT_TIMESTAMP not null,
	constraint yllnro_uniikki unique (yllnro),
	constraint email_uniikki unique (email));