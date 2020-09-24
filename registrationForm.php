<!-- Sean Jones -->
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #dddddd;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            padding: 20px;
            background-color: white;
        }

        input[type=text], input[type=password]{
            width: 25%;
            padding: 10px;
            margin: 5px 0 22px 0;
            display: table;
            background: #f1f1f1;
            alignment: center;
        }

        input[type=text]:focus, input[type=password]:focus{
            background-color: #dddddd;
            outline: none;
        }

        .registerbtn{
            background-color: cornflowerblue;
            color: white;
            padding: 16px 20px;
            margin: 16px 0;
            cursor: pointer;
            width: 10%;
            opacity: 0.8;
        }

        hr {
            height: 1px;
            color: #dddddd;
            width: 30%;
            margin-left: 5px;
        }

        .registerbtn:hover{
            opacity: 100%;
        }

        a {
            color: dodgerblue;
        }

        .signin{
            background-color: #f1f1f1;
            text-align: center;
        }

    </style>
</head>
<body>
    <form action="register.php" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Please complete this form to create an account.</p>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Enter your password again" name="psw-repeat" id="psw-repeat" required>
            <hr>
            <button type="submit" class="registerbtn">Register</button>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
    </form>
</body>
</html>


