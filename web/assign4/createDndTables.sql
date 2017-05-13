CREATE TABLE profBonus
(
    level               SERIAL                          NOT NULL    PRIMARY KEY,
    bonus               INT                             NOT NULL
);
CREATE TABLE abilityScoreModifier
(
    score               SERIAL                          NOT NULL    PRIMARY KEY,
    modifier            INT                             NOT NULL
);

/*The user or player's data*/
CREATE TABLE player
(
    id                  SERIAL                      NOT NULL    PRIMARY KEY,
    firstName           VARCHAR(250)                NOT NULL,
    lastName            VARCHAR(250)                NOT NULL,
    username            VARCHAR(50)                 NOT NULL    UNIQUE,
    password            VARCHAR(250)                NOT NULL
);

/*every character has a race that gives them ability score modifiers and features*/
CREATE TABLE race
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    raceName            VARCHAR(20)                     NOT NULL    UNIQUE,
    size                VARCHAR(15)                     NOT NULL,
    speed               VARCHAR(5)                      NOT NULL,
    ageText             VARCHAR(200)                    NOT NULL,
    alignmentText       VARCHAR(200)                    NOT NULL,
    languagesText       VARCHAR(200)                    NOT NULL
);
CREATE TABLE raceAbilityScoreIncrease
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    race                INT REFERENCES race(id)         NOT NULL    UNIQUE,
    abilityScore        VARCHAR(3)                      NOT NULL,
    increase            INT                             NOT NULL
);
CREATE TABLE raceFeature
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    race                INT REFERENCES race(id)         NOT NULL    UNIQUE,
    featureName         VARCHAR(30)                     NOT NULL    UNIQUE,
    featureDescription  VARCHAR(500)                    NOT NULL
);

/* every character has a class which gives them different abilities */
/* the className consists of the class and the class archetype */
/* ex. Figher, Fighter_Battlemaster, Fighter_Eldritch_Knight */
CREATE TABLE class
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    className           VARCHAR(15)                     NOT NULL    UNIQUE,
    hitdicetype         VARCHAR(10)                     NOT NULL
);
/*holds class feature and class archetype feature*/
CREATE TABLE classFeature
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    class_id            INT REFERENCES class(id)           NOT NULL,
    featureName         VARCHAR(30)                     NOT NULL    UNIQUE,
    featureText         VARCHAR(400)                    NOT NULL
);
CREATE TABLE classEquipmentProf
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    class_id            INT REFERENCES class(id)        NOT NULL,
    equipment           VARCHAR(25)                     NOT NULL
);
CREATE TABLE classSaveProf
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    class_id            INT REFERENCES class(id)        NOT NULL,
    save                VARCHAR(10)                     NOT NULL
);
CREATE TABLE classSkillProf
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    class_id            INT REFERENCES class(id)        NOT NULL,
    skill               VARCHAR(20)                     NOT NULL
);
/*the background of the character*/
/*might delete the background stuff altogether, its a bit much with it*/
CREATE TABLE background
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    bgTitle             VARCHAR(20)                     NOT NULL    UNIQUE,
    bgText              VARCHAR(400)                    NOT NULL    UNIQUE,
    bgFeature           VARCHAR(20)                     NOT NULL    UNIQUE,
    bgFeatureText       VARCHAR(500)                    NOT NULL    UNIQUE
);
CREATE TABLE backgroundSpecialty
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    background_id       INT REFERENCES background(id)   NOT NULL,
    specialty           VARCHAR(20)                     NOT NULL    UNIQUE
);
CREATE TABLE backgroundCharacteristics
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    background_id       INT REFERENCES background(id)   NOT NULL,
    section             VARCHAR(15)                     NOT NULL,
    characteristic      VARCHAR(60)                     NOT NULL
);
CREATE TABLE backgroundSkillProf
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    background_id       INT REFERENCES background(id)   NOT NULL,
    skill               VARCHAR(20)                     NOT NULL
);
CREATE TABLE backgroundEquipmentProf
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    background_id       INT REFERENCES background(id)   NOT NULL,
    equipment           VARCHAR(25)                     NOT NULL
);

/*the character that the player creates or is storing*/
/*this is the bulk of the web app*/
CREATE TABLE character
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    player_id           INT REFERENCES player(id)       NOT NULL,
    characterName       VARCHAR(250)                    NOT NULL,
    race_id             INT REFERENCES race(id)         NOT NULL,
    class_id            INT REFERENCES class(id)        NOT NULL,
    background_id       INT REFERENCES background(id)   NOT NULL,
    level               INT                             NOT NULL    CHECK (level > 0),
    experience          INT                             NOT NULL    CHECK (experience > 0)
);

CREATE TABLE abilityScores
(
    id                  SERIAL                          NOT NULL    PRIMARY KEY,
    character_id        INT REFERENCES character(id)    NOT NULL,
    type                VARCHAR(3)                      NOT NULL,
    score               INT                             NOT NULL
);
