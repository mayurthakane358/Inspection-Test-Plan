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

 

 $sql1 = "select COUNT(*) as totaljobs from  create_job";
 $result= mysqli_query($conn,$sql1);
 while($rows= mysqli_fetch_array($result))
{
 $totaljobs=$rows['totaljobs']; 
 } 
 $sql2 = "select COUNT(*) as inrange from create_job_items where status = 'OK' ";
 $result= mysqli_query($conn,$sql2);
 while($rows= mysqli_fetch_array($result))    
 { 
   $inrange=$rows['inrange']; 
 }
  $sql3 = "select COUNT(*) as outofrange from create_job_items where status='NOT OK'";
 $result= mysqli_query($conn,$sql3);
 while($rows= mysqli_fetch_array($result))   
   { 
    $outofrange=$rows['outofrange']; 
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

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

                    
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="modify-top-gainer.php">Total Files </a> </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaljobs; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!--<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="modify-top-gainer.php">In Range </a> </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $inrange; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="modify-top-gainer.php">Out Of Jobs </a> </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $outofrange; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>-->

                       
                    </div>

                    <!-- Content Row -->

                   <div class="row">

                      
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                               
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jobs Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                       
                                    </div>
                                </div>
 <form>
<?php   
 $sql = "select COUNT(*) as totaljobs from  create_job";
 $result= mysqli_query($conn,$sql);
 while($rows= mysqli_fetch_array($result))
{?>                                                                
    <input type="hidden" name="totaljobs" id="totaljobs" value="<?php echo $rows['totaljobs']; ?>">
<?php } ?>
<?php 
 $sql = "select * from create_job_items";
 $result= mysqli_query($conn,$sql);
 $in=0;
 $out=0;
 while($row= mysqli_fetch_array($result))    
 { 
    if($row['job_value'] >= $row['lower_dimention'] AND $row['job_value'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value2'] >= $row['lower_dimention'] AND $row['job_value2'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value3'] >= $row['lower_dimention'] AND $row['job_value3'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value4'] >= $row['lower_dimention'] AND $row['job_value4'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value5'] >= $row['lower_dimention'] AND $row['job_value5'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value6'] >= $row['lower_dimention'] AND $row['job_value6'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value7'] >= $row['lower_dimention'] AND $row['job_value7'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value8'] >= $row['lower_dimention'] AND $row['job_value8'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value9'] >= $row['lower_dimention'] AND $row['job_value9'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value10'] >= $row['lower_dimention'] AND $row['job_value10'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value11'] >= $row['lower_dimention'] AND $row['job_value11'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value12'] >= $row['lower_dimention'] AND $row['job_value12'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value13'] >= $row['lower_dimention'] AND $row['job_value13'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value14'] >= $row['lower_dimention'] AND $row['job_value14'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }

    if($row['job_value15'] >= $row['lower_dimention'] AND $row['job_value15'] <= $row['upper_dimention'])
    {
        $in = $in+1;
    }
    else
    {
        $out = $out+1;
    }


    ?>   
   
 <?php } ?>
 <input type="hidden" name="inrange" id="inrange" value="<?php echo $in; ?>">
    <input type="hidden" name="outofrange" id="outofrange" value="<?php echo $out; ?>">
        </form>

                                
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Total Files
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Jobs In Range
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Jobs Out Of Range
                                        </span>
                                    </div>
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

</body>

</html>
<?php } ?>