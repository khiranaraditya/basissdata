<?php

include("koneksi.php");
session_start();
echo "<h1>LOGIN</h1>";

//Mendapatkan Data
$username = $_POST['username'];
$password = $_POST['password'];

//Cari Data Berdasarkan Username
$query = mysqli_query($koneksi, "select * from tbuser where username ='$username'");

$jumlah_data = mysqli_num_rows($query);

//kalau datanya ada
if($jumlah_data > 0){
    //kalau password yang ada di table sama dengan password yang diinput
    $data = mysqli_fetch_array( $query);
    
    // if($data['password'] == $password){
     //bisa LOGIN
     if(password_verify($password, $data['password'])){
    session_start();
    $_SESSION['id'] =$data['id'];
    $_SESSION['username'] =$data['username'];
    $_SESSION['password'] =$data['password'];
    $_SESSION['role'] =$data['role'];
 
    
    if($_SESSION['role'] != "admin"){
         header("location:halaman_admin/loginadmin.php");
    }else{header("location:index.php");}
    

    
    


    //header("Location: index.php");
}else{
    header("Location: login.php?error=username atau password salah");
    //echo "username / password salah";
}
}else{
    //kalau datanya tidak ada
    header("Location: login.php");
    

}
?>
