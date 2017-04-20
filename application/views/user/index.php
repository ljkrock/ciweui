<?php echo validation_errors(); ?>

<?php echo form_open_multipart('user/index',array('class' => 'regform', 'id' => 'regform')); ?>
<div class="weui-cells__title">基础信息</div>
<div class="weui-cells weui-cells-form">
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">用户名</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="username" type="text" placeholder="请输入用户名" value="<?php echo $username ?>" />
        </div>
	</div>
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">邮箱</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="email" type="text" placeholder="请输入邮箱" value="<?php echo $email ?>" />
        </div>
	</div>
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">密码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="password" type="password" placeholder="请输入密码"/>
        </div>
	</div>
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="prepassword" type="password" placeholder="请输入密码"/>
        </div>
	</div>
	
</div>
<div class="weui-cells__title">选择性别</div>
<div class="weui-cells weui-cells_radio">
    <label class="weui-cell weui-check__label" for="x11">
        <div class="weui-cell__bd">
            <p>女</p>
        </div>
        <div class="weui-cell__ft">
            <input class="weui-check" name="sex" id="x11" type="radio" <?php if($sex==0) echo "checked" ?> value='0'>
            <span class="weui-icon-checked"></span>
        </div>
    </label>
    <label class="weui-cell weui-check__label" for="x12">

        <div class="weui-cell__bd">
            <p>男</p>
        </div>
        <div class="weui-cell__ft">
            <input name="sex" class="weui-check" id="x12" <?php if($sex==1) echo "checked" ?> value="1" type="radio">
            <span class="weui-icon-checked"></span>
        </div>
    </label>
    
</div>
<!-- <input type="hidden" name="avatar" id="avatar">   -->
<div class="weui-cells__title">头像上传</div>
<div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files" id="uploaderFiles">
                                <li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(<?php echo base_url().$avatar ?>)"></li>
                            </ul>
                            <div class="weui-uploader__input-box">
                                <input name="avatar" id="uploaderInput" class="weui-uploader__input js_file" type="file" accept="image/*" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="js_dialog" id="iosDialog1" style="display: none;">
            <div class="weui-mask"></div>
            <div class="weui-dialog">
                <div class="weui-dialog__hd"><strong class="weui-dialog__title">弹窗标题</strong></div>
                <div class="weui-dialog__bd">弹窗内容，告知当前状态、信息和解决方法，描述文字尽量控制在三行内</div>
                <div class="weui-dialog__ft">
                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default">辅助操作</a>
                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary">主操作</a>
                </div>
            </div>
        </div>

<label for="weuiAgree" class="weui-agree">
    <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox">
    <span class="weui-agree__text">
        阅读并同意<a href="javascript:void(0);">《相关条款》</a>
    </span>
</label>

<div class="weui-btn-area">
    <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">确定</a>
</div>
</form>

<script>
	$.weui = {};  
  $.weui.alert = function(options){  
    var $iosDialog1 = $('#iosDialog1');
    var $alert = $('.js_dialog');
    
    $alert.on('touchend click','.weui-dialog__btn_primary',function(){
    	$alert.fadeOut(200);
    });
    $iosDialog1.fadeIn(300);
  };  

  $('#showTooltips').on('click',function(){
  	$('#regform').submit();
  })
	$(function () {  
    // 允许上传的图片类型  
    var allowTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    // 1024KB，也就是 1MB  
    var maxSize = 1024 * 1024;  
    // 图片最大宽度  
    var maxWidth = 300;  
    // 最大上传图片数量  
    var maxCount = 1;
    $('.js_file').on('change', function (event) {  
    	$('.weui-uploader__files').html('');
      var files = event.target.files; 
        // 如果没有选中文件，直接返回  
        if (files.length === 0) {  
          return;  
        }  
        
        for (var i = 0, len = files.length; i < 1; i++) {  

          var file = files[i];  
          var reader = new FileReader();  
          
            // 如果类型不在允许的类型范围内  
            if (allowTypes.indexOf(file.type) === -1) {  
              $.weui.alert({text: '该类型不允许上传'});  
              continue;  
            }  
            
            if (file.size > maxSize) {  
              $.weui.alert({text: '图片太大，不允许上传'});  
              continue;  
            }  
            console.log($('.weui-uploader__file').length);
            if ($('.weui-uploader__file').length >= maxCount) {  
              $.weui.alert({text: '最多只能上传' + maxCount + '张图片'});  
              return;  
            }  
            
            reader.onload = function (e) {  
              var img = new Image();  
              img.onload = function () {  
                    // 不要超出最大宽度  
                    var w = Math.min(maxWidth, img.width);  
                    // 高度按比例计算  
                    var h = img.height * (w / img.width);  
                    var canvas = document.createElement('canvas');  
                    var ctx = canvas.getContext('2d');  
                    // 设置 canvas 的宽度和高度  
                    canvas.width = w;  
                    canvas.height = h;  
                    ctx.drawImage(img, 0, 0, w, h);  
                    var base64 = canvas.toDataURL('image/png');  
                    //$('#avatar').val(base64);
                    // 插入到预览区  
                    var $preview = $('<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(' + base64 + ')"><div class="weui-uploader__file-content">0%</div></li>');  
                    $('.weui-uploader__files').append($preview);  
                    var num = $('.weui-uploader__file').length;  
                    $('.js_counter').text(num + '/' + maxCount);  
                    
                    // 然后假装在上传，可以post base64格式，也可以构造blob对象上传，也可以用微信JSSDK上传  
                    
                    var progress = 0;  
                    function uploading() {  
                      $preview.find('.weui-uploader__file-content').text(++progress + '%');  
                      if (progress < 100) {  
                        setTimeout(uploading, 30);  
                      }  
                      else {  
                            // 如果是失败，塞一个失败图标  
                            //$preview.find('.weui_uploader_status_content').html('<i class="weui_icon_warn"></i>');  
                            $preview.removeClass('weui-uploader__file_status').find('.weui-uploader__file-content').remove();  
                          }  
                        }  
                        setTimeout(uploading, 30);  
                      };  
                      
                      img.src = e.target.result;  
                    };  
                    reader.readAsDataURL(file);  
                  }  
                });  
  });  
</script>
