-- Table structure for table 'dormers' , preliminary for server.

CREATE TABLE dormers ( 
    studentnum varchar(10) NOT NULL, 
    pwd varchar(255) NOT NULL,
    studentname VARCHAR(255),
    age INT,
    sex VARCHAR(10),
    course VARCHAR(255),
    yearlvl VARCHAR(255),
    birthdate DATE,
    placeofbirth VARCHAR(255),
    religion VARCHAR(255),
    emailadd VARCHAR(255),
    phonenum VARCHAR(255),
    homeaddress VARCHAR(255),
    create_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    update_at DATETIME NOT NULL DEFAULT CURRENT_TIME,

    PRIMARY KEY (studentnum)
) 
