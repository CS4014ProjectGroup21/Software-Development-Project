<?php 

class Task {
	
	private $title;
	private $type;	
	private $description;	
	private $tags;	
	private $numPages;	
	private $numWords;	
	private $fileFormat;
	private $authorID;
	private $claimerID;
	private $claimDate;
	private $completionDate;
	
	
	function set_title($title) { $this->title = $title; }
	function get_title() { return $this->title;}	
	function set_type($type) { $this->type = $type; }
	function get_type() { return $this->type;}
	function set_description($description) { $this->description = $description; }
	function get_description() { return $this->description; }
	function set_tags($tags) { $this->tags = $tags; }
	function get_tags() { return $this->tags;}
	function set_numPages($numPages) { $this->numPages = $numPages; }
	function get_numPage() { return $this->numPages;}
	function set_numWords($numWords) { $this->numWords = $numWords; }
	function get_numWords() { return $this->numWords;}	
	function set_fileFormat($fileFormat) { $this->fileFormat = $fileFormat; }
	function get_fileFormat() { return $this->fileFormat;}
	function set_authorID($authorID) { $this->authorID = $authorID; }
	function get_authorID() { return $this->authorID; }
	function set_claimerID($claimerID) { $this->claimerID = $claimerID; }
	function get_claimerID() { return $this->claimerID; }
	function set_claimDate($claimDate) { $this->claimDate = $claimDate; }
	function get_claimDate() { return $this->claimDate;}
	function set_completionDate($completionDate) { $this->completionDate = $completionDate; }
	function get_completionDate() { return $this->completionDate;}

	
	
	
}


?>