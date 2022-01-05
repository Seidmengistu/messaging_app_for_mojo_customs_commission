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
  <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span class="fas fa-user"></span>

                                    Complaint List
                                </h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender Name</th>
                                            <th>Recipent Name</th>
                                            <th>Complain</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>

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
                                            $sql = "SELECT * from complain  WHERE Sender_Name=:app ";
                                            $query = $dbh -> prepare($sql);
                                            $query->bindParam(':app',$app,PDO::PARAM_STR);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                         {
                                            foreach($results as $result)
                                          {			
 
                                
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result->Sender_Name);?></td>
                                                <td><?php echo htmlentities($result->Recipant_Name);?></td>
                                                <td><?php echo htmlentities($result->Complaint);?></td>
                                                <td><?php echo htmlentities($result->date);?></td>
                                                <td><?php echo htmlentities($result->time);?></td>
                                                <td>

                                                <?php if($result->status==0)
                                           {?>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#pendingG" data-id="<?=$result->id?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Not Seen
                                                </a>
                                                 </td>
                                                <?php 
                                           } 
                                           else
                                           {?>
                                               <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#approvedG"
                                                data-id="<?=$result->id?>">
                                                
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Seen
                                                </a>
                                                <?php
                                             }
                                              ?>
                                                <td>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#abc" data-id="<?=$result->id?>"
                                                        
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>        
                                                </td>
                                                </td>
                                                </tr>
                                            <?php 
                                            $cnt=$cnt+1; 
                                          }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="abc">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                    Warning
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>

                                        <div class="modal-body">
                                            <h3>Are You Sure To Delete it?</h3>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">No</button>
                                                <form action="../include/complain.inc.php" method="GET">
                                                <button type='submit' class='btn btn-success' name='del'>Yes</button>
                                                <input type='hidden' name='del' value="" id="deleteId">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="pending" >
                                <div class="modal-dialog">
                                    <div class="modal-content bg-info">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Approvement Info
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Are You Sure To Put in Seen it?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='pending'>Yes</button>
                                                <input type='hidden' name='pending' value="" id="pendingId">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="approved" >
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pending Warning
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are You Sure To Put in Not Seen Satate?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='approved'>Yes</button>
                                                <input type='hidden' name='approved' value="" id="approvedId">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

        </div>
  <?php 
  include('../include/footer.inc.php');
  ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php
include('../include/script.inc.php');
?>
  <script>
    $('#abc').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('deleteId').value = button.data('id');
    });

    $('#pending').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('pendingId').value = button.data('id');
    });

    $('#approved').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('approvedId').value = button.data('id');
    });

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>
</html>
