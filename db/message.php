<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/db/connection.php";

	class Message {
		private $id;
		private $sender_username;
		private $recipient_username;
		private $content;
		private $time;

		public function __construct($id, $sender_username, $recipient_username, $content, $time){
			$this->id = $id;
			$this->sender_username = $sender_username;
			$this->recipient_username = $recipient_username;
			$this->content = $content;
			$this->time = $time;
		}

		public static function get_conversation($username1, $username2){
			$sql = "SELECT * from message where (sender_username = '".$username1."' and recipient_username = '".$username2."') or ( sender_username = '".$username2."' and recipient_username = '".$username1."') order by time ASC;";
			$result = (new Conn)->execute($sql);
			$conversation = array();
			if($result->num_rows == 0){
				return NULL;
			}
			else {
				while($row = $result->fetch_assoc()){
					array_push($conversation, new Message($row["id"], $row["sender_username"], $row["recipient_username"], $row["content"], $row["time"]));
				}
				return $conversation;
			}
		}

		public static function send_message($sender_username, $recipient_username, $content){
			$sql = "INSERT INTO message (sender_username, recipient_username, content) VALUES ('".$sender_username."','".$recipient_username."','".$content."');";
			return (new Conn)->execute($sql);
		}

		public function get_sender_username(){
			return $this->sender_username;
		}

		public function get_recipient_username(){
			return $this->recipient_username;
		}

		public function get_time(){
			return $this->time;
		}

		public function get_content(){
			return $this->content;
		}

		public function get_id(){
			return $this->id;
		}
	}
?>