<?php
//database
include 'sub/database.php';

//insert sql
if(isset($_POST["firstname"])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$department_id = $_POST['department_id'];
$salary = $_POST['salary'];
$birthdate  = $_POST['birthdate'];
$joining_date  = $_POST['joining_date'];
$sql="INSERT INTO `employees` ( `firstname`, `lastname`, `email`, `mobile`, `department_id`, `salary`, `birthdate`, `joining_date`) VALUES ( '$firstname', '$lastname', '$email', '$mobile', '$department_id', '$salary', '$birthdate', '$joining_date');";
$result = mysqli_query($con, $sql);
if($result === true){
    $insert=true;
  }else{
    $notinsert=true;
  }
  
  $con->close();
}
// .............................................................
//nav / header
include "sub/header.php"
?>
<!-- ........................................................................... -->
<!-- form -->


        <h1>Wellbyte <sup>&#xae;</sup></h3>
        <p>Please fill out the following form</p>
            <?php
            if(!$insert){
                // echo "<p class='notsubmit'>something wrong !</p>";
            }
            ?>
            

        <form id="form" name="myForm" action="form.php" method="post" onsubmit="return error()">
            <input type="text" name="firstname" class="forminp" id="firstname" placeholder="Enter firstname" value="" autocomplete="off"><span id="fnameerror"></span>
            <input type="text" name="lastname" class="forminp" id="lastname" placeholder="Enter lastname" value="" autocomplete="off"><span id="lnameerror"></span>
            <input type="text" name="email" class="forminp" id="email" placeholder="Enter email" value="" autocomplete="off"><span id="emailerror"></span>
            <input type="text" name="mobile" class="forminp" id="mobile" placeholder="Enter mobile" value="" autocomplete="off"><span id="mobileerror"></span>
            
            <!-- ............ -->
            <div class="input-group mb-3 forminp">
            <div class="input-group-prepend">
            <label class="input-group-text" id="selectDep"for="inputGroupSelect01">Select department :</label>
            </div>
            <select class="custom-select" name="department_id" id="inputGroupSelect01">
              <option id="r1" value="1">Sales</option>
              <option id="r2" value="2">Finance</option>
              <option id="r3" value="3">Corporate</option>
            </select>
            </div>
            <!-- ............ -->

            <input type="text" name="salary" class="forminp" id="salary" placeholder="Enter salary" value="" autocomplete="off"><span id="salaryerror"></span>
            <input type="text" name="birthdate" class="forminp" id="birthdate" placeholder="Enter birthdate (Ex. 'YYYY-MM-DD') " autocomplete="off"><span id="birthdateerror"></span>
            <input type="text" name="joining_date" class="forminp" id="joining_date" placeholder="Enter joining_date (Ex. 'YYYY-MM-DD') " autocomplete="off"><span id="joining_dateerror"></span>
            <button class="btn">Submit</button> 
        </form>
<!-- .................................................. -->
<!-- footer -->
<?php include "sub/footer.php" ?>



