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

$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

<style type="text/css">
    #dataTable_filter{
        float: right;
    }
</style>
<script src="js/sweetalert.js"></script>
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

                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Report</h6>
                             <button name="create_excel" id="btnExport" class="btn btn-success" style="float: right;">Generate Excel File</button>
                             <a href="download.php?id=<?php echo $id;?>"><button name="create_excel" id="btnExport" class="btn btn-success" style="float: right;margin-right: 10px" >Generate PDF File</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="module-body table"  id="employee_table" style="overflow-x:auto;">
                                <table class="table table-bordered" id="tblCustomers" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>File Name</th>
                                            <th>Customer Id</th>
                                            <th>Part No</th>
                                            <th>Cust draw no</th>
                                            <th>Po no</th>
                                            <th>Itp no</th>
                                            <th>Itp revision level</th>
                                            <th>Rgpl draw no</th>
                                            <th>Drawing revision</th>
                                            <th>Rtp revision date</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
<?php
    $fetch = "select t1.*,t2.* from create_job t1, create_job_items t2 WHERE t1.invoice_id = t2.invoice_id AND t1.invoice_id='$id' LIMIT 1";

    $result= mysqli_query($conn,$fetch);
    $cnt=1;     
    while($row= mysqli_fetch_array($result))
    {?> 
           <input type="hidden" value="<?php echo $row['file_name']; ?>" id="file_name">                  
                    <tr>
                       
                        <td><?php echo $row['file_name']; ?></td>
                        <td><?php echo $row['customer_id']; ?></td>
                        <td><?php echo $row['part_number']; ?></td>
                        <td><?php echo $row['cust_draw_no']; ?></td>
                        <td><?php echo $row['po_number']; ?></td>
                        <td><?php echo $row['itp_number']; ?></td>
                        <td><?php echo $row['itp_revision_level']; ?></td>
                        <td><?php echo $row['rgpl_draw_no']; ?></td>
                        <td><?php echo $row['drawing_revision']; ?></td>
                        <td><?php echo $row['rtp_revision_date']; ?></td>
                    </tr>
      <?php } ?> 
                    <tr>
                                            <th>Sr.No</th>
                                            <th>Draw location</th>
                                            <th>Ballon no</th>
                                            <th>Characteristics</th>
                                            <th>Specified dimention</th>
                                            <th>Upper tolerance</th>
                                            <th>Lower tolerance</th>
                                            <th>Upper Dimen.</th>
                                            <th>Lower Dimen.</th>
                                            <th>Measuring Instrument</th>
                                             <th>Job Value1</th>
                                            <th>Job Value2</th>
                                            <th>Job Value3</th>
                                            <th>Job Value4</th>
                                            <th>Job Value5</th>
                                            <th>Job Value6</th>
                                            <th>Job Value7</th>
                                            <th>Job Value8</th>
                                            <th>Job Value9</th>
                                            <th>Job Value10</th>
                                            <th>Job Value11</th>
                                            <th>Job Value12</th>
                                            <th>Job Value13</th>
                                            <th>Job Value14</th>
                                            <th>Job Value15</th>
                                            
                                            <th>Unique Id</th>
                    </tr>
       <?php 
       $fetch = "select t1.*,t2.* from create_job t1, create_job_items t2 WHERE t1.invoice_id = t2.invoice_id AND t1.invoice_id='$id'";

    $result= mysqli_query($conn,$fetch);
    $cnt=1;     
       while($row= mysqli_fetch_array($result))
    {?>              
                        <tr>
                         <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['draw_location']; ?></td>
                        <td><?php echo $row['ballon_no']; ?></td>
                        <td><?php echo $row['characteristics']; ?></td>
                        <td><?php echo $row['spcified_dimention']; ?></td>
                        <td><?php echo $row['upper_tolerance']; ?></td>
                        <td><?php echo $row['lower_tolerance']; ?></td>
                        <td><?php echo $row['upper_dimention']; ?></td>
                        <td><?php echo $row['lower_dimention']; ?></td>
                        <td><?php echo $row['measuring_instrument']; ?></td>


                        <!-------First Job---------->
                        <?php 
                        if ($row['job_value'] >= $row['lower_dimention'] AND $row['job_value'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------First Job---------->



                        <!-------Second Job---------->
                         <?php 

                        if ($row['job_value2'] >= $row['lower_dimention'] AND $row['job_value2'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value2']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value2']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Second Job---------->
                        

                        <!-------Third Job---------->
                         <?php 
                        if ($row['job_value3'] >= $row['lower_dimention'] AND $row['job_value3'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value3']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value3'];?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Third Job---------->


                        <!-------Fourth Job---------->
                         <?php 
                        if ($row['job_value4'] >= $row['lower_dimention'] AND $row['job_value4'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value4']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value4']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Fourth Job---------->


                        <!-------Fifth Job---------->
                         <?php 
                        if ($row['job_value5'] >= $row['lower_dimention'] AND $row['job_value5'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value5']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value5']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Fifth Job---------->


                        <!-------Sixth Job---------->
                         <?php 
                        if ($row['job_value6'] >= $row['lower_dimention'] AND $row['job_value6'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value6']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value6']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Six Job---------->


                        <!-------Seven Job---------->
                         <?php 
                        if ($row['job_value7'] >= $row['lower_dimention'] AND $row['job_value7'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value7']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value7']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Seven Job---------->


                        <!-------Eight Job---------->
                         <?php 
                        if ($row['job_value8'] >= $row['lower_dimention'] AND $row['job_value8'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value8']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value8']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Eight Job---------->


                        <!-------Nine Job---------->
                         <?php 
                        if ($row['job_value9'] >= $row['lower_dimention'] AND $row['job_value9'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value9']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value9']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Nine Job---------->


                        <!-------Ten Job---------->
                         <?php 
                        if ($row['job_value10'] >= $row['lower_dimention'] AND $row['job_value10'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value10']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value10']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Ten Job---------->


                        <!-------Eleven Job---------->
                         <?php 
                        if ($row['job_value11'] >= $row['lower_dimention'] AND $row['job_value11'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value11']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value11']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Eleven Job---------->


                        <!-------Twelve Job---------->
                         <?php 
                        if ($row['job_value12'] >= $row['lower_dimention'] AND $row['job_value12'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value12']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value12']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Twelve Job---------->


                        <!-------Thirteen Job---------->
                         <?php 
                        if ($row['job_value13'] >= $row['lower_dimention'] AND $row['job_value13'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value13']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value13']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Thirteen Job---------->


                        <!-------Fourteen Job---------->
                         <?php 
                        if ($row['job_value14'] >= $row['lower_dimention'] AND $row['job_value14'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value14']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value14']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Fourteen Job---------->


                        <!-------Fifteen Job---------->
                         <?php 
                        if ($row['job_value15'] >= $row['lower_dimention'] AND $row['job_value15'] <= $row['upper_dimention']) 
                        {?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: green;">
                                <?php echo $row['job_value15']; ?>
                                </span>
                            </td>
                            
                        <?php } else { ?>
                            
                            <td>
                                <span style="font-weight:bold;font-size: 15px;color: red;">
                                    <?php echo $row['job_value15']; ?>
                                </span>
                            </td>

                        <?php } ?> 
                        <!-------Fifteen Job---------->

                        <td><?php echo $row['invoice_id']; ?></td>

                                            
                    </tr>

   <?php $cnt=$cnt+1; } ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
       <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="script/datatables/jquery.dataTables.js"></script>
    <script src="script/table2excel.js" type="text/javascript"></script>
<script type="text/javascript">

    $(function () {

        $("#btnExport").click(function () {
            var str = $("#file_name").val();
            $("#tblCustomers").table2excel({
                filename: "Report.xls"
            });
        });
    });
</script> 

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