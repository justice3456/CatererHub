<?php
//logout
session_start();
unset($_SESSION['cid']);
echo "<script>window.location.href = '../index.php';</script>";