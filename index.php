<!DOCTYPE html>
<html>
<head>
  <?php $DIR=".";?>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="./style.css"/>
  <title>Budgie</title>
</head>
<body>
  <?php include("./navbar.php");?>

  <!-- Splash -->
  <div id="splash">
    <p>Make arcade-style HTML5 games with Budgie!</p>
    <div>
      <div>
        <img src="res/budgie.svg"/>
      </div>
      <div>
        <iframe src="https://www.youtube.com/embed/igH6NGK7Jwo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- About -->
  <div id="about" class="section">
    <h1>About Budgie</h1>
    <p>
      Budgie is a lightweight game framework for HTML5 that allows you to create simple arcade-style games for the browser.
      It provides a command line tool to create new projects as well as a browser-side JavaScript library for game development.
      The API is designed to be easy to use and provide quick access to your game's assets.
      Budgie provides hooks for common events such as key presses and mouse clicks, which you can tap into to craft your game's controls.
    </p>
    <div class="links">
      <a class="link-button" href="https://github.com/lugocorp/budgie">GitHub</a>
      <a class="link-button" href="<?php echo($DIR);?>/tool#install">Install</a>
    </div>
  </div>

  <!-- Features -->
  <div id="features" class="section green">
    <h1>Features</h1>
    <div class="left">
      <img src="res/budgie-icon.svg"/>
      <div>
        <h2>Sprite system</h2>
        <p>
          Budgie is a sprite-based game engine.
          Event handling and drawing are implemented in classes representing game objects.
          Budgie automatically connects game events such a redrawing or mouse clicks to all your objects on the screen.
          This allows you to focus on developing your game entities with object-oriented programming.
        </p>
      </div>
    </div>
    <div class="right">
      <div>
        <h2>Asset loading</h2>
        <p>
          Budgie provides a loading screen so that your game doesn't experience any pop-in due to unloaded assets.
          There's no need for developers to manually inject assets into their project - they are automatically added at compile time.
          Graphics, audio, and fonts can all be accessed using the engine's streamlined API.
        </p>
      </div>
      <img src="res/budgie-icon.svg"/>
    </div>
    <div class="left">
      <img src="res/budgie-icon.svg"/>
      <div>
        <h2>Browser-based deployment</h2>
        <p>
          Budgie games are made for browsers.
          Compile JavaScript code into an arcade game that can run on any HTML5-compliant browser!
          HTML5 canvas and asset APIs are abstracted for more streamlined access within the engine.
          It even automatically handles window resizing and scaling your graphical assets, with optional anti-aliasing.
        </p>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <div id="contact" class="section">
    <h1>Contact</h1>
    <p>
      Contact us if you would like to report a bug or request a feature.
      We'd love to work with our community to constantly improve our products!
    </p>
    <div class="links">
      <a href="mailto:alugocp@aim.com"><img src="res/email.svg"/></a>
    </div>
  </div>

  <!-- Donate -->
  <div id="donate" class="section green">
    <h1>Donate</h1>
    <p>
      Budgie is completely free to use and open source.
      If you really enjoy using the framework and have a few dollars lying around, you can donate them here.
    </p>
    <div class="links">
      <a class="link-button" href="">Donate</a>
    </div>
  </div>

  <?php include("./footer.php");?>
</body>
</html>
