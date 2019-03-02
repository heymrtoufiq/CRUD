<?php
include "config.php";
include "Database.php";
?>

<?php
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read = $db->select($query);
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <?php
    if(isset($_GET['msg'])){
        echo "<span style='color: green'>".$_GET['msg']."</span>";
    }
    ?>
<table class="table table-bordered">
    <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Email</th>
        <th>Skill</th>
        <th>Action</th>
    </tr>
    <?php if ($read){ ?>
        <?php
        $i=1;
        while ($row = $read->fetch_assoc()){
            ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['skill'];?></td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
    </tr>
    <?php } ?>
    <?php } else {?>
    <p>Data is not Available!!</p>
    <?php } ?>
</table>
    <a class="btn btn-info" href="create.php">Create</a>
</div>
