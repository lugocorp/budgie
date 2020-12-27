const mime=require("mime-types");
const path=require("path");
const open=require("open");
const fs=require("fs");
let cmd=process.argv[2];
let project=".";

// Throw an error
function error(msg){
  process.stderr.write("Error: ");
  process.stderr.write(msg);
  process.stderr.write("\n");
  process.exit(1);
}

// Default files
function getDefaultConfig(){
  return "{\n\t\"name\":\"Arcade\",\n\t\"latency\":200,\n\t\"aspect\":1.5\n}\n";
}
function getDefaultIndex(){
  return "// Welcome to Arcade!\n// Brought to you by LugoCorp\n\narcade.onstart=function(){}\n\narcade.onclick=function(){}\n\narcade.onkeyevent=function(evt){}\n\narcade.onframe=function(delta){}\n";
}

// Build helpers
function getKey(name){
  var key="";
  for(var a=0;a<name.length;a++){
    let c=name.charAt(a);
    if(c==' ') key+='_';
    else if(c>='a' && c<='z') key+=c;
    else if(c>='A' && c<='Z') key+=c.toLowerCase();
  }
  return key;
}
function getFontName(filepath){
  var lst=filepath.split("/");
  var pieces=lst[lst.length-1].split(".");
  pieces.splice(pieces.length-1,1);
  return pieces.join(".");
}
function getAssetsByType(assets,type){
  return assets.filter(x => mime.lookup(x).split("/")[0]==type);
}

// Command handling
if(cmd=="init"){
  project=process.argv[3];
  if(fs.existsSync(project)) error("That project already exists");

  // Setup project structure
  fs.mkdirSync(project,{recursive:true});
  fs.mkdirSync(`${project}/assets`);
  fs.mkdirSync(`${project}/src`);

  // Create default files
  fs.writeFileSync(`${project}/arcade.json`,getDefaultConfig());
  fs.writeFileSync(`${project}/src/index.js`,getDefaultIndex());

  // Copy the lib directory
  fs.mkdirSync(`${project}/lib`);
  let lst=fs.readdirSync("lib");
  for(var a=0;a<lst.length;a++){
    fs.copyFileSync(`lib/${lst[a]}`,`${project}/lib/${lst[a]}`);
  }
}else if(cmd=="build"){
  var config;
  var data;
  try{
    data=fs.readFileSync(`${project}/arcade.json`);
    config=JSON.parse(data.toString());
  }catch(err){
    error("Missing or invalid arcade.json file");
  }
  let key=getKey(config.name);
  let libs=fs.readdirSync(`${project}/lib`).map(x => `<script src="lib/${x}"></script>`).join("");
  let user=fs.readdirSync(`${project}/src`).map(x => `<script src="src/${x}"></script>`).join("");
  let assets=fs.readdirSync(`${project}/assets`);
  let images=getAssetsByType(assets,"image").map(x => `arcade.assets._register("assets/${x}");`).join("");
  let fonts=getAssetsByType(assets,"font").map(x => `@font-face{font-family:"${getFontName(x)}";src:url("assets/${x}");}`).join("");
  let html=`<!DOCTYPE html><html><head><meta charset="utf-8"><title>${config.name}</title>${libs}</head><body onkeyup="arcade._onkeyup(event)" onkeydown="arcade._onkeydown(event)" onresize="arcade._onresize()"><canvas id="canvas" width="500" height="300" onmousemove="arcade._onmousemove(event)" onmouseup="arcade._onclick(event)"></canvas></body><style>body{background-color:black;padding:0;margin:0;}canvas{transform:translate(-50%,-50%);background-color:white;position:absolute;left:50%;top:50%;}${fonts}</style><script>let arcade=new Arcade("${key}",${config.latency},${config.aspect});</script>${user}<script>${images}arcade.start();</script></html>`;
  fs.writeFileSync(`${project}/index.html`,html);
}else if(cmd=="open"){
  let file=path.resolve(`${project}/index.html`);
  open(`file://${file}`);
}else{
  console.log("Usage: arcade command");
  console.log("  init    Initializes a new project");
  console.log("  build   Builds your project into an HTML5 game");
  console.log("  open    Opens your project in the browser");
}
