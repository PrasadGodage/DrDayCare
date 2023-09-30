<?php
// session_start();
// include('config.php');
	// $loginuserid=$_SESSION['id'];

function getopdcharges($con,$loginuserid)
{
  //   $selectquery = "SELECT `chargestype` FROM `chargesmaster` where `chargestype`='OPD' AND `createdby`='$loginuserid'";
  //   //  echo $selectquery;
  //  $result = mysqli_query($con, $selectquery);
  //  $row = mysqli_fetch_assoc($result);
  //  $chargestype=$row['chargestype'];

  //  echo $chargestype;
}


// function calculateAge($dateOfBirth) {
//   // Convert the date of birth to a DateTime object
//   $dob = new DateTime($dateOfBirth);

//   // Get the current date
//   $currentDate = new DateTime();

//   // Calculate the difference between the current date and date of birth
//   $age = $currentDate->diff($dob);

//   // Return the age in years
//   return $age->y;
// }



// function getchem_mechID($con,$id)
// {
//     $selectquery = "SELECT * FROM `chem_mechmaster` where `ChemMechId`='$id'";
//    //   echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $legerid=$row['Name'];

//    return $legerid;
// }

// function getrmsizedatabychildid($con,$childcode)
// {
//   $selectquery = "SELECT * FROM `gradediameteruniquecode` where `uniquecode`='$childcode'";
//   // echo $selectquery;
// $result = mysqli_query($con, $selectquery);
// $row = mysqli_fetch_assoc($result);
// $gradeid=$row['grade'];
// $dia=$row['diameter'];

//   $gradename=getgradenamebyID($con,$gradeid);

//   return $childcode."/".$gradename."-".$dia;
// }

// function getgradenamebyID($con,$id)
// {
//     $selectquery = "SELECT * FROM `grademaster` where `Gradeid`='$id'";
//       // echo $selectquery;
//       $GradeName="No Record Found";
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $GradeName=$row['GradeName'];

//    return $GradeName;
// }



// function getunitnamebyID($con,$id)
// {
//     $selectquery = "SELECT * FROM `unitmaster` where `id`='$id'";
//       // echo $selectquery;
//       $unitname="No Record Found";
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $unitname=$row['unit'];

//    return $unitname;
// }
// function isitemcodeexist($con,$itemcode)
// {
//     $selectquery = "SELECT * FROM `itemmaster` where `itemcode`='$itemcode'";
//       // echo $selectquery;
//       $unitname="No Record Found";
//    $result = mysqli_query($con, $selectquery);

//    if(mysqli_num_rows($result)>0)
//    {
//       return "true";
//    }else
//    {
//       return "false";
//    }

// }


// function getgradenamebychildcode($con,$childcode)
// {
//     $selectquery = "SELECT * FROM `gradediameteruniquecode` where `uniquecode`='$childcode'";
//       // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $gradeid=$row['grade'];

//    // $GradeName=getgradenamebyID($con,$gradeid);

//    return $gradeid;
// }


// function getobservactiontable($con,$lotnoformasters)
// {
//    $rowcode= "
//    <tr>
//     <th colspan='9'>CHEMICAL COMPOSITION</th>
//    </tr>
//    <tr> 
//    <th>Lot No</th> 
//    <th></th>
//     "; 
        
    
//    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
   
//    $res=mysqli_query($con,$selectmenulist);
   
//    if(mysqli_num_rows($res)>0)
//    {
//      $num=1;
//            while($row=mysqli_fetch_array($res))
//        {
      
//            $rowcode.="<th>".getchem_mechID($con,$row['ChemMechId'])."</th>";
            
//        $num++;
//      }
//    }
  
//    $rowcode.="</tr>";

//    $minrow= "<tr> <td></td> <td>Min</td> "; 
       
   
//    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
   
//    $res=mysqli_query($con,$selectmenulist);
   
//    if(mysqli_num_rows($res)>0)
//    {
//      $num=1;
//            while($row=mysqli_fetch_array($res))
//        {
      
//            $minrow.="<td>".$row['MnValue']."</td>";
            
//        $num++;
//      }
//    }
  
//    $minrow.="</tr>";

//    $maxrow= "<tr>  <td></td><td>Max</td> "; 
       
   
//    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
   
//    $res=mysqli_query($con,$selectmenulist);
   
//    if(mysqli_num_rows($res)>0)
//    {
//      $num=1;
//            while($row=mysqli_fetch_array($res))
//        {
      
//            $maxrow.="<td>".$row['MxValue']."</td>";
            
//        $num++;
//      }
//    }
  
//    $maxrow.="</tr>";

   

//    $obsrow= "<tr> <td><b>".$lotnoformasters."</b></td> <td>Observed</td> "; 
       
   
//    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
   
//    $res=mysqli_query($con,$selectmenulist);
   
//    if(mysqli_num_rows($res)>0)
//    {
//      $num=1;
//            while($row=mysqli_fetch_array($res))
//        {
      
//            $obsrow.="<td>".$row['obsvalue']."</td>";
            
//        $num++;
//      }
//    }
  
//    $obsrow.="</tr>";




//    echo $rowcode.$minrow.$maxrow.$obsrow;
// }

// function getgradenamebylotno($con,$lotno)
// {
//    $selectquery = "SELECT * FROM `reciptmaster` where `lotno`='$lotno'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $itemchildcode=$row['itemcode'];

//    return getgradenamebychildcode($con,$itemchildcode);
// }


// function updatejobcardno($con,$jbcid)
// {
//   $prefix="JBC-";
//   $jobcardID=$prefix.$jbcid;
//     $updatesql="UPDATE `jobcardmaster` SET `jbcno`='$jobcardID' WHERE `jobcardid`='$jbcid'";
//     $result=mysqli_query($con,$updatesql);

// }
// function updateopenpostatustoone($con,$openpoid)
// {
//     $updatesql="UPDATE `openporawdata` SET `status`='1' WHERE `id`='$openpoid'";
//     $result=mysqli_query($con,$updatesql);
// }



// function getreciptdatafortransaction($con,$reciptid)
// {
//   $selectquery = "SELECT * FROM `reciptmaster` where `id`='$reciptid'";
//   // echo $selectquery;
//   $result = mysqli_query($con, $selectquery);
//   if(mysqli_num_rows($result)>0)
//   {
//         $row = mysqli_fetch_assoc($result);
//         $date=$row['reciptdate'];
//         $childcode=$row['itemcode'];
//         $category=$row['category'];
//         $itemdisc=$row['reciptdisc'];
//         $childcode=$row['childcode'];
//         $qty=$row['qty'];
//         $lotno=$row['lotno'];
//         $itemunit=getunitnamebyID($con,$row['rmunitcode']);
//         $itemcode=getgradenamebychildcode($con,$childcode);

//         $itemname=getgradenamebyID($con,$itemcode);

//       makestocktransactionentry($con,$date,$itemcode,"INWARD",$qty,$lotno);

//       makestockentry($con,$itemname,$itemcode,$itemdisc,$category,"ROW",$qty,$itemunit,$childcode);
//   }
//   else
//   {
//     echo " Data Not For this recipt Id".$reciptid;
//   }
// }

// function makestocktransactionentry($con,$date,$itemcode,$transactiotype,$qty,$lotno,$jobcardno)
// {

//   $selectsql="SELECT * FROM `stocktransactionmaster` WHERE `date`='$date' AND `itemcode`='$itemcode' AND `type`='$transactiotype' AND `qty`='$qty' AND `lotno`='$lotno'";

//   $res=mysqli_query($con,$selectsql);

//   if(mysqli_num_rows($res)>0)
//   {
//     echo " Transactio Record Founded";
//   }else{
//     $insertsql="INSERT INTO `stocktransactionmaster`(`date`, `itemcode`, `type`, `qty`, `lotno`,`jobcardno`) 
//     VALUES ('$date','$itemcode','$transactiotype','$qty','$lotno','$jobcardno')";
// $result=mysqli_query($con,$insertsql);
//   }

    
// }


// function makestocklogentry($con,$itemcode,$oldstock,$newstock,$narration,$today)
// {
//   $insertsql="INSERT INTO `stocklog`(`itemcode`, `oldstock`, `updatedsstock`, `narration`,`recorddate`) VALUES ('$itemcode','$oldstock','$newstock','$narration','$today')";
//   mysqli_query($con,$insertsql);
// }



// function makestockentry($con,$itemname,$itemcode,$disc,$category,$type,$qty,$unit,$childcode)
// {
//   $checkrecordexistornotsql="SELECT * FROM `stocktable` WHERE `itemcode`='$itemcode' AND `itemcat`='$category' AND `type`='$type'";

//   $rescheck=mysqli_query($con,$checkrecordexistornotsql);

//   if(mysqli_num_rows($rescheck)>0)
//   {
//     //Update Stock
//     $updateqty="UPDATE `stocktable` SET `qty`=qty+$qty WHERE `itemcode`='$itemcode'";
//     mysqli_query($con,$updateqty);
    
//   }else
//   {
//     //Create new stock Entry 
//     $inserttostocksql="INSERT INTO `stocktable`(`itemcode`, `itemname`, `itemdisc`, `itemcat`, `type`, `qty`, `unit`,`childcode`) 
//                                 VALUES ('$itemcode','$itemname','$disc','$category','$type','$qty','$unit','$childcode')";
//       mysqli_query($con,$inserttostocksql);

//   }

// }


// function getrmcodefromitemcode($con,$itemcode)
// {
//    $selectquery = "SELECT * FROM `itemmaster` where `itemcode`='$itemcode'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $itemchildcode=$row['childcode'];

//    return $itemchildcode;
// }
// function getgrosswtfromitemcode($con,$itemcode)
// {
//    $selectquery = "SELECT * FROM `itemmaster` where `itemcode`='$itemcode'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $grossweight=$row['gweight'];

//    return $grossweight;
// }
// function getqtyfrompopenpobypolineid($con,$openpoid)
// {
//    $selectquery = "SELECT * FROM `openporawdata` where `id`='$openpoid'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $qty=$row['poqty'];

//    return $qty;
// }

// //jobcard functions
// function getpolineidbyjobcardno($con,$jobno)
// {
//    $selectquery = "SELECT * FROM `jobcardmaster` where `jbcno`='$jobno'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $poid=$row['poline'];

//    return $poid;
// }
// function getjobcardnumber($con,$jbcid)
// {
//    $selectquery = "SELECT * FROM `jobcardmaster` where `jobcardid`='$jbcid'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $jobcardno=$row['jbcno'];

//    return $jobcardno;
// }
// function getconsumedstockbyjbcno($con,$deljobcardno)
// {
//    $selectquery = "SELECT * FROM `stocktransactionmaster` where `jobcardno`='$deljobcardno' AND `type`='CONSUME'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $consumeqty=$row['qty'];

//    return $consumeqty;
// }
// function getchildcodebyjbcno($con,$deljobcardno)
// {
//    $selectquery = "SELECT * FROM `stocktransactionmaster` where `jobcardno`='$deljobcardno' AND `type`='CONSUME'";
//    // echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $itemcode=$row['itemcode'];

//    return $itemcode;
// }

// function deletejobcarddataandrestorestock($con,$deljobcardno)
// {

//   $consumedqty=getconsumedstockbyjbcno($con,$deljobcardno);
//   echo "Qty consumed for this jobcard is : ".$consumedqty;
//   $itemchildcode=getchildcodebyjbcno($con,$deljobcardno);
//   echo "\nChild Code for this jobcard : ".$itemchildcode;
//   if(releseconsumedstock($con,$consumedqty,$itemchildcode))
//   {
//     return true;
//   }else
//   {
//     return false;
//   }
// }


// function deletestocktransactionbyjobcardnumner($con,$deljobcardno){
  
//   $updateqty="DELETE FROM `stocktransactionmaster` WHERE `jobcardno`='$deljobcardno'";
//   mysqli_query($con,$updateqty);

// }
// function updatejobcardstatus($con,$deljobcardno,$deletereason,$deletedate){

//   $updateqty="UPDATE `jobcardmaster` SET `jbcstatus`='cancelled',`cancledate`='$deletedate',`canclereason`='$deletereason' WHERE `jbcno`='$deljobcardno'";
//   mysqli_query($con,$updateqty);

// }

// function releseconsumedstock($con,$qty,$childcode){

//   $updateqty="UPDATE `stocktable` SET `qty`=qty+$qty WHERE `childcode`='$childcode'";
 
//   if( mysqli_query($con,$updateqty))
//   {
//       return true;
//   }else
//   {
//       return false;
//   }

// }

// function getpodata($con,$poid)
// {


//   $selectpoline="SELECT * FROM `openporawdata` where `id`='$poid' ";

//   $result=mysqli_query($con,$selectpoline);

//   $userDataArray = array();

// // Fetch each row of data from the result and add it to the array
// while ($row = mysqli_fetch_assoc($result)) {
//     $userDataArray[] = $row;
// }

// return $userDataArray;
// }
// function getitemdata($con,$itemcode)
// {


//   $selectquery = "SELECT * FROM `itemmaster` where `itemcode`='$itemcode'";

//   $result=mysqli_query($con,$selectquery);

//   $itemDataArray = array();

// // Fetch each row of data from the result and add it to the array
// while ($row = mysqli_fetch_assoc($result)) {
//     $itemDataArray[] = $row;
// }

// return $itemDataArray;
// }


// //jobcard data
// function getjobcarddata($con,$jobcardno)
// {
//   $selectquery = "SELECT * FROM `jobcardmaster` where `jbcno`='$jobcardno'";
//   $result=mysqli_query($con,$selectquery);
//   $jobcardata = array();
//         while ($row = mysqli_fetch_assoc($result)) {
//             $jobcardata[] = $row;
//         }

//   return $jobcardata;
// }



// function checkrequiredstockforjobcard($con,$openpoid,$jobcdate,$itemcode,$newjobcardid)
// {
//   echo "Data for job card NO : ".$newjobcardid."\n";
//   echo "Open po id : ".$openpoid."\n";
// 	echo "Job Card Date : ".$jobcdate."\n";
// 	echo "Item Code : ".$itemcode."\n";


// 	$itemrmcode=getrmcodefromitemcode($con,$itemcode);

// 	echo "ROW material Code ".$itemrmcode."\n";

// 	$grossweight=getgrosswtfromitemcode($con,$itemcode);

// 	echo "Gross Weight : ".$grossweight."\n";

// 	$qty=getqtyfrompopenpobypolineid($con,$openpoid);

// 	echo "PO qty : ".$qty."\n";


// 	$totalconsumtion=$qty*$grossweight;

// 	echo "Total consumtion : ".$totalconsumtion."\n";


//   $lotno="0000";
//   consumthestock($con,$itemrmcode,$totalconsumtion,$jobcdate,$qty,$lotno,$itemcode,$newjobcardid);
// }

// // function deletejobcarddataandrestorestock($con,$jobcardnumber)
// // {

// // }


// function makenewjobcardentry($con,$jobcdate,$openpoid)
// {
//   $insertstocksql="INSERT INTO `jobcardmaster`(`jobcarddate`,`jbcstatus`,`poline`) VALUES ('$jobcdate','OPEN','$openpoid')";
 
//         if(mysqli_query($con,$insertstocksql))
//         {			
// 			$last_id = mysqli_insert_id($con);
// 			updatejobcardno($con,$last_id);
// 			updateopenpostatustoone($con,$openpoid);

//         	echo "Jobcard Number Created";


//         }
// return $last_id;
// }

// function consumthestock($con,$childcode,$totalconsumtion,$date,$qty,$lotno,$itemcode,$newjobcardid)
// {echo "------------ Transaction Entry -------------- \n";
//   echo "updating to consumthestock"."\n";

//   $updatestockentery="UPDATE `stocktable` SET `qty`=`qty`-$totalconsumtion WHERE `childcode`='$childcode'";

//   if(mysqli_query($con,$updatestockentery))
//   {
//     makenewconsumtiontransaction($con,$childcode,$date,$totalconsumtion,$lotno,$newjobcardid);

//     makingproductionentry($con,$itemcode,$date,$qty,$lotno,$newjobcardid);
    
//   }else
//   {
//     echo "*****************Error at consume stock function *************************";
//   }




 
// }

// function makenewconsumtiontransaction($con,$childcode,$date,$qty,$lotno,$jobcardno)
// {
  
//   echo "make consution Entry"."\n";

//   makestocktransactionentry($con,$date,$childcode,"CONSUME",$qty,$lotno,$jobcardno);

// }


// function makingproductionentry($con,$childcode,$date,$qty,$lotno,$jobcardno)
// {
//   echo "making production entry"."\n";
//   makestocktransactionentry($con,$date,$childcode,"PRODUCTION",$qty,$lotno,$jobcardno);
// }


?>


