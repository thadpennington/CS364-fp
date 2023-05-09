CREATE TABLE Users (
    username VARCHAR(15),
    password_hash VARCHAR(32),
    email VARCHAR(50),

    PRIMARY KEY (username)
);

CREATE TABLE Posts (
    id int,
    instructor VARCHAR(30),
    course VARCHAR(15),
    rating int,
    content VARCHAR(1024),
    user VARCHAR(15),

    FOREIGN KEY (user) REFERENCES Users(username),
    PRIMARY KEY (id)
);