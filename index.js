const fs=require("fs");
let cmd=process.argv[2];
let path="../test-project";

// init
// write arcade.json
// copy lib folder
// create project structure
if(cmd=="init"){
  fs.mkdirSync(`${path}`,{recursive:true});
  fs.mkdirSync(`${path}/assets`,{recursive:true});
  fs.mkdirSync(`${path}/src`,{recursive:true});
  fs.writeFileSync(`${path}/arcade.json`,"");
  fs.writeFileSync(`${path}/src/index.js`,"");

  // Copy the lib directory
  let lst=fs.readdirSync("lib");
  fs.mkdirSync(`${path}/lib`,{recursive:true});
  for(var a=0;a<lst.length;a++){
    fs.copyFileSync(`lib/${lst[a]}`,`${path}/lib/${lst[a]}`);
  }
}

// build
// create index.html from file list and arcade.json
if(cmd=="build"){
  let data=fs.readFileSync(`${path}/arcade.json`);
  //let config=JSON.parse(data.toString());
  let libs=fs.readdirSync(`${path}/lib`).map(x => `<script src="lib/${x}"></script>`).join("");
  let user=fs.readdirSync(`${path}/src`).map(x => `<script src="src/${x}"></script>`).join("");
  let assets=fs.readdirSync(`${path}/assets`).map(x => `arcade.assets.register("assets/${x}");`).join("");
  let html=`<!DOCTYPE html><html><head><meta charset="utf-8">${libs}${user}</head><body onkeyup="arcade._onkeyup(event)" onkeydown="arcade._onkeydown(event)" onresize="arcade._onresize()"><canvas id="canvas" width="500" height="300" onmousemove="arcade._onmousemove(event)" onmouseup="arcade._onclick(event)"></canvas></body><style>body{background-color:black;padding:0;margin:0;}canvas{transform:translate(-50%,-50%);background-color:white;position:absolute;left:50%;top:50%;}</style><script>let arcade=new Arcade();${assets}arcade.start();</script></html>`;
  fs.writeFileSync(`${path}/index.html`,html);
}

// open
// open file in default browser
if(cmd=="open"){

}
