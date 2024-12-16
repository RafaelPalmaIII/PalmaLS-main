<!DOCTYPE html>
<html>
<head>
  <title>Library Management System - Admin Register</title>
  <link rel="stylesheet" href="style.css">
  <?php include 'adminHeader.php'; ?>
</head>
<body style="background-image: url('img/Wow.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
  <div class="container">
    <div class="register-form">
      <h1><strong>Register for Library Management System</strong></h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <div class="form-group">
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="register-btn">Register</button>
        <a href="adminlog.php"><button type="button" class="back-btn">Back</button></a>
      </form>
    </div>
  </div>

  <?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the form data
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $confirm_password = $_POST["confirm-password"];

      // Perform registration validation and authentication
      // (This is a simplified example, in a real application you would use a secure password hashing algorithm)
      if ($password != $confirm_password) {
        // Passwords do not match
        echo "Passwords do not match. Please try again.";
      } else {
        // Registration successful
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        echo "Registration successful! Please log in.";
      }
    }
  ?>
  <?php include 'adminFooter.php'; ?>
</body>
</html>