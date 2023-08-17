<?php

function getpos($f, $pos) {
    if ($pos===$f) {
        return "selected";
    }
}

require_once '../models/dbconn.php';
$query = "SELECT * FROM $teamtable WHERE id=".$_GET['id'];
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$mid = $row['id'];
$mname = $row['name'];
$mimage = $row['image'];
$mpos = $row['position'];
$mqual = $row['qualification'];
$mabout = $row['about'];

echo '
<fieldset>
    <legend>Update Member</legend>
    <form method="POST" enctype="multipart/form-data" action="../controllers/team.controller.php">
        <table>
            <tr>
                <td>Member Name</td>
                <td> : <input type="text" value="'.$mname.'" name="membername" required> </td>
            </tr>
            <tr>
                <td>Profile Picture</td>
                <td> : <input type="file" id="profpic" name="profpic"> </td>
            </tr>
            <tr>
                <td> Position </td>
                <td> :
                    <select name="mpos">
                        <option '.getpos("None", $mpos).' value="None">Select a Position</option>
                        <option '.getpos("CEO", $mpos).' value="CEO">CEO</option>
                        <option '.getpos("Manager", $mpos).' value="Manager">Manager</option>
                        <option '.getpos("Vice-Manager", $mpos).' value="Vice-Manager">Vice-Manager</option>
                        <option '.getpos("Member", $mpos).' value="Member">Member</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td> : <input type="text" value="'.$mqual.'" name="qualification" required> </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">About</td>
                <td> <textarea name="about" placeholder="'.$mabout.'"  cols="20" rows="5"></textarea> </td>
            </tr>
        </table>
                <input type="hidden" name="update" value="'.$mid.'">
                <input type="submit" value="Submit">
    </form>
</fieldset>
';


echo '
<fieldset>
    <legend>Delete Member</legend>
        <table>
            <tr>
                <td>Member Name</td>
                <td> : '.$mname.' </td>
            </tr>
            <tr>
                <td>Profile Picture</td>
                <td> : <img width="100px" src="../views/storage/images/'.$mimage.'"> </td>
            </tr>
            <tr>
                <td> Position </td>
                <td> : '.$mpos.' </td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td> :'.$mqual.' </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">About</td>
                <td> : '.$mabout.' </td>
            </tr>
        </table>
    <form method="POST" action="../controllers/team.controller.php">
        <input type="hidden" name="delete" value="'.$mid.'">
        <input type="submit" value="Delete">
    </form>
</fieldset>
';
