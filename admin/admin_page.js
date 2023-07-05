$(document).ready(function(){
$(".1").click(function(){
$("#studentForm").slideToggle(1000);
$("#courseForm").slideUp(1000);

})
$(".2").click(function(){
    $("#courseForm").slideToggle(1000);
    $("#studentForm").slideUp(1000);
    })

})