<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Jobcard Details</h3>
      <!-- <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New jobcard</button>
      </div> -->
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>id</th>
            <th>jobcard No</th>
            <th>Jobcard Status</th>
            <th>Created On</th>
            <th>cancelled On</th>
            <th>Reason</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `jobcardmaster` where `jbcstatus`='cancelled' ";
// echo $selectmenulist;
$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
         
          <td><?php echo $row['jobcardid']; ?></td>
          <td><?php echo $row['jbcno']; ?></td>
          <td><?php echo $row['jbcstatus']; ?></td>
          <td><?php echo $row['jobcarddate']; ?></td>
          <td><?php echo $row['cancledate']; ?></td>
          <td><?php echo $row['canclereason']; ?></td>
          
       
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='3' align='center'>No cancelled Jobcard Found</td>
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

    // function savecate() {

    //   var gradename = $('#gradename').val();
     
    //   $.ajax({
    //     url: "grade_backend.php",
    //     type: "POST",
    //     data: {
    //         gradename: gradename,
         
    //     },
    //     success: function(data) {
    //       console.log(data);
    //       $('#basicModal').modal('hide');
    //      location.reload();
    //     //  $('#tblcontent').html(data);
    //    },
    //  }
    //  );
    // }

    function openpreview(jobcardno)
    {
     
      // alert(jobcardno);
      window.location.href="jbcpreview.php?jbcid="+jobcardno;
    
    }



    function openinvmodel(jocno)
    {
            // alert(jocno);
            $('#hiddendinvid').val(jocno);
            $('#modelforinvoicenoadd').modal('show');
    }

    function opencanclemodel(jocno)
    {
            // alert(jocno);
            $('#hiddnejobcardid').val(jocno);
            $('#canclejobcard').modal('show');
    }

    function openlotmodel(jocno)
    {
            // alert(jocno);
            $('#hiddenlotid').val(jocno);
            $('#modelforlotnoadd').modal('show');
    }

    function addinvno() {
    var jobcardnumber=$('#hiddendinvid').val();
    var invdate=$('#invdate').val();
    var invo = $('#invo').val();
    var invqty = $('#invqty').val();
    //   alert(jobcardnumber+" "+invo);
      if(invo=="")
      {
        alert("Please Enter Invoice No");
      }
      else{
            
                $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                        jobcardnumber: jobcardnumber,
                        invdate: invdate,
                        invo: invo,
                        invqty: invqty,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    $('#modelforinvoicenoadd').modal('hide');
                    location.reload();
                    //  $('#tblcontent').html(data);
                },
                }
                );
          }
    }


    function addlotno() {
    var jobcardnumberforlot=$('#hiddenlotid').val();
    var lotno = $('#lotno').val();
    //   alert(jobcardnumber+" "+invo);
      if(invo=="")
      {
        alert("Please Enter Invoice No");
      }
      else{
            
                $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                        jobcardnumberforlot: jobcardnumberforlot,
                        lotno: lotno,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    $('#modelforlotnoadd').modal('hide');
                    location.reload();
                },
                }
                );
          }
    }



    function canclejobcardmodel()
    {
   
      // var reasontxt=$.trim($("#reasentxt").val());
      var delreasontxt=$('#reasentxt').val();
      var deljobcardno=$('#hiddnejobcardid').val();

      // alert(reasontxt+"--"+jobcardno);

      if(delreasontxt=="")
      {
        alert("Enter the reason for Jobcard");
      }else
      {
        // alert(reasontxt+"--"+jobcardno);
        $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                      deljobcardno: deljobcardno,
                      delreasontxt: delreasontxt,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    // $('#modelforlotnoadd').modal('hide');
                    // location.reload();
                },
                }
                );

      }
       
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
                    url: "grade_backend.php",
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