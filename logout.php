<?php
require('./inc/app.php');
session_start();
session_unset();
session_destroy();

redirect('index.php');