<?php 
session_start();
session_destroy();

header("Location: ../formLogin/index.php?pesan=logout")



?>