<?php
    include('buy.php');
    $objekts = new card;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Purchase</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Enter Credit Card Information</h2>
    <div class="input-form">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" name="card-number" required>
            <label for="card-holder">Cardholder Name:</label>
            <input type="text" id="card-holder" name="card-holder" required>
            <label for="expiry-date">Expiration Date:</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YYYY" required>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
            <button id="button" class="button" onclick=pay()>Submit Payment</button>
    </div>
    </div>
</body>
<script src="ticketscript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</html>
