-- Crear la base de datos
CREATE DATABASE jurisgest;

-- Seleccionar la base de datos
USE jurisgest;

-- Crear las tablas según el diagrama
CREATE TABLE tbl_junt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nJunt VARCHAR(255)
);

CREATE TABLE tbl_per (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nPer VARCHAR(255)
);

CREATE TABLE tbl_usr (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usr VARCHAR(225),
    aco VARCHAR(255),
    nom VARCHAR(255),
    ape VARCHAR(255),
    perf INT,
    corr VARCHAR(255),
    fReg DATE,
    fUlt DATE,
    FOREIGN KEY (perf) REFERENCES tbl_per(id)
);

CREATE TABLE tbl_cli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    aPat VARCHAR(255),
    aMat VARCHAR(255),
    calle VARCHAR(255),
    nInt VARCHAR(255),
    nExt VARCHAR(255),
    col VARCHAR(255),
    cp VARCHAR(255),
    ciud VARCHAR(255),
    edo VARCHAR(255),
    tel1 VARCHAR(255),
    tel2 VARCHAR(255),
    cel VARCHAR(255),
    corr VARCHAR (255),
    fReg DATE
);

CREATE TABLE tbl_exp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exp VARCHAR(255),
    emp VARCHAR(255),
    sta VARCHAR(255),
    nota VARCHAR(255),
    junt_id INT,
    cli_id INT,
    FOREIGN KEY (junt_id) REFERENCES tbl_junt(id),
    FOREIGN KEY (cli_id) REFERENCES tbl_cli(id)
);

CREATE TABLE tbl_exp_usr (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usr_id INT,
    exp_id INT,
    FOREIGN KEY (usr_id) REFERENCES tbl_usr(id),
    FOREIGN KEY (exp_id) REFERENCES tbl_exp(id)
);

CREATE TABLE tbl_aud (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fAud DATETIME,
    exp_id INT,
    nAud VARCHAR(255),
    com VARCHAR(255),
    FOREIGN KEY (exp_id) REFERENCES tbl_exp(id)
);

-- Inserta los tres roles de usuarios
INSERT INTO tbl_per(nPer) VALUES ("Super Administrador");
INSERT INTO tbl_per(nPer) VALUES ("Administrador");
INSERT INTO tbl_per(nPer) VALUES ("Usuario");

-- Inserta super administrador por defecto
INSERT INTO tbl_usr(usr, aco, nom, ape, perf, corr, fReg, fUlt) VALUES ("TzRooDAI", "$2y$10$s/vo0MvgY.qUhc5yw/x.1OMW55bTMqxbIHF7fj7vdXFDPof6rJ1Y2", "Gerardo", "Cuellar", 1, "gerardo@mail.com", NOW(), NOW());