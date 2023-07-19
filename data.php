<html>
    <head><title> Data </title>
    <style>
        table,td,tr,th{
            border: 1px solid black;
            border-collapse:collapse;
            padding: 7px;
            margin: 3px;
            text-align: center;
        }
        </style>
    </head>
    <body>
        <center>
            <h1> Players Data </h1> 
            <br>
        <?php

        // Create a database connection
        $db = new mysqli("localhost", "root", "root", "bgmi");

        // Check if the connection was successful
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Get all the data from the users table
        $sql = "SELECT * FROM data";
        $result = $db->query($sql);

        // If there are any results, loop through them and display them
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Level</th><th>Discord</th><th>Clan Name</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['name'] . "</td><td>" . $row['level'] . "</td><td>" . $row['discord'] . "</td><td>" . $row['clan'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }

        ?>
        </center>
    </body>
