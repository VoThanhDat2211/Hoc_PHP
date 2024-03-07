<?php
session_start();
require_once("function/login_handler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Header */



    /* Nav */
    .login {
        height: 60px;
        line-height: 60px;
        text-align: right;
        padding-right: 30px;
        font-style: normal;
        font-size: 20px;
    }

    .login a {
        text-decoration: none;
        color: red;
        margin-left: 8px;
    }

    .login a:hover {
        color: #CC0000;
        text-decoration: underline;
    }

    .content {

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content fieldset {
        border: 3px solid rgb(222, 229, 250);
        text-align: center;
        font-family: monospace;
        font-style: normal;
        line-height: 150%;
        font-size: 20px;
        font-weight: 600;
        margin-top: 28px;
        position: relative;
    }

    .content table {
        font-size: 16px;
        margin: 16px;

    }


    .content td {
        padding: 8px 8px;
        height: 50px;
    }

    .content td label {
        font-weight: 600;
    }

    tr .error {

        color: red;
        font-style: italic;
        font-size: 14px;
        left: 300px;
    }


    .content input {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
    }

    .content input:focus {
        border-bottom: 1px solid rgb(222, 229, 250);
    }

    .content .btn input {
        margin-top: 8px;
        border-radius: 15px;
        height: 30px;
        width: 100px;
        background-color: rgb(204, 230, 255);
    }

    .content .reset,
    .content .submit {
        height: 30px;
        width: 100px;
        border-radius: 25px;
        font-family: monospace;
        font-weight: 600;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <?php include "include/header.php" ?>
    <div class="login">
        <p>Don't have an account <a href="../function_signup/signup_view.php"> Create New Account</a></p>
    </div>
    <div class="content">
        <form action="" method="post" id="form1">
            <fieldset>
                <legend>Sign Up</legend>
                <table>
                    <div class="row">
                        <tr>
                            <td><label for="username">User Name</label></td>
                            <td>
                                <input type="text" name="username" placeholder="Input User Name" id="username"
                                    value="<?php echo $username ?>">
                            </td>
                            <td class="error">
                                <?php
                                echo !empty($errors['username']['required']) ? $errors['username']['required'] : '';
                                echo !empty($errors['username']['matched']) ? $errors['username']['matched'] : '';
                                ?>
                            </td>
                        </tr>
                    </div>


                    <tr>
                        <td><label for="password"> Password</label></p>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="*******" id="password"
                                value="<?php echo $password ?>">
                        </td>
                        <td class="error">
                            <?php
                            echo !empty($errors['password']['required']) ? $errors['password']['required'] : '';
                            echo !empty($errors['password']['matched']) ? $errors['password']['matched'] : '';
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="color:rgb(217,67,66)"><label for="captcha">
                                <?php
                                require_once "function/genCaptcha.php";
                                echo $_SESSION['captchaSs'] ?>
                            </label></td>
                        <td>
                            <input type="text" name="captcha" placeholder="Enter captcha" id="captcha">
                        </td>
                        <td class="error">
                            <?php
                            echo !empty($errors['captcha']['required']) ? $errors['captcha']['required'] : '';
                            echo !empty($errors['captcha']['matched']) ? $errors['captcha']['matched'] : '';
                            ?>
                        </td>
                    </tr>

                    <tr class="btn">
                        <td><input class="reset" type="reset"></td>
                        <td><input class="submit" type="submit"></td>
                    </tr>
                </table>
            </fieldset>

        </form>
    </div>
</body>

</html>