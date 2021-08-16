
<?php
    session_start();
    $title_name = "Service";
    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';

    // Query OOP page conect

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <a class="breadcrumb-item" href="profile_image.php">Profile Page</a>
        <a class="breadcrumb-item" href="user_list.php">User List</a>
        <a class="breadcrumb-item" href="service.php">All Service</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="card mb-3">
                        <div class="card-header text-white bg-info">
                            <h4>All Service Item</h4>
                        </div>
                        
                    <div class="card-body">
                    <!-- edit user successfully php code -->
                    <?php
                        if(isset($_SESSION['service_status'])){
                        ?>
                        <div class="alert alert-success">
                        <?php 
                            echo $_SESSION['service_status'];
                            unset($_SESSION['service_status']);
                        ?>
                        </div>
                    <?php
                        }
                    ?>
                    <!-- Deleted user successfully php code -->
                    <?php
                        if(isset($_SESSION['service_delete_status'])){
                        ?>
                        <div class="alert alert-success">
                        <?php 
                            echo $_SESSION['service_delete_status'];
                            unset($_SESSION['service_delete_status']);
                        ?>
                        </div>
                    <?php
                        }
                    ?>
                    
                    <table class="table table-bordered">
                        <thead class="bg-info">
                            <tr>
                            <th scope="col">Service id</th>
                            <th scope="col">Service Icon</th>
                            <th scope="col">Service Title</th>
                            <th scope="col">Service Description</th> 
                            <th scope="col">Service Action</th>
                            <th scope="col">Service Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($object_db->table_all("services") as $service):
                        
                        ?>
                            <tr>     
                            <td><?= $service['id'] ?></td>
                            <td>
                                <i class="<?= $service['service_icon'] ?>"></i>
                            </td>
                            <td><?= $service['service_title'] ?></td>
                            <td><?= $service['service_description'] ?></td>
                            <td>

                            <?php if($_SESSION['role_from_login_page'] == "viewer"): ?>
                                <p>This part is hidden</p>
                            <?php
                                else: 
                            ?>
                                <a class="btn btn-sm mb-1 btn-success" href="edit_service.php?id=<?= $service['id'] ?>">Edit</a>
                                <a class="btn btn-sm mb-1 btn-danger" href="delete_service.php?id=<?= $service['id'] ?>">Delete</a>
                            <?php
                                endif; 
                            ?>
                                
                            </td>
                            <td>
                            <!-- User role checking then show his service -->
                            <?php if($_SESSION['role_from_login_page'] == "viewer"): ?>
                            <p>This part is hidden</p>
                            <!-- shorthant if else -->
                            <?php
                                else: 
                            ?>

                                <?php if($service['status'] == 'active'): ?>
                                    <span class="badge badge-success">
                                        <?= $service['status'] ?>
                                    </span>
                                    <a href="change_service_status.php?id=<?=$service['id']?>&what_to_do=deactive " class="btn btn-sm btn-warning">Deactive</a>
                                    <?php else: ?>
                                        <span class="badge badge-danger">
                                            <?= $service['status'] ?>
                                        </span>
                                        <a href="change_service_status.php?id=<?=$service['id']?>&what_to_do=active " class="btn btn-sm btn-primary">Active</a>
                                <?php endif; ?>

                            <?php
                                endif;
                            ?>
                                
                            
                            </td>

                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                        </table>

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