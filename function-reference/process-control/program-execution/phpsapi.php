<?php
echo php_sapi_name();
file_put_contents('./test.log', php_sapi_name());
