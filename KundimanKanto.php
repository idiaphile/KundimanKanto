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
    <link rel="stylesheet" type="text/css" href="KundimanKanto.css">
    <link rel="icon" href="logo-favicon.png" type="image">

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
        <div>
        <?php 
        include 'navbar.php';
    
        ?>
        </div>
    </header>

        <h1>Kundiman Kanto</h1>

        <div class="comments-body">
            <div class="comments-feed">
                <p>🎶 Mabuhay! Welcome to Kundiman Kanto! 🎤<br><br>
                    
                    Step into our virtual tambayan where every emotion is celebrated! Whether you’re feeling in love, dealing with 
                    a tricky situation(ship), or just need someone to vibe with your latest hugot, this is the perfect place to share your stories! <br><br>

                    💌 Post your current feels, dedicate a kundiman to someone special, o makikiramay at makikisama with fellow users. 🎵</p>
            </div>
        </div>
<?php
    echo "<form method='POST' action='".setComments($conn)."'>
    
        <div class='comments-input'> 
             <div class='input-container'>
                <input type='text' name='uid' placeholder='Enter your name ✍️'>
                <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
                <textarea name='message' placeholder='🗯️ Enter comment here!'></textarea>
                <input type='url' id='spotifyUrl' name='spotify_url' placeholder='Song URL (optional)' class='song-input'>
                <button type='submit' name='commentSubmit'>Submit</button>
            </div>
        </div>
            </form>";

    getComments($conn)
?>
<script src="KundimanKanto-main.js"></script>
</body>
</html>