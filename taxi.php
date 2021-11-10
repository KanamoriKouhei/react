<?php
$inputs = [];
while ($stdin = trim(fgets(STDIN))) {
    $array = explode(' ', $stdin);
    $inputs[] = $array;
}
$num = 0;
$range = 0;
$result = '　';
foreach ($inputs as $index => $input) {
    if ($index === 0) {
        $num = $input[0] ?? 0;
        $range = $input[1] ?? 1;
    } else {
        //初乗り距離
        $first_range = $input[0] ?? 0;
        //初乗り運賃
        $first_charge = $input[1] ?? 0;
        //加算距離
        $charge_range = $input[2] ?? 0;
        //加算運賃
        $charge = $input[3] ?? 0;
//        echo "初乗り距離：$first_range 初乗り運賃：$first_charge 加算距離:$charge_range 加算運賃：$charge" . PHP_EOL;
        //料金計算処理
        $remain_range = $range - $first_range;
        $result_charge = 0;
        if ($remain_range) {
//            echo $remain_range / $charge_range ;
            $count = ceil($remain_range / $charge_range);
//            echo $count . PHP_EOL;
//            echo $count . PHP_EOL;
            $result_charge = $first_charge + $charge * $count;
//            echo $result_charge . PHP_EOL;
        } else {
            $result_charge = $first_charge;
        }
//        echo $result_charge . PHP_EOL;
        //結果更新
        $array = explode(' ', $result);
        $min = ($array[0] ?? 0) > $result_charge ? $result_charge : ($array[0] ?? 0);
        $max = ($array[1] ?? 0) > $result_charge ? ($array[1] ?? 0) : $result_charge;
        $result = "$min $max" . PHP_EOL;
//        echo $result;
    }
}

echo $result . PHP_EOL;
