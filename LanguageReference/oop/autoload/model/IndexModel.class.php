<?php

namespace OOP\Model;

class IndexModel
{
    public function index()
    {
        echo '::class=>',self::class,'<br>','__CLASS__=>',__CLASS__,'<br>';
    }
}
