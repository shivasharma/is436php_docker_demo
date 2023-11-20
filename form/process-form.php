
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

