<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Unit Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Unit</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Unit Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `unitmaster`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['unit']; ?></td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Unit Name</label>
                  <input type="text" class="form-control" id="gradename">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="savecate()">Save</button>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="">
                  <input type="hidden" id="uphiddenid">
                  <label for="">Unit Name</label>
                  <input type="text" class="form-control" id="upgradename">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="updategrade()">Save</button>
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

var grdid = $('#uphiddenid').val();
var upgradename = $('#upgradename').val();

    $.ajax({
      url: "unit_backend.php",
      type: "POST",
      data: {
        grdid: grdid,
        upgradename: upgradename,
      
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

    function savecate() {

      var gradename = $('#gradename').val();
     
      $.ajax({
        url: "unit_backend.php",
        type: "POST",
        data: {
            gradename: gradename,
         
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

$.post("unit_backend.php", {
  gradeid: gradeid
}, function(data, status) {
    console.log(data);
    // alert("Successfully");
    var grade = JSON.parse(data);
    //   $('#up_categoryname').val(user.name);
      
    $('#uphiddenid').val(grade.id);
  $('#upgradename').val(grade.unit);
  });
  $('#updategrademodel').modal('show');


}






    function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Grade!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "unit_backend.php",
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