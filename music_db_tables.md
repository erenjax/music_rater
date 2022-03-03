```
Emily Ren Jackson, COMP333
Music Database 
sql commands 
```

```sql
CREATE TABLE users (username TEXT default NULL, 
    _password TEXT);

INSERT INTO users (username, _password)
    VALUES ("Amelia-Earhart", "Youaom139&yu7");
INSERT INTO users (username, _password)
    VALUES ("Otto", "StarWars2*");
```

```sql
CREATE TABLE ratings_table (id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username TEXT,
    song TEXT,
    rating INTEGER);

INSERT INTO ratings_table (id, username, song, rating)
    VALUES (1, "Amelia-Earhart", "Freeway", 3);
INSERT INTO ratings_table (id, username, song, rating)
    VALUES (2, "Amelia-Earhart", "Days of Wine and Roses", 4);
INSERT INTO ratings_table (id, username, song, rating)
    VALUES (3, "Otto", "Days of Wine and Roses", 5);
INSERT INTO ratings_table (id, username, song, rating)
    VALUES (4, "Amelia-Earhart", "These Walls", 4);
```

```sql
CREATE TABLE artists_table (song TEXT default NULL,
    artist TEXT);

INSERT INTO artists_table (song, artist)
    VALUES ("Freeway", "Aimee Mann");
INSERT INTO artists_table (song, artist)
    VALUES ("Days of Wine and Roses", "Bill Evans");
INSERT INTO artists_table (song, artist)
    VALUES ("These Walls", "Kendrick Lamar");
```