<?php
function isAdmin()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'Admin'){
            header('Location:../../503.php');
        }
    }
}
function isproblemsolver()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'Problem_Solvers'){
            header('Location:../../503.php');
        }
    }
    
}
function isuser()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'Users'){
            header('Location:../../503.php');
        }
    }
    
}

?>