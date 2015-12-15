<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 14/12/2015
 * Time: 11:20
 */

namespace Orm\Entity;

use Orm\Orm\QueryManager;

class User extends QueryManager{
	private $username;
	private $mail;
	private $password;
	private $table = 'user';


	/** GETTER AND SETTER*/
	public function getPassword() {
		return $this->password;
	}

	public function setPassword( $password ) {
		$this->password = $password;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername( $username ) {
		$this->username = $username;
	}


	public function getMail() {
		return $this->email;
	}

	public function setMail( $mail ) {
		$this->email = $mail;
	}

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function getTable() {
		return $this->table;
	}

	public function deleteByID() {
		$this->delete($this); //
	}

	public function save(){
		$this->persist($this);
	}

	/** */
}