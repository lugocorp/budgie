
class Sprite{

  constructor(x,y){
    this.children=[];
    this.height=0;
    this.width=0;
    this.x=x;
    this.y=y;
  }

  /*
    What should this sprite do each frame
    delta is the number of seconds elapsed since the last frame
  */
  render(delta){}
  _render(delta){
    arcade._ctx.translate(this.x,this.y);
    //arcade._ctx.drawImage(arcade.assets.getImage("mario.png"),0,0);
    this.render(delta);
    for(var a=0;a<this.children.length;a++){
      this.children[a]._render(delta);
    }
    arcade._ctx.translate(-this.x,-this.y);
  }

  onclick(){}
  _onclick(){
    if(arcade.mouse.overlaps(this)){
      for(var a=this.children.length-1;a>=0;a--){
        if(this.children[a]._onclick()) return true;
      }
      this.onclick();
      return true;
    }
    return false;
  }

  overlaps(sprite){
    return this.x+this.width>=sprite.x && this.x<=sprite.x+sprite.width && this.y+this.height>=sprite.y && this.y<=sprite.y+sprite.height;
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
