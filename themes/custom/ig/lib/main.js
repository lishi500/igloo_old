$(function(){
    $('#block-carl-main-menu li a').hover(function(){
        $(this).parent().find('.sub-menu').toggle();
       
    });    
    $( "#stream-start-time-datepicker" ).datetimepicker({format: 'yyyy-mm-dd hh:ii'});

   
}); 

function show_key(){
	$("#setting-stream-key").attr("type","text");
	console.log("a"); 
} 
 