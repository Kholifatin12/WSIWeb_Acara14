<?php
$koneksi = mysqli_connect("localhost", "root", "user");
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if(!empty(trim($email)) && ! empty(trim($pass))){

        $query = "SELECT * FROM level_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($resut);

        while ($row = mysqli_fetch_array($result)){
            $userVal = $row['user_email'];
            $passVal = $row['user_passwoard'];
            $userName = $roe['user_fullname'];
        }

        if ($num != 0) {
            if($userVal==$email && $passVal==$pass){
                header('location: home.php?user_fullname=' . urldecode($userName));
            }else{
                $error = 'user atau passwoard salah !!';
                header('Location: login.php');
            }
        }else{
            $error = 'user tidak ditemukan!!';
            header('Location: login.php');
        }
    }else{
        $error = 'Data tidak boleh kosong!!';
        echo $error;
    }
}
?>
    <html>
    <head>
         <title>Login Page</title>
    </head>
    <body>
       <form action="login.php" method="POST">
        <p>Email: <input type="text" name="txt_email"></p>
        <p>Password: <input type="password" name="txt_pass"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
    <p><a href="register.php">Daftar</a></p>
    </body>
    </html>