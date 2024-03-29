/*
  A sprite is any visual component present within your entity tree
  It can contain nested sprites or make canvas API calls
*/

class Sprite{

  constructor(){
    this.parent=undefined;
    this.children=[];
    this._bounds={};
    this._fill=true;
    this._dx=0;
    this._dy=0;
  }

  /*
    Returns true if the given sprite overlaps with this sprite
    Overlap is calculated by bounding rectangles
  */
  overlaps(sprite){
    if(!sprite) return budgie.error("Must provide a sprite for overlaps()");
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
    budgie._ctx.translate(this._dx,this._dy);
    this.render();
    if(this._bounds==undefined) this._bounds={x:0,y:0,w:0,h:0};
    for(var a=0;a<this.children.length;a++){
      let child=this.children[a];
      child._render(sx,sy);
      this.addBounds(child._bounds.x-sx,child._bounds.y-sy,child._bounds.w,child._bounds.h);
    }
    budgie._ctx.translate(-this._dx,-this._dy);
    this._bounds.w-=this._bounds.x;
    this._bounds.h-=this._bounds.y;
    this._bounds.x+=sx;
    this._bounds.y+=sy;
  }

  /*
    Graphics API
    setColor takes either a hex value or r,g,b values from 0 to 255
    setDrawStyle sets the draw style to either fill (true) or stroke (false)
    setLineWidth sets line width for line strokes
    drawImage draws an image (you can get it from the assets manager)
    drawRect draws a rectangle
    drawOval draws an ellipse
    setFont sets the font and size of your text
    drawText renders some text, with optional width cap
  */
  setColor(r,g,b){
    let chars=['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
    if(arguments.length==1){
      let hex=r;
      r=hex >> 16;
      g=(hex >> 8) - (r << 8);
      b=hex - (r << 16) - (g << 8);
    }
    var color="#";
    color+=chars[Math.floor(r/16)]+chars[r%16];
    color+=chars[Math.floor(g/16)]+chars[g%16];
    color+=chars[Math.floor(b/16)]+chars[b%16];
    budgie._ctx.strokeStyle=color;
    budgie._ctx.fillStyle=color;
  }
  setDrawStyle(fill){
    this._fill=fill;
  }
  setLineWidth(lw){
    budgie._ctx.lineWidth=lw;
  }
  drawImage(img,x,y,sx,sy){
    if(!sx) sx=1;
    if(!sy) sy=1;
    let w=Math.abs(img.width*sx);
    let h=Math.abs(img.height*sy);
    budgie._ctx.translate(x,y);
    budgie._ctx.scale(sx,sy);
    budgie._ctx.drawImage(img,sx<0?-img.width:0,sy<0?-img.height:0);
    budgie._ctx.scale(1/sx,1/sy);
    budgie._ctx.translate(-x,-y);
    this.addBounds(x,y,w,h);
  }
  drawRect(x,y,w,h){
    if(this._fill) budgie._ctx.fillRect(x,y,w,h);
    else budgie._ctx.strokeRect(x,y,w,h);
    this.addBounds(x,y,w,h);
  }
  drawOval(x,y,w,h){
    this.addBounds(x,y,w,h);
    budgie._ctx.beginPath();
    budgie._ctx.ellipse(x+(w/2),y+(h/2),w/2,h/2,0,0,Math.PI*2);
    if(this._fill) budgie._ctx.fill();
    else budgie._ctx.stroke();
  }
  setFont(font,size){
    budgie._ctx.font=`${size}px ${font}`;
  }
  drawText(txt,x,y,w){
    if(w==undefined){
      let measure=budgie._ctx.measureText(txt);
      let h=measure.actualBoundingBoxAscent+measure.actualBoundingBoxDescent;
      if(this._fill) budgie._ctx.fillText(txt,x,y+h);
      else budgie._ctx.strokeText(txt,x,y+h);
      this.addBounds(x,y,measure.width,h);
    }else{
      let lines=[];
      let words=txt.split(' ');
      var max=0;
      while(words.length){
        let word=words.splice(0,1)[0];
        if(lines.length){
          let measure=budgie._ctx.measureText(`${lines[lines.length-1]} ${word}`);
          let h=measure.actualBoundingBoxAscent+measure.actualBoundingBoxDescent;
          if(measure.width<w) lines[lines.length-1]+=` ${word}`;
          else lines.push(word);
          if(h>max) max=h;
        }else lines.push(word);
      }
      for(var a=0;a<lines.length;a++){
        if(this._fill) budgie._ctx.fillText(lines[a],x,y+(a*max)+max);
        else budgie._ctx.strokeText(lines[a],x,y+(a*max)+max);
      }
      this.addBounds(x,y,w,max*lines.length);
    }
  }
  drawLine(x1,y1,x2,y2){
    budgie._ctx.beginPath();
    budgie._ctx.moveTo(x1,y1);
    budgie._ctx.lineTo(x2,y2);
    budgie._ctx.stroke();
    this.addBounds(Math.min(x1,x2),Math.min(y1,y2),Math.abs(x1-x2),Math.abs(y1-y2));
  }
  drawShape(){
    if(arguments.length<6) return budgie.error("Too few arguments for drawShape()");
    if(arguments.length%2) return budgie.error("Cannot call drawShape() with an odd number of arguments");
    budgie._ctx.beginPath();
    budgie._ctx.moveTo(arguments[0],arguments[1]);
    var right=arguments[0];
    var left=arguments[0];
    var top=arguments[1];
    var bot=arguments[1];
    for(var a=2;a<arguments.length;a+=2){
      budgie._ctx.lineTo(arguments[a],arguments[a+1]);
      if(arguments[a]>right) right=arguments[a];
      if(arguments[a+1]>bot) bot=arguments[a+1];
      if(arguments[a+1]<top) top=arguments[a+1];
      if(arguments[a]<left) left=arguments[a];
    }
    budgie._ctx.closePath();
    if(this._fill) budgie._ctx.fill();
    else budgie._ctx.stroke();
    this.addBounds(left,top,right-left,bot-top);
  }
  getContext(){
    return budgie._ctx;
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
    if(this==budgie._root || budgie.mouse.overlaps(this)){
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
    if(child.parent) return budgie.error("Provided child already has a parent sprite");
    this.children.push(child);
    child.parent=this;
  }
  removeChild(child){
    if(!child.parent) return budgie.error("Provided child does not have a parent");
    var i=this.children.indexOf(child);
    if(i==-1) return budgie.error("This sprite is not the provided child's parent");
    this.children.splice(i,1);
    child.parent=undefined;
  }

  /*
    Move this sprite around in its parent's child list
  */
  moveToBack(){
    if(!this.parent) return budgie.error("This sprite does not have a parent");
    var i=this.parent.children.indexOf(this);
    this.parent.children.splice(i,1);
    this.parent.children.unshift(this);
  }
  moveToFront(){
    if(!this.parent) return budgie.error("This sprite does not have a parent");
    var i=this.parent.children.indexOf(this);
    this.parent.children.splice(i,1);
    this.parent.children.push(this);
  }
  placeBehind(sprite){
    if(!this.parent) return budgie.error("This sprite does not have a parent");
    var i=this.parent.children.indexOf(this);
    this.parent.children.splice(i,1);
    i=this.parent.children.indexOf(sprite);
    if(i<0) return budgie.error("The provided sprite is not a sibling");
    this.parent.children.splice(i,0,this);
  }
  placeInFront(sprite){
    if(!this.parent) return budgie.error("This sprite does not have a parent");
    var i=this.parent.children.indexOf(this);
    this.parent.children.splice(i,1);
    i=this.parent.children.indexOf(sprite);
    if(i<0) return budgie.error("The provided sprite is not a sibling");
    this.parent.children.splice(i+1,0,this);
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
