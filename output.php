
<?php

include('./assets/config/db_config.php');

//retrive some data using queries 
//1.construct the query 
//2. make the query 
//3. fetch the result from the query 


//write the query to

$sql_query = 'SELECT id, name, email, message, created_at FROM users ORDER BY created_at';

//make the query and get the result

$result = mysqli_query($connection, $sql_query);
//print_r($users);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
     
<?php include('templates/header.php'); ?>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    
    //fetch the resulting rows as an array
    while($row = mysqli_fetch_assoc($result)){

        //preiau proprietatea din db adica
        $userID = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $time = $row['created_at'];
   
    ?>
    <tr>
        <td><?php echo htmlspecialchars($userID)?></td>
        <td><?php echo htmlspecialchars($name)?></td>
        <td><?php echo htmlspecialchars($email)?></td>
        <td><?php echo htmlspecialchars($time)?></td>
    </tr>

    <?php 
    
}

  //close the connection
   mysqli_close($connection);


    ?>

    </tbody>

</table>




<?php include('templates/footer.php'); ?>
</body>
</html>