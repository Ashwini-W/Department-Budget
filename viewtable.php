<!-- $abc = "<script>document.getElementByID('yourid').value</script>"; -->

<!-- <?php
$laboratory = $_GET["l"];
          echo $laboratory;
?> -->




<?php

  
  include 'db.php';
    session_start();
    
	
	$query="select * from cwh where lab = '$laboratory'";
  $result=mysqli_query($con,$query);
    //for total cost
  $cost= "SELECT SUM(price) AS cost FROM cwh where lab = '$laboratory'";

$rowcost = mysqli_query($con,$cost); 
while($rows1=mysqli_fetch_assoc($rowcost))
$sum = $rows1['cost'];

// echo ("This is the sum: $sum");





 


  
  
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>DETAILS</title>
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
        
        

        


          <div style= "text-align: center; padding: 10px; font-family: Sans-serif; font-size: 30px; font-weight: bold;">
          <?php
          $laboratory = $_GET["l"];
          echo $laboratory;
          ?>
          </div>

        
        
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
        <th>financial year</th>
        <th>description</th>
        <!-- <th>date</th> -->
        </tr>
        
        
          <?php
          while($rows=mysqli_fetch_assoc($result))
          {
          ?>
          
          <tr>
          <!-- <td><?php echo $rows['sr.no']; ?></td> -->
          <!-- <td><?php echo $rows['department']; ?></td>
          <td><?php echo $rows['lab']; ?></td> -->
          <td><?php echo $rows['purpose']; ?></td>
          <td><?php echo $rows['component']; ?></td>
          <td><?php echo $rows['quantity']; ?></td>
          <td><?php echo $rows['price']; ?></td>
          <td><a style="color: white;" href="<?php $imageURL ='billspdf/'.$rows['bill']; echo $imageURL;  ?>"   target="_blank"><?php echo $rows['bill']; ?></a></td>
          <td><?php echo $rows['purchase_date']; ?></td>
          <td><?php echo $rows['financialyear']; ?></td>
          <td><?php echo $rows['description']; ?></td>
          <!-- <td><?php echo $rows['date']; ?></td> -->
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
            <!-- <td></td>
            <td></td> -->
            
          </tr>
        
        </table>
        
			

        
      </section>
    </main>
  </body>
</html>

