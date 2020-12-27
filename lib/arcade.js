/*
  This is the main class for the game engine
  Everything you'll need to access or override is in an instance of this class
*/

class Arcade{

  constructor(){
    this._canvas=document.getElementById("canvas");
    this._ctx=this._canvas.getContext("2d");
    this.storage=new StorageManager();
    this.assets=new AssetsManager();
    this.keys=new KeysManager();
    this._root=new Sprite();
    this.mouse=new Sprite();
    this._latency=200;
    this._aspect=1.5;
    this._alive=true;
    this._onresize();
    let mouse=this.mouse;
    this.mouse.getBounds=function(){
      return {x:mouse._dx,y:mouse._dy,width:0,height:0};
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
    start initiates the loop
    frame begins a single frame
  */
  start(){
    this.onstart();
    this.frame(0.0);
  }
  frame(delta){
    this.onframe(delta);
    let progress=this.assets.getProgress();
    if(progress<1.0){
      console.log(`Loading ${Math.floor(progress*100)}%`);
    }
    this._ctx.clearRect(0,0,this._canvas.width,this._canvas.height);
    this._root._render(0,0);
    if(!this._alive) return;
    this._root._update(delta);
    if(!this._alive) return;
    let that=this;
    setTimeout(function(){
      that.frame(that._latency/1000);
    },this._latency);
  }

  /*
    Get HTML canvas dimensions
  */
  getWidth(){
    return this._canvas.width;
  }
  getHeight(){
    return this._canvas.height;
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
    this.mouse.setOffset(e.clientX-rect.left,e.clientY-rect.top);
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
    let w=window.innerWidth;
    let h=window.innerHeight;
    let ratio=w/h;
    if(ratio<this._aspect){
      canvas.height=w/this._aspect;
      canvas.width=w;
    }else{
      canvas.width=h*this._aspect;
      canvas.height=h;
    }
  }

}
