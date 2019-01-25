<?php
// foreach ($_POST as $key => $value) {
//     echo "$key as $value <br>";
// }

    if (!isset($_POST['submit'])){
    die("Your are on the Wrong side of page, No panic you can go back and check");
    }


    $submit = $_POST['submit'];


    //echo $submit;
    //die();
    if($submit == 'Submit') {

    //process the form
    $task_title = $_POST['task_title'];

    if(!isset($_POST['finished'])){
    $finished = 0;
    } else {
    $finished = 1;
    }

    $date_created = time(); //here it insert integer format date

    /*  echo 'Task title is '.$task_title.'<br>';
    echo 'Finished is '.$finished.'<br>';
    echo 'Date Created is '.$date_created.'<br>';*/

    require_once 'class/Mdl_tasks.php';
    $mdl_tasks = new Mdl_tasks;

    if(isset($_POST['update_id'])){
        //update the record
        $update_id = $_POST['update_id'];
        $mysql_query = "UPDATE `tasks` SET `task_title` = '$task_title', `finished` = '$finished' WHERE `tasks`.`id` = '$update_id'";
    } else {
        // insert a new record 
        $mysql_query = "INSERT INTO `tasks` (`task_title`, `date_created`, `finished`) 
                    VALUES ( '$task_title', '$date_created', '$finished') ";
    }

 

    //echo $mysql_query; die();
    $mdl_tasks->query($mysql_query); //do the query
    
    //redirect back to index.php
    header('location: index.php');
    die();

    } else if ($submit == "Delete") {
        //delete the record
        $update_id = $_POST['update_id'];
        $mysql_query = 'delete from tasks where id='.$update_id;

        require_once 'class/Mdl_tasks.php';
        $mdl_tasks = new Mdl_tasks;
        $mdl_tasks->query($mysql_query);
        
        header('location: index.php');
        die();

    }

?>