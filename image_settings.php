
<?php
    session_start();
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/database.php';

    $all_text_setting_query = "SELECT * FROM text_settings";
    $all_text_setting_data_from_db = mysqli_query($db_connect, $all_text_setting_query);

?>
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="settings.php">Image Settings</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-8 m-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Image Settings</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['image_settings_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['image_settings_status']; 
                        unset($_SESSION['image_settings_status']);
                        ?>
                    </div>
                    <?php } ?>
                        <form action="image_settings_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Logo</label>
                                <input type="file" class="form-control" value="" name="logo_image_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Banner Image</label>
                                <input type="file" class="form-control" value="" name="banner_image_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add About Image</label>
                                <input type="file" class="form-control" value="" name="about_image_name">
                            </div>
                            <button type="submit" class="btn btn-success">Save Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php
    require_once 'includes/footer-starlight.php';
?>