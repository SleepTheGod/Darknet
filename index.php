<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My Site</h1>
    </header>

    <main>
        <section id="content">
            <h2>Products</h2>
            <div id="products-list">
                <?php
                // Database connection
                $conn = new mysqli("localhost", "username", "password", "database");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products
                $sql = "SELECT * FROM content WHERE AVAILABLE = 'Y'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h3>" . htmlspecialchars($row['PRODUCT']) . "</h3>";
                        echo "<p>" . htmlspecialchars($row['DESCRIPTION']) . "</p>";
                        echo "<p>Price: $" . htmlspecialchars($row['PRICE']) . "</p>";
                        echo "<p>Rating: " . htmlspecialchars($row['RATING_UP'] - $row['RATING_DOWN']) . "</p>";
                        echo "<p>Vendor: " . htmlspecialchars($row['VENDOR']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No products available.";
                }
                $conn->close();
                ?>
            </div>
        </section>

        <section id="orders">
            <h2>Your Orders</h2>
            <div id="orders-list">
                <?php
                // Database connection
                $conn = new mysqli("localhost", "username", "password", "database");

                // Fetch orders
                $sql = "SELECT * FROM orders WHERE USERNAME = 'your_username'"; // Change 'your_username' accordingly
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='order'>";
                        echo "<p>Order ID: " . htmlspecialchars($row['ID']) . "</p>";
                        echo "<p>Price: $" . htmlspecialchars($row['PRICE']) . "</p>";
                        echo "<p>Status: " . htmlspecialchars($row['STATUS']) . "</p>";
                        echo "<p>Shipping Address: " . htmlspecialchars($row['SHIPPING_ADDRESS']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No orders found.";
                }
                $conn->close();
                ?>
            </div>
        </section>

        <section id="users">
            <h2>User Information</h2>
            <div id="users-list">
                <?php
                // Database connection
                $conn = new mysqli("localhost", "username", "password", "database");

                // Fetch users
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='user'>";
                        echo "<p>Username: " . htmlspecialchars($row['USERNAME']) . "</p>";
                        echo "<p>Status: " . htmlspecialchars($row['STATUS']) . "</p>";
                        echo "<p>Address: " . htmlspecialchars($row['ADDRESS']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No users found.";
                }
                $conn->close();
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 My Site</p>
    </footer>
</body>
</html>
