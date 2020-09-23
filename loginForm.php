<!-- Sean Jones-->
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
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

        .signinbtn{
            background-color: cornflowerblue;
            color: white;
            cursor: pointer;
            opacity: 0.8;
            padding: 16px 20px;
            margin: 16px 0;
        }

        .signin:hover{
            opacity: 1;
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

        hr {
            height: 1px;
            color: #dddddd;
            width: 30%;
            margin-left: 5px;
        }

        a {
            color: dodgerblue;
        }

        .forgottenInfo{
            background-color: #f1f1f1;
            text-align: center;
        }

    </style>
</head>
<body>
<form action="login.php" method="post">
    <div class="container signin">
        <h1>Sign in</h1>
        <p> Please enter in your credentials to access your account.</p>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter your email here" name="email" id="email" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter your password here" name="psw" id="psw" required>
        <hr>
        <button type="submit" class="signinbtn">Sign in</button>
    </div>
    <div class="container forgottenInfo">
        <p>Forgot your password or email? <a href="#">Retrieve info here</a>.</p>
    </div>
</form>

</body>
</html>
