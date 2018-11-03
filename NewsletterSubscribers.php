<!doctype html>

<html>

<head>
<!--
    exercise_02_08_01
    Author: Nathan Howard
    Date: 10.30.18
    filename: NewsletterSubscribers.php
-->
    <title>Newsletter Subscribers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Newsletter Subscribers</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "three-teach-20";
        $DBName = "newsletter2";
        $tableName = "subscribers";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection error: " . mysqli_connect_error() . ".</p>\n";
        } else {
            if (mysqli_select_db($DBConnect, $DBName)) {
                echo "<p>successfully selected the \"$DBName\" database.</p>\n";
//                sql code to retrive all(*) from the subscribers table
                $sql = "SELECT * FROM $tableName";
//                get the result from a query
                $result = mysqli_query($DBConnect, $sql);
//                display all data from tables in database to an HTML table
                echo "<p>Number of rows in" . " <strong>$tableName</strong>: " . mysqli_num_rows($result) . "</p>\n";
                echo "<table width='100%' border='1'>";
                echo "<tr>";
                echo "<th>Subscriber ID</th>";
                echo "<th>Name</th>";
                echo "<th>E-mail</th>";
                echo "<th>Subscribe Date</th>";
                echo "<th>Confirm Date</th>";
                echo "</tr>\n";
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td>{$row[0]}</td>";
                    echo "<td>{$row[1]}</td>";
                    echo "<td>{$row[2]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[4]}</td>";
                    echo "</tr>";
                }
                echo "</table>\n";
                mysqli_free_result($result);
            } else {
                echo "<p>Could not select the \"$DBName\" database: " . mysqli_error($DBConnect) . ".</p>\n";
            }
            mysqli_close($DBConnect);
        }
    ?>
</body>

</html>
