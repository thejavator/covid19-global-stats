<?php

require_once(dirname(__FILE__) . '/controller.php');
use lib\controller;

$controller = new controller();

$worldStats = $controller->getWorldStats();
$casesByCountry = $controller->getCasesByCountry();
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COVID 19 - Global Statistics</title>

  <!-- Custom fonts for this template-->
  <link href="dist/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="dist/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
    

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">COVID 19 - Global Statistics</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total cases</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $worldStats["total_cases"] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total recovered</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $worldStats["total_recovered"] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total deaths</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $worldStats["total_deaths"] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

		<!-- Content Row -->
          <div class="row">
		  
			 <div class="col-xl-12 col-lg-12 mb-4">			  
			  <!-- DataTales Example -->
			  <div class="card shadow mb-12">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Detail per country</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">					
					  <thead>
						<tr>
						  <th>Country name</th>
						  <th>Total cases</th>
						  <th>Total recovered</th>
						  <th>Total deaths</th>
						  <th>New deaths</th>
						  <th>New cases</th>
						</tr>
					  </thead>
					  <tbody>
						<?php foreach ($casesByCountry['countries_stat'] as $key) : ?>
							<tr>
								<td scope='row'><?php echo $key["country_name"] ?></td>
								<td scope='row'><span class="badge badge-secondary"><?php echo $key["cases"] ?></span></td>
								<td scope='row'><span class="badge badge-success"><?php echo $key["total_recovered"] ?></span></td>
								<td scope='row'><span class="badge badge-danger"><?php echo $key["deaths"] ?></span></td>
								<td scope='row'><?php echo $key["new_deaths"] ?></td>
								<td scope='row'><?php echo $key["new_cases"] ?></td>
							</tr>
						<?php endforeach; ?>										
					  </tbody>
					</table>
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
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="dist/jquery/jquery.min.js"></script>
  <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="dist/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="dist/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="dist/chart.js/Chart.min.js"></script>

  <!-- Page level plugins -->
  <script src="dist/datatables/jquery.dataTables.min.js"></script>
  <script src="dist/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="dist/js/demo/datatables-demo.js"></script>

  
</body>

</html>
