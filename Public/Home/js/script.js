$(function(){
	//登陆之后的VIP导航
	function vip_hd(){
		var t = null;
		$('.vip-hd .hd').hover(function (){
			$(this).next('.vip-hide-nav').show(0, function (){
            	$(this).find('ul').stop(true, true).animate({'marginTop' : '9px'}, 200);
			});
			clearTimeout(t);
		},function (){
			t = setTimeout(function (){
				$('.vip-hide-nav').hide();
				$('.vip-hide-nav').find('ul').css({'margin-top' : ''});
			}, 10);
		});
		$('.vip-hide-nav').hover(function (){
			clearTimeout(t);
 		},function (){
			$(this).hide();
			$(this).find('ul').css({'margin-top' : ''});
		});
	}
	vip_hd();
	/*首页banner轮播*/
	function banner(){
		function auto_h(){
			var li_h=$('.banner ul li img').height();
			$('.banner').height(li_h);
		}
		$(window).load(function(){
			auto_h();
		})
		$(window).resize(function(){
			auto_h();
		})
		var oli=$('.banner ul li');
		var lis=oli.length;
		var i=0;
		timer=setInterval(function(){
			if(i==lis-1){
				i=0;
			}else{
				i++;
			}
			oli.eq(i).fadeIn(350).siblings().fadeOut(350);
		},4000)
		$('.prev').click(function(){
			if(i==0){
				i=lis-1;
			}else{
				i--;
			}
			oli.eq(i).fadeIn(350).siblings().fadeOut(350);
		})
		$('.next').click(function(){
			if(i==lis-1){
				i=0;
			}else{
				i++;
			}
			oli.eq(i).fadeIn(350).siblings().fadeOut(350);
		})
		$('.banner').hover(function(){
			clearInterval(timer);
		},function(){
			timer=setInterval(function(){
				if(i==lis-1){
					i=0;
				}else{
					i++;
				}
				oli.eq(i).fadeIn(350).siblings().fadeOut(350);
			},4000)
		})
	}
	banner();
	function index2_banner(){
		var oul=$('.index2-banner ul');
		var owidth=$('.index2-banner li').outerWidth(true);
		$('.index2-prev').click(function(){
			oul.prepend(oul.find('li:last')).css('left',-owidth+'px');
			oul.stop(true,false).animate({'left':0},800);
		})
		$('.index2-next').click(function(){
			oul.stop(false,true).animate({'left':-owidth+'px'},500,function(){
				oul.append(oul.find('li:first')).css('left',0);
			})
		})
	}
	index2_banner();
	function index3_banner1(){
		var oul=$('.index3-banner ul');
		var owidth=$('.index3-banner li').outerWidth(true);
		$('.index3-prev').click(function(){
			oul.prepend(oul.find('li:last')).css('left',-owidth+'px');
			oul.stop(true,false).animate({'left':0},800);
		})
		$('.index3-next').click(function(){
			oul.stop(false,true).animate({'left':-owidth+'px'},500,function(){
				oul.append(oul.find('li:first')).css('left',0);
			})
		})
	}
	index3_banner1();
	function index3_banner2(){
		var oul=$('.index3-banner2 ul');
		var owidth=$('.index3-banner2 li').outerWidth(true);
		$('.index3-prev2').click(function(){
			oul.prepend(oul.find('li:last')).css('left',-owidth+'px');
			oul.stop(true,false).animate({'left':0},800);
		})
		$('.index3-next2').click(function(){
			oul.stop(false,true).animate({'left':-owidth+'px'},500,function(){
				oul.append(oul.find('li:first')).css('left',0);
			})
		})
	}
	index3_banner2();
	$('.index3-banner2 li').click(function(){
		$(this).addClass('index3-cur').siblings().removeClass('index3-cur');
	})
	function index4_banner(){
		var li_w=$('.index4-banner ul li').outerWidth();
		$('.index4-banner ul li').each(function(){
			var index=$(this).index();
			$(this).css({
				'z-index':index+1,
				'left':li_w/2*index+'px'
			});
			$(this).hover(function(){
				$(this).css({
					'z-index':index+3,
					'left':li_w/2*index-li_w/4+'px',
					'top':'-15px'
				})
			},function(){
				$(this).css({
					'z-index':index+1,
					'left':li_w/2*index+'px',
					'top':0
				})
			})
		})
		var oul=$('.index4-banner ul');
		var lis=$('.index4-banner ul li').length;
		oul.width((lis+1)*li_w/2);
		function index4_change(){
			var owidth=$(window).width();
			var i=0;
			if(owidth>1370){
				$('.index4-prev').click(function(){
					if(i>0){
						i--;
						oul.animate({'left':-li_w/2*i+2+'px'},300);
					}
				})
				$('.index4-next').click(function(){
					if(i<lis-9){
						i++;
						oul.animate({'left':-li_w/2*i+2+'px'},300);
					}
				})
			}else{
				$('.index4-prev').click(function(){
					if(i>0){
						i--;
						oul.animate({'left':-li_w/2*i+2+'px'},300);
					}
				})
				$('.index4-next').click(function(){
					if(i<lis-7){
						i++;
						oul.animate({'left':-li_w/2*i+2+'px'},300);
					}
				})
			}
		}
		index4_change();
		$(window).resize(function(){
			index4_change();
		})
	}
	index4_banner();
	/*个人中心左侧列表*/
	$('.personal li').click(function(){
		$(this).addClass('cur-li').siblings().removeClass('cur-li');
	})
	$('.zzxs-btn a').click(function(){
		$(this).addClass('cur-btn').siblings().removeClass('cur-btn');
	})
	/*弹窗关闭*/
	function pop_h(){
		$('.pop').each(function(){
			var oheight=$(this).children('.pop-text').outerHeight();
			$(this).children('.pop-img').height(oheight);
			
		})
		$('.pop-close').click(function(){
			$(this).parent().hide().siblings('.mask').hide();
		})
	}
	pop_h();
	
	/*聚焦 下拉*/
	$('.pp-book input').focus(function(){
		$(this).parent().siblings('.down-list').slideDown();
	})
	$('.pp-book input').blur(function(){
		$(this).parent().siblings('.down-list').slideUp();
	})
	/*单选模拟*/
	$('.per-sex input[type=radio]').click(function(){
		$(this).siblings('i').addClass('select-sex').parent().siblings().find('i').removeClass('select-sex');
	})
	/*上传图书 下拉*/
	$('.down-icon').click(function(){
		$(this).siblings().focus();
	})
	$('.cbs input').focus(function(){
		$(this).parent().siblings('.down-list').slideDown();
	})
	$('.cbs input').blur(function(){
		$(this).parent().siblings('.down-list').slideUp();
	})
	/*我的标签*/
/*	function bq(){
		$('.wdbq li').hover(function(){
			$(this).toggleClass('bq-del');
		})
		$('.wdbq li').click(function(){
			$(this).remove();
		})
	}
	bq();*/
	/*好友-更多*/
	$('.friend-right').click(function(e){
		$(this).children('.more-down').slideToggle(200);
		$(this).parent().siblings().find('.more-down').slideUp(200);
		e.stopPropagation();
	})
	$(document).click(function(){
		$('.more-down').slideUp(200);
	})
	/*编辑书单-弹窗关闭*/
	$('.book01-close').click(function(){
		$(this).parent().parent().hide().siblings('.mask').hide();
	})
	/*个人中心书单切换*/
	function book_change(){
		$('.prev01').click(function(){
			var li_w=$(this).parent().siblings().find('li').outerWidth(true);
			var oul=$(this).parent().siblings().find('ul');
			oul.prepend(oul.find('li:last')).css('left',-li_w+'px');
			oul.stop(true,false).animate({'left':0},400);
		})
		$('.next01').click(function(){
			var li_w=$(this).parent().siblings().find('li').outerWidth(true);
			var oul=$(this).parent().siblings().find('ul');
			oul.stop(false,true).animate({'left':-li_w+'px'},400,function(){
				oul.append(oul.find('li:first')).css('left',0);
			});
		})
	}
	book_change();
	$('.per-span').click(function(){
		$(this).addClass('cur-per').siblings('.per-span').removeClass('cur-per')
	})
	/*阅读记录-时间下拉菜单*/
	$('.select1').click(function(e){
		$(this).children('ul').slideToggle();
		$(this).siblings().children('ul').slideUp();
		e.stopPropagation();
	})
	$(document).click(function(){
		$('.select1 ul').slideUp();
	})
	/*阅读记录*/
	$('.record-mid li').click(function(){
		$(this).addClass('cur-year').siblings().removeClass('cur-year');
	})
	function year_change(){
		if($('.year-inner').find('li').length<7){
			return false;
		}
		var li_w=$('.year-inner').find('li').outerWidth(true);
		var oul=$('.year-inner').find('ul');
		$('.prev-year').click(function(){
			oul.prepend(oul.find('li:last')).css('left',-li_w+'px');
			oul.stop(true,false).animate({'left':0},300);
		})
		$('.next-year').click(function(){
			oul.stop(false,true).animate({'left':-li_w+'px'},300,function(){
				oul.append(oul.find('li:first')).css('left',0);
			});
		})
	}
	year_change();



})