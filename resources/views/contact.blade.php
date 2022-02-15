<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="subject">Тема</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="text">Сообщение</label>
                            <textarea name="text" id="text" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="file">Файл</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
