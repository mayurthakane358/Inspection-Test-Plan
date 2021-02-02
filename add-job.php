<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
$toda = date("d/m/Y");

if (isset($_POST['Next'])) 
{
$file_name=$_POST['file_name'];
$customer_id=$_POST['customer_id'];
$part_no=$_POST['part_no'];
$cust_draw_no=$_POST['cust_draw_no'];
$po_no=$_POST['po_no'];
$itp_no=$_POST['itp_no'];
$itp_revision_level=$_POST['itp_revision_level'];
$rgpl_draw_no=$_POST['rgpl_draw_no'];
$drawing_revision=$_POST['drawing_revision'];
$rtp_revision_date=$_POST['rtp_revision_date'];

$num = rand(101,9999);
$file_name = $file_name."-".$num;
}



if(isset($_POST['submit']))
{
  
$customer_id=$_POST['customer_id'];
$part_no=$_POST['part_no'];
$cust_draw_no=$_POST['cust_draw_no'];
$po_no=$_POST['po_no'];
$itp_no=$_POST['itp_no'];
$itp_revision_level=$_POST['itp_revision_level'];
$rgpl_draw_no=$_POST['rgpl_draw_no'];
$drawing_revision=$_POST['drawing_revision'];
$rtp_revision_date=$_POST['rtp_revision_date'];
$file_name=$_POST['file_name'];



$draw_location=$_POST['draw_location'];
$ballon_no=$_POST['ballon_no'];
$characteristics=$_POST['characteristics'];
$specified_dimention=$_POST['specified_dimention'];
$upper_tolerance=$_POST['upper_tolerance'];
$lower_tolerance=$_POST['lower_tolerance'];
$measuring_instrument=$_POST['measuring_instrument'];




$value2='';
    //Query to fetch last inserted invoice number
    $query = "SELECT invoice_no from job_nos order by invoice_no DESC LIMIT 1";
    $stmt = $conn->query($query);
    if(mysqli_num_rows($stmt) > 0) {
        if ($row = mysqli_fetch_assoc($stmt)) {
            $value2 = $row['invoice_no'];
            $value3 = substr($value2, 0,3);//separating numeric part
            $value4 = $value3 + 1;//Incrementing numeric part
            $value5 = sprintf('%03s', $value4)."/2020-21";//concatenating incremented value
            $value = $value5;

          
            

        }
    } 
    else {
        $value2 = "001/2020-21";
        $value = $value2;
    }

$_SESSION['invoiceid']=$value;



$product = $_POST['jobvalue1'];
$product2 = $_POST['jobvalue2'];
$product3 = $_POST['jobvalue3'];
$product4 = $_POST['jobvalue4'];
$product5 = $_POST['jobvalue5'];
$product6 = $_POST['jobvalue6'];
$product7 = $_POST['jobvalue7'];
$product8 = $_POST['jobvalue8'];
$product9 = $_POST['jobvalue9'];
$product10 = $_POST['jobvalue10'];
$product11 = $_POST['jobvalue11'];
$product12 = $_POST['jobvalue12'];
$product13 = $_POST['jobvalue13'];
$product14 = $_POST['jobvalue14'];
$product15 = $_POST['jobvalue15'];

$size = sizeof($product);
$resize = $size-1;
//echo $resize;
for($i=0;$i<$resize;$i++)
{
  $upper_dimention[$i] = $specified_dimention[$i]+$upper_tolerance[$i];
  $lower_dimention[$i] = $specified_dimention[$i]+$lower_tolerance[$i];
  $status="ok";
    
   $sql2="Insert into create_job_items(draw_location,ballon_no,characteristics,spcified_dimention,upper_tolerance,lower_tolerance,upper_dimention,lower_dimention,measuring_instrument,job_value,job_value2,job_value3,job_value4,job_value5,job_value6,job_value7,job_value8,job_value9,job_value10,job_value11,job_value12,job_value13,job_value14,job_value15,status,invoice_id,job_date)values('$draw_location[$i]','$ballon_no[$i]','$characteristics[$i]','$specified_dimention[$i]','$upper_tolerance[$i]','$lower_tolerance[$i]','$upper_dimention[$i]','$lower_dimention[$i]','$measuring_instrument[$i]','$product[$i]','$product2[$i]','$product3[$i]','$product4[$i]','$product5[$i]','$product6[$i]','$product7[$i]','$product8[$i]','$product9[$i]','$product10[$i]','$product11[$i]','$product12[$i]','$product13[$i]','$product14[$i]','$product15[$i]','$status','$value','$toda')";
   //echo $sql2;
    $query =  mysqli_query($conn,$sql2);
 }
      $sql3="Insert into job_nos (invoice_no)values('$value')";
      $sql1="Insert into create_job(`file_name`,`customer_id`, `part_number`, `cust_draw_no`, `po_number`, `itp_number`, `itp_revision_level`, `rgpl_draw_no`, `drawing_revision`, `rtp_revision_date`, `invoice_id`, `job_date`)values('$file_name','$customer_id','$part_no','$cust_draw_no','$po_no','$itp_no','$itp_revision_level','$rgpl_draw_no','$drawing_revision','$rtp_revision_date','$value','$toda')";     


               $query = mysqli_query($conn,$sql1);
               $query =  mysqli_query($conn,$sql3);

                   
                         if($query)
                            {   
                            $_SESSION['status']="Well Done! Jobs Added Successfully";
                            $_SESSION['status_code']="success";
                             header("Location: view-job.php?id=".$value);

                            }
                            else
                            { 
                            $_SESSION['status']="Oops something went wrong!!";
                            $_SEESION['status_code']="error"; 
                            }
                          
}



 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Job  </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="js/sweetalert.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>


    <script type="text/javascript">
  jQuery(document).delegate('a.add-record', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec-'+size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);
   });
</script>
<script type="text/javascript">
  jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});
</script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include('include/dashboard-sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include('include/dashboard-header.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
      <div class="container-fluid">
          <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">READINGS</h1>
            <div class="row"> 
    
              <div class="col-md-12" style="padding: 11px;-webkit-box-pack: center;">  
            
 						<form class="user" method="POST">
                                
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">Customer Id</label>
                                        <input type="text" class="form-control " id="customer_id"
                                            placeholder="Customer Id" required="" name="customer_id" value="<?php echo $customer_id;?>" readonly>
                                    </div>
                                    <input type="hidden" name="file_name" value="<?php echo $file_name;?>">
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">Part Name</label>
                                        <input type="text" class="form-control " id="part_no"
                                            placeholder="Part Number" name="part_no" required="" value="<?php echo $part_no;?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">Customer Draw No</label>
                                        <input type="text" class="form-control " id="cust_draw_no"placeholder="Customer Draw Number" name="cust_draw_no" required=""value="<?php echo $cust_draw_no;?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">PO Number</label>
                                        <input type="text" class="form-control " id="po_no"
                                            placeholder="PO Number" required="" name="po_no"value="<?php echo $po_no;?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">ITP Number</label>
                                        <input type="text" class="form-control " id="itp_no"
                                            placeholder="ITP Number" name="itp_no" required=""value="<?php echo $itp_no;?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">ITP Revision Level</label>
                                        <input type="text" class="form-control " id="itp_revision_level"
                                            placeholder="ITP Revision Level" name="itp_revision_level" required=""value="<?php echo $itp_revision_level;?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">RGPL Draw Number</label>
                                        <input type="text" class="form-control " id="rgpl_draw_no"
                                            placeholder="RGPL Draw Number" required="" name="rgpl_draw_no"value="<?php echo $rgpl_draw_no;?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">Drawing Revision</label>
                                        <input type="text" class="form-control " id="drawing_revision"
                                            placeholder="Drawing Revision" name="drawing_revision" required=""value="<?php echo $drawing_revision;?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">RTP Revision Date</label>
                                        <input type="text" class="form-control " id="rtp_revision_date"
                                            placeholder="RTP Revision Date" name="rtp_revision_date" required="" onfocus="(this.type='date')" onblur="(this.type='text')"value="<?php echo $rtp_revision_date;?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <div class="col-sm-4">
                                       <div class="well clearfix" style="width: 700px;">
                                             <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Job Field</a>
                                       </div>
                                    </div>
                                   <div class="col-sm-4"></div>

                                    <div class="col-sm-4"></div>
                                </div>
                            
<!-- Dynamic Entries  ---->
<div class="col-md-12" style="padding: 11px;overflow-x: auto;width:100%;height:100%">
<div class="form-group row" style="white-space: nowrap;">
                                    
	<table class="table table-bordered" id="tbl_posts">
	<thead>
    <tr>
      	<th>Sr.no</th>
      	<th>Draw Location</th>
      	<th>Ballon No.</th>
      	<th>Charact.</th>
      	<th>Specified Dimen.</th>
      	<th>Upper Tol.</th>
      	<th>Lower Tol.</th>
      	<th>Measuring Instru.</th>
        <th>Job Value 1</th>
        <th>Job Value 2</th>
        <th>Job Value 3</th>
        <th>Job Value 4</th>
        <th>Job Value 5</th>
        <th>Job Value 6</th>
        <th>Job Value 7</th>
        <th>Job Value 8</th>
        <th>Job Value 9</th>
        <th>Job Value 10</th>
        <th>Job Value 11</th>
        <th>Job Value 12</th>
        <th>Job Value 13</th>
        <th>Job Value 14</th>
        <th>Job Value 15</th>
        <th >ACTION:</th>
    </tr>
</thead>
<tbody id="tbl_posts_body">



</tbody>

</table>
</div>
 <div style="display:none;white-space: nowrap;" class="form-group row">
    <table id="sample_table">
      <tr id="">
       <td><span class="sn"></span>.</td>
       <td>
       	<input type="text" class="form-control" id="draw_location"placeholder="Draw Location"name="draw_location[]">
       </td>
       <td>
       	<input type="text" class="form-control " id="ballon_no"placeholder="Ballon Number" name="ballon_no[]">
       </td>
       <td>
       	<input type="text" class="form-control " id="characteristics" placeholder="Char" name="characteristics[]">
                                           
       </td>
       <td>
       	<input type="text" class="form-control " id="specified_dimention"placeholder="Specified Dimention"name="specified_dimention[]">
       </td>
       <td>
       	<input type="text" class="form-control " id="upper_tolerance"placeholder="Upper Tolerance" name="upper_tolerance[]">
        </td>
       <td>
       	<input type="text" class="form-control " id="lower_tolerance"placeholder="Lower Tolerance" name="lower_tolerance[]">
        </td>
       <td>
       	<input type="text" class="form-control " id="measuring_instrument" name="measuring_instrument[]">
                   

         </SELECT>
     </td>
       <td><input type="text" class="form-control" name="jobvalue1[]"></td>
       <td><input type="text" class="form-control" name="jobvalue2[]"></td>
       <td><input type="text" class="form-control" name="jobvalue3[]"></td>
       <td><input type="text" class="form-control" name="jobvalue4[]"></td>
       <td><input type="text" class="form-control" name="jobvalue5[]"></td>
       <td><input type="text" class="form-control" name="jobvalue6[]"></td>
       <td><input type="text" class="form-control" name="jobvalue7[]"></td>
       <td><input type="text" class="form-control" name="jobvalue8[]"></td>
       <td><input type="text" class="form-control" name="jobvalue9[]"></td>
       <td><input type="text" class="form-control" name="jobvalue10[]"></td>
       <td><input type="text" class="form-control" name="jobvalue11[]"></td>
       <td><input type="text" class="form-control" name="jobvalue12[]"></td>
       <td><input type="text" class="form-control" name="jobvalue13[]"></td>
       <td><input type="text" class="form-control" name="jobvalue14[]"></td>
       <td><input type="text" class="form-control" name="jobvalue15[]"></td>
       <td>
        <a class="btn btn-xs delete-record" data-id="0">
          <i class="fa fa-trash"></i>
        </a></td>
     </tr>
   </table>
 </div>
                              <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                    </div>
                                </div> 
                             </div> 
                                   
                    </form>
              </div>
                  
            </div>
                
        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php include('include/dashboard-footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="include/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
     <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
 <?php  if(isset($_SESSION['status']) && $_SESSION['status']!='') { ?>
<script>
    swal({
  title: "<?php echo $_SESSION['status'];?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
});
</script>
<?php
unset($_SESSION['status']);
}
?>

</body>
</html>
<?php } ?>