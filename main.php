<?php
/**
 * @author 章小慢
 * @date 2017/11/20 11:09
 */
require "vendor/autoload.php";

use Alfred\Workflows\Workflow;

$workflow = new Workflow;

unset($argv[0]);
$str = implode(" ", $argv);

// timestamp
if (ctype_digit($str)) {
    $workResult = $workflow->result();
    if (strlen($str) != 10)
    {
        $workResult->title("Params error...")->subtitle("{$str} is not unix timestamp");
    } else {
        $result = date("Y-m-d H:i:s",$str);
        $workResult->title('Y-m-d H:i:s')->subtitle($result)->arg($result)->autocomplete($result);
    }
    $workResult->uid('1')
        ->type('default')
        ->valid(true)
        ->icon('icon.png');
    die($workflow->output());
}

$result = strtotime($str);

$workflowResult = $workflow->result();
$workflowResult->uid('2')->title('date');
if (empty($result)) {
    $workflowResult->subtitle("{$str} is not unix date");
    die($workflow->output());
}
$workflowResult->type('default')
    ->subtitle($result)
    ->arg($result)
    ->valid(true)
    ->icon('icon.png')
    ->autocomplete($str);
die($workflow->output());
?>


