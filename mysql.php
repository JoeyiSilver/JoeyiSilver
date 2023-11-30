<?php
ini_set('display_errors', 1);

$servername = "db-mysql-fra1-44104-do-user-15108968-0.c.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_2Vp9yj6KmNnnAWE3STE";
$dbname = "defaultdb";
$port = "25060";

$options = array(
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

$dsn = 'mysql:host=' . $servername . ';port=' . $port . ';dbname=' . $dbname;

try {
    $dbh = new PDO($dsn, $username, $password, $options);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST["submit"])) {
    // Use $dbh consistently for database connection
    $stmt = $dbh->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
    $stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        $row = $stmt->fetch();
        if (password_verify($_POST["pw"], $row["PASSWORD"])) {
            session_start();
            $_SESSION["username"] = $row["USERNAME"];
            header("Location: geheim.php");
            exit; // Don't forget to exit after header redirection
        } else {
            echo "Der Login ist fehlgeschlagen";
        }
    } else {
        echo "Der Login ist fehlgeschlagen";
    }
}
?>
