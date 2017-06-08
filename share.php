<?php



class Share {

 protected $db=null;
 protected $dbname = 'test';
 protected $username = 'root';
 protected $password = 'root';

 public function __construct()
 {
     $this->db=new PDO("mysql:host=127.0.0.1;dbname=$this->dbname",$this->username,$this->password);
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }

 public function calculateShare($userId,$amount)
 {
     $result=$this->db->prepare("SELECT `parent_id` FROM `user_refers` WHERE `user_id`=?");
     $result->execute(array($userId));
     //parentId exists
     if($result->rowCount()){
         $data = $result->fetch(PDO::FETCH_OBJ);
         $this->insertShare([$data->parent_id,$amount]);
         //recusrsive call
         $this->calculateShare($data->parent_id,$amount/2);
     }
 }
 public function insertShare($data)
 {
     $result=$this->db->prepare("INSERT INTO amount (`user_id`,`amount`) VALUES (?,?)");
     $result->execute($data);

     echo ($result->rowCount())?'Amount added <br>':"An error occured";
 }
 public function addReferals($data)
 {
     $result=$this->db->prepare("INSERT INTO user_refers (`parent_id`,`user_id`) VALUES (?,?)");
     $result->execute($data);

     echo ($result->rowCount())?'Referal added':'An error occured';


 }
}


