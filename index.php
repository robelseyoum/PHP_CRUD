
<?php 

require_once 'class/Mdl_tasks.php';

$mdl_tasks = new Mdl_tasks;
$mysql_query = 'select * from tasks order by date_created desc';
$result = $mdl_tasks->query($mysql_query);

// echo $get_name = $_GET['name'];
// die();

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
    </heads>
    <body>
        <div class="container">
            <h1>Your Tasks</h1>
            <p>
                <a href="create_task.php"class="waves-effect waves-light btn">Create New Task</a>
            </p>
            <table class="striped">
                <tr>
                    <th>Task Title</th>
                    <th>Date Created</th>
                    <th>Finished</th>
                    <th>Action</th>
                </tr>

                <?php while($row = $result->fetch(PDO::FETCH_OBJ)): 

                   
                    $date_created = $row->date_created;
                    $date_created = date('jS \of F Y', $date_created);
                    
                    $update_url = 'create_task.php?id='.$row->id;

                    if($row->finished){
                        $finished = 'yes';
                    } else {
                        $finished = 'no';
                    }

                    ?>
                    <!-- loop through the results --> 
                    <tr>
                        <td><?= $row->task_title ?></td>
                        <td><?= $date_created ?></td>
                        <td><?= $finished; ?></td>
                        <td><a href="<?= $update_url ?>" class="waves-effect waves-light btn-small">Update</a></td>
                    </tr>

                <?php endwhile; ?>
            
            </table>
        </div>
        
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>