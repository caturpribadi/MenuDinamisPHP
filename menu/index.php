<?php
session_start();
//cek apakah sudah ada session belum maka hanya menampilkan 
if(!isset($_SESSION['jenenguser']))
{
    echo " <a href='index.php?cp=home'>Home</a> <a href='login.php'>login</a>";
    echo" <h3> Anda belum login</h3>";
    exit();
}
//jika sudah register tampilkan halaman dibawah
?>

<html>
<head>
	<title>Halaman Dinamis skyshi</title>
</head>
<body>
    <h1>Halaman Dinamis</h1>
    <h4>Selamat Datang <?php   echo $_SESSION['jenenguser']; ?> </h4>
        <div id="menu">
        <a href="home">Home</a> /
        <a href="about">About</a> /
        <a href="contact">Contact</a> /
        <a href="logout">logout</a>
    </div>
    <div >
        <?php ob_start(); 
            $pages_dir = '../menu';
            if (!empty($_GET['cp'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);
                $cp = $_GET['cp'];
                if (in_array($cp. '.php', $pages)) {
                    include($pages_dir.'/'.$cp.'.php');
                } else {
                    echo 'Page not Found !';
                }
            } else {
                include ($pages_dir.'/home.php');
            }
        ob_flush(); ?>
    </div>
    
</body>
</html>

