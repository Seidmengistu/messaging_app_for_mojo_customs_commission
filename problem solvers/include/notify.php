<script src="../../includes/js/sweetalert.min.js"></script>
    
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
    echo "<script>
        swal({ title:'{$_SESSION['status']}', icon: '{$_SESSION['status_code']}', button:'Close' });
        </script> ";

    unset($_SESSION['status']);
}
?>