use devprox;

CREATE TABLE users(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name varchar(250) not null,
    Surname varchar(250) not null,
    DateOfBirth DATE
)