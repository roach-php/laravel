<?php

use RoachPHP\Http\Client;
use RoachPHP\Scheduling\ArrayRequestScheduler;

return [

    /*
    |--------------------------------------------------------------------------
    | Request Queue
    |--------------------------------------------------------------------------
    |
    | The RequestQueue implementation Roach uses to schedule new requests
    | during a run.
    |
    | Needs to implement the RoachPHP\Scheduling\RequestScheduler interface.
    |
    */
    'request_queue' => ArrayRequestScheduler::class,

    /*
    |--------------------------------------------------------------------------
    | HTTP Client
    |--------------------------------------------------------------------------
    |
    | The HTTP client implementation Roach uses to dispatch new request
    | during a run.
    |
    | Needs to implement the RoachPHP\Http\ClientInterface interface.
    |
    */
    'client' => Client::class,

];
