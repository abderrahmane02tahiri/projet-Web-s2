<?php
session_start();
$id=$_SESSION['id'];

$pdo = new PDO("mysql:host=localhost;dbname=organisation","root",""); 
$user= $pdo->query("SELECT * from etudiant where ID_ETUDIANT='$id'");
$user->setFetchMode(PDO::FETCH_ASSOC);
$profil = $user->fetchAll();
$profil[0]['image_FILE'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#062e3f">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



    <!-- Google Font: Quick Sand -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- font awesome (https://fontawesome.com) for basic icons; source: https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/corner.css">
    <title>ToDo-List</title>
<style>
    option{
        padding: 10px;
    }
</style>
</head>


<body style="overflow-y: scroll;">
    <div id = "header">
    <a href="profile.php"><img src="img/logodo.png" alt=""></a>
        <div class="flexrow-container">

            <div class="standard-theme theme-selector"></div>
            <div class="light-theme theme-selector"></div>
            <div class="darker-theme theme-selector"></div>
        </div>
        <h1 id="title">Todo-list.<div id="border"></div></h1>
    </div>
    
  <div id="form">
  <form method="post">
            
            <input type="text" name="name" [MULTIPLE]  style="width: 150px; border-radius: 0; outline:none;" placeholder="task name." required>

            <select name="privacy" [MULTIPLE]  style="width: 20px; border-radius: 0; outline:none;" >         
                    <option value="Private">PRIVATE</option>
                    <option value="Public" [SELECTED]>PUBLIC</option>
            </select>
            <input class="todo-input" type="text" name="description" placeholder="description ." style="width: 500px;border-radius: 0" required>
            <input type="datetime-local" name="date" id="" style="width: 40px;border-radius: 0;" required>
            
            <button class="todo-btn" type="submit" name="ok">Ajouter!</button>
        </form>
    </div>

  
    <div>
        <p><span id="datetime"></span></p>
        <script src="JS/time.js"></script>
    </div>
<?php $pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");  
     if(isset($_POST["ok"])){
        $date=$_POST['date'];
        $description=$_POST['description'];
        $nom=$_POST['name'];
        $privacy=$_POST['privacy'];
        $query = "INSERT INTO engagement (LA_DATE,Description, ID_ETUDIANT,Tache,PRIVACY)VALUES ('$date', '$description', $id, '$nom','$privacy')";
          $pdo->query($query);

    }
        ?>
  <div id="myUnOrdList">
    <form action="" method="post">
        <ul class="todo-list">
            <?php
        

        $inst= $pdo->query("SELECT * from engagement where ID_ETUDIANT='$id' ORDER BY LA_DATE");
        $inst->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $inst->fetchAll();
        $sql = "DELETE FROM engagement WHERE LA_DATE < now()";
        $stmt= $pdo->query($sql);
        foreach($tab as $task){
            ?>
        <li> 
            <div class="todo">
            <?php echo $task['LA_DATE'].' '.$task['Description'].' '.$task['Tache'] ;?>


                
            <button style="width:50px;height:50px; border-radius:50%;margin: 5px 5px 5px 15px; min-width:50px;" name="<?php echo $task['ID_ENGAGEMENT'];?>"><i class="fas fa-check"></i></button>
            </div>
            
        </li>
        <?php  
   
   if(isset($_POST[$task['ID_ENGAGEMENT']])){
            $idt=$task['ID_ENGAGEMENT'];
    $request = "DELETE FROM engagement WHERE ID_ENGAGEMENT = $idt";
    $commit= $pdo->query($request);
    header("Refresh: 0");
   }
            

    }?>
        </ul>
    </form>
    </div>
    <script src="JS/scripts.js" type="text/javascript"> </script>
</body>
</html>
