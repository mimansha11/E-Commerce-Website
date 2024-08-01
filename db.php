<?php
require_once 'connection.php';

// Insert data from client during login
@$email = $_POST['email'];
@$password = $_POST['password'];

if (isset($_POST["Login"])) {
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM sign_up WHERE email=? AND pd=?";
    $stmt = $conn->prepare($sql);

    // Check for errors in the preparation of the SQL statement
    if (!$stmt) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Check if there are rows returned
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $phnum, $email, $pd, $rol,$addr);

        // Fetch the user data
        $stmt->fetch();

        // Start the session
        session_start();

        // Store user information in the session
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_rol'] = $rol;

        // Redirect to the admin dashboard or home page based on role
        if ($rol == 'admin') {
            header("Location: admin/admin_dash.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid email or password. Please register first.";
    }

    // Close the statement
    $stmt->close();
}

// Insert data from client during registration
@$name = $_POST["name"];
@$mob_number = $_POST["num"];
@$remail = $_POST['em'];
@$rpassword = $_POST['rpassword'];
@$conpass = $_POST['conpass'];
@$addr = $_POST['addr'];

if (isset($_POST["Register"])) {
    if ($conpass == $rpassword) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO sign_up (ne, phnum, email, pd,addr) VALUES (?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters to the placeholders
        $stmt->bind_param("sssss", $name, $mob_number, $remail, $rpassword,$addr);

        // Execute the statement
        if ($stmt->execute()) {
            echo "You are registered";
        } else {
            echo "Registration failed: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Passwords do not match";
    }
}
?>
