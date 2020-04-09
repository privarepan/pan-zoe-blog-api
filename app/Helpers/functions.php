<?php

function dumpSQL()
{
    Illuminate\Support\Facades\DB::listen(function (\Illuminate\Database\Events\QueryExecuted $query) {
        $bindings = $query->bindings;
        $sql = $query->sql;
        foreach ($bindings as $replace) {
            $value = is_numeric($replace) ? $replace : "'" . $replace . "'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }
//        \Log::info('sql:',[$sql]);
        dump($sql);
    });
}

function printSQL()
{

    Illuminate\Support\Facades\DB::listen(function ($query) {
        $bindings = $query->bindings;
        $sql = $query->sql;
        foreach ($bindings as $replace) {
            $value = is_numeric($replace) ? $replace : "'" . $replace . "'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }

        Log::info($sql);
    });
}

function getDistance($lng1, $lat1, $lng2, $lat2) {
    // 将角度转为狐度
    $radLat1 = deg2rad($lat1); //deg2rad()函数将角度转换为弧度
    $radLat2 = deg2rad($lat2);
    $radLng1 = deg2rad($lng1);
    $radLng2 = deg2rad($lng2);
    $a = $radLat1 - $radLat2;
    $b = $radLng1 - $radLng2;
    $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
    $n = (real)sprintf("%.2f", $s);
    return $n;
}
