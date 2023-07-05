<?php

session_start();
$id=$_SESSION['id'];
$pdo = new PDO("mysql:host=localhost;dbname=organisation","root",""); 
$users= $pdo->query("SELECT * from etudiant where ID_ETUDIANT!='$id'");
$users->setFetchMode(PDO::FETCH_ASSOC);
$friends = $users->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses @RCOEM</title>
    <link rel="icon" href="images/thumbnail.jpg" type="image/png" />
    <link rel="stylesheet" href="project.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <section class="sub-header sub-header-image-2">
      <nav>
        <a href="index.html"><img src="images/thumbnail.jpg" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="todo.php">todo-list</a></li>
            <li><a href="course.php">cours</a></li>
            <li><a href="projects.php">projets</a></li>
            <li><a href="profile.php">profile</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <h1>Liste des utilisateurs</h1>
    </section>

    <!-- --------Courses-------- -->

    <section class="course">
      <h1>decouvrir de nouveau amis</h1>
      <p>
        Tous les etudiant ,les chercheurs, qui utilise class ClassBridge 
        <br />que vous pouvez collaborer avec eux
      </p>

    <div class="row">
        <?php
        foreach($friends as $friend){
        ?>
        <div class="course-col">
            <img src="<?php echo $friend['image_FILE'];?>" alt="">
          <h3><?php echo $friend['NOM_PRENOM'];?></h3>
          <a href="<?php echo 'friend.php?id='.$friend["ID_ETUDIANT"] ; ?>" class="hero-btn red-btn">EXPLORE</a>
        </div> 
        <?php } ?>
       
    </div>
    </section>
  </body>
</html>
