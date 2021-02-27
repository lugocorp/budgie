<!DOCTYPE html>
<html>
<head>
  <?php $DIR="..";?>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="./style.css"/>
  <title>Budgie - library</title>
</head>
<body>
  <?php include("../navbar.php");?>

  <!-- Splash -->
  <div id="splash">
    <h1>Library</h1>
  </div>

  <!-- Overview -->
  <div class="section">
    <h1>Overview</h1>
    <p>
      This is the full documentation for every class used in the Budgie game engine.
      Hidden fields are not shown here, as they should not be accessed directly or it may cause unintended behavior.
      Documentation is split up by classes, where each class has multiple fields and methods.
    </p>
    <p>Here are shortcuts to each of the classes:</p>
    <div class="shortcuts">
      <a href="#class-budgie">Budgie</a>
      <a href="#class-sprite">Sprite</a>
      <a href="#class-assets">AssetsManager</a>
      <a href="#class-storage">StorageManager</a>
      <a href="#class-keys">KeysManager</a>
    </div>
  </div>

  <hr>

  <!-- Budgie -->
  <div class="section" id="class-budgie">
    <h1><span class="token">class</span> Budgie</h1>
    <p>
      This class represents that entire game engine.
      It is automatically instantiated, so you should never have to call the constructor.
      You can access this class with the <i>budgie</i> variable.
    </p>
    <!--<div class="field">
      <h2><span class="token">constructor</span> Budgie<span class="args">(key, latency, viewx, viewy)</span></h2>
      <p>
        You will never have to call this constructor, it is already called and passed to the <i>budgie</i> variable.
        This function initializes the entire game engine instance.
        It takes the following parameters:
      </p>
      <ul>
        <li>key - a unique identifier string for your game. It is used in memory storage.</li>
        <li>latency - an integer value representing how many milliseconds should pass between each frame.</li>
        <li>viewx - the width of the intended game canvas</li>
        <li>viewy - the height of the intended game canvas</li>
      </ul>
    </div>-->
    <div class="field">
      <h2><span class="token">field</span> storage</h2>
      <p>
        This is an instance of <a>StorageManager</a> and allows you to save or load save data for your game
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> assets</h2>
      <p>
        This is an instance of <a>AssetsManager</a> and allows you to access your loaded game assets
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> keys</h2>
      <p>
        This is an instance of <a>KeysManager</a> and helps with key event processing
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> mouse</h2>
      <p>
        This is an invisible <a>Sprite</a> that represents the player's mouse pointer
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> onstart<span class="args">()</span></h2>
      <p>
        This function gets called by Budgie when all the assets are done loading.
        It is a hook that you'll have to implement yourself.
        You can do this like so:
        <div class="code">
          budgie.onstart=function(){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> onclick<span class="args">()</span></h2>
      <p>
        This function gets called whenever the player clicks with the mouse.
        It is a hook that you'll have to implement yourself.
        You can do this like so:
        <div class="code">
          budgie.onclick=function(){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> onkeyevent<span class="args">(e)</span></h2>
      <p>
        This function gets called whenever the player presses, holds or releases a key on the keyboard.
        It is a hook that you'll have to implement yourself.
        You can do this like so:
        <div class="code">
          budgie.onkeyevent=function(e){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
        <br>
        It also takes the following parameters:
      </p>
      <ul>
        <li>e - an object with <i>action</i> and <i>key</i> fields which correspond to <a>KeyManager</a> enum values</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> onframe<span class="args">(delta)</span></h2>
      <p>
        This function gets called once every frame.
        It is a hook that you'll have to implement yourself.
        You can do this like so:
        <div class="code">
          budgie.onframe=function(){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
        <br>
        It also takes the following parameters:
      </p>
      <ul>
        <li>delta - the time in seconds since this function was last called (will most likely be between 0 and 1)</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> error<span class="args">(msg)</span></h2>
      <p>
        This function prints an error message to the browser console and halts the game loop.
        It is called at several points in the engine to catch potential errors made by game developers.
        You can also use it for debugging.
        This function takes the following parameters:
      </p>
      <ul>
        <li>msg - the error message string to be printed to the console</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> getWidth<span class="args">()</span></h2>
      <p>
        This function returns the intended canvas width for your game
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> getHeight<span class="args">()</span></h2>
      <p>
        This function returns the intended canvas height for your game
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> addSprite<span class="args">(child)</span></h2>
      <p>
        This function adds a new sprite object onto the view.
        It takes in the following parameters:
      </p>
      <ul>
        <li>child - the sprite to be added to the game view</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> removeSprite<span class="args">(child)</span></h2>
      <p>
        This function adds a new sprite object onto the view.
        It takes in the following parameters:
      </p>
      <ul>
        <li>child - the sprite to be removed from the game view</li>
      </ul>
    </div>
  </div>

  <hr>

  <!-- AssetsManager -->
  <div class="section" id="class-assets">
    <h1><span class="token">class</span> AssetsManager</h1>
    <p>
      This class is used by the engine to load and control access to assets.
      You can access it via <i>budgie.assets</i>.
    </p>
    <div class="field">
      <h2><span class="token">function</span> getProgress<span class="args">()</span></h2>
      <p>
        This function returns a value between 0 and 1 representing the percentage of assets that have been loaded.
        You can use this function to implement loading screens, for example.
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> getAsset<span class="args">(path)</span></h2>
      <p>
        This function gives you a handle to any loaded asset you'd like.
        It takes the following parameters:
      </p>
      <ul>
        <li>path - a path in your assets folder representing the asset you'd like to access</li>
      </ul>
    </div>
  </div>

  <hr>

  <!-- StorageManager -->
  <div class="section" id="class-storage">
    <h1><span class="token">class</span> StorageManager</h1>
    <p>
      This class is used by the engine to load and save game data.
      It allow you to pull saved state from the browser, edit it, and later write it back for storage.
      You can access it via <i>budgie.storage</i>.
    </p>
    <div class="field">
      <h2><span class="token">function</span> get<span class="args">(k)</span></h2>
      <p>
        This function gets one piece of data from saved state.
        It takes the following parameters:
      </p>
      <ul>
        <li>k - the key of the data to retrieve</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> put<span class="args">(k,v)</span></h2>
      <p>
        This function puts one piece of data into saved state.
        It takes the following parameters:
      </p>
      <ul>
        <li>k - the key of the data to put</li>
        <li>v - the data to put</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> remove<span class="args">(k)</span></h2>
      <p>
        This function removes one piece of data from saved state.
        It takes the following parameters:
      </p>
      <ul>
        <li>k - the key of the data to remove</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> delete<span class="args">()</span></h2>
      <p>
        This function clears your saved state from the browser storage
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> save<span class="args">()</span></h2>
      <p>
        This function writes your saved state to the browser storage
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> load<span class="args">()</span></h2>
      <p>
        This function reads your saved state from the browser storage
      </p>
    </div>
  </div>

  <hr>

  <!-- KeysManager -->
  <div class="section" id="class-keys">
    <h1><span class="token">class</span> KeysManager</h1>
    <p>
      This class is used by the engine to handle key events.
      You can access it via <i>budgie.keys</i>.
    </p>
    <div class="field">
      <h2><span class="token">const</span> ACTION_DOWN</h2>
      <p>
        Represents the action where a key was pressed
      </p>
    </div>
    <div class="field">
      <h2><span class="token">const</span> ACTION_HOLD</h2>
      <p>
        Represents the action where a key is being held down
      </p>
    </div>
    <div class="field">
      <h2><span class="token">const</span> ACTION_UP</h2>
      <p>
        Represents the action where a key was released
      </p>
    </div>

  </div>

  <?php include("../footer.php");?>
</body>
</html>
