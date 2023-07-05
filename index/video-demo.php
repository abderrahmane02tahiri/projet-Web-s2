<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <title>Doomout</title>
  <meta name="title" content="Doomout">
  <meta name="author" content="@ijazulrehman">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://doomout.com/">
  <meta property="og:title" content="Doomout">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://doomout.com/">
  <meta property="twitter:title" content="Doomout">
  <link href="images/thumbnail.jpg" rel="apple-touch-icon">
  <link href="images/favicon.ico" rel="shortcut icon">
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>
  <div class="modal">
  <button type="button" class="modal-close modal-toggle"><i class="icon" data-feather="x"></i><span class="hide-mobile">ESC</span></button>
  <div class="modal-content">
    <div class="success">
      <a href="index.html" class="logo"><img src="images/logodo.png" alt="logo"/></a>
      <!-- <a href="index.html" >
          <div class="flip-container">
              <div class="flipper">
              <div class="front"></div>
              <div class="back"></div>
              </div>
            </div>
      </a> -->
      <h2 class="modal-title first-name" id="title-name"></h2>
      <p>You're on the list! We'll be in touch.</p>
      <a href="index.html" class="button">Back home</a>
    </div>
    <div class="form-content">
      <a href="index.html" class="logo"><img src="images/logodo.png" alt="logo"/></a>
      <!-- <a href="index.html" >
          <div class="flip-container">
              <div class="flipper">
              <div class="front"></div>
              <div class="back"></div>
              </div>
          </div>
      </a> -->
      <h2 class="modal-title">Rejoignez-nous dès maintenant</h2>
      <p class="modal-subtitle">Rejoignez nous maintenant, et commencer votre journée.</p>
      <form class='form' name='doomoutForm' method='POST'><input type='hidden' name='form-name' value='doomoutForm' />
        <div class="group">
          <input type="text" id="firstName" name="first-name" placeholder="&nbsp;" autocomplete="off" required>
          <label for="first-name">Nom et Prénon</label>
          <span class="border"></span>
        </div>
        <div class="group">
          <input type="email" name="email" placeholder="&nbsp;" autocomplete="off" required>
          <label for="email">Email</label>
          <span class="border"></span>
        </div>
        <button type="submit" class="button">Join the waitlist</button>
      </form>
    </div>
  </div>
</div>
  <div class="content">
      <a href="index.html" class="logo"><img src="images/logodo.png" alt="logo"/></a>


    <div class="hero">
      <h1 class="title">Explorer</h1>
      <h1 class="title shift clip">
        <span class="word-shift">
          <b class="is-visible">Innovation&nbsp;</b>
          <b>créativité</b>
          <b>productivité</b>
        </span>
      </h1>
      <button class="button modal-toggle">Join the waitlist</button>
      <!-- <p class="subtitle">Available soon for Mac <img src="images/logo-apple.svg" alt="apple"/></p> -->
    </div>
    <div class="screen-wrapper">
      <!-- <img src="images/screen.png" class="screen" alt="screen"/> -->
      <div class="outerVideoWrapper2">
      <div class="videoWrapper video">
          <!-- Copy & Pasted from YouTube -->
          <div class="videoPadding">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/b-jHGR1qV-0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
      </div>
    </div>


    <footer class="footer">
      <p>&copy; ClassBridge</p>
    </footer>
    </div>
  </div>
  <!-- <script src="./js/jquery/3.4.1/jquery.min.js"></script> -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
    $(".form").submit(function(e) {
      e.preventDefault();
      var $form = $(this);
      $.post($form.attr("action"), $form.serialize()).then(function() {
        $('.form-content').addClass('form-content-hide');
        $('.success').addClass('success-show');
      });
    });

    // Save user's first name
    $(".form").submit(function(e) {
      e.preventDefault();
      var firstName = $("#firstName").val();
      var email = $("#email").val();
      const someObject = {
        name: firstName,
        email: email
      }
      $('.first-name').text("Thank you," + " " + value + "!");

    });

    // Feather icons
    feather.replace()

    // ScrollReveal
    ScrollReveal().reveal('.hero, .title, .video, .screen, .features, .cards, .zero-slider', {
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