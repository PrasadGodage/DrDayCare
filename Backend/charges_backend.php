<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['type']) && isset($_POST['amt']) )
{

    $checksql="SELECT * FROM `chargesmaster` WHERE `chargestype`='$type' AND `createdby`='$loginuserid'";
    // $checksql="SELECT * FROM `chargesmaster` WHERE `chargestype`='$type' AND `amt`='$amt' AND `createdby`='$loginuserid'";
    // echo $checksql;
    $res=mysqli_query($con,$checksql);
    echo mysqli_num_rows($res);
    if(mysqli_num_rows($res)>0){
        $output="Exist";
    }else{

    
    $inseruser="INSERT INTO `chargesmaster`( `chargestype`, `amt`, `createdby`)
                                    VALUES ('$type','$amt','$loginuserid')";
            if(mysqli_query($con,$inseruser))
            {			
                $output="Done";
            }
          

}
echo $output;
}

if (isset($_POST['gradeid']))
	{


		$itemid=$_POST['gradeid'];
		$selectquery="SELECT * FROM `chargesmaster` where `id`='$itemid'";

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
		  $sql="DELETE FROM `chargesmaster` WHERE id='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}

        if(isset($_POST['chargesid']) && isset($_POST['uptype']) && isset($_POST['upamt']))
        {
        
            $inseruser="UPDATE `chargesmaster` SET `chargestype`='$uptype',`amt`='$upamt' WHERE `id`='$chargesid'";
        
                    //echo $ledgerquery;
                    if(mysqli_query($con,$inseruser))
                    {			
        
                    $output="Done";
        
                    }
                    echo $output;
            // }
        
        }

?>