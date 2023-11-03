<?php
//jika belum login
if(isset($_SESSION['level'])){
    
} else {
    echo '
    <script>
        alert("Anda Belum Login");
        window.location.href="login.php";
    </script>
    ';
}

?>

