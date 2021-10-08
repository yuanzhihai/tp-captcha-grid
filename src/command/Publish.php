<?php

declare(strict_types=1);

namespace yzh52521\captcha\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\facade\Env;

class Publish extends Command
{

    public function configure()
    {
        $this->setName('gridCaptcha:publish')
            ->setDescription('Publish gridCaptcha config to config folder');
    }

    public function execute(Input $input, Output $output)
    {
        //获取默认配置文件
        $content = '/../../../think-auth/src/config';
        $resources = '/../../../think-auth/src/resources';
        $storage = '/../../../think-auth/src/storage';
        $this->xCopy($content, config_path());
        $this->xCopy($resources, base_path());
        $this->xCopy($storage, base_path('storage'));
        $output->writeln('publish ok');
    }


    public function xCopy($source, $destination, $child = 1)
    {
        if (!is_dir($source)) {
            echo("Error:the $source is not a direction!");
            return 0;
        }
        if (!is_dir($destination)) {
            if (!mkdir($destination, 0777) && !is_dir($destination)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination));
            }
        }
        $handle = dir($source);
        while ($entry = $handle->read()) {
            if (($entry !== ".") && ($entry !== "..")) {
                if (is_dir($source . "/" . $entry)) {
                    if ($child) {
                        copy($source . "/" . $entry, $destination . "/" . $entry, $child);
                    }
                } else {
                    copy($source . "/" . $entry, $destination . "/" . $entry);
                }
            }
        }
    }

}
