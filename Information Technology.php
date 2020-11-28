<?php
  include 'db.php';
    session_start();
	
	$query="select * from cwh where department = 'comp'";
  $result=mysqli_query($con,$query);
    //for total cost
  $cost= "SELECT SUM(price) AS cost FROM cwh where department = 'comp'";

$rowcost = mysqli_query($con,$cost); 
while($rows1=mysqli_fetch_assoc($rowcost))
$sum = $rows1['cost'];

// echo ("This is the sum: $sum");
//ashu try it
    // $_SESSION['vn']= "sweety";

    //ashu try it
    // echo $variable1 = "<script>document.write(laboratory)</script>"; 
    
    // $_SESSION['vn']= $variable1;

    if(isset($_POST['data1']) && isset($_POST['data2'])){ 

      } 

  
  
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>VCET-BUDGET</title>
    <link rel="stylesheet" href="hw1css/hw1.css" />
    <script>

      

      
     
      

      var plz;
      function labid(a){
        
        
        alert(a);
        
        
        

      }
      
      
      
      
      
        

    


    </script>
    
    
  </head>
  <body>
      
    <header>
    

      <h1 style="color:grey;">Vidyavardhini's College of Engineering & Technology</h1>
      <nav>
        <a href="home.html" >Home</a>
        <a href="Information Technology.php" class="active"
          >InformationTechnology</a>
        <a href="Computer Science.html">Computer Science</a>
        <a target="_blank">EXTC</a>
      </nav>
    </header>
    <main>
      <aside class="left">
        <!-- <a
          href="viewtable.php"
          target="_blank"
          ><img id="iot" onclick = "labid(this.id)"
            src="images/iot.jpeg"
            alt="iot"
            title="By Ed Yourdon [CC BY-SA 2.0 (http://creativecommons.org/licenses/by-sa/2.0)], via Wikimedia Commons"
            
          /> -->

          <a
          href="viewtable.php?l=IOT And Sensor Laboratory"
          target="_blank"
          ><img id="IOT And Sensor Laboratory" onclick = "labid(this.id)"
            src="images/iot.jpeg"
            alt="iot"
            title="IOT And Sensor Laboratory"
            
          />
          

        </a>

        <a
          href="viewtable.php?l=Data Mining And Database Laboratory"
          target="_blank"
          ><img id="Data Mining And Database Laboratory" onclick = "labid(this.id);"
            alt="Data Mining And Database Laboratory"
            title="Data Mining And Database Laboratory"

            src="images/database mining.jpeg"
        /></a>

        <a
          href="viewtable.php?l=Electronic And Communication Laboratory"
          target="_blank"
          ><img id="Electronic And Communication Laboratory" onclick = "labid(this.id);"
            src="images/electronic and communication.jpeg"
            alt="electronic and communication"
        /></a>

        <a
          href="https://www.flickr.com/photos/paradisecoastie/15409853738/"
          title="Ultimate Frisbee"
          ><img src="images/electronic.jpeg" alt="electronic"
        /></a>

        <a
          href="https://www.flickr.com/photos/paradisecoastie/15409853738/"
          title="Ultimate Frisbee"
          ><img
            src="images/Multimedia and signal processor.jpeg"
            alt="Multimedia and signal processor"
        /></a>

        <a
          href="https://www.flickr.com/photos/paradisecoastie/15409853738/"
          title="Ultimate Frisbee"
          ><img src="images/network computer.jpeg" alt="network computer"
        /></a>

        <a
          href="https://www.flickr.com/photos/paradisecoastie/15409853738/"
          title="Ultimate Frisbee"
          ><img src="images/programming lab.jpeg" alt="programming lab"
        /></a>

        

        <a
          href="https://www.flickr.com/photos/paradisecoastie/15409853738/"
          title="Ultimate Frisbee"
          ><img src="images/software engineering.jpeg" alt="software engineering"
        /></a>
      </aside>
      <section class="">
        <div class="info">
        <h2><b>INFORMATION TECHNOLOGOY LAB DETAILS</b></h2>
        <button><a href="index.php" target="_blank" class="ebutton" style="font-size: 20px; color: blue;" class="btn">EDIT</a></button>
        <br>
        <!-- <button onclick="myFunction()">try</button> -->

        <p>
          The Department of Information Technology (IT) aim at developing technical and experimental skills in students along with logical thinking so as to prepare them for competent, responsible and rewarding careers in IT profession. We strive to achieve the aim with young, dynamic and highly qualified faculty members, state of art infrastructure and Industry-Institution Interaction.
          The department has laboratories which are well equipped with latest configuration machines, high speed internet, Wi-Fi and legal licensed software. Modern aids such as LCD, Educational CDs make classroom teaching more interesting.
          We encourage extra-curricular activities as they help in developing the student’s personality which ultimately enhances her future. It is our constant endeavor to shape personalities who will contribute positively to the world around them
          
          <b>IOT and Sensors:</b>
          Software installed
          Rasbery PI, Aurdino Board
          <br>
          <br>
          <b>Programming Lab:</b>
          Software installed -- OS-Win Professional,Turbo C,Prolog
          <br>
          <br>
          <b>Project LAb:</b>
          Software installed ---  OS:Win 7,Rational Rose,Visual Studio.net2005,SQL 2005
          <br>
          <br>
          <b>Electronics & Communication Lab:</b>
          Software installed ---  Digital Trainer kits: 27 Microprocessor kits: 03 Microcontroller kits:04
          <br>
          <br>
          Network Communication: 
          Software installed  --- 
          OS: Win10 Pofessional , Cent os7 , Java 1.8 ,TurboC ,Scilab.
        </p>
        </div>
        
      
       
        
      </section>
    </main>
  </body>
</html>
