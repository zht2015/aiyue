
/*第一滚动*/
$(function(){

$(".index_list_boxm").eq(0).addClass("index_color");
	$(".qtt_1").show();
    var page = 1;
    var i = 4; 
	var cou = 0;
	var st = 0;
	$("#next0_1").click(function(){  

	
	  v_width = $("#content0_1").width();
	  var $v_show = $("#content0_1");

	  len = $("#fd0_1 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_1").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_1").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_1").click(function(){   
	  v_width = $("#content0_1").width();
	  len = $("#fd0_1 li").length;
	  var $v_show = $("#content0_1");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_1").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_1").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });

});

$(function(){
	$("#prve0_1").hover(function(){
		
		$(this).attr("src","../images/jiantou1.png");
								 
	},function(){
		
		$(this).attr("src","../images/jiantou22.png");		
	})		   
		   
})



$(function(){
	$("#next0_1").hover(function(){
		
		$(this).attr("src","../images/jiantou11.png");
								 
	},function(){
		
		$(this).attr("src","../images/jiantou2.png");		
	})		   
		   
})


$(function(){
	$(".index_list_boxm").hover(function(){
										 
		$(this).addClass("index_color");
		
	},function(){
		
										 
		$(this).removeClass("index_color");	
	})		   
		   
})







/*第一滚动结束*/
















/*第一滚动*/
$(function(){

	$(".qtt_2").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_2").click(function(){  

	
	  v_width = $("#content0_2").width();
	  var $v_show = $("#content0_2");

	  len = $("#fd0_2 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_2").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_2").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_2").click(function(){   
	  v_width = $("#content0_2").width();
	  len = $("#fd0_2 li").length;
	  var $v_show = $("#content0_2");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_2").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_2").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	

	$(".index_ll").hover(function(){
										 
		$(this).addClass("cro");
		
	},function(){
		
										 
		$(this).removeClass("cro");	
	})		




	$(".index_sp_box").hover(function(){
		
		
											 
		$(this).addClass("indextouming");
		  $(this).siblings(".index_wzsz").show();
		  $(this).css("padding-top","40px");
	},function(){
		
										 
	$(this).removeClass("indextouming");	
	  $(this).siblings(".index_wzsz").hide();	
	  $(this).css("padding-top","46px");	
	})		






/*    $(".index_sp_box").hover(function(){

			$(this)
		  $(this).fadeTo("slow",0.3);
		 $(this).css("padding-top","25px");		  
		  $(this).siblings(".index_wzsz").show();
		  
     },function(){

    	 $(this).fadeTo("slow",1);  
		 $(this).css("padding-top","46px");		 		  $(this).siblings(".index_wzsz").hide();
		 
     })*/


});









/*第一滚动结束*/










/*第一滚动*/
$(function(){

	$(".qtt_3").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_3").click(function(){  

	
	  v_width = $("#content0_3").width();
	  var $v_show = $("#content0_3");

	  len = $("#fd0_3 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_3").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_3").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_3").click(function(){   
	  v_width = $("#content0_3").width();
	  len = $("#fd0_3 li").length;
	  var $v_show = $("#content0_3");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_3").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_3").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	







});









/*第一滚动结束*/



/*dddddddddddddd*/


















/*第一滚动*/
$(function(){

	$(".qtt_4").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_4").click(function(){  

	
	  v_width = $("#content0_4").width();
	  var $v_show = $("#content0_4");

	  len = $("#fd0_4 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_4").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_4").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_4").click(function(){   
	  v_width = $("#content0_4").width();
	  len = $("#fd0_4 li").length;
	  var $v_show = $("#content0_4");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_4").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_4").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	

	$(".index_ll").hover(function(){
										 
		$(this).addClass("cro");
		
	},function(){
		
										 
		$(this).removeClass("cro");	
	})		




	$(".index_sp_box").hover(function(){
		
		
											 
		$(this).addClass("indextouming");
		  $(this).siblings(".index_wzsz").show();
		  $(this).css("padding-top","40px");
	},function(){
		
										 
	$(this).removeClass("indextouming");	
	  $(this).siblings(".index_wzsz").hide();	
	  $(this).css("padding-top","46px");	
	})		






/*    $(".index_sp_box").hover(function(){

			$(this)
		  $(this).fadeTo("slow",0.3);
		 $(this).css("padding-top","25px");		  
		  $(this).siblings(".index_wzsz").show();
		  
     },function(){

    	 $(this).fadeTo("slow",1);  
		 $(this).css("padding-top","46px");		 		  $(this).siblings(".index_wzsz").hide();
		 
     })*/


});









/*第一滚动结束*/










/*第一滚动*/
$(function(){

	$(".qtt_5").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_5").click(function(){  

	
	  v_width = $("#content0_5").width();
	  var $v_show = $("#content0_5");

	  len = $("#fd0_5 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_5").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_5").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_5").click(function(){   
	  v_width = $("#content0_5").width();
	  len = $("#fd0_5 li").length;
	  var $v_show = $("#content0_5");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_5").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_5").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	







});









/*第一滚动结束*/
































/*ss*/

/*第一滚动*/
$(function(){

	$(".qtt_6").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_6").click(function(){  

	
	  v_width = $("#content0_6").width();
	  var $v_show = $("#content0_6");

	  len = $("#fd0_6 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_6").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_6").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_6").click(function(){   
	  v_width = $("#content0_6").width();
	  len = $("#fd0_6 li").length;
	  var $v_show = $("#content0_6");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_6").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_6").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	

	$(".index_ll").hover(function(){
										 
		$(this).addClass("cro");
		
	},function(){
		
										 
		$(this).removeClass("cro");	
	})		




	$(".index_sp_box").hover(function(){
		
		
											 
		$(this).addClass("indextouming");
		  $(this).siblings(".index_wzsz").show();
		  $(this).css("padding-top","40px");
	},function(){
		
										 
	$(this).removeClass("indextouming");	
	  $(this).siblings(".index_wzsz").hide();	
	  $(this).css("padding-top","46px");	
	})		






/*    $(".index_sp_box").hover(function(){

			$(this)
		  $(this).fadeTo("slow",0.3);
		 $(this).css("padding-top","25px");		  
		  $(this).siblings(".index_wzsz").show();
		  
     },function(){

    	 $(this).fadeTo("slow",1);  
		 $(this).css("padding-top","46px");		 		  $(this).siblings(".index_wzsz").hide();
		 
     })*/


});









/*第一滚动结束*/










/*第一滚动*/
$(function(){

	$(".qtt_7").show();
    var page = 1;
    var i = 5; 
	var cou = 0;
	var st = 0;
	$("#next0_7").click(function(){  

	
	  v_width = $("#content0_7").width();
	  var $v_show = $("#content0_7");

	  len = $("#fd0_7 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0_7").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0_7").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0_7").click(function(){   
	  v_width = $("#content0_7").width();
	  len = $("#fd0_7 li").length;
	  var $v_show = $("#content0_7");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0_7").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0_7").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	







});









/*第一滚动结束*/
