---- database

CREATE DATABASE expensecontrol;
USE expensecontrol;

---- tables


CREATE TABLE user(
	  UserId INT AUTO_INCREMENT PRIMARY KEY,
  	Name VARCHAR(200) NOT NULL,
    Mail VARCHAR(200) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    CreationDate DATE NOT NULL,
    UpdateDate DATE NOT NULL,
    DeletionDate DATE NULL,
    IsAdmin BOOLEAN NOT NULL,
    Avatar VARCHAR(200)
);


CREATE TABLE card(
	  CardId INT AUTO_INCREMENT PRIMARY KEY,
    Number BIGINT NOT NULL,
	  Type TINYINT NOT NULL,
    Brand TINYINT NOT NULL,
    UserId INT NULL,
    LimitValue DECIMAL NOT NULL,
    CurrentValue DECIMAL NOT NULL,
    ClosedDate DATE NOT NULL,
    CreationDate DATE NOT NULL,
    UpdateDate DATE NOt NULL,
    DeletionDate DATE NULL
);

CREATE TABLE revenue(
    RevenueId INT AUTO_INCREMENT PRIMARY KEY,
    Value DECIMAl NOT NULL,
    CardId INT NOT NULL,
    UserId INT NOT NULL,
    CreationDate DATE NOT NULL,
    UpdateDate DATE NOt NULL,
    DeletionDate DATE NULL
);

CREATE TABLE category(
    CategoryId INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(200) NOT NULL,
    UserId INT NULL,
    CreationDate DATE NOT NULL,
    UpdateDate DATE NOt NULL,
    DeletionDate DATE NULL
);

CREATE TABLE expense(
    ExpenseId INT AUTO_INCREMENT PRIMARY KEY,
    Value DECIMAl NOT NULL,
    Type TINYINT NOT NULL,
    CardId INT NOT NULL,
    UserId INT NOT NULL,
    CreationDate DATE NOT NULL,
    UpdateDate DATE NOt NULL,
    DeletionDate DATE NULL
);