
<?php 
session_start();


?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Doomout</title>
    <meta name="title" content="Doomout">
    <meta name="description" content="A minimal email client for inbox zero enthusiasts.">
    <meta name="keywords" content="tiny, mail, client, gmail, icloud, minimal, superhuman">
    <meta name="author" content="@ijazulrehman">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://doomout.com/">
    <meta property="og:title" content="Doomout">
    <meta property="og:description" content="A minimal email client for inbox zero enthusiasts.">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://doomout.com/">
    <meta property="twitter:title" content="Doomout">
    <meta property="twitter:description" content="A minimal email client for inbox zero enthusiasts.">
    <link href="images/thumbnail.jpg" rel="apple-touch-icon">
    <link href="images/favicon.ico" rel="shortcut icon">
    <link href="css/styles.css" rel="stylesheet">
  </head>

<body>
  <?php
  $base=new PDO("mysql:host=localhost;dbname=organisation","root","");
if(isset($_POST["gmail"])){
$login=$_POST["email"];
$pass=$_POST["first-name"];
$ins= $base->query("SELECT * from etudiant where login= '$login' and NOM_PRENOM ='$pass'");
$ins->setFetchMode(PDO::FETCH_ASSOC);
$tab = $ins->fetchAll();
if ($ins->rowCount() == 0) {
  echo "<script>alert('il faut un fichier image .jpg , .jpeg , .jfif , .pjpeg , .pjp ');</script>";
  
  }
else{ $pdo=null;
  
       header ('location:profile.php');
       

}
}
?>
  <div class="modal">
  <button type="button" class="modal-close modal-toggle"><i class="icon" data-feather="x"></i><span class="hide-mobile">ESC</span></button>
  <div class="modal-content">
    <div class="success">
      <a href="index.html" class="logo"><img src="images/logo.svg" alt="logo"/></a>
      <h2 class="modal-title first-name" id="title-name"></h2>
      <p>You're on the list! We'll be in touch.</p>
      <a href="index.php" class="button">Back home</a>
    </div>
    <div class="form-content">
      <a href="index.html" class="logo"><img src="images/logodo.svg" alt="logo"/></a>
      <h2 class="modal-title">Rejoignez-nous dès maintenant</h2>
      <p class="modal-subtitle">Rejoignez nous maintenant, et commencer votre journée.</p>
      <form class='form' name='doomoutForm' method='POST'>
        <input type='hidden' name='form-name' value='doomoutForm' />
        <div class="group">
          <input type="text" id="firstName" name="first-name" placeholder="&nbsp;" autocomplete="off" required>
          <label for="first-name"> Nom et Prénom</label>
          <span class="border"></span>
        </div>
        <div class="group">
          <input type="email" name="email" placeholder="&nbsp;" autocomplete="off" required>
          <label for="email">Email</label>
          <span class="border"></span>
        </div>
        <button type="submit" class="button" name="gmail">Rejoignez-nous dès maintenant</button>
      
    </div>
  </div>
</div>
  <div class="content">
    <a href="index.php" class="logo"><img src="images/logodo.png" alt="logo"/></a>
    <div class="hero">
      <h1 class="title">ClassBridge</h1>
      <h1 class="title shift clip">
        <span class="word-shift">
          <b class="is-visible">Votre chemain vers le success&nbsp;</b>
          <b>Connecter les étudiants. Favoriser la réussite.</b>
          <b>Un compagnon numérique pour simplifier votre parcours scolaire</b>
          <b>Le guide infaillible de l'étudiant accompli</b>
          <b>Classbrodge : votre allié pour une vie estudiantine équilibrée.</b>
          <b>votre nouveau amie</b>
          <b>Libérez votre succès académique avec Classbrodg</b>
        </span>
      </h1>
      <button class="button modal-toggle" name="start">Rejoignez nous maintenant</button>
    </form>
      <p class="subtitle">Bientôt disponible pour mobile <img src="images/logo-apple.svg" alt="apple"/></p>
    </div>
    <div class="screen-wrapper">
      <img src="images/pexels-armin-rimoldi-5553050.jpg" class="screen" alt="screen"/>
    </div>
    <section class="section section-features">
      <h2 class="title">Un pont vers le succès étudiant.</h1>
      <div class="features">
        <img src="images/overlay-left.svg" class="overlay-left hide-mobile" alt="overlay"/>
        <img src="images/overlay-right.svg" class="overlay-right hide-mobile" alt="overlay"/>
        <img src="images/overlay-top.svg" class="overlay-top show-mobile" alt="overlay"/>
        <img src="images/overlay-bottom.svg" class="overlay-bottom show-mobile" alt="overlay"/>
        <div class="row donts">
          <div class="feature"><i class="icon" data-feather="x"></i> Pas compliqué </div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas difficile à utiliser</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas ardu</div>
          <div class="feature"><i class="icon" data-feather="x"></i>Pas frustrant</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas chronophage</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas contraignant</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas embrouillé</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas confus</div>
          <!-- Repeat-->
          <div class="feature"><i class="icon" data-feather="x"></i>Pas confus</div>
          <div class="feature"><i class="icon" data-feather="x"></i>Pas décourageant</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas compliqué à comprendre</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas encombré</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas limité</div>
          <div class="feature"><i class="icon" data-feather="x"></i> Pas obscur</div>
          <div class="feature"><i class="icon" data-feather="x"></i>Pas déroutant</div>
          <div class="feature"><i class="icon" data-feather="x"></i>Pas contraire à l'intuition</div>
        </div>
        <div class="row dos">
          <div class="feature"><i class="icon" data-feather="check"></i>Essentiel</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Transformateur</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Intégré</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Innovant</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Accessible</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Polyvalent</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Collaboratif</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Émancipateur</div>
          <!-- Repeat-->
          <div class="feature"><i class="icon" data-feather="check"></i>Essentiel</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Transformateur</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Intégré</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Fiable</div>
          <div class="feature"><i class="icon" data-feather="check"></i>simple</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Accessible</div>
          <div class="feature"><i class="icon" data-feather="check"></i>Collaboratif</div>
          <div class="feature"><i class="icon" data-feather="check"></i>creative</div>
        </div>
      </div>
      <!-- <p>If you’re looking for an email client with more features, try <a href="">these</a>.</p> -->
    </section>
    <section class="section section-providers">
      <h2 class="title">Utilisation avec tous vos fournisseurs de messagerie</h2>
      <div class="cards">
        <img src="images/overlay-left.svg" class="overlay-left hide-mobile" alt="overlay"/>
        <img src="images/overlay-right.svg" class="overlay-right hide-mobile" alt="overlay"/>
        <div class="slider">
          <div class="slide"><img src="images/card-icloud.svg" alt="icloud"/></div>
          <div class="slide"><img src="images/card-gmail.svg" alt="gmail"/></div>
          <div class="slide"><img src="images/card-outlook.svg" alt="outlook"/></div>
          <div class="slide"><img src="images/card-yahoo.svg" alt="yahooe"/></div>
          <div class="slide"><img src="images/card-pop3.svg" alt="pop3"/></div>
          <div class="slide"><img src="images/card-imap.svg" alt="imap"/></div>
        </div>
      </div>
    </section>
    <section class="section imagery">
      <h2 class="title">pleine concentration créativité et productivité</h2>
      <img src="images/overlay-bottom.svg" class="overlay-bottom hide-mobile" alt="overlay"/>
      <div class="zero-slider">
       
        <div class="slide"><img src="images/screen-illo-2.png" alt="inboxzero"/></div>
        <div class="slide"><img src="images/screen-illo-3.png" alt="inboxzero"/></div>
        <div class="slide"><img src="images/screen-illo-4.png" alt="inboxzero"/></div>
        
  
      </div>
    </section>
    <section class="section cta">
      <div class="cta-content">
        <h1 class="title">démarrez votre journée.</h1>
        <button class="button white modal-toggle">Rejoignez-nous dès maintenant</button>
        <p class="subtitle">Bientôt disponible pour mobile<img src="images/logo-apple.svg" alt="apple"/></p>
      </div>
      <div class="zero-slider">
        <div class="slide"><img src="images/pexels-armin-rimoldi-5553052.jpg" alt="inboxzero"/></div>
        <div class="slide"><img src="images/pexels-armin-rimoldi-5553052.jpg" alt="inboxzero"/></div>
        <div class="slide"><img src="images/pexels-armin-rimoldi-5553052.jpg" alt="inboxzero"/></div>
      </div>
    </section>
    <footer class="footer">
      <p>&copy; ClassBridge</p>
    </footer>
    </div>
  </div>
  <script src="./js/jquery/3.4.1/jquery.min.js"></script>
<script src="js/scripts.min.js"></script>
<script>

  // Close modal on escape key
  $(document).keyup(function(e) {
    if (e.key === "Escape") {
      $('.modal').removeClass('modal-show');
      $('.content').removeClass('content-blurred');
      $('body').removeClass('no-scroll');
    }
  });

  $(function(){

    // Provider card slider
    $('.slider').flickity({
      pauseAutoPlayOnHover: false,
      prevNextButtons: false,
      cellAlign: 'center',
      draggable:  false,
      freeScroll: false,
      wrapAround: true,
      pageDots: false,
      autoPlay: 3000,
    });

    // Imbox zero slider
    $('.zero-slider').flickity({
      pauseAutoPlayOnHover: false,
      prevNextButtons: false,
      cellAlign: 'center',
      freeScroll: false,
      wrapAround: false,
      draggable: false,
      pageDots: false,
      autoPlay: 3000,
      fade: true,
    });

    // Open & close modal
    $('.modal-toggle').click(function(){
      $('.modal').toggleClass('modal-show');
      $('.content').toggleClass('content-blurred');
      $('body').toggleClass('no-scroll');
    });

    // Reserve username form


    // Save user's first name
    $(".form").submit(function(e) {
      e.preventDefault();
      var value = $("#firstName").val();
      $('.first-name').text("Thank you," + " " + value + "!");
    });

    // Feather icons
    feather.replace()

    // ScrollReveal
    ScrollReveal().reveal('.hero, .title, .screen, .features, .cards, .zero-slider', {
      distance: '40px',
      duration: 2000,
      mobile: false,
      reset: false,
      opacity: 0
    });

  });
</script>

</body>

</html>