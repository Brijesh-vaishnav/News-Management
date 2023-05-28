<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 16px;
                background-color: #f5f5f5;
            }
            h1 {
                text-align: center;
                margin-top: 40px;
                color: #313a46;
            }
            form {
                margin: 20px auto;
                max-width: 500px;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(0,0,0,0.2);
                background-color: #fff;
                color: #313a46;
            }
            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }
            input[type="number"] {
                padding: 8px 12px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }
            input[type="submit"] {
                padding: 8px 12px;
                font-size: 16px;
                border-radius: 5px;
                border: none;
                background-color: #188ae2;
                color: #fff;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #0f6dbf;
            }
        </style>
    </head>
    <body>
        <h1>Registration Form</h1>
        <form action="validate.php" method="post">
            <label>Thank you for registering for News Portal. Please enter the 4-digit OTP sent to your email:<span style="color: red;"> *</span></label>
            <input type="hidden" name="email" value="<?php echo $_GET['email']?>">
            <input type="hidden" name="usertype" value="<?php echo $_GET['usertype']?>">
            <input type="number" name="otp" id="">
            <input type="submit" value="Submit" name="submit">
        </form>
        <form action="validate.php" method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
            <input type="hidden" name="usertype" value="<?php echo $_GET['usertype']?>">
            <input type="submit" value="Resend OTP" name="submit">
        </form>
    </body>
</html>
