<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center; /* Center align container contents */
}

h2 {
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
    text-align: left; /* Align input labels to left */
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
<body>
    <div class="container">
        <h2>User Settings</h2>
        <form id="settingsForm">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" value="Save Settings">
        </form>
    </div>

    <script>
        document.getElementById('settingsForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Simulate saving settings (replace this with your actual saving logic)
            setTimeout(function() {
                // Redirect to homepage
                window.location.href = "home.php";
                // Show message
                alert("Settings saved successfully!");
            }, 1000); // Delay for 1 second (replace with actual saving logic)
        });
    </script>
</body>
</html>
