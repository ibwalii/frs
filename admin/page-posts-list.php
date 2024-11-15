<?php include_once("../connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Police FRS is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js.">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Police FRS Admin">
  <meta property="og:title" content="Police FRS">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/Police FRS-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/Police FRS-admin/hero-social.png">
  <meta property="og:description" content="Police FRS">
  <title>Posts List - Police FRS Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">
  <header class="app-header"><a class="app-header__logo" href="dashboard.php"><span class="fa fa-shield"></span> Police FRS</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="index.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../assets/images/mole.png" alt="User Image">
      <div>
        <p class="app-sidebar__user-name">Admin</p>
        <p class="app-sidebar__user-designation">Admin</p>
      </div>
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Fraud Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-reports-confirmed.php"><i class="icon fa fa-circle-o"></i> Confirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports-unconfirmed.php"><i class="icon fa fa-circle-o"></i> Unconfirmed Reports</a></li>
            <li><a class="treeview-item" href="page-reports.php"><i class="icon fa fa-circle-o"></i> All Reports</a></li>
          </ul>
        </li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Post Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="page-add-post.php"><i class="icon fa fa-circle-o"></i> Add Post</a></li>
          <li><a class="treeview-item active" href="page-posts-list.php"><i class="icon fa fa-circle-o"></i> View Posts</a></li>
        </ul>
      </li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-pencil"></i> Posts List</h1>
        <p>View all blog posts</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Post Management</a></li>
        <li class="breadcrumb-item">Posts List</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">All Blog Posts</h3>
          <div class="tile-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch all published posts
                $sql = "SELECT bp.post_id, bp.title, c.category_name, bp.created_at
                        FROM blog_posts bp
                        JOIN categories c ON bp.category_id = c.category_id
                        WHERE bp.status = 1
                        ORDER BY bp.post_id DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['post_id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['category_name']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                              <a href='page-edit-post.php?id={$row['post_id']}' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>
                              <a href='delete-post.php?id={$row['post_id']}' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Delete</a>
                            </td>
                          </tr>";
                  }
                } else {
                  echo "<tr><td colspan='5' class='text-center'>No posts available</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/plugins/pace.min.js"></script>
</body>
</html>
