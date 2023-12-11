<?php
include_once 'config.php';

if(isset($_POST['uploadmanual']))
{   
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_year = $_POST['year'];
 $file_semester = $_POST['semester'];
 $file_subjectcode = $_POST['subjectcode'];
 $folder="upload/submanual/";
 
 /* new file size in KB */
//  $new_size = $file_size/1024;  
 /* new file size in KB */
 $file_subjectcode = strtoupper($file_subjectcode);
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
   $sql = "UPDATE `submanuals` SET `subjectCode`='$file_subjectcode',`filename`='$final_file',`year`='$file_year',`semester`='$file_semester' WHERE subjectCode = '$file_subjectcode'";
  mysqli_query($conn,$sql);
  
 
  echo "File sucessfully upload";
        
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}
?>