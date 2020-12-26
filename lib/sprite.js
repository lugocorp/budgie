
class Sprite{

  constructor(x,y){
    this.children=[];
    this.x=x;
    this.y=y;
    this.w=0;
    this.h=0;
  }

  /*
    What should this sprite do each frame
    delta is the number of seconds elapsed since the last frame
  */
  render(delta){}
  _render(delta){
    //arcade._ctx.drawImage(arcade.assets.getImage("mario.png"),0,0);
    this.render(delta);
    for(var a=0;a<this.children.length;a++){
      this.children[a]._render(delta);
    }
  }

  /*
    Add a child sprite to this one
  */
  addChild(child){
    this.children.push(child);
  }

  /*
    Remove a child sprite from this one
  */
  removeChild(child){
    this.children.remove(child);
  }
}
