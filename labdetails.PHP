<!DOCTYPE html>
<html lang="en">

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
  <title>SLIM</title>





</head>


<body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <?php
  require_once "config.php";
  // $SelectedLab = $_COOKIE['SelectedLab'];
  $sql = "SELECT * FROM `devices`";
  $all_pc_info = getAllValues($sql);

 

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
      if ($_POST['action'] == "add") {
        $pcno = $_POST['pcno'];
        $mname = $_POST['mname'];
        $msno = $_POST['msno'];
        $ksno = $_POST['ksno'];
        $muno = $_POST['muno'];
        $mono = $_POST['mono'];
        $ip = $_POST['ip'];
        $submsk = $_POST['submsk'];
        $pcname = $_POST['pcname'];
        $processor = $_POST['processor'];
        $cpuspeed= $_POST['cpuspeed'];
        $memory = $_POST['memory'];
        $harddisk = $_POST['harddisk'];
        $dvd = $_POST['dvd'];
        $display = $_POST['display'];
        $sound = $_POST['sound'];
        $monitor = $_POST['monitor'];
        $keyboard = $_POST['keyboard'];
        $mouse = $_POST['mouse'];
        $softwares  = $_POST['softwares'];
        $dept='comps';
        $labno = $_COOKIE["SelectedLab"];
        $lancard = $_POST['lancard'];

        $sql1 =
          "INSERT INTO `devices`(`sno`, `pcno`, `mname`, `msno`, `ksno`, `muno`, `mono`, `ip`, `submsk`, `pcname`, `processor`, `CPUspeed`, `memory`, `harddisk`, `dvd`, `display`, `sound`, `lancard`, `monitor`, `keyboard`, `mouse`, `softwares`, `dept`, `labno`, `isworking`, `istransfered`, `isscrapped`) 
          VALUES ('','$pcno','$mname','$msno','$ksno','$muno','$mono','$ip','$submsk','$pcname','$processor','$cpuspeed','$memory','$harddisk','$dvd','$display','$sound','$lancard','$monitor','$keyboard','$mouse','$softwares','$dept','$labno','1','0','0')";
        $result = mysqli_query($conn, $sql1);
      } else if ($_POST['action'] == "report") {
        $labno = $_COOKIE["SelectedLab"];
        $pcno = $_POST['pcno'];
        $issue = $_POST['issue'];
        
        $sql1 = "INSERT INTO `repair_log`(`labno`, `device_no`,`issue`, `remarks`) VALUES ('$labno','$pcno','$issue','')";
        $sql2 = "UPDATE `devices` SET `isworking` = 0 WHERE `pcno`= '$pcno'";
        $result = mysqli_query($conn, $sql1);
        $result = mysqli_query($conn, $sql2);
      }
      else if ($_POST['action'] == "delete") {
        $labno = $_COOKIE["SelectedLab"];
        $pcno = $_POST['pcno'];
        $sql1 = "DELETE FROM `repair_log WHERE 'pcno'= $pcno";

        $result = mysqli_query($conn, $sql1);

      }
      else if ($_POST['action'] == "update") {
        $pcno = $_POST['pcno'];
        $mname = $_POST['mname'];
        $msno = $_POST['msno'];
        $ksno = $_POST['ksno'];
        $muno = $_POST['muno'];
        $mono = $_POST['mono'];
        $ip = $_POST['ip'];
        $submsk = $_POST['submsk'];
        $pcname = $_POST['pcname'];
        $processor = $_POST['processor'];
        $cpuspeed= $_POST['cpuspeed'];
        $memory = $_POST['memory'];
        $harddisk = $_POST['harddisk'];
        $dvd = $_POST['dvd'];
        $display = $_POST['display'];
        $sound = $_POST['sound'];
        $monitor = $_POST['monitor'];
        $keyboard = $_POST['keyboard'];
        $mouse = $_POST['mouse'];
        $softwares  = $_POST['softwares'];
        $dept='comps';
        $labno = $_COOKIE["SelectedLab"];
        $lancard = $_POST['lancard'];

        $sql1 =
          "UPDATE `devices` SET (`sno`, `pcno`, `mname`, `msno`, `ksno`, `muno`, `mono`, `ip`, `submsk`, `pcname`, `processor`, `CPUspeed`, `memory`, `harddisk`, `dvd`, `display`, `sound`, `lancard`, `monitor`, `keyboard`, `mouse`, `softwares`, `dept`, `labno`, `isworking`, `istransfered`, `isscrapped`) 
          VALUES ('','$pcno','$mname','$msno','$ksno','$muno','$mono','$ip','$submsk','$pcname','$processor','$cpuspeed','$memory','$harddisk','$dvd','$display','$sound','$lancard','$monitor','$keyboard','$mouse','$softwares','$dept','$labno','1','0','0') WHERE 'pcno'=$pcno";
        $result = mysqli_query($conn, $sql1);
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
  <div class="ActionBar">
    <div class="deplab">
      <div class="Dep">
        Department : <select id="DepartmentDropdown">
          <option value="" >Select a Department</option>
        </select>
      </div>
      <div class="lab">
        Lab : <select id="LabDropdown">
          <option value="" >Select a Lab</option>
        </select>
      </div>
    </div>
    <div class="buttons">

      <button type="button" class="Add" style="background-color:#DFFFCB;border: 1px solid black;padding:0 10px 0 10px;" data-bs-toggle="modal" data-bs-target="#addDeivce">ADD</button>
      <button type="button" class="delete" style="background-color:#FFCBCB;border: 1px solid black;padding:0 10px 0 10px;" data-bs-toggle="modal" data-bs-target="#deleteDeivce">Delete</button>
      <button type="button" class="Update" style="background-color:#CBDAFF;border: 1px solid black;padding:0 10px 0 10px;" data-bs-toggle="modal" data-bs-target="#updateDeivce">UPDATE</button>
      <button type="button" class="Report" style="background-color:#DFFFCB;border: 1px solid black;padding:0 10px 0 10px;" data-bs-toggle="modal" data-bs-target="#ReportDeivce">Report Error</button>
    </div>
  </div>
  <div class="Hero">
    <div class="SideNav">
      <ul style="margin-top: 50px; padding:20px;">
        <li><a href="manual.php" style="text-decoration: none;font-size:20px;">Subject Manual</a></li>
        <li><a href="repair_log.php" style="text-decoration: none;font-size:20px;">Repair Log</a></li>
      </ul>
    </div>
    <div id="gridChanger">
        <div class="Grid-container">
              <?php
              if(isset($_POST['city'])){
                                    
                $selectedOption = $_POST['city'];
                  setcookie("SelectedLab",$selectedOption,time()+3600,"/");
                  $sql = "SELECT `file_name` FROM `files` WHERE `timestamp` = (SELECT MAX(`timestamp`) FROM `files` WHERE `category` = 'layout' AND `lab` = $selectedOption)";
                  $ttinfo = getValue($sql);
                  $ttinfo1 = json_encode($ttinfo);
                  $ttinfo2 = substr($ttinfo1,14);
                  setcookie("layout", $ttinfo2, time() + 3600, "/");
                  $sql = "SELECT `file_name` FROM `files` WHERE `timestamp` = (SELECT MAX(`timestamp`) FROM `files` WHERE `category` = 'timetable' AND `lab` = $selectedOption)";
                  $ttinfo = getValue($sql);
                  $ttinfo1 = json_encode($ttinfo);               
                  $ttinfo2 = substr($ttinfo1,14);
                  setcookie("timetable", $ttinfo2, time() + 3600, "/");
              } else{
              $selectedOption = "Please select a lab";
              echo $selectedOption;
            }
            
            foreach ($all_pc_info as $pc_info) {
              if($selectedOption==$pc_info['labno']){

            ?>
            <div class="Grid-item">
              <div class="Item-icon<?php echo $pc_info['pcno'];?>">
                <i class="fa-solid fa-desktop fa-2xl"></i>
              </div>
              <!-- Button trigger modal -->
              <div class="Item-button">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $pc_info['pcno']; ?>">
                  <?php echo $pc_info['pcno'];
                  ?>

                </button>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop<?php echo $pc_info['pcno']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">pc INFORMATION</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php echo "pc Number:&emsp;"   . $pc_info['pcno']; ?><br>
                    <?php echo "pc Type:&emsp;"     . $pc_info['pcno']; ?><br>
                    <?php echo "Patient Name:&emsp;"  . $pc_info['pcno']; ?><br>
                    <?php echo "Doctor Name:&emsp;"   . $pc_info['mname']; ?><br>
                    <?php echo "Lab Number:&emsp;"    . $pc_info['pcno']; ?><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            }
            ?>
          </div>
     </div>
      <div>
          <div id="imageChanger">
            <div class="TT">
              <?php
              $finalimage="SAKEC123.jpg";
              if (isset($_POST['type'])) {
                $type = $_POST['type'];
                if ($type == 1) {
                  if (isset($_COOKIE["layout"])) {
                    $ttinfo2= $_COOKIE["layout"];
                  $finalimage = $ttinfo2;
                  }
                } elseif ($type == 2) {
                  if (isset($_COOKIE["timetable"])) {
                    $imgname2 = $_COOKIE["timetable"];
                    $finalimage = $imgname2;
                  }
                } 
              } else {
                $type = "0";
                $finalimage="SAKEC-NewBuilding.JPG";
              }
              ?>
              <img src="upload/<?php echo $finalimage; ?>" class="TTImage" alt="<?php echo $finalimage; ?>">
            </div>
          </div>
          <div style="justify-content: space-between;display: flex;padding-left:5vw;padding-right:5vw">
          <div style="border-radius:20px;background-color:lightgrey;border: 1px solid rgb(71, 71, 71); padding:0;">
            <button class="LayoutBtn" id="Limg">LAYOUT</button>
            <button class="TTBtn" id ="TTimg">TimeTable</button>
          </div>
          <button class="EditBtn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Images</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data" target="blank">
                      <input type="file" name="file" />
                      <select name="category">
                          <option value="timetable">TimeTable</option>
                          <option value="layout">Layout</option>
                          
                      </select>
                      <button type="submit" name="upload" id="submit" onclick="submitForm(event)">Submit</button>
                      <button type="reset">reset</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div> 
    </div>
  <div class="modal fade" id="addDeivce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDeivceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addDeivceLabel">system information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
          <form class="modal-content" action="labdetails.php" method="post">
            <div class="container">
              <h1>ADD A NEW PC</h1>
              <p>Please fill in this form to add a new system.</p>
              <hr>
              <input type="hidden" name="action" value="add">
              <label for="pcno"><b>pc number</b></label>
              <input type="text" placeholder="enter the pc number" name="pcno" required><br>

              <label for="mname"><b>machine name</b></label>
              <input type="text" placeholder="Enter machine name" name="mname" required><br>

              <label for="msno"><b>machine serial number</b></label>
              <input type="text" placeholder="enter machine serial number" name="msno" required><br>

              <label for="ksno"><b>keyboard serial number</b></label>
              <input type="text" placeholder="enter keyboard serial number" name="ksno" required><br>

              <label for="muno"><b>mouse serial number</b></label>
              <input type="text" placeholder="enter mouse serial number" name="muno" required><br>

              <label for="mono"><b>monitor serial number</b></label>
              <input type="text" placeholder="enter monitor serial number" name="mono" required><br>

              <label for="ip"><b>IP address</b></label>
              <input type="text" placeholder="enter machine ip adress" name="ip" required><br>

              <label for="submsk"><b>subnet mask number</b></label>
              <input type="text" placeholder="enter machine submsk" name="submsk" required><br>

              <label for="pcname"><b>PCname</b></label>
              <input type="text" placeholder="enter pc name" name="pcname" required><br>

              <label for="processor"><b>Processor</b></label>
              <input type="text" placeholder="enter machine processor" name="processor" required><br>

              <label for="CPUspeed1"><b>CPUspeed</b></label>
              <input type="text" placeholder="enter machine cpu speed" name="CPUspeed1" required><br>

              <label for="memory"><b>memory size RAM </b></label>
              <input type="text" placeholder="enter machine memory size" name="memory" required><br>

              <label for="harddisk"><b>HARD DISK SIZE</b></label>
              <input type="text" placeholder="enter hard disk SIZE" name="harddisk" required><br>
              
              <label for="cpuspeed"><b>CPU SPEED</b></label>
              <input type="text" placeholder="enter DVD ROM TYPE" name="cpuspeed" required><br>

              <label for="dvd"><b>DVD TYPE</b></label>
              <input type="text" placeholder="enter DVD ROM TYPE" name="dvd" required><br>

              <label for="display"><b>display specs</b></label>
              <input type="text" placeholder="enter display specs" name="display" required><br>

              <label for="sound"><b>sound specs</b></label>
              <input type="text" placeholder="enter sound specs" name="sound" required><br>

              <label for="lancard"><b>lancard type</b></label>
              <input type="text" placeholder="enter lan card type" name="lancard" required><br>

              <label for="monitor"><b>monitor model</b></label>
              <input type="text" placeholder="enter monitor model" name="monitor" required><br>

              <label for="keyboard"><b>keyboard model</b></label>
              <input type="text" placeholder="enter keyboard model" name="keyboard" required><br>

              <label for="mouse"><b>mouse model</b></label>
              <input type="text" placeholder="enter mouse model" name="mouse" required><br>

              <label for="softwares"><b>softwares in the pc</b></label>
              <input type="text" placeholder="enter softwares in the machine" name="softwares" required><br>


              <div class="clearfix">
                <button type="submit" class="signup">sumbit</button>
              </div>
            </div>
          </form>
        </div>
            </div>
            </div>
            </div>
       
       <!-- ------------------------------------ -->

  <div class="modal fade" id="ReportDeivce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ReportDevice">Report Device</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
          <form class="modal-content" action="labdetails.php" method="post">
            <div class="container">
   
              <p>Please fill in this form to report a system.</p>
              <hr>
              <input type="hidden" name="action" value="report">
              <label for="pcno"><b>pc number</b></label>
              <input type="text" placeholder="eg - 701-15" name="pcno" required><br>

              <label for="issue"><b>Issue</b></label>
              <input type="text" placeholder="" name="issue" required><br>



              <div class="clearfix">
                <button type="submit" class="signup">submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteDeivce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteDevice">Delete Device</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
          <form class="modal-content" action="labdetails.php" method="post">
            <div class="container">
   
              <p>Please fill in this form to delete a system</p>
              <hr>
              <input type="hidden" name="action" value="delete">
              <label for="pcno"><b>pc number</b></label>
              <input type="text" placeholder="eg - 701-15" name="pcno" required><br>




              <div class="clearfix">
                <button type="submit" class="signup">submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  <div class="modal fade" id="updateDeivce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateDeivceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateDeivceLabel">system information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
          <form class="modal-content" action="labdetails.php" method="post">
            <div class="container">
              <h1>Update</h1>
              <p></p>
              <hr>
              <input type="hidden" name="action" value="update">
              <label for="pcno"><b>pc number</b></label>
              <input type="text" placeholder="enter the pc number" name="pcno" required><br>

              <label for="mname"><b>machine name</b></label>
              <input type="text" placeholder="Enter machine name" name="mname" required><br>

              <label for="msno"><b>machine serial number</b></label>
              <input type="text" placeholder="enter machine serial number" name="msno" required><br>

              <label for="ksno"><b>keyboard serial number</b></label>
              <input type="text" placeholder="enter keyboard serial number" name="ksno" required><br>

              <label for="muno"><b>mouse serial number</b></label>
              <input type="text" placeholder="enter mouse serial number" name="muno" required><br>

              <label for="mono"><b>monitor serial number</b></label>
              <input type="text" placeholder="enter monitor serial number" name="mono" required><br>

              <label for="ip"><b>IP address</b></label>
              <input type="text" placeholder="enter machine ip adress" name="ip" required><br>

              <label for="submsk"><b>subnet mask number</b></label>
              <input type="text" placeholder="enter machine submsk" name="submsk" required><br>

              <label for="pcname"><b>PCname</b></label>
              <input type="text" placeholder="enter pc name" name="pcname" required><br>

              <label for="processor"><b>Processor</b></label>
              <input type="text" placeholder="enter machine processor" name="processor" required><br>

              <label for="CPUspeed1"><b>CPUspeed</b></label>
              <input type="text" placeholder="enter machine cpu speed" name="CPUspeed1" required><br>

              <label for="memory"><b>memory size RAM </b></label>
              <input type="text" placeholder="enter machine memory size" name="memory" required><br>

              <label for="harddisk"><b>HARD DISK SIZE</b></label>
              <input type="text" placeholder="enter hard disk SIZE" name="harddisk" required><br>
              
              <label for="cpuspeed"><b>CPU SPEED</b></label>
              <input type="text" placeholder="enter DVD ROM TYPE" name="cpuspeed" required><br>

              <label for="dvd"><b>DVD TYPE</b></label>
              <input type="text" placeholder="enter DVD ROM TYPE" name="dvd" required><br>

              <label for="display"><b>display specs</b></label>
              <input type="text" placeholder="enter display specs" name="display" required><br>

              <label for="sound"><b>sound specs</b></label>
              <input type="text" placeholder="enter sound specs" name="sound" required><br>

              <label for="lancard"><b>lancard type</b></label>
              <input type="text" placeholder="enter lan card type" name="lancard" required><br>

              <label for="monitor"><b>monitor model</b></label>
              <input type="text" placeholder="enter monitor model" name="monitor" required><br>

              <label for="keyboard"><b>keyboard model</b></label>
              <input type="text" placeholder="enter keyboard model" name="keyboard" required><br>

              <label for="mouse"><b>mouse model</b></label>
              <input type="text" placeholder="enter mouse model" name="mouse" required><br>

              <label for="softwares"><b>softwares in the pc</b></label>
              <input type="text" placeholder="enter softwares in the machine" name="softwares" required><br>


              <div class="clearfix">
                <button type="submit" class="signup">sumbit</button>
              </div>
            </div>
          </form>
        </div>
        </div>
        </div>
        </div>


  <div class="footer">
    LAB ASISTANT : 

  </div>


  <script>
    function submitForm(event) {
        event.preventDefualt();
            document.contact-form.submit();
            document.getElementById("myform").reset();
            }
    // Sample JSON data for countries and cities
    const college = {
      countries: [{
          name: "Comps",
          cities: [<?php 
             $sql = "SELECT DISTINCT`labno` FROM `devices` ";
             $labinfo= getAllValues($sql);
                 foreach($labinfo as $linfo){
                   
                   echo "'".$linfo['labno']."',";
                 } ?>]
        },
        {
          name: "IT",
          cities: ["4", "5", "6"]
        },
        {
          name: "EXTC",
          cities: ["7", "8", "9"]
        }
        
      ]
    };

    // Get references to the dropdown elements
    const countryDropdown = document.getElementById("DepartmentDropdown");
    const cityDropdown = document.getElementById("LabDropdown");

    // Populate the country dropdown
    college.countries.forEach(country => {
      const option = document.createElement("option");
      option.text = country.name;
      option.value = country.name;
      countryDropdown.appendChild(option);
    });

    // Update the city dropdown based on the selected country
    countryDropdown.addEventListener("change", function() {
      const selectedCountry = this.value;

      // Clear existing options
      cityDropdown.innerHTML = "<option value=''>Select a Lab</option>";

      // Find the selected country from the data
      const country = college.countries.find(c => c.name === selectedCountry);
      console.log(country);

      // Populate the city dropdown with the cities of the selected country
      if (country) {
        country.cities.forEach(city => {
          const option = document.createElement("option");
          option.text = city;
          option.value = city;
          cityDropdown.appendChild(option);
        });
      }
    });

    cityDropdown.addEventListener("change", function() {
      var selectedOption = this.value;
      const selectedCountry = countryDropdown.value;

      // Find the selected country from the data
      const country = college.countries.find(c => c.name === selectedCountry);

      if (country) {
        var city = 100;
        city = country.cities.find(c => c === selectedOption);
        console.log(city);

        $.ajax({
          url: window.location.href,
          method: 'POST',
          data: {
            city: city
          },
          success: function(data) {
            var $response = $(data);  // Convert the response to a jQuery object
    
            // Find the specific class within the response
            var $specificClass = $response.find('.Grid-container');
            var $specificClass2 = $response.find('.TT');
            
            console.log('Selected elements:', $specificClass);
            console.log('Selected elements:', $specificClass2);
            $("#gridChanger").html($specificClass);
            $("#imageChanger").html($specificClass2);
          }
        });

      }
    });

    const Limg = document.getElementById("Limg");
    Limg.addEventListener("click", function() {

      var type = "1";



      console.log(type);

      $.ajax({
        url: window.location.href,
        method: 'POST',
        data: {
          type: type
        },
        success: function(data) {
          var $response = $(data); // Convert the response to a jQuery object

          // Find the specific class within the response

          var $specificClass2 = $response.find('.TT');


          console.log('Selected elements:', $specificClass2);

          $("#imageChanger").html($specificClass2);
        }
      });
    });
    const TTimg = document.getElementById("TTimg");
    TTimg.addEventListener("click", function() {

      var type = "2";



      console.log(type);

      $.ajax({
        url: window.location.href,
        method: 'POST',
        data: {
          type: type
        },
        success: function(data) {
          var $response = $(data); // Convert the response to a jQuery object

          // Find the specific class within the response

          var $specificClass2 = $response.find('.TT');


          console.log('Selected elements:', $specificClass2);

          $("#imageChanger").html($specificClass2);
        }
      });
    });
  </script>

</body>

</html>