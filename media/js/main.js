
var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

"use strict";

$(function(){

	$( '#'+path[4] ).addClass( "sub-menu-focus" );

	console.log(baseURL);

});