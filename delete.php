<?php 
    
    include"connect.php";

    $this_id = $_GET['this_id'];

    echo $this_id;

    $sql = " DELETE FROM table_students WHERE id='$this_id' ";

    mysqli_query($conn, $sql);

    header( 'locatin: product.php');

?>