<?php
/**
 * SSE PHP服务端示例
 * DOC:
 * https://developer.mozilla.org/zh-CN/docs/Web/API/Server-sent_events/Using_server-sent_events#%E9%94%99%E8%AF%AF%E5%A4%84%E7%90%86
 * 
 * Code:
 * https://github.com/mdn/dom-examples/blob/main/server-sent-events/sse.php
 */
date_default_timezone_set("Asia/Shanghai");
header("X-Accel-Buffering: no");
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
set_time_limit(10);
$counter = rand(1, 10); // a random counter
while (1) {
// 1 is always true, so repeat the while loop forever (aka event-loop)

  $curDate = date("Y-m-d\\TH:i:sO");
  echo "event: ping\n",
       'data: {"time": "' . $curDate . '"}', "\n\n";

  // Send a simple message at random intervals.

  $counter--;

  if (!$counter) {
    echo 'data: This is a message at time ' . $curDate, "\n\n";
    $counter = rand(1, 10); // reset random counter
  }

  // flush the output buffer and send echoed messages to the browser

  while (ob_get_level() > 0) {
    ob_end_flush();
  }
  flush();

  // break the loop if the client aborted the connection (closed the page)
  
  if ( connection_aborted() ) break;

  // sleep for 1 second before running the loop again
  
  sleep(1);

}