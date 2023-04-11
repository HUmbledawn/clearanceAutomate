<?php include('../security/security.php');



if (isset($_POST['submit'])) {
   $firstName =$_POST['firstName'];
   $middleName = $_POST['middleName'] =='' ? "" : $_POST['middleName'];
   $lastName =$_POST['lastName'];
   $suffixName = $_POST['suffixName'];
   $birthday =$_POST['birthday'];
   $bplace =$_POST['bplace'];
   $gender =$_POST['gender'];
   $occupation =$_POST['occupation'];
   $nationalID =$_POST['nationalID'];
   $citizenship =$_POST['citizenship'];
   $voter =$_POST['voter'];
   $precint =$_POST['precint'];
   $contactTracer =$_POST['contactTracer'];
   $lifeStatus =$_POST['lifeStatus'];
   $streetAddress =$_POST['streetAddress'];
  
   
   
   $query = "SELECT * FROM tbl_resident_list ORDER BY residentID DESC LIMIT 1";
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result);

   $empid='';
   
   
   $lastid = $row;
       if($lastid == "employeeID")
       {
           $empid = "RID-";
       }
       else
       {
           
           $rand = "RID-" . date("y")."-".strtotime(date("His"))."-".date("m");
            
            $empid = $rand;
       }
    

 //   $duplicate=mysqli_query($conn,"SELECT * FROM tbl_resident_list WHERE firstName='$firstName' AND middleName='$middleName' AND lastName='$lastName'");
//   if (mysqli_num_rows($duplicate)>0)
//   {
//             $_SESSION['message'] = 'Duplicated firstname or lastname or middlename already exists!';
//             $_SESSION['error'] = 'danger';
//   // header("Location: ../page/addResident.php");
//           echo '<script>alert("Duplicated firstname or lastname or middlename already exists!")</script>';
//           echo "<script> location.href='../page/resident_list.php'; </script>";
//   }

 $sql1 = "SELECT * FROM tbl_resident_list WHERE firstName='$firstName'AND lastName='$lastName'";
  $user1 = $conn->query($sql1) or die ($conn->error);
  $row = $user1->fetch_assoc();

  $result_register1 = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result_register1) > 0) {

    $_SESSION['message'] = 'Duplicated Resident already exists!';
    $_SESSION['success'] = 'danger';
     header("Location: ../page/resident_list.php");
  // echo '<script>alert("Duplicated firstname already exists!")</script>';
  // echo "<script> location.href='../page/resident_list.php'; </script>";
  exit();
  }

   else{


  $query = "INSERT INTO `tbl_resident_list`(`residentID`, `firstName`, `middleName`, `lastName`, `suffixName`, `birthday`, `bplace`, `gender`, `occupation`, `nationalID`, `citizenship`, `voter`, `precint`, `contactTracer`, `lifeStatus`, `streetAddress`) 
  VALUES ('$empid', '$firstName','$middleName','$lastName','$suffixName','$birthday','$bplace','$gender','$occupation','$nationalID','$citizenship','$voter','$precint','$contactTracer','$lifeStatus','$streetAddress')";
            $result = mysqli_query($conn, $query);
        if($result){
           
          $_SESSION['message'] = 'Successfully Created!';
		      $_SESSION['success'] = 'success';
          header("Location:../page/resident_list.php");
            // echo '<script>alert("Successfully Created")</script>';
            // echo "<script> location.href='../page/resident_list.php'; </script>";
        }
    // header('Location: ../page/resident_list.php'); 
     
            // }
   }
}


?>