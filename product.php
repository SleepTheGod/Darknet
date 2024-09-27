<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - My Site</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Product Details</h1>
    </header>

    <main>
        <?php
        if (isset($_GET['id'])) {
            $conn = new mysqli("localhost", "username", "password", "database");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $id = intval($_GET['id']);
            $sql = "SELECT * FROM content WHERE ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>" . htmlspecialchars($row['PRODUCT']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['DESCRIPTION']) . "</p>";
                echo "<p>Price: $" . htmlspecialchars($row['PRICE']) . "</p>";
                echo "<p>Rating: " . htmlspecialchars($row['RATING_UP'] - $row['RATING_DOWN']) . "</p>";
                echo "<p>Vendor: " . htmlspecialchars($row['VENDOR']) . "</p>";
                echo "<form action='order.php' method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row['ID']) . "'>";
                echo "<button type='submit'>Order Now</button>";
                echo "</form>";
            } else {
                echo "Product not found.";
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
