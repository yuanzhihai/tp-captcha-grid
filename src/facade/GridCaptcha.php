<?php

namespace yzh52521\captcha\facade;
use think\Request;

/**
 * @method static array get(array $captchaData = [])
 * @method static false|array check(string $captchaKey, string $captchaCode, bool $checkAndDelete = true)
 * @method static false|array checkRequest(Request $request, bool $checkAndDelete = true)
 * @method static string getCaptchaCode()
 * @see \yzh52521\captcha\GridCaptcha
 */
class GridCaptcha extends \think\Facade
{
    public static function getFacadeClass()
    {
        return 'GridCaptcha';
    }
}
