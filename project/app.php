<?php

use App\Controllers\ApiController;
use App\Response\Response;

try {
    $apiRequest = new App\Request\Request();

} catch (Exception $e) {
    echo 'Bad Request';
}

$api = new ApiController(
    $apiRequest,
    new Response(
        $apiRequest
    )
);

echo $api->handled();
