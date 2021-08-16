
<?php
    session_start();
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Add Service</a>
      </nav>

      <div class="sl-pagebody">
        
        <div class="row">
            <div class="col-7 m-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Add Services</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['service_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['service_status']; 
                        unset($_SESSION['service_status']);
                        ?>
                    </div>
                    <?php } ?>
                    <?php
                        if($_SESSION['role_from_login_page'] == "viewer"):
                    ?>
                    <div class="alert alert-success">You can't added service because your are not Admin</div>
                    <?php
                        else:
                    ?>
                    <form action="service_post.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Icon</label>
                                <input type="text" class="form-control" placeholder="add icon" name="service_icon">
                                <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" >Select Icon</a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Title</label>
                                <input type="text" class="form-control" placeholder="add title" name="service_title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Description</label>
                                <textarea class="form-control" rows="4" name="service_description"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Add Now</button>
                    </form>
                    <?php
                        endif; 
                    ?>
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