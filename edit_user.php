
<?php
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/database.php';

    $select_id = $_GET['id'];
    $select_user = "SELECT id, full_name, email_address, gender FROM users WHERE id = $select_id";
    $q = mysqli_query($db_connect, $select_user);
    $assoc = mysqli_fetch_assoc($q);

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
      </nav>

      <div class="sl-pagebody">
        
        <div class="row mt-3">
            <div class="col-6 m-auto">
                <div class="card mb-3">
                <div class="card-header text-white bg-success">
                    Update Information
                </div>
                <div class="card-body">
                <form action = "edit_user_post.php" method = "POST">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="hidden" value="<?php echo $assoc['id'] ?>" name="id">
                        <input type="hidden" value="<?php echo $assoc['full_name'] ?>" name="old_full_name">
                        <input type="text" class="form-control" placeholder = "Full Name" value="<?php echo $assoc['full_name'] ?>" name="full_name">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder = "Enter your Email" value="<?php echo $assoc['email_address'] ?>" name = "email_address">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br>
                        <input type="radio" id="male" name="gender" value="male"
                        <?php
                            if($assoc['gender'] == "male"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female" 
                        <?php
                            if($assoc['gender'] == "female"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other" 
                        <?php
                            if($assoc['gender'] == "other"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="other">Other</label><br>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
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

        


