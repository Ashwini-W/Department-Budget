<?php
if(isset($_POST['update'])){

    include 'db.php';
    session_start();
    $UserID=$_GET['GetID']; 
    echo($UserID);
    $department = $_POST['department'];
    $lab = $_POST['lab'];
    $purpose = $_POST['purpose'];
    $component = $_POST['component'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    // $bill = $_POST['bill'];
    $bill = $_FILES['bill'];
    $purchasedate = $_POST['purchasedate'];
    $financialyear = $_POST['financialyear'];
    
    $description = $_POST['description'];
    // $query = "update records set department='".$department."', lab='".$lab."', component='".$component."', quantity='".$quantity."', price='".$price."', bill='".$bill."', description='".$description."' where sr_no='".$UserID."'";
    //file upload 
    $filename = $_FILES['bill']['name'];

    // destination of the file on the server
    $destination = 'C:\xampp\htdocs\cwh\billspdf/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['bill']['tmp_name'];
    

    // if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
    //     echo "You file extension must be .zip, .pdf or .docx";
    // } 
    
        // move the uploaded (temporary) file to the specified destination
    move_uploaded_file($file, $destination);

    echo($filename);


    $query = "update cwh set department='".$department."', lab='".$lab."', purpose='".$purpose."', component='".$component."', quantity='".$quantity."', price='".$price."', bill='".$filename."', purchase_date='".$purchasedate."', financialyear='".$financialyear."', description='".$description."' where sr_no='".$UserID."'";

    $result = mysqli_query($con, $query);
    if($result){
       
        echo($purchasedate);
        // header("location:viewedit.php");
        header("location:viewedit.php?elab=$lab&edepartment=$department");
    }
    else{
        echo"Please Check Your querry";
    }
}
else{

    header("location:viewedit.php");
}
?>