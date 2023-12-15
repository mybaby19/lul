<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

    <h2>Login</h2>

    <?php
    session_start();

    if (isset($_SESSION['user_id'])) {
      header("Location: dashboard.php");
      exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      require_once 'pdo_connect.php';


      $username = $_POST['username'];
      $password = $_POST['password'];


      $query = "SELECT id, username FROM users WHERE username = :username AND password = :password";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);
      $stmt->execute();


      if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];


        header("Location: dashboard.php");
        exit();
      } else {
        echo "<p style='color: red;'>Invalid username or password.</p>";
      }
    }
    ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>
