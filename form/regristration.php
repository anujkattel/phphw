<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
        }

        input {
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="text" name="phone" placeholder="Enter your phone">
        <input type="text" name="address" placeholder="Enter your address">
        <input type="text" name="city" placeholder="Enter your city">
        <input type="text" name="state" placeholder="Enter your state">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state)) {
            echo "<script>
            alert('all field are required');
            </script>";
        } else {
            $conn = mysqli_connect('localhost', 'root', '', 'anujphp') or die('Connection failed');
            $sql = "INSERT INTO regn(name, email, phone, address, city, state) VALUES ('$name', '$email', '$phone', '$address', '$city', '$state')";
            $result = mysqli_query($conn, $sql) or die('Query failed');
            if ($result) {
                echo "<script>
            alert('DATA INSERTED SUCESSFULLY);
            </script>";
            }
            mysqli_close($conn);
        }
    }
    ?>
</body>

</html>