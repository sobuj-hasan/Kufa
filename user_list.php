<?php
    session_start();

    require_once 'includes/oop-database.php';
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    
    // query OOP page connected

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <a class="breadcrumb-item" href="profile_image.php">Profile Page</a>
        <a class="breadcrumb-item" href="user_list.php">User List</a>

      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-success"> 
                        <h3 class="text-white">Users List</h3>
                    </div>
                    <div class="card-body bg-light">

                        <div class="alert alert-success">
                            <h4 class="text-primary text-center">Total Users : <?=$object_db->table_all("contacts")->num_rows?></h4>
                        </div>

                        <div class="alert alert-info text-center">
                            <a class="btn btn-sm btn-danger" href="delete_all_user.php">Delete All</a>
                        </div>

                        <?php
                            if(isset($_SESSION['update_status'])){
                                ?>
                                    <div class="alert alert-success">
                                        <?php 
                                            echo $_SESSION['update_status'];
                                            unset($_SESSION['update_status']);
                                        ?>
                                    </div>

                                <?php
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['status'])){
                                ?>
                                <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['status'];
                                        unset($_SESSION['status']);
                                    ?>
                                </div>
                                <?php 
                            }
                        ?>
                        
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                <th scope="col">serial_no.</th>
                                <th scope="col">id</th>
                                <th scope="col">full_name</th>
                                <th scope="col">email_address</th>
                                <th scope="col">gender</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php
                            $serial_number = 101;
                            foreach($object_db->table_all("users") as $users_value):
                            ?>
                                <tr>
                                    <td><?= $serial_number++ ?></td>
                                    <td><?= $users_value['id']?></td>
                                    <td><?= ucwords($users_value['full_name']);?></td>
                                    <td><?= $users_value['email_address']?></td>
                                    <td><?= $users_value['gender']?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="edit_user.php?id=<?= $users_value['id']?>">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" href="delete_user.php?id=<?= $users_value['id']?>">Delete</a>
                                    </td>

                                </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php if($object_db->table_all("contacts")->num_rows == 0): ?>
                            <tr>
                                <td colspan="50" class="text-center text-danger">
                                    <h6>No Data Available!</h6>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <!-- </tbody> if need this code than active this code-->
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