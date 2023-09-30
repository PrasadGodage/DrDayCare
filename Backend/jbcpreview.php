<?php 
session_start();
// error_reporting(0);
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

$polineid=getpolineidbyjobcardno($con,$jobcardnumber);

$podataarray=getpodata($con,$polineid);
$finpoarray=$podataarray[0];

// print_r($finpoarray);
$itemcode = $finpoarray['itemcode'];
$itemrawarray=getitemdata($con,$itemcode);

$itemfinearray=$itemrawarray[0];
echo "<br>";
echo "<br>";
// print_r($itemfinearray);
$chaildcode=$itemfinearray['childcode'];
$itemdisc=$itemfinearray['disc'];
$drgno=$itemfinearray['drgno'];

$RMSIZE=getrmsizedatabychildid($con,$chaildcode);

$customername = $finpoarray['buyername'];
$pono = $finpoarray['pono'];
$podate = $finpoarray['podate'];
$Poline = $finpoarray['poline'];
$poqty = $finpoarray['poqty'];


// echo $customername;












?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobcard Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        td{
            font-size: 10px;
        }
        th{
            font-size: 12px;
        }
        h2{
            font-size: 15px;
        }
    </style>
</head>
<body>
   <center>
   <div class="col-6">
    <table class="table table-bordered">
        <tr>
            <table class="table table-bordered">
                <tr>
                    <td rowspan="2">Card No <hr> <b><?php echo $jobcardnumber; ?></b></td>
                    <td rowspan="2"><center><h2>YUGA Engineering</h2></center></td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td><b><?php echo date("d-m-Y");?></b></td>
                </tr>
            </table>
        </tr>
        <tr>
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><b>Customer Name : </b> <?php echo $customername; ?></td>
                </tr>
                <tr>
                    <td> <b>PO./Date :</b> <?php echo $pono." / ".$podate ?></td>
                    <td><b>RM Size : </b> <?php echo $RMSIZE; ?></td>
                </tr>
                <tr>
                <td><b>PO Line NO : </b><?php echo $Poline ?></td>
                    <td><b>Grade : </b> EN8</td>
                </tr>
                <tr>
                    <td><b>IN No:</b> <?php echo $itemcode; ?></td>
                    <td><b>Item Discription :</b> <?php echo $itemdisc; ?> </td>
                </tr>
                <tr>
                    <td><b>Drg.No :</b><?php echo $drgno; ?></td>
                    <td><b>Qty : </b><?php echo $poqty; ?></td>
                </tr>
             
            </table>
        </tr>
        <tr>
            <p><b>Process Flow</b></p>
        </tr>
        <tr>
            <table class="table table-bordered">
                <tr>
                    <th>Process Name</th>
                    <th>Insp.By / Sign</th>
                </tr>
                <?php

                            $selectmenulist="SELECT * FROM `itemprocessdtls` WHERE `itemcode`='$itemcode' ORDER BY `itemprocessdtls`.`sequence` ASC;";

                            $res=mysqli_query($con,$selectmenulist);

                            if(mysqli_num_rows($res)>0)
                            {
                            $num=1;
                                    while($row=mysqli_fetch_array($res))
                                {?>
                                    <tr>
                                    
                                    <td><?php echo $row['processname']; ?></td>
                                    <td></td>
                                    
                                    </tr>
                                <?php 
                            }
                            }else{
                            echo "<tr>
                                    <td colspan='3' align='center'>No Component Found</td>
                            </tr>";
                            }



                            ?>

                <tr>
                    <td><b>Total OK Qty :</b></td>
                    <td><b>Total Rejected Qty</b></td>
                </tr>
                <tr>
                <td colspan="2"><b>Sign<br>Remark</b></td>
                </tr>
            </table>
        </tr>
            
    </table>

</div>
   </center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>