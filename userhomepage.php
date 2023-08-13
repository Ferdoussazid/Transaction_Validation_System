<!DOCTYPE html>
<html>
<head>
    <title>User Homepage</title>
    <link rel="stylesheet" href="userhomepage.css">
</head>
<body>
    <div class="user-container">
        <h1>Transaction</h1>
        <form id="transactionForm">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>
            
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" required>
            
            <label for="signature">Signature:</label>
            <input type="text" id="signature" name="signature" required>
            
            <button class="center-button">Send Transaction</button>
            
        </form>
    </div>
</body>
</html>
