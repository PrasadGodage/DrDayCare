<?php
session_start();
error_reporting(1);
include('config.php');
// include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];
    echo $loginuserid;
    $today=date("Y-m-d");

    if(isset($_POST['pname']) && isset($_POST['pmob']) && isset($_POST['pdate']) && isset($_POST['padd']) )
{
    // echo "Demo ";
    $inseruser="INSERT INTO `opdmaster`(`pname`, `pmob`, `pdob`, `paddress`, `opddate`, `opdstatus`,`loginid`)
          VALUES ('$pname','$pmob','$pdate','$padd','$today','OPEN','$loginuserid')";
            // echo $inseruser;
            if(mysqli_query($con,$inseruser))
            {			
                $output="Done";
            }
            echo $output;

}
    if(isset($_POST['txtid']) && isset($_POST['pfees'])&& isset($_POST['slspaytype']))
{
    // echo "Demo ";
    $inseruser="UPDATE `opdmaster` SET `opdstatus`='DONE' ,`opdfair`='$pfees',`paymenttype`='$slspaytype' WHERE id='$txtid'";
            // echo $inseruser;
            if(mysqli_query($con,$inseruser))
            {			
                $output="Done";
            }
            echo $output;

}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="UPDATE `opdmaster` SET `opdstatus`='CLOSED' WHERE id='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}
		///recover  data
		if(isset($_POST['recoverid']))
		{
				$recoverid=$_POST['recoverid'];
		  $sql="UPDATE `opdmaster` SET `opdstatus`='OPEN' WHERE id='$recoverid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}



?>