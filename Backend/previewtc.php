<?php
session_start();
include('config.php');
include('functions.php');

if(isset($_GET['jbcid'])=="")
{
    echo "<script>";
//echo "alert('Logout Successfull');";
echo 'window.location.href="managejobcard.php";';
echo "</script>";
}

$jobcardnumber=$_GET['jbcid'];


//----------------------------PO line data from jobcard ---------------------
$polineid=getpolineidbyjobcardno($con,$jobcardnumber);

$podataarray=getpodata($con,$polineid);
$finpoarray=$podataarray[0];

// print_r($finpoarray);

$itemcode = $finpoarray['itemcode'];
$customername = $finpoarray['buyername'];
$pono = $finpoarray['pono'];
$podate = $finpoarray['podate'];
$Poline = $finpoarray['poline'];
$poqty = $finpoarray['poqty'];
$drawingno = $finpoarray['drawingno'];
$pobasicmaterial = $finpoarray['basicmaterial'];
//=============================*************===================================

//-------------------------item data ---------------
$itemrawarray=getitemdata($con,$itemcode);

$itemfinearray=$itemrawarray[0];
// echo "<br>";
// echo "<br>";
// print_r($itemfinearray);

$chaildcode=$itemfinearray['childcode'];
$itemdisc=$itemfinearray['disc'];
$drgno=$itemfinearray['drgno'];

$RMSIZE=getrmsizedatabychildid($con,$chaildcode);
//=============================*************===================================


//---------------------------JOBCARD DETAILS---------------------
$rawjobcardarray=getjobcarddata($con,$jobcardnumber);
$finjobcardarray=$rawjobcardarray[0];
// echo "<br>";
// echo "<br>";
// print_r($finjobcardarray);

$jbcinvno=$finjobcardarray['jbcinvno'];
$jbcinvdate=$finjobcardarray['invdate'];
$lotno="YR9723";
// $lotno=$finjobcardarray['lotno'];


//=============================*************===================================
// echo $customername;




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TC Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        table{
            font-size: 10px;
        }
    </style>
  </head>
  <body>
   
  <!-- <div class="row">
    <div class="col-3"><h1>LOGO</h1></div>
    <div class="col"><h4>YUGA ENGINEERING</h4> <br> 
    <p style="font-size:10px">
    S.No 77/5, Behind Vishnumalti, Ind. Estate, Shivane Pune: 411 023.<br>Mob. no. 09850997344 Email id: yugaengineering@gmail.com
    </p></div>
    <div class="col-3"> IMage Will Be Here</div>
  </div> -->


<table class="table table-bordered"> 
    <tr>
        <td rowspan="2" width="100px" style="padding-top:25px">
            <img src="images/logo.jpg" height="100px" width="100px" alt="">
        </td>
        <td  style="text-align:center"><h4>YUGA ENGINEERING</h4> <br> 
    <p style="font-size:12px; margin-top: -13px;">
        S.No 77/5, Behind Vishnumalti, Ind. Estate, Shivane Pune: 411 023.<br>Mob. no. 09850997344 Email id: yugaengineering@gmail.com
    </p></td>
        <td rowspan="2" width="100px"  style="padding-top:35px">
            <img src="images/Lsdata.jpg"  height="80px" width="150px" alt="">
        </td>
    </tr>

        <tr>
            <td style="text-align:center"> <span style="font-size: 13px; font-weight:bold">TEST CERTIFICATE</span>(AS PER EN 10204 : 3.1)</td>
        </tr>

    <tr>
        <td colspan="3">
            <table class="table table-bordered"> 
           
                <tr>
                    <td><b>CUSTOMER</b></td>
                    <td><?php echo $customername; ?></td>
                    <td>INVOICE NO : <?php echo $jbcinvno; ?></td>
                    <td>DATE :- <?php echo $jbcinvdate; ?></td>
                </tr>
                <tr>
                    <td><b>ITEM DESCRIPTION</b></td>
                    <td><?php echo $itemdisc; ?> </td>
                    <td colspan="2"> TC NO. :- YE-2022/D205</td>
                </tr>
                <tr>
                    <td><b>P.O. NO. / DATE</b></td>
                    <td colspan="3"><?php echo $pono." / ".date("d-m-Y"); ?></td>
                </tr>
               
            </table>
        </td>
    </tr>


    <tr>      
       <td colspan="4">
       <H6><B>( A ) ORDER STATUS</B></H6>
       <table class="table table-bordered"> 
            <tr>
                <th>PO.SR <br> SR.NO</th>
                <th>Discription</th>
                <th>ITEM CODE</th>
                <th>ITEM NO</th>
                <th>DRG NO.</th>
                <th>TC NO.</th>
                <th>QTY</th>
            </tr>
            <tr>
                <td>1</td>
                <td><?php echo $itemdisc; ?></td>
                <td><?php echo $itemcode; ?></td>
                <td><?php echo $Poline; ?></td>
                <td><?php echo $drgno; ?></td>
                <td><?php echo $lotno; ?></td>
                <td><?php echo $lotno; ?></td>
            </tr>
        </table>
       </td>
    </tr>
    <tr>
        <td colspan="4">
            <h6 style="font-size : 13px"><b>( B ) CHEMICAL COMPOSITION & MECHANICAL PROPERTIES FOR  STUD BOLTS AS PER IS 1367 CL 6.8</b></h6>
        </td>
    </tr>
    <tr>
        <td colspan="4">
         <table class="table table-bordered"> 
         <?php 
            echo getobservactiontable($con,$lotno);
            ?>
         </table>
        </td>
    </tr>

    <tr>
        <td colspan="4"> C)<?php echo $itemdisc; ?> is mfg. as per Specification  : Satisfactory </td> </tr>
        <tr>
        <td colspan="4"> D) Surface Finish:  Satisfactory</td></tr>
        <tr>
        <td colspan="4"> E) Dimensional & Visual inspection - Satisfactory. </td></tr>
        <tr>
        <td colspan="4"> F) Manufacturer's Brand : " YUGA " & Marking " Y' <?php echo $pobasicmaterial ?>
     </td></tr>
        <tr>
        <td colspan="4">We certify that the above results confirm to the required specification.<?php echo $itemdisc; ?> are as per IS <?php echo $drawingno; ?> </td>
    </tr>



    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="4">
                        For Yuga Engineering
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>