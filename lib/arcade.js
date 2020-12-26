
class Arcade{

  constructor(){
    this._canvas=document.getElementById("canvas");
    this._ctx=this._canvas.getContext("2d");
    this.assets=new AssetsManager();
    this._root=new Sprite(0,0);
    this.mouse=new Sprite(0,0);
    let mouse=this.mouse;
    this.mouse.getBounds=function(){
      return {x:mouse._dx,y:mouse._dy,width:0,height:0};
    }
  }

  /*
    Main engine loop
    start initiates the loop
    frame begins a single frame
  */
  start(){
    this.frame();
    let that=this;
    setTimeout(function(){
      that.frame(0.2);
    },200);
  }
  frame(delta){
    let progress=this.assets.getProgress();
    if(progress<1.0){
      console.log(`Loading ${Math.floor(progress*100)}%`);
    }
    this._ctx.clearRect(0,0,this._canvas.width,this._canvas.height);
    this._root._render(0,0);
    this._root._update(delta);
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
    Interface for DOM event handling
  */
  _onmousemove(e){
    let rect=this._canvas.getBoundingClientRect();
    this.mouse.setOffset(e.clientX-rect.left,e.clientY-rect.top);
  }
  _onclick(e){
    //console.log(`Click at ${this.mouse._dx}, ${this.mouse._dy}!`);
    this._root._onclick();
  }

}
