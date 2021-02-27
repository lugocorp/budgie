<!DOCTYPE html>
<html>
<head>
  <?php $DIR="..";?>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="./style.css"/>
  <title>Budgie - examples</title>
</head>
<body>
  <?php include("../navbar.php");?>

  <!-- Splash -->
  <div id="splash">
    <h1>Examples</h1>
  </div>

  <div class="section">
    <h1>Overview</h1>
    <p>
      Here you can find some examples of Budgie code.
      There's also some shortcuts for navigation on this page.
    </p>
    <div class="shortcuts">
      <a href="#enemy-sprite">Simple Enemy Sprite</a>
      <a href="#sprite-subclass">Sprite Subclass</a>
    </div>
  </div>

  <hr>

  <!-- Simple Enemy Sprite -->
  <div class="section" id="enemy-sprite">
    <h1>Simple Enemy Sprite</h1>
    <div class="code">
      let enemy=new Sprite();<br>
      enemy.render=function(){<br>
      &nbsp;&nbsp;&nbsp;&nbsp;enemy.renderRect(0,0,50,75);<br>
      }
    </div>
  </div>

  <hr>

  <!-- Sprite Subclass -->
  <div class="section" id="sprite-subclass">
    <h1>Sprite Subclass</h1>
    <div class="code">
      class Enemy extends Sprite{<br>
      &nbsp;&nbsp;&nbsp;&nbsp;render(){<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this.drawRect(0,0,50,75);<br>
      &nbsp;&nbsp;&nbsp;&nbsp;}<br>
      }
    </div>
  </div>

  <?php include("../footer.php");?>
</body>
</html>
