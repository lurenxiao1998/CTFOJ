const fs = require('fs');

function addMapping(router, mapping) {
    for (const url in mapping) {
        console.log(url);
        if (url.startsWith('GET ')) {
            const path = url.substring(4);
            router.get(path, mapping[url]);
        } else if (url.startsWith('POST ')) {
            const path = url.substring(5);
            router.post(path, mapping[url]);
        } else {
            console.log(`invalid URL: ${url}`);
        }
    }
}

function addControllers(router, dir) {
    fs.readdirSync(__dirname + '/' + dir).filter(f => {
        return f.endsWith('.js');
    }).forEach(f => {
        console.log(f);
        const mapping = require(__dirname + '/' + dir + '/' + f);
        addMapping(router, mapping);
    });
}

module.exports = (dir) => {
    const controllers_dir = dir || 'controllers';
    const router = require('koa-router')();
    addControllers(router, controllers_dir);
    return router.routes();
};