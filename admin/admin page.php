<?php 



   $pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");
   $users= $pdo->query("SELECT * from etudiant");
   $users->setFetchMode(PDO::FETCH_ASSOC);
   $students = $users->fetchAll();

   if(isset($_POST['ok'])){

                  
           $login=$_POST['email'];
           $file_name=$_FILES['photo']['name'];
           $pass=md5($_POST['password']);
           $file_extension=strrchr($file_name,'.');
           $extension_autorisee=array(".jpg",".jpeg",".jfif",".pjpeg",".pjp",".JPG",".JPEG",".JFIF",".PJPEG",".PJP");
           $file_destination='../New_folder/uploads/'.$file_name;
           $file_tmp_name=$_FILES['photo']['tmp_name'];
           $ins= $pdo->query("SELECT * from etudiant where login= '$login' and pass ='$pass'");
           $ins->setFetchMode(PDO::FETCH_ASSOC);
           if ($ins->rowCount() == 0) {
           
           if(in_array($file_extension,$extension_autorisee)){
               if(move_uploaded_file($file_tmp_name,$file_destination)){
                $ins = $pdo->prepare("insert into etudiant (NOM_PRENOM,login,pass,image_FILE,image_name) values(?,?,?,?,?)");
                $ins->execute(array($_POST["name"],$_POST["email"],md5($_POST["password"]),$file_destination,$file_name));
                header("Refresh: 0");
            }
          else{
            echo "<script>alert('probleme survenue');</script>";
          }
        }
           else 
           {echo "<script>alert('il faut un fichier image .jpg , .jpeg , .jfif , .pjpeg , .pjp ');</script>";}
        }
        else{
               
            echo "<script>alert('ce compte existe deja');</script>";
           }
   }

   //upload le cours
   if(isset($_POST['save'])){
    $file_name=$_FILES['fileUpload']['name'];
    $file_extension=strrchr($file_name,'.');
    $extension_autorisee=array(".pdf",".PDF",".zip",".ZIP",".RAR",".rar");
    $file_destination='../New_folder/COURCES/'.$file_name;
    $file_tmp_name=$_FILES['fileUpload']['tmp_name'];

    
    if(in_array($file_extension,$extension_autorisee)){
        if(move_uploaded_file($file_tmp_name,$file_destination)){
         $ins = $pdo->prepare("insert into cours (NOM_MODULE,DESCRIPTION,FILE_NAME,FILE_CHEMIN) values(?,?,?,?)");
         $ins->execute(array($_POST['moduleName'],$_POST['module_description'],$file_destination,$file_name));
     }
   else{
     echo "<script>alert('probleme survenue  ');</script>";
   }
 }
    else 
    {echo "<script>alert('il faut un fichier image .pdf,.PDF,.zip,.ZIP,.RAR,.rar ');</script>";}
 }


   ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student and Course Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
  <link rel="stylesheet" href="admin page.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="admin_page.js"></script>
</head>
<body>
  <header>
    <div class="buttons">
      <button class="1"><i class="fas fa-user-plus"></i> Add Student</button>
      <button class="2"><i class="fas fa-book"></i> Add Course</button>
    </div>
    <a href="login.php"><img src="../New_folder/images/favicon.ico" alt=""></a>
  </header>

  <div class="form-container" id="studentForm">
    <h2>Add Student</h2>
    <form method="post" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <label for="profilePhoto">Profile Photo:</label>
      <input type="file" id="profilePhoto" name="photo">
      
      <input type="submit" value="Save" name="ok">
    </form>
  </div>

  <div class="form-container" id="courseForm">
    <h2>Add Course</h2>
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
<form action="" method="post">
<ul>
  <?php
        foreach($students as $student){
        ?>
        <li>
            <img src="<?php echo $student['image_FILE'];?>" alt="">
          <h3><?php echo $student['NOM_PRENOM'];?></h3>
          <p><?php echo $student["login"] ; ?></p>
          <button style="width:50px;height:50px; border-radius:50%;margin: 5px 5px 5px 15px; min-width:50px;" name="<?php echo $student['ID_ETUDIANT'];?>"><i class="fas fa-check"></i></button>
          </li> 
        <?php 
      
      if(isset($_POST[ $student['ID_ETUDIANT']])){
        $idt= $student['ID_ETUDIANT'];
        $file = $student['image_FILE'];
if (file_exists($file)) {
    if (unlink($file)) {

    } else {
    }
} else {

}

$request = "DELETE FROM etudiant WHERE ID_ETUDIANT = '$idt'";
$commit= $pdo->query($request);
$request = "DELETE FROM follow WHERE ID_FOLLOWERS = '$idt' or ID_FOLLOWERS='$idt'";
$commit= $pdo->query($request);
$request = "DELETE FROM follow WHERE ID_FOLLOWERS = '$idt' or ID_FOLLOWERS='$idt'";
$commit= $pdo->query($request);
$request = "SELECT FILE_CHEMIN from projects where ID_ETUDIANT='$idt'";
$commit= $pdo->query($request);

$commit->setFetchMode(PDO::FETCH_ASSOC);
$fichiers = $commit->fetchAll();
foreach($fichiers as $fichier){
if (file_exists($fichier)) {
    if (unlink($fichier)) {

    } else {
    }
} else {

}
}
$request = "DELETE FROM projects WHERE ID_ETUDIANT='$idt'";
$commit= $pdo->query($request);
header("Refresh: 0");
      } }?>
  </ul>
</form>
</body>
</html>
