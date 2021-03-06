DROP database test;
CREATE database test;

CREATE TABLE test.articles(id BIGINT AUTO_INCREMENT,
product VARCHAR(255) NOT NULL DEFAULT '',
PRIMARY KEY(id),
INDEX(product)
)ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE=utf8_unicode_ci;

SET NAMES utf8;
SET @@AUTOCOMMIT=1;
INSERT INTO test.articles (product) VALUES('orange'),('banana'),('potatoes');

CREATE TABLE test.vots(id BIGINT NOT NULL DEFAULT 0,
val INT NOT NULL DEFAULT 0,
INDEX(id),
FOREIGN KEY (id) REFERENCES articles(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE=utf8_unicode_ci;
