@extends('layouts.app')

@section('content')
<script>
    // socket.on('sendwelcomemsg' , function(data){
    //     document.querySelector('#message').innerHTML = `<h1>${data}</h1>`
    // })

    socket.on('getNewMessages' , function(data){
        document.querySelector('#message').innerHTML += `<h1>${data}</h1>`
    })
    function sendMessage(){
        let message = document.querySelector('#sendmessage').value;
        let sendTo = document.querySelector('#sendTo').value;
        console.log(message)
        console.log(sendTo)
        socket.emit('sendMessages',{
            to: sendTo,
            message:message
        });
    }
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div id="message" class="h1"></div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <div class="max-w-sm mx-auto flex p-6 bg-white rounded-lg shadow-xl">
                        <div class="flex-shrink-0">
                          <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo">
                        </div>
                        <div class="ml-6 pt-1">
                          <h4 class="text-xl text-gray-900 leading-tight">ChitChat</h4>
                          <p class="text-base text-gray-600 leading-normal">You have a new message!</p>
                        </div>
                      </div> --}}
<br>

                      <div class="shadow rounded to w-full  border-solid border-t-4 border-purple p-6 my-2">
                        <div class="flex justify-between items-center">
                          <h4 class="uppercase text-grey text-xs text-wide tracking-wide font-thin ">Chat</h4>
                        </div>
                        {{-- <h3 class="text-grey-dark text-sm font-medium font-sans leading-normal">Check our latest offer! 50% ON ALL COMPONENTS!</h3> --}}
                        {{-- <p class="my-3 text-grey font-light tracking-wide font-sans leading-normal text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p> --}}
                        <textarea  id="sendmessage" class="border-solid border w-full rounded px-3 py-2" cols="30" rows="10" placeholder="Message"></textarea>
                        <input type="text" name="sendTo" id="sendTo" class="border-solid border w-full rounded px-3 py-2">
                        <button class="bg-purple-600 text-white  px-3 py-2 rounded w-full mt-4" onclick="sendMessage()">Send!</button>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
