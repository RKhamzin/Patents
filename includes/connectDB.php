<?php
    // Create database connection
    //global $databaseConnection;
    $databaseConnection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //echo $databaseConnection.'</br>';
    if ($databaseConnection->connect_error)
    {
        die("Database selection failed: " . $databaseConnection->connect_error);
    }

    // Create tables if needed.
    //prep_DB_content();

?>