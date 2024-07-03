<?php 
include "conection.php";
$sql = "SELECT * FROM recent_activity ORDER BY timestamp DESC LIMIT 5";
$result = Database::search("SELECT * FROM recent_activity ORDER BY timestamp DESC LIMIT 5");


// Process the fetched data
$activityData = array();
while ($row = $result->fetch_assoc()) {
    $activityData[] = array(
        "time" => time_elapsed_string($row["timestamp"]),
        "content" => $row["activity_text"]
    );
}

// Output the processed data as JSON
header('Content-Type: application/json');
echo json_encode($activityData);

// Close the database connection
$mysqli->close();

// Function to convert timestamp to relative time (e.g., "2 hours ago")
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->d = floor($diff->d);
    $diff->h = floor($diff->d / 24);
    $diff->i = floor($diff->h / 24);
    

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . ($diff->$k > 1 ? $v . 's' : $v);
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>