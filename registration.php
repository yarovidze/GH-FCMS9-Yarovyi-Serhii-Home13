<?php
include 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<?php
if (isset($_POST['action'])) {
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $rep_password = $_POST['rep-password'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $age = $_POST['age'];
    $gender = $_POST['Gender'];
    $sql_username = "SELECT * FROM users WHERE Username ='$username'";
    $result_username = $conn->query($sql_username);
    $sql_email = "SELECT * FROM users WHERE Email ='$email'";
    $result_email = $conn->query($sql_email);


    if ($password != $rep_password) {
        echo "Passwords do not match.";
    } elseif ($result_username->num_rows > 0) {
        echo "Username already exist";
    } elseif ($result_email->num_rows > 0) {
        echo "Email already exist";
    } else {
        $password = md5($_POST['password']);
        $sql_insert_data = "INSERT INTO users (Username, Email, Pass, First_name, Last_name, Age, Gender)
VALUES ('$username', '$email', '$password', '$first_name', '$last_name', '$age', '$gender')";

        $result = $conn->query($sql_insert_data);

        if ($result) {
            $success = true;
        }
    }
}

?>
<section class="main-header">
    <h1>Registration</h1>
    <div class="container container-registration">
        <form class=" <?php if ($success) {
            echo 'display-form-none';
        } ?>" action="" method="post">
            <p>Sign up for ALECTO</p>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="text" name="Username" placeholder="Username" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="email" name="Email" placeholder="Email" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="password" name="rep-password" placeholder="Repeat password" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="text" name="first-name" placeholder="First name" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <input type="text" name="last-name" placeholder="Last name" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <input class="custom-input" type="number" name="age" min="8" max="130" placeholder="Age" required>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <label><input class="custom-radio" type="radio" name="Gender" value="2">Man</label>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <label><input class="custom-radio" type="radio" name="Gender" value="1">Woman</label>
                </div>
            </div>
            <input type="hidden" name="action">
            <button type="submit" class="btn-main">Registration</button>
        </form>
        <div class="<?php if ($success) {
            echo 'display-form';
        } else {
            echo 'display-form-none';
        } ?>">
            <h2 class="decoration"><?php echo '<strong>'.$username.'</strong>'?> you successfull registered!</h2>
            <a class="btn-main" href="index.php">Sign in</a>
        </div>
    </div>
</section>
<script src="assets/js/libs.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>



