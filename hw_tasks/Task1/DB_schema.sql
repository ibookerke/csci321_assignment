CREATE TABLE DiseaseType (
    id serial PRIMARY KEY,
    description VARCHAR ( 140 ) NOT NULL
);


CREATE TABLE Country(
    cname varchar(50) primary key,
    population bigint not null
);


create table Disease(
    disease_code varchar(50) primary key,
    pathogen varchar(20) not null,
    description varchar(140),

    id int not NULL default 0,
    FOREIGN KEY (id) REFERENCES DiseaseType (id) on delete set default
);

create table Discover(
    cname varchar(50) not null,
    foreign key (cname) REFERENCES Country on delete cascade,

    disease_code varchar(50) not null,
    foreign key (disease_code) REFERENCES Disease (disease_code) on delete cascade,

    first_enc_date date,

    Constraint pk_country_disease Primary Key (cname, disease_code)
);

create table Users(
    email varchar(60) primary key,
    name varchar(30) not null,
    surname varchar(40) not null,
    salary integer not null,
    phone varchar(20),

    cname varchar(50) default '-',
    foreign key (cname) references Country(cname) on delete set default
);

create table PublicServant(
    email varchar(60) primary key,
    foreign key (email) references Users (email) on delete cascade,

    department varchar(50) not null
);

create table Doctor(
    email varchar(60) primary key,
    foreign key (email) references Users(email) on delete cascade,

    degree varchar(20) not null
);

create table Specialize(
    id int not null,
    foreign key (id) references DiseaseType(id) on delete cascade,

    email varchar(60) not null,
    foreign key (email) references Doctor(email) on delete cascade,

    Constraint pk_dtype_doctor Primary Key (id, email)
);

create table Record(
    email varchar(60) not null,
    foreign key (email) references PublicServant(email) on delete cascade,

    cname varchar(50) not null,
    foreign key (cname) references Country(cname) on delete cascade,

    disease_code varchar(50) not null,
    foreign key (disease_code) references Disease(disease_code) on delete cascade,

    total_deaths integer,
    total_patients integer,

    Constraint pk_pservant_country_disease Primary Key (email, cname, disease_code)
);



/* cleaning */
drop table Record;
drop table Specialize;
drop table Doctor;
drop table PublicServant;
drop table users;
drop table discover;
drop table disease;
drop table country;
drop table DiseaseType;
