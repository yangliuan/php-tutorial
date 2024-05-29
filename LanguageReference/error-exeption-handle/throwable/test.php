<?php

try {
    test();
} catch (Throwable $th) {
    echo $th->getMessage();
}
