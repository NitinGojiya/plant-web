<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333333;
        }

        p {
            font-size: 18px;
            color: #666666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333333;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333333;
        }
		.form-background {
    background-image: url('background.png');
    background-size: cover;
    background-position: center;
}
		
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Contact Us</h1>
            <p>Feel free to get in touch with us.</p>
        </header>
        <form id="contactForm" method="post" action="submit_contact.php" onsubmit="return handleSubmit()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <select id="subject" name="subject" required>
                    <option value="">Select a subject</option>
                    <option value="Flowering Plant">Flowering Plant</option>
                    <option value="Ferns">Ferns</option>
                    <option value="Herbs">Herbs</option>
                    <option value="Shrubs">Shrubs</option>
                    <option value="Succulents">Succulents</option>
                    <option value="Trees">Trees</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function handleSubmit() {
            // Display a prompt message
            alert("Thank you for contacting us. We will get in touch with you soon.");
            // Prevent the form from submitting normally
            return true; // Set to false if you want to prevent form submission
        }
    </script>
</body>

</html>
