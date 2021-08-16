<?php
    session_start();
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/database.php';

    $email_address_from_login_page = $_SESSION['email_address_from_login_page'];
    $select_profile_pic_query = "SELECT profile_image FROM users WHERE email_address = '$email_address_from_login_page'";  


?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <a class="breadcrumb-item" href="profile_image.php">Profile Page</a>
      </nav>

      <div class="sl-pagebody">

        <div class="row mt-2">
            <div class="col-6 m-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Profile</h4>
                    </div>
                    <div class="card-body">

                        <div class="text-center">
                            <img class="border" width="150" src="image/profile_image/<?= mysqli_fetch_assoc(mysqli_query($db_connect, $select_profile_pic_query))['profile_image'] ?>" alt="img not found">
                        </div>

                        <!-- Profile picture delete code start -->
                        <?php 
                        mysqli_fetch_assoc(mysqli_query($db_connect, $select_profile_pic_query))['profile_image'];
                        ?>
                        <?php
                            if(mysqli_fetch_assoc(mysqli_query($db_connect, $select_profile_pic_query))['profile_image'] != "default.png"){
                                
                                ?>
                        <div class="text-center">
                            <a href="delete_profile_picture.php?picture_name=<?=mysqli_fetch_assoc(mysqli_query($db_connect, $select_profile_pic_query))['profile_image']?>" class="btn btn-sm btn-danger">Delete picture</a>
                        </div>
                        <?php } ?>

                        <!-- Profile picture delete code End -->
                        <form action="profile_image_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Change your profile picture</label>
                                <input type="file" class="form-control" name="new_profile_image">
                            <!-- image extention missing checking -->
                            <?php
                                if(isset($_SESSION['image_extention_missing'])){
                                    ?>
                                        <small class="text-danger">
                                            <?php 
                                                echo $_SESSION['image_extention_missing'];
                                                unset($_SESSION['image_extention_missing']);
                                            ?>
                                        </small>
                                    <?php
                                }
                            ?>
                            <!-- image file size missing checking -->
                            <?php
                                if(isset($_SESSION['file_size_not_accepting'])){
                                    ?>
                                        <small class="text-danger">
                                            <?php 
                                                echo $_SESSION['file_size_not_accepting'];
                                                unset($_SESSION['file_size_not_accepting']);
                                            ?>
                                        </small>
                                    <?php
                                }
                            ?>
                            <!-- image select missing checking -->
                            <?php
                                if(isset($_SESSION['image_select_missing'])){
                                    ?>
                                        <small class="text-danger">
                                            <?php 
                                                echo $_SESSION['image_select_missing'];
                                                unset($_SESSION['image_select_missing']);
                                            ?>
                                        </small>
                                    <?php
                                }
                            ?>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
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