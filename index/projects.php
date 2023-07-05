<?php
   $pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");
   $requet=$pdo->query("SELECT p.*, e.NOM_PRENOM FROM projects p JOIN etudiant e ON p.ID_ETUDIANT = e.ID_ETUDIANT;");
   $requet->setFetchMode(PDO::FETCH_ASSOC);
   $PROJECTS = $requet->fetchAll();
session_start();
$id=$_SESSION['id'];
//upload project
if(isset($_POST['save'])){
  $file_name=$_FILES['fileUpload']['name'];
  $file_extension=strrchr($file_name,'.');
  $extension_autorisee=array(".pdf",".PDF",".zip",".ZIP",".RAR",".rar",".PPTX");
  $file_destination='../New_folder/projects/'.$file_name;
  $file_tmp_name=$_FILES['fileUpload']['tmp_name'];

  
  if(in_array($file_extension,$extension_autorisee)){
      if(move_uploaded_file($file_tmp_name,$file_destination)){
       $ins = $pdo->prepare("insert into projects (NOM_MODULE,DESCRIPTION,ID_ETUDIANT,FILE_CHEMIN,FILE_NAME) values(?,?,?,?,?)");
       $ins->execute(array($_POST['moduleName'],$_POST['module_description'],$id,$file_destination,$file_name));
       header("Refresh: 0");
   }
 else{
   echo "<script>alert('probleme survenue  ');</script>";
 }
}
  else 
  {echo "<script>alert('il faut un fichier .pdf,.PDF,.zip,.ZIP,.RAR,.rar,.PPTX');</script>";}
}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <script>
      $(document).ready(function(){
        $(".add").click(function(){
          $("#courseForm").slideToggle(1000);
          
        })
      })
    </script>
    <section class="sub-header sub-header-image-2">
      <nav>
       <img src="images/thumbnail.jpg" class="add"/>
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
        <i class="fa fa-bars"></i>
      </nav>
      <h1>LES PROJETS</h1>
    </section>

    <div class="form-container" id="courseForm">
    <h2>Add projects</h2>
    <form method="post" enctype="multipart/form-data">
      <label for="moduleName">Module Name:</label>
      <input type="text" id="moduleName" name="moduleName" required>
      <label for="moduleName">description</label>
      <input type="text" id="moduleName" name="module_description" required>
      <label for="fileUpload">Upload Files:</label>
      <input type="file" id="fileUpload" name="fileUpload">
      
      <input type="submit" value="Save" name="save">
    </form>
  </div>

    <section class="course">
      <h1>PROJET Des Etudiants</h1>
      <p>
        Tous les projets sont proposés par des etudiant et des chercheurs
        <br />Vous trouviez aussi les rapports et les fihiers de chaque projets
      </p>

      <div class="row">
        <?php 
          foreach($PROJECTS as $line){
        ?>
        <div class="course-col">
        <h4><?php echo $line['NOM_PRENOM']; ?></h4>
          <h3><?php echo $line['NOM_MODULE']; ?></h3>
          
          <p>
          <?php echo $line['DESCRIPTION']; ?>
          </p>
          <a href="<?php echo $line['FILE_CHEMIN']; ?>" class="hero-btn red-btn" target="_blank">EXPLORE</a>
        </div>
        <?php }?>
      </div>
    </section>
  </body>
</html>
