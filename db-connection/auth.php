<?php      
    include('connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    // MYSQLi Injection Protection
    // Username
    $username = stripcslashes($username);
    $username = mysqli_real_escape_string($conn, $username);
    // Password
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($conn, $password);
    // Mail
    //$mail = stripcslashes($mail);
    //$mail = mysqli_real_escape_string($conn, $mail);
  
    $sql = " SELECT * FROM customers WHERE customerName = '$username' AND customerPassword = '$password'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result)) {
        printf("(%s) \n", $row['customerName']); // Print a single column data
    }

    if ( false===$result ) {
      printf("error: %s\n", mysqli_error($conn));
    }
    else {
      printf("\n SUCCESS: %s %s\n", $sql, $count);
    }


    if($count == 1){
        session_start();
        $_SESSION['username'] = $username;
        echo "<h1><center> Login successful </center></h1>";
        header("location: ../shop.php");
        exit;

    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }

?> 