<?php
include "config.php";
include "Database.php";
?>

<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM tbl_user WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    if ($name == '' || $email == '' || $skill == ''){
        $error = "Filed must not be empty";
    }else{
        $query = "UPDATE tbl_user
            SET
            name ='$name',
            email='$email',
            skill='$skill'
            WHERE id = $id";
        $update = $db->update($query);
    }
}
?>

<?php
if (isset($_POST['delete'])){
    $query = "DELETE FROM tbl_user WHERE id=$id";
    $deleteData = $db->delete($query);
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
if(isset($error)){
    echo "<span style='color: red'>".$error."</span>";
}
?>
<div class="container">
    <form action="update.php?id=<?php echo $id; ?>" method="post">
<table class="table table-bordered">
    <tr>
        <td>Name</td>
    <td><input type="text" name="name" value="<?php echo $getData['name'] ?>" /></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="<?php echo $getData['email'] ?>" /></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" value="<?php echo $getData['skill'] ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input class="btn btn-primary" type="submit" name="submit" value="Update"/>
            <input class="btn btn-warning" type="reset" value="Cancel"/>
            <input class="btn btn-warning" type="submit" name="delete" value="delete"/>
        </td>
    </tr>
</table>
</form>
    <a class="btn btn-info" href="index.php">Go Home</a>
</div>
