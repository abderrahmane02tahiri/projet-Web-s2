<?php

session_start();
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abderrahmane TAHIRI">
    <title>Profile Page</title>
    <!-- import font icon (fontawesome) -->
    <script src="https://kit.fontawesome.com/b8b432d7d3.js" crossorigin="anonymous"></script>
    <!-- import css file (style.css) -->
    <link rel="stylesheet" href="styleProfile.css">
   
</head>
<body>
<?php 
$pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");
        $ins=$pdo->query("SELECT * from etudiant WHERE ID_ETUDIANT='$id'");
        $ins->setFetchMode(PDO::FETCH_ASSOC);
        $me=$ins->fetchAll();
        $stats_followers=$pdo->query("SELECT * FROM follow WHERE ID_FOLLOWING='$id'");
        $stats_following=$pdo->query("SELECT * FROM follow WHERE ID_FOLLOWERS='$id'");
        $stats_posts=$pdo->query("SELECT * FROM projects WHERE ID_ETUDIANT='$id'");

?>
    <div class="container">
        
        <div class="profile-card">
            <div class="profile-header"><!-- profile header section -->
                <div class="main-profile">
                    <img class="profile-image"  src="<?php echo $me[0]['image_FILE'];?>">
                    <div class="profile-names">
                        <h1 class="username"><?php echo $me[0]['NOM_PRENOM'];?></h1>

                    </div>
                </div>
            </div>

            <div class="profile-body"><!-- profile body section -->
                <div class="profile-actions">
                    <button class="follow"><a href="projects.php">Projects</a></button>
                    <button class="message"><a href="course.php">Bibliotheque</a></button>
                    <section class="bio">
                        <div class="bio-header">

                        </div>

                    </section>
                </div>
           
                <div class="account-info">
                <a href="collaboration.php">
                    <div class="data">

                        <div class="important-data">
                            <section class="data-item">
                                <h3 class="value"><?php echo $stats_posts->rowcount(); ?></h3>
                                <small class="title">Post</small>
                            </section>
                            <section class="data-item">
                                <h3 class="value"><?php echo $stats_followers->rowcount(); ?></h3>
                                <small class="title">Follower</small>
                            </section>
                            </section>
                            <section class="data-item">
                                <h3 class="value"><?php echo $stats_following->rowcount(); ?></h3>
                                <small class="title">Following</small>
                            </section>
                           
                        </div>
                    </div>   
                    <?php 
                      
                    $inst= $pdo->query("SELECT * from engagement where ID_ETUDIANT='$id' ORDER BY LA_DATE LIMIT 3");
                    $inst->setFetchMode(PDO::FETCH_ASSOC);
                    $tab = $inst->fetchAll();?>
    
                    
                <div class="workspace">
                <a href="todolist.php">
                    <div class="tasks" title="todolist">
                        <h2>Recent tasks</h2>
                        <ul>
                    <?php  foreach($tab as $task){ ?>
                        <li>
                        <?php
                         echo $task['LA_DATE'].' '.$task['Description'].' '.$task['Tache'] ;
                    }?>
                         
                         </li>
                         </ul>
                    </div>
                </a>

                    </div>
                </div>
            </div>
        </div>
        <?php 
                      
                      $users= $pdo->query("SELECT * FROM etudiant e, follow f WHERE f.ID_FOLLOWING= e.ID_ETUDIANT AND f.ID_FOLLOWERS = $id;");
                      $users->setFetchMode(PDO::FETCH_ASSOC);
                      $friends = $users->fetchAll();?>
        <div class="profile-card" id="profile-card">
            <h2>Friends</h2>
            <ul>
                <?php foreach($friends as $friend) {?>
                <a href="<?php echo 'friend.php?id='.$friend["ID_ETUDIANT"] ; ?>"><li><img src="<?php echo $friend['image_FILE'];?>" alt=""><p><?php echo $friend['NOM_PRENOM'];?></p></li></a>
                <?php }?>
            </ul>
        </div>

    </div>
</body>
</html>