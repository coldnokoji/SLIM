<?php
include("repairData.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/d82cbb91b9.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type= "text/css" media="screen" href="style.php">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Repair Log</title>
  
  <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #333;
  color: white;
}
</style>
</head>
<body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
      if ($_POST['action'] == "repair") {
        $pcno = $_POST['pcno'];
        $labno=$_POST['labno'];
        $issue=$_POST['issue'];
        $ed = $_POST['ed'];
        $remarks = $_POST['remarks'];
        $date = date('Y-m-d H:i:s');
        $sql= "UPDATE `repair_log` SET `labno`='$labno',`device_no`='$pcno',`kharab_date`='$ed',`repair_date`='$date',`issue`='$issue',`remarks`='$remarks' WHERE `device_no` ='$pcno'";
        $result = mysqli_query($conn, $sql);
      }
    }
  }
  ?>
<nav>
    <div class="NavContainer">
      <div class="logo">
        <h1>
          SLIM
        </h1>
      </div>
      <div class="NavItem">
        <a href="labdetails.php">HOME</a>
        <a href="#">CONTACT</a>
        <a href="#">ABOUT</a>
        <i class="fa-solid fa-circle-user fa-2xl" style="color: #2596ff;"></i>
      </div>
    </div>
  </nav>

<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>Lab number</th>
         <th>Pc Number</th>
         <th>Date of Issue</th>
         <th>Status</th>
         <th>Issue</th>
         <th>Date of repair</th>
         <th></th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['labno']??''; ?></td>
      <td><?php echo $data['device_no']??''; ?></td>
      <td><?php echo $data['kharab_date']??''; ?></td>
      <td><?php 
      if($data['repair_date']=="To Be Repaired")
      {
      echo $data['repair_date']??'';
      }
      else{
        echo "Repaired";
      }
      ?>
  
    </td>
      <td><?php echo $data['issue']??''; ?></td>
      <td><?php echo $data['repair_date']??''; ?></td>

      <td>
       <div>   
       <button type="button" class="Repair" style="background-color:#DFFFCB;border: 1px solid black;padding:0 10px 0 10px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $data['device_no']; ?>">Repair</button></td>
      </div>
  
    
     </tr>
     <div class="modal fade" id="staticBackdrop<?php echo $data['device_no']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $data['device_no']; ?>" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel<?php echo $data['device_no']; ?>">Repair Log</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                  <form action="repair_log.php" method="post">
                   <input type="hidden" name="action" value="repair">
                   <input type="hidden" name="labno" value="<?php echo $data['labno'] ?>">
                   <input type="hidden" name="ed" value="<?php echo $data['kharab_date'] ?>">
                   <input type="hidden" name="pcno" value="<?php echo $data['device_no'] ?>">
                   <input type="hidden" name="issue" value="<?php echo $data['issue'] ?>">
                   
                   <label for="remarks"><b>Remark</b></label>
              <input type="text" placeholder="remarks" name="remarks" required><br>

           
                   </div>
                   <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
      </form>
                 </div>
               </div>
             </div>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
      </tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>