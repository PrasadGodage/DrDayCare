<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Row Material Stock</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Grade</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <!-- <th>#</th> -->
            <th>Itemcode</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>Qty</th>
            <th>Update Stock</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `stocktable`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <!-- <td><?php //echo $num; ?></td> -->
          
          <td><?php echo $row['itemcode']; ?></td>
          <td><?php echo $row['itemname']; ?></td>
          <td><?php echo $row['itemcat']; ?></td>
          <td><?php echo $row['qty'].$row['unit']; ?></td>
          <td><button class="btn btn-primary" onclick=openmanagemodel(<?php echo $row['itemcode'];?>,<?php echo $row['qty']; ?>)>Manage stock</button></td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='3' align='center'>No Component Found</td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Component</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" class="form-control" id="hiddenitemcode">
                  <label for="">Current Stock</label>
                  <input type="text" class="form-control" id="currentstock">
                  <label for="">Update New Stock</label>
                  <input type="text" class="form-control" id="newstock">
                  <label for="">Discription</label>
                  <input type="text" class="form-control" id="narration">
                 
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





  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function savecate() {
      var uprmcode = $('#hiddenitemcode').val();
      var currentstock=$('#currentstock').val();
      var newstock=$('#newstock').val();
      var narration=$('#narration').val();

      $.ajax({
        url: "recipt_backend.php",
        type: "POST",
        data: {
          uprmcode: uprmcode,
          currentstock: currentstock,
          newstock: newstock,
          narration:narration,
        },
        success: function(data) {
          console.log(data);
          // $('#rmdisc').val(data);
            //   $('#basicModal').modal('hide');
         location.reload();
       },
     }
     );


      // alert(rmcode+"/"+currentstock+"/"+newstock);
    }


    function openmanagemodel(rmcode,currentstock)
  {
    // alert(currentstock);
    $('#hiddenitemcode').val(rmcode);
    $('#currentstock').val(currentstock);
    $('#exampleModalCenter').modal('show');
  }



  </script>