<?php
include "header.php";
include "./admin/database.php";
include_once "./admin/format.php"
    ?>


<?php
class user
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function register()
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['pass2']);
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Điển password  pls");
        }
        if ($password == $password2) {
            array_push($errors, "Two password do not match");
        }


        
        $sql = "SELECT * FROM tbl_user WHERE username = '$username'";

        $result = $this->db->select($sql);

        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
        if ($username == ($result) ) {
            echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

            // Dừng chương trình
            die();
        } else {


            $query = "INSERT INTO tbl_user (username, pass) VALUES ('$username','$password')";
            $result = $this->db->select($query);
            return $result;
        }
    }
}
$user = new user();
$fm = new Format();
?>


<?php
$user = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangky'])) {
    $register = $user -> register();
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <form method="POST" action="register.php" class="form">

        <h2>Đăng ký thành viên</h2>

        Username: <input type="text" name="username" value="" required>

        Password: <input type="text" name="password" value="" required />

        Nhập lại pass: <input type="text" name="pass2" value="" required />

        <input type="submit" name="dangky" value="Đăng Ký" />


    </form>
</body>

</html>