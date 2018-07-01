<?php
    $conn_db = new mysqli("localhost", "root", "", "esercitazionephp");
    if($conn_db->connect_error)
        echo "Connection error: ".$conn_db->connect_error;
    function login_user($username, $password){
        $p_md5 = strtoupper(md5($password));
        $query = "select * from studenti where username='".$username."' and psswd='".$p_md5."';";
        $result = mysqli_query($GLOBALS['conn_db'], $query) or die("Query error: ".$GLOBALS['conn_db']->connect_error);

        while($row = mysqli_fetch_array($result))
            if ($row['psswd'] == $p_md5)
                return true;
        return false;
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['logged'] = login_user($username, $password);
    }

    if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true){
        $query = "select * from squadre;";
        $result = mysqli_query($GLOBALS['conn_db'], $query) or die("Query error: ".$GLOBALS['conn_db']->connec_error);
        echo "<table>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>".$row['nome']."</td><td>".$row['voti']."</td></tr>";
        }
        echo"</table>";
    }
    else{
        echo "<p>Not logged-in!</p>";
    }

    $conn_db->close();