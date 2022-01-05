<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    
    header('location:../../login.php');
} 
include "../../Auth/middleware.php";

isuser();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MWA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
  include('../include/css.inc.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include ('../include/load.php');
       
        include ('../include/navbar.inc.php'); 
        include ('../include/sidebar.inc.php');
  ?>
        <br>
        <div class="content-wrapper" style="background-image:url('../../includes/images/bg-01.jpg')">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span class="nav-icon fas fa-user"></span>
                                    Profile Information
                                </h3>

                            </div>
                            <br><br>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card"
                                                style="background-image:url('../../includes/images/bg-01.jpg')">

                                                <div class="card-body">
                                                    <?php
                                // $user=$_SESSION['Role'];
                                $username=$_SESSION['username']; 
                                    
                                         
                                $sql ="SELECT *FROM users WHERE Role='Users' && User_Name=:username ";
                                $query= $dbh -> prepare($sql);
                                $query->bindParam(':username',$username,PDO::PARAM_STR);
                                
                                $query-> execute();
                                
                                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                     

                                    foreach($results as $row)
                                    {
                                        
                                    ?>

                                                    <form action='ShowProfile.inc.php' method='POST' id="quickForm">
                                                        <div class="mb-3">
                                                            <label class="form-label">User Name</label>
                                                            <input required class="form-control"
                                                                value="<?php echo $row['User_Name']?>" name='username'>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">New Password</label>
                                                            <input id="exampleInputPassword1" required type='password'
                                                                class="form-control" value="" name='password'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input required type='password' class="form-control"
                                                                value="" name='confirmpassword'>
                                                        </div>

                                                        <button name='change' class='btn btn-primary'>Change</button>
                                                    </form>
                                                    <?php
                                        }
                                        ?>
                                                </div>
                                            </div>
                                            <div class="card card-primary card-outline">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
    $('#quickForm').validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            confirm password: {
                required: true,
                minlength: 6
            },

        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            confirm password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    </script>
    <?php 
 include '../include/notify.php';
include('../include/footer.inc.php');
include('../include/script.inc.php');
?>

</body>

</html>