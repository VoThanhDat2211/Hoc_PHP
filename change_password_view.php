<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_view.php");
}
require_once("function/change_password_handler.php");

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
        .changepassword {
            height: 60px;
            line-height: 60px;
            text-align: right;
            padding-right: 30px;
            font-style: normal;
            font-size: 20px;
        }

        .changepassword a {
            /* text-decoration: none; */
            color: red;
            margin-left: 8px;
            text-decoration: double;
        }

        .user {
            height: 30px;
            background-color: rgb(230, 231, 251);
        }

        .user p {
            height: 100%;
            font-size: 28px;
            text-align: center;
            font-style: normal;
        }

        .changepassword a:hover {
            color: #CC0000;
            text-decoration: underline;

        }

        .logout:hover {
            cursor: pointer;
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
    <div class="changepassword">
        <p><a href="../function_changepassword/change_password_view.php">MyTodos</a>
            <span> |</span>
            <a href="logout.php" class="logout">Logout</a>
        </p>
    </div>

    <div class="user">
        <p>
            <?php echo "Welcome   " . $_SESSION["username"] ?>
        </p>

    </div>

    <div class="content">
        <form action="" method="post" id="form-changepassword">
            <fieldset>
                <legend>Change Password</legend>
                <table>
                    <div class="row">
                        <tr>
                            <td><label for="oldpassword">Old Password</label></td>
                            <td>
                                <input type="password" name="oldpassword" placeholder="******"
                                    value="<?php echo $oldpassword ?>">
                            </td>
                            <td class="error">
                                <?php
                                echo !empty($errors['oldpassword']['required']) ? $errors['oldpassword']['required'] : '';
                                echo !empty($errors['oldpassword']['matched']) ? $errors['oldpassword']['matched'] : '';
                                ?>
                            </td>
                        </tr>
                    </div>


                    <tr>
                        <td><label for="newpassword">New Password</label></p>
                        </td>
                        <td>
                            <input type="password" name="newpassword" placeholder="*******"
                                value="<?php echo $newpassword ?>">
                        </td>
                        <td class="error">
                            <?php
                            echo !empty($errors['newpassword']['required']) ? $errors['newpassword']['required'] : '';
                            echo !empty($errors['newpassword']['duplicate']) ? $errors['newpassword']['duplicate'] : '';
                            echo !empty($errors['newpassword']['min_length']) ? $errors['newpassword']['min_length'] : '';
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="cfnewpassword">Confirm Password</label></p>
                        </td>
                        <td>
                            <input type="password" name="cfnewpassword" placeholder="*******"
                                value="<?php echo $cfnewpassword ?>">
                        </td>
                        <td class="error">
                            <?php
                            echo !empty($errors['cfnewpassword']['required']) ? $errors['cfnewpassword']['required'] : '';
                            echo !empty($errors['cfnewpassword']['matched']) ? $errors['cfnewpassword']['matched'] : '';
                            ?>
                        </td>
                    </tr>

                    <tr class="btn">
                        <td><input class="reset" type="reset"></td>
                        <td><input class="submit" type="submit" value="Change"></td>
                    </tr>
                </table>
            </fieldset>

        </form>
    </div>
</body>

</html>