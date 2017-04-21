<?php

class User {
	
	private $id;
	private $email;
	private $name;
	private $surname;
	private $password;
	private $subject;
	private $dob;
	
	function set_id($id) {$this->id = $id;}
	function get_id() { return $this->id; }
	function set_email($email) { $this->email = $email; }
	function get_email() { return $this->email; }
	function set_name($name) { $this->name = $name; }
	function get_name() { return $this->name; }
	function set_surname($surname) { $this->surname = $surname; }
	function get_surname() { return $this->surname; }
	function set_password($password) { $this->password = $password; }
	function get_password() { return $this->password; }
	function set_subject($subject) { $this->subject = $subject; }
	function get_subject() { return $this->subject; }
	function set_dob($dob) { $this->dob = $dob; }
	function get_dob() { return $this->dob; }
	function get_string() {
		$string = "(".$this->name.", ".$this->surname.", ".$this->email.", ".$this->id.", ".$this->password.", ".$this->dob.")";
		return $string;
	}
	
	
}

?>