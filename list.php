<?php
// database
include 'sub/database.php';

if (!$con){
  die("Sorry we failed to connect: ". mysqli_connect_error());
}
//..................................
//delete sql

if (isset($_GET['delete'])){
  $idDelete = $_GET['delete'];
  $delete = true;
  $sql= "DELETE FROM `employees` WHERE `employees`.`id` = $idDelete";
  $result = mysqli_query($con,$sql);
}

//.............................................
//edit sql
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST["idEdit"])){
    $id=$_POST['idEdit'];
    $firstname = $_POST['firstnameModal'];
    $lastname = $_POST['lastnameModal'];
    $email = $_POST['emailModal'];
    $mobile = $_POST['mobileModal'];
    $department_id = $_POST['department_idModal'];
    $salary = $_POST['salaryModal'];
    $birthdate  = $_POST['birthdateModal'];
    $joining_date  = $_POST['joining_dateModal'];
    $sql="UPDATE `employees` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `department_id` = '$department_id', `salary` = '$salary', `birthdate` = '$birthdate', `joining_date` = '$joining_date' WHERE `employees`.`id` = '$id';";
    $result = mysqli_query($con, $sql);
    if($result){
      $update = true;
    }
    else{
      echo "We could not update the record successfully";
    }
  }

}
?>
<!-- ................................................ -->
<!-- Edit modal -->  

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel ">Edit_record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="form" action="list.php" name="myFormModal" method="post" onsubmit="return errorModal()" >
            <input type="hidden" name="idEdit" id="idEdit">
            <input type="text" name="firstnameModal" class="forminp" id="firstnameModal" placeholder="Enter firstname" value="" autocomplete="off"><span id="fnameerrorModal"></span>
            <input type="text" name="lastnameModal" class="forminp" id="lastnameModal" placeholder="Enter lastname" value="" autocomplete="off"><span id="lnameerrorModal"></span>
            <input type="text" name="emailModal" class="forminp" id="emailModal" placeholder="Enter email" value="" autocomplete="off"><span id="emailerrorModal"></span>
            <input type="text" name="mobileModal" class="forminp" id="mobileModal" placeholder="Enter mobile" value="" autocomplete="off"><span id="mobileerrorModal"></span>
            
            <!-- ............ -->
            <div class="input-group mb-3 tabEdit forminp">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Select department :</label>
            </div>
            <select class="custom-select" name="department_idModal" id="inputGroupSelect01  department_idModal" style="width: 190px;">
              <option id="r1" value="1">Sales</option>
              <option id="r2" value="2">Finance</option>
              <option id="r3" value="3">Corporate</option>
            </select>
            </div>
            <!-- ............ -->
            
            <input type="text" name="salaryModal" class="forminp" id="salaryModal" placeholder="Enter salary" value="" autocomplete="off"><span id="salaryerrorModal"></span>
            <input type="text" name="birthdateModal" class="forminp" id="birthdateModal" placeholder="Enter birthdate (Ex. 'YYYY-MM-DD') " value="" autocomplete="off"><span id="birthdateerrorModal"></span>
            <input type="text" name="joining_dateModal" class="forminp" id="joining_dateModal" placeholder="Enter joining_date (Ex. 'YYYY-MM-DD') " value="" autocomplete="off"><span id="joining_dateerrorModal"></span>
            <button class="btn">Edit</button> 
        </form>

      </div>
      <div class="modal-footer">
      <img src="img/logo.png" alt="logo" id="logo">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- ............................................................ -->
<!-- employees list sql -->
<?php
  $filterFirstName = isset($_POST['filterFirstName']) ? $_POST['filterFirstName'] : "" ;
  $filterLastName = isset($_POST['filterLastName']) ? $_POST['filterLastName'] : "" ;
 
  $departmentidpost =isset($_POST['departmentSearch']) ? $_POST['departmentSearch'] : "";
  
  $limit=isset($_POST['state']) ? $_POST['state'] : (isset($_GET['limit']) ? $_GET['limit'] : 8);
  $departmentSearch=isset($_GET['departmentSearch']) ? $_GET['departmentSearch']: "" ;
  $queryPageNo=isset($_GET['page']) ? $_GET['page'] : 1;  
 
  $result1 = $con->query("SELECT count(id) as id FROM `employees`;");
  $empcount = $result1->fetch_all(MYSQLI_ASSOC);
  $total = $empcount[0]['id'];
  $totalPage = ceil($total / $limit);
  if($queryPageNo <= 0){
    $queryPageNo=1;
  }
  if($queryPageNo >= $totalPage ){
    $queryPageNo=$totalPage;
  }
  $previous = $queryPageNo - 1;
  $next = $queryPageNo + 1;
  $start=($queryPageNo-1)* $limit;
  $result = $con->query("SELECT * FROM `employees` LIMIT $start,$limit ;");
  if(!$result){echo "some error occurred";}
 
// ...............................................................  
// sort direction
  // id direction
  $sortIdDir=isset($_GET['sortid']) ? $_GET['sortid']: "";
  if($sortIdDir=='desc'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`id` DESC LIMIT $start,$limit ;");
  }else if($sortIdDir=='asc'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`id` ASC LIMIT $start,$limit ;");
  }

  // last first name direction
  $sortfnameDir=isset($_GET['sortfname']) ? $_GET['sortfname']: "";
  if($sortfnameDir=='Z-A'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`firstname` DESC LIMIT $start,$limit ;");
  }else if($sortfnameDir=='A-Z'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`firstname` ASC LIMIT $start,$limit ;");
  }

  // last last name direction
  $sortlnameDir=isset($_GET['sortlname']) ? $_GET['sortlname']: "";
  if($sortlnameDir=='Z-A'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`lastname` DESC LIMIT $start,$limit ;");
  }else if($sortlnameDir=='A-Z'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`lastname` ASC LIMIT $start,$limit ;");
  }

  // last email direction
  $sortemailDir=isset($_GET['sortemail']) ? $_GET['sortemail']: "";
  if($sortemailDir=='Z-A'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`email` DESC LIMIT $start,$limit ;");
  }else if($sortemailDir=='A-Z'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`email` ASC LIMIT $start,$limit ;");
  }

  // last salary direction
  $sortsalaryDir=isset($_GET['sortsalary']) ? $_GET['sortsalary']: "";
  if($sortsalaryDir=='9-0'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`salary` DESC LIMIT $start,$limit ;");
  }else if($sortsalaryDir=='0-9'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`salary` ASC LIMIT $start,$limit ;");
  }

  // last birthdate direction
  $sortbdateDir=isset($_GET['sortbdate']) ? $_GET['sortbdate']: "";
  if($sortbdateDir=='9-0'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`birthdate` DESC LIMIT $start,$limit ;");
  }else if($sortbdateDir=='0-9'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`birthdate` ASC LIMIT $start,$limit ;");
  }

  // last joining date direction
  $sortjdateDir=isset($_GET['sortjdate']) ? $_GET['sortjdate']: "";
  if($sortjdateDir=='9-0'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`joining_date` DESC LIMIT $start,$limit ;");
  }else if($sortjdateDir=='0-9'){
    $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`joining_date` ASC LIMIT $start,$limit ;");
  }


// ........................................................................            
    if(isset($_POST['filterFirstName'])){
      $limit = 5000;   /* for back to list button */
      $result = $con->query("SELECT * FROM `employees` WHERE firstname LIKE '$filterFirstName%' AND lastname LIKE '$filterLastName%';");
    }
    if(isset($_GET['top5Salary'])){
      $limit = 5000;  /* for back to list button */
      $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`salary` DESC LIMIT 5;");
    }
    if(isset($_GET['bottom5Salary'])){
      $limit = 5000;  /* for back to list button */
      $result = $con->query("SELECT * FROM `employees` ORDER BY `employees`.`salary` LIMIT 5;");
    }
    
  // ................................................................................
  // for employees joined this month filter
    
    $resultfilter = $con->query("SELECT count(id) as id FROM `employees` WHERE month(joining_date)=month(now()) ;");
    $empcountfilter = $resultfilter->fetch_all(MYSQLI_ASSOC);
    $totalfilter = $empcountfilter[0]['id'];
    $totalPagefilter = ceil($totalfilter / $limit);
    
    if($queryPageNo >= $totalPagefilter ){
      $queryPageNo=$totalPagefilter;
    }
    $previousfilter = $queryPageNo - 1;
    $nextfilter = $queryPageNo + 1;
    $startfilter=($queryPageNo-1)* $limit;
    if(isset($_GET['joinedThisMonth'])){
      $result = $con->query("SELECT * FROM `employees` WHERE month(joining_date)=month(now()) LIMIT $startfilter,$limit;");
      if(!$result){echo "some error occurred";}
    }
  // ............................................................
  // for sales department filter
    if(isset($_GET['departmentSearch'])){
      // sales
      if ($_GET['departmentSearch']==1){
        $queryPageNoSalesDep=isset($_GET['page']) ? $_GET['page'] : 1;
        $resultSalesDep = $con->query("SELECT count(id) as id FROM `employees` WHERE department_id=1; ");
        $empcountSalesDep = $resultSalesDep->fetch_all(MYSQLI_ASSOC);
        $totalSalesDep = $empcountSalesDep[0]['id'];
        $totalPageSalesDep = ceil($totalSalesDep / $limit);
        if($queryPageNoSalesDep <= 0){
          $queryPageNoSalesDep=1;
        }
        if($queryPageNoSalesDep >= $totalPageSalesDep ){
          $queryPageNoSalesDep=$totalPageSalesDep;
        }
        $previousSalesDep = $queryPageNoSalesDep - 1;
        $nextSalesDep = $queryPageNoSalesDep + 1;
        $startSalesDep=($queryPageNoSalesDep-1)* $limit;
        $result = $con->query("SELECT * FROM `employees` WHERE department_id=1 LIMIT $startSalesDep,$limit;;");
      }
      
      // finance
      if ($_GET['departmentSearch']==2){
        $queryPageNoFinanceDep=isset($_GET['page']) ? $_GET['page'] : 1;
        $resultFinanceDep = $con->query("SELECT count(id) as id FROM `employees` WHERE department_id=2; ");
        $empcountFinanceDep = $resultFinanceDep->fetch_all(MYSQLI_ASSOC);
        $totalFinanceDep = $empcountFinanceDep[0]['id'];
        $totalPageFinanceDep = ceil($totalFinanceDep / $limit);
        if($queryPageNoFinanceDep <= 0){
          $queryPageNoFinanceDep=1;
        }
        if($queryPageNoFinanceDep >= $totalPageFinanceDep ){
          $queryPageNoFinanceDep=$totalPageFinanceDep;
        }
        $previousFinanceDep = $queryPageNoFinanceDep - 1;
        $nextFinanceDep = $queryPageNoFinanceDep + 1;
        $startFinanceDep=($queryPageNoFinanceDep-1)* $limit;
        $result = $con->query("SELECT * FROM `employees` WHERE department_id=2 LIMIT $startFinanceDep,$limit;;");
      }
      
      // corporate 
      if ($_GET['departmentSearch']==3){
        $queryPageNoCorpoDep=isset($_GET['page']) ? $_GET['page'] : 1;
        $resultCorpoDep = $con->query("SELECT count(id) as id FROM `employees` WHERE department_id=3; ");
        $empcountCorpoDep = $resultCorpoDep->fetch_all(MYSQLI_ASSOC);
        $totalCorpoDep = $empcountCorpoDep[0]['id'];
        $totalPageCorpoDep = ceil($totalCorpoDep / $limit);
        if($queryPageNoCorpoDep <= 0){
          $queryPageNoCorpoDep=1;
        }
        if($queryPageNoCorpoDep >= $totalPageCorpoDep ){
          $queryPageNoCorpoDep=$totalPageCorpoDep;
        }
        $previousCorpoDep = $queryPageNoCorpoDep - 1;
        $nextCorpoDep = $queryPageNoCorpoDep + 1;
        $startCorpoDep=($queryPageNoCorpoDep-1)* $limit;
        $result = $con->query("SELECT * FROM `employees` WHERE department_id=3 LIMIT $startCorpoDep,$limit;;");
      }
      if(!$result){echo "some error occurred";}
    }
  // ............................................................
    $employees = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- .................................................................. -->
<!-- nav/header -->
<?php include "sub/header.php" ?>

<h4>List of employees working in the company.</h4>
<hr>
<div id="list">
  <!-- number of row selecter -->
  <div id="numOfRow">
    <p id="selectNumRow">Select Number of Rows : </p>
    <div class="form-goup">
      <form method="post" id="numOfRowForm" action="">
        <select name="state" id="maxRows" class="form-control">
          <option  disabled selected>------SELECT------</option>
          <option id="alRec" value="5000" >Show All</option>
          <option id="8Rec" value="8" >8</option>
          <option id="10Rec" value="10">10</option>
          <option id="12Rec" value="12">12</option>
        </select>
      </form>
    </div>
  </div>
  <br><br>
  
  <!-- filter button or search -->
  <div id="filter">
    <table>
      <tr>
        <form action="list.php" method="post" id="filterNameForm" name="filterNameForm" onsubmit="return errorSerch()"> 
          <input type="text" name="filterFirstName" id="filterFirstName" class="highLowSearBtn shorFLname" placeholder="Firstname" autocomplete="off">
          <input type="text" name="filterLastName" id="filterLastName" class="highLowSearBtn shorFLname" placeholder="Lastname" autocomplete="off">
          <button id="filterSubmit" class="highLowSearBtn " >Search </button>
        </form>
        <form action="" method="get" id="filterDepForm"> 
          <select class="highLowSearBtn" name="departmentSearch" id="departmentSearch">
            <option  disabled selected>Departments</option>
            <option value="1" id="salesclick" class="left">Sales</option>
            <option value="2" id="finclick" class="left">Finance</option>
            <option value="3" id="corpclick" class="left">Corporate</option>
          </select>
        </form>
        <button id="highSal" class="highLowSearBtn">Highest 5 Salary</button>
        <button id="lowSal" class="highLowSearBtn">Lowest 5 Salary</button>
        <button id="joinBtn" class="highLowSearBtn">Employees Joined this Month</button>
      </tr>
      <tr>
        <div id="errorMsgSearch"></div>
      </tr>
    </table>
  </div>
  <!-- page selector -->
  <div id="pageSelectordiv">
    <table>
      <tr id="highLowBtnTr">
        <td>
          <nav aria-label="Page navigation example">
            <?php if($limit!=5000) :?>
              <?php 
              // employees join this month
              if(isset($_GET['joinedThisMonth'])){
                $totalPage = $totalPagefilter;
                $next = $nextfilter;
                $previous = $previousfilter;
                $totalPage = $totalPagefilter;
                echo "<br>";
              };
              // three departments
              if(isset($_GET['departmentSearch'])){
                // sales
                if ($_GET['departmentSearch']==1){             
                  $totalPage = $totalPageSalesDep;
                  $next = $nextSalesDep;
                  $previous = $previousSalesDep;
                  $totalPage = $totalPageSalesDep;
                }
                // finance
                if ($_GET['departmentSearch']==2){             
                  $totalPage = $totalPageFinanceDep;
                  $next = $nextFinanceDep;
                  $previous = $previousFinanceDep;
                  $totalPage = $totalPageFinanceDep;
                }
                // corporate
                if ($_GET['departmentSearch']==3){             
                  $totalPage = $totalPageCorpoDep;
                  $next = $nextCorpoDep;
                  $previous = $previousCorpoDep;
                  $totalPage = $totalPageCorpoDep;
                }
              };
              ?>
              <ul class="pagination" id="paginatorNav">
                <?php if(isset($_GET['joinedThisMonth'])||isset($_GET['departmentSearch'])){echo "<li><a href='list.php?page=1&limit=8' class='highLowSearBtn marg0' >Back_to_List</a></li>";} ?>
                <li class="page-item"><a class="page-link"  href="list.php?page=1&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} if(isset($_GET['sortid'])){echo "&sortid=$sortIdDir";} if (isset($_GET['sortfname'])){echo "&sortfname=$sortfnameDir";}  if (isset($_GET['sortlname'])){echo "&sortlname=$sortlnameDir";}  if (isset($_GET['sortemail'])){echo "&sortemail=$sortemailDir";}  if (isset($_GET['sortsalary'])){echo "&sortsalary=$sortsalaryDir";}  if (isset($_GET['sortbdate'])){echo "&sortbdate=$sortbdateDir";}  if (isset($_GET['sortjdate'])){echo "&sortjdate=$sortjdateDir";}?>"> << </a></li>
                <li class="page-item"><a class="page-link" href="list.php?page=<?= $previous; ?>&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} if(isset($_GET['sortid'])){echo "&sortid=$sortIdDir";} if (isset($_GET['sortfname'])){echo "&sortfname=$sortfnameDir";} if (isset($_GET['sortlname'])){echo "&sortlname=$sortlnameDir";}  if (isset($_GET['sortemail'])){echo "&sortemail=$sortemailDir";}  if (isset($_GET['sortsalary'])){echo "&sortsalary=$sortsalaryDir";}  if (isset($_GET['sortbdate'])){echo "&sortbdate=$sortbdateDir";}  if (isset($_GET['sortjdate'])){echo "&sortjdate=$sortjdateDir";} ?>"> < </a></li>
                <?php  for($i = 1 ; $i <= $totalPage ; $i++) :?>
                  <li class="page-item"><a class="page-link" href="list.php?page=<?= $i ;?>&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} if(isset($_GET['sortid'])){echo "&sortid=$sortIdDir";} if (isset($_GET['sortfname'])){echo "&sortfname=$sortfnameDir";} if (isset($_GET['sortlname'])){echo "&sortlname=$sortlnameDir";}  if (isset($_GET['sortemail'])){echo "&sortemail=$sortemailDir";}  if (isset($_GET['sortsalary'])){echo "&sortsalary=$sortsalaryDir";}  if (isset($_GET['sortbdate'])){echo "&sortbdate=$sortbdateDir";}  if (isset($_GET['sortjdate'])){echo "&sortjdate=$sortjdateDir";} ?>"><?= $i ;?></a></li>
                  <?php endfor;?>
                  <li class="page-item"><a class="page-link" href="list.php?page=<?= $next; ?>&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} if(isset($_GET['sortid'])){echo "&sortid=$sortIdDir";} if (isset($_GET['sortfname'])){echo "&sortfname=$sortfnameDir";} if (isset($_GET['sortlname'])){echo "&sortlname=$sortlnameDir";}  if (isset($_GET['sortemail'])){echo "&sortemail=$sortemailDir";}  if (isset($_GET['sortsalary'])){echo "&sortsalary=$sortsalaryDir";}  if (isset($_GET['sortbdate'])){echo "&sortbdate=$sortbdateDir";}  if (isset($_GET['sortjdate'])){echo "&sortjdate=$sortjdateDir";} ?>"> > </a></li>
                  <li class="page-item"><a class="page-link" href="list.php?page=<?= $totalPage; ?>&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} if(isset($_GET['sortid'])){echo "&sortid=$sortIdDir";} if (isset($_GET['sortfname'])){echo "&sortfname=$sortfnameDir";} if (isset($_GET['sortlname'])){echo "&sortlname=$sortlnameDir";}  if (isset($_GET['sortemail'])){echo "&sortemail=$sortemailDir";}  if (isset($_GET['sortsalary'])){echo "&sortsalary=$sortsalaryDir";}  if (isset($_GET['sortbdate'])){echo "&sortbdate=$sortbdateDir";}  if (isset($_GET['sortjdate'])){echo "&sortjdate=$sortjdateDir";} ?>"> >> </a></li>
                </ul>
                <!-- change value of desc/asc -->
                <?php $sortIdDir=='desc'? $sortIdDir='asc' : $sortIdDir='desc'; ?>
                <?php $sortfnameDir=='Z-A'? $sortfnameDir='A-Z' : $sortfnameDir='Z-A'; ?>
                <?php $sortlnameDir=='Z-A'? $sortlnameDir='A-Z' : $sortlnameDir='Z-A'; ?>
                <?php $sortemailDir=='Z-A'? $sortemailDir='A-Z' : $sortemailDir='Z-A'; ?>
                <?php $sortsalaryDir=='9-0'? $sortsalaryDir='0-9' : $sortsalaryDir='9-0'; ?>
                <?php $sortbdateDir=='9-0'? $sortbdateDir='0-9' : $sortbdateDir='9-0'; ?>
                <?php $sortjdateDir=='9-0'? $sortjdateDir='0-9' : $sortjdateDir='9-0'; ?>
                
                
            <?php else : ?>
              <br>
              <a href="list.php?page=1&limit=8" class="highLowSearBtn marg0" >Back to List</a>
              <br><br>
            <?php endif; ?> 
          </nav>
        </td>
      </tr>
    </table>
  </div>
  
              
  
<!-- list of employee -->
<table id="table" class="table table-bordered table-dark table-striped">
    <tr>
      <th class="th" >No.</th>
      <th class="th">Id <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php  if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";} ?>&sortid=<?=$sortIdDir?>" id="sortid" class="sorting" >&#x21F3;</a></th>
      <th class="th">First name <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortfname=<?=$sortfnameDir?>" id="sortfname" class="sorting">&#x21F3;</a></th>
      <th class="th">Last name <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortlname=<?=$sortlnameDir?>" id="sortlname" class="sorting">&#x21F3;</a></th>
      <th class="th">Email <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortemail=<?=$sortemailDir?>" id="sortemail" class="sorting">&#x21F3;</a></th>
      <th class="th">Mobile</th>
      <th class="th">Department id </th>
      <th class="th">Salary <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortsalary=<?=$sortsalaryDir?>" id="sortsalary" class="sorting">&#x21F3;</a></th>
      <th class="th">Birthdate <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortbdate=<?=$sortbdateDir?>" id="sortbdate" class="sorting">&#x21F3;</a></th>
      <th class="th">Joining date <a href="list.php?page=<?= $queryPageNo ;?>&limit=<?=$limit;?><?php if(isset($_GET['joinedThisMonth'])){echo "&joinedThisMonth";} if(isset($_GET['top5Salary'])){echo "&top5Salary";} if(isset($_GET['bottom5Salary'])){echo "&bottom5Salary";} if(isset($_GET['departmentSearch'])){echo "&departmentSearch=$departmentSearch";}?>&sortjdate=<?=$sortjdateDir?>" id="sortjdate" class="sorting">&#x21F3;</a></th>
      <th class="th" colspan="2">Actions</th>
    </tr>

    <?php $no=1; ?>
    <?php foreach ($employees as $employee): ?>
    <tr>
      <td class="td"><b><?= $no;?></b> </td>
      <td class="td"><i><?= $employee['id'];?></i></td>
      <td class="td"><?= $employee['firstname']; ?> </td>
      <td class="td"><?= $employee['lastname']; ?> </td>
      <td class="td"><?= $employee['email']; ?> </td>
      <td class="td"><?= $employee['mobile']; ?> </td>
      <td class="td"><?= $employee['department_id']; ?> </td>
      <td class="td"><?= $employee['salary']; ?> </td>
      <td class="td"><?= $employee['birthdate']; ?> </td>
      <td class="td"><?= $employee['joining_date']; ?> </td>
      <td><button class="edit_delete_btn edit"  id="edit_btn">Edit</button></td>
      <td><button class="edit_delete_btn delete" id="delete_btn">Delete</button></td>
    </tr>
    <?php $no++ ?>
    <?php endforeach; ?>
  </table>

</div>
<!-- ..................................................................... -->
<!-- js -->
<script>
// edit button js 
  edits=document.getElementsByClassName('edit')
  Array.from(edits).forEach((element)=>{
    element.addEventListener('click',(e)=>{
      tr=e.target.parentNode.parentNode;
      // console.log(tr);
      firstname = tr.getElementsByTagName("td")[2].innerText;
      lastname = tr.getElementsByTagName("td")[3].innerText;
      email = tr.getElementsByTagName("td")[4].innerText;
      mobile = tr.getElementsByTagName("td")[5].innerText;
      department_id = tr.getElementsByTagName("td")[6].innerText;
      salary = tr.getElementsByTagName("td")[7].innerText;
      birthdate  = tr.getElementsByTagName("td")[8].innerText;
      joining_date  = tr.getElementsByTagName("td")[9].innerText; 
      firstnameModal.value=firstname
      lastnameModal.value=lastname
      emailModal.value=email
      mobileModal.value=mobile
      // department_idModal.value=department_id
      // console.log(department_id)
      if(department_id==1){
        document.getElementById("r1").selected = true;
      }
      if(department_id==2){
        document.getElementById("r2").selected = true;
      }
      if(department_id==3){
        document.getElementById("r3").selected = true;
      }
      salaryModal.value=salary
      birthdateModal.value=birthdate
      joining_dateModal.value=joining_date
      idEdit.value=tr.getElementsByTagName("td")[1].innerText; 
      $('#editModal').modal('toggle')

    })
  })

// .....................................................................
//delete button js
deletes=document.getElementsByClassName('delete')
  Array.from(deletes).forEach((element)=>{
    element.addEventListener('click',(e)=>{
      tr=e.target.parentNode.parentNode;
      idDelete = tr.getElementsByTagName("td")[1].innerText; 
      // console.log(idDelete);
      if(confirm("Are you sure you want to delete this employee's record !")){
        // console.log('yes')
        window.location = `list.php?delete=${idDelete}`;
        
      }else{
        // console.log('no')
      }
    })
  })
</script>
<!-- ............................................................ -->
<!-- footer     -->
<?php include "sub/footer.php" ?>