$(function(){
    $(".searchBtn").on("click",function(e){
        $(".search input").focus();
        $(".search").toggleClass("cur")
    });
    $(".search input").on("blur",function(){
        $(".search").removeClass("cur")
    });   
})