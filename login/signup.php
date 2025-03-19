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
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="text" name="email" placeholder="Enter your email" required>
        <input type="text" name="phone" placeholder="Enter your phone" required>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]="POST" && (isset($_POST['submit']))){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        if(($password==$cpassword) || (empty($name)) || (empty($email)) || (empty($phone)) || (empty($password)) || (empty($cpassword))){
            $conn=mysqli_connect('localhost','root','','anujphp') or die('Connection failed');
            $sql="INSERT INTO signup(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
            $result=mysqli_query($conn,$sql) or die('Query failed');
            if($result){
                echo "<script>
                alert('DATA INSERTED SUCESSFULLY');
                </script>";
            }
            mysqli_close($conn);
        }
        else{
            echo "<script>
            alert('Password and Confirm Password are not same');
            </script>";
        }
    }
    ?>
</body>
</html>