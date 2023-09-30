<?php
include('header/header.php');
// include('functions.php');
// $today=date("Y-m-d");

// $query = "SELECT * FROM unitmaster";
// $result = mysqli_query($con, $query);
// $unitlist='<option value="">--- Select Unit ---</option>';
// while ($row = mysqli_fetch_assoc($result)) {
//     $unitlist.='<option value="' . $row['id'] . '">' .$row['unit'].'</option>';
// }

function calculateAge($dateOfBirth) {
  // Convert the date of birth to a DateTime object
  $dob = new DateTime($dateOfBirth);

  // Get the current date
  $currentDate = new DateTime();

  // Calculate the difference between the current date and date of birth
  $age = $currentDate->diff($dob);

  // Return the age in years
  return $age->y;
}
?>

  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Component</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Patient Name</label>
                  <input type="text" class="form-control" id="pname">
                  <label for="">Mob</label>
                  <input type="number" class="form-control" id="pmob">
                  <label for="">DOB</label>
                  <input type="date" class="form-control" id="pdob">
                  <label for="">Address</label>
                  <input type="text" class="form-control" id="padd">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="saveinq()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->
   <!-- model started -->
   <div class="modal fade" id="feesmodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Accept Fees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="txtid">
                  <label for="">Fees</label>
                  <input type="number" class="form-control" id="pfees">
                  <!-- <label for="">Revisit Date</label>
                  <input type="date" class="form-control" id="rvdate"> -->
                  <select class="form-control mt-3"  id="slspaytype">
                    <option value="">--- Payment Type ---</option>
                    <option value="cash">Cash</option>
                    <option value="bank">Bank</option>
                  </select>
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="updateinqfees()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
    <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> New Inquiry</button>
      </div>
      <h3>Manage OPD</h3>
      <hr>


      <table class="table table-striped" id="table-2" style="width:100%;">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Mob</th>
            <th>Age</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `opdmaster` WHERE `opdstatus`='OPEN' OR `opdstatus`='DONE'";
// $selectmenulist="SELECT * FROM `openporawdata` where `recorddate`='$today'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
         <td><?php echo $num; ?></td>
        <td><?php echo $row['pname']; ?></td>
          <td><?php echo $row['pmob']; ?></td>
          <td><?php echo calculateAge($row['pdob'])." Yrs"; ?></td>
          <td><?php echo $row['paddress']; ?></td>
            <td>
              <?php
              if($row['opdstatus']=='OPEN')
              {?>
                 <button class='mt-1 btn btn-success' onclick="openpreview(<?php echo $row['id']; ?>)">Accept</button>
               <button class='mt-1 btn btn-danger' onclick="deletedata(<?php echo $row['id']; ?>)">X</button>
             <?php }

              if($row['opdstatus']=='DONE')
              {
                  echo $row['opdfair'];

              }
              
              ?>
           
            <!-- <button class='mt-1 btn btn-danger'  onclick=opencanclemodel("<?php// echo $row['jbcno']; ?>");>Cancle Jobcard</button> -->
            </td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='9' class='text-center'>No Data for Today</td>
  </tr>";
}

?>

        
        </tbody>
      </table>
      </div> 
    </div>
  </section>


  <!-- -----------------------------------------------------------------------------------------------------df -->
  




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
  $(document).ready( function () {


} );

function saveinq() {
// alert('Hii i m calling');
var pname = $('#pname').val();
var pmob = $('#pmob').val();
var pdate = $('#pdob').val();
var padd = $('#padd').val();
// alert(pname+" "+pmob+" "+pdate+" "+padd);
$.ajax({
  url: "opd_backend.php",
  type: "POST",
  data: {
    pname: pname,
    pmob: pmob,
    pdate: pdate,
    padd: padd,   
  },
  success: function(data) {
    console.log(data);
    // $('#basicModal').modal('hide');
   location.reload();
  //  $('#tblcontent').html(data);
 },
}
);
}
function updateinqfees() {
alert('Hii i m calling');
var txtid = $('#txtid').val();
var slspaytype = $('#slspaytype').val();
// var rvdate = $('#rvdate').val();
// alert(pname+" "+pmob+" "+pdate+" "+padd);
$.ajax({
  url: "opd_backend.php",
  type: "POST",
  data: {
    txtid: txtid,
    pfees: pfees,
    slspaytype: slspaytype,
    // rvdate: rvdate,
  },
  success: function(data) {
  $('#feesmodel').modal('hide');
  // location.reload();
    console.log(data);
 },
}
);
}

function openpreview(inqid)
{
  // window.location.href="previewtc.php?jbcid="+jobcardno;
  
  $('#txtid').val(inqid);
  $('#feesmodel').modal('show');
}



function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Inquiry!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "opd_backend.php",
                    type: "POST",
                    data: {deleteid:deleteid},
                    success:function(data) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                        location.reload(true);
                       //alert("sucess");
                //   readrecord();
                    },
                });


    } else {

    }
  });

    }


  </script>