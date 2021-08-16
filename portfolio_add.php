
<?php
    session_start();
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="portfolio_add.php">Add portfolio</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-8 m-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Add Portfolio Item</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['portfolio_image_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['portfolio_image_status']; 
                        unset($_SESSION['portfolio_image_status']);
                        ?>
                    </div>
                    <?php } ?>
                        <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Portfolio Title</label>
                                <input type="text" class="form-control" name="portfolio_title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Portfolio Details</label>
                                <textarea class="form-control" rows="4" name="portfolio_details"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Portfolio Tumbnail photo</label>
                                <input type="file" class="form-control" name="portfolio_thumbnail_photo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Portfolio Feature photo</label>
                                <input type="file" class="form-control" name="portfolio_feature_photo">
                            </div>
                            <button type="submit" class="btn btn-success">Add Now</button>
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