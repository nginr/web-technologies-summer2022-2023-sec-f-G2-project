<?php

class User {
    function getAllUsers() {
        require '../models/dbconn.php';
        $query = "SELECT * FROM admin";
        $result = mysqli_query($connection, $query);
        $data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        mysqli_close($connection);
        return $data;
    }

    function getUserByName($name) {
        require '../models/dbconn.php';
        $query = "SELECT * FROM admin WHERE name = '$name'";
        $result = mysqli_query($connection, $query);
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        }
        mysqli_close($connection);
        return $data;
    }

    function requestUserRegistration($name, $email, $psw) {
        require '../models/dbconn.php';
        $query = "INSERT INTO admin (name, admin_mail, password) VALUES ('$name', '$email', '$psw')";
        if (mysqli_query($connection, $query)) {
            mysqli_close($connection);
            return true;
        }
        mysqli_close($connection);
        return false;
    }

    function confirmUserRegistration($id) {
        require '../models/dbconn.php';
        $query = "UPDATE admin SET type = 'user' WHERE id = '$id'";
        if (mysqli_query($connection, $query)) {
            mysqli_close($connection);
            return true;
        }
        mysqli_close($connection);
        return false;
    }

    function elevateUser($email) {
        require '../models/dbconn.php';
        $query = "UPDATE admin SET type = 'user' WHERE admin_mail = '$email'";
        if (mysqli_query($connection, $query)) {
            mysqli_close($connection);
            return true;
        }
        mysqli_close($connection);
        return false;
    }


}
