<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="theme-color" content="#062e3f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<script src="JS/scripts.js" type="text/javascript"> </script>
    <!-- Google Font: Quick Sand -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- font awesome (https://fontawesome.com) for basic icons; source: https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/corner.css">
</head>
<body>
    
</body>
</html>
<?php
$id=$_GET['id'];
        
        $pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");  
        $inst= $pdo->query("SELECT * from engagement where ID_ETUDIANT='$id' ORDER BY LA_DATE");
        $inst->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $inst->fetchAll();
        if($inst->rowCount()==0){
            echo'pas de tache';}
            else{
        foreach($tab as $task){
            ?>
        <li class=todo-item> 
            <div class="todo">
            <?php echo $task['LA_DATE'].' '.$task['Description'].' '.$task['Tache'] ;?>
            <button style="width:50px;height:50px; border-radius:50%;margin: 5px 5px 5px 15px; min-width:50px;" data-id="<?php echo $task['ID_ENGAGEMENT'];?>"><i class="fas fa-check"></i></button>
            </div>
            
        </li>
<?php }} ?>