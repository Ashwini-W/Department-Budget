<?php

if(isset($_GET['Del'])){
    include 'db.php';
    session_start();

    $UserID=$_GET['Del'];
    $lab=$_GET['dellab'];
    $department=$_GET['deldepartment'];
    $query="delete from cwh where sr_no='".$UserID."'";
    $result=mysqli_query($con, $query);

    if($result){
        
        header("location:viewedit.php?elab=$lab&edepartment=$department");

    }else{
        echo"Please Check Your querry";
    }
}
else{
    // header("location:viewedit.php");
    header("location:viewedit.php?elab=$lab&edepartment=$department");
}
    

?>