<?php
include '../../controllers/eventplanner_controllers/save_controller.php';

session_start();
if (!$_SESSION['eid']) {
    echo "<script>alert('Login before you can delete a request'); window.location.href = '../../view/eventplanner/login.php';</script>";
}

if (isset($_POST['delete_request'])) {
    $request_id = $_POST['request_id'];
}

if (delete_request_controller($request_id)) {
    echo "<script>alert('Deleted successfuly'); window.location.href = '../../view/eventplanner/requests.php';</script>";
}
