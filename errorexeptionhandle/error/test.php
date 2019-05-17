<?php

try {
    test();
} catch (Error $e) {
    echo $e->getMessage();
}
