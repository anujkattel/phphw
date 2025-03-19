<?php
$conn = mysqli_connect('localhost', 'root', '', 'anujphp') or die("Connection failed");
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $sql = "SELECT * FROM regn WHERE ID = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // indicate total rows in the result set
        $row = mysqli_fetch_assoc($result); // fetch the result set
    } else {
        echo "<div class='error'>Record not found!</div>";
        exit();
    }
} else {
    echo "<div class='error'>Invalid ID!</div>";
    exit();
}
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']); // escape special characters in a string
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $updateQuery = "UPDATE regn 
                    SET name='$name', email='$email', phone='$phone', 
                        address='$address', city='$city', state='$state'
                    WHERE ID = $id";

    if (mysqli_query($conn, $updateQuery)) {
        
        header("Location: manage.php");
        exit();
    } else {
        echo "<div class='error'>Failed to update record!</div>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        body{
            font-family: Arial, sans-serif;

        }
        h2{
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
        }
        input {
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>

<a href="manage.php" class="back-btn">Back to List</a>

<h2>Edit Record</h2>

<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?= htmlspecialchars($row['address']) ?>" required>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="<?= htmlspecialchars($row['city']) ?>" required>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" value="<?= htmlspecialchars($row['state']) ?>" required>

    <button type="submit" name="update" class="btn">Update</button>
</form>

</body>
</html>
