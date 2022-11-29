<?php
if(isset($_POST['submit']))
{
    $sq ="SELECT FROM trainees name WHERE id=:id";
    $name=$_GET['name'];
    $id=$_POST['id'];
   // $img=$_POST['img'];

$sql ="INSERT INTO attendees(id,name) VALUES(:id, :name)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>