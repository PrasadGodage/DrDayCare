<?php
include('header/header.php');

if(isset($_GET['itemcode'])=="")
{
    echo "<script>";
//echo "alert('Logout Successfull');";
echo 'window.location.href="managejobcard.php";';
echo "</script>";
}
$itemcode=$_GET['itemcode'];
//select Component
$query = "SELECT * FROM `processmaster`";
$result = mysqli_query($con, $query);
$process='<option value=""    >--- Select Process   ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
   if($row['processname']!="")
   {
    $process.='<option value="' . $row['processname'] . '">' . $row['processname'] . '</option>';
    // $grade.='<option value="' . $row['itemcode'] . '">' . $row['lotno'] . '</option>';
   }
}

?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Create New Test Report Entry</h3>

      <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4> Create Test Report Record</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                          class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                      
                    
                        <input type="text" id="txtitemcode" value="<?php echo $itemcode; ?>" readonly class="form-control">
                        
                      <hr>
                      Select Process
                      <Select class="form-control" id="slscompo">
                        <?php echo $process; ?>
                      </Select>
                      <div class="form-row mt-2">
                        
                    </div>
                    <input type="text" class="form-control mb-4" id="obsvalue" placeholder="Sequence">
                    <button class="btn btn-info form-control" onclick="addcompo()">Add Process To Item</button>
                    </div>
                    <!-- <div class="card-footer">
                      Card Footer
                    </div> -->
                  </div>
                </div>
           
               
              </div>
             
            </div>



<hr>
<h6>Process For Item : <?php echo $_GET['itemcode']; ?></h6>
      <table class="table table-striped table-hover"  style="width:100%;">
      <thead id='tblhead'> 
            <tr>
                <th>Process Name</th>
                <th>Sequence</th>
                <th>Action</th>
            </tr>
      </thead>
      <tbody>
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
          <td><?php echo $row['sequence']; ?></td>
        
          <td>
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
</div>



  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
      $('#showgradeid').hide(); 
    });

function getgradedata()
{
  loadobstable();
// alert('hii');
var slslotno = $('#slslotno').val();

// alert(slslotno);

$.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            slslotno: slslotno,
         
        },
        success: function(data) {
          console.log(data);
        //   viewdata();
          $('#showgradeid').val(data);
          var dataofid=$('#showgradeid').val();

          loadchemicalandmechmicallist(dataofid)
         
       },
     }
     );


}


function loadchemicalandmechmicallist(chemmechgradeid)
{
    $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            chemmechgradeid: chemmechgradeid,
        },
        success: function(data) {
          console.log(data);
        // location.reload();
          $('#slscompo').append(data);
       },
     }
     );
}


function getminmax()
{
    var selectedcomponent= $('#slscompo').val();
    // alert(selectedcomponent);
    $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            selectedcomponent: selectedcomponent,
         
        },
        success: function(data) {

         var arr=data.split("-");
        //   console.log("arr[0]"=arr[0]);
        //   console.log("arr[2]"=arr[1]);
        $('#txtmnvalue').val(arr[0]);
        $('#txtmxvalue').val(arr[1]);
        // location.reload();
        //   $('#tblhead').html(data);
       },
     }
     );
}



    function loadobstable()
    {
      // alert('loding');
        var lotnoformasters = $('#slslotno').val();
        // alert(lotnoformasters);
      $.ajax({
        url: "observation_backend.php",
        type: "POST",
        data: {
          lotnoformasters: lotnoformasters,
         
        },
        success: function(data) {
          console.log(data);
        // location.reload();
          $('#tblhead').html(data);
       },
     }
     );
    }



    function addcompo() {

        
      var processname = $('#slscompo').val();
      var sequence = $('#obsvalue').val();
      var itemcode = $('#txtitemcode').val();

    //  alert(slsgrade+"-"+showgradeid+"-"+slscompo+"--"+minval+"--"+maxval+"--"+obsvalue);
     
      $.ajax({
        url: "process_backend.php",
        type: "POST",
        data: {
            sequence:sequence,
            processname: processname,
            itemcode: itemcode,
         
        },
        success: function(data) {
          console.log(data);
          // viewdata();
        //   loadobstable()
        location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
    }





    function deletedata(deleteidprocess)
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
                    url: "process_backend.php",
                    type: "POST",
                    data: {deleteidprocess:deleteidprocess},
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