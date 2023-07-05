<?php

session_start();
$id=$_SESSION['id'];
$friend=$_GET["id"];
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
        $ins=$pdo->query("SELECT * from etudiant WHERE ID_ETUDIANT='$friend'");
        $ins->setFetchMode(PDO::FETCH_ASSOC);
        $me=$ins->fetchAll();
        $stats_followers=$pdo->query("SELECT * FROM follow WHERE ID_FOLLOWING='$friend'");
        $stats_following=$pdo->query("SELECT * FROM follow WHERE ID_FOLLOWERS='$friend'");
        $stats_posts=$pdo->query("SELECT * FROM projects WHERE ID_ETUDIANT='$friend'");
        $mailtoLink = 'mailto:' . urlencode($me[0]['login']);
        function Followed($id,$friend) {
            $pdo = new PDO("mysql:host=localhost;dbname=organisation","root","");
            $ins=$pdo->query("SELECT * from follow WHERE ID_FOLLOWERS='$id' and ID_FOLLOWING='$friend'");
            $ins->setFetchMode(PDO::FETCH_ASSOC);
            if($ins->rowCount() == 0)
            return false;
            else{
                return true;
            }

        }
?>
    <div class="container"style="justify-content:center">
        
        <div class="profile-card" >
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
                    <form action="" method="post">
                    <button class="follow" onclick=toggleFollow() name="follow" style="width:150px;">
                        <?php
                        if (Followed($id,$friend)) {
                            echo 'Unfollow';                           
                        } else {
                            
                            echo 'Follow';
                        }
                        ?>
                </button>


                </form>    
                <?php 
                if(isset($_POST['follow'])){
                    if (Followed($id,$friend)) {
                        $sql = "DELETE FROM follow WHERE ID_FOLLOWERS='$id' and ID_FOLLOWING='$friend'";
                        $stmt= $pdo->query($sql);
                        header('refrech:0');
                         
                    } else {
                        $sql = "INSERT INTO follow (ID_FOLLOWERS, ID_FOLLOWING) VALUES ('$id', '$friend')";
                        $stmt = $pdo->query($sql);
                        header('refrech:0');
                         
                    }
                }
                
                
                ?>
                    <button class="message"><?php echo '<a href=" '.$mailtoLink.'">Mail</a>';?></button>
                    <section class="bio">
                        <div class="bio-header">

                        </div>

                    </section>
                </div>

                <div class="account-info">
                    <div class="data">
                        <div class="important-data">
                            <section class="data-item">
                                <h3 class="value"><?php echo $stats_posts->rowcount(); ?></h3>
                                <small class="title">Post</small>
                            </section>
                            <section class="data-item">
                                <h3 class="value" id="follower"><?php echo $stats_followers->rowcount(); ?></h3>
                                <small class="title">Follower</small>
                            </section>
                            </section>
                            <section class="data-item">
                                <h3 class="value" id="following"><?php echo $stats_following->rowcount(); ?></h3>
                                <small class="title">Following</small>
                            </section>
                        </div>
                    <?php 
                      
                    $inst= $pdo->query("SELECT * from engagement where PRIVACY='Public' and ID_ETUDIANT='$friend' ORDER BY LA_DATE LIMIT 3");
                    $inst->setFetchMode(PDO::FETCH_ASSOC);
                    $tab = $inst->fetchAll();?>
    
                    </div>
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

    </div>
    <script>
    function toggleFollow() {
    event.preventDefault(); // Prevent form submission

    // Create AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true); // Empty URL means the current page
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Define callback function
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response here (if needed)
            var response = xhr.responseText;
            
            // Update the follow/unfollow button text dynamically
            var followButton = document.querySelector(".follow");
            if (followButton.textContent === "Follow") {
                followButton.textContent = "Unfollow";
                location.reload();

            } else {
                followButton.textContent = "Follow";
                location.reload();
            }
        }
    };

    // Send the request
    xhr.send("follow=true");
    }

</script>
</body>
</html>