
<?php
    session_start();
    $title_name = "Settings";
    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

    // query OOP page connected

?>
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="settings.php">Genaral Text Settings</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-8 m-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Genaral Settings</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['settings_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['settings_status']; 
                        unset($_SESSION['settings_status']);
                        ?>
                    </div>
                    <?php } ?>
                        <form action="settings_post.php" method="POST">
                            <?php foreach($object_db->table_all("text_settings") as $text_setting): ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=$text_setting['settings_name'] ?></label>
                                <input type="text" class="form-control" value="<?=$text_setting['settings_value'] ?>" name="<?=$text_setting['settings_name'] ?>">
                            </div>
                            <?php endforeach; ?>
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