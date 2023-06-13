<?php 
 include('includes/config.php');
    if(isset($_POST["submit"]))
    {
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $description = mysqli_real_escape_string($con, $_POST["description"]);
        $sql = "INSERT INTO feedback (name, description) VALUES ('$name', '$description')";
        mysqli_query($con, $sql);
        echo "<script>alert('Thanks for giving feedback')</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Feedback Form</title>
  <style>
    /* CSS styles for the form */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      resize: vertical;
      height: 100px;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: #4caf50;
      border: none;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div>
  <h3> <a href="about-us.php" style="padding:10px 20px;background-color:gray;color:white;border-radius:10px;text-decoration:none"><<< Back </a></h3>
  </div>

  <div class="container" style="padding:20px 60px">
    <h2>Feedback Form</h2>
    <form method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Enter your feedback" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
