<?php

    // echo("karo edit");
    $elaboratory = $_GET["elab"];
    $edepartment = $_GET["edepartment"];
          // echo $elaboratory;
          // echo $edepartment;

?>








<?php

  
  include 'db.php';
    session_start();
    
	
	$query="select * from cwh where lab = '$elaboratory'";
  $result=mysqli_query($con,$query);
    //for total cost
  $cost= "SELECT SUM(price) AS cost FROM cwh where lab = '$elaboratory'";

$rowcost = mysqli_query($con,$cost); 
while($rows1=mysqli_fetch_assoc($rowcost))
$sum = $rows1['cost'];

// echo ("This is the sum: $sum");





 


  
  
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>EDIT / DELETE</title>
    <link rel="stylesheet" href="hw1css/hw1.css" />
    

  </head>
  <body>
    <header>
      <h1>Vidyavardhini's College of Engineering & Technology</h1>
      <nav>
        <a href="home.html">Home</a>
        <a href="Information Technology.php" class="active"
          >InformationTechnology</a
        >
        <a href="Computer Science.html">Computer Science</a>
        <a href="http://www.usaultimate.org/index.html" target="_blank">EXTC</a>
      </nav>
    </header>
    <main>
      
      <section class="">
        <!-- <h2>College Teams</h2>
        <button><a href="index.php" target="_blank">EDIT</a></button>

        <p>
          This is not meant to be a comprehensive list of all the teams, just a
          sampling from around the United States. I focused on the ones that I
          though had cools names.
        </p> -->

        


                    <div style= "text-align: center; padding: 10px; font-family: Sans-serif; font-size: 30px; font-weight: bold;">
                    <?php

                      
                      $elaboratory = $_GET["elab"];
                      $edepartment = $_GET["edepartment"];
                      echo $elaboratory;
                      // echo $edepartment;

                    ?>
                    </div>

        <h1>EDIT YOUR DATA HERE</h1>

        
        
        <table>
        <tr>
          <!-- <th>sr.no</th> -->
        <!-- <th>department</th>
        <th>lab</th> -->
        <th>purpose</th>
        <th>component</th>
        <th>quantity</th>
        <th>price</th>
        <th>bill</th>
        <th>purchase date</th>
        <th>financialyear</th>
        <th>description</th>
        <th>edit</th>
        <th>delete</th>
        <!-- <th>date</th> -->
        </tr>
        
        
          <?php
          while($rows=mysqli_fetch_assoc($result))
          {

                    $UserID=$rows['sr_no'];
                  

                    $department = $rows['department'];
                    $lab = $rows['lab'];
                    $purpose = $rows['purpose'];
                    $component = $rows['component'];
                    $quantity = $rows['quantity'];
                    $price = $rows['price'];
                    // $bill = $_POST['bill'];
                    
                    $bill = $rows['bill'];
                    $purchasedate = $rows['purchase_date'];
                    $financialyear = $rows['financialyear'];
                    $description = $rows['description'];
          ?>
          
          <tr>
          <td><?php echo $rows['purpose']; ?></td>
          <td><?php echo $rows['component']; ?></td>
          <td><?php echo $rows['quantity']; ?></td>
          <td><?php echo $rows['price']; ?></td>
          <td><a style="color: white;" href="<?php $imageURL ='billspdf/'.$rows['bill']; echo $imageURL;  ?>"   target="_blank"><?php echo $rows['bill']; ?></a></td>
          <td><?php echo $rows['purchase_date']; ?></td>
          <td><?php echo $rows['financialyear']; ?></td>
          <td><?php echo $rows['description']; ?></td>
          

          <td><a style= "color: white;" href="edit.php?GetID=<?php echo $UserID?>">Edit</a></td>
          <td><a style= "color: white;" href="delete.php?Del=<?php echo $UserID?>&deldepartment=<?php echo $edepartment?>&dellab=<?php echo $elaboratory?> ">Delete</a></td>

          </tr>
          <?php
          }
          ?>
          <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            
            <td><?php echo $sum; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td></td>
            <td></td> -->
            
          </tr>
        
        </table>
        
			

        
      </section>
    </main>
  </body>
</html>

