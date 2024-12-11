<?php
    date_default_timezone_set('Asia/Singapore');
    include 'dbh.inc.php';
    include 'comments.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Kundiman Kanto</title>
    <link rel="stylesheet" type="text/css" href="edit-comment.css">


    <!--FONTS USED-->
    <!--LOGO FONT (Qwigley)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Qwigley&display=swap" rel="stylesheet">

    <!--HEADER FONT (Qwitcher Grypen)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&display=swap" rel="stylesheet">

    <!--COMMON FONT (Sono)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@200..800&display=swap" rel="stylesheet">

</head>
<body>
    </header>
  
<?php

$cid = $_POST['cid'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$message = $_POST['message'];

    echo "<form method='POST' action='".editComments($conn)."'>
        <div class='comments-input'> 
             <div class='input-container'>
                <input type='hidden' name='cid' value='".$cid."'> 
                <input type='hidden' name='uid' value='".$uid."'>
                <input type='hidden' name='date' value='".$date."'> 
                <textarea name='message'>".$message."</textarea><br> 
                <button type='submit' name='commentSubmit'>Edit</button>
            </div>
        </div>
    </form>";

?>

</body>
</html>