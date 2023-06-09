<?php

use App\Models\Setting;
use App\Models\FiscalYear;
use Carbon\Carbon;

function ilog($data, $clear = false)
{
    $file = storage_path() . '/logs/debug.log';
    $fileHandle = null;
    $fileHandle = fopen($file, $clear ? 'w' : 'a');
    if (is_array($data)) {
        $data = json_encode($data);
    }
    $date = Carbon::now('UTC');
    $data = "[$date] app.logger: $data";
    fwrite($fileHandle, $data . PHP_EOL);
    fclose($fileHandle);
}
