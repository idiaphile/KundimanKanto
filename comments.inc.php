<?php
include 'dbh.inc.php';

function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {

  
        $uid = trim($_POST['uid'] ?? '');
        $date = $_POST['date'] ?? '';
        $message = trim($_POST['message'] ?? '');
        $spotify_url = trim($_POST['spotify_url'] ?? ''); 

        if (empty($uid) || empty($message)) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showTooltip('All fields are required...! Please fill out both Name and Message fields.');
                });
            </script>";
            return; 
        }

        if (!empty($spotify_url) && !filter_var($spotify_url, FILTER_VALIDATE_URL)) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showTooltip('Invalid Spotify URL!');
                });
            </script>";
            return;
        }

        $sql = "INSERT INTO comments (uid, date, message, spotify_url) VALUES ('$uid', '$date', '$message', '$spotify_url')";

        if ($conn->query($sql) === TRUE) {
            header("Location: KundimanKanto.php"); 
            exit();
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showTooltip('Error: Could not submit your comment. Please try again.');
                });
            </script>";
        }
    }
}

function getComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'><p>";
        echo "<strong>" . $row['uid'] . "</strong><br>";
        echo "<em>" . $row['date'] . "</em><br>";


    echo !empty($row['message']) ? $row['message'] : "<i>No message provided.</i><br>";

    if (!empty($row['spotify_url']) && preg_match("/^https:\/\/open.spotify.com\/.*$/", $row['spotify_url'])) {
        $spotify_url = $row['spotify_url'];
        $track_id = basename($spotify_url); 

        echo "<div class='spotify-link-container'>
                <a href='https://open.spotify.com/track/$track_id' target='_blank'>
                    <img src='play-song.png' alt='Play on Spotify 🌹' class='spotify-img'>
                </a>
              </div><br>";
    }

    echo "</p>";

        echo "
            <form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                <input type='hidden' name='cid' value='" . $row['cid'] . "'>
                <button type='submit' name='commentDelete'>Delete</button>
            </form>
            <form class='edit-form' method='POST' action='editcomment.php'>
                <input type='hidden' name='cid' value='" . $row['cid'] . "'>
                <input type='hidden' name='uid' value='" . $row['uid'] . "'>
                <input type='hidden' name='date' value='" . $row['date'] . "'>
                <input type='hidden' name='message' value='" . $row['message'] . "'>
                <button type='submit'>Edit</button>
            </form>
        </div>";
    }
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        
        if (isset($_POST['message']) && !empty($_POST['message'])) {
            $cid = $_POST['cid'];
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $message = $_POST['message'];

            $date = date("Y-m-d H:i:s");

            $sql = "UPDATE comments SET message='$message', date='$date' WHERE cid='$cid'";
            $result = $conn->query($sql);
            header("Location: KundimanKanto.php"); 
        } 
    }
}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
            $cid = $_POST['cid'];
               
            $sql = "DELETE FROM comments WHERE cid='$cid'";
            $result = $conn->query($sql);
            header("Location: KundimanKanto.php"); 
    } 
} 
