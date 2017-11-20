<?php
/**
 * User: zhangxiaoman.
 *
 * @author 章小慢<manyangz@jumei.com>
 * @date 2017/11/20 11:09
 */
require "vendor/autoload.php";

use Alfred\Workflows\Workflow;

$workflow = new Workflow;

unset($argv[0]);
$str = implode(" ", $argv);

if(strval(strtotime(date('Y-m-d H:i:s',$str))) == $str) {
    $result = date("Y-m-d H:i:s",$str);
    $workflow->result()
        ->uid('1')
        ->title('Y-m-d H:i:s')
        ->subtitle($result)
        ->type('default')
        ->arg($result)
        ->valid(true)
        ->icon('icon.png')
        ->autocomplete($result);
} else {
    $result = strtotime($str);
    $workflow->result()
        ->uid('2')
        ->title('timestamp')
        ->subtitle($result)
        ->type('default')
        ->arg($result)
        ->valid(true)
        ->icon('icon.png')
        ->autocomplete($str);
}

echo $workflow->output();

?>


