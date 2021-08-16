<?php
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: notfound.php');
    }
    // $title_name = "Dashboard";
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/database.php';

    $email_address_from_session = $_SESSION['email_address_from_login_page'];
    $name_select_query = "SELECT full_name FROM users WHERE email_address = '$email_address_from_session'";

    $from_database = mysqli_query($db_connect, $name_select_query);
    $after_assoc = mysqli_fetch_assoc($from_database);
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="card bd-0">
            <div class="card-header card-header-default bg-primary">
            <h5>Dashboard</h5>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                <h1>Welcome Our Website</h1>
                <h3>Name: <?= $after_assoc['full_name'] ?> </h3>
                <h3>Email: <?= $email_address_from_session ?> </h3>
                <h4>Role: <?=$_SESSION['role_from_login_page']?> </h4>
            </div><!-- card-body -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php
    require_once 'includes/footer-starlight.php';
?>