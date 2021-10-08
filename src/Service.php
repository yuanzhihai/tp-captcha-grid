<?php

namespace yzh52521\Think;

use yzh52521\Think\command\Publish;
use yzh52521\Think\GridCaptcha;

class Service extends \think\Service
{

    public function register()
    {
        $this->app->bind('GridCaptcha', GridCaptcha::class);
    }

    public function boot()
    {
        $this->commands(['gridCaptcha:publish' => Publish::class]);
    }
}
