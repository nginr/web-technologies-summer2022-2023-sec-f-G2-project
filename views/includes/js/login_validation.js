const lform = document.getElementById('loginform');
const rform = document.getElementById('signupform');

function isValidEmail(email) {
    const pos = email.indexOf("@");
    if (pos === -1) {
        return false;
    }
    const localPart = email.substring(0, pos);
    const domainPart = email.substring(pos + 1);
    if (domainPart.indexOf(".") === -1) {
        return false;
    }
    if (localPart === "" || domainPart === "") {
        return false;
    }
    return true;
}

function showError(inp, err, errmsg) {
    inp.style.border = '2px solid red';
    err.innerHTML = errmsg;
    err.style.visibility = 'visible';
}
function hideError(inp, err) {
    inp.style.border = '2px solid #11101b';
    err.style.visibility = 'hidden';
}

function isUniqueEmail(email) {
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/fetch_mail.controller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = 'email=' + email;
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(xhttp.responseText);
            if (response.status === 'Exists') {
                return false;
            } else {
                return true;
            }
        }
    };
}


function checkEmail(idx) {
    var emailF;
    var emailE;
    let msg = [];
    if (idx == 0) {
        emailF = document.getElementById('lemail');
        emailE = document.getElementById('lemail-err');
    } else {
        emailF = document.getElementById('remail');
        emailE = document.getElementById('remail-err');
    }

    if (emailF.value == '' || emailF.value == null) {
        showError(emailF, emailE, 'Email is Required');
    }
    else if (isValidEmail(emailF.value) != true) {
        showError(emailF, emailE,  'A Valid Email is Required');
    }
    else if (idx == 0) {
        if (isUniqueEmail(emailF.value)) {
            showError(emailF, emailE,  'Email does not exists');
        }
        else {
            hideError(emailF, emailE)
        }
    }
    else if (idx == 1) {
        if (!isUniqueEmail(emailF.value)) {
            showError(emailF, emailE,  'Email already exists');
        }
        else {
            hideError(emailF, emailE)
        }
    }
    else {
        hideError(emailF, emailE)
    }
    msg = [];
}

function checkPass(idx) {
    var passF;
    var passE;
    let msg = [];
    if (idx == 0) {
        passF = document.getElementById('lpassword');
        passE = document.getElementById('lpassword-err');
    } else {
        passF = document.getElementById('rpassword');
        passE = document.getElementById('rpassword-err');
    }

    if (passF.value == '' || passF.value == null) {
        showError(passF, passE, 'Password is Required');
    }
    else {
        hideError(passF, passE)
    }
    msg = [];
}


function checkName() {
    let nameF = document.getElementById('name');
    let nameE = document.getElementById('name-err');

    if (nameF.value.trim() === '') {
        showError(nameF, nameE, 'Name is Required');
    } else {
        hideError(nameF, nameE);
    }
}

function checkCPass() {
    let passF = document.getElementById('rpassword');
    let confirmPassF = document.getElementById('cpassword');
    let confirmPassE = document.getElementById('cpassword-err');

    if (confirmPassF.value.trim() === '') {
        showError(confirmPassF, confirmPassE, 'Confirm Password is Required');
    } else if (confirmPassF.value !== passF.value) {
        showError(confirmPassF, confirmPassE, 'Passwords Do Not Match');
    } else {
        hideError(confirmPassF, confirmPassE);
    }
}


lform.addEventListener('submit', (e) => {
    let emailF = document.getElementById('lemail');
    let emailE = document.getElementById('lemail-err');
    let passwordF = document.getElementById('lpassword');
    let passwordE = document.getElementById('lpassword-err');

        e.preventDefault();
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/login.controller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = 'email=' + emailF.value + '&password=' + passwordF.value;
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(xhttp.responseText);
            if (response.status === 'success') {
                window.location.href = 'home.view.php';
            } else {
                let memail = '<b>'+response.message+'</b>';
                let mpass = '<b>'+response.message+'</b>';
                showError(emailF, emailE, memail);
                showError(passwordF, passwordE, mpass);
            }
        }
    };
});



rform.addEventListener('submit', (e) => {
    let nameF = document.getElementById('name');
    let emailF = document.getElementById('remail');
    let passF = document.getElementById('rpassword');
    let genE = document.getElementById('general-err');

    e.preventDefault();

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controllers/signup.controller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = 'name=' + nameF.value + '&email=' + emailF.value + '&password=' + passF.value;
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(xhttp.responseText);
            if (response.status === 'success') {
                genE.style.border = '2px solid green';
                genE.style.color = '#11101b';
                genE.style.fontWeight = 'bold';
                genE.innerHTML = '<b>User Waiting for Confirmation</b>';
                genE.style.visibility = 'visible';
            } else {
                let mgenE = '<b>Failed to Register User</b>';
                showError(genE, genE, mgenE);
            }
        }
    };
});
