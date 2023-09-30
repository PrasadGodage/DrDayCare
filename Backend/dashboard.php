<?php
include('header/header.php');
error_reporting(1);
// include('functions.php');
include('config.php');
// include('functions.php');
$loginuserid=$_SESSION['id'];


date_default_timezone_set("Asia/Calcutta");
$today=date('Y-m-d');

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
 <div class="modal fade" id="Addnewinqmodel" tabindex="-1" role="dialog"
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
                  <input type="number" class="form-control" value="<?php getopdcharges($con,$loginuserid) ?>" id="pfees">
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
        <h3>Taday's data</h3> 
        <div class="row ">
       
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
             
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 mb-2">Total OPD :<br></h5> <span class="font-19"><b>25</b></span>
                          <h2 class="mb-3 font-18">
                              <p class="text-dark font-11"><span class="text-success">Checked : 10</span> / <span class="text-danger">Un-checked : 15</span></p>
                             
                          </h2>
                         </div>
                      </div>                   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12">Total Collection :<br></h5> <span class="font-19"><b>₹ 3800</b></span>
                          <h2 class="mb-3 font-18">
                          <p class="text-success font-11"><span class="text-success">Cash : ₹1300</span> / <span class="text-success">Bank : ₹1500</span></p>

                             
                          </h2>
                          </div>
                      </div>
                   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                        <h5 class="font-12">Total Expencse :  <br></h5> <span class="font-19"><b>₹ 3800</b></span>
                          <h2 class="mb-3 font-18">
                              <p class="text-warning font-11"><span class="text-warning">Cash : ₹1300</span> / <span class="text-warning">Bank : ₹1500</span></p>
                             
                          </h2>
                          
                         </div>
                      </div>
                      <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img"> -->
                          <!-- <img src="assets/img/banner/3.png" alt=""> -->
                        <!-- </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Completed Orders</h5>
                          <h2 class="mb-3 font-18">
                          
                          <?php
                            $usersql="SELECT * FROM `challanrecord`";
                            // echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>

                          </h2>
                         </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <!-- <img src="assets/img/banner/4.png" alt=""> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        



<hr>

         <h4>Todays Visits</h4> 
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
              </div>
            </div> 
          </div> 
        </section>


        <?php
 include('footers/footer.php');
?>
<script>

$(document).ready(function() {
    $(document).keydown(function(e) {
        // Check if the pressed key is F6 (key code 117)
        if (e.keyCode == 117) {
            // Show an alert when F6 is pressed
            // alert('F6 key was pressed!');
            $('#Addnewinqmodel').modal('show');

        }
    });
});

  $('#txtdate').change(function() {
    var date = $(this).val();

    getdataforrecipt(date);

    // console.log(date, 'change')
});


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
    $('#Addnewinqmodel').modal('hide');
    // $('#basicModal').modal('hide');
  //  location.reload();
  //  $('#tblcontent').html(data);
 },
}
);
}
function updateinqfees() {
// alert('Hii i m calling');
var txtid = $('#txtid').val();
var pfees = $('#pfees').val();
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
  location.reload();
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