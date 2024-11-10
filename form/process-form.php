
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php 
  $connect = mysqli_connect(
    'db',
    'lamp_demo',
    'password',
    'lamp_demo'
);

$query = 'SELECT * FROM blog';
$result = mysqli_query($connect, $query);
  
 
  
if (mysqli_num_rows($result) > 0) {
  
  # fetching all the records
  $allUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);

  # showing each record through foreach loop

    echo '<table class="table table-striped border-success">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Title</th>';
    echo '<th scope="col">Body</th>';
    echo '<th scope="col">Date Created</th>';
    echo '<th scope="col">Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($allUsers as $index => $user) {
      echo '<tr>';
      echo '<th scope="row">' . ($index + 1) . '</th>';
      echo '<td>' . $user['title'] . '</td>';
      echo '<td>' . $user['body'] . '</td>';
      echo '<td>' . $user['date_created'] . '</td>';
      echo '<td><a href="edit.php?id=' . $user['id'] . '">Edit</a></td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
  
}
  
?>


<?php
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conn = new mysqli('db', 'lamp_demo','password','lamp_demo');


//$db = mysql_select_db($connection,"blog"); // Selecting Database from Server
// Fetching variables of the form which travels in URL

  $title= $_POST["title"];
  $blogcontent= $_POST["blogcontent"];
  $dateblog = date("Y-m-d");

//Insert Query of SQL

$stmt = $conn->prepare("INSERT INTO blog (title, body, date_created) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $blogcontent, $dateblog);

        if ($stmt->execute()) {
          echo "Data inserted successfully";
      } else {
          echo "Error: " . $stmt->error;
      }

      $stmt->close();
      $conn->close();
  
}


?>

</body>
</html>