
<?php
    require_once 'includes/header-starlight.php';
    require_once 'includes/nav-starlight.php';
    require_once 'includes/database.php';

    $id = $_GET['id'];
    $select_query = "SELECT id, service_icon, service_title, service_description FROM services WHERE id = $id ";
    $after_assoc_from_db = mysqli_fetch_assoc(mysqli_query($db_connect, $select_query));


?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="service_edit.php">Service edit</a>
      </nav>

      <div class="sl-pagebody">
        
        <div class="row mt-3">
            <div class="col-6 m-auto">
                <div class="card mb-3">
                <div class="card-header text-white bg-success">
                    Edit Your Information
                </div>
                <div class="card-body">
                <form action = "edit_service_post.php" method = "POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Icon</label>
                        <input type="hidden" class="form-control" value="<?=$after_assoc_from_db['id']?>" name="id">
                        <input type="text" class="form-control" value="<?=$after_assoc_from_db['service_icon']?>" name="service_icon">
                        <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" >Select Icon</a>
                    </div>

                    <div class="form-group">
                        <label>Service Title</label>
                        <input type="text" class="form-control" value="<?=$after_assoc_from_db['service_title']?>" name = "service_title">
                    </div>

                    <div class="form-group">
                        <label>Service Description</label>
                        <textarea class="form-control" rows="4" value="<?=$after_assoc_from_db['service_description']?>" name="service_description"> </textarea>
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

        


