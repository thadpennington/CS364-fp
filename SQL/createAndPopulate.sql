CREATE TABLE Users (
    firstName VARCHAR(15),
    lastName VARCHAR(15),
    username VARCHAR(15) NOT NULL,
    password_hash VARCHAR(64),
    email VARCHAR(50),
    salt VARCHAR(32),

    PRIMARY KEY (username)
);

CREATE TABLE Posts (
    id int NOT NULL,
    instructor VARCHAR(30) NOT NULL,
    course VARCHAR(15) NOT NULL,
    rating int NOT NULL,
    content VARCHAR(1024) NOT NULL,
    user VARCHAR(15),

    FOREIGN KEY (user) REFERENCES Users(username),
    PRIMARY KEY (id)
);

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (1, 'Joel Coffman', 'CS 350', 2, 'It was alright I guess...');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (2, 'James Maher', 'CS 483', 4, 'I believe in Ubuntu Linux supremacy. Good course.');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (3, 'James Maher', 'CS 483', 1, 'Personally, I prefer Windows 11. Was not a fan');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (4, 'Samuel Kiekhaefer', 'CS 380', 2, 'NP reductions make no sense!');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (5, 'Samuel Kiekhaefer', 'CS 380', 3, 'It is another beautiful sunshiney day at the United States Air Force Academy!');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (6, 'Joel Coffman', 'CS 350', 5, 'What an absolute legend. Nuff said.');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (7, 'Benjamin McGraw', 'CS 474', 5, 'Rasterization was SOO cool!');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (8, 'Shannon Beck', 'CS 467', 2, 'Wireshark has taught me to be unethical >:)');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (9, 'Steven Hadfield', 'CS 330', 5, 'Though I was not particularly fond of DrRacket and AMZI! ProLog, the Java was quite enjoyable. I now understand OOP.');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (10, 'Adrian de Freitas', 'CS 220', 4, 'PEXs were great except for PEX5. I did not like implementing Dijkstra.');

INSERT INTO Posts (id, instructor, course, rating, content)
VALUES (11, 'Adrian de Freitas', 'CS 110', 2, 'Computers are not really my thing and the course material did nothing but confuse me. Not good.');

INSERT INTO Users (firstName, lastName, username, password_hash, email, salt)
VALUES ('Thad', 'Pennington', 'thadpen', 'e36f2a78b727f3765a61d05b523d86cbc10f64c5423f1535ea9a0ac96702d3bf', 'thad@airforce.com', '6a93295759b00358ff7a3eb911140788');

INSERT INTO Users (firstName, lastName, username, password_hash, email, salt)
VALUES ('Nicholas', 'Race', 'nickrace', '50c2e3eb938daa5e4f8d5faa523347238f6e1dea500b454351048674991c2e96', 'nick@airforce.com', 'acba28262ab4950de8d349d0b4dc002f');

INSERT INTO Users (firstName, lastName, username, password_hash, email, salt)
VALUES ('Joe', 'Cates-Beier', 'jcb', 'f9bd5e21a23829d51dea08f0e63b88bece0508e9f180aa62214c195a19f4a21d', 'joe@airforce.com', 'b6027552f76e05af8773e1da1fd96a86');








