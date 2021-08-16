
<?php
    session_start();
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/oop-database.php';

    // Query OOP page connected

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
        <a class="breadcrumb-item" href="skill.php">All Skill Part</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row mt-3">
            <div class="col-6 mr-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-info">
                        <h4>All Skills</h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Skill Name</th>
                            <th scope="col">Skill Heading</th>
                            <th scope="col">Skill Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach($object_db->table_all("skills") as $skills): ?>
                            <tr>
                            <td><?=$skills['id']?></td>
                            <td><?=$skills['skill_name']?></td>
                            <td><?=$skills['skill_header']?></td>
                            <td><?=$skills['skill_percentage']?></td>
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
                        <h4>Add Skills</h4>
                    </div>
                    <div class="card-body">
                        <form action="skill_post.php" method="POST">
                            <?php
                                if(isset($_SESSION['skill_added_status'])){
                            ?>
                                <div class="alert alert-success">
                                    <?php
                                    echo $_SESSION['skill_added_status']; 
                                    unset($_SESSION['skill_added_status']);
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add skill Name</label>
                                <input type="text" class="form-control" name="skill_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Skill Header</label>
                                <input type="text" class="form-control" name="skill_header">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Skill Percentage</label>
                                <input type="text" class="form-control" name="skill_percentage">
                            </div>
                            <button type="submit" class="btn btn-success">Add skill</button>
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