/*
  A sprite is any visual component present within your entity tree
  It can contain nested sprites or make canvas API calls
*/

class Sprite{

  constructor(x,y){
    // Error if x or y are invalid
    this.parent=undefined;
    this.children=[];
    this._bounds={};
    this._dx=x;
    this._dy=y;
  }

  /*
    Returns true if the given sprite overlaps with this sprite
    Overlap is calculated by bounding rectangles
  */
  overlaps(sprite){
    // Error if no sprite given
    var b1=this.getBounds();
    var b2=sprite.getBounds();
    return b1.x+b1.width>=b2.x && b1.x<=b2.x+b2.width && b1.y+b1.height>=b2.y && b1.y<=b2.y+b2.height;
  }

  /*
    Read or write a sprite's rectangle bounds
    addBounds takes in relative coordinates
    getBounds returns absolute coordinates
  */
  addBounds(x,y,w,h){
    if(this._bounds==undefined) this._bounds={x,y,w:x+w,h:y+h};
    else{
      if(x<this._bounds.x) this._bounds.x=x;
      if(y<this._bounds.y) this._bounds.y=y;
      if(x+w>this._bounds.w) this._bounds.w=x+w;
      if(y+h>this._bounds.h) this._bounds.h=y+h;
    }
  }
  getBounds(){
    return {x:this._bounds.x,y:this._bounds.y,width:this._bounds.w,height:this._bounds.h};
  }

  /*
    How do you draw this sprite
    _render is the internal recursive call, render is the user code
    dx and dy are the total parental offset
  */
  render(){}
  _render(dx,dy){
    let sx=dx+this._dx;
    let sy=dy+this._dy;
    this._bounds=undefined;
    arcade._ctx.translate(this._dx,this._dy);
    this.render();
    if(this._bounds==undefined) this._bounds={x:0,y:0,w:0,h:0};
    for(var a=0;a<this.children.length;a++){
      let child=this.children[a];
      child._render(sx,sy);
      this.addBounds(child._bounds.x-sx,child._bounds.y-sy,child._bounds.w,child._bounds.h);
    }
    arcade._ctx.translate(-this._dx,-this._dy);
    this._bounds.w-=this._bounds.x;
    this._bounds.h-=this._bounds.y;
    this._bounds.x+=sx;
    this._bounds.y+=sy;
  }

  /*
    Graphics API
  */
  drawImage(src,x,y){
    let img=arcade.assets.getImage(src);
    arcade._ctx.drawImage(img,x,y);
    this.addBounds(x,y,img.width,img.height);
  }

  /*
    What should this sprite do each frame
    delta is the number of seconds elapsed since the last frame
    _update is the internal recursive call, update is the user code
  */
  update(delta){}
  _update(delta){
    this.update(delta);
    for(var a=0;a<this.children.length;a++){
      this.children[a]._update(delta);
    }
  }

  /*
    What should this sprite do when it is clicked on
    _onclick is the internal recursive call, onclick is the user code
  */
  onclick(){}
  _onclick(){
    if(this==arcade._root || arcade.mouse.overlaps(this)){
      for(var a=this.children.length-1;a>=0;a--){
        if(this.children[a]._onclick()) return true;
      }
      this.onclick();
      return true;
    }
    return false;
  }

  /*
    Manipulate this sprite's children list
  */
  addChild(child){
    this.children.push(child);
    child.parent=this;
    // Error if it already has a parent
  }
  removeChild(child){
    this.children.remove(child);
    child.parent=undefined;
    // Error if it doesn't have a parent
  }

  /*
    Read or write this sprite's coordinates relative to its parent
    getOffset returns your current relative position
    addOffset increments your current relative location
    setOffset sets the current relative location
  */
  getOffset(){
    return {x:this._dx,y:this._dy};
  }
  addOffset(x,y){
    this._dx+=x;
    this._dy+=y;
  }
  setOffset(x,y){
    this._dx=x;
    this._dy=y;
  }
}
