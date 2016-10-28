/**
 * Created by Administrator on 2015/9/3 0003.
 */
$(function(){
    showNav($(".nyNav li:eq(0)"),0);
    $(".nyNav li").on("click",function(){
        showNav($(this),0)
    })
});

