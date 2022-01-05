<?php session_start();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up</title>

    <link rel="stylesheet" href="includes/Auth/css/style.css">
    <!-- <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="includes/dist/css/adminlte.min.css">
</head>
<style>
    .register-logo {
        text-align: center;

    }

    .ss {
        text-align: center;
    }
</style>




<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="www.ecc.gov.et"><b>MWA</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body" style="background-image:url('includes/images/bg-01.jpg')">
                <p style="color:blue" class="login-box-msg">Register a new User</p>

                <form id="quickForm" action="Auth/signup.inc.php" method="POST">
                <div class="form-group">
                        <input type="text" class="form-control" required="" name="username" placeholder="User Name">
                        
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" required="" name="fullname" placeholder="Full Name">
                        
                    </div>


                    <div class="form-group">

                        <select name="sendto" class="form-control" required="" placeholder="Department">
                            <option value="">Approvement Send To</option>
                            <option value="Desta">Desta</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <select name="role" class="form-control" required="" placeholder="Role">
                            <option value="">Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Users">Users</option>
                            <option value="Problem_Solvers">Problem Solver User</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                            <span class="fas fa-lock"></span>
                    </div>


                    <div class="form-group">
                        <input type="password" class="form-control" name="confirmpassword"
                            placeholder="Confirm Password">
                       
                        </div>
                    
                    <!-- <div class="form-group">

                        <select name="question" class="form-control" required="" placeholder="Security Questions">
                            <option value="">Select Security Question</option>
                            <option value="where is your birth place?">1.where is your birth place?</option>
                            <option value="What is your favorite food?">2.What is your favorite food?</option>
                            <option value="what is your best day?">3.what is your best day?</option>
                            <option value="What is Your Mother Name?">4.What is Your Mother Name?</option>
                            <option value="who is your best leader?">5.who is your best leader?</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" required="" name="answer" placeholder="Answer">
                       
                    </div> -->
                    <div class="form-group">
                        <?php $date=new DateTime();?>
                        <input readonly type="date" name="date" class="form-control" placeholder="Date"
                            value=<?php echo $date->format('Y-m-d');?> </div> </div> <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="signup" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <label for=""></label>
                <a href="" class="text-center">Already Registered User</a>|<br>
                <a href="login.php" class="text-center">Login</a>

            </div>


        </div>

    </div>

</body>

<?php
include('includes/notify.php');
?>
<script src="includes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="includes/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="includes/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="includes/dist/js/demo.js"></script>
<script type="text/javascript">
   
        $('#quickForm').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                confirmpassword: {
                    required: true,
                    minlength: 5
                    
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirmpassword: {
                    required: "please provide confirm password",
                    
                },
                
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    
</script>

</html>