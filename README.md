<img src="budgie.svg" height="300px"/>

# Budgie
A lightweight HTML5 game engine for arcade-style games in the browser.
Provides a simple API to manage sprites and visual/audial assets.
Brought to you by [LugoCorp](http://lugocorp.net).

## Usage
#### Installation
```
# This installs the budgie command on your machine
npm install -g budgiejs
```

#### Create a project
```
# This is how you start a new Budgie.js project
budgie init <name>
```

#### Build your game
```
# This will convert your project code into a website
budgie build
```

#### Open in the browser
```
# Once you've built your game you can open it in the browser for testing
budgie open
```

## budgie.json details
#### name
A string that represents the name of your project.
It will be displayed in the title bar of your browser.

#### latency
This integer value represents the number of milliseconds in between each frame of your game's runtime. Set this to a lower number for higher FPS (but it may cause performance issues if you go too low).

#### viewport
This is an object with two keys, width and height. They're both integer values that represent the number of in-game pixels in either dimension along your game screen. Your game is automatically scaled from this ratio to fit within the browser window.

## Links
- [Devlog series](https://www.youtube.com/watch?v=pwEzWqjwZ_0) on the development of this project
- [GitHub](https://github.com/lugocorp/budgie) repository
- [NPM](https://www.npmjs.com/package/budgiejs) page
