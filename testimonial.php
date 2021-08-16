
<?php
    session_start();
    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

    // Query OOP page connected

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <a class="breadcrumb-item" href="profile_image.php">Profile Page</a>
        <a class="breadcrumb-item" href="user_list.php">User List</a>
        <a class="breadcrumb-item" href="service.php">All Service</a>
        <a class="breadcrumb-item" href="contact_info.php">Guest Message</a>
        <a class="breadcrumb-item" href="testimonial.php">Customer Review</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-7 mr-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>All Testimonial Services</h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered">
                        <thead class="bg-info">
                            <tr>
                            <th scope="col">Customer id</th>
                            <th scope="col">Customer Image</th>
                            <th scope="col">Customer Review</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Company Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($object_db->table_all("testimonials") as $testimonial):
                        ?>
                            <tr>     
                            <td><?=$testimonial['id']?></td>
                            <td><?=$testimonial['customer_image']?></td>
                            <td><?=$testimonial['customer_opinion']?></td>
                            <td><?=$testimonial['customer_name']?></td>
                            <td><?=$testimonial['customer_company']?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-5 ml-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Add customer Review</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['testimonial_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['testimonial_status']; 
                        unset($_SESSION['testimonial_status']);
                        ?>
                    </div>
                    <?php } ?>
                        <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Image</label>
                                <input type="file" class="form-control" name="customer_image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Review</label>
                                <textarea class="form-control" rows="4" name="customer_review"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Name</label>
                                <input type="text" class="form-control" name="customer_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Company Name</label>
                                <input type="text" class="form-control" name="company_name">
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