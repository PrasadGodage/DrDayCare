<?php
include('header/header.php');
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


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>cancelled Inquireis</h3>
      <!-- <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New jobcard</button>
      </div> -->
      <hr>



      <table class="table table-striped" id="table-2" style="width:100%;">
                          <thead>
                            <tr>
                              <th>id</th>
                              <th>Name</th>
                              <th>Mob</th>
                              <th>Age</th>
                              <th>Address</th>
                              <th>Recover</th>
                            </tr>
                          </thead>
                          <tbody>
                  <?php

                  $selectmenulist="SELECT * FROM `opdmaster` WHERE `opdstatus`='CLOSED'";

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
                               
                                  <button class='mt-1 btn btn-success' onclick="recoverdata(<?php echo $row['id']; ?>)">Recover</button>
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
  </section>
  </div>
  <!-- model started -->
  <div class="modal fade" id="canclejobcard" tabindex="-1" role="dialog"
          aria-labelledby="canclejobcardTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="canclejobcardTitle">Cancle Jobcard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="hiddnejobcardid">
                  <label for="">Reason for Jobcard cancletion </label>
                  <!-- <textarea name="" id="" cols="30" rows="10" class="form-control" name="1reasentxt" id="reasentxt"></textarea> -->
                  <input type="text" class="form-control" id="reasentxt">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" onclick="canclejobcardmodel()">Confirm Cancelation </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

<!-- model to add invoice No is started -->
<div class="modal fade" id="modelforinvoicenoadd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Invoice No</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" class="form-control" id="hiddendinvid">

                  <label for="">Enter Invoice date</label>
                  <input type="date" class="form-control" id="invdate">

                  <label for="">Enter Invoice No</label>
                  <input type="text" class="form-control" id="invo">

                  <label for="">Invoice Done Qty</label>
                  <input type="text" class="form-control" id="invqty" val="0">
                 <small>Leave this field blank if all qty is ready </small>
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="addinvno(<?php ?>)">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

<!-- model to add lot No is started -->
<div class="modal fade" id="modelforlotnoadd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add LOT No</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Enter LOT No</label>
                  <input type="hidden" class="form-control" id="hiddenlotid">
                  <input type="text" class="form-control" id="lotno">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="addlotno(<?php ?>)">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->



  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function recoverdata(recoverid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "You want to recover this inquiry",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "opd_backend.php",
                    type: "POST",
                    data: {recoverid:recoverid},
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