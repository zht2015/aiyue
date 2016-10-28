/*
模块所需js
by 胡望明
2016.7.1
*/
/*
删除操作
*/
function del_hadel(url){
	layer.confirm('删除确认？', {
      btn: ['确定','取消'] //按钮
    }, function(){
       var length = $("input[name='check_all']:checked").length;
        if(length <= 0){
           layer.msg('请选择数据!', {icon: 2});
        }else{
           var valArr = new Array;  
           $("input[name='check_all']:checked").each(function(i){  
             valArr[i] = $(this).val();  
           });  
            var id = valArr.join(',');//数组转换以逗号隔开的字符串 
            // alert(id);
            $.post(url, {id: id},function(data){
		     if(data.status == 'success'){
		        layer.msg(data.info, {icon: 1});
		        window.location.reload();
		      }else{
		        layer.msg(data.info, {icon: 2});
		      }
		    }, "json");
        }
      }, function(){});
}
/*
查看一元购详情
*/
function oneBuyDeteiled(url){
	$.getJSON(url,function(msg){
		var html = '';
		html  = '<ul class="oneBuyDeteiled">';
		html += '<li>姓　　名：'+msg.user_name+'</li>';
		html += '<li>设计号码：'+msg.tel+'</li>';
		html += '<li>买家留言:'+msg.message+'</li>';
		html += '</ul>';
		layer.open({
		  title:'购买详情',
		  area:['500px', 'auto'],
		  type: 1,
		  skin: 'layui-layer-demo', //样式类名
		  closeBtn: 1, //不显示关闭按钮
		  shift: 2,
		  shadeClose: true, //开启遮罩关闭
		  content: html
		});
	});
}
/*
信息推送
*/
function oneBuyPush(url,status){
	layer.confirm('推送确认？', {
      btn: ['确定','取消'] //按钮
    }, function(){
       var length = $("input[name='check_all']:checked").length;
        if(length <= 0){
           layer.msg('请选择数据!', {icon: 2});
        }else{
           var valArr = new Array;  
           $("input[name='check_all']:checked").each(function(i){  
             valArr[i] = $(this).val();  
           });  
            var id = valArr.join(',');//数组转换以逗号隔开的字符串
            $.getJSON(url, {id: id,status:status},function(data){
		     if(data.status == 'success'){
		        layer.msg(data.info, {icon: 1});
		        window.location.reload();
		      }else{
		        layer.msg(data.info, {icon: 2});
		      }
		    });
        }
      }, function(){});
}
//栏目排序
function category_sort(url){
   layer.load(1, {shade: [0.5,'#000']}); //0.1透明度的白色背景
   var valArr  = new Array;  //文本框的值
   var nameArr = new Array;  //文本框的名字
   $(".sort").each(function(i){  
     valArr[i]  = $(this).val();
     nameArr[i] = $(this).attr('name');
   });
   var name   = valArr.join(',');
   var id = nameArr.join(',');

  
  $.post(url, {id: id,name:name },function(data){
  		

     if(data.status == 'success'){
        layer.msg(data.info, {icon: 1});
        window.location.reload();
      }else{
        layer.msg(data.info, {icon: 2});
      }
    }, "json");
}