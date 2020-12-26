
class Arcade{

  constructor(){
    this._canvas=document.getElementById("canvas");
    this._ctx=this._canvas.getContext("2d");
    this.assets=new AssetsManager();
    this._root=new Sprite(0,0);
    this.mouse=new Sprite(0,0);
    this._root.width=this._canvas.width;
    this._root.height=this._canvas.height;
  }

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
    this._root._render(delta);
  }

  getWidth(){
    return this._canvas.width;
  }
  getHeight(){
    return this._canvas.height;
  }

  _onmousemove(e){
    let rect=this._canvas.getBoundingClientRect();
    this.mouse.x=e.clientX-rect.left;
    this.mouse.y=e.clientY-rect.top;
  }
  _onclick(e){
    console.log(`Click at ${this.mouse.x}, ${this.mouse.y}!`);
    this._root._onclick();
  }

}
