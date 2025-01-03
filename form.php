<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <?php
    // Initialize variables
    $name = $email = $password = "";
    $nameError = $emailError = $passwordError = "";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty(trim($_POST["name"]))) {
            $nameError = "Name is required.";
        } else {
            $name = htmlspecialchars(trim($_POST["name"]));
        }

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $emailError = "Email is required.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format.";
        } else {
            $email = htmlspecialchars(trim($_POST["email"]));
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $passwordError = "Password is required.";
        } elseif (strlen($_POST["password"]) < 6) {
            $passwordError = "Password must be at least 6 characters.";
        } else {
            $password = htmlspecialchars(trim($_POST["password"]));
        }

        // If no errors, process the form
        if (empty($nameError) && empty($emailError) && empty($passwordError)) {
            echo "<p style='color: green;'>Registration successful!</p>";
            // In a real application, save data to a database here
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Register</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameError; ?></span>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailError; ?></span>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <span class="error"><?php echo $passwordError; ?></span>

        <button type="submit">Register</button>
    </form>
</body>
</html>


