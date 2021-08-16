
<?php
    session_start();
    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

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
      </nav>

      <div class="sl-pagebody">
        <div class="row mt-3">
            <div class="col-7 mr-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>All Count Services</h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered">
                        <thead class="bg-info">
                            <tr>
                            <th scope="col">Count id</th>
                            <th scope="col">Count Icon</th>
                            <th scope="col">Count Number</th>
                            <th scope="col">Count Title</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($object_db->table_all("counter") as $counter){
                        ?>
                            <tr>     
                            <td><?= $counter['id'] ?></td>
                            <td>
                                <i class="<?= $counter['count_icon'] ?>"></i>
                            </td>
                            <td><?= $counter['count_number'] ?></td>
                            <td><?= $counter['count_title'] ?></td>

                            </tr>
                        <?php } ?>

                        </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-5 ml-auto mb-10">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>Add Count Services</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['counter_status'])){

                    ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['counter_status']; 
                        unset($_SESSION['counter_status']);
                        ?>
                    </div>
                    <?php } ?>
                        <form action="counter_post.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Icon</label>
                                <input type="text" class="form-control" name="count_icon">
                                <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" >Select Icon</a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Count Number</label>
                                <input type="number" class="form-control" name="count_number">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Count Title</label>
                                <input type="text" class="form-control" name="count_title">
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