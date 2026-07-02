<?php

session_start();

require_once "../model/User.php";

$user = new User();

if(isset($_POST['register']))
{
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($user->register($nama,$username,$password))
    {
        header("Location: ../view/login.php");
    }
}

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $data=$user->login($username);

    if($data && password_verify($password,$data['password']))
    {
        $_SESSION['login']=true;
        $_SESSION['nama']=$data['nama'];

        header("Location: ../view/dashboard.php");
    }
    else
    {
        echo "Username atau Password salah";
    }
}