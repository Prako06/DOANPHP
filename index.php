<?php
include "header.php";
 include "slider.php";
//include "../admin/class/product_class.php";
include "./admin/database.php";
include_once "./admin/format.php"
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
    public function show_product()
    {

        $query = "SELECT tbl_sanpham.*, tbl_cartegory.cartegory_name
        FROM tbl_sanpham INNER JOIN tbl_cartegory ON tbl_sanpham.cartegory_id = tbl_cartegory.cartegory_id
        
    
        ORDER BY tbl_sanpham.sanpham_ma DESC  ";
        $result = $this->db->select($query);
        return $result;
    }
}
$product = new product();
$fm = new Format();



?>
        <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>

                        <th>Tiêu đề</th>
                        <th>Mã</th>
                        <th>Danh mục</th>
  
                        <th>Giá</th> 
                        <th>Cau hình</th> 
 
                        <th>Ảnh</th>   
               
                        <th>Tùy chỉnh</th>
                    </tr>
                  <?php
                  $show_product = $product ->show_product();
                  if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;

                 
                  ?>
                    <tr>
                        <td> <?php echo $i ?></td>

                        <td> <?php echo $fm -> textShorten($result['sanpham_tieude'],$limit = 30) ;?></td>
                        <td> <?php echo $result['sanpham_ma'] ?></td>
                        <td> <?php echo $result['cartegory_name']  ?></td>
                        <td> <?php echo $result['sanpham_gia']  ?></td>
                        <td> <?php echo $fm -> textShorten($result['sanpham_cauhinh'],$limit = 30) ; ?></td>
                
                        <td> <img style="width: 100px; height: 50px" src="images/<?php echo $result['sanpham_anh'] ?>" alt=""></td>                
                        <td><a href="cart.php?sanpham_ma=<?php echo $result['sanpham_ma'] ?>">Chi Tiết</a>|
                        <a href="cart.php?sanpham_ma=<?php echo $result['sanpham_ma'] ?>">Mua</a></td>
                    </tr>
                    <?php
                     }}
                  ?>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/scripts.js"></script>
</body>
</html>  











<?php
include "footer.php"
?>