<?php
if(isset($_GET['GetID'])){

    include 'db.php';
    session_start();
                  $UserID=$_GET['GetID'];
                  $query="select * from cwh where sr_no = '".$UserID."'";
                  $result = mysqli_query($con, $query);
                  
                  

                  while($rows=mysqli_fetch_assoc($result)){


                    $department = $rows['department'];
                    $lab = $rows['lab'];
                    $purpose = $rows['purpose'];
                    $component = $rows['component'];
                    $quantity = $rows['quantity'];
                    $price = $rows['price'];
                    
                    // $bill = $_POST['bill'];
                    
                    
                    $bill = $rows['bill'];
                    // $filename = $_FILES['bill']['name'];
                    
                    $purchasedate = $rows['purchase_date'];
                    $financialyear = $rows['financialyear'];
                    $description = $rows['description'];
                    // echo($UserID);

                    // echo($bill);

                    

                  }
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
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");
    </style>
    <script>
                        // function checkdl(){
                        //     var department = document.querySelector("#department").value;
                        //     var lab = document.querySelector("#lab").value;
                        //     if (department == "") {
                        //         alert("Please select department name");
                        //         return false;
                        //     }
                        //     if (lab == "") {
                        //         alert("Please select lab name");
                        //         return false;
                        //     }
                        //     else{
                              
                              
                        //       // window.location.href = "viewedit.php/";
                        //       // return TRUE;
                        //       // window.location.href ='viewedit.php?lat="+department+"&lon="+lab+"&setLatLon=Set';
                        //         window.location.href = `viewedit.php?edepartment=${department}&elab=${lab}&setLatLon=Set`;
                              
                        //     }

                        // }

                                            
                        function checkinput() {
                            // var department = document.querySelector("#department").value;
                            // var lab = document.querySelector("#lab").value;
                            var component = document.querySelector("#component").value;
                            var quantity = document.querySelector("#quantity").value;
                            var price = document.querySelector("#price").value;
                            var bill = document.querySelector("#bill").value;
                            var description = document.querySelector("#description").value;
                            


                            // if (department == "") {
                            //     alert("Please select department name");
                            //     return false;
                            // }
                            // if (lab == "") {
                            //     alert("Please select lab name");
                            //     return false;
                            // }
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

                            else{
                              alert("YOUR DATA HAS BEEN SUBMITTED");
                            }
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
            // });
          

            </script>

            
            



    

    
  </head>
  <body>
    <img class="bg" src="lab.png" alt="clg img" />
    <div class="container">
      <h1>Update Your DATA Here     </h1>
      
      <!-- component name, quantity, price, manual, add, bills  -->

      <form action="update.php?GetID=<?php echo $UserID?>" method="POST" enctype="multipart/form-data" onsubmit="return checkinput();">

            
        <div class="container" style="width:600px;">
          
              <div style="width: 80%;">
                <select value="<?php echo $department ?>" name="department" id="department" class="form-control input-lg">
                  <option value="<?php echo $department ?>"><?php echo $department ?></option>
                </select>
              </div>
                <br />
              <div style="width: 80%;">
                <select value="<?php echo $lab ?>" name="lab" id="lab" class="form-control input-lg">
                  <option value="<?php echo $lab ?>"><?php echo $lab ?></option>
                </select>
              </div>
                <br />
              <div style="width: 80%;">
                <select  class="form-control input-lg" name="purpose" id="purpose">
                                <option value="<?php echo $purpose ?>"><?php echo $purpose ?></option>
                                <option value="CONSUMABLE">CONSUMABLE</option>
                                <option value="HARDWARE EQUIPMENT">HARDWARE EQUIPMENT</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                
                </select>
              </div>
          <br>
        </div>
        <div style="width: 50%;">
        <input
            value="<?php echo $component ?>"
            placeholder=" enter component name"
          type="text"
          name="component"
          id="component"
          
        />
        </div>
        <div style="width: 50%;">
        <input
          value="<?php echo $quantity ?>"
          type="number"
          name="quantity"
          id="quantity"
          placeholder="Enter the Quantity of the components"
        />
        </div>
        <div style="width: 50%;">
        <input
          value="<?php echo $price ?>"
          type="number"
          name="price"
          id="price"
          placeholder="Enter the price of the component"
        />
        </div>
        <div style="width: 50%;">
        <input
          value="<?php echo $bill ?>"
          type="file"
          name="bill"
          id="bill"
          placeholder="Upload the bill here"
        />
        </div>
        <div style="width: 25%;">
        <label value="<?php echo $purchasedate ?>"  for="Date of Purchase">Date of Purchase:</label>
        <input type="date" id="purchasedate" value="<?php echo $purchasedate ?>" name="purchasedate">
        </div>
        <div style="width: 25%;">
        <select class="form-control input-lg" name="financialyear" id="financialyear">
                          <option value="<?php echo $financialyear ?>"><?php echo $financialyear ?></option>
                          <option  value="2019-20">2019-20</option>
                          <option  value="2020-21">2020-21</option>
                          <option  value="2021-22">2021-22</option>
                          <option  value="2022-23">2022-23</option>
                        </select>
        
      </div>
        <input
          value="<?php echo $description ?>"
          name="description"
          id="description"
          cols="30"
          rows="10"
          placeholder="Enter any other information here"
        />
        <!-- <a href="update.php?GetID=<?php echo $UserID?>"><button class="btn" name = "update">Update</button></a> -->
        <button style="font-size: 20px;" class="btn" name = "update">Update</button>
      </form>
    </div>
    
    
  </body>
</html>
