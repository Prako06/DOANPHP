<?php
$conn = mysqli_connect('localhost', 'root', '', 'website_undertale') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");
if (isset($_POST['dangky'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password2 =trim($_POST['password2']);
}
$errors =[];
if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($password)) {
    array_push($errors, "Điển password  pls");
}
if ($password == $password2) {
    array_push($errors, "Two password do not match");
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";



$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0) {
    echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

    // Dừng chương trình
    die();
} else {
    $sql = "INSERT INTO tbl_user (username, pass) VALUES ('$username','$password')";
    echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="register.php";</script>';

    if (mysqli_query($conn, $sql)) {
        echo "Tên đăng nhập: " . $_POST['username'] . "<br/>";
        echo "Mật khẩu: " . $_POST['pass'] . "<br/>";
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
    }
}
?>