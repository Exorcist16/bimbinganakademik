<?php
$subscription = json_decode(file_get_contents('php://input'), true);

if (!isset($subscription['endpoint'])) {
    echo 'Error: not a subscription';
    return;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bimbingan_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        // create a new subscription entry in your database (endpoint is unique)
        $sql = "INSERT INTO subscription (username, endpoint, p256dh, auth)
            VALUES ('$subscription[username]', '$subscription[endpoint]', '$subscription[publicKey]', '$subscription[authToken]')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'PUT':
        // update the key and token of subscription corresponding to the endpoint
        $sql = "SELECT * FROM subscription WHERE username='$subscription[username]'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row["username"] == $subscription['username'] && $row["endpoint"] == $subscription['endpoint'] 
            && $row["p256dh"] == $subscription['publicKey'] && $row["auth"] == $subscription['authToken']) {
                echo "No changes on record";
                break;
            };
        $sql_update = "UPDATE subscription SET endpoint = '$subscription[endpoint]', 
            p256dh = '$subscription[publicKey]', auth = '$subscription[authToken]' WHERE username = '$subscription[username]'";
            
        if ($conn->query($sql_update) === TRUE) {
            echo "Record updated";
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
        break;
    default:
        echo "Error: method not handled";
        return;
}
