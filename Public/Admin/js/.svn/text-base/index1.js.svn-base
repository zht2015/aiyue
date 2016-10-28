$(function(){
	$("#prve0_1").hover(function(){
			$(this).children(".jiantou_bian1").animate({left: '-35px'});			
			$(this).children(".jiantou_bian2").animate({left: '0px'});
								 
	},function(){
		
			$(this).children(".jiantou_bian1").animate({left: '0px'});			
			$(this).children(".jiantou_bian2").animate({left: '35px'});		
	})		   
		   
})

$(function(){
	$("#next0_1").hover(function(){
			$(this).children(".jiantou_bian3").animate({left: '35px'});			
			$(this).children(".jiantou_bian4").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian3").animate({left: '0px'});			
			$(this).children(".jiantou_bian4").animate({left: '-35px'});		
	})		   
		   
})





/*第一滚动*/
$(function(){

	//$(".index_list_boxm").eq(0).addClass("index_color");
	$(".qtt_1").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_1").click(function(){  

	
	  v_width = $("#fd0_1 li").width();

	  //$("#content0_1").width();
	  
	   var $v_show1 = $("#fd0_1"); //寻找到“视频内容展示区域”
	  
	  var $v_show = $("#content0_1");

	  len = $("#fd0_1 li").length;
		

	
	
	   var page_count = Math.ceil(len / i) ; 
       var suma = 0;
	   var pingcout =  (page_count/4);

	
		suma = page_count -4 ;
	
		 if( !$v_show1.is(":animated") ){ 
		 
	 		if( page == suma){  
				$("#fd0_1").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_1").animate({ left : '-='+v_width});  
				page++;	
			}
			
			
		 }
			
			
			
   });
   
    $("#prve0_1").click(function(){   
								 
								 
	  v_width = $("#fd0_1 li").width();
	   var $v_show1 = $("#fd0_1"); //寻找到“视频内容展示区域”
	  //$("#content0_1").width();  
	  len = $("#fd0_1 li").length;
	  var $v_show = $("#content0_1");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		
		 if( !$v_show1.is(":animated") ){ 			
			
				if( page == 0){  
					//$("#fd0_1").animate({ left : '-='+v_width*(page_count-1)});
				//	page = page_count;
					
				}else{
					$("#fd0_1").animate({ left : '+='+v_width});
					page--;
				}
				
		 }
			
			
	 	
   });

});

/*$(function(){
	$("#prve0_1").hover(function(){
		
		$(this).attr("src","../images/jiantou1.png");
								 
	},function(){
		
		$(this).attr("src","../images/jiantou22.png");		
	})		   
		   
})*/



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
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_2").click(function(){  

	
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_2 li").width();
	   var $v_show1 = $("#fd0_2"); //寻找到“视频内容展示区域”
	  //$("#content0_1").width();
	  
	  
	  
	  var $v_show = $("#content0_2");

	  len = $("#fd0_2 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	   
	 			suma = page_count -5 ;
		 if( !$v_show1.is(":animated") ){ 		
			if( page == suma ){  
				$("#fd0_2").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_2").animate({ left : '-='+v_width});  
				page++;
			}
			
		 }
			
			
   });
   
    $("#prve0_2").click(function(){   
								 
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_2 li").width();

	  
	  var $v_show1 = $("#fd0_2"); //寻找到“视频内容展示区域”  
	  
	  len = $("#fd0_2 li").length;
	  var $v_show = $("#content0_2");	  
	   var page_count = Math.ceil(len / i) ;  


		 if( !$v_show1.is(":animated") ){ 	
	 		if( page == 0){  
/*				$("#fd0_2").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;*/
				
			}else{
				$("#fd0_2").animate({ left : '+='+v_width});
				page--;
			}
			
		 }
			
	 	
   });



	$(".qtt_2 li").hover(function(){
		


	
		 $(this).children(".ka_2").animate({top: '0px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '46px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$(".index_ll").hover(function(){
		     $(this).fadeTo("fast",0.5)						  
		$(this).addClass("cro");
	
	},function(){
		     $(this).fadeTo("fast",1)		
		$(this).removeClass("cro");		
		
	})		   
		   
})







/*第一滚动结束*/



























/*第一滚动*/
$(function(){

	$(".qtt_3").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_3").click(function(){  


	  
	  	
	  v_width = $("#fd0_3 li").width();

	  var $v_show1 = $("#fd0_3"); //寻找到“视频内容展示区域
	  
	  var $v_show = $("#content0_3");

	  len = $("#fd0_3 li").length;
	   var page_count = Math.ceil(len / i) ; 
		suma = page_count -5 ;
		if( !$v_show1.is(":animated") ){   
	 		if( page == suma ){  
				$("#fd0_3").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_3").animate({ left : '-='+v_width});  
				page++;
			}
		}
			
			
   });
   
    $("#prve0_3").click(function(){   
								 
	  
	  	
	  v_width = $("#fd0_3 li").width();

	  
	  var $v_show1 = $("#fd0_3"); 
	  
	  len = $("#fd0_3 li").length;
	  var $v_show = $("#content0_3");	  
	   var page_count = Math.ceil(len / i) ; 
	   
	   
		if( !$v_show1.is(":animated") ){ 
				if( page == 0 ){  
				/*	$("#fd0_3").animate({ left : '-='+v_width*(page_count-1)});
					page = page_count;*/
					
				}else{
					$("#fd0_3").animate({ left : '+='+v_width});
					page--;
				}
				
		}
		
		
	 	
   });



	$(".qtt_3 li").hover(function(){



	
		 $(this).children(".ka_2").animate({top: '30px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '70px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$("#prve0_3").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
	
	
	$("#next0_3").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
		
	
	
	
	
	
	
	
		   
})









/*第一滚动结束*/




















/*第一滚动*/
$(function(){

	$(".qtt_4").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_4").click(function(){  

	
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_4 li").width();

	  //$("#content0_1").width();
	  
	  var $v_show1 = $("#fd0_4"); 
	  
	  var $v_show = $("#content0_4");

	  len = $("#fd0_4 li").length;
	   var page_count = Math.ceil(len / i) ; 
	   suma = page_count -5 ;
		if( !$v_show1.is(":animated") ){ 	   
	 		if( page == suma ){  
				$("#fd0_4").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_4").animate({ left : '-='+v_width});  
				page++;
			}
			
		}
			
   });
   
    $("#prve0_4").click(function(){   
								 
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_4 li").width();

	  
	  
	  
	  len = $("#fd0_4 li").length;
	  var $v_show = $("#content0_4");	  
	   var page_count = Math.ceil(len / i) ;  
	var $v_show1 = $("#fd0_4");
	
	if( !$v_show1.is(":animated") ){ 
	 		if( page == 0 ){  
/*				$("#fd0_4").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;*/
				
			}else{
				$("#fd0_4").animate({ left : '+='+v_width});
				page--;
			}
			
	}
			
	 	
   });



	$(".qtt_4 li").hover(function(){
		


	
		 $(this).children(".ka_2").animate({top: '0px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '46px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$(".index_ll").hover(function(){
		     $(this).fadeTo("fast",0.5)						  
		$(this).addClass("cro");
	
	},function(){
		     $(this).fadeTo("fast",1)		
		$(this).removeClass("cro");		
		
	})		   
		   
})







/*第一滚动结束*/

















/*第一滚动*/
$(function(){

	$(".qtt_5").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_5").click(function(){  


	  
	  	
	  v_width = $("#fd0_5 li").width();

	  var $v_show1 = $("#fd0_5"); //寻找到“视频内容展示区域
	  
	  var $v_show = $("#content0_5");

	  len = $("#fd0_5 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	   suma = page_count -5 ;
	if( !$v_show1.is(":animated") ){  	
		if( page == suma ){  
				$("#fd0_5").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_5").animate({ left : '-='+v_width});  
				page++;
			}
			
	}
			
			
   });
   
    $("#prve0_5").click(function(){   
								 
	  
	  	
	  v_width = $("#fd0_5 li").width();

	  
	  
	  
	  len = $("#fd0_5 li").length;
	  var $v_show = $("#content0_5");	  
	   var page_count = Math.ceil(len / i) ;  
	if( !$v_show1.is(":animated") ){ 
	 		if( page == 0 ){  
/*				$("#fd0_5").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;*/
				
			}else{
				$("#fd0_5").animate({ left : '+='+v_width});
				page--;
			}
	}
   });



	$(".qtt_5 li").hover(function(){



	
		 $(this).children(".ka_2").animate({top: '30px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '70px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$("#prve0_5").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
	
	
	$("#next0_5").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
		
	
	
	
	
	
	
	
		   
})









/*第一滚动结束*/


















/*第一滚动*/
$(function(){

	$(".qtt_6").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_6").click(function(){  

	
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_6 li").width();
		var $v_show1 = $("#fd0_6"); //寻找到“视频内容展示区域
	  //$("#content0_1").width();
	  
	  
	  
	  var $v_show = $("#content0_6");

	  len = $("#fd0_6 li").length;
	   var page_count = Math.ceil(len / i) ; 
	   suma = page_count -5 ;
	   if( !$v_show1.is(":animated") ){ 
	 		if( page == suma ){  
				$("#fd0_6").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_6").animate({ left : '-='+v_width});  
				page++;
			}
			
	   }
			
   });
   
    $("#prve0_6").click(function(){   
								 
	//  v_width = $("#content0_2").width();
	  
	  	
	  v_width = $("#fd0_6 li").width();

	  
	  
	  
	  len = $("#fd0_6 li").length;
	  var $v_show = $("#content0_6");	  
	   var page_count = Math.ceil(len / i) ;  
		var $v_show1 = $("#fd0_6"); //寻找到“视频内容展示区域		
		if( !$v_show1.is(":animated") ){ 
	 		if( page == 0 ){  
/*				$("#fd0_6").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;*/
				
			}else{
				$("#fd0_6").animate({ left : '+='+v_width});
				page--;
			}
		}
   });



	$(".qtt_6 li").hover(function(){
		


	
		 $(this).children(".ka_2").animate({top: '0px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '46px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$(".index_ll").hover(function(){
		     $(this).fadeTo("fast",0.5)						  
		$(this).addClass("cro");
	
	},function(){
		     $(this).fadeTo("fast",1)		
		$(this).removeClass("cro");		
		
	})		   
		   
})







/*第一滚动结束*/








/*第一滚动*/
$(function(){

	$(".qtt_7").show();
    var page = 0;
    var i = 1; 
	var cou = 0;
	var st = 0;
	$("#next0_7").click(function(){  


	  
	  	
	  v_width = $("#fd0_7 li").width();
var $v_show1 = $("#fd0_7"); //寻找到“视频内容展示区域
	  
	  
	  var $v_show = $("#content0_7");

	  len = $("#fd0_7 li").length;
	   var page_count = Math.ceil(len / i) ;
	   suma = page_count -5 ;
	   if( !$v_show1.is(":animated") ){ 
	 		if( page == suma ){  
				$("#fd0_7").animate({ left : '0px'});
				page = 0;
			}else{
				$("#fd0_7").animate({ left : '-='+v_width});  
				page++;
			}
			
	   }
			
   });
   
    $("#prve0_7").click(function(){   
								 
	  
	  	
	  v_width = $("#fd0_7 li").width();

	  
	  
	  
	  len = $("#fd0_7 li").length;
	  var $v_show = $("#content0_7");	  
	   var page_count = Math.ceil(len / i) ;  
	var $v_show1 = $("#fd0_7"); //寻找到“视频内容展示区域
	if( !$v_show1.is(":animated") ){ 
	 		if( page == 0 ){  
			/*	$("#fd0_7").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;*/
				
			}else{
				$("#fd0_7").animate({ left : '+='+v_width});
				page--;
			}
			
	}
			
	 	
   });



	$(".qtt_7 li").hover(function(){



	
		 $(this).children(".ka_2").animate({top: '30px'},150);
		  $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").addClass("indextouming");
		  $(this).children(".ka_2").children(".index_sp_box").children("a").addClass("abox_z");		  
		  
		  
		  
		  $(this).children(".ka_2").children(".index_wzsz").show();

		  
		  
	},function(){
		

			   $(this).children(".ka_2").animate({top: '70px'},150);  
			   $(this).children(".ka_2").children(".index_sp_box").children(".index_sp_img").removeClass("indextouming");
			  $(this).children(".ka_2").children(".index_sp_box").children("a").removeClass("abox_z");		  
		  			   
			  $(this).children(".ka_2").children(".index_wzsz").hide();	
	  
	})		






});



$(function(){
	$("#prve0_7").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
	
	
	$("#next0_7").hover(function(){
						 
								 
			$(this).children(".jiantou_bian1z").animate({left: '-17px'});			
			$(this).children(".jiantou_bian2z").animate({left: '0px'});
								 
	},function(){
		
		$(this).children(".jiantou_bian1z").animate({left: '0px'});			
			$(this).children(".jiantou_bian2z").animate({left: '17px'});		
	})	
		
	
	
	
	
	
	
	
		   
})









/*第一滚动结束*/






















/* 主页以前滚动暂时关
 
$(function(){

    var page = 1;
    var i = 1; 
	var cou = 0;
	var st = 0;
	var t ;
	var times = 3000;
	
	$(".bannera").show();
	
 $(".diandian").css({"left":($(window).width()-$(".diandian").width())/2});
 $("#content0k").css("width",$(window).width()+"px");
  $("#fd0k ul li").css("width",$(window).width()+"px");
  $("#fd0k ul li img").css("width",$(window).width()+"px");	

	
	
	
	

$(".qttk").show();

 $("#fd0k ul li").each(function(i){
		st = st+$("#fd0k ul li").eq(i).width();
 });
   $("#fd0k").css("width",st+"px");	

function aa(){
	
v_width = $("#content0k").width();
var $v_show = $("#content0k");
 $("#fd0k").width(st+15000);
 
len = $(".ds").length;


var page_count = Math.ceil(len / i) ; 
if( !$v_show.is(":animated") ){  
	if( page == page_count ){ 
	$("#fd0k").animate({ left : '0px'},700);
		page = 1;
	}else{
		$("#fd0k").animate({ left : '-='+v_width},700);  
		page++;
	}
	
}
	
					
	$(".ds").eq((page-1)).removeClass("daishu").addClass("daishu1").siblings(".ds").removeClass("daishu1").addClass("daishu");
	
 t = setTimeout(aa,times);
	
}
 t = setTimeout(aa,times);
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 $(".ds").hover(function (){



  var index1;
     v_width = $("#content0k").width();
	 var $v_show = $("#content0k");

	 len = $(".ds").length;
	 var page_count = Math.ceil(len / i) ; 
   


   		
		var  aindex=$(".ds").index(this);
		var  bindex=$(".ds").index(this);
		page = aindex+1;
	
		
			$(".ds").each(function(i){
					if($(this).hasClass("daishu1")){
						index1 = i;
						//获取次的ID位置减去			
					}
			 });
			 
			var cou = page_count-1;
		 if( !$v_show.is(":animated") ){
		 
		 
			 if(index1==0 && bindex==0){
				 $("#fd0k").animate({ left :0},700);
			 }else if(index1==cou && bindex==0){
				 $("#fd0k").animate({ left :0},700);
			 }else if(index1==cou && bindex==cou){
				 $("#fd0k").animate({ left :'-='+v_width*(page_count-1)},700);
			 }else if(index1==0 && bindex==cou){
				$("#fd0k").animate({ left :'-='+v_width*(page_count-1)},700);
			 }else if(index1<bindex){
			 	//向下走多少
				
			 	var weizi = bindex-index1;
				var wid = v_width * weizi;
				
				$("#fd0k").animate({ left : '-='+wid},700);
						 	
			 }else if(index1>bindex){	 
				
				var weizi = index1-bindex;
				var wid = v_width * weizi
		
				$("#fd0k").animate({ left : '+='+wid},700);			 
			 }
			 
		}	 
		
		
		$(this).removeClass("daishu").addClass("daishu1").siblings(".ds").removeClass("daishu1").addClass("daishu");
		 clearTimeout(t);
 
 
  },function () {
    	 t = setTimeout(aa,times);
  });
   

   
   

});






*/







