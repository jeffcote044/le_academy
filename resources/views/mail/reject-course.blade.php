<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tenemos noticias a cerca de tu curso</h1>
    
    <p><strong>{{$course->teacher->name}}</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod accusantium ducimus obcaecati expedita mollitia iure exercitationem facilis, rerum explicabo, non nemo officia at, sapiente error tempora laudantium debitis. Laboriosam, delectus!</p>
    <h2>Datos de tu curso:</h2>
    <p>{{$course->title}}</p>
    <h2>Estado:</h2>
    <p>Rechazado</p>
    <h2>Observaciones</h2>
    {!!$course->observation->body!!}
    
</body>
</html>