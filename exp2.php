<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <script>
        function validateForm() {
            var units = document.forms["billForm"]["units"].value;
            var fromDate = document.forms["billForm"]["fromDate"].value;
            var toDate = document.forms["billForm"]["toDate"].value;
            var name = document.forms["billForm"]["consumerName"].value.trim();

            if (name === "") {
                alert("Please enter the consumer name.");
                return false;
            }

            if (fromDate === "" || toDate === "") {
                alert("Please select both From and To dates.");
                return false;
            }

            if (new Date(fromDate) > new Date(toDate)) {
                alert("From date cannot be later than To date.");
                return false;
            }

            if (units === "" || isNaN(units) || units < 0) {
                alert("Please enter a valid positive number for units.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Electricity Bill Calculator</h2>
    <form name="billForm" method="post" onsubmit="return validateForm()">
        <label for="consumerName">Consumer Name:</label>
        <input type="text" name="consumerName" id="consumerName" required><br>

        <label for="fromDate">From Date:</label>
        <input type="date" name="fromDate" id="fromDate" required><br>

        <label for="toDate">To Date:</label>
        <input type="date" name="toDate" id="toDate" required><br>

        <label for="units">Enter units consumed:</label>
        <input type="text" name="units" id="units" required><br>

        <input type="submit" value="Calculate Bill">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $consumerName = htmlspecialchars($_POST['consumerName']);
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $units = floatval($_POST['units']);

        $rate1 = 5;
        $rate2 = 7;
        $rate3 = 10;

        $bill = 0;

        if ($units <= 100) {
            $bill = $units * $rate1;
        } elseif ($units <= 300) {
            $bill = (100 * $rate1) + (($units - 100) * $rate2);
        } else {
            $bill = (100 * $rate1) + (200 * $rate2) + (($units - 300) * $rate3);
        }

        echo "<h3>Electricity Bill Details</h3>";
        echo "Consumer Name: $consumerName<br>";
        echo "Billing Period: $fromDate to $toDate<br>";
        echo "Units Consumed: $units<br>";
        echo "Total Amount: $bill";
    }
    ?>
</body>
</html>

