
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

  foreach ($allUsers as $user) {
    <table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['title']; ?></td>
            <td><?php echo $user['body']; ?></td>
            <td><?php echo $user['date_created']; ?></td>
        </tr>
    echo "{$user['title']} |
     {$user['body']} |
      {$user['date_created']}
       \n";
  }

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

