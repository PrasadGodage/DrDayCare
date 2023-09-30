<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['gradename']) )
{

    $inseruser="INSERT INTO `grademaster`(`GradeName`) VALUES ('$gradename')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
            echo $output;
    // }

}
    if(isset($_POST['grdid']) && isset($_POST['upgradename']))
{

    $inseruser="UPDATE `grademaster` SET `GradeName`='$upgradename' WHERE `Gradeid`='$grdid'";

            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
            echo $output;
    // }

}


if (isset($_POST['gradeid']))
	{


		$itemid=$_POST['gradeid'];
		$selectquery="SELECT * FROM `grademaster` where `Gradeid`='$itemid'";

		$result=mysqli_query($con, $selectquery);

		$responce=array();

		if(mysqli_num_rows($result)>0)
            {

                while ($row=mysqli_fetch_assoc($result))
                {
                    $responce =$row;
                }
            }
        else
            {
                        $responce['status']=200;
                        $responce['message']="No Record Found";

            }
			echo json_encode($responce);
	}
else
		{
			            $responce['status']=200;
						$responce['message']="Invalid Request";
		}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `grademaster` WHERE Gradeid='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}



?>