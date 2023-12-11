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
  <link rel="stylesheet" type="text/css" media="screen" href="style.php">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>SLIM</title>

  <style>
    table {
      width: 60vw;
      border-collapse: collapse;
      border: 2px solid #333;
      margin: 20px 250px;
    }

    div {
      margin: 5px;
      padding: 5px;
    }

    th,
    td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #333;
      color: white;
    }

    td {
      background-color: #f2f2f2;
    }

    ul {
      list-style-type: disc;
      padding-left: 20px;
      margin: 0;
    }

    td ul li {
      margin: 5px 0;
    }

    td ul li:first-child {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
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

    <div class="buttons">
      <button class="EditBtn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Images</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="uploadmanual.php" method="post" enctype="multipart/form-data" target="blank">
                <input type="file" name="file" />
                <div>
                  <span>year: </span><select name="year">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div>
                  <span>semester: </span><select name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
                <div>
                  <span>Subject Code : </span><input type="text" name="subjectcode" id="subjectcode"
                    placeholder="eg: CSC301">
                </div>
                <!-- <select name="subject">
    <option value="Engineering Mathematics-III">Engineering Mathematics-III</option>
    <option value="Discrete Structures and  Graph Theory">Discrete Structures and  Graph Theory</option>
    <option value="Data Structure">Data Structure</option>
    <option value="Digital Logic & Computer Architecture">Digital Logic & Computer Architecture</option>
    <option value="Computer Graphics">Computer Graphics</option>
    <option value="Engineering MathematicsIV">Engineering MathematicsIV </option>
    <option value="Analysis of Algorithm">Analysis of Algorithm</option>
    <option value="Analysis of Algorithm">Analysis of Algorithm</option>
    <option value="Operating System">Operating System</option>
    <option value="Microprocessor">Microprocessor</option>
    <option value="Theoretical Computer">Theoretical Computer</option>
</select> -->
                <button type="submit" name="uploadmanual" id="submit" onclick="submitForm()">Submit</button>
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
  <?php
  require_once 'config.php';
  $sql = 'SELECT DISTINCT(`year`) FROM `submanuals` ';

  $AllYearInfo = getAllValues($sql);
  ?>
  <table>
    <thead>
      <tr>
        <th>Year</th>
        <th>Semester</th>
        <th>Subjects</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($AllYearInfo as $YearInfo) {
        $year = $YearInfo['year'];
        $sql3 = "SELECT COUNT('subjectName') FROM submanuals WHERE year= $year";
        $rowspan = getAllValues($sql3);
        ?>
        <tr>
          <td rowspan="<?php echo $rowspan[0]['COUNT(\'subjectName\')']; ?>">
            <?php echo $YearInfo['year'] ?>
          </td>

          <?php
          $sql1 = "SELECT DISTINCT(semester) FROM submanuals WHERE year= $year";
          $AllSeminfo = getAllValues($sql1);
          foreach ($AllSeminfo as $SemInfo) {
            $sem = $SemInfo['semester'];
            $sql3 = "SELECT COUNT('subjectName') FROM submanuals WHERE semester= $sem";
            $rowspan = getAllValues($sql3);
            ?>
            <td rowspan="<?php echo $rowspan[0]['COUNT(\'subjectName\')']; ?>">
              <?php echo $SemInfo['semester'] ?>
            </td>
            <?php
            $sql2 = "SELECT DISTINCT * FROM submanuals WHERE year=$year AND semester = $sem";
            $AllSubInfo = getAllValues($sql2);
            foreach ($AllSubInfo as $SubInfo) {
              ?>
              <td>
                <ul>
                  <li><a href="upload/submanual/<?php echo $SubInfo['filename']; ?>" target='blank'>
                      <?php echo $SubInfo['subjectName'] ?>
                    </a></li>
                </ul>
              </td>
            </tr>
            <?php
            }
          }
      }
      ?>
      <!-- Add more semesters for Year 1 if needed -->
      <!-- Repeat the structure for other years -->
    </tbody>
  </table>

</body>

</html>