<?php
if (isset($_POST["submit"])) {
    require("mysql.php");
    $stmt = $dbh->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
    $stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
        // Username is available
        if ($_POST["pw"] == $_POST["pw2"]) {
            // Create user
            $stmt = $dbh->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
            $stmt->bindParam(":user", $_POST["username"]);
            $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
            $stmt->bindParam(":pw", $hash);
            $stmt->execute();
            echo "Your account has been created";
        } else {
            echo "The passwords do not match";
        }
    } else {
        echo "The username is already taken";
    }
}
?>
