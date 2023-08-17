
function gohome() {
    window.location.href="home.view.php";
}

function scrollhorz(divclass) {
    var div = document.querySelector(divclass);
    var delta = event.deltaY || event.wheelDelta;
    var dir = (delta > 0) ? 90 : -90;
    div.scrollLeft += dir;
    event.preventDefault();
}

function togglemenu(id) {
    const profilemenu = document.querySelector('.menu');
    const notif = document.querySelector('.noti');
    if (notif.classList.contains('actv')) {
        togglenoti(0);
    }
    const centerContentLybrary = document.querySelector('.center-content');
    if (centerContentLybrary !== null) {
        centerContentLybrary.classList.toggle('actv');
    }

    const tabpanner = document.querySelector('.tabcontainer');
    if (tabpanner !== null) {
        tabpanner.classList.toggle('actv');
    }

    profilemenu.classList.toggle('actv');
}

function togglenoti(id) {
    const notif = document.querySelector('.noti');
    notif.classList.toggle('actv');
    if (id !== 0) { getNotif(id); }
}

function getNotif(id) {
    const notUL = document.getElementById('notiful');
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/notification.controller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = 'id=' + id;
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            notUL.innerHTML = xhttp.responseText;
        }
    };
}
