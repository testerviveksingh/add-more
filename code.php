<?php
session_start();
$con = mysqli_connect("localhost","root","","login");

if(isset($_POST['save_multiple_data']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];
        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO addmore (name,phone) VALUES ('$s_name','$s_phone')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: insert-multiple-data.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: insert-multiple-data.php");
        exit(0);
    }
}
?>