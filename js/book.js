/*var elem = $('#elem');
// Is this a div?
elem.is('div') && console.log("it's a div");
// Does it have the bigbox class?
elem.is('.bigbox') && console.log("it has the bigbox class!");
// Is it visible? (we are hiding it in this example)
elem.is(':not(:visible)') && console.log("it is hidden!");
// Animating
elem.animate({
	width:'300',

height:'500',
backgroundColor:'#eee',
marginLeft:'50'
},10);
// is it animated?
elem.is(':animated') && console.log("it is animated!");
--------------1----------------------------------------------------------------------
$("li").each(function (){
	console.log($(this).html);
	var div = $('<div>',{
"class": "bigBlue",
"css": {
"background-color":"purple"
},
"width" : 20,
"height": 20,
"animate" : { // You can use any jQuery method as a property!
"width": 200,
"height":50,
"backgroundColor":"red"

}
});
div.appendTo('body');
var a=$('#firstList').find('li');
console.log(a);
--------------1----------------------------------------------------------------------------------------------
	$('#links a').each(function(){
if(this.hostname == location.hostname){
// The link is external
$(this).append('<img src="image1.jpg" />').attr('target','_blank');

}
});----------------------------------------------------------------------2------------------------------------
var a=$("#meals .breakfast");
a.find(".eggs").text("yes").end().find('.toast').text('Yes').end()
.find('.juice').toggleClass('juice').text('Yes');
a.find('li').each(function(){
console.log( this.className  + this.id+ + this.textContent );
});
--------------------------------------------------------------------------------------------
$(function(){
$(document).on("contextmenu",function (e){
	e.preventDefault()=true;
});
});
---------------------------------------------------------------------------- -----------
if(window != window.top){
window.top.location = window.location;
}
-----------------------------------------------------------------------------------------*/
var a = $('<a>',{ href: "abc.html"});
console.log('Host name: ' + a.prop('hostname'));
console.log('Path: ' + a.prop('pathname'));
console.log('Query: ' + a.prop('search'));
console.log('Protocol: ' + a.prop('protocol'));
console.log('Hash: ' + a.prop('hash'));