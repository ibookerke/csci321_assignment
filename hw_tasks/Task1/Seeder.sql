insert into diseasetype (description)
values
    ('Asthma'),
    ('Autoimmune Diseases'),
    ('Cholera'),
    ('Coronaviruses'),
    ('Dengue Fever'),
    ('Ebola'),
    ('Eczema'),
    ('Gonorrhea'),
    ('Hepatitis'),
    ('HIV/AIDS'),
    ('Influenza'),
    ('Leishmaniasis'),
    ('infectious diseases'),
    ('virology')
;

insert into diseasetype(id, description)
values (0, '-');

insert into country (cname, population)
values
    ('-', 0),
    ('Afghanistan', 39840000),
    ('Albania', 2812000),
    ('USA', 331900000),
    ('China', 1412000000),
    ('Kazakhstan', 19000000),
    ('South Korea', 51740000),
    ('Mongolia', 3329000),
    ('Kyrgyzstan', 6694000),
    ('France', 67500000),
    ('Italy', 59070000),
    ('United Kingdom', 67330000),
    ('UAE', 9991000),
    ('Spain', 47330000),
    ('Japan', 125700000)
;


insert into disease(disease_code, pathogen, description, id)
values
    ('Diareaism', 'anthrax', 'severe stomachache', 4),
    ('Headache', 'botulism', 'sharp pain in head', 11),
    ('Bird fever', 'plague', 'Severe cough', 3),
    ('HIV-2', 'smallpox', 'Weakness', 10),
    ('Acne', 'tularemia', 'Skin problems', 7),
    ('Some Disease', 'Arenaviruses', 'High temperature', 6),
    ('Elephant Disease', 'Obladaetum', 'Enlraging body parts', 2),
    ('Hepatit C', 'bacteria', 'Not a vitamin', 9),
    ('Hepatit B', 'bacteria', 'Also not a vitamin', 9),
    ('Elephant ears', 'glanders', 'Enlarging ears', 11),
    ('Rare disease', 'Psittacosis', 'Finger pain', 5),
    ('Tourette syndrome', 'Touretosis', 'Shaking hands', 5),
    ('Vitiligo', 'Bunyaviruses', 'Skin spots', 7),
    ('Malaria', 'Mosquito viruses', 'instant death', 12),
    ('Malaria light', 'Mosquito viruses', 'slow death', 12),
    ('Pig fever', 'fevers', 'cough and high temperature', 5),
    ('Sore throats', 'glanders', 'sores in throat', 1),
    ('Lung Cancer', 'tularemia', 'lung pain', 1),
    ('covid-19', 'corona', 'smell and taste loss', 4)
;

insert into discover(cname, disease_code, first_enc_date)
values
    ('Afghanistan', 'Diareaism', '1923-01-10'),
    ('Albania', 'Headache', '1925-03-17'),
    ('USA', 'Bird fever', '1938-07-18'),
    ('China', 'HIV-2', '1942-04-05'),
    ('Kazakhstan', 'Acne', '1942-09-26'),
    ('South Korea', 'Some Disease',' 1954-08-02'),
    ('Mongolia', 'Elephant Disease', '1959-03-03'),
    ('Kyrgyzstan', 'Hepatit C', '1963-02-27'),
    ('France', 'Hepatit B', '1964-12-09'),
    ('Italy', 'Elephant ears', '1965-02-01'),
    ('United Kingdom', 'Rare disease', '1965-09-25'),
    ('UAE', 'Tourette syndrome', '1975-09-12'),
    ('Spain', 'Vitiligo', '1975-10-06'),
    ('Japan', 'Malaria', '1979-02-05'),
    ('USA', 'Malaria light', '1981-10-31'),
    ('Japan', 'Pig fever', '1990-08-11'),
    ('Italy', 'Sore throats', '1994-01-17'),
    ('China', 'Lung Cancer', '1995-11-29')
;

insert into users(email, name, surname, salary, phone, cname)
values
    ('jojo@gmail.com', 'Joseph', 'Jostar', 70000, 87779356782, 'Afghanistan'),
    ('crhisl@gmail.com', 'Chris', 'Lemar', 200000 ,87779356793, 'Afghanistan'),
    ('twoods@gmail.com', 'Tiger', 'Woods', 160000, 87779356712, 'Albania'),
    ('zxc@gmail.com', 'Shadowfiend', 'Mider', 140000, 87779356755, 'USA'),
    ('babyk@gmail.com', 'Baby', 'Keen', 150000, 87779358988, 'USA'),
    ('klamar@gmail.com', 'Kendrick', 'Lamar', 160000, 87779350034, 'China'),
    ('lebro@gmail.com', 'James', 'Lebron', 170000, 87779358521, 'China'),
    ('sw@gmail.com', 'Sweater', 'Weather', 180000, 87779353300, 'Kazakhstan'),
    ('lilid@gmail.com', 'LIliya', 'Duesh', 190000, 87779356777, 'Kazakhstan'),
    ('Dora@gmail.com', 'Dora', 'Gotova', 200000, 87779351234, 'South Korea'),
    ('vanyaface@gmail.com', 'Ivan', 'Face', 210000, 87779354321, 'Mongolia'),
    ('noziemc@gmail.com', 'Noize', 'Mc', 220000, 87779358877, 'Kyrgyzstan'),
    ('alizade@gmail.com', 'ALizade', 'Gucci', 230000, 87779355555, 'France'),
    ('mironyan@gmail.com', 'Miron', 'Yanovich', 240000, 87779359099, 'France'),
    ('markul@gmail.com', 'Mark', 'Bilet', 250000, 87779355151, 'Italy'),
    ('drake@gmail.com', 'Doyour', 'Thing', 260000, 87779352121, 'Italy'),
    ('dojacat@gmail.com', 'Doja', 'Cat', 270000, 87779350009, 'United Kingdom'),
    ('liltecca@gmail.com', 'Lil', 'Tecca', 280000, 87779350101, 'United Kingdom'),
    ('liluzivert@gmail.com', 'Uzi', 'Vert', 290000, 87779354044, 'UAE'),
    ('edsheeran@gmail.com', 'Ed', 'Sheeran', 300000, 87779358888, 'UAE'),
    ('jbieber@gmail.com', 'Justin', 'Bieber', 310000, 87779358081, 'Spain'),
    ('amonkey@gmail.com', 'Arctic', 'Monkey', 320000, 87779354940, 'Japan'),
    ('juicewrld@gmail.com', 'Juice', 'Wrld', 330000, 87779353737, 'Japan'),
    ('joji@gmail.com', 'Jo', 'Ji', 340000, 87779359296, 'Spain'),
    ('limba@gmail.com', 'Alisher', 'Limba', 350000, 87779350058, 'China'),
    ('abdr@gmail.com', 'Abay', 'Drakhmanov', 360000, 87779356969, 'South Korea'),
    ('gordonm@gmail.com', 'Gordon', 'Moore', 370000, 87779353222, 'South Korea'),
    ('rayboyce@gmail.com', 'Raymond', 'Boyce', 380000, 87779352288, 'Kyrgyzstan'),
    ('alibek.khankozhin@gmail.com', 'Alibek', 'Khankozhin', 17000, 85579234567, 'Kazakhstan'),
    ('gkhassenova@gmail.com', 'Gulsim', 'Khassenova', 41000, 87089332121, 'Kazakhstan')
;

insert into publicservant(email, department)
values
    ('jojo@gmail.com', 'Internal Affairs'),
    ('crhisl@gmail.com', 'Internal Affairs'),
    ('twoods@gmail.com', 'Love'),
    ('zxc@gmail.com', 'Love'),
    ('babyk@gmail.com', 'Breaking Bad'),
    ('klamar@gmail.com', 'Art'),
    ('lebro@gmail.com', 'Sport'),
    ('sw@gmail.com', 'Healthcare'),
    ('lilid@gmail.com', 'Art'),
    ('Dora@gmail.com', 'Love'),
    ('vanyaface@gmail.com', 'Breaking Bad'),
    ('noziemc@gmail.com', 'Art'),
    ('alizade@gmail.com', 'Law and Order'),
    ('mironyan@gmail.com', 'Healthcare'),
    ('markul@gmail.com', 'Sport'),
    ('drake@gmail.com', 'Internal Affairs'),
    ('dojacat@gmail.com', 'Sport')
;

insert into doctor(email, degree)
values
    ('liltecca@gmail.com', 'Bachelor'),
    ('liluzivert@gmail.com', 'PhD in Biology'),
    ('edsheeran@gmail.com', 'MD in Chemistry'),
    ('jbieber@gmail.com', 'PhD NUSOM'),
    ('amonkey@gmail.com', 'NUSOM Bachelor'),
    ('juicewrld@gmail.com', 'PhD in Chemistry'),
    ('joji@gmail.com', 'PhD in Smth'),
    ('limba@gmail.com', 'MD im smth'),
    ('abdr@gmail.com', 'NUSOM MD'),
    ('gordonm@gmail.com', 'CS PhD'),
    ('rayboyce@gmail.com', 'CS PhD')
;

insert into specialize(id, email)
values
    (1, 'liltecca@gmail.com'),
    (2, 'liluzivert@gmail.com'),
    (3, 'edsheeran@gmail.com'),
    (4, 'amonkey@gmail.com'),
    (5, 'juicewrld@gmail.com'),
    (6, 'joji@gmail.com'),
    (7, 'limba@gmail.com'),
    (13, 'limba@gmail.com'),
    (5, 'limba@gmail.com'),
    (8, 'abdr@gmail.com'),
    (9, 'gordonm@gmail.com'),
    (10, 'jbieber@gmail.com'),
    (11, 'jbieber@gmail.com'),
    (1, 'jbieber@gmail.com'),
    (12, 'joji@gmail.com'),
    (9 , 'liltecca@gmail.com'),
    (13 , 'liltecca@gmail.com'),
    (14, 'edsheeran@gmail.com'),
    (14, 'amonkey@gmail.com'),
    (14, 'gordonm@gmail.com'),
    (14, 'joji@gmail.com'),
    (14, 'abdr@gmail.com')
;

Insert into record(email, cname, disease_code, total_deaths, total_patients)
values
    ('jojo@gmail.com', 'United Kingdom', 'covid-19', 3500000, 4200000),
    ('crhisl@gmail.com', 'Kazakhstan', 'covid-19', 1200000, 3300000),
    ('zxc@gmail.com', 'South Korea', 'covid-19', 4900000, 5700000),
    ('Dora@gmail.com', 'Mongolia', 'covid-19', 601000, 900000),
    ('drake@gmail.com', 'UAE', 'covid-19', 400000, 550000),
    ('babyk@gmail.com', 'UAE', 'Hepatit C', 4000, 12000),
    ('dojacat@gmail.com', 'Japan', 'Tourette syndrome', 1200, 15000),
    ('markul@gmail.com', 'China', 'HIV-2', 800000, 11000000),
    ('lebro@gmail.com', 'Spain', 'Bird fever', 45000, 1300000),
    ('klamar@gmail.com', 'Albania', 'Acne', 0, 2400000),
    ('sw@gmail.com', 'Kyrgyzstan', 'Elephant Disease', 800, 810),
    ('lilid@gmail.com', 'Afghanistan', 'Diareaism', 4, 700000),
    ('mironyan@gmail.com', 'France', 'Vitiligo', 0, 1200),
    ('noziemc@gmail.com', 'USA', 'Lung Cancer', 432000, 1700000),
    ('jojo@gmail.com', 'Albania', 'covid-19', 930000, 1300000),
    ('jojo@gmail.com', 'Japan', 'covid-19', 3600000, 5900000),
    ('jojo@gmail.com', 'France', 'covid-19', 1230000, 3331000),
    ('Dora@gmail.com', 'Spain', 'covid-19', 1400000, 2600000),
    ('Dora@gmail.com', 'Afghanistan', 'covid-19', 580000, 943000),
    ('Dora@gmail.com', 'USA', 'covid-19', 2800000, 4400000)
;
