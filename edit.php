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

    $this_id = $_GET['this_id'];

    echo $this_id;

    $sql = "SELECT * FROM table_students WHERE id = ".$this_id;

    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);

    //khi nhấn nút edit
    if(isset($_POST['vbd']) ){

       $fullname= $_POST['fullname'];
       
       $dob= $_POST['dob'];

       $gender= $_POST['gender'];

       $hometown= $_POST['hometown'];

       $level= $_POST['level'];

       $group= $_POST['group'];

       $sql = "UPDATE table_students SET fullname = '$fullname', dob = '$dob', gender = '$gender', hometown = '$hometown', level = '$level',`group` = '$group' WHERE id = ".$this_id ;

       mysqli_query($conn, $sql);
       
       header('location: product.php');

    }


?>

<h1>Sinh viên: <?php echo $row['fullname']; ?> 

</h1>

<form method="post" enctype="multipart/form-data">

<p>Fullname</p>
    <input type="text" name="fullname" value="<?php echo ($row['fullname']); ?>">

    <p>Dob</p>
    <input type="date" name="dob" value="<?php echo ($row['dob']); ?>">

    <p>Gender</p>
    <label>
        <input type="radio" name="gender" value="1" <?php echo $row['gender'] == 1 ? 'checked' : ''; ?>> Nam
    </label>
    <label>
        <input type="radio" name="gender" value="0" <?php echo $row['gender'] == 0 ? 'checked' : ''; ?>> Nữ
    </label>

    <p>Hometown</p>
    <input type="text" name="hometown" value="<?php echo ($row['hometown']); ?>">

    <p>Level</p>
    <select name="level" required>
        <option value="0" <?php echo $row['level'] == 0 ? 'selected' : ''; ?>>Tiến sĩ</option>
        <option value="1" <?php echo $row['level'] == 1 ? 'selected' : ''; ?>>Thạc sĩ</option>
        <option value="2" <?php echo $row['level'] == 2 ? 'selected' : ''; ?>>Kỹ sư</option>
        <option value="3" <?php echo $row['level'] == 3 ? 'selected' : ''; ?>>Khác</option>
    </select>

    <p>Group</p>
    <select name="group" required>
        <option value="1" <?php echo $row['group'] == 1 ? 'selected' : ''; ?>>Nhóm 1</option>
        <option value="2" <?php echo $row['group'] == 2 ? 'selected' : ''; ?>>Nhóm 2</option>
        <option value="3" <?php echo $row['group'] == 3 ? 'selected' : ''; ?>>Nhóm 3</option>
    </select>
     
    <br><br>
    <button name="vbd">Sửa</button>



</form>