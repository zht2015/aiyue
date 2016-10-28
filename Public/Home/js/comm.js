// JavaScript Document
var windows=$(window);
var doc=$(document);

$(function(){

function vip_hd()
{
    //登陆之后的VIP导航
    var t = null;
    $('.vip-hd .hd').hover(function () 
    {
        $(this).next('.vip-hide-nav').show(0, function () 
        {
            $(this).find('ul').stop(true, true).animate({
                'marginTop' : '9px' 
            }, 200);
        });
		clearTimeout(t);
    },function ()
    {
        t = setTimeout(function ()
        {
            $('.vip-hide-nav').hide();
            $('.vip-hide-nav').find('ul').css({
                'margin-top' : '' 
            });
        }, 10);
    });
    $('.vip-hide-nav').hover(function ()
    {
        clearTimeout(t);
    },
    function ()
    {
        $(this).hide();
        $(this).find('ul').css({
            'margin-top' : '' 
        });
    });
}
vip_hd();


function register_switch()
{//注册方式切换
    $('.zc-switch-box').not(':first').hide();
    $('.regcut-btn li').click(function ()
    {
        var index = $(this).index();
        $(this).addClass('cur').siblings().removeClass('cur');
        $('.zc-switch-box').hide().eq(index).show();
    });
}
register_switch();


function blog_nav_show()
{//新闻blog奖项 手风琴导航
    $('.each-tab-nav .tab-name').click(function ()
    {
        $(this).next('ul').stop().slideDown().end().parents('.each-tab-nav').siblings('.each-tab-nav')
		.find('ul').stop().slideUp();
        $(this).addClass('cur').parents('.each-tab-nav').siblings('.each-tab-nav') 
		.find('.tab-name').removeClass('cur');
    });
    $('.each-tab-nav').each(function ()
    {
        if ($(this).find('.tab-name').hasClass('cur')){
            $(this).find('ul').show();
        }
        else {
            $(this).find('ul').hide();
        }
    });
}
blog_nav_show();

function animate_awards(){
var sul=$('.awards-list ul');
var li_w;
var len=sul.find('li').length;
function r(){
  li_w=sul.find('li').outerWidth(true);	
}
r(),windows.resize(r);	
$('.awards-wrap .focus.prev').click(function(){
	sul.prepend(sul.find('li:last')).css('left',-li_w+'px');
	sul.stop().animate({'left':'0px'});
});
$('.awards-wrap .focus.next').click(function(){
	sul.stop().animate({'left':-li_w+'px'},function(){
	   sul.append(sul.find('li:first')).css('left','0px');	
	});
});

if(windows.width()>1370){}

	
}
animate_awards();




function fix_footer()
{
    //底部一直在最下面
    var h = $(window).height();
    var f_h = $('.footer').outerHeight();
    var main_h = $('#content-wrap').outerHeight();
    if (main_h > h - f_h) {
        $('#content-wrap').removeAttr('style');
    }
    else {
        $('#content-wrap').css({
            'min-height' : (h - f_h) + 'px'
        });
    }
}
fix_footer(), windows.resize(fix_footer);


function about_join()
{
    //招聘翻页
    var Default_Height = 240;
    var each_move = 400;
    $('.recruitment-list li').each(function ()
    {
        var _this = $(this);
        var prev_move = 0;
        var next_move = 0;
		var txt_height;
		function r(){			
			 txt_height = _this.find('.join-scroll-inner').outerHeight();
			 _this.find('.join-scroll-main').css({'height' : txt_height + 'px'}); 
		}
        r(),windows.resize(r);

        //查看更多眼睛
        function has_eye()
        {
            if (txt_height > Default_Height) {
                _this.find('.join-main').append("<div class='see-more'></div>");
            }
        }
        has_eye();
        _this.find('.see-more').click(function ()
        {
            $(this).hide(0, function ()
            {
                $(this).parents('li').find('.join-main-inner').stop().animate({
                    'height' : '400px'
                }).parents('li').siblings() .find('.join-main-inner').stop().animate({
                    'height' : Default_Height+'px'
                });
                if (txt_height > 400) {
                    _this.find('.paging').show();
                }
                else {
                    _this.find('.paging').hide();
                }
                $(this).parents('li').siblings().find('.see-more').show();
				 $(this).parents('li').siblings().find('.paging').hide();
            });
        });
        _this.find('.next').click(function ()
        {
            var sul = $(this).parents('li').find('.join-scroll-main');
            $(this).prev('a').css({
                'visibility' : 'visible'
            });
            var Can_slide_length = sul.outerHeight();
            //可以滑动的总长度
            next_move = prev_move + each_move;
            var remain = Can_slide_length - next_move;
            next_move = remain <= each_move ? prev_move + remain : next_move;
            sul.stop().animate({
                'top' :- next_move + 'px'
            },
            function ()
            {
                prev_move = next_move;
            });
            if (remain <= each_move) {
                $(this).css({
                    'visibility' : 'hidden'
                });
            }
        });
        _this.find('.prev').click(function ()
        {
            var sul = $(this).parents('li').find('.join-scroll-main');
            $(this).next('a').css({
                'visibility' : 'visible'
            });
            next_move = prev_move - each_move;
            next_move = next_move <= 0 ? 0 : next_move;
            sul.stop().animate({
                'top' :- next_move + 'px'
            },
            function ()
            {
                prev_move = next_move;
            });
            if (next_move <= 0) {
                $(this).css({
                    'visibility' : 'hidden'
                });
            }
        });
        _this.click(function ()
        {
            return false;
        });
        doc.on('click', function ()
        {
            if (!$(this).hasClass('recruitment-list li'))
            {
                _this.find('.see-more').show();
                _this.find('.join-main-inner').stop().animate({
                    'height' : Default_Height+'px'
                });
                _this.find('.paging').hide();
            }
        });
    });
}
about_join();

function details_02_nav(){//书单详情页页面效果

$('.details-02-nav ul li').click(function ()
{
    var index = $(this).index();
    $(this).addClass('cur').siblings().removeClass('cur');
    if (index == 0)
    {
        $('.swit-grid').show();
        var j = $('.swit-grid a.cur').index();
        if (j == 0) {
            $('.booklist-grid-mode').show();
            $('.booklist-list-mode').hide();
        }
        else {
            $('.booklist-grid-mode').hide();
            $('.booklist-list-mode').show();
        }
        $('.books-details-comment').hide();
        $('.books-introduce').hide();
    }
    else if (index == 1)
    {
        $('.swit-grid').hide();
        $('.booklist-grid-mode').hide();
        $('.booklist-list-mode').hide();
        $('.books-details-comment').show();
        $('.books-introduce').hide();
    }
    else if (index == 2)
    {
        $('.swit-grid').hide();
        $('.booklist-grid-mode').hide();
        $('.booklist-list-mode').hide();
        $('.books-details-comment').hide();
        $('.books-introduce').show();
    }
    else {
        $('.swit-grid').hide();
    }
});

$('.swit-grid a').click(function ()
{
	//网格模式切换
    var index = $(this).index();
    $(this).addClass('cur').siblings().removeClass('cur');
    if (index == 0) {
        $('.booklist-grid-mode').show();
        $('.booklist-list-mode').hide();
    }
    else if (index == 1) {
        $('.booklist-grid-mode').hide();
        $('.booklist-list-mode').show();
    }
		
});

	
}
details_02_nav();

function details_03_nav(){//图书详情页页面效果

$('.details-03-nav ul li').click(function ()
{
    var index = $(this).index();
    $(this).addClass('cur').siblings().removeClass('cur');
	if(index==0)
	{
	  $('.content-introduce').show();
	  $('.author-introduce').hide();
	  $('.books-details-comment').hide();
	  $('.reading-notes').hide();	
	}
	else if(index==1)
	{
	  $('.content-introduce').hide();
	  $('.author-introduce').show();
	  $('.books-details-comment').hide();
	  $('.reading-notes').hide();
		
	}
	else if(index==2)
	{
	  $('.content-introduce').hide();
	  $('.author-introduce').hide();
	  $('.books-details-comment').show();
	  $('.reading-notes').hide();
	}
	else if(index==3)
	{
	  $('.content-introduce').hide();
	  $('.author-introduce').hide();
	  $('.books-details-comment').hide();
	  $('.reading-notes').show();
	}
	
});


}
details_03_nav();

function category_list_scroll(){
//书单详情页，右侧上下滑动
 var is_animate=true;  
$('.category-list-focus .prev').click(function ()
{
    var sul = $(this).parent().prev('.category-list').find('ul');
    if (is_animate== true)
    {
        is_animate = false;
        sul.prepend(sul.find('li:last')).css({
            'top' : '-200px'
        });
        sul.stop().animate({
            'top' : '0px'
        },
        600, 'easeInOutQuad', function ()
        {
            is_animate = true;
        });
    }
});

$('.category-list-focus .next').click(function ()
{
    var sul = $(this).parent().prev('.category-list').find('ul');
    if (is_animate == true)
    {
        is_animate = false;
        sul.stop().animate({
            'top' : '-200px'
        },
        600, 'easeInOutQuad', function ()
        {
            sul.append(sul.find('li:first')).removeAttr('style');
            is_animate = true;
        });
    }
});
	
}
category_list_scroll();

function category_list_scroll2(){
//图书详情页，右侧上下滑动
 var is_animate=true;  
$('.category-list-b-focus .prev').click(function ()
{
    var sul = $(this).parent().prev('.category-list-b').find('ul');
    if (is_animate== true)
    {
        is_animate = false;
        sul.prepend(sul.find('li:last')).css({
            'top' : '-218px'
        });
        sul.stop().animate({
            'top' : '0px'
        },
        600, 'easeInOutQuad', function ()
        {
            is_animate = true;
        });
    }
});

$('.category-list-b-focus .next').click(function ()
{
    var sul = $(this).parent().prev('.category-list-b').find('ul');
    if (is_animate == true)
    {
        is_animate = false;
        sul.stop().animate({
            'top' : '-218px'
        },
        600, 'easeInOutQuad', function ()
        {
            sul.append(sul.find('li:first')).removeAttr('style');
            is_animate = true;
        });
    }
});
	
}
category_list_scroll2();



function simulate_textarea(){
//自定义文本编辑器	

//$('.simulate-textarea').on('copy cut paste',function(){
// return false;	阻止黏贴
//});
	
}
simulate_textarea();


function show_hide_reply()
{
    //展开及隐藏 楼下的回复
    $('.reply-box').each(function ()
    {
        $(this).find('.reply-other').click(function ()
        {
            $(this).parents('.first-floor').next('.other-reply-box').children('.reply-hidden').stop().slideToggle();
            if ($(this).children('i').html() == "展开余下回复") {
                $(this).children('i').html("收起");
            }
            else {
                $(this).children('i').html("展开余下回复");
            }
        });
    });
}
show_hide_reply();

function suspension()
{   //图书详情右侧悬浮导航
    var w = windows.width();
    if (w >= 1190)
    {
        windows.scroll(function ()
        {
            if (windows.scrollTop() > 330)
            {
                $('.suspension-nav-wrap').find('.left-floatNav').css({
                    'top' : '40px'
                });
                $('.suspension-nav-wrap').find('.right-floatNav').css({
                    'top' : '40px'
                });
            }
            else
            {
                $('.suspension-nav-wrap').find('.left-floatNav').css({
                    'top' : ''
                });
                $('.suspension-nav-wrap').find('.right-floatNav').css({
                    'top' : ''
                });
            }
        });
    }
}
suspension(), windows.resize(suspension);




/******************************************************************/
    //搜索结果Tab切换
    $('.blist-flck a').click(function(){
        $(this).addClass('ts-sd').siblings('a').removeClass('ts-sd');
    })
    
    $('.source-title a').click(function(){
        $(this).addClass('cur-source').siblings().removeClass('cur-source');
    })
    /*弹窗关闭*/
    $('.pop-close').click(function(){
        
        $(this).parent().hide().siblings('.mask').hide();

    })
    /*触发弹窗*/
   /* $('.note-info').click(function(){
        $(".mask").show();
        $('.pop').show();
    })*/
    function pop_h(){
        $('.pop').each(function(){
            var oheight=$(this).children('.pop-text').outerHeight();
            $(this).children('.pop-img').height(oheight);
            $(this).children('.pop-close').click(function(){
                $(this).parent().hide().siblings('.mask1').hide();
            })
        })
        
    }
	//pop_h();
    /*阅读记录-时间下拉菜单*/
    $('.select1').click(function(e){
        $(this).children('ul').slideToggle();
        $(this).siblings().children('ul').slideUp();
        e.stopPropagation();
    })
    $(document).click(function(){
        $('.select1 ul').slideUp();
    })
    /*我的标签*/
/*   function bq(){
        $('.wdbq li').hover(function(){
            $(this).toggleClass('bq-del');
        })
        $('.wdbq li').click(function(){
            $(this).remove();
        })
    }*/

    function bq(){
        $('.wdbq li').live('hover',function(event){
            $(this).toggleClass('bq-del');
        });
        $('.wdbq li').live('click',function(){
            $(this).remove();
        })
    }


    bq();
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


    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {                
            window.clearInterval(InterValObj);//停止计时器
            $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode").val("重新发送验证码");
        }
        else {
            curCount--;
            $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
        }
    }

});
    