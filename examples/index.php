<!DOCTYPE html>
<html>
<head>
  <?php $DIR="..";?>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="../style.css"/>
  <link rel="stylesheet" href="../codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="../codemirror/theme/neo.css" />
  <script src="../codemirror/lib/codemirror.js"></script>
  <script src="../codemirror/mode/javascript/javascript.js"></script>
  <title>Budgie - examples</title>
  <script>
    function editor(div,value){
      CodeMirror(
        document.getElementById(div),
        {value,mode:"javascript",theme:"neo",lineNumbers:true,readOnly:true}
      );
    }
  </script>
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
    <div id="enemy-sprite"></div>
    <script>
      editor("enemy-sprite","\nlet enemy = new Sprite();\nenemy.render = function() {\n\tenemy.renderRect(0,0,50,75);\n}\n");
    </script>
  </div>

  <hr>

  <!-- Sprite Subclass -->
  <div class="section" id="sprite-subclass">
    <h1>Sprite Subclass</h1>
    <div id="sprite"></div>
    <script>
      editor("sprite","\nclass Enemy extends Sprite {\n\trender() {\n\t\tthis.drawRect(0,0,50,75);\n\t}\n}\n");
    </script>
  </div>

  <?php include("../footer.php");?>
</body>
</html>
