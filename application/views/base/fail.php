<div class="page">
    <div class="weui-msg">
        <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
        <div class="weui-msg__text-area">
            <h2 class="weui-msg__title"><?php echo $tips ;?>有误</h2>
            
        </div>
        <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a href="<?=base_url()?>index.php/user/login" class="weui-btn weui-btn_primary">重新登录</a>
                <a href="<?=base_url()?>index.php/user/create" class="weui-btn weui-btn_default">注册</a>
            </p>
        </div>
        
    </div>
</div>