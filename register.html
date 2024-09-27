<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - My Site</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>

    <main>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="pgp">PGP Key:</label>
            <textarea name="pgp" required></textarea>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="USER">User</option>
                <option value="VENDOR">Vendor</option>
                <option value="ADMIN">Admin</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <button type="submit">Register</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new mysqli("localhost", "username", "password", "database");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (USERNAME, PASSWORD, PGP, STATUS, ADDRESS) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $password, $pgp, $status, $address);

            // Set parameters and execute
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
            $pgp = $_POST['pgp'];
            $status = $_POST['status'];
            $address = $_POST['address'];

            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 My Site</p>
    </footer>
</body>
</html>
