<?php echo validation_errors(); ?>
<?php echo form_open('user/login'); ?>

<div class="weui-msg">
        <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg"></i></div>
    </div>
<div class="weui-cells weui-cells-form">
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">邮箱</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="email" type="text" placeholder="请输入邮箱"/>
        </div>
	</div>
	
	<div class="weui-cell">
		<div class="weui-cell__hd"><label class="weui-label">密码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="password" type="password" placeholder="请输入密码"/>
        </div>
	</div>
	
</div>
<p class="weui-btn-area">
                <input type="submit" class="weui-btn weui-btn_primary" name="" value="登录"> 

                <a href="<?=base_url()?>index.php/user/create" class="weui-btn weui-btn_default">注册</a>
                
            </p>
</form>