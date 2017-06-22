<?php
if (isset($_POST['editId'])) {
    require_once '../includes.php';
    require_once '../database.php';

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    if (empty(test_input($_POST['Password']))) {
        $errorPassword = "Password is required.";
        if (empty(test_input($_POST['confirmPassword']))) {
            $errorConfirmPassword = "Confirm password is required.";
        } else {
            $password = test_input($_POST['Password']);
        }
    }
    if (($_POST['Password'] == $_POST['confirmPassword'])) {
        if (!isset($errorPassword) && !isset($errorConfirmPassword)) {
            require_once '../includes.php';
            require_once '../database.php';;
            $profileObj = new AccountDAO();
            $profilePic = $profileObj->editAccount($db, $profilePic, $email, $password);
            require_once 'account-settings.php';
        } else {
            require_once '../includes.php';
            require_once '../database.php';
            $profileObj = new AccountDAO();
            $account = $profileObj->viewAccount($db, $userName);
            require_once 'account-settings.php';
        }
    }
    }
    ?>
