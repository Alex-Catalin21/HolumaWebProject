<?php
$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];

$conn = mysqli_connect("localhost","root","","serp");
$query = "INSERT INTO feedback(quality_score, feedback)values('$q_score', '$feedback_txt')";
$result = mysqli_query($conn,$query);
if($result)
    echo 'Multumim pentru feedback!';
else
    die("A aparut o eroare.");

?>