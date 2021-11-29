
<?php

include_once 'db_config.php';

$num = $_POST['num'];
$name = $_POST['name'];
$style = $_POST['style'];
$year = $_POST['year'];

echo $num."  ".$name."  ".$style."  ".$year."<br>";
$sql = "insert into cars (md_num, md_name, style, year) values ($num, '$name', '$style', $year);";



if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql2 = "select * from cars";
$result = mysqli_query($conn, $sql2);
$result_check = mysqli_num_rows($result);



if($result_check > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo $row['md_num']."  ".$row['md_name']."<br>";
  }
}
else
{
  echo "unsccess";
}


// header("Location: ../index.php?signup=success");

?>