<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificaciones</title>
    <script src="./js/app.js"></script>
</head>
<body>
    <div>
        <div>
            <input type="text" name="username" id="username" placeholder="Nombre">
        </div>
        <div id="messages" ></div>
        <div>
            <form id="messageForm" method="post" action="/send-notification">
                @csrf
                <div>
                    <input type="text" name="message" id="messageInput" placeholder="Mensaje">
                </div>
                <div>
                    <button type="submit" id="messageSend">Enviar</button>
                </div>
            </form>
        </div>
    </div>
   
    <script>
       var channel = Echo.channel('comment-channel');
        channel.listen('.comment-event', function(data) {
            alert(JSON.stringify(data));
        });
      </script>
</body>
</html>