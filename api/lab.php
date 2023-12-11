<?php
require_once "../config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $lab = $_POST['lab'];
    $department = $_POST['department'];
    $data = getAllValues("SELECT * FROM `devices` WHERE `dept`= '$department' AND `labno`='$lab' ");
    echo json_encode($data);
}
