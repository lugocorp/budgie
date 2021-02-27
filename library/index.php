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
    <div class="field">
      <h2><span class="token">field</span> storage</h2>
      <p>
        This is an instance of <a href="#class-storage">StorageManager</a> and allows you to save or load save data for your game
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> assets</h2>
      <p>
        This is an instance of <a href="#class-assets">AssetsManager</a> and allows you to access your loaded game assets
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> keys</h2>
      <p>
        This is an instance of <a href="#class-keys">KeysManager</a> and helps with key event processing
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> mouse</h2>
      <p>
        This is an invisible <a href="#class-sprite">Sprite</a> that represents the player's mouse pointer
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
        <li>e - an object with <i>action</i> and <i>key</i> fields which correspond to <a href="#class-keys">KeyManager</a> enum values</li>
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

  <!-- Sprite -->
  <div class="section" id="class-sprite">
    <h1><span class="token">class</span> Sprite</h1>
    <p>
      This class represents a basic game object within the engine.
      You can instantiate a new Sprite by calling <i>new Sprite()</i>.
    </p>
    <div class="field">
      <h2><span class="token">constructor</span> Sprite<span class="args">()</span></h2>
      <p>
        Initializes a new Sprite instance
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> children</h2>
      <p>
        A list of this sprite's child sprites
      </p>
    </div>
    <div class="field">
      <h2><span class="token">field</span> parent</h2>
      <p>
        This sprite's parent sprite.
        Will be null if this sprite has no parent.
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> overlaps<span class="args">(sprite)</span></h2>
      <p>
        Returns true if this sprite overlaps with the sprite given as an argument.
        Overlap is calculated by bounding rectangles.
        This function takes the following arguments:
      </p>
      <ul>
        <li>sprite - the sprite you want to check for collision with this sprite</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> addBounds<span class="args">(x,y,w,h)</span></h2>
      <p>
        Extends the area of this sprite's bounding rectangle.
        This function takes the following arguments:
      </p>
      <ul>
        <li>x - the x offset of your extended rectangular area</li>
        <li>y - the y offset of your extended rectangular area</li>
        <li>w - the width of your extended rectangular area</li>
        <li>h - the height of your extended rectangular area</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> getBounds<span class="args">(sprite)</span></h2>
      <p>
        Returns this sprite's bounding rectangle in absolute coordinates.
        Returns an object with x, y, width, and height fields.
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> render<span class="args">()</span></h2>
      <p>
        This hook is called every time the sprite is supposed to redraw itself onto the canvas.
        You can implement it like so:
        <div class="code">
          this.render=function(){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> setColor<span class="args">(r,g,b)</span></h2>
      <p>
        Sets the color to be used for draw functions.
        Takes the following arguments:
      </p>
      <ul>
        <li>r - red value within [0,255]</li>
        <li>g - green value within [0,255]</li>
        <li>b - blue value within [0,255]</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> setDrawStyle<span class="args">(fill)</span></h2>
      <p>
        Sets the draw style, whether that be fill or stroke.
        Takes the following arguments:
      </p>
      <ul>
        <li>fill - boolean representing whether to fill or stroke (true is fill, false is stroke)</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> setLineWidth<span class="args">(lw)</span></h2>
      <p>
        Sets the line width of your draw functions.
        Takes the following arguments:
      </p>
      <ul>
        <li>lw - line width you would like to use</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> drawImage<span class="args">(img,x,y,sx,sy)</span></h2>
      <p>
        Renders an image as part of this sprite.
        Takes the following arguments:
      </p>
      <ul>
        <li>img - an image object, which you can get from <a href="#class-assets">budgie.assets</a></li>
        <li>x - the x offset of where to draw the image</li>
        <li>y - the y offset of where to draw the image</li>
        <li>sx - how much to scale the image along the x axis</li>
        <li>sy - how much to scale the image along the y axis</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> drawRect<span class="args">(x,y,w,h)</span></h2>
      <p>
        Renders a rectangle as part of this sprite.
        Takes the following arguments:
      </p>
      <ul>
        <li>x - the x offset of where to draw the rectangle</li>
        <li>y - the y offset of where to draw the rectangle</li>
        <li>w - the width of the rectangle</li>
        <li>h - the height of the rectangle</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> drawOval<span class="args">(x,y,w,h)</span></h2>
      <p>
        Renders an oval as part of this sprite.
        Takes the following arguments:
      </p>
      <ul>
        <li>x - the x offset of where to draw the oval</li>
        <li>y - the y offset of where to draw the oval</li>
        <li>w - the width of the oval</li>
        <li>h - the height of the oval</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> setFont<span class="args">(font,size)</span></h2>
      <p>
        Sets the font to be used when rendering text.
        Uses the following arguments:
      </p>
      <ul>
        <li>font - the font of the text (will correspond to an asset)</li>
        <li>size - the font size of the text</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> drawText<span class="args">(txt,x,y,w)</span></h2>
      <p>
        Renders text on the canvas as part of this sprite.
        This function takes the following arguments:
      </p>
      <ul>
        <li>txt - the string to be rendered</li>
        <li>x - the x offset of the rendered text</li>
        <li>y - the y offset of the rendered text</li>
        <li>w - the text wrap width of a single line of rendered text (optional)</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> update<span class="args">(delta)</span></h2>
      <p>
        This function is called every frame.
        You can implement it like so:
        <div class="code">
          this.update=function(delta){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
        <br>
        This function takes the following arguments:
      </p>
      <ul>
        <li>delta - the number of seconds that have passed since this function was last called</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> onclick<span class="args">()</span></h2>
      <p>
        This function is called whenever this sprite is clicked on.
        You can implement it like so:
        <div class="code">
          this.onclick=function(){<br>
          &nbsp;&nbsp;&nbsp;&nbsp;// Your code here<br>
          }
        </div>
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> addChild<span class="args">(child)</span></h2>
      <p>
        Adds a child sprite to this sprite.
        Takes the following arguments:
      </p>
      <ul>
        <li>sprite - the child sprite to add</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> removeChild<span class="args">(child)</span></h2>
      <p>
        Removes a child sprite from this sprite.
        Takes the following arguments:
      </p>
      <ul>
        <li>sprite - the child sprite to remove</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> moveToBack<span class="args">()</span></h2>
      <p>
        Tells this sprite's parent to draw this sprite behind its siblings
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> moveToFront<span class="args">()</span></h2>
      <p>
        Tells this sprite's parent to draw this sprite in front of its siblings
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> placeBehind<span class="args">(sprite)</span></h2>
      <p>
        Tells this sprite's parent to draw this sprite behind <i>sprite</i>.
        Takes the following arguments:
      </p>
      <ul>
        <li>sprite - the sprite you want this sprite to be behind</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> placeInFront<span class="args">(sprite)</span></h2>
      <p>
        Tells this sprite's parent to draw this sprite in front of <i>sprite</i>.
        Takes the following arguments:
      </p>
      <ul>
        <li>sprite - the sprite you want this sprite to be in front of</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> getOffset<span class="args">()</span></h2>
      <p>
        Returns an object with x and y fields representing this sprite's offset from its parent
      </p>
    </div>
    <div class="field">
      <h2><span class="token">function</span> addOffset<span class="args">(x,y)</span></h2>
      <p>
        Increments this sprite's offset from its parent.
        Takes the following arguments:
      </p>
      <ul>
        <li>x - how much to augment the x offset</li>
        <li>y - how much to augment the y offset</li>
      </ul>
    </div>
    <div class="field">
      <h2><span class="token">function</span> setOffset<span class="args">(x,y)</span></h2>
      <p>
        Sets this sprite's offset from its parent.
        Takes the following arguments:
      </p>
      <ul>
        <li>x - the x offset to set</li>
        <li>y - the y offset to set</li>
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
      <p>Represents the action where a key was pressed</p>
    </div>
    <div class="field">
      <h2><span class="token">const</span> ACTION_HOLD</h2>
      <p>Represents the action where a key is being held down</p>
    </div>
    <div class="field">
      <h2><span class="token">const</span> ACTION_UP</h2>
      <p>Represents the action where a key was released</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_BACKSPACE</h2>
    	<p>Represents the backspace key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_TAB</h2>
    	<p>Represents the tab key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_ENTER</h2>
    	<p>Represents the enter key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SHIFT</h2>
    	<p>Represents the shift key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_CTRL</h2>
    	<p>Represents the ctrl key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_ALT</h2>
    	<p>Represents the alt key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_CAPS_LOCK</h2>
    	<p>Represents the caps_lock key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_ESC</h2>
    	<p>Represents the esc key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SPACE</h2>
    	<p>Represents the space key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_PAGE_UP</h2>
    	<p>Represents the page_up key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_PAGE_DOWN</h2>
    	<p>Represents the page_down key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_END</h2>
    	<p>Represents the end key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_HOME</h2>
    	<p>Represents the home key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_LEFT</h2>
    	<p>Represents the left key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_UP</h2>
    	<p>Represents the up key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_RIGHT</h2>
    	<p>Represents the right key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_DOWN</h2>
    	<p>Represents the down key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_INSERT</h2>
    	<p>Represents the insert key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_DELETE</h2>
    	<p>Represents the delete key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_0</h2>
    	<p>Represents the 0 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_1</h2>
    	<p>Represents the 1 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_2</h2>
    	<p>Represents the 2 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_3</h2>
    	<p>Represents the 3 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_4</h2>
    	<p>Represents the 4 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_5</h2>
    	<p>Represents the 5 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_6</h2>
    	<p>Represents the 6 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_7</h2>
    	<p>Represents the 7 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_8</h2>
    	<p>Represents the 8 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_9</h2>
    	<p>Represents the 9 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_A</h2>
    	<p>Represents the a key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_B</h2>
    	<p>Represents the b key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_C</h2>
    	<p>Represents the c key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_D</h2>
    	<p>Represents the d key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_E</h2>
    	<p>Represents the e key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F</h2>
    	<p>Represents the f key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_G</h2>
    	<p>Represents the g key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_H</h2>
    	<p>Represents the h key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_I</h2>
    	<p>Represents the i key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_J</h2>
    	<p>Represents the j key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_K</h2>
    	<p>Represents the k key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_L</h2>
    	<p>Represents the l key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_M</h2>
    	<p>Represents the m key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_N</h2>
    	<p>Represents the n key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_O</h2>
    	<p>Represents the o key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_P</h2>
    	<p>Represents the p key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_Q</h2>
    	<p>Represents the q key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_R</h2>
    	<p>Represents the r key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_S</h2>
    	<p>Represents the s key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_T</h2>
    	<p>Represents the t key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_U</h2>
    	<p>Represents the u key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_V</h2>
    	<p>Represents the v key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_W</h2>
    	<p>Represents the w key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_X</h2>
    	<p>Represents the x key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_Y</h2>
    	<p>Represents the y key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_Z</h2>
    	<p>Represents the z key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_0</h2>
    	<p>Represents the num_0 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_1</h2>
    	<p>Represents the num_1 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_2</h2>
    	<p>Represents the num_2 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_3</h2>
    	<p>Represents the num_3 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_4</h2>
    	<p>Represents the num_4 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_5</h2>
    	<p>Represents the num_5 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_6</h2>
    	<p>Represents the num_6 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_7</h2>
    	<p>Represents the num_7 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_8</h2>
    	<p>Represents the num_8 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_9</h2>
    	<p>Represents the num_9 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_MULT</h2>
    	<p>Represents the mult key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_ADD</h2>
    	<p>Represents the add key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SUB</h2>
    	<p>Represents the sub key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_DECIMAL</h2>
    	<p>Represents the decimal key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_DIV</h2>
    	<p>Represents the div key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F1</h2>
    	<p>Represents the f1 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F2</h2>
    	<p>Represents the f2 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F3</h2>
    	<p>Represents the f3 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F4</h2>
    	<p>Represents the f4 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F5</h2>
    	<p>Represents the f5 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F6</h2>
    	<p>Represents the f6 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F7</h2>
    	<p>Represents the f7 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F8</h2>
    	<p>Represents the f8 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F9</h2>
    	<p>Represents the f9 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F10</h2>
    	<p>Represents the f10 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F11</h2>
    	<p>Represents the f11 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_F12</h2>
    	<p>Represents the f12 key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_NUM_LOCK</h2>
    	<p>Represents the num_lock key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SCROLL_LOCK</h2>
    	<p>Represents the scroll_lock key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SEMICOLON</h2>
    	<p>Represents the semicolon key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_EQUAL</h2>
    	<p>Represents the equal key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_COMMA</h2>
    	<p>Represents the comma key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_DASH</h2>
    	<p>Represents the dash key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_PERIOD</h2>
    	<p>Represents the period key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_FORWARD_SLASH</h2>
    	<p>Represents the forward_slash key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_OPEN_BRACKET</h2>
    	<p>Represents the open_bracket key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_BACK_SLASH</h2>
    	<p>Represents the back_slash key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_CLOSE_BRACKET</h2>
    	<p>Represents the close_bracket key</p>
    </div>
    <div class="field">
    	<h2><span class="token">const</span> KEY_SINGLE_QUOTE</h2>
    	<p>Represents the single_quote key</p>
    </div>
  </div>

  <?php include("../footer.php");?>
</body>
</html>
