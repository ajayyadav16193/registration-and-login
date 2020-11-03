<?php 
    require_once 'connection.inc.php';  
    $id = $_SESSION['USER_ID'];
    $sql = "SELECT * FROM USER WHERE id='$id'";   
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Dashboard</title>
    <style>
    body {
    padding-top: 1em;
    }	
    </style> 
</head>
<body>
    <div class="container-fluid text-center">
        <div class="card" style="max-width: 20rem;">
            <div class="card-header text-center">
                <img src="<?php echo 'media/'.$row['image']; ?>" height="150px" width="120px" class="rounded-circle" alt="Cinque Terre">
                <h5 class="text-center">Profile Image</h5>
            </div>
            <div class="card-body">
                <p class="card-text text-center"><b>Name </b>: <?php echo $row['fname']." ".$row['lname']; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center"><b>Username </b>: <?php echo $row['username']; ?></li>
                <li class="list-group-item text-center"><b>Email </b>: <?php echo $row['email']; ?></li>
                <li class="list-group-item text-center"><b>Mobile </b>: <?php echo $row['mobile']; ?></li>
                <li class="list-group-item text-center"><a class="btn btn-info" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>