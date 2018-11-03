<!doctype html>

<html>

<head>
<!--
    exercise_02_08_01
    Author: Nathan Howard
    Date: 10.30.18
    filename: CreateSubscribersTable.php
-->
    <title>Create Subscribers Table</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Create Subscribers Table</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "three-teach-20";
        $DBName = "newsletter2";
        $tableName = "subscribers";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection failed.</p>\n";
        } else {
            if (mysqli_select_db($DBConnect, $DBName)) {
                echo "<p>successfully selected the \"$DBName\" database.</p>\n";
                $sql = "SHOW TABLES LIKE '$tableName'"; //variable to store mySQL commands
                $result = mysqli_query($DBConnect, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "The <strong>$tableName</strong>" . " table does not exist, creating it.<br>\n";
                    $sql = "CREATE TABLE $tableName" . " (subscriberID SMALLINT NOT NULL" . " AUTO_INCREMENT PRIMARY KEY," . " name VARCHAR(80), email VARCHAR(100)," . " subscribeDate DATE, confirmedDate DATE)";
                    $result = mysqli_query($DBConnect, $sql);
                    if (!$result) {
                        echo "<p>Unable to create the table: <strong>\"$tableName\"</strong></p>";
                        echo "<p>Error code: " . mysqli_error($DBConnect) . "</p>";
                    } else {
                        echo "<p>Successfully created the table: \"$tableName\"</p>";
                    }
                } else {
                    echo "The <strong>$tableName</strong>" . " table does exist already.<br>\n";
                }
            } else{
                echo "<p>Could not select the \"$DBName\" database: " . mysqli_error($DBConnect) . ".</p>\n";
            }
            mysqli_close($DBConnect);
        }
    ?>
</body>

</html>
