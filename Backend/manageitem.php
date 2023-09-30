<?php
include('header/header.php');


$query = "SELECT * FROM unitmaster";
$result = mysqli_query($con, $query);
$unitlist='<option value="">--- Select Unit ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $unitlist.='<option value="' . $row['id'] . '">' .$row['unit'].'</option>';
}
$query1 = "SELECT * FROM gradediameteruniquecode";
$result1 = mysqli_query($con, $query1);
$uniquecode='<option value="">--- Select Code ---</option>';
while ($row1 = mysqli_fetch_assoc($result1)) {
    $uniquecode.='<option value="' . $row1['uniquecode'] . '">' .$row1['uniquecode']." / ".getgradenamebyID($con,$row1['grade']).'-'.$row1['diameter']. '</option>';
}

$itemcode="";
if(isset($_GET['itemcode']))
{
  $itemcode=$_GET['itemcode'];
}

?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Item Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Item</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Item code</th>
            
            <th>BO/IH</th>
            <th>Basic Material</th>
            <th>Drg.No</th>
            <th>Length</th>
            <th>Dia</th>
            <th>Gross Wt.</th>
            <th>Net Wt.</th>
            <th>Child Code</th>
            <th>Process</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `itemmaster`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['itemcode']; ?></td>
          <td><?php echo $row['boih']; ?></td>
          <td><?php echo $row['basic_material']; ?></td>
          <td><?php echo $row['drgno']; ?></td>
          <td><?php echo $row['length']; ?></td>
          <td><?php echo $row['dia']; ?></td>
          <td><?php echo $row['gweight']; ?></td>
          <td><?php echo $row['nweight']; ?></td>
          <td><?php echo $row['childcode']; ?></td>
          <td>
          <button class="btn btn-primary" onclick="openprocesswindow('<?php echo $row['itemcode'];?>')">Manage Process</button>
          </td>
          <td>
            <button class="btn btn-warning" onclick="getdata(<?php echo $row['id'];?>)">Edit</button>
            <button class="btn btn-danger" onclick="deletedata(<?php echo $row['id'];?>)">X</button>
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

  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Item Code</label>
                  <input type="text" class="form-control" id="txtitemcode" value="<?php echo $itemcode; ?>">
                  <label for="">Disc</label>
                  <textarea name="" id="txtitemdisc" cols="30" rows="10" class="form-control"></textarea>
                  <!-- <label for="">Item Category</label>
                  <input type="text" class="form-control" id="itemcategory"> -->
                  <label for="">Select BO/IH</label>
                  <select name="" id="compotype" class="form-control">
                  <option value="0">BO</option>
                  <option value="1">IH</option>
                 </select>
                  <label for="">Basic Material</label>
                  <input type="text" class="form-control" id="itemBM">

                  <label for="">Drg.No</label>
                  <input type="text" class="form-control" id="itemdrg">
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                        <label for="">Length</label>
                  <input type="text" class="form-control" id="itemlength">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Dia</label>
                  <input type="text" class="form-control" id="itemdia">
                        </div>
                    </div>
                 
                 

                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Gross Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="gweight">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Net Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="nweight">
                        </div>
                    </div>
                    <label for="">Unit</label>
                 <select name="" id="unit" class="form-control">
                 <?php echo $unitlist;  ?>
                 </select>

                  <label for="">Child Code</label>
                 <select name="" id="childcode" class="form-control">
                 <?php echo $uniquecode;  ?>
                 </select>
                 <small>UniqueNo / Grade - Diameter</small>
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="saveitem()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
         
        </div>
        </div>
        </div>
  <!-- model ends -->


  <!-- model update started -->
  <div class="modal fade" id="updatemodel" tabindex="-1" role="dialog"
          aria-labelledby="updatemodelTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updatemodelTitle">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="upitemid" >
                  <label for="">Item Code</label>
                  <input type="text" class="form-control" id="uptxtitemcode">
                  <label for="">Disc</label>
                  <textarea name="" id="uptxtitemdisc" cols="30" rows="10" class="form-control"></textarea>
                  <!-- <label for="">Item Category</label>up
                  <input type="text" class="form-control" id="itemcategory"> -->
                  <label for="">Select BO/IH</label>
                  <select name="" id="upcompotype" class="form-control">
                  <option value="0">BO</option>
                  <option value="1">IH</option>
                 </select>
                  <label for="">Basic Material</label>
                  <input type="text" class="form-control" id="upitemBM">

                  <label for="">Drg.No</label>
                  <input type="text" class="form-control" id="upitemdrg">
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                        <label for="">Length</label>
                  <input type="text" class="form-control" id="upitemlength">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Dia</label>
                  <input type="text" class="form-control" id="upitemdia">
                        </div>
                    </div>
                 
                 

                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Gross Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="upgweight">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Net Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="upnweight">
                        </div>
                    </div>
                    <label for="">Unit</label>
                 <select name="" id="upunit" class="form-control">
                 <?php echo $unitlist;  ?>
                 </select>

                  <label for="">Child Code</label>
                 <select name="" id="upchildcode" class="form-control">
                 <?php echo $uniquecode;  ?>
                 </select>
                 <small>UniqueNo / Grade - Diameter</small>
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="updatecate()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
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
      var chk = $('#txtitemcode').val();
      if(chk!=""){
        $('#exampleModalCenter').modal('show');
      }
    
      
    });

    function saveitem() {

      var itemcode = $('#txtitemcode').val();
      var disc = $('#txtitemdisc').val();
      var compotype = $('#compotype').val();
      var basicmaterial = $('#itemBM').val();
      var drawingno = $('#itemdrg').val();
      var itemlength = $('#itemlength').val();
      var itemdia = $('#itemdia').val();
      var gweight = $('#gweight').val();
      var nweight = $('#nweight').val();
      var childcode = $('#childcode').val();
      var unit = $('#unit').val();
     
      $.ajax({
        url: "item_backend.php",
        type: "POST",
        data: {
          itemcode: itemcode,
          disc: disc,
          compotype: compotype,
          basicmaterial: basicmaterial,
          drawingno: drawingno,
          itemlength: itemlength,
          itemdia: itemdia,
          gweight: gweight,
          nweight: nweight,
          childcode: childcode,
          unit: unit,
         
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


function openprocesswindow(itemcode)
{
  window.location.href="manageprocessforitem.php?itemcode="+itemcode;
}


    function getdata(updateid) {

      $.post("item_backend.php", {
        updateid: updateid
      }, function(data, status) {
        console.log(data);
        // alert("Successfully");
        var item = JSON.parse(data);
        //   $('#up_categoryname').val(user.name);
           
        $('#upitemid').val(item.id);
      $('#uptxtitemcode').val(item.itemcode);
      $('#uptxtitemdisc').val(item.disc);
      $('#upcompotype').val(item.boih);
      $('#upitemBM').val(item.basic_material);
      $('#upitemdrg').val(item.drgno);
      $('#upitemlength').val(item.length);
      $('#upitemdia').val(item.dia);
      $('#upgweight').val(item.gweight);
      $('#upnweight').val(item.nweight);
      $('#upchildcode').val(item.childcode);
      $('#upunit').val(item.unitcode);
     
        // $('#hidden_id').val(component.ChemMechId);
        // $('#upcomponame').val(component.Name);
        // $('#upcompotype').val(component.Type);
       

      });
      $('#updatemodel').modal('show');


    }




    function updatecate() {

      var uphidden_id = $('#upitemid').val();
      var upitemcode = $('#uptxtitemcode').val();
      var updisc = $('#uptxtitemdisc').val();
      var upcompotype = $('#upcompotype').val();
      var upbasicmaterial = $('#upitemBM').val();
      var updrawingno = $('#upitemdrg').val();
      var upitemlength = $('#upitemlength').val();
      var upitemdia = $('#upitemdia').val();
      var upgweight = $('#upgweight').val();
      var upnweight = $('#upnweight').val();
      var upchildcode = $('#upchildcode').val();
      var upunit = $('#upunit').val();
     

     $.ajax({
        url: "item_backend.php",
        type: "POST",
        data: {
          uphidden_id: uphidden_id,
          upitemcode: upitemcode,
          updisc: updisc,
          upcompotype: upcompotype,
          upbasicmaterial: upbasicmaterial,
          updrawingno: updrawingno,
          upitemlength: upitemlength,
          upitemdia: upitemdia,
          upgweight: upgweight,
          upnweight: upnweight,
          upchildcode: upchildcode,
          upunit: upunit,
        },
        success: function(data) {
          console.log(data);
          // $('#basicModal').modal('hide');
          location.reload();
          // $('#tblcontent').html(data);
        },
      });
    }


    function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Component!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "item_backend.php",
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