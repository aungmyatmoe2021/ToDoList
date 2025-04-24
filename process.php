<?php
    $task = $_POST['txtTask'];
    $cookie_name = "todolist";
    if(isset($_COOKIE['todolist'])){
        if(str_contains($_COOKIE['todolist'], $task)){
            $cookie_value = str_replace($task.";;;","",$_COOKIE['todolist']);
        }else{
            $cookie_value = $task . ';;;' . $_COOKIE['todolist'];
        }
    }else{
        $cookie_value = $task. ";;;";
    }
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header('Location:index.php');
    exit();
?>