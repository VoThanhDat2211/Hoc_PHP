<?php
$oldpassword = "";
$newpassword = "";
$cfnewpassword = "";
// validate dữ liệu
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $cfnewpassword = $_POST["cfnewpassword"];
    if (empty($oldpassword)) {
        $errors["oldpassword"]["required"] = "Old Password không được để trống !";
    }

    if (empty($newpassword)) {
        $errors["newpassword"]["required"] = "New password không được để trống !";
    } else {
        if (strlen($newpassword) < 6) {
            $errors["newpassword"]["min_length"] = "Password ít nhất 6 ký tự !";
        }
    }

    if (empty($cfnewpassword)) {
        $errors["cfnewpassword"]["required"] = "Bạn phải xác nhận mật khẩu !";
    } else {
        if ($cfnewpassword !== $newpassword) { {
                $errors["cfnewpassword"]["matched"] = "Mật khẩu không trùng khớp !";
            }
        }
    }

    // connection db
    if (empty($errors) && !empty($oldpassword)) {
        require_once "database/connectDB.php";
        // lay du lieu tu db 
        $sql = "SELECT * FROM user WHERE username = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            $rows = $result->fetch_assoc();
            $hashPasswordCheck = password_verify($oldpassword, $rows['password']);
            if ($hashPasswordCheck === true) {
                if ($newpassword == $oldpassword) {
                    $errors['newpassword']['duplicate'] = 'Trùng mật khẩu cũ !';
                } else {
                    // update mat khau 
                    $password = password_hash($newpassword, PASSWORD_DEFAULT);
                    $username = $_SESSION["username"];
                    $sql = "UPDATE user SET password = '$password' WHERE username = '$username' ";
                    if ($conn->query($sql)) {
                        header("Location: todo.php");
                    } else {
                        echo "abc";
                    }
                }
            } else {
                $errors["oldpassword"]["matched"] = "Old password Không chính xác !";
            }
        } else {
            echo "<script>alert('Người dùng không tồn tại')</script>";
        }
    }
}
?>