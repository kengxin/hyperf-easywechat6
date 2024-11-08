<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact group@hyperf.io
 * @license https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Pengxuxu\HyperfWechat;

use Hyperf\Context\ApplicationContext;

/**
 * Class EasyWechat
 * @method \EasyWeChat\OfficialAccount\Application officialAccount(string $name = "default", array $config = [])
 * @method \EasyWeChat\Pay\Application pay(string $name = "default", array $config = [])
 * @method \EasyWeChat\MiniApp\Application miniApp(string $name = "default", array $config = [])
 * @method \EasyWeChat\OpenPlatform\Application openPlatform(string $name = "default", array $config = [])
 * @method \EasyWeChat\Work\Application work(string $name = "default", array $config = [])
 * @method \EasyWeChat\OpenWork\Application openWork(string $name = "default", array $config = [])
 */
class EasyWechat
{
    public static function __callStatic($functionName, $args)
    {
        if (class_exists('\Hyperf\Context\ApplicationContext')) {
            return \Hyperf\Context\ApplicationContext::getContainer()->get(Factory::class)->{$functionName}(...$args);
        }

        return ApplicationContext::getContainer()->get(Factory::class)->{$functionName}(...$args);
    }
}
