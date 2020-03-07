<?php



/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/
//
const NAMESPACEC_CHAT = '\App\Http\Controllers\Chat';
Websocket::on('connect', NAMESPACEC_CHAT.'\WebSocketController@connect');

Websocket::on('sendMessages', NAMESPACEC_CHAT.'\WebSocketController@sendMessages');

Websocket::on('disconnect', NAMESPACEC_CHAT.'\WebSocketController@disconnect');


