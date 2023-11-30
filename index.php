<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
<?php
session_start();
require("mysql.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pw"];

    $stmt = $dbh->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
    $stmt->execute(['user' => $username]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if (password_verify($password, $row["PASSWORD"])) {
            $_SESSION["username"] = $row["USERNAME"];
            header("Location: geheim.php");
            exit();
        } else {
            echo "Der Login ist fehlgeschlagen";
        }
    } else {
        echo "Der Login ist fehlgeschlagen";
    }
}
?><?php
session_start();
require("mysql.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pw"];

    $stmt = $dbh->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
    $stmt->execute(['user' => $username]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if (password_verify($password, $row["PASSWORD"])) {
            $_SESSION["username"] = $row["USERNAME"];
            header("Location: geheim.php");
            exit();
        } else {
            echo "Der Login ist fehlgeschlagen";
        }
    } else {
        echo "Der Login ist fehlgeschlagen";
    }
}
?>
<h1>Anmelden</h1>
<form action="index.php" method="post">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="pw" placeholder="Passwort" required><br>
  <button type="submit" name="submit">Einloggen</button>
</form>
<br>
<a href="register.php">Noch keinen Account?</a>
</body>
</html>
