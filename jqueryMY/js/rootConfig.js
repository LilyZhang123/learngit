seajs.config({
   alias: {
       // "$": "../../js/jquery.js",
        "handlebars": "/1v/gallery/handlebars/handlebars.js",
        "ajaxOne": "/1v//component/ajax-one/ajax-one.js",
        "textPlugin":"/1v/seajs/plugin-text.js",
        "pagination":"/1v/gallery/pagination/src/pagination.js",
        "util":'/1v/common/until.js',
        "labelmanages":'/1v/common/labelmanages.js',
        "sugar":'/1v/gallery/sugar/sugar_1.3.9.js',
        "jquerymy":'/1v/gallery/jqueryMy/jqueryMy.js',
   },
   // 映射配置
   map: [
      // ['static/',''],
      [".js", ".js?v=2016081115"],
      [".css", ".css?v=2016081115"]
   ],

   // 调试模式
   //debug: 1,

   // 文件编码
   charset: 'utf-8',

   //预加载jQuery
   preload: [ "handlebars","textPlugin","sugar",]
});