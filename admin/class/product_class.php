<?php
include "database.php";
include_once "format.php"
    ?>

<?php
class product
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $file)
    {
        $sanpham_tieude = $data['sanpham_tieude'];
        $sanpham_ma = $data['sanpham_ma'];
        $cartegory_id = $data['cartegory_id'];
        $sanpham_gia = $data['sanpham_gia'];
        $sanpham_cauhinh = $data['sanpham_cauhinh'];
        $sanpham_anh = $_FILES['sanpham_anh']['name'];
        $upload_image = "uploads/" . $sanpham_anh;
        move_uploaded_file($_FILES['sanpham_anh']['tmp_name'], $upload_image);
        $query = "INSERT INTO tbl_sanpham (
            sanpham_tieude,
            sanpham_ma,
            cartegory_id,
            sanpham_gia,
            sanpham_cauhinh,
            sanpham_anh) 
              VALUES 
              ('$sanpham_tieude',
              '$sanpham_ma',
              '$cartegory_id',
              '$sanpham_gia',
              '$sanpham_cauhinh',
              '$sanpham_anh')";

        $result = $this->db->insert($query);
        return $result;
    }

    public function show_product()
    {

        $query = "SELECT tbl_sanpham.*, tbl_cartegory.cartegory_name
        FROM tbl_sanpham INNER JOIN tbl_cartegory ON tbl_sanpham.cartegory_id = tbl_cartegory.cartegory_id
        
    
        ORDER BY tbl_sanpham.sanpham_ma DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_sanpham($sanpham_ma)
    {
        $query = "SELECT * FROM tbl_sanpham WHERE sanpham_ma = '$sanpham_ma'";
        $result = $this->db->select($query);
        return $result;
    }


    public function update_product($data, $file, $sanpham_ma)
    {
        $sanpham_tieude = $data['sanpham_tieude'];
        $sanpham_ma = $data['sanpham_ma'];
        $cartegory_id = $data['cartegory_id'];
        $sanpham_gia = $data['sanpham_gia'];
        $sanpham_cauhinh = $data['sanpham_cauhinh'];
        $sanpham_anh = $_FILES['sanpham_anh']['name'];
        $upload_image = "uploads/" . $sanpham_anh;
        move_uploaded_file($_FILES['sanpham_anh']['tmp_name'], $upload_image);
        $query = "UPDATE tbl_sanpham SET                            
                sanpham_tieude = '$sanpham_tieude', 
                sanpham_ma = '$sanpham_ma', 
                cartegory_id = '$cartegory_id', 
                sanpham_gia = '$sanpham_gia',
                sanpham_cauhinh = '$sanpham_cauhinh',
                sanpham_anh ='$sanpham_anh'
                WHERE sanpham_ma = '$sanpham_ma'";
        $result = $this->db->update($query);
        // if ($this->db->update($query) === TRUE) {
        //     echo "update thành công";
        // } else {
        //     echo "Update thất bại: " . $this->db->error;
        // }
        header('Location:productlist.php');
        return $result;
    }






    public function delete_product($sanpham_ma)
    {
        $query = "DELETE  FROM tbl_sanpham WHERE sanpham_ma = '$sanpham_ma'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class = 'alert-style'> Delete Thành công</span> ";
            return $alert;
        } else {
            $alert = "<span class = 'alert-style'> Delete Thất bại</span>";

            $alert = "<span class = 'alert-style'> Delete Thất bại</span>";
            return $alert;
        }



    }


    public function show_order()
    {
        $query = "SELECT tbl_order.*, tbl_payment.*,tbl_diachi.*
    FROM tbl_order INNER JOIN tbl_payment ON tbl_order.session_idA = tbl_payment.session_idA
    INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
    WHERE tbl_payment.statusA = 0
    ORDER BY tbl_payment.payment_id DESC   ";
        $result = $this->db->selectdc($query);
        return $result;
    }

    public function show_order_detail($order_ma)
    {
        $query = "SELECT * FROM tbl_carta WHERE session_idA = '$order_ma' ORDER BY carta_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_order_done()
    {
        $query = "SELECT tbl_order.*, tbl_payment.*,tbl_diachi.*
    FROM tbl_order INNER JOIN tbl_payment ON tbl_order.session_idA = tbl_payment.session_idA
    INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
    WHERE tbl_payment.statusA = 1
    ORDER BY tbl_payment.payment_id DESC   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_order($status, $session_idA)
    {
        $query = "UPDATE tbl_payment SET statusA = '$status' WHERE session_idA = '$session_idA'";
        $result = $this->db->update($query);
        // header('Location:orderlist.php');
        return $result;

    }
    public function show_orderAll()
    {
        $query = "SELECT tbl_order.*, tbl_payment.*,tbl_diachi.*
    FROM tbl_order INNER JOIN tbl_payment ON tbl_order.session_idA = tbl_payment.session_idA
    INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
    ORDER BY tbl_payment.payment_id DESC   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_payment($session_idA)
    {
        $query = "DELETE  FROM tbl_payment WHERE session_idA = '$session_idA'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function delete_order($session_idA)
    {
        $query = "DELETE  FROM tbl_order WHERE session_idA = '$session_idA'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function delete_cart($session_idA)
    {
        $query = "DELETE  FROM tbl_carta WHERE session_idA = '$session_idA'";
        $result = $this->db->delete($query);
        return $result;
    }
}


?>