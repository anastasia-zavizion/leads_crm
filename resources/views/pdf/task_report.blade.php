<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/task_report.css') }}">

</head>
<body>
<header>
    <h1>Tasks report</h1>
</header>
<div>
    <table>
        <thead>
        <th>Id</th>
        <th>Lead</th>
        <th>Title</th>
        <th>Description</th>
        <th>Added</th>
        </thead>
        <tbody>
        @foreach($tasks as $task)
           <tr>
               <td>{{$task->id}}</td>
               <td>{{$task->lead->name}}</td>
               <td>{{$task->title}}</td>
               <td>{!!nl2br($task->description)!!}</td>
               <td>{{$task->created_date}}</td>
           </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
