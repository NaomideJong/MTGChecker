<?php
$username = "";
$errors = array();

if (isset($_POST['reg_user'])) {
    $username = esc($_POST['username']);
    $password_1 = esc($_POST['password_1']);
    $password_2 = esc($_POST['password_2']);

    if (empty($username)) {  array_push($errors, "Please fill out your username"); }
    if (empty($password_1)) { array_push($errors, "Please fill out your password"); }
    if ($password_1 != $password_2) { array_push($errors, "Passwords do not match");}


    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";

    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO users (username, password, created_at, updated_at) 
					  VALUES('$username', '$password', now(), now())";
        mysqli_query($conn, $query);
        $reg_user_id = mysqli_insert_id($conn);
        $_SESSION['user'] = getUserById($reg_user_id);
        $_SESSION['message'] = "You are now logged in";
        header('location: /home');
        exit(0);
    }
}
function esc(String $value)
{
    global $conn;

    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
}
function getUserById($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // returns user in an array format:
    // ['id'=>1 'username' => 'Awa', 'password'=> 'mypass']
    return $user;
}
?>