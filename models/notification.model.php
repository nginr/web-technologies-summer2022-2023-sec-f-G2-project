<?php

class Notification {
    function getAllNotifForUserId($uid) {
        require_once 'dbconn.php';
        $query = "SELECT notiflabel FROM notification WHERE u_id = '$uid'";
        $result = mysqli_query($connection, $query);
        $usernotification = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $usernotification .= "<li><label>{$row['notiflabel']}</label></li>";
            }
        } else {
            $usernotification .= "<li><label> No new Notification </label></li>";
        }
        mysqli_close($connection);
        return $usernotification;
    }
}
