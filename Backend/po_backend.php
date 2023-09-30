<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];



if(isset($_POST['poid']))
{
	$updateqty="UPDATE `openporawdata` SET `isdeleted`='1' WHERE `id`='$poid'";
    mysqli_query($con,$updateqty);

}
if(isset($_POST['poidforrecover']))
{
	$updateqty="UPDATE `openporawdata` SET `isdeleted`='0' WHERE `id`='$poidforrecover'";
    mysqli_query($con,$updateqty);

}





?>