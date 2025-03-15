CREATE TABLE IF NOT EXISTS clients (
  id serial NOT NULL,
  timestamp TIMESTAMP,
  foreName varchar(32) NOT NULL,
  sirName varchar(32) NOT NULL,
  userID varchar(16) NOT NULL,
  age smallserial NOT NULL,
  PRIMARY KEY (id)
);