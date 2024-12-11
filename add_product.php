<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sủa thông tin sinh viên</title>
    <link rel="stylesheet" href="style.css">
</head>


<?php 
    
    include"connect.php";
    if(isset($_POST['vbd'] ) ) {
        
        $fullname =($_POST['fullname']);

        $dob = $_POST['dob'];

        $gender = ($_POST ['gender']);

        $hometown = ($_POST ['hometown']);

        $level = ($_POST ['level']);

        $group = ($_POST ['group']);

        $sql ="INSERT INTO table_students (fullname, dob, gender, hometown, level,  `group`)
        VALUE('$fullname' , '$dob' , '$gender' , '$hometown' , '$level' ,  '$group')";

        mysqli_query($conn, $sql);

        header('location: product.php');


    }



?>

<form action="add_product.php" method="post" enctype="multipart/form-data">
<p> Fullname </p>
    <input type="text" name = "fullname">

    <p> Dob </p>
    <input type="date" name = "dob">

    <p> Gender </p>
    <label><input type="radio" name="gender" value="1" required> Nam</label>
    <label><input type="radio" name="gender" value="0" required> Nữ</label>

    <p> Hometown </p> 
    <input type= "text" name = "hometown">

    <p> Level </p>
    <select name="level" required>
        <option value="Tiến sĩ">Tiến sĩ</option>
        <option value="1">Thạc sĩ</option>
        <option value="2">Kỹ sư</option>
        <option value="3">Khác</option>
    </select>

    <p> Group </p>
    <select name="group" required>
        <option value="1">Nhóm 1</option>
        <option value="2">Nhóm 2</option>
        <option value="3">Nhóm 3</option>
    </select>
     
    <br></br>
    <button id="submit" name = "vbd"> Gửi </button>
</form>