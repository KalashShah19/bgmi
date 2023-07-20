<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: sans-serif;
      background-color: black;
    }

    .container {
      width: 500px;
      margin: 0 auto;
      background-color: white;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .registerbtn {
      float: right;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Registration Page</h1>
    <form method="post">
      <input type="text" name="id" placeholder="ID">
      <input type="text" name="name" placeholder="Name">
      <input type="text" name="clan" placeholder="Clan Name">
      <input type="text" name="discord" placeholder="Discord">
      <input type="submit" name="submit" value="Enter">
    </form>
  </div>

  <?php

    // Create a database connection
    include 'conn.php';

    // Check if the connection was successful
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // If the form is submitted, insert the data into the database
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $clan = $_POST['clan'];
        $discord = $_POST['discord'];

        $sql = "INSERT INTO data (id, name, clan, discord) VALUES ('$id', '$name', '$clan', '$discord')";

        // Execute the query
        $result = $db->query($sql);

        // Check if the query was successful
        if ($result) {
            echo "<p style='color:white'> Registration successful! </p>";
        } else {
            echo "<p style='color:white'> Registration failed: " . $db->error;
        }
    }

?>
</body>
</html>

