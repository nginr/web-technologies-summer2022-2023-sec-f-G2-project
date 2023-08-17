<?php
    require_once '../models/user.model.php';
    $userOBJ = new User();
    $data = $userOBJ->getUserByName($_SESSION['username']);

    $userprofilepath = '';
    if ($data['type'] == 'admin') {
        $userprofilepath = 'profile.admin.view.php';
    } else {
        $userprofilepath = 'profile.user.view.php';
    }
?>

<div class="profile_menu">

    <div class="profile" onclick="togglemenu()">
        <img src="storage/images/<?php echo $data['profilePic'];?>" alt="">
    </div>

    <div class="menu">
        <h3><?php echo $data['name']; ?></h3>
        <ul>
            <li>
                <i class="bx bx-user-circle"></i>
                <a href="<?php echo $userprofilepath; ?>">Profile</a>
            </li>
            <li>
                <i class="bx bx-bell"></i>
                <label <?php echo 'onclick="togglenoti('.$data['id'].')"';?> > Notification </label>

            </li>
            <li>
                <i class="bx bx-log-out"></i>
                <a href="../controllers/logout.controller.php">Logout</a>
            </li>
        </ul>
    </div>

    <div class="noti">
        <h3>Notification</h3>
        <div class="notiflist">
            <ul id="notiful">
                <li><label> No new Notification </label></li>
            </ul>
        </div>
    </div>

</div>
