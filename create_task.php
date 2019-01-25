
<?php

if (isset($_GET['id'])){
    $update_id = $_GET['id'];
    $headline = 'Update Task';

    //fetch title from the database
    require_once 'class/Mdl_tasks.php';
    $mdl_tasks = new Mdl_tasks;
    $mysql_query = 'select * from tasks where id = '.$update_id;
    $result = $mdl_tasks->query($mysql_query);


    while($row = $result->fetch(PDO::FETCH_OBJ)){
        $task_title = $row->task_title;
        $finished = $row->finished;
    }

    } else {
        $headline = 'Create New Task';
        $task_title = '';
        $finished = '';
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="container">
            <h1><?php echo $headline; ?></h1>
            <p>
                <a href="index.php"class="waves-effect waves-light btn">Previous Page </a>
            </p>           
            
            <div class="row">
                
                <form class="col s12" method="post" action="submit_task.php">
                    
                    <div class="row">

                        <div class="input-field col s6">
                            <input placeholder="Enter task title" name="task_title" id="task_title" type="text" class="validate" value=" <?= $task_title?> " >
                            <label class="active" for="task_title">Task Title</label>
                        </div>

                        <div class="input-field col s6">
                            <p>
                                <label>
                                    <input type="checkbox" name="finished" value="1" 
                                    <?php if($finished == 1){
                                        echo 'checked';
                                    } ?>  />
                                    <span>Finished</span>
                                </label>
                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit" name="action">Submit
                        <i class="material-icons right">send</i>
                        </button>

                        <button class="btn  red darken-3 waves-effect waves-light" type="submit" name="submit" value="Delete" >Delete
                        <i class="material-icons right">delete_forever</i>
                        </button>

                    </div>
                    <?php if(isset($update_id)) { ?>
                     <input type="hidden" name="update_id" value="<?= $update_id; ?>">
                 <?php } ?>
                </form>

            </div>
            
        </div>
        
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>