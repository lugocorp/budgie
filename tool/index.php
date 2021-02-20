<!DOCTYPE html>
<html>
<head>
  <?php $DIR="..";?>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="./style.css"/>
  <title>Budgie - tool</title>
</head>
<body>
  <?php include("../navbar.php");?>

  <!-- Splash -->
  <div id="splash">
    <h1>Tool</h1>
  </div>

  <!-- Install -->
  <div id="install" class="section">
    <h1>Install</h1>
    <p>
      Before you can use the Budgie game engine, you'll first need to install it on your system.
      Budgie is written in the Node.js language, and is available for download on <a href="https://www.npmjs.com/package/budgiejs">npm</a>.
      First you'll have to install Node.js onto your machine, then run this command from the command line:
    </p>
    <div class="code">npm install -g budgiejs</div>
    <p>
      you can also check out the project on <a href="https://www.npmjs.com/package/budgiejs">npm</a>.
    </p>
  </div>

  <hr>

  <!-- Usage -->
  <div id="usage" class="section">
    <h1>Usage</h1>
    <p>
      This section is a small primer on how to use the Budgie tool from the command line.
      It overviews over the different subcommands and what they do.
      This is how you access the Budgie command from your terminal:
    </p>
    <div class="code">budgiejs <i>command</i></div>
    <p>
      These are the available options for <i>command</i>:
    </p>
    <p>
      <ul>
        <li>init <i>name</i> - Create a new project called <i>name</i></li>
        <li>build - Builds the project as a website</li>
        <li>open - Opens a project in your default browser</li>
      </ul>
    </p>
  </div>

  <?php include("../footer.php");?>
</body>
</html>
