<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" id="username" placeholder="Enter email or phone number">
        <input type="password" name="password" id="password" placeholder="enter your password">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]="POST" && isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username) || empty($password)){
            echo "<script>
            alert('All field are required');
            </script>";
        }
        else{
            $conn=mysqli_connect('localhost','root','','anujphp') or die('Connection failed');
            $sql="SELECT * FROM signup WHERE email='$username' OR phone='$username'";
            $result=mysqli_query($conn,$sql) or die('Query failed');
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['password']==$password){
                        echo "<script>
                        alert('Login Sucessfully');
                        </script>";
                    }
                    else{
                        echo "<script>
                        alert('Password is incorrect');
                        </script>";
                    }
                }
            }
            else{
                echo "<script>
                alert('Username is incorrect');
                </script>";
            }
            mysqli_close($conn);
        }
    }
    ?>
</body>
</html>