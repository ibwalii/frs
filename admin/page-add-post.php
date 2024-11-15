<?php
// Include database connection
include_once("../connection.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form input data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Get the current timestamp
    $created_at = date('Y-m-d H:i:s');

    // Define query to insert post data into the database
    $sql = "INSERT INTO blog_posts (title, content, category_id, status, created_at)
            VALUES ('$title', '$content', $category, 1, '$created_at')";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        // Redirect to posts list page if successful
        header("Location: page-posts-list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Police FRS is a responsive and free admin theme built with 4, SASS and PUG.js. It's fully customizable and modular.">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Police FRS Admin">
  <meta property="og:title" content="Police FRS">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/Police FRS-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/Police FRS-admin/hero-social.png">
  <meta property="og:description" content="Police FRS">
  <title>Add Post - Police FRS Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CKEditor Script -->
  <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
</head>
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
      <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Post Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item active" href="page-add-post.php"><i class="icon fa fa-circle-o"></i> Add Post</a></li>
          <li><a class="treeview-item" href="page-posts-list.php"><i class="icon fa fa-circle-o"></i> View Posts</a></li>
        </ul>
      </li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-user.php"><i class="icon fa fa-circle-o"></i> New User</a></li>
            <li><a class="treeview-item" href="page-users-list.php"><i class="icon fa fa-circle-o"></i> Users List</a></li>
          </ul>
        </li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-pencil"></i> Add Post</h1>
        <p>Enter details for a new post</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Post Management</a></li>
        <li class="breadcrumb-item">Add Post</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Create a New Post</h3>
          <div class="tile-body">
            <form method="POST" action="">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
                <label class="control-label">Category</label>
                <select class="form-control" name="category" required>
                  <option value="1">Security</option>
                  <option value="2">Fraud Awareness</option>
                  <option value="3">Community Safety</option>
                </select>
              </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i> Submit</button>
        <button class="btn btn-secondary" type="reset"><i class="fa fa-times-circle"></i> Reset</button>
      </form>

            
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
  <script>
    // Initialize CKEditor on the content textarea
    CKEDITOR.replace('content');
  </script>
</body>
</html>
