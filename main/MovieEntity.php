<?php
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
       
       /**
        * @ORM\Column(type="string", length=255)
        * @var string
        */
	private $thumbnailUrl;

	public function getThumbnailUrl() {
		return $this->thumbnailUrl;
	}

	public function __construct($title, $premiereDate, $thumbnailUrl) {
		$this->title = $title;
		$this->premiereDate = $premiereDate;
		$this->thumbnailUrl = $thumbnailUrl;
	}

	public function __toString() {
        	return $this->title;
    	}
}
?>