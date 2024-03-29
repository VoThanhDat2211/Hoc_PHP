<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_view.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Header */



    /* Nav */
    .nav-todo {
        height: 60px;
        line-height: 60px;
        text-align: right;
        padding-right: 30px;
        font-style: normal;
        font-size: 20px;
    }

    .nav-todo a {
        text-decoration: none;
        color: red;
        margin-left: 8px;
    }

    .nav-todo a:hover {
        color: #CC0000;
        text-decoration: underline;

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

    .task-content {
        margin-top: 38px;
        font-size: 28px;
        font-style: normal;
    }

    .add-title {
        display: flex;
        border-bottom: 1px solid rgb(220, 220, 220);

    }

    .title,
    .add {
        flex-grow: 1;
        margin-bottom: 40px;
        margin-left: 205px;

    }

    input[type="submit"] {
        font-size: 18px;
        border-radius: 20px;
        background-color: rgb(204, 230, 255);
        border: 0;
        padding: 4px 26px;
        font-weight: 600
    }

    input[type="submit"]:hover {
        background-color: rgb(220, 220, 220);
        cursor: pointer;
    }

    .btn {
        margin-left: 205px;
        margin-top: 12px;
    }

    .list-task {
        padding-left: 18px;
        margin-top: 20px;
    }

    .task-item {
        margin: 8px 0;
        font-size: 24px;
        font-family: monospace;
    }

    .task-item input {
        margin-right: 6px;
    }
</style>

<body>
    <?php include "include/header.php" ?>
    <div class="nav-todo">
        <p>
            <a href="logout.php" class="logout">Logout</a> <span> | </span>
            <a href="change_password_view.php">Change Password</a> <span> | </span>
            <a href="function/deleteaccount_handler.php">Delete Account</a>
        </p>
    </div>

    <div class="user">
        <p>
            <?php echo "Welcome   " . $_SESSION["username"] ?>
        </p>
    </div>

    <div class="task-content">
        <div class="add-title">
            <div class="title">
                <p style="color:rgb(148,148,148)">Title</p>
                <div class="list-task">
                    <?php
                    require_once("function/list_task_handler.php");
                    foreach ($titles as $title) {
                        if ($title["completed"] == "0") {
                            echo " <div class='task-item'><input type='checkbox'> <label>" . $title["title"] . "</label></div>";
                        } else {
                            echo " <div class='task-item'><input type='checkbox' checked> <label>" . $title["title"] . "</label></div>";
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="add">
                <input type="submit" class="addBtn" value="Add">
            </div>
        </div>
        <div class="btn">
            <input type="submit" class="deleteBtn" value="Delete">
            <input type="submit" class="saveBtn" value="Save">
        </div>
    </div>
</body>

</html>