
    $(function(){
		$(".search_input input").focus(function(){
		
			  if($(this).val() ==this.defaultValue){  
                  $(this).val("");           
			  } 
		}).blur(function(){
	
			 if ($(this).val() == '') {
                $(this).val(this.defaultValue);
             }
		});
    })
	
	
	    $(function(){
		$(".reg_input").focus(function(){
		
			  if($(this).val() ==this.defaultValue){  
                  $(this).val("");           
			  } 
		}).blur(function(){
	
			 if ($(this).val() == '') {
                $(this).val(this.defaultValue);
             }
		});
    })

$(function(){
	$(".cate_fl_3 span").eq(0).click(function(){
		var html = $(this).html();
		if(html=='展开'){
			$(".cate_fl_2").eq(0).css("height","auto");	
			$(this).html("收起");	
			
		}else{
			$(".cate_fl_2").eq(0).css("height","25px");
			$(this).html("展开");						
		}
		
	
	})
	
	$(".cate_fl_3 span").eq(1).click(function(){
		var html = $(this).html();
		if(html=='展开'){
			$(".cate_fl_2").eq(1).css("height","auto");	
			$(this).html("收起");	
			
		}else{
			$(".cate_fl_2").eq(1).css("height","62px");
			$(this).html("展开");						
		}
		
	
	})	
	
	

})

$(function(){
						$(".l_cate").click(function(){
						
							if(!$(this).hasClass('cate_mu')){
							
								$(".l_cate").removeClass("cate_mu").addClass("cate_mu1");
								$(this).removeClass("cate_mu1").addClass("cate_mu");							
								$(".l_cate").children(".cate_show").slideUp(111);							
								$(this).children(".cate_show").slideDown(111);
							
							
							}
							
						
						})
					
})


$(function(){
	$(".sp_list_li").hover(function(){
		$(this).children(".sp_list_li_box").show();	
		$(this).children(".sp_list_li_box1").hide();						   
							   
	},function(){
		$(this).children(".sp_list_li_box1").show();	
		$(this).children(".sp_list_li_box").hide();			
		
	})		   
		   
})











$(function(){

	$(".qtt").show();
    var page = 1;
    var i = 6; 
	var cou = 0;
	var st = 0;
 $("#fd0 ul li").each(function(i){
		st = st+$("#fd0 ul li").eq(i).width();
 });
 $("#fd0").width(st+15000);
	$("#next0").click(function(){  
	  v_width = $("#content0").width();
	  var $v_show = $("#content0");

	  len = $("#fd0 li").length;
	   var page_count = Math.ceil(len / i) ; 	
	 		if( page == page_count ){  
				$("#fd0").animate({ left : '0px'});
				page = 1;
			}else{
				$("#fd0").animate({ left : '-='+v_width});  
				page++;
			}
   });
   
    $("#prve0").click(function(){   
	  v_width = $("#content0").width();
	  len = $("#fd0 li").length;
	  var $v_show = $("#content0");	  
	   var page_count = Math.ceil(len / i) ;  
	
	 		if( page == 1 ){  
				$("#fd0").animate({ left : '-='+v_width*(page_count-1)});
				page = page_count;
				
			}else{
				$("#fd0").animate({ left : '+='+v_width});
				page--;
			}
	 	
   });


	$(".qtt li").hover(function(){
		$(".qtt li").removeClass("zbox");								
		$(this).addClass("zbox");			
		$("#dt").attr("src",($(this).children().attr("src")));
		
	})





});




$(function(){
					$(".yjfs").click(function(){
						$(".yjfs").removeClass("zzs");					
						$(".yjfs").addClass("qqt");	
											
						$(this).removeClass("qqt");					
						$(this).addClass("zzs");				

					
					})
				})











$(function(){
		$(".spuk").click(function(){
			var index = $(".spuk").index(this);
			$(".spuk").removeClass("spli1");
			$(".spuk").addClass("spli");	
						
			$(this).removeClass("spli");
			$(this).addClass("spli1");		
			
			$(".sp_m_c1").hide();
			$(".sp_m_c1").eq(index).show();
			
			
			
			
		})
	})



$(function(){
$(".toupic").corner("90px");
$(".edt_anniu").corner("4px");
})

	$(function(){
		$(".xuanzhedizhi_box ul li").click(function(){
			$(".xuanzhedizhi_box ul li").removeClass("zbz");
			$(this).addClass("zbz");			
		})
		
	
	})


$(function(){
	$(".wodeli").hover(function(){
		var index = $(".wodeli").index(this);		
		$(".wodeli").removeClass("aodocor");
		$(".wodeli").children(".aodo_line").hide();				
		$(this).addClass("aodocor");
		$(this).children(".aodo_line").show();				
		$(".aodo_one").hide();
		$(".aodo_one").eq(index).show();
		
		
	})		   
		   
})



$(function(){
	
	$(".zhyzt").hover(function(){
		
		$(this).children("ul").show();
								
	},function(){
		
		$(this).children("ul").hide();		
		
		})
		   
})



$(function(){
	$(".bzzx").hover(function(){
			$(".bzzx_box").show();					  
								  
	},function(){
			$(".bzzx_box").hide();			
	})		   
			   
})





