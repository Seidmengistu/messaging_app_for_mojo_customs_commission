<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <a class="brand-link text-center" href="#"><img src="../../includes/images/mojo_customs_commission.png"
                alt="logo" class="img-circle" width="80%"></a>
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="../adminhome.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <div class="bg-warning-eleivation-2">
                        <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <span class="badge badge-danger navbar-badge"></span>
                                    <p>
                                         Messages
                                        <i class="right fas fa-angle-left"></i>
                                        <?php
                                    $username=$_SESSION['username'];
                                    
                                       
                                        $conn=mysqli_connect('localhost','root','','mwa');
                                        $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                        while($row = $sql->fetch_array())
                                        {  
                                        $app=$row['Full_Name'];
                                        // var_dump($app);
                                        // die();                                                                                                                                                       
                                        } 
                                    $query=$dbh->prepare("SELECT id From message WHERE Status_6=0 && Too=:app ORDER BY id");
                                    $query-> bindParam(':app', $app, PDO::PARAM_STR);
                                     $query->execute();
                                     
                                     
                                    $row=$query->rowCount();
                                    ?>
                                        <span class="right badge badge-danger">New <?php echo $row;?></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../managemessages/SeeMessages.php" class="nav-link">
                                            <i class="far fa-circle text-info"></i>
                                            <p>See Messages</p>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="../managemessages/ShowStatistics.php" class="nav-link">
                                            <i class="far fa-circle text-danger"></i>
                                            <p>Show Statistics</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="fa fa-check"></i>
                                <span class="badge badge-danger navbar-badge"></span>
                                <p>
                                    Approvements
                                    <i class="right fas fa-angle-left"></i>
                                    <?php
                                    $username=$_SESSION['username']; 
                                    $conn=mysqli_connect('localhost','root','','mwa');
                                    $sql = $conn->query("SELECT Full_Name FROM users WHERE status=1 && Role='Admin'  ORDER BY `Full_Name`") or die(mysqli_error());
                                    while($row = $sql->fetch_array()){
                                        $full_name=$row['Full_Name'];
                                    }
                                     $query=$dbh->prepare("SELECT id From users WHERE status=0 && Aprovement_To=:full_name  ORDER BY id");
                                     $query-> bindParam(':full_name', $full_name, PDO::PARAM_STR);
                                      $query->execute();
                                    
                                     
                                     
                                    $row=$query->rowCount();
                                    ?>
                                    <span class="right badge badge-warning">New <?php echo $row;?></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../manageusers/ApproveProblemSolvers.php" class="nav-link">
                                        <i class="far fa-circle text-info"></i>
                                        <p>Approve Problem Solvers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../manageusers/ApproveUsers.php" class="nav-link">
                                        <i class="far fa-circle text-danger"></i>
                                        <p>Approve Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../manageusers/ShowStatistics.php" class="nav-link">
                                        <i class="far fa-circle text-warning"></i>
                                        <p>Show Statistics</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-copy"></i>
                                    <span class="badge badge-danger navbar-badge"></span>
                                    <p>
                                        Complaint
                                        <i class="right fas fa-angle-left"></i>
                                        <?php
                                    $username=$_SESSION['username']; 
                                    
                                    $conn=mysqli_connect('localhost','root','','mwa');
                                    $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                    while($row = $sql->fetch_array())
                                    {  
                                    $app=$row['Full_Name'];
                                    // var_dump($app);
                                    // die();                                                                                                                                                       
                                    }
                                    
                                    $query=$dbh->prepare("SELECT id From complain WHERE status=0 && Recipant_Name=:app  ORDER BY id");
                                    $query-> bindParam(':app', $app, PDO::PARAM_STR);
                                     $query->execute();
                                     
                                     
                                    $row=$query->rowCount();
                                    ?>
                                        <span class="right badge badge-info">New <?php echo $row;?></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    
                                    <li class="nav-item">
                                        <a href="../complaint/SeeComplaint.php" class="nav-link">
                                            <i class="far fa-circle text-warning"></i>
                                            <p>See Complaint</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../complaint/ShowStatistics.php" class="nav-link">
                                            <i class="far fa-circle text-danger"></i>
                                            <p>Show Statistics</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </nav>

    </div>
    <!-- /.sidebar -->
</aside>