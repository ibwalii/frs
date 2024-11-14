<?php include_once("../connection.php"); ?>
<?php


    $count_report_unconfirmed_sql = "SELECT count(r_id) as r_id FROM `reports` WHERE r_status= 0";
    $count_report_unconfirmed_result = mysqli_query($conn, $count_report_unconfirmed_sql);
    $count_report_unconfirmed_row = mysqli_fetch_assoc($count_report_unconfirmed_result);
    $count_report_unconfirmed_rows = mysqli_num_rows($count_report_unconfirmed_result);

    // confirmed
    $count_report_confirmed_sql = "SELECT count(r_id) as r_id FROM `reports` WHERE r_status= 1";
    $count_report_confirmed_result = mysqli_query($conn, $count_report_confirmed_sql);
    $count_report_confirmed_row = mysqli_fetch_assoc($count_report_confirmed_result);
    $count_report_confirmed_rows = mysqli_num_rows($count_report_confirmed_result);

    // all
    $count_report_all_sql = "SELECT count(r_id) as r_id FROM `reports`";
    $count_report_all_result = mysqli_query($conn, $count_report_all_sql);
    $count_report_all_row = mysqli_fetch_assoc($count_report_all_result);
    $count_report_all_rows = mysqli_num_rows($count_report_all_result);

    if (mysqli_query($conn, $count_report_unconfirmed_sql)) {
        $message = "successful";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Police FRS is a responsive and free admin theme built with  4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Police FRS Admin">
    <meta property="og:title" content="Police FRS ">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/Police FRS-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/Police FRS-admin/hero-social.png">
    <meta property="og:description" content="Police FRS">
    <title>Police FRS Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><span class="fa fa-shield"></span> Police FRS</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="index.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../assets/images/mole.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Fraud Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-reports-confirmed.php"><i class="icon fa fa-circle-o"></i> Confirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports-unconfirmed.php"><i class="icon fa fa-circle-o"></i> Unconfirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports.php"><i class="icon fa fa-circle-o"></i> All Reports</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-user.php"><i class="icon fa fa-circle-o"></i> New User</a></li>
            <li><a class="treeview-item" href="page-users-list.php"><i class="icon fa fa-circle-o"></i> Users List</a></li>
          </ul>
        </li>
        <!-- <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li> -->
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Admin Dashboard</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Reports</h4>
              <p><b><?php echo $count_report_all_row['r_id']; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Confirmed Reports</h4>
              <p><b><?php echo $count_report_confirmed_row['r_id']; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Unconfirmed Reports</h4>
              <p><b><?php echo $count_report_unconfirmed_row['r_id']; ?></b></p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Stars</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Report submissions</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Fraud Reports</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	// {
      	// 	value: 20,
      	// 	color: "#46BFBD",
      	// 	highlight: "#5AD3D1",
      	// 	label: "Inpersonation"
      	// },
      	{ 
      		value: <?php echo $count_report_unconfirmed_row['r_id']; ?>,
      		color:"#C7464A",
      		highlight: "#FF5A5E",
      		label: "Unconfirmed Fraud Reports"
      	},
        {
      		value: <?php echo $count_report_confirmed_row['r_id']; ?>,
      		color: "#FDB45C",
      		highlight: "#FFC870",
      		label: "Confirmed Fraud Reports"
      	},
        // {
      	// 	value: 80,
      	// 	color: "#46BFBD",
      	// 	highlight: "#5AD3D1",
      	// 	label: "Money"
      	// }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>