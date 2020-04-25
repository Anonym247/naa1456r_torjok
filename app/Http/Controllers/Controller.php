<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function config_set($key, $value, $oldValue)
    {
        $config = app()->configPath().'/app.php';
        $content = file_get_contents($config);
        $valuePosition = strpos($content, "'{$key}' => '{$oldValue}'");
        $endOfLinePosition = strpos($content, "',", $valuePosition) + 1;
        $oldLine = substr($content, $valuePosition,  strpos($content, "\n", $valuePosition) - $valuePosition - 1);
        if (!$endOfLinePosition || !$oldLine)
            return false;
        else
            $content = str_replace($oldLine, "'{$key}' => '{$value}'", $content);
        if (!file_put_contents($config, $content))
            return false;
        return true;
    }
}
