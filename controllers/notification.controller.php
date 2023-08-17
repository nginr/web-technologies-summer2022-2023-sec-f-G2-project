<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../models/notification.model.php';
    $userNotif = new Notification();
    $notifresult = $userNotif->getAllNotifForUserId($_POST['id']);
    echo $notifresult;
}
