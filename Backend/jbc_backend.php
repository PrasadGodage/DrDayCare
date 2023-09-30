<?php
session_start();
// error_reporting(0);
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['openpoid']) && isset($_POST['jobcdate'])&& isset($_POST['itemcode']))
{

	$jobcardid=makenewjobcardentry($con,$jobcdate,$openpoid);
	$newjobcardid="JBC-".$jobcardid;
	checkrequiredstockforjobcard($con,$openpoid,$jobcdate,$itemcode,$newjobcardid);



    }



//update jobard invoice number
    if(isset($_POST['jobcardnumber']) && isset($_POST['invo'])&& isset($_POST['invdate'])&& isset($_POST['invqty']))
{
	// echo $jobcardnumber;
	$jobcard=getjobcardnumber($con,$jobcardnumber);
	$polineid=getpolineidbyjobcardno($con,$jobcard);
	$rawpodata=getpodata($con,$polineid);
	$finpoarray=$rawpodata[0];
	// print_r($finpoarray);

	$poqty=$finpoarray['poqty'];
	echo "Qty from PO ".$poqty;
	echo "\nCompleted Qty ".$invqty;
$doneqty=0;
$remainingproductionqty=0;

	if($invqty==0)
	{
		$doneqty=$poqty;
	}else if($poqty>$invqty)
	{
		$doneqty=$invqty;
		$remainingproductionqty=$poqty-$invqty;
	}
echo "\nProduction done qty = ".$doneqty;
echo "\nRemaining production qty = ".$remainingproductionqty;

if($remainingproductionqty>0)
{
	echo "\n Make new po Entry of ".$remainingproductionqty;
	print_r($finpoarray);

	$npoplant=$finpoarray['plant'];
	$npobuyername=$finpoarray['buyername'];
	$npopono=$finpoarray['pono'];
	$npopoline=$finpoarray['poline'];
	$npopodate=$finpoarray['podate'];
	$npodeliverydate=$finpoarray['deliverydate'];
	$npoitemcode=$finpoarray['itemcode'];
	$npodisc=$finpoarray['disc'];
	$npodrawingno=$finpoarray['drawingno'];
	$npobasicmaterial=$finpoarray['basicmaterial'];
	$npopoqty=$remainingproductionqty;
	$npounitprice=$finpoarray['unitprice'];
	$today=date("Y-m-d");

	$query="INSERT INTO `openporawdata`(`plant`, `buyername`, `pono`, `poline`, `podate`, `deliverydate`, `itemcode`, `disc`, `drawingno`, `basicmaterial`, `poqty`, `unitprice`, `recorddate`) VALUES 
	('$npoplant','$npobuyername','$npopono','$npopoline','$npopodate','$npodeliverydate','$npoitemcode','$npodisc','$npodrawingno','$npobasicmaterial','$npopoqty','$npounitprice','$today')";
	 
	 mysqli_query($con,$query);

}

   $updatelegerrecord="UPDATE `jobcardmaster` SET `jbcstatus`='Complete',`jbcinvno`='$invo',`invdate`='$invdate',`invqty`='$doneqty' WHERE `jobcardid`='$jobcardnumber'";
			///echo $insertsql;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";
				
				}
                echo $output;
}

    if(isset($_POST['jobcardnumberforlot']) && isset($_POST['lotno']))
{
   $updatelegerrecord="UPDATE `jobcardmaster` SET `jbcstatus`='Production',`lotno`='$lotno' WHERE `jobcardid`='$jobcardnumberforlot'";
			// echo $updatelegerrecord;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";
				
				}
                echo $output;
}



if(isset($_POST['deljobcardno']) && isset($_POST['delreasontxt']))
{
	echo "Jobcardid  : ".$deljobcardno,"\n";
	echo "Reason : ".$delreasontxt."\n";
	$today=date("Y-m-d");
	
	if(deletejobcarddataandrestorestock($con,$deljobcardno))
	{
		updatejobcardstatus($con,$deljobcardno,$delreasontxt,$today);
		deletestocktransactionbyjobcardnumner($con,$deljobcardno);	
		
		
	}else
	{
		echo " Error to restore the stock";
	}
}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `itemmaster` WHERE itemid='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}





// if (isset($_POST['updateid']))
// 	{


// 		$itemid=$_POST['updateid'];
// 		$selectquery="SELECT * FROM `itemmaster` where `itemid`='$itemid'";

// 		$result=mysqli_query($con, $selectquery);

// 		$responce=array();

// 		if(mysqli_num_rows($result)>0)
// 		{

// 			while ($row=mysqli_fetch_assoc($result))
// 			{
// 				$responce =$row;
// 			}
// 		}else
// 		{
// 					$responce['status']=200;
// 					$responce['message']="No Record Found";

// 		}
// 			echo json_encode($responce);
// 		}else
// 		{
// 			            $responce['status']=200;
// 						$responce['message']="Invalid Request";
// 		}


// 		if (isset($_POST['fpartyid']))
// 		{
// 			$sql="SELECT * FROM `partydata` WHERE id='$fpartyid'";
// 			// echo $sql;
// 			$result=mysqli_query($con, $sql);
// 			$address="ee";
// 			if($row = mysqli_fetch_assoc($result))
// 			{
// 				$address=$row['address'];
// 			}
// 			echo $address;
// 		}

// 		if (isset($_POST['partylegderid']))
// 		{
// 			$sql="SELECT * FROM `ledgermaster` WHERE `ledgerid`='$partylegderid'";
// 			//  echo $sql;
// 			$result=mysqli_query($con, $sql);
// 			 $openingbalance=00;
// 			if($row = mysqli_fetch_assoc($result))
// 			{
// 				$openingbalance=$row['openingbalance'];
// 			}
// 			echo $openingbalance;
// 		}

?>