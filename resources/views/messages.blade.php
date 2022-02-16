<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>тема</th>
                    <th style="width: 30%">сообщение</th>
                    <th>имя клиента</th>
                    <th>почта клиента</th>
                    <th style="width: 10%">файл</th>
                    <th>Прочитать</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                <tr>
                    <td scope="row">{{$message->id}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->text}}</td>
                    <td>{{$message->user->name}}</td>
                    <td>{{$message->user->email}}</td>
                    <td><a href="{{$message->getFileUrl()}}" target="_blank">{{$message->filename}}</a></td>
                    <td>
                        <form action="{{route('message.toggleRead', ['id' => $message->id])}}" method="post">
                            @csrf
                            @if(!$message->is_read)
                            <button type="submit" class="btn btn-danger">Прочитать</button>
                            @else
                            <button type="submit" class="btn btn-success">Прочитано</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
