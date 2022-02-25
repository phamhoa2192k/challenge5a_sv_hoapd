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

		public function __construct($username, $password, $fullname, $email, $phonenumber, $role, $avatar){
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
				$avatar_path = NULL;
				$row = $result->fetch_assoc();
				$avatar_id = $row["avatar"];
				if(! is_null($avatar_id)){
					$avatar_path = (new Conn())->execute("SELECT filepath FROM file WHERE id = '".$avatar_id."'")->fetch_assoc()["filepath"];
				}
				return new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $avatar_path);
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
				$avatar_id = $row["avatar"];
				if(! is_null($avatar_id)){
					$avatar_path = (new Conn())->execute("SELECT filepath FROM file WHERE id = '".$avatar_id."'")->fetch_assoc()["filepath"];
				}
				array_push($user_array, new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $avatar_path));
			}
			return $user_array;
		}

		public static function find_all_student(){
			$user_array = array();
			$avatar_path = NULL;
			$sql = "SELECT * FROM user WHERE role = 'student'";
			$result = (new Conn())->execute($sql);
			while($row = $result->fetch_assoc()){
				$avatar_id = $row["avatar"];
				if(! is_null($avatar_id)){
					$avatar_path = (new Conn())->execute("SELECT filepath FROM file WHERE id = '".$avatar_id."'")->fetch_assoc()["filepath"];
				}
				array_push($user_array, new User($row["username"], $row["password"], $row["fullname"], $row["email"], $row["phonenumber"], $row["role"], $avatar_path));
			}
			return $user_array;
		}

		public function get_username(){
			return $this->username;
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