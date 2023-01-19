<?php
if (isset($_POST['loginbutton'])) {
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);

    if (empty($username)) { array_push($errors, "Username required"); }
    if (empty($password)) { array_push($errors, "Password required"); }
    if (empty($errors)) {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $reg_user_id = mysqli_fetch_assoc($result)['id'];

            $_SESSION['user'] = getUserById($reg_user_id);

            $_SESSION['message'] = "You are now logged in";
            // redirect to public area
            header('location: /home');
            exit(0);
        } else {
            array_push($errors, 'Username and password do not match');
        }
    }
}
function esc(String $value)
{
    global $conn;

    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
}
