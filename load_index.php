<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/database.php');
require_once(__ROOT__ . '/admin/session.php');
require_once(__ROOT__ . '/admin/format.php');
?>

<?php
class index
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }




    public function show_sanpham($sanpham_ma)
    {
        $query = "SELECT *
        FROM tbl_sanpham 
        WHERE tbl_sanpham.sanpham_ma = '$sanpham_ma'
        ORDER BY tbl_sanpham.sanpham_ma DESC  ";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id";
        $result = $this->db->select($query);
        return $result;
    }




    public function makeUrl($string)
    {
        $string = trim($string);
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $string);
        $string = preg_replace("/(đ)/", "d", $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $string);
        $string = preg_replace("/(Đ)/", "D", $string);
        return $string;
    }


    


}


?>