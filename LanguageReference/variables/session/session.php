<?php

//session最大生命周期
ini_set('session.gc_maxlifetime', 1800);
session_name('test');
//session_id('testid');
session_start();
$_SESSION['test'] = '123';
