CREATE TABLE scriptures
(
    id      SERIAL          NOT NULL    PRIMARY KEY,
    book    VARCHAR(50)     NOT NULL,
    chapter INT             NOT NULL,
    verse   INT             NOT NULL,
    content VARCHAR(500)    NOT NULL    UNIQUE
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content)
VALUES('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content)
VALUES('Doctrine and Covenants', 92, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
