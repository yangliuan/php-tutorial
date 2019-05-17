<?php

namespace OOP\Controller;

class IndexController
{
    public function index()
    {
        echo '::class=>',self::class,'<br>','__CLASS__=>',__CLASS__,'<br>';
    }
}
