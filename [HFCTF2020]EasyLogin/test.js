var fs = require('fs');
var readDir = fs.readdirSync('app');
console.log(readDir);
const Koa = require('./app/app');
for (const url in Koa) {
  if (url.startsWith('GET ')) {
      
  } else if (url.startsWith('POST ')) {
  } else {
      console.log(`invalid URL: ${url}`);
  }
}