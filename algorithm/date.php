<?php

/**
 * 计算两个日期相差x年x月x日
 *
 * @param string $date1 日期1
 * @param string $date2 日期2
 * @return array
 */
function diffDate($date1, $date2)
{
    if (strtotime($date1)>strtotime($date2)) {
        $tmp=$date2;
        $date2=$date1;
        $date1=$tmp;
    }

    list($Y1, $m1, $d1)=explode('-', $date1);
    list($Y2, $m2, $d2)=explode('-', $date2);
    $Y=$Y2-$Y1;
    $m=$m2-$m1;
    $d=$d2-$d1;

    if ($d<0) {
        $d+=(int)date('t', strtotime("-1 month $date2"));
        $m--;
    }

    if ($m<0) {
        $m+=12;
        $Y--;
    }

    return array('y'=>$Y,'m'=>$m,'d'=>$d);
}
