<?php
include('header/header.php');
$loginuserid=$_SESSION['id'];
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Charges Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Charges Name</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `chargesmaster` where `createdby`='$loginuserid'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['chargestype']; ?></td>
          <td><?php echo $row['amt']; ?></td>
          <td>
            <button class="mt-1 btn btn-warning" onclick="getgradedata(<?php echo $row['id']; ?>)">Edit</button>
            <button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['id']; ?>)">X</button>
          </td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='3' align='center'>No Unit Found</td>
  </tr>";
}



?>

        
        </tbody>
      </table>
    </div>
  </section>
  </div>
  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Charges</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Select charges type</label>
                  <select class="form-control"  id="slschrgstype">
                    <option value="">--- Select Charges ---</option>
                    <option value="OPD">OPD</option>
                  </select>
                  <label for="">Amount</label>
                  <input type="text" class="form-control" id="txtcharges">
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="savechages()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->
  <!-- model started -->
  <div class="modal fade" id="updategrademodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Charges</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="">
                  <input type="hidden" id="uphiddenid">
                  <select class="form-control"  id="upslschrgstype">
                    <option value="">--- Select Charges ---</option>
                    <option value="OPD">OPD</option>
                  </select>
                  <label for="">Amount</label>
                  <input type="text" class="form-control" id="uptxtcharges">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" onclick="updategrade()">Update</button>
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


    function updategrade() {

var chargesid = $('#uphiddenid').val();
var uptype = $('#upslschrgstype').val();
      var upamt = $('#uptxtcharges').val();
     

    $.ajax({
      url: "charges_backend.php",
      type: "POST",
      data: {
        chargesid: chargesid,
        uptype: uptype,
        upamt: upamt,
      
      },
      success: function(data) {
        console.log(data);
        $('#updategrademodel').modal('hide');
      location.reload();
      //  $('#tblcontent').html(data);
    },
    }
    );
    }

    function savechages() {

      var type = $('#slschrgstype').val();
      var amt = $('#txtcharges').val();
     
      $.ajax({
        url: "charges_backend.php",
        type: "POST",
        data: {
            type: type,
            amt: amt,
         
        },
        success: function(data) {
          console.log(data);
          $('#basicModal').modal('hide');
         location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
    }


    function getgradedata(gradeid) {

$.post("charges_backend.php", {
  gradeid: gradeid
}, function(data, status) {
    console.log(data);
    // alert("Successfully");
    var charges = JSON.parse(data);
    //   $('#up_categoryname').val(user.name);
      
    $('#uphiddenid').val(charges.id);
  $('#upslschrgstype').val(charges.chargestype);
  $('#uptxtcharges').val(charges.amt);
  });
  $('#updategrademodel').modal('show');


}






    function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Charges!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "charges_backend.php",
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