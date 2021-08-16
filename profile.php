
<?php
    session_start();
    require_once 'includes/database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

    $email_address_from_login_page = $_SESSION['email_address_from_login_page'];
    $select_profile_pic_query = "SELECT profile_image FROM users WHERE email_address = '$email_address_from_login_page'";  
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="profile.php">Change Password</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <!-- Password updated successfully msg PHP code start-->
                        <?php
                            if(isset($_SESSION['password_update_successfully_msg'])){
                        ?>
                        <div class="alert alert-success">
                            <?php
                                echo $_SESSION['password_update_successfully_msg'];
                                unset($_SESSION['password_update_successfully_msg']);
                            ?>
                        </div>
                        <?php
                            }
                        ?>
                        <!-- Password updated successfully msg PHP code End-->
                        <form action="profile_post.php" method="POST">
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input type="password" class="form-control" placeholder="Old password" name="old_password">

                                <?php
                                    if(isset($_SESSION['Old_password_checking'])){
                                ?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['Old_password_checking'];
                                            unset($_SESSION['Old_password_checking']);
                                        ?>
                                    </small>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control" placeholder="New password" name="new_password" id="new_password">
                                <input type="checkbox" onclick="showNewPasswordFunction()"> Show Password
                                <script>
                                    function showNewPasswordFunction() {
                                        var x = document.getElementById("new_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Re-Enter Password</label>
                                <input type="password" class="form-control" placeholder="Re-enter password" name="confirm_password" id="confirm_password">
                                <!-- javascript code, toggole password start -->
                                <input type="checkbox" onclick="showConfirmPasswordFunction()"> Show Password
                                <script>
                                    function showConfirmPasswordFunction() {
                                        var x = document.getElementById("confirm_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                                <!-- javascript code, toggole password End -->
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
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