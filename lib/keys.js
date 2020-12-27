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

  /*
    Constants representing the different key codes
  */
  KEY_BACKSPACE=8
  KEY_TAB=9
  KEY_ENTER=13
  KEY_SHIFT=16
  KEY_CTRL=17
  KEY_ALT=18
  KEY_CAPS_LOCK=20
  KEY_ESC=27
  KEY_SPACE=32
  KEY_PAGE_UP=33
  KEY_PAGE_DOWN=34
  KEY_END=35
  KEY_HOME=36
  KEY_LEFT=37
  KEY_UP=38
  KEY_RIGHT=39
  KEY_DOWN=40
  KEY_INSERT=45
  KEY_DELETE=46
  KEY_0=48
  KEY_1=49
  KEY_2=50
  KEY_3=51
  KEY_4=52
  KEY_5=53
  KEY_6=54
  KEY_7=55
  KEY_8=56
  KEY_9=57
  KEY_A=65
  KEY_B=66
  KEY_C=67
  KEY_D=68
  KEY_E=69
  KEY_F=70
  KEY_G=71
  KEY_H=72
  KEY_I=73
  KEY_J=74
  KEY_K=75
  KEY_L=76
  KEY_M=77
  KEY_N=78
  KEY_O=79
  KEY_P=80
  KEY_Q=81
  KEY_R=82
  KEY_S=83
  KEY_T=84
  KEY_U=85
  KEY_V=86
  KEY_W=87
  KEY_X=88
  KEY_Y=89
  KEY_Z=90
  KEY_NUM_0=96
  KEY_NUM_1=97
  KEY_NUM_2=98
  KEY_NUM_3=99
  KEY_NUM_4=100
  KEY_NUM_5=101
  KEY_NUM_6=102
  KEY_NUM_7=103
  KEY_NUM_8=104
  KEY_NUM_9=105
  KEY_MULT=106
  KEY_ADD=107
  KEY_SUB=109
  KEY_DECIMAL=110
  KEY_DIV=111
  KEY_F1=112
  KEY_F2=113
  KEY_F3=114
  KEY_F4=115
  KEY_F5=116
  KEY_F6=117
  KEY_F7=118
  KEY_F8=119
  KEY_F9=120
  KEY_F10=121
  KEY_F11=122
  KEY_F12=123
  KEY_NUM_LOCK=144
  KEY_SCROLL_LOCK=145
  KEY_SEMICOLON=186
  KEY_EQUAL=187
  KEY_COMMA=188
  KEY_DASH=189
  KEY_PERIOD=190
  KEY_FORWARD_SLASH=191
  KEY_OPEN_BRACKET=219
  KEY_BACK_SLASH=220
  KEY_CLOSE_BRACKET=221
  KEY_SINGLE_QUOTE=222

}
