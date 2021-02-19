/*
  This is the main class for the game engine
  Everything you'll need to access or override is in an instance of this class
*/

class Budgie{

  constructor(key,latency,viewX,viewY){
    this._canvas=document.getElementById("canvas");
    this._ctx=this._canvas.getContext("2d");
    this.storage=new StorageManager(key);
    this._viewport={w:viewX,h:viewY};
    this.assets=new AssetsManager();
    this.keys=new KeysManager();
    this._aspect=viewX/viewY;
    this.mouse=new Sprite();
    this._root=new Sprite();
    this._latency=latency;
    this._alive=true;
    this._onresize();

    // Disable anti-aliasing
    this._ctx.webkitImageSmoothingEnabled=false;
    this._ctx.mozImageSmoothingEnabled=false;
    this._ctx.imageSmoothingEnabled=false;

    // Bound functions
    let that=this;
    this.mouse.getBounds=function(){
      return {x:that.mouse._dx,y:that.mouse._dy,width:0,height:0};
    }
    this.assets._oncomplete=function(){
      that.onstart();
      that._frame(0.0);
    }
  }

  /*
    Event handler hooks
  */
  onstart(){}
  onclick(){}
  onkeyevent(e){}
  onframe(delta){}

  /*
    Throw an error
  */
  error(msg){
    this._alive=false;
    throw msg;
  }

  /*
    Main engine loop
    frame begins a single frame
  */
  _frame(delta){
    this.onframe(delta);
    let progress=this.assets.getProgress();
    if(progress<1.0){
      console.log(`Loading ${Math.floor(progress*100)}%`);
    }
    this._ctx.clearRect(0,0,this._canvas.width,this._canvas.height);
    this._ctx.scale(this._ratio,this._ratio);
    this._root._render(0,0);
    this._ctx.scale(1/this._ratio,1/this._ratio);
    if(!this._alive) return;
    this._root._update(delta);
    if(!this._alive) return;
    let that=this;
    setTimeout(function(){
      that._frame(that._latency/1000);
    },this._latency);
  }

  /*
    Get HTML canvas dimensions
  */
  getWidth(){
    return this._viewport.w;
  }
  getHeight(){
    return this._viewport.h;
  }

  /*
    Child nodes wrappers
  */
  addSprite(child){
    this._root.addChild(child);
  }
  removeSprite(child){
    this._root.removeChild(child);
  }

  /*
    Interface for DOM event handling
  */
  _onmousemove(e){
    let rect=this._canvas.getBoundingClientRect();
    let mx=(e.clientX-rect.left)/this._ratio;
    let my=(e.clientY-rect.top)/this._ratio;
    this.mouse.setOffset(mx,my);
  }
  _onclick(e){
    this._root._onclick();
    this.onclick();
  }
  _onkeydown(e){
    let evt=this.keys._keyDown(e.keyCode);
    if(evt) this.onkeyevent(evt);
  }
  _onkeyup(e){
    this.onkeyevent(this.keys._keyUp(e.keyCode));
  }
  _onresize(){
    let h=window.innerHeight;
    let w=window.innerWidth;
    let ratio=w/h;
    if(ratio<this._aspect){
      this._ratio=Math.floor(100*w/this._viewport.w)/100;
      canvas.width=this._ratio*this._viewport.w;
      canvas.height=canvas.width/this._aspect;
    }else{
      this._ratio=Math.floor(100*h/this._viewport.h)/100;
      canvas.height=this._ratio*this._viewport.h;
      canvas.width=canvas.height*this._aspect;
    }
  }

}
