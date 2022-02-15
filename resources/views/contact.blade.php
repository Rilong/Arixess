<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    @if(session()->has('timeError'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('timeError')}}
                        </div>
                    @endif
                    <form action="{{route('message.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Тема</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text">Сообщение</label>
                            <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" cols="30" rows="10"></textarea>
                            @error('text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="file">Файл</label>
                            <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
