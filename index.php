
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<?php
include 'connect_db.php';
if (isset($_POST['action'])) {
    $username = $_POST['Username'];
    $password = md5($_POST['Password']);

    $sql = "SELECT * FROM users WHERE Username ='$username' and Pass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $success = true ;
    } else {
        echo 'Incorrect login or password ';
    }
}
    ?>
<section class="main-header">
    <div class="container">
        <h1>Welcam to ALECTO</h1>
        <div class="container-form">
            <form class="<?php if ($success) {
                echo 'display-form-none';
            } ?>" action="index.php" method="post">
                <h2 class="decoration">Login form</h2>
                <input type="text" name="Username" placeholder="Username" required>
                <input type="password" name="Password" placeholder="Password" required>
                <input type="hidden" name="action">
                <button type="submit" class="btn-main">Login</button>
                <p>First time on site?</p>
                <a class="btn-main" href="registration.php">Sign up</a>
            </form>
            <div class="<?php if ($success) { echo 'display-form';} else {echo 'display-form-none';} ?>">
                <h2 class="decoration">Hello <?php echo '<strong>'.$username.'</strong>'?> </h2>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/libs.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>