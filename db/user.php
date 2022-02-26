<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";
	class User{
		private $username;
		private $password;
		private $fullname;
		private $email;
		private $phonenumber;
		private $role;
		private $avatar;

		public function __construct($username, $password, $fullname, $email, $phonenumber, $role, $avatar = "/upload/default-user.png"){
			$this->username = $username;
			$this->password = $password;
			$this->fullname = $fullname;
			$this->email = $email;
			$this->phonenumber = $phonenumber;
			$this->role = $role;
			$this->avatar = $avatar;
		}

		public static function find_by_username($username){
			$sql = "SELECT * FROM USER WHERE USERNAME = '".$username."';";
			$result = (new Conn())->execute($sql);
			if($result->num_rows == 0){
				return NULL;
			}
			else {
				$row = $result->fetch_assoc();
				return new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $row["avatar"]);
			}
		}

		public function is_teacher(){
			if($this->role == "teacher")
				return true;
			return false;
		}

		public function check_password($password){
			if($this->password == $password)
				return true;
			return false;
		}

		public static function find_all(){
			$user_array = array();
			$sql = "SELECT * from user";
			$result = (new Conn())->execute($sql);
			while($row = $result->fetch_assoc()){
				array_push($user_array, new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $row["avatar"]));
			}
			return $user_array;
		}

		public static function find_all_student(){
			$user_array = array();
			$sql = "SELECT * FROM user WHERE role = 'student'";
			$result = (new Conn())->execute($sql);
			while($row = $result->fetch_assoc()){
				array_push($user_array, new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $row["avatar"]));
			}
			return $user_array;
		}

		public static function update($username, $password, $fullname, $email, $phonenumber, $role){
			$sql = "UPDATE user SET password = '".$password."', fullname = '".$fullname."', email = '".$email."', phonenumber='".$phonenumber."', role ='".$role."' where username ='".$username."';";
			$result = (new Conn())->execute($sql);
			return $result;
		}

		public static function update_persional($username, $password, $email, $phonenumber, $avatar){
			$sql = "UPDATE user SET password = '".$password."', email = '".$email."', phonenumber='".$phonenumber."', avatar ='".$avatar."' where username ='".$username."';";
			echo $sql;
			$result = (new Conn())->execute($sql);
			return $result;
		}

		public static function insert($username, $password, $fullname, $email, $phonenumber, $role){
			$sql = "INSERT INTO user (username, password, fullname, email, phonenumber, role) VALUES ('".$username."','".$password."','".$fullname."','".$email."','".$phonenumber."','".$role."');";
			return (new Conn())->execute($sql);
		}

		public static function delete($username){
			$sql = "DELETE FROM user WHERE username = '".$username."';";
			return (new Conn())->execute($sql);
		}

		public function get_username(){
			return $this->username;
		}
		public function get_password(){
			return $this->password;
		}

		public function get_fullname(){
			return $this->fullname;
		}

		public function get_email(){
			return $this->email;
		}

		public function get_phonenumber(){
			return $this->phonenumber;
		}

		public function get_avatar(){
			return $this->avatar;
		}
	}
?>