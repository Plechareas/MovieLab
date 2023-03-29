<?php

function lazy_session_start() {
  if (!isset($_SESSION) || !is_array($_SESSION)) {
    session_start();
  }
}

?>