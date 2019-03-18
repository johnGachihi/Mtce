<?php session_start() ?>

<html>
<head>
    <meta name=viewport content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">
    <title>Moi Airport Maintenance Reporting</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <h1>Moi Airport Maintenance Reporting</h1>
    <form id="login-form">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type='text' name = 'username'></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type='password' name = 'password'></td>
            </tr>
            <tr>
                <td><input type='submit' name = 'submit' value = 'Login'></td>
            </tr>
        </table>
        <div id="status" style="color: red"></div>
    </form>

    <script>
        const form = document.getElementById("login-form");
        form.onsubmit = submitLoginCredentials;

        const MANAGER = 4;
        const SURBODINATE = 1;

        function submitLoginCredentials(e) {
            e.preventDefault();

            const ajax = new XMLHttpRequest();
            ajax.open("POST", "login.php");
            ajax.responseType = "json";
            ajax.send(new FormData(document.getElementById("login-form")));

            ajax.onload = () => {
                console.log("Result", ajax.response);
                const {error, error_message} = ajax.response;

                if(error) {
                    const loginStatusDiv = document.getElementById("status");
                    loginStatusDiv.innerText = error_message;
                } else {
                    // window.location = "_mtce.php";
                    const staff_lv = ajax.response.result.staff_lv;
                    redirectOnLogin(staff_lv);
                }
            }
        }

        function redirectOnLogin(staffLevel) {
            if (staffLevel == MANAGER) {
                window.location = "manager2.php";
            } else if(staffLevel == SURBODINATE) {
                window.location = "_mtce.php";
            } else {
                console.log(staffLevel);
            }
        }
    </script>
</body>
</html>


