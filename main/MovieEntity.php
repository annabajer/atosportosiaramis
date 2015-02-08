<?php

include('parameters.php');

final class Database
{
    
    private static $oInstance = false;
			
    public static function getInstance()
    {
        if( self::$oInstance == false )
        {
            self::$oInstance = new Database();
        }
        return self::$oInstance;
    }

    public function getSliderMovies() 
    {
	$query = "SELECT * FROM movies";
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,new MovieEntity($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
	}
	return $results;
    }

    public function getFullContentMovies($genre = NULL) 
    {
	if ($genre == NULL) {
		$query = "SELECT * FROM movies";
	} else {
		$query = "SELECT DISTINCT movies.* FROM movies inner join movie_genres on movie_genres.movie_id=movies.id where movie_genres.genre_id in (".$genre.")";
	}
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,new MovieEntity($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
	}
	return $results;
    }


    public function getMovieDetails($movie_id) 
    {
	$query = 'SELECT * FROM movies where id='.$movie_id;
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,new MovieEntity($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
	}
	return $results[0];
    }

    public function getMovieGenre($movie_id) 
    {
	$query = "SELECT genres.text FROM movie_genres inner join genres on genres.id=movie_genres.genre_id where movie_genres.movie_id=".$movie_id;
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,$row[0]);
	}
	return $results;
    }

    public function getMovieReviews($movie_id) 
    {
	$query = "SELECT * FROM reviews where movie_id=".$movie_id;
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,$row[0]);
	}
	return $results;
    }

    public function getAllGenres() 
    {
	$query = "SELECT * FROM genres";
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,$row);
	}
	return $results;
    }
	
	public function validateUserPassword($user, $pass)
	{
		$query = "SELECT * from users where username='".$user."' and password='".$pass."';";
		$sql_result = mysqli_query($this->conn, $query);
		if (mysqli_fetch_array($sql_result)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function addReview($movie_id,$user_id,$stars,$title,$text,$date)
	{
		$query = "insert into reviews(movie_id,user_id,stars,title,text,date) VALUES ('".$movie_id."','".$user_id."','".$stars."','".$title."', '".$text."', '".$date."');";
		//echo ($query);
		mysqli_query($this->conn, $query);
	}


    public function createDbTables()
    {
 	$all_queries = "DROP TABLE movie_genres;".
		"DROP TABLE reviews;".
		"DROP TABLE movies;".
		"DROP TABLE genres;".
		"DROP TABLE users;".
		"CREATE TABLE movies (id serial PRIMARY KEY, title VARCHAR (80) NOT NULL, premiereDate TIMESTAMP, thumbnailUrl VARCHAR (255), movieDescritpion TEXT, trailerUrl VARCHAR (255));".
		"CREATE TABLE genres (id serial PRIMARY KEY, text VARCHAR (25) NOT NULL);".
		"INSERT INTO genres(text) VALUES ('Action');".
		"INSERT INTO genres(text) VALUES ('Comedy');".
		"INSERT INTO genres(text) VALUES ('Super hero');".
		"INSERT INTO genres(text) VALUES ('Thriller');".
		"INSERT INTO genres(text) VALUES ('Sci-Fi');".
		"INSERT INTO genres(text) VALUES ('Animation');".
		"INSERT INTO genres(text) VALUES ('Fiction');".
		"INSERT INTO genres(text) VALUES ('Horror');".
		"INSERT INTO genres(text) VALUES ('Drama');".
		"CREATE TABLE movie_genres (id serial PRIMARY KEY, movie_id BIGINT UNSIGNED, genre_id BIGINT UNSIGNED, FOREIGN KEY(movie_id) REFERENCES movies(id), FOREIGN KEY(genre_id) REFERENCES genres(id));".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Sherlock Holmes', '2013-06-01', 'http://cdn.demo.fabthemes.com/edivos/files/2012/07/sherlock-holmes-a-game-of-shadows-9243-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/Egcx63-FfTE');".
		"insert into movie_genres(movie_id,genre_id) VALUES (1,1);".
		"insert into movie_genres(movie_id,genre_id) VALUES (1,2);".
		"insert into movie_genres(movie_id,genre_id) VALUES (1,3);".
		"insert into movie_genres(movie_id,genre_id) VALUES (1,4);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Skyfall','2012-04-12','http://cdn.demo.fabthemes.com/edivos/files/2012/07/skyfall-9350-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/6kw1UVovByw');".
		"insert into movie_genres(movie_id,genre_id) VALUES (2,1);".
		"insert into movie_genres(movie_id,genre_id) VALUES (2,3);".
		"insert into movie_genres(movie_id,genre_id) VALUES (2,4);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('MiB 3','2010-01-30','http://cdn.demo.fabthemes.com/edivos/files/2012/07/men-in-black-3-9260-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/IyaFEBI_L24');".
		"insert into movie_genres(movie_id,genre_id) VALUES (3,5);".
		"insert into movie_genres(movie_id,genre_id) VALUES (3,3);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Ghost Project','2012-03-12','http://cdn.demo.fabthemes.com/edivos/files/2012/07/mission-impossible-ghost-protocol-9254-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/V0LQnQSrC-g');".
		"insert into movie_genres(movie_id,genre_id) VALUES (4,1);".
		"insert into movie_genres(movie_id,genre_id) VALUES (4,4);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('American Reunion','2010-01-22','http://cdn.demo.fabthemes.com/edivos/files/2012/07/american-reunion-9281-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/clwJtIzR-Xk');".
		"insert into movie_genres(movie_id,genre_id) VALUES (5,2);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('A thousand worlds','2008-12-22','http://cdn.demo.fabthemes.com/edivos/files/2012/07/a-thousand-words-9293-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/m2MO_ID4ltA');".
		"insert into movie_genres(movie_id,genre_id) VALUES (6,2);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Piranah 3DD','2013-06-12','http://cdn.demo.fabthemes.com/edivos/files/2012/07/piranha-3d-the-sequel-9355-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/eRP1F8qLFn0');".
		"insert into movie_genres(movie_id,genre_id) VALUES (7,2);".
		"insert into movie_genres(movie_id,genre_id) VALUES (7,3);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Project X','2011-06-18','http://cdn.demo.fabthemes.com/edivos/files/2012/07/project-x-9269-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/1Rl1TJG17Wk');".
		"insert into movie_genres(movie_id,genre_id) VALUES (8,2);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Hobbit','2013-02-10','http://cdn.demo.fabthemes.com/edivos/files/2012/07/the-hobbit_-an-unexpected-journey-9252-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/G0k3kHtyoqc');".
		"insert into movie_genres(movie_id,genre_id) VALUES (9,7);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Ice Age','2012-06-28','http://cdn.demo.fabthemes.com/edivos/files/2012/07/ice-age-continental-drift-9351-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/TzzGPfVx32M');".
		"insert into movie_genres(movie_id,genre_id) VALUES (10,6);".
		"insert into movie_genres(movie_id,genre_id) VALUES (10,2);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Battleship','2010-02-16','http://cdn.demo.fabthemes.com/edivos/files/2012/07/battleship-9264-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/qDMXkPfxjOc');".
		"insert into movie_genres(movie_id,genre_id) VALUES (11,5);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Dictator','2013-03-10','http://cdn.demo.fabthemes.com/edivos/files/2012/07/the-dictator-9331-1024x768-165x110.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/E-2PVh-Ht3U');".
		"insert into movie_genres(movie_id,genre_id) VALUES (12,2);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Avengers','2012-10-10','http://cdn.demo.fabthemes.com/edivos/files/2012/07/wyndhamavengerslarge8-165x110.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/embed/eOrNdBpGMv8');".
		"insert into movie_genres(movie_id,genre_id) VALUES (13,1);".
		"insert into movie_genres(movie_id,genre_id) VALUES (13,3);".
		"insert into movie_genres(movie_id,genre_id) VALUES (13,5);".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Serena','2015-01-20','http://1.fwcdn.pl/contest/4651.4.jpg','George i Serena osiadają w Karolinie Północnej. Wykorzystując naturalne zasoby lasów, rozwijają imperium składów drewna. Serena, dzięki swojej przedsiębiorczości i kierowniczym umiejętnościom, może dorównać każdemu mężczyźnie w zarządzaniu posiadłością i majątkiem. Wspólnie z mężem stanowią znakomitą parę, której nic nie jest w stanie przeszkodzić w realizacji wspólnych planów i ambicji. Niestety przyszłość imperium składów drewna George’a Pembertona staje pod znakiem zapytania, kiedy okazuje się, że żona potentata jest bezpłodna. Wszystko wskazuje na to, że spadek przypadnie nieślubnemu synowi męża. Serena, nie zamierza pogodzić się z takim stanem rzeczy.','https://www.youtube.com/embed/lITvFNhoxek');".
		"insert into movie_genres(movie_id,genre_id) VALUES (14,9);".
		"CREATE TABLE reviews (id serial PRIMARY KEY, movie_id BIGINT UNSIGNED, user_id BIGINT UNSIGNED, stars SMALLINT, title TEXT, text TEXT, date DATE,  FOREIGN KEY(movie_id) REFERENCES movies(id), FOREIGN KEY(genre_id) REFERENCES genres(id));".
		"insert into reviews(movie_id,user_id,stars,title,text,date) VALUES (1,1,8,'Dobry film', 'Jest wiele film�w, kt�re potrafi� wywo�a� ciarki na plecach b�d� sprawi�, �e serce zaczyna bi� szybciej lub �e pier� wype�nia g��boki oddech. Znajdzie si� tak�e kilka produkcji, kt�re wycisn� z oczu �zy, albo wywo�aj� szczery u�miech na twarzy', '2014-12-12');";
		"CREATE TABLE users (id serial PRIMARY KEY, username VARCHAR (80) NOT NULL, password VARCHAR (80) NOT NULL);".
		"insert into users (username, password) VALUES ('user', 'pass');".
		"insert into users (username, password) VALUES ('Mariola', 'huragan');".
		"insert into users (username, password) VALUES ('ktokolwiek', 'cokolwiek');";
	

	$queries = preg_split("/;+(?=([^'|^\\\']*['|\\\'][^'|^\\\']*['|\\\'])*[^'|^\\\']*[^'|^\\\']$)/", $all_queries); 
	foreach ($queries as $query){ 
   		mysqli_query($this->conn, $query);
	} 
    }
	
    private $conn;

    private function __construct() {
	$servername = "sbazy.uek.krakow.pl";
	$username = "s168932";
	$password = "izDjWMvY";
        $database = "s168932";

	$this->conn = mysqli_connect($servername, $username, $password, $database);
	if (!$this->conn) {
	    die('<div class="alert alert-danger" role="alert">Connection failed: '.mysqli_connect_error().'</div>');
	}
    }	
}

/**
 * @Entity
 */
class MovieEntity
{
       /**
     	* @ORM\Id()
     	* @ORM\Column(type="integer")
     	* @ORM\GeneratedValue(strategy="AUTO")
     	* @var int
     	*/
    	private $id;
	public function getId() {
		return $this->id;
	}
	
	private $title;
	public function getTitle() {
		return $this->title;
	}
	
       /** 
	*  @ORM\Column(type="datetime")
        *  @var datetime
        */
        private $premiereDate;
 
	public function getPremiereDate() {
		return $this->premiereDate;
	}

	private $movieDescritpion;

	public function getMovieDescription() {
		return $this->movieDescritpion;
	}

	private $trailerUrl;

	public function getTrailerUrl() {
		return $this->trailerUrl;
	}

       /**
        * @ORM\Column(type="string", length=255)
        * @var string
        */
	private $thumbnailUrl;
	public function getThumbnailUrl() {
		return $this->thumbnailUrl;
	}

	public function __construct($id, $title, $premiereDate, $thumbnailUrl, $movieDescritpion, $trailerUrl) {
		$this->id = $id;
		$this->title = $title;
		$this->premiereDate = $premiereDate;
		$this->thumbnailUrl = $thumbnailUrl;
		$this->movieDescritpion = $movieDescritpion;
		$this->trailerUrl = $trailerUrl;
	}

	public function __toString() {
        	return $this->title;
    	}
}

/**
 * @Entity
 */
class UserEntity
{
	/**
	* @ORM\Id()
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	* @var int
	*/
	private $id;
	public function getId() {
		return $this->id;
	}
	
	private $username;
	public function getUsername() {
		return $this->username;
	}
	
	private $password;
	public function getPassword() {
		return $this->password;
	}
	
	public function __construct($id, $username, $password) {
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
	}
}
?>