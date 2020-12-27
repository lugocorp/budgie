/*
  This is the keys manager
  It helps abstract the browser's built-in key event API
*/

class KeysManager{

  constructor(){
    this._keys=[];
  }

  /*
    Converts raw DOM key events into internal engine events
    _keyDown is for when a key was pressed or is held
    _keyUp is for when a key was released
  */
  _keyDown(key){
    let i=this._keys.indexOf(key);
    if(i==-1){
      this._keys.push(key);
      return {action:this.ACTION_DOWN,key};
    }
    return {action:this.ACTION_HOLD,key};
  }
  _keyUp(key){
    let i=this._keys.indexOf(key);
    if(i==-1) return undefined;
    this._keys.splice(i,1);
    return {action:this.ACTION_UP,key};
  }

  /*
    Constants representing the different key event actions
  */
  ACTION_DOWN=0
  ACTION_HOLD=1
  ACTION_UP=2

}
