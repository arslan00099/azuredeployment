<?php
include 'server_connect.php';

$error = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Handle Sign Up
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // 'CREATER' or 'USER'

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL for inserting user
    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([$name, $email, $hashedPassword, $role]);
        $successMessage = "Sign up successful. Please <a href='login.php'>login</a>.";
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="form-container">
        <!-- Success or Error Message -->
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($successMessage)): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <!-- Sign Up Form -->
        <h2>Sign Up</h2>
        <form method="POST" action="signup.php">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Role</label>
            <select name="role" required>
                <option value="CREATER">Creater</option>
                <option value="USER">User</option>
            </select>

            <button type="submit" name="signup">Sign Up</button>
        </form>

        <!-- Link to Login Page -->
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

</body>

</html>