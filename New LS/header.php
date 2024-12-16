<!-- header.php -->
<link rel="stylesheet" href="style.css">
<?php
    if (basename(dirname(__FILE__)) == 'admin') {
        header('Location: adminlog.php');
        exit;
    }
?>
<header>
    <div class="logo">
        <img src="img/Make.jpg" alt="Library Logo">
        <h1>ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
    </div>
</header>
