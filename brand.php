
<?php
    session_start();
    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

    $email_address_from_login_page = $_SESSION['email_address_from_login_page'];
    // Query OOP page conected


?>
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <a class="breadcrumb-item" href="profile_image.php">Profile Page</a>
        <a class="breadcrumb-item" href="user_list.php">User List</a>
        <a class="breadcrumb-item" href="service.php">All Service</a>
        <a class="breadcrumb-item" href="counter.php">Count Service</a>
        <a class="breadcrumb-item" href="brand.php">Partner Brand</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row mt-3">
            <div class="col-6 mr-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>All Partner Brand Item</h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <tr>
                            <th scope="col">Brand Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach($object_db->table_all("brands") as $brand): ?>
                            <tr class="bg-secondary">
                            <td>
                                <img src="image/brand_image/<?=$brand['brand_image_name'] ?>" alt="img not found">
                            </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-6 mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Add Brand</h4>
                    </div>
                    <div class="card-body">
                        <form action="brand_post.php" method="POST" enctype="multipart/form-data">     
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Image</label>
                                <input type="file" class="form-control" name="brand_image">
                                <?php
                                    if(isset($_SESSION['brand_image_status'])){
                                ?>
                                <small class="text-danger">
                                    <?php
                                    echo $_SESSION['brand_image_status']; 
                                    unset($_SESSION['brand_image_status']);
                                    ?>
                                </small>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-success">Add Brand</button>
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