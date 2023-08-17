<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="storage/icons/favicon.png"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="includes/css/style.css">
        <link rel="stylesheet" href="includes/css/tabpanel.css">
        <link rel="stylesheet" href="includes/css/auth.style.css">
        <script> document.title = "Signin" </script>
        <script defer src="includes/js/login_validation.js"></script>
    </head>
    <body>
        <div class="tabcontainer auth">
            <div class="buttonscontainer">
                <button onclick="showpanel(0)">Login</button>
                <button onclick="showpanel(1)">Signup</button>
            </div>

            <div class="tabpanel form-panel">
                <h2>Sign in to your Account</h2>
                <form id="loginform" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <small id="lemail-err">Error message</small>
                        <div class="input-group">
                            <input type="email" id="lemail" placeholder="Enter Email" onblur="checkEmail(0)">
                            <i class='bx bx-envelope'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <small id="lpassword-err">Error message</small>
                        <div class="input-group">
                            <input type="password" id="lpassword" placeholder="Enter password" onblur="checkPass(0)">
                            <i class='bx bx-lock-alt' ></i>
                        </div>
                    </div>

                    <button type="submit">Login</button>

                    <div id="acclinks">
                        <p>I don't have an account.
                        <a href="#" onclick="showpanel(1)">Register</a></p>
                    </div>

                </form>
            </div>

            <div class="tabpanel form-panel">
                <h2>Create an Account</h2>
                <small id="general-err">Error</small>
                <form id="signupform" method="POST">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <small id="name-err">Error message</small>
                        <div class="input-group">
                            <input type="text" id="name" placeholder="Enter Name" onblur="checkName()">
                            <i class='bx bx-user'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <small id="remail-err">Error message</small>
                        <div class="input-group">
                            <input type="email" id="remail" placeholder="Enter Email" onblur="checkEmail(1)">
                            <i class='bx bx-envelope'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <small id="rpassword-err">Error message</small>
                        <div class="input-group">
                            <input type="password" id="rpassword" placeholder="Enter password" onblur="checkPass(1)">
                            <i class='bx bx-lock-alt' ></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <small id="cpassword-err">Error message</small>
                        <div class="input-group">
                            <input type="password" id="cpassword" placeholder="Enter password again" onblur="checkCPass()">
                            <i class='bx bx-lock-alt' ></i>
                        </div>
                    </div>

                    <button type="submit">Register</button>
                    <div id="acclinks">
                        <p>I already have an account.
                        <a href="#" onclick="showpanel(0)">Login</a></p>
                    </div>

                </form>
            </div>
        </div>

        <script src="includes/js/panel_tabber.js"> </script>
        <script>
            window.onload = function () {
                showpanel(0);
            };
        </script>
    </body>
</html>
