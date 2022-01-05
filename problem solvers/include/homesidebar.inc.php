<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
    <a class="brand-link text-center" href="#"><img src="../includes/images/mojo_customs_commission.png"
                        alt="logo" class="img-circle" width="80%"></a>
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="ProblemSolversHome.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
              <p>
                   Users
                    <i class="right fas fa-angle-left"></i>
                    <?php
                    // $username=$_SESSION['username']; 
                    $conn=mysqli_connect('localhost','root','','mwa');
                    $sql = $conn->query("SELECT * FROM users WHERE Status=1  ") or die(mysqli_error());
                    while($row = $sql->fetch_array())
                    {  
                       $app=$row['Aprovement_To'];                                                                                                                                                       
                    }                                    
                     $query=$dbh->prepare("SELECT id From users WHERE  Status=0 && Aprovement_To=:app  ORDER BY id");
                     $query-> bindParam(':app', $app, PDO::PARAM_STR);
                     $query->execute(); 
                     $row=$query->rowCount();
                      ?>
                      <span class="right badge badge-info">New <?php echo $row;?></span>
                </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../problem solvers/manage users/ApproveUsers.php" class="nav-link">
                  <i class="far fa-circle text-info"></i>
                  <p>Approve Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../problem solvers/manage users/UShowStatistics.php" class="nav-link">
                  <i class="far fa-circle text-warning"></i>
                  <p>Users Statistics</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
          <i class="nav-icon far fa-envelope"></i>
              <p>
                    Messages
                    <i class="right fas fa-angle-left"></i>
                    <?php
                    $username=$_SESSION['username']; 
                    // var_dump($username);
                    // die();
                    $conn=mysqli_connect('localhost','root','','mwa');
                    $sql = $conn->query("SELECT * FROM users WHERE Status=1 && User_Name='$username' ") or die(mysqli_error());
                    while($row = $sql->fetch_array())
                    {  
                       $app=$row['Full_Name'];                                                                                                                                                       
                    }                                    
                     $query=$dbh->prepare("SELECT id From message WHERE  Status_1=0 && Solver=:app  ORDER BY id");
                     $query-> bindParam(':app', $app, PDO::PARAM_STR);
                     $query->execute(); 
                     $row=$query->rowCount();
                      ?>
                      <span class="right badge badge-danger">New <?php echo $row;?></span>
                </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../problem solvers/managemessages/SeeMessages.php" class="nav-link">
                  <i class="far fa-circle text-info"></i>
                  <p>Show Messages User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../problem solvers/managemessages/ShowMessageAdmin.php" class="nav-link">
                  <i class="far fa-circle text-warning"></i>
                  <p>Show Messages Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../problem solvers/managemessages/ShowStatistics.php" class="nav-link">
                  <i class="far fa-circle text-danger"></i>
                  <p>Messages Statistics</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>