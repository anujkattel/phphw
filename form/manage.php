<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        table {
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .edit-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .success, .error {
            width: 100%;
            padding: 10px;
            text-align: center;
            margin: 10px 0;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'anujphp') or die("Connection error");
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $deleteQuery = "DELETE FROM regn WHERE ID = $id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<div class='success'>Record deleted successfully!</div>";
    } else {
        echo "<div class='error'>Failed to delete record!</div>";
    }
}
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    header("Location: edit.php?id=$id");
    exit();
}
?>

<table>
    <tr>
        <th>S.N</th>
        <th>NAME</th>
        <th>Email</th>
        <th>PHONE</th>
        <th>ADDRESS</th>
        <th>CITY</th>
        <th>STATE</th>
        <th>DELETE</th>
        <th>EDIT</th>
    </tr>

    <?php
    // ✅ Fetch and display table data
    $sql = "SELECT * FROM regn";
    $result = mysqli_query($conn, $sql) or die('Query failed');

    if (mysqli_num_rows($result) > 0) {
        $sn = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sn}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['state']}</td>
                    <td><a href='?delete_id={$row['ID']}' class='delete-btn'>Delete</a></td>
                    <td><a href='edit.php?id={$row['ID']}' class='edit-btn'>Edit</a></td>
                  </tr>";
            $sn++;
        }
    } else {
        echo "<tr><td colspan='9'>No records found</td></tr>";
    }

    mysqli_close($conn);
    ?>
</table>

</body>
</html>
