<?php
// Connect to the database
try {
    $db = new PDO('sqlite:movies.db');
} catch (PDOException $e) {
    echo '<p>Error connecting to database: ' . $e->getMessage() . '</p>';
    exit;
}

// Retrieve input from the user
if (isset($_GET['input'])) {
    $input = $_GET['input'];
} else {
    echo '<p>No input received.</p>';
    exit;
}



// Check if input is a number (ID)
if (is_numeric($input)) {
    // Prepare SQL statement
    $stmt = $db->prepare('SELECT * FROM people WHERE id = :id');
    $stmt->bindParam(':id', $input, PDO::PARAM_INT);
} else { // Assume input is a name
    // Prepare SQL statement
    $stmt = $db->prepare('SELECT * FROM people WHERE name LIKE :name');
    $stmt->bindParam(':name', $input, PDO::PARAM_STR);
}

// Execute SQL statement and retrieve results
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p>Error executing SQL statement: ' . $e->getMessage() . '</p>';
    exit;
}

// Check number of results
$num_results = count($results);
if ($num_results == 0) { // No results found
    echo '<p>No matches found.</p>';
    exit;
} elseif ($num_results == 1) { // One result found
    foreach ($results as $result) {
        echo '<h2>' . $result['name'] . '</h2>';
        echo '<p>ID: ' . $result['id'] . '</p>';
        echo '<p>Birth Year: ' . $result['birth'] . '</p>';
    }
} else { // Multiple results found
    echo '<p>Multiple matches found:</p>';
    echo '<ul>';
    foreach ($results as $result) {
        echo '<li>ID: ' . $result['id'] . ', Name: ' . $result['name'] . ', Birth Year: ' . $result['birth'] . '</li>';
    }
    echo '</ul>';
    exit;
}
?>
