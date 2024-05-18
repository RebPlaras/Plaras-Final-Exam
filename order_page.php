<!DOCTYPE html>
<html>
<head>
    <title>PHP ordering system</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: left;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #7393B3;
            color: white;
            padding: 20px 0;
            margin: 0 0 20px 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Reb's GPU Shop</h1>
    <ul>
        <li>NVIDIA GeForce RTX 4090 - PHP 100,000.00</li>
        <li>NVIDIA GeForce RTX 3090 - PHP 60,000.00</li>
        <li>AMD Radeon RX 6800 - PHP 25,000.00</li>
        <li>NVIDIA GeForce RTX 3060 - PHP 16,000</li>
    </ul>
    <form method="post" action="order.php">
        <label for="gpu">Choose a GPU:</label>
        <select id="gpu" name="gpu">
            <option value="RTX 4090">NVIDIA GeForce RTX 4090 </option>
            <option value="RTX 3090">NVIDIA GeForce RTX 3090 </option>
            <option value="RX 6800">AMD Radeon RX 6800 </option>
            <option value="RTX 3060">NVIDIA GeForce RTX 3060 </option>
        </select><br><br>
        <label for="quantity">Enter quantity:</label>
        <input type="text" id="quantity" name="quantity"><br><br>
        <label for="payment">Enter payment amount:</label>
        <input type="text" id="payment" name="payment"><br><br>
        <input type="submit" name="submit" value="Place Order">
    </form>
</body>
</html>
