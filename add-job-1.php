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



 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Job </title>

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
 <script type="text/javascript" src="js/getData.js"></script>


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
           <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">INSPECTION TEST PLAN</h1>
              <div class="row"> 
    
              <div class="col-md-12" style="padding: 75px;display: -webkit-inline-box;-webkit-box-pack: center;">  
            
 <form class="user" method="POST" action="add-job.php">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="validationDefault01">Select PO Number</label>
                                <select class="form-control " id="employee" placeholder="PO Number" required="">
        <option value="Search PO Number">Select PO Number</option>
        <?php
        $sql = "SELECT po_number FROM create_job order by id DESC";
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

        while( $rows = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php echo $rows["po_number"]; ?>"><?php echo $rows["po_number"]; ?></option>
        <?php } ?>
                                </select>    
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0"></div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                                        <label for="validationDefault01">PO Number</label>
                                        <input type="text" class="form-control " id="po_no"
                                        placeholder="PO Number" required="" name="po_no">
                                    
                        </div>
                    </div>    

                               <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">File Name</label>
                                        <input type="text" class="form-control " id="file_name"
                                            placeholder="File Name" required="" name="file_name">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">Customer Id</label>
                                        <input type="text" class="form-control " id="customer_id"
                                            placeholder="Customer Id" required="" name="customer_id">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">Part Name</label>
                                        <input type="text" class="form-control " id="part_no"
                                            placeholder="Part Name" name="part_no" required="">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                   
                                   <div class="col-sm-4">
                                        <label for="validationDefault01">Customer Draw No</label>
                                        <input type="text" class="form-control " id="cust_draw_no"
                                            placeholder="Customer Draw Number" name="cust_draw_no" required="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">ITP Number</label>
                                        <input type="text" class="form-control " id="itp_no"
                                            placeholder="ITP Number" name="itp_no" required="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">ITP Revision Level</label>
                                        <input type="text" class="form-control " id="itp_revision_level"
                                            placeholder="ITP Revision Level" name="itp_revision_level" required="">
                                    </div>
                                   
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="validationDefault01">RGPL Draw Number</label>
                                        <input type="text" class="form-control " id="rgpl_draw_no"
                                            placeholder="RGPL Draw Number" required="" name="rgpl_draw_no">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">Drawing Revision</label>
                                        <input type="text" class="form-control " id="drawing_revision"
                                            placeholder="Drawing Revision" name="drawing_revision" required="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="validationDefault01">ITP Revision Date</label>
                                        <input type="text" class="form-control " id="rtp_revision_date"
                                            placeholder="ITP Revision Date" name="rtp_revision_date" required="" onfocus="(this.type='date')" onblur="(this.type='text')">
                                    </div>
                                    
                                </div>                                       
                                


<!-- Dynamic Entries  ---->


<!--  Dynamic Entries   ---->

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="Next" value="Next">
                                    </div>
                                </div> 
                        </table>               
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