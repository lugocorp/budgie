
class Arcade{

  constructor(){
    var canvas=document.getElementById("canvas");
    this._ctx=canvas.getContext("2d");
    this.assets=new AssetsManager();
    this._root=new Sprite(0,0);
    this.mouse=new Sprite(0,0);
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
    this._root._render(delta);
  }

  _onmousemove(e){
    // Set this.mouse's coordinates
  }
  _onclick(e){
    console.log("Click!");
  }

}
