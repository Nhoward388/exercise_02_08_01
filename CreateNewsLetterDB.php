<!doctype html>

<html>

<head>
<!--
    exercise_02_08_01
    Author: Nathan Howard
    Date: 10.30.18
    filename: CreateNewsLetterDB.php
-->
    <title>Create News Letter Database</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Create News Letter Database</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "three-teach-20";
        $DBName = "newsletter2";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection failed.</p>\n";
        } else {
            $sql = "CREATE DATABASE $DBName"; //embed SQL commands into string
            if (mysqli_query($DBConnect, $sql)) {
                echo "<p>successfully created the \"$DBName\" database</p>\n";
            } else{
                echo "<p>Could not create the \"$DBName\" database: " . mysqli_error($DBConnect) . "</p>\n";
            }
            mysqli_close($DBConnect);
        }
    ?>
</body>

</html>
