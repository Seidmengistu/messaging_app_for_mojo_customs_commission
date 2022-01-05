<?php
function isAdmin()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'Admin'){
            header('Location:../503.php');
        }
    }
}
function isintelligenceAdmin()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'iadmin'){
            header('Location:../503.php');
        }
    }
    
}
function isintelligenceUser()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'iuser'){
            header('Location:../503.php');
        }
    }
    
}
function isSpotAuditAdmin()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'sadmin'){
            header('Location:../503.php');
        }
    }
}

function isSpotAuditUser()
{
    if(isset($_SESSION['Role'])){
        $role = $_SESSION['Role'];
        if($role != 'suser'){
            header('Location:../503.php');
        }
    }
}


?>