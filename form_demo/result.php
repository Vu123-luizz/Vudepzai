<?php
$errors = [];

$name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$age = trim($_POST['age'] ?? '');
$gender = $_POST['gender'] ?? '';
$hobbies = $_POST['hobbies'] ?? [];
$note = $_POST['note'] ?? '';

if ($name === '') $errors[] = "Vui lòng nhập họ tên";
if ($email === '') $errors[] = "Vui lòng nhập email";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email không hợp lệ";

if ($age === '') $errors[] = "Vui lòng nhập tuổi";
elseif (!is_numeric($age) || $age < 10 || $age > 80) $errors[] = "Tuổi phải từ 10 - 80";

if ($gender === '') $errors[] = "Vui lòng chọn giới tính";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Kết quả</title>
<style>

body{
    margin:0;
    height:100vh;
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Segoe UI;
}

.box{
    width:520px;
    background:rgba(255,255,255,0.2);
    padding:30px;
    border-radius:18px;
    color:white;
    backdrop-filter:blur(12px);
    animation:fade .7s ease;
}

@keyframes fade{
    from{opacity:0; transform:scale(0.95);}
    to{opacity:1; transform:scale(1);}
}

h2{
    text-align:center;
    margin-top:0;
}

.success{ color:#4ade80;}
.error{ color:#f87171;}

ul{ font-size:17px; }

a{
    display:inline-block;
    margin-top:16px;
    padding:10px 18px;
    background:#2563eb;
    text-decoration:none;
    color:white;
    border-radius:12px;
}
a:hover{
    background:#1e40af;
}
</style>
</head>

<body>
<div class="box">

<?php
if ($errors) {
    echo "<h2 class='error'>❌ Thông báo lỗi</h2>";
    echo "<ul>";
    foreach($errors as $e) echo "<li>$e</li>";
    echo "</ul>";
    echo '<a href="form.html">Quay lại</a>';
} else {
    echo "<h2 class='success'>✔ Thông tin hợp lệ</h2>";
    echo "<b>Họ tên:</b> $name <br>";
    echo "<b>Email:</b> $email <br>";
    echo "<b>Tuổi:</b> $age <br>";
    echo "<b>Giới tính:</b> $gender <br>";
    echo "<b>Sở thích:</b> " . ($hobbies ? implode(", ", $hobbies) : "Không có") . "<br>";
    echo "<b>Ghi chú:</b> $note <br>";
    echo '<a href="form.html">Nhập lại</a>';
}
?>

</div>
</body>
</html>
