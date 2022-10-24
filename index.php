<?php
    define("DB_SERVERNAME", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "root");
    define("DB_NAME", "university");

    // Connessione
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD,DB_NAME);

    // Check sulla connessione
    if ($conn && $conn->connect_error) {
        echo 'Connessione non riuscita: '.$conn->connect_error;
        die();
    }
    
    echo '<div class="connection-check">'. 'Connessione al DB riuscita' .'</div>';

    # Seleziono tutti i corsi che valgono più di 10 CFU

    $sql = "SELECT name, period, cfu FROM courses WHERE cfu > 10";
    $result = $conn->query($sql);
    
    if($result && $result->num_rows > 0) {
        $row_counter = $result->num_rows;
        echo '<div class="row-counter">'. 'Risultati: ' . $row_counter. '</div>';
        
        while($row = $result->fetch_assoc()) {
            echo '<div class="course">'."Nome Corso: ". $row['name'].'<br>'.
            "Periodo del Corso: ". $row['period'].'<br>'.
            "CFU: ". $row['cfu'].'<br>'. '</div>';
        } 
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB | University</title>
    <link rel="stylesheet" href="style/my_style.css">
</head>
<body>
    
</body>
</html>
    