var __php;
var __base;
var __project;
var __assetPath;
var __environment;
var __error_reporting;
var __assetPath;
var __language;
var __convert_to;
var __pathname = location.pathname; // /tmp/test.html
var __hostname = location.hostname; // localhost
var __search   = location.search;   // ?blah=2
var __url      = document.URL;      // http://localhost/tmp/test.html?blah=2#foobar
var __href     = location.href;     // http://localhost/tmp/test.html?blah=2#foobar
var __protocol = location.protocol; // http
var __host     = location.host;     // localhost
var __origin   = location.origin    // http://localhost
var __hash     = location.hash      // #foobar
var __scripts    = document.getElementsByTagName('script');
var __scriptPath = __scripts[__scripts.length-1].src.split('?')[0];
var __mydir      = __scriptPath.split('/').slice(0, -1).join('/')+'/';
var __loc        = window.location.pathname;
var __dir        = __loc.substring(0, __loc.lastIndexOf('/')) + '/';


var cleanArray = function (actual) {
  var newArray = new Array();
  for (var i = 0; i < actual.length; i++) {
    if (actual[i]) {
      newArray.push(actual[i]);
    }
  }
  return newArray;
}

var RemoveLastDirectoryPartOf = function (the_url, no = 1){
    var the_arr = the_url.split('/');
    the_arr = cleanArray(the_arr);
    for(i = 0; i < no; i++ ){
        the_arr.pop();
    }
    return( the_arr.join('/') );
}	

var assetPathFunction = function () {
    var scripts = document.querySelectorAll( 'script[src]' );
    var currentScript = scripts[ scripts.length - 1 ].src;
    var currentScriptChunks = currentScript.split( '/' );
    var currentScriptFile = currentScriptChunks[ currentScriptChunks.length - 1 ];
    return currentScript.replace( currentScriptFile, '' );
}

__assetPathFile = assetPathFunction();
__assetPath = RemoveLastDirectoryPartOf(__assetPathFile);
/* Read the App Configuration File */

console.log(gbl_phpshark_project);

var config_file = __dir + 'public/assets/app/asdsadsa942347097.xml';
/* Read the App Configuration File */

var readConfigXML = function (file){
    if (window.XMLHttpRequest) {
        // code for modern browsers
        var xmlhttp = new XMLHttpRequest();
     } else {
        // code for old IE browsers
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET", file, false);
    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState === 4){
            if(xmlhttp.status === 200 || xmlhttp.status == 0){
                var configData = xmlhttp.responseXML;
                if(!configData){
                    configData = (new DOMParser())
                          .parseFromString(xml.responseText,'text/xml');
                }
                var configuration = configData.getElementsByTagName("CONFIGURATION");
                var nodes = configuration[0].getElementsByTagName("PHP")[0].childNodes;
                    __php = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("BASE")[0].childNodes;
                    __base = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("PROJECT")[0].childNodes;
                    __project = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("ENVIRONMENT")[0].childNodes;
                    __environment = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("ERROR_REPORTING")[0].childNodes;
                    __error_reporting = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("LANGUAGE")[0].childNodes;
                    __language = nodes.length===1 ? nodes[0].nodeValue : "";
                var nodes = configuration[0].getElementsByTagName("CONVERT_TO")[0].childNodes;
                    __convert_to = nodes.length===1 ? nodes[0].nodeValue : "";
            }
        }
    }
    xmlhttp.send(null);
}

readConfigXML(config_file);