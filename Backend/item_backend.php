<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Item
    if(isset($_POST['itemcode']) && isset($_POST['disc'])&& isset($_POST['compotype'])&& 
	isset($_POST['basicmaterial'])&& isset($_POST['drawingno'])&& isset($_POST['itemlength'])&& 
	isset($_POST['itemdia'])&& isset($_POST['gweight'])&& 
	isset($_POST['nweight'])&& isset($_POST['childcode'])&& isset($_POST['unit']) )
{

    $insetitemsql="INSERT INTO `itemmaster`(`itemcode`, `disc`, `boih`, `basic_material`, `drgno`, `length`, `dia`, `gweight`, `nweight`, `childcode`, `unitcode`) 
	VALUES ('$itemcode','$disc','$compotype','$basicmaterial','$drawingno','$itemlength','$itemdia','$gweight','$nweight','$childcode','$unit')";


            if(mysqli_query($con,$insetitemsql))
            {			

            $output="Done";

            }
            echo $output;
    // }

}


if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `itemmaster` where `id`='$itemid'";

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



    //update Item
    if(isset($_POST['uphidden_id']) && isset($_POST['upitemcode']) && isset($_POST['updisc'])&& isset($_POST['upcompotype'])&& 
	isset($_POST['upbasicmaterial'])&& isset($_POST['updrawingno'])&& isset($_POST['upitemlength'])&& 
	isset($_POST['upitemdia'])&& isset($_POST['upgweight'])&& 
	isset($_POST['upnweight'])&& isset($_POST['upchildcode'])&& isset($_POST['upunit']) )
{

    $updateitemsql="UPDATE `itemmaster` SET `itemcode`='$upitemcode',`disc`='$updisc',`boih`='$upcompotype',
                                            `basic_material`='$upbasicmaterial',`drgno`='$updrawingno',
                                            `length`='$upitemlength',`dia`='$upitemdia',`gweight`='$upgweight',
                                            `nweight`='$upnweight',`childcode`='$upchildcode',`unitcode`='$upunit'
                                             WHERE `id`='$uphidden_id'";

    echo $updateitemsql;
            if(mysqli_query($con,$updateitemsql))
            {			

            $output="Done";

            }
            echo $output;
    // }

}

		///delete item
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `itemmaster` WHERE `id`='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}




?>