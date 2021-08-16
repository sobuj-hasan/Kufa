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
        <a class="breadcrumb-item" href="service.php">All Service</a>
        <a class="breadcrumb-item" href="contact_info.php">Guest Message</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-success"> 
                        <h3 class="text-white">Guest Information</h3>
                    </div>
                    <div class="card-body bg-light">

                        <div class="alert alert-success">
                            <h4 class="text-primary text-center">Total Guest Message : <?=$object_db->table_all("contacts")->num_rows?></h4>
                        </div>

                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>

                                <th scope="col">id</th>
                                <th scope="col">Guest Name</th>
                                <th scope="col">Guest Email</th>
                                <th scope="col">Guest Message</th>
                                <th scope="col">Mark Action</th>
                                </tr>
                            </thead>

                                <?php foreach($object_db->table_all("contacts") as $contact_info){ ?>
                                <tr>
                                    <td><?=$contact_info['id']?></td>
                                    <td><?=$contact_info['guest_name']?></td>
                                    <td><?=$contact_info['guest_email']?></td>
                                    <td><?=$contact_info['guest_message']?></td>
                                    <td>
                                        <a class="mb-2 btn btn-sm btn-outline bg-success text-white" href="#">Read</a>
                                        <a class="btn btn-sm btn-outline bg-danger text-white" href="#">Unread</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                
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