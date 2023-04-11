<?php
 include('../security/security.php');

if (isset($_GET['id'])){
   

   $id = $_GET['id'];

   $query = " DELETE FROM tbl_barangay_cert WHERE id ='$id'";
       $result = mysqli_query($conn, $query);

       if($result)
       {
           $_SESSION['message'] = 'Successfully Deleted! !';
		$_SESSION['success'] = 'success';
          header("Location:../page/certificate_list.php");
       }
       else
       {
          $_SESSION['message'] = 'error=unknown error occured&user_data';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/certificate_list.php'); 
       }
}else{

   header("Location: ../page/certificate_list.php");
}

?>