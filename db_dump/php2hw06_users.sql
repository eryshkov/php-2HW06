CREATE TABLE users (
  id       bigint UNSIGNED AUTO_INCREMENT,
  email    varchar(1024) NOT NULL,
  password varchar(1024) NOT NULL,
  CONSTRAINT id
    UNIQUE (id),
  CONSTRAINT users_email_uindex
    UNIQUE (email)
);

ALTER TABLE users
  ADD PRIMARY KEY (id);

INSERT INTO php2hw06.users (email, password) VALUES ('test@test.com', '1234');