#! /usr/bin/env node
const mime=require("mime-types");
const path=require("path");
const open=require("open");
const fs=require("fs");
let cmd=process.argv[2];
let source=__dirname;
let project=".";

// Throw an error
function error(msg){
  process.stderr.write("\u001b[1m\u001b[31mError\u001b[0m ");
  process.stderr.write(msg);
  process.stderr.write("\n");
  for(var a=1;a<arguments.length;a++){
    console.log(arguments[a]);
  }
  process.exit(1);
}

// Default files
function getDefaultConfig(){
  return "{\n\t\"name\":\"Budgie\",\n\t\"latency\":20,\n\t\"viewport\":{\n\t\t\"width\":1500,\n\t\t\"height\":1000\n\t}\n}\n";
}
function getDefaultIndex(){
  return "// Welcome to Budgie!\n// Brought to you by LugoCorp\n\nbudgie.onstart=function(){}\n\nbudgie.onclick=function(){}\n\nbudgie.onkeyevent=function(evt){}\n\nbudgie.onframe=function(delta){}\n";
}

// Build helpers
function recursiveList(root){
  let files=[];
  let folders=[root];
  while(folders.length){
    let dir=folders.splice(0,1)[0];
    let lst=fs.readdirSync(dir);
    for(var a=0;a<lst.length;a++){
      let file=`${dir}/${lst[a]}`;
      if(fs.statSync(file).isDirectory()) folders.push(file);
      else files.push(file.substring(root.length+1));
    }
  }
  return files;
}
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
  return assets.map(x => [x,mime.lookup(x)]).filter(x => typeof(x[1])=="string" && x[1].split("/")[0]==type).map(x => x[0]);
}

// Generate index.html
function getIndexFile(key,config,libs,user,assets){
  let images=getAssetsByType(assets,"image").map(x => `budgie.assets._registerImage("assets/${x}");`).join("");
  let audios=getAssetsByType(assets,"audio").map(x => `budgie.assets._registerAudio("assets/${x}");`).join("");
  let fonts=getAssetsByType(assets,"font").map(x => `@font-face{font-family:"${getFontName(x)}";src:url("assets/${x}");}`).join("");
  return `<!DOCTYPE html><html><head><meta charset="utf-8"><title>${config.name}</title>${libs}</head><body onkeyup="budgie._onkeyup(event)" onkeydown="budgie._onkeydown(event)" onresize="budgie._onresize()"><canvas id="canvas" width="500" height="300" onmousemove="budgie._onmousemove(event)" onmouseup="budgie._onclick(event)"></canvas></body><style>body{background-color:black;padding:0;margin:0;}canvas{transform:translate(-50%,-50%);background-color:white;position:absolute;left:50%;top:50%;}${fonts}</style><script>let budgie=new Budgie("${key}",${config.latency},${config.viewport.width},${config.viewport.height});</script>${user}<script>${images}${audios}budgie.assets._check();</script></html>`;
}

// Config validation
function getConfig(){
  try{
    var data=fs.readFileSync(`${project}/budgie.json`);
    return JSON.parse(data.toString());
  }catch(err){
    error("Missing or invalid budgie.json file");
  }
}

// Command handling
if(cmd=="open"){
  let file=path.resolve(`${project}/index.html`);
  if(fs.existsSync(file)){
    open(`file://${file}`);
  }else{
    error("Cannot find project's index.html file","Try this:","    budgie build","and then try again");
  }
}
else if(cmd=="init"){
  if(process.argv.length<4) error("No project name provided","Try this:","    budgie init <name>");
  project=process.argv[3];
  if(fs.existsSync(project)) error("That project already exists");

  // Setup project structure
  fs.mkdirSync(project,{recursive:true});
  fs.mkdirSync(`${project}/assets`);
  fs.mkdirSync(`${project}/src`);

  // Create default files
  fs.writeFileSync(`${project}/budgie.json`,getDefaultConfig());
  fs.writeFileSync(`${project}/src/index.js`,getDefaultIndex());
}
else if(cmd=="build"){
  let config=getConfig();
  let key=getKey(config.name);
  let assets=recursiveList(`${project}/assets`);
  let libs=recursiveList(`${source}/lib`).map(x => `<script src="${source}/lib/${x}"></script>`).join("");
  let user=recursiveList(`${project}/src`).map(x => `<script src="src/${x}"></script>`).join("");
  let html=getIndexFile(key,config,libs,user,assets);
  fs.writeFileSync(`${project}/index.html`,html);
}
else if(cmd=="package"){
  let config=getConfig();
  let key=getKey(config.name);
  let assets=recursiveList(`${project}/assets`);
  let libs=recursiveList(`${source}/lib`).map(x => {
    if(!fs.existsSync(`${source}/lib/${x}`)){
      error(`Could not find library file ${x}`);
    }
    return `<script>${fs.readFileSync(`${source}/lib/${x}`)}</script>`;
  }).join("");
  let user=recursiveList(`${project}/src`).map(x => {
    if(!fs.existsSync(`${project}/src/${x}`)){
      error(`Could not find user source file ${x}`);
    }
    return `<script>${fs.readFileSync(`${project}/src/${x}`)}</script>`;
  }).join("");
  let html=getIndexFile(key,config,libs,user,assets);
  fs.writeFileSync(`${project}/index.html`,html);
}
else{
  console.log("Usage: budgie <command>");
  console.log("  init      Initializes a new project");
  console.log("  package   Builds your project into an HTML5 game for production");
  console.log("  build     Builds your project into an HTML5 game for testing");
  console.log("  open      Opens your project in the browser");
}
