var phpshark_scripts= document.getElementsByTagName('script');
// remove any ?query
var phpshark_path= phpshark_scripts[phpshark_scripts.length-1].src.split('?')[0];

function getPathFromHere( $levelFromCurrentDir = 1 ){
	var loc = phpshark_path.split('/').slice(0, -($levelFromCurrentDir)).join('/')+'/';;
	return loc;
}
var gbl_phpshark_getUrl = window.location;
var gbl_phpshark_baseUrl = gbl_phpshark_getUrl.protocol + "//" + gbl_phpshark_getUrl.host + "/" + gbl_phpshark_getUrl.pathname.split('/')[1]+"/";
var gbl_phpshark_js_asset = getPathFromHere(1);
var gbl_phpshark_asset = getPathFromHere(2);
var gbl_phpshark_css_asset = getPathFromHere(2) + 'css/' ;
var gbl_phpshark_vendor = getPathFromHere(3) + 'vendor/';
var gbl_phpshark = getPathFromHere(3);
var gbl_phpshark_project = getPathFromHere(4) + 'project/';
