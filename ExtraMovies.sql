INSERT INTO rating (ratingName) 
VALUES ('G');

INSERT INTO genre (genre_name) 
VALUES ('Action'),
('Sci-Fi'),
('Animation');

INSERT INTO director (firstname, lastname) 
VALUES ('Gareth','Edwards'),
('Anthony','Russo'),
('Hiroshi','Haraguchi'),
('Joe','Johnston'),
('James','Cameron'),
('Chris','Columbus');

INSERT INTO movie (title,yearCreated,length,directorID,GenreID,RatingID)
VALUES ('Godzilla',2014,123,4,4,1),
('Avengers Endgame',2019,181,5,5,1),
('Evangelion: 1.0 You Are (Not) Alone',2007,98,6,6,1),
('Jurassic Park III',2001,92,7,4,1),
('Terminator 2: Judgment Day',1991,137,8,5,3),
('Home Alone',1990,103,9,1,2);
UPDATE movie
SET plot='some plot' 
WHERE plot IS NULL;
UPDATE movie SET title='School of Rock' WHERE movieID = 1;
UPDATE movie SET title='Five Nights at Freddys' WHERE movieID = 3;