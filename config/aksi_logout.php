<?php
session_start();
session_destroy();
echo "<script> 
alert('berhasil logout njr'); 
location.href='../index.php'; 
</script>";
?>