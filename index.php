<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
</head>
<body>
    <form action="./process.php" method="POST">
        <input type="text" name="txtTask">
        <input type="submit" value="Add">
    </form>
    <?php
        if(isset($_COOKIE["todolist"])){
            // $data = explode("\n",$_COOKIE["todolist"]);
            // for($i=0; $i<count($data);$i++){
            //     echo $data[$i];
            // }
            $data = $_COOKIE["todolist"];
            $result = explode(";;;",$data);
            echo "<table><tr><td>No.</td><td>Task</td><td>Action</td></tr>";
            for($i=0; $i<count($result);$i++){
                echo "<tr><td>".($i+1)."</td><td>".$result[$i]."</td><td>"
                ."<form action='./process.php' method='POST'>"
                ."<input type='hidden' name='txtTask' value='".$result[$i]."'>"
                ."<input type='submit' value='Done'>"
                ."</form></td></tr>";
            }
        }
    ?>
</body>
</html>