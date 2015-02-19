<?php
    session_destroy();
    $_SESSION['login'] = null;
    $_SESSION['user_id'] = null;
    header("Location: index.php");
?>