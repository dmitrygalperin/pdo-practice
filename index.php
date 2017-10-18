<?php
echo '<h3>PDO Practice</h3>';

$username = 'MY_USERNAME';
$password = 'MY_PASSWORD';

$dsn = 'mysql:host=sql.njit.edu;dbname=dg94';

try {
    $db = new PDO($dsn, $username, $password);
    echo 'Connected to database';
} catch (PDOException $e) {
    echo "Connection failed: $e->getMessage()";
}
echo "<br>";

$query = 'SELECT * FROM accounts WHERE id < 6';
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();

echo 'Results: ' . count($users);

echo '<table border="1">';
echo '<tr><td>User ID</td><td>Email</td></tr>';
foreach($users as $user) {
    echo '<tr><td>';
    echo $user['id'];
    echo '</td><td>';
        echo $user['email'];
    echo '</td>';
    foreach($user as $attr) {
        //echo '<td>';
        //echo $attr;
        //echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';


?>
