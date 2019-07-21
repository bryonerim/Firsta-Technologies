<?php
session_start();
include_once('dbcon.php');
$error = false;

if(isset($_POST['btn-login'])){
    $email = trim($_POST['email']);
    $email = htmlspecialchars(strip_tags($email));

    $password = trim($_POST['password']);
    $password = htmlspecialchars(strip_tags($password));

    
    if(empty($email)){
        $error = true;
        $errorEmail = 'Please Enter a valid Email';
    }

if(empty($password)){
    $error = true;
    $errorPassword = 'Please input a password';
}elseif(strlen($password) < 6){
    $error = true;
    $errorPassword = 'Password should be at least 6 characters long';
}

if(!$error){
$sql = "select * from tbl_users where email='$email'";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($count == 1){
    $_SESSION['username'] = $row['username'];
    header('location: home.php');

}else{
    $errorMsg = 'Invalid Password or username';

}
}


}
?>
<html>
    <head>
        <title>
           Firsta Login
        </title>
    </head>
    <body>
       <div class="container">
           <div style="width: 500px; margin: 50px auto;">
            <form method="post" action="<?php echo htmlspecialcharS($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <center><h2>Login</h2></center><hr/>
                
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail))echo $errorEmail; ?></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorPassword))echo $errorPassword; ?></span>
                </div>
                <div form-group>
                    <input type="submit" value="Login" class="form-group" name = "btn-login">

                </div><hr/>
            </form>

           </div>
       </div>
    </body>
</html>