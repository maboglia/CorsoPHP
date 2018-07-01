<?php
    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
        echo '<form action="home.php" method="POST" name="Login">
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" required>
                <input type="submit" value="Login">
              </form>';
    }