<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use SwooleTW\Http\Websocket\Facades\Websocket;


class WebSocketController extends Controller
{
    public function connect($websocket, Request $request)
    {
        $user = $request->user();
        $websocket->loginUsing($user);
        $m = 'Welcome '. $websocket->getUserId() ."\n";
        echo $m;
        $websocket->broadcast()->emit('getNewMessages', 'user  is joined'.$websocket->getUserId());

        $websocket->emit('sendwelcomemsg',$m);
        // dump(get_class_vars($websocket));
        // Websocket::emit('sendwelcomemsg',$m);
        // $websocket->emit('sendwelcomemsg','Welcome :D');
        // return dump($request->user()->name);
    }

    public function sendMessages($websocket,$data){
        $websocket->toUserId($data['to'])->emit('getNewMessages',$data['message']);
    }

    public function disconnect($websocket){
        // called while socket on disconnect
    }
}
