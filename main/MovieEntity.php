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
		array_push($results,new MovieEntity($row[1],$row[2],$row[3],$row[4],$row[5]));
	}
	return $results;
    }

    public function getFullContentMovies() 
    {
	$query = "SELECT * FROM movies";
	$sql_result = mysqli_query($this->conn, $query);
	$results = array();
	while($row = mysqli_fetch_array($sql_result))
	{		
		array_push($results,new MovieEntity($row[1],$row[2],$row[3],$row[4],$row[5]));
	}
	return $results;
    }

    public function createDbTables()
    {
 	$query = "CREATE TABLE movies (id serial PRIMARY KEY, title VARCHAR (80) NOT NULL, premiereDate TIMESTAMP, thumbnailUrl VARCHAR (255), movieDescritpion TEXT, trailerUrl VARCHAR (255));".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Sherlock Holmes', '2013-06-01', 'http://cdn.demo.fabthemes.com/edivos/files/2012/07/sherlock-holmes-a-game-of-shadows-9243-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/watch?v=Egcx63-FfTE');".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('Skyfall','2012-04-12','http://cdn.demo.fabthemes.com/edivos/files/2012/07/skyfall-9350-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/watch?v=6kw1UVovByw');".
		"insert into movies(title, premiereDate, thumbnailUrl, movieDescritpion, trailerUrl) VALUES ('MiB 3','2010-01-30','http://cdn.demo.fabthemes.com/edivos/files/2012/07/men-in-black-3-9260-1024x768-450x280.jpg','Praesent sit amet tellus vitae mauris vehicula euismod. Integer tincidunt placerat blandit! Etiam eleifend ligula at mauris cursus accumsan sollicitudin erat aliquet. Ut faucibus metus rutrum metus auctor quis convallis mauris bibendum. Ut molestie dignissim vulputate! Ut tempus sem ac lacus scelerisque sit amet egestas nisi euismod. Vivamus non orci ac ligula aliquam vestibulum. Sed laoreet, tellus vestibulum convallis sagittis, nisi eros aliquet eros, sit amet bibendum magna enim sit amet ipsum. Duis non dui a enim tincidunt dictum tristique sed est. Donec mauris augue, convallis sed tempor in, vehicula quis metus. Quisque tellus risus, accumsan in bibendum eu, placerat a quam.','https://www.youtube.com/watch?v=IyaFEBI_L24');";
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
		return $this->movieDescription;
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

	public function __construct($title, $premiereDate, $thumbnailUrl, $movieDescritpion, $trailerUrl) {
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
?>