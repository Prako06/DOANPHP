<?php
include "database.php";

?>

<?php
class cartegoty
{

   private $db;


   public function __construct()
   {
       $this ->db = new Database();
   }
   public function insert_cartegory($cartegory_name)
   {
       $query = "INSERT INTO tbl_cartegory (cartegory_name) VALUES ('$cartegory_name')";
       $result = $this->db->insert($query);
       
       return $result;


   }
}
?>