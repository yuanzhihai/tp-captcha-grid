<?php

use yzh52521\think\facade\GridCaptcha as GridCaptchaFacades;
use yzh52521\think\GridCaptcha as GridCaptcha;

if (!function_exists('grid_captcha')) {
    /**
     * 当传递时快速创建验证码
     * @param array|null $captchaData
     * @return array|GridCaptcha
     */
    function grid_captcha(array $captchaData = null)
    {
        if ($captchaData !== null) {
            return GridCaptchaFacades::get($captchaData);
        }
        return new GridCaptcha;
    }
}
