DROP TABLE scriptureTopic;
DROP TABLE topic;
DROP TABLE scripture;


CREATE TABLE topic
(
    id              SERIAL          PRIMARY KEY,
    topic           VARCHAR(50)
);

INSERT INTO topic (topic) VALUES ('Faith');
INSERT INTO topic (topic) VALUES ('Sacrifice');
INSERT INTO topic (topic) VALUES ('Charity');


CREATE TABLE scripture
(
    id              SERIAL          NOT NULL    PRIMARY KEY,
    book            VARCHAR(50)     NOT NULL,
    chapter         INT             NOT NULL,
    verse           INT             NOT NULL,
    content         VARCHAR(500)    NOT NULL    UNIQUE
);

INSERT INTO scripture (book, chapter, verse, content)
VALUES('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scripture (book, chapter, verse, content)
VALUES('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scripture (book, chapter, verse, content)
VALUES('Doctrine and Covenants', 92, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');


CREATE TABLE scriptureTopic
(
    id              SERIAL          PRIMARY KEY,
    topic_id        INT REFERENCES topic(id),
    scripture_id    INT REFERENCES scripture(id)
);


CREATE USER jim WITH PASSWORD 'password123';
GRANT SELECT, INSERT, UPDATE ON scripture TO jim;
GRANT SELECT, INSERT, UPDATE ON topic TO jim;
