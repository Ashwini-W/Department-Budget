<?php
if(isset($_POST['department'])){

    include 'db.php';
    // echo"Success connection to db";
    session_start();
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


    // Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
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
        if (move_uploaded_file($file, $destination)) {
            // $sql = "INSERT INTO cwh (bill) VALUES ('$filename')";
            $sql = "INSERT INTO `cwh` (`department`, `lab`,  `purpose`, `component`, `quantity`, `price`, `bill`, `purchase_date`, `financialyear`, `description`, `date`) VALUES ('$department', '$lab', '$purpose' , '$component', '$quantity', '$price', '$filename', '$purchasedate', '$financialyear' , '$description', current_timestamp())";


            

            if (mysqli_query($con, $sql)) {
                // echo "File uploaded successfully";
            }
            else{
              echo mysqli_error($con);
            }
        } else {
            echo "Failed to upload file.";
        }
    
}
          





    

    

    // $sql = "INSERT INTO `cwh` (`department`, `lab`, `component`, `quantity`, `price`, `bill`, `description`, `date`) VALUES ('$department', '$lab', '$component', '$quantity', '$price', '$bill', '$description', current_timestamp())";



   

    // $result = mysqli_query($con, $sql);
    // if(result){
    //     echo"success";
    // }
    // else{
    //     echo"sab galat";
    // }
        
        

    
    }
    


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="hw1css/index.js"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");
    </style>
    <script>
                        // function checkdl(){
                        //     var department = document.querySelector("#department").value;
                        //     var lab = document.querySelector("#lab").value;
                        //     if ((department == "") || (lab == "") ) {
                        //         alert("Please select department name and lab name");
                        //         return false;
                        //     }
                        //     // if (lab == "") {
                        //     //     alert("Please select lab name");
                        //     //     return false;
                        //     // }
                        //     else{
                              
                              
                        //       // window.location.href = "viewedit.php/";
                        //       // return TRUE;
                        //       // window.location.href ='viewedit.php?lat="+department+"&lon="+lab+"&setLatLon=Set';
                        //         window.location.href = `viewedit.php?edepartment=${department}&elab=${lab}&setLatLon=Set`;
                              
                        //     }

                        // }

                      
                                            
                        function checkinput() {
                            var department = document.querySelector("#department").value;
                            var lab = document.querySelector("#lab").value;
                            var purpose = document.querySelector("#purpose").value;
                            var component = document.querySelector("#component").value;
                            var quantity = document.querySelector("#quantity").value;
                            var price = document.querySelector("#price").value;
                            var bill = document.querySelector("#bill").value;
                            var purchasedate = document.querySelector("#purchasedate").value;
                            var financialyear = document.querySelector("#financialyear").value;
                            var description = document.querySelector("#description").value;
                            


                            if (department == "") {
                                alert("Please select department name");
                                return false;
                            }
                            if (lab == "") {
                                alert("Please select lab name");
                                return false;
                            }
                            if (purpose == "") {
                                alert("Please select Purpose");
                                return false;
                            }
                            if (component == "") {
                                alert("Please enter component name");
                                return false;
                            }

                            if (quantity == "") {
                                alert("Please enter quantity");
                                return false;
                            }

                            if (price == "") {
                                alert("Please enter Price");
                                return false;
                            }
                            if (bill == "") {
                                alert("Please enter Bill");
                                return false;
                            }

                            if (purchasedate == "") {
                                alert("Please enter Purchase Date");
                                return false;
                            }

                            if (financialyear == "") {
                                alert("Please enter Financial Year");
                                return false;
                            }

                            else{
                              alert("YOUR DATA HAS BEEN SUBMITTED");
                            }
                        }






                        //drop down condition using json
            $(document).ready(function () {

              load_json_data('department');

              function load_json_data(id, parent_id) {
                var html_code = '';
                $.getJSON('department_lab.json', function (data) {

                  html_code += '<option value="">Select ' + id + '</option>';
                  $.each(data, function (key, value) {
                    if (id == 'department') {
                      if (value.parent_id == '0') {
                        html_code += '<option value="' + value.id + '">' + value.name + '</option>';
                      }
                    }
                    else {
                      if (value.parent_id == parent_id) {
                        html_code += '<option value="' + value.id + '">' + value.name + '</option>';
                      }
                    }
                  });
                  $('#' + id).html(html_code);
                });

              }

              $(document).on('change', '#department', function () {
                var department_id = $(this).val();
                if (department_id != '') {
                  load_json_data('lab', department_id);
                }
                else {
                  $('#lab').html('<option value="">Select state</option>');
                  //    $('#city').html('<option value="">Select city</option>');
                }
              });
              //  $(document).on('change', '#lab', function(){
              //   var lab_id = $(this).val();
              //   if(lab_id != '')
              //   {
              //    load_json_data('city', state_id);
              //   }
              //   else
              //   {
              //    $('#city').html('<option value="">Select city</option>');
              //   }
              //  });
            });
          

            </script>

            
            



    

    
  </head>
  <body>
    <img class="bg" src="lab.png" alt="clg img" />
    <div class="container">
      <h1>Hello Welcome please enter the details here</h1>
      
      <!-- component name, quantity, price, manual, add, bills  -->

      <form action="index.php" method="POST" enctype="multipart/form-data" onsubmit="return checkinput();">

            
        <div class="container" style="width:600px;">
          
                    <div style="width: 80%;">
                          <select name="department" id="department" class="form-control input-lg">
                            <option value="">Select department</option>
                          </select>
                          
                          <br />
                        
                          <select name="lab" id="lab" class="form-control input-lg">
                            <option value="">Select lab</option>
                          </select>
                          <button class="btn" type="submit" onclick="return checkdl();">Edit/Delete</button>
                          <br />
                          <select class="form-control input-lg" name="purpose" id="purpose">
                          <option value="">PURPOSE</option>
                          <option value="CONSUMABLE">CONSUMABLE</option>
                          <option value="HARDWARE EQUIPMENT">HARDWARE EQUIPMENT</option>
                          <option value="MAINTENANCE">MAINTENANCE</option>
                          
                        </select>
                          <!-- <select name="city" id="city" class="form-control input-lg">
                          <option value="">Select city</option>
                        </select> -->
                  </div>
                  
        </div>
        

      

 
      <!-- <label for="department">Department:</label>
      <select name="department" id="department">
        <option value="">Please Select Department</option>
        <option value="IT">IT</option>
        <option value="COMPS">COMPS</option>
        <option value="EXTC">EXTC</option>
        <option value="CIVIL">CIVIL</option>
      </select>

      <label for="lab">Lab:</label>
      <select name="lab" id="lab">
        <option value="">Please Select Lab</option>
        <option value="IOT">IOT</option>
        <option value="CN">CN</option>
        <option value="LD">LD</option>
        <option value="DB">DB</option>
      </select> -->


       
    
      






     

                  
            <br>
      <div style="width: 50%;">
        <input
        
          type="text"
          name="component"
          id="component"
          placeholder="Enter Your Component Name"
        />
      </div>
      
      <div style="width: 50%;">
        <input
          type="number"
          name="quantity"
          id="quantity"
          placeholder="Enter the Quantity of the components"
        />
        </div>
        
      
      <div style="width: 50%;">
        <input
          type="number"
          name="price"
          id="price"
          placeholder="Enter the price of the component"
        />
      </div>
      <br>
      
      <div style="width: 50%;">
        <input
          type="file"
          name="bill"
          id="bill"
          placeholder="Upload the bill here"
        />
      </div>
      
      <div style="width: 25%;">
      <label  for="Date of Purchase">Date of Purchase:</label>
        <input type="date" id="purchasedate" name="purchasedate">
      </div>
      <div style="width: 25%;">
        <select class="form-control input-lg" name="financialyear" id="financialyear">
                          <option value="">Select Financial Year</option>
                          <option  value="2019-20">2019-20</option>
                          <option  value="2020-21">2020-21</option>
                          <option  value="2021-22">2021-22</option>
                          <option  value="2022-23">2022-23</option>
                        </select>
      
      </div>
        
        <br>
      
        <textarea
          name="description"
          id="description"
          cols="2"
          rows="2"
          placeholder="Enter any other information here"
        ></textarea>
    
        <button style="font-size: 20px;" class="btn" name = "save" >Submit</button>
      </form>
    </div>
    
  </body>
</html> 

