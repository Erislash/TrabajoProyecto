USE medical;

CREATE TABLE users(
    id              INT(255) AUTO_INCREMENT NOT NULL,
    idCardNumber          INT(255)                NOT NULL,
    name            VARCHAR(100)            NOT NULL,
    surname         VARCHAR(255)            NOT NULL,
    email           VARCHAR(100)            NOT NULL,
    user            VARCHAR(100)            NOT NULL,
    password        VARCHAR(100)            NOT NULL,



    birthDate       date                    NOT NULL,
    gender          INT(2)                  NOT NULL,
    
    homePhone       INT       ,
    mobilePhone     INT                     NOT NULL,
    
    legalAddress         VARCHAR(255)    NOT NULL,
    legalPostalCode      VARCHAR(100)    NOT NULL,
    legalCity            VARCHAR(100)    NOT NULL,
    legalState           VARCHAR(100)    NOT NULL,
    legalCountry         VARCHAR(100)    NOT NULL,

    contactAddress           VARCHAR(255)    NOT NULL,
    contactPostalCode        VARCHAR(100)    NOT NULL,
    contactCity              VARCHAR(100)    NOT NULL,
    contactState             VARCHAR(100)    NOT NULL,
    contactCountry           VARCHAR(100)    NOT NULL,
    
    hardwareId      INT(255)    NOT NULL,
    function2       VARCHAR(100)        ,
    function3       VARCHAR (100)       ,
    function4       VARCHAR (100)       ,              
    diagnostics     TEXT         NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email),
    CONSTRAINT uq_idCardNumber UNIQUE(idCardNumber),
    CONSTRAINT uq_hardwareId UNIQUE(hardwareId)
)ENGINE=InnoDb;