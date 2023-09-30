<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['Processname']) )
{

    $inseruser="INSERT INTO `processmaster`(`processname`) VALUES ('$Processname')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
            echo $output;
    // }

}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `processmaster` WHERE id='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}
		if(isset($_POST['deleteidprocess']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `itemprocessdtls` WHERE id='$deleteidprocess'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}





        //--------------------------------------------------------------------------------------------------------------


        if(isset($_POST['processname']) && isset($_POST['itemcode']) && isset($_POST['sequence'])  )
        {
        
            $inseruser="INSERT INTO `itemprocessdtls`(`itemcode`, `processname`, `sequence`) 
                                VALUES ('$itemcode','$processname','$sequence')";
        
        
                    //echo $ledgerquery;
                    if(mysqli_query($con,$inseruser))
                    {			
        
                    $output="Done";
        
                    }
                    echo $output;
            // }
        
        }
        










        //--------------------------------------------------------------------------------------------------------------

?>