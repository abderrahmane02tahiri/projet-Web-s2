<?php

session_start();
$id=$_SESSION['id'];
$pdo = new PDO("mysql:host=localhost;dbname=organisation","root",""); 
$cours= $pdo->query("SELECT * from cours");
$cours->setFetchMode(PDO::FETCH_ASSOC);
$tab = $cours->fetchAll();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses @RCOEM</title>
    <link rel="icon" href="images/thumbnail.jpg" type="image/png" />
    <link rel="stylesheet" href="course.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <section class="sub-header sub-header-image-2">
      <nav>
        <a href="index.php"><img src="images/thumbnail.jpg" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times"></i>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="todolist.php">todo-list</a></li>
            <li><a href="course.php">cours</a></li>
            <li><a href="projects.php">projets</a></li>
            <li><a href="profile.php">profile</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" ></i>
      </nav>
      <h1>NOS COURS</h1>
    </section>

    <!-- --------Courses-------- -->

    <section class="course">
      <h1>NOS COURS</h1>
      <p>
        Tous les cours sont proposés par des professeurs et des docteurs
        <br />Vous trouviez aussi les traveaux dirigées et pratique concernant
        chaque cours
      </p>

      <div class="row">
        <?php
        foreach($tab as $course ){ ?>
        <div class="course-col">
          <h3><?php echo $course['NOM_MODULE'];?></h3>
          <p>
            <?php echo $course['DESCRIPTION']; ?>
          </p>
          <a href="<?php echo $course['FILE_NAME'] ?>" class="hero-btn red-btn" target="_blank">EXPLORE</a>
        </div>
        <?php }?>
      </div>
    </section>
  </body>
</html>
