<!DOCTYPE html>
<html>
<head>
  <title>Library Management System</title>
  <link rel="stylesheet" href="style.css">
   <?php include 'header.php'; ?> 
</head>
<body style="background-image: url('img/Amaze.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
  <div class="container">
    <div class="login-form">
      <h1><strong>Log into Library Management System</strong></h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="email">Email or Username:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <div class="form-group">
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="login-btn">Login</button>
        <a href="index.php"><button type="button" class="back-btn">Back</button></a>
        <p>Don't have an account? <a href="registerform.php"><button type="button" class="register-btn">Click here to Register</button></a></p>
      </form>
    </div>
  </div>

  <?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the form data
      $email = $_POST["email"];
      $password = $_POST["password"];

      // Perform login validation and authentication
      $sql = "SELECT * FROM users WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows == 1) {
        // Successful login
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
          // Login successful
          echo "Login successful!";
        } else {
          // Login failed
          echo "Invalid email or password. Please try again.";
        }
      } else {
        // Login failed
        echo "Invalid email or password. Please try again.";
      }
    }
  ?>
   <?php include 'footer.php'; ?>
</body>
</html>

