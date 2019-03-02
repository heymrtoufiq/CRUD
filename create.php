<?php
include "config.php";
include "Database.php";
?>

<?php
$db = new Database();
if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    if ($name == '' || $email == '' || $skill == ''){
        $error = "Filed must not be empty";
    }else{
        $query = "INSERT INTO tbl_user(name, email, skill) values ('$name', '$email', '$skill')";
        $create = $db->insert($query);
    }
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
if(isset($error)){
    echo "<span style='color: red'>".$error."</span>";
}
?>
<div class="container">
    <form action="create.php" method="post">
<table class="table table-bordered">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Please enter name"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" placeholder="Please enter email"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" placeholder="Please enter skill"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input class="btn btn-primary" type="submit" name="submit" value="submit"/>
            <input class="btn btn-warning" type="reset" value="Cancel"/>
        </td>
    </tr>
</table>
</form>
    <a class="btn btn-info" href="index.php">Go Home</a>
</div>
