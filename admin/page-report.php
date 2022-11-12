<?php
// Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// update report
if(isset($_POST['update_report'])){
    $rc_remark_admin = $_POST['rc_comment_admin'];
    $r_id_update = $_POST['r_id_update'];
    $r_title_update = $_POST['r_title'];
    $r_status_update = $_POST['r_status'];
    
    $update_status_sql = "UPDATE reports SET r_status = {$r_status_update}, r_title = '{$r_title_update}' WHERE r_id = {$r_id_update}";

    $insert_comment_sql = "INSERT INTO reports_comments (r_id, rc_name, rc_email, rc_remark, rc_status, rc_priv)
    VALUES ('{$r_id_update}', 'admin', 'admin@admin.com', '{$rc_remark_admin}', 1, 1)";

    if (mysqli_query($conn, $update_status_sql) && mysqli_query($conn, $insert_comment_sql)) {
        echo $message_update = "successful";
    } else {
        echo $message_update = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}

// update status
if(isset($_POST['rc_status_update'])){
    $rc_status_update = $_POST['rc_status_update'];
    $rc_status_update_rc_id = $_POST['rc_status_update_rc_id'];
  
    $update_status_sql = "UPDATE reports_comments SET rc_status = {$rc_status_update} WHERE rc_id = {$rc_status_update_rc_id}";

    if (mysqli_query($conn, $update_status_sql)) {
        $message = "successful";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_GET['r_id'])){
    $r_id = $_GET['r_id'];
}else{
    $r_id = 1;
}

    $search_sql = "SELECT * FROM reports where r_id = {$r_id}";
    $search_result = mysqli_query($conn, $search_sql);
    $search_row = mysqli_fetch_assoc($search_result);
    $rows = mysqli_num_rows($search_result);

    if (mysqli_query($conn, $search_sql)) {
        $message = "successful";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>User Profile - Vali Admin</title>
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
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><span class="fa fa-shield"></span> Defence FRS</a>
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
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Ibrahim</p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Fraud Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-reports-confirmed.php"><i class="icon fa fa-circle-o"></i> Confirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports-unconfirmed.php"><i class="icon fa fa-circle-o"></i> Unconfirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports.html.php"><i class="icon fa fa-circle-o"></i> All Reports</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-user.php"><i class="icon fa fa-circle-o"></i> New User</a></li>
            <li><a class="treeview-item" href="page-users-list.php"><i class="icon fa fa-circle-o"></i> Users List</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="row user">
        <!-- <div class="col-md-5">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
            </ul>
          </div>
        </div> -->
        <div class="col-md-5">
            <div class="bs-component">
              <div class="card">
                <div class="card-body">
                  
                </div>
                <!-- <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image"> -->
                <div class="card-body">
                    <h2>
                    <?php if(isset($message_update)) { echo $message_update; } ?>
                    </h2>
                <h5 class="card-title">
                    <?php if(isset($search_row['r_title']) && !empty($search_row['r_title'])) { echo $search_row['r_title']; }else{ echo "Not Assigned"; } ?>
                  </h5>
                  <p class="text-info">Update to assign appropriate title</p>
                  <p class="card-text"><?php if(isset($search_row['r_any']) && !empty($search_row['r_any'])) { echo $search_row['r_any']; }else{ echo "Not Assigned"; } ?>.</p>
                  <!-- <a class="card-link" href="#">Card link</a><a class="card-link" href="#">Another link</a> -->
                </div>
                <div class="card-footer text-muted">
                <form name="update_report_form" action="" method="post">
                <div class="form-group">
                  <label class="control-label">Report Title</label>
                  <input class="form-control" placeholder="Enter Appropriate title" name="r_title" value="<?php if(isset($search_row['r_title']) && !empty($search_row['r_title'])) { echo $search_row['r_title']; }else{ echo ""; } ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Official Remark</label>
                  <textarea class="form-control" rows="4" placeholder="Official Comment" name="rc_comment_admin"></textarea>
                </div>
                <div class="form-group">
                    <label for="r_status">Status</label>
                    <select class="form-control" id="r_status" name="r_status">
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  
                <input type="hidden" name="update_report" value="<?php echo $search_row['r_id'] ?>">
                <input type="hidden" name="r_id_update" value="<?php echo $search_row['r_id'] ?>">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Approve/Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </form>
                        
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-7">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
            <?php
                         
                           $report_comments_sql = "SELECT * FROM reports_comments where r_id = {$search_row['r_id']} order by rc_date desc";
                           $report_comments_result = mysqli_query($conn, $report_comments_sql);
                           $report_comments_row = mysqli_fetch_assoc($report_comments_result);
                           $report_comments_rows = mysqli_num_rows($report_comments_result);                       
            
            if($report_comments_rows>0){
            do{
            ?>
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5><a href="#"><?php echo $report_comments_row['rc_name']; ?></a></h5>
                    <p class="text-muted"><small><?php echo $report_comments_row['rc_date']; ?></small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p><?php echo $report_comments_row['rc_remark']; ?>.</p>
                </div>
                <ul class="post-utility">
                  <?php if($report_comments_row['rc_status'] == 1){ ?>  
                  <li>Published</li> &nbsp;
                  <li>
                  <form action="" method="post">
                        <input type="hidden" name="rc_status_update" value="0">
                        <input type="hidden" name="rc_status_update_rc_id" value="<?php echo $report_comments_row['rc_id']; ?>">
                        <button class="btn btn-danger" type="submit">Unpublish</button>
                    </form>
                  </li>
                  <?php }else{ ?>
                    <li>Unpublished</li> &nbsp;
                  <li>
                    <form action="" method="post">
                        <input type="hidden" name="rc_status_update" value="1">
                        <input type="hidden" name="rc_status_update_rc_id" value="<?php echo $report_comments_row['rc_id']; ?>">
                        <button class="btn btn-primary" type="submit">publish</button>
                    </form>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <?php }while($report_comments_row = mysqli_fetch_assoc($report_comments_result)); 
                }else{ ?>
              <div class="timeline-post">
                <div class="post-content">
                  <p>No Comments.</p>
                </div>
              </div>  
             <?php } ?>
            </div>
            <!-- <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
                <form>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div> -->
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