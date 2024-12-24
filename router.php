<?php

use App\Router;



if (Router::isApiCall()) {
    require 'routes/api.php';
    exit();
} elseif (Router:: isTelegram()) {
    require 'routes/telegram.php';
    exit();
}
require 'routes/web.php';
