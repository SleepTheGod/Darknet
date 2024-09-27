<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - My Site</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Place Order</h1>
    </header>

    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
            $conn = new mysqli("localhost", "username", "password", "database");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $product_id = intval($_POST['product_id']);
            $sql = "SELECT * FROM content WHERE ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>Order for " . htmlspecialchars($row['PRODUCT']) . "</h2>";
                echo "<p>Price: $" . htmlspecialchars($row['PRICE']) . "</p>";
                echo "<form action='order.php' method='POST'>";
                echo "<label for='shipping_address'>Shipping Address:</label>";
                echo "<textarea name='shipping_address' required></textarea>";
                echo "<input type='hidden' name='price' value='" . htmlspecialchars($row['PRICE']) . "'>";
                echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row['ID']) . "'>";
                echo "<input type='hidden' name='vendor' value='" . htmlspecialchars($row['VENDOR']) . "'>";
                echo "<button type='submit'>Confirm Order</button>";
                echo "</form>";
            } else {
                echo "Product not found.";
            }

            $stmt->close();
            $conn->close();
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['shipping_address'])) {
            $conn = new mysqli("localhost", "username", "password", "database");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert order
            $stmt = $conn->prepare("INSERT INTO orders (PRICE, SHIPPING_ADDRESS, STATUS, RECEIVE_ADDRESS, USERNAME, VENDOR) VALUES (?, ?, 'UNPAID', ?, ?, ?)");
            $stmt->bind_param("dssss", $price, $shipping_address, $receive_address, $username, $vendor);

            // Set parameters and execute
            $price = $_POST['price'];
            $shipping_address = $_POST['shipping_address'];
            $receive_address = "Your Receive Address Here"; // Modify as needed
            $username = "User"; // Replace with actual username
            $vendor = $_POST['vendor'];

            if ($stmt->execute()) {
                echo "Order placed successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "No product specified.";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 My Site</p>
    </footer>
</body>
</html>
