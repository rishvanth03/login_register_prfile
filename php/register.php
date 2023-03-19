<?php

$db = mysqli_connect("localhost", "root", "", "login");

$res = array();

if ($db) {
    try {

        if (
           isset($_POST['email']) && isset($_POST['password'])
        ) {
            extract($_POST);

            $sql = "insert into users (email,password) values('$email','$password')";

            $result = mysqli_query($db, $sql);

            if (!mysqli_error($db)) {

                $res['success'] = true;
                $res['message'] = "Registration Success";

            } else {

                $res['success'] = false;
                $res['message'] = mysqli_errno($db);

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