<?php

$db = mysqli_connect("localhost", "root", "", "login");

$res = array();

if ($db) {
    try {

        if (
            isset($_POST['email']) && isset($_POST['password'])
        ) {
            extract($_POST);

            $sql = "select * from users where email='$email' and password = '$password'";

            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {

                $res['success'] = true;
                $res['message'] = "Login Success";

            } else {

                $res['success'] = false;
                $res['message'] = "Invalid Username / Password";

            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Missing Values';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['message'] = $ex->__toString();
    }
} else {
    $res['success'] = false;
    $res['message'] = "Database Error";
}

echo json_encode($res);