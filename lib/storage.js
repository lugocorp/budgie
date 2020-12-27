/*
  This is the storage manager
  It allows you to read and write to browser memory
  Use this for saving high scores and junk
*/

class StorageManager{

  constructor(){
    this._key="arcade_data";
    this._data={};
  }

  /*
    Directly read and write internal storage
  */
  remove(k){
    delete this._data[k];
  }
  put(k,v){
    this._data[k]=v;
  }
  get(k){
    return this._data[k];
  }

  /*
    Load or save to the browser's memory
  */
  delete(){
    localStorage.removeItem(this._key);
  }
  load(){
    this._data=localStorage.getItem(this._key);
    if(!this._data) this._data={};
  }
  save(){
    localStorage.setItem(this._key,this._data);
  }
}
