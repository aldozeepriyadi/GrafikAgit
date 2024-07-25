<?php
// Database connection settings
$host = '34.101.160.134';
$port = '5432';
$dbname = 'test';
$user = 'campuss';
$password = 'my_password';

// Create a connection string
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get all table names
    $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' AND table_type = 'BASE TABLE'";

    // Execute the query
    $result = $pdo->query($query);

    // Fetch and display table names
    echo "<h1>Tables in the database:</h1><ul>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>" . $row['table_name'] . "</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
