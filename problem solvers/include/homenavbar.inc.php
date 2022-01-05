<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php
                    $username=$_SESSION['username']; 
                    // var_dump($username);
                    // die();
                    $conn=mysqli_connect('localhost','root','','mwa');
                    $sql = $conn->query("SELECT * FROM users WHERE Status=1 && User_Name='$username'  ") or die(mysqli_error());
                    while($row = $sql->fetch_array())
                    {  
                       $app=$row['Full_Name'];  
                      //  var_dump($app);
                      //  die();                                                                                                                                                     
                    }                                    
                     $query=$dbh->prepare("SELECT id From message WHERE  Status_1=0 && Solver=:app  ORDER BY id");
                     $query-> bindParam(':app', $app, PDO::PARAM_STR);
                     $query->execute(); 
                     $row=$query->rowCount();
                      ?>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="right badge badge-danger"><?php echo $row;?></span>
            </a>
        </li>      
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="../problem solvers/Profile/ShowProfile.php" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>Profile                   
                </a>
                <a href="../logout.php" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout   
                </a>
            </div>
        </li> 
    </ul>
</nav>