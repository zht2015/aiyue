<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html style="width:850px;">
<head>
    <meta charset="utf-8">
    <title>收货地址管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/cy.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/style.css" />
    <script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
    <script src="/Public/Home/js/comms.js"></script>
    <script src="/Public/Home/js/comm.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/uploader.js"></script>
    <style type="text/css">
        html,body{
            width:750px;
            overflow:hidden;
        }
        .xgmm{
                width: 100%;
                height: 100%;
                left: 0;
                background: #fff;
                position: fixed;
                top: -70px;
            }
    </style>
</head>
<body style="width:850px;">
<!--/*弹出框*/-->
<div class="xgmm" id="xxmm">
    <div class="xgmm_1">
<!--          <div class="xinz-top">
           <h2>添加新的地址</h2>
           <a onclick="ab1()" href="#"><img src="/Public/Home/images/cccdiao.jpg"/></a>
         </div> -->
         <div class="xinz-cen">
           <table class="tbl-1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="19%" align="right">位置 ：</td>
            <td>
              <select class="seoption" onchange="province();" id="province">
                            <option value="-1">选择省份</option>
                            <?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($info['area1'] == $v['area_id']): ?><script>
                                        $(function(){
                                            province();
                                        })
                                    </script>
                                    <option value="<?php echo ($v['area_id']); ?>" selected><?php echo ($v['area_name']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($v['area_id']); ?>"><?php echo ($v['area_name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            <input type="hidden" id="cityss" value="<?php echo ($info['area2']); ?>"/>
                            <input type="hidden" id="areass" value="<?php echo ($info['area3']); ?>"/>
                        </select>
                        <select id="city" class="seoption" onchange="province2();">
                            <option value="-1">选择城市</option>
                        </select>
                        <select id="area" class="seoption">
                            <option value="-1">选择区县</option>
                        </select>
                <span>*</span>
            </td>
            </tr>
            <tr>
            <td align="right">地址：</td>
            <td><textarea class="textar" id="detailAddress"><?php echo ($info['address']); ?></textarea><span>*</span></td>
            </tr>
            <tr>
            <td align="right">邮政编码 ：</td>
            <td><input type="text" name="postCode" placeholder="邮政编码" id="postCode" class="seInput" value="<?php echo ($info['post_code']); ?>"></td>
            </tr>
            <tr>
            <td align="right">收货人姓名：</td>
            <td><input type="text" name="consignee" placeholder="收货人姓名" id="consignee" class="seInput" value="<?php echo ($info['consignee']); ?>"><span>*</span></td>
            </tr>
            <tr>
            <td align="right">手机号码 ：</td>
            <td><input type="text" name="mobile" placeholder="手机号码" maxlength="11" id="mobile" class="seInput"value="<?php echo ($info['mobile']); ?>"><span>*</span></td>
            </tr>
            <tr>
            <td align="right">&nbsp;</td>
            <td class="mrdizhi" height="44"><input class="checkbox" type="checkbox" name="checkbox" value="1"<?php if($info['is_default'] == '1'): ?>checked<?php endif; ?>/>设置为默认送货地址</td>
            </tr>
            <tr>
            <td align="right">&nbsp;</td>
            <td><input type="button" value="保 存" name="" class="seButton"  onclick="submitte(<?php echo ($info['id']); ?>);"/></td>
            </tr>
            </table>

         </div>
      </div>
    </div>

<script>
    function aa1(){
        layer.open({
            type: 1,
            closeBtn: 1,
            content:  $("#xxmm"), //这里content是一个普通的String
            area: ['850px'],
            shade: [0.5, '#000'],
            shadeClose :true,
            title:"添加新地址"
        });
    }

    /*修改收货地址*/
    function xx1(){
        layer.open({
            type: 2,
            closeBtn: 1,
            content: "<?php echo U('UserAddress/saveAddress');?>", //这里content是一个普通的String
            area: ['850px','600px'],
            shade: [0.5, '#000'],
            shadeClose :true,
            title:"修改地址"
        });
    }

    function province(){
        var province=$("#province").val();
        $("#city").html("<option value='-1'>请选择</option>");
        $("#area").html("<option value='-1'>请选择</option>");
        var cityss = $("#cityss").val();
        $.post("<?php echo U('Area/city');?>",{id:province},function(data){
            var length = data.length;
            var html = "<option value='-1'>请选择</option>";
            for(var i=0;i<length;i++){
                if(cityss==data[i].area_id){
                    html += "<option value="+data[i].area_id+" selected >"+data[i].area_name+"</option>";
                }else{
                    html += "<option value="+data[i].area_id+">"+data[i].area_name+"</option>";
                }
            }
            $("#city").html(html);

            var city = $("#city").val();
            $.post("<?php echo U('Area/area');?>",{id:city},function(data){
                if(data==null){
                    $("#area").hide();
                }else{
                    $("#area").show();
                }
                var length = data.length;
                var html="";
                html ="<option value='-1'>请选择</option>";
                var areass = $('#areass').val();
                for(var i=0;i<length;i++){
                    if(areass==data[i].area_id){
                        html += "<option value="+data[i].area_id+" selected>"+data[i].area_name+"</option>";
                    }else{
                        html += "<option value="+data[i].area_id+">"+data[i].area_name+"</option>";
                    }
                }
                $("#area").html(html);
            })


        })
    }

    function province2(){
        var city = $("#city").val();
        $("#area").html("");
        $.post("<?php echo U('Area/area');?>",{id:city},function(data){
            if(data==null){
                $("#area").hide();
            }else{
                $("#area").show();
            }
            var length = data.length;
            var html="";
            html ="<option value='-1'>请选择</option>";
            var areass = $('#areass').val();
            for(var i=0;i<length;i++){
                if(areass==data[i].area_id){
                    html += "<option value="+data[i].area_id+" selected>"+data[i].area_name+"</option>";
                }else{
                    html += "<option value="+data[i].area_id+">"+data[i].area_name+"</option>";
                }
            }
            $("#area").html(html);
        })
    }
    function submitte(id){
        var params={};
        params.id =id;
        params.consignee = $("#consignee").val();
        params.mobile  = $("#mobile").val();
        params.province = $("#province option:selected").text();
        params.city = $("#city option:selected").text();
        var area = $("#area option:selected").text();
        params.area1 = $("#province option:selected").val();
        params.area2 = $("#city option:selected").val();
        params.area3 = $("#area option:selected").val();
        params.postCode = $("#postCode").val();
        params.address= $("#detailAddress").val();
        var isDefault = $("input[type='checkbox']").is(':checked');
        if(isDefault==true){
            params.isDefault=1;
        }
        params.area = params.province+" "+params.city+" "+area;
        var re = /^1\d{10}$/;
          if(params.area1=="-1"){
            layer.msg("请选择省份");
            return;
        }
        if(params.area2=="-1"){
            layer.msg("请选择城市");
            return;
        }
        if(params.area3=="-1"){
            layer.msg("请选择区县");
            return;
        }
        if(params.address==""){
            layer.msg("详细地址不能为空");
            return;
        }
        if(params.consignee==""){
            layer.msg("收货人不能为空");
            return;
        }
        if(params.mobile==""){
            layer.msg("手机号码不能为空");
            return;
        }
        if(!re.test(params.mobile)){
            layer.msg("手机号码格式错误");
            return;
        }
      
        $.post("<?php echo U('UserAddress/editAddress');?>",params,function(data){
            if(data.status==1){
                layer.msg("修改成功");
                setTimeout(function(){
                    parent.location.reload();
                },500)

            }
        })
    }
</script>

</body>
</html>