$(function(){
    $('#block-carl-main-menu li a').hover(function(){
        $(this).parent().find('.sub-menu').toggle();
       
    });    
    $( "#stream-start-time-datepicker" ).datetimepicker({format: 'yyyy-mm-dd hh:ii'});

     $("#stream-setting-active").click(function(){
    		$.ajax({
			  url: "/stream_setting/active/"+$(this).attr("data"),  
			})
    		.done(function(response) {
				location.reload();
			});
    });
}); 

function show_key(){
	$("#setting-stream-key").attr("type","text");
	console.log("a"); 
} 
 
