@extends ('admin.layouts.app_admin')
@section('content')
<div class="container">
<div class="col-sm-4">
<div class="panel-group" id="accordion">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
      Добавить автора</a>
    </h4>
  </div>
  <div id="collapse1" class="panel-collapse collapse in">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_author') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Имя:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="surname">Фамилие:</label>
            <input type="name" class="form-control" name="surname" id="surname">
    </div>
    <div class="form-group">
        <label for="middlename">Отчество:</label>
            <input type="name" class="form-control" name="middlename" id="middlename">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
      Добавить направление</a>
    </h4>
  </div>
  <div id="collapse2" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_heading') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="heading_name">Направление:</label>
            <input type="text" class="form-control" name="heading_name" id="heading_name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
      Добавить язык</a>
    </h4>
  </div>
  <div id="collapse3" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_language') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Язык:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
      Добавить издательство</a>
    </h4>
  </div>
  <div id="collapse4" class="panel-collapse collapse">
    <div class="panel-body">
    <form method="POST" action="{{ url('admin/create_phouse') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Название:</label>
            <input type="name" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="adress">Адрес:</label>
            <input type="name" class="form-control" name="adress" id="adress">
    </div>
    <div class="form-group">
        <label for="tel">Телефон:</label>
            <input type="name" class="form-control" name="tel" id="tel">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Сохранить</button>
    </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">Изменить авторов книг</h4>
</div>
<div class="panel-body"> 
    <div class="form-group">
        <label for="book">Книга:</label>
        <input type="text" class="hidden"  name="book_id" value="{{$book->id}}">
        <p class="form-control-static">{{$book->books_name}}<p>
    </div>
    <label for="author">Авторы</label>
    @foreach($book->authors as $book_author)
        <div class="form-group">
            <div class="col-sm-8">
                <select name="author" class="form-control">
                    @foreach ($authors as $author)
                        @if($author->id==$book_author->id)
                        <option value="{!! $author->id !!}" selected>{!! $author->author_name !!} {!! $author->author_middlename !!} {!! $author->author_surname !!}</option>
                        @else
                            <option value="{!! $author->id !!}">{!! $author->author_name !!} {!! $author->author_middlename !!} {!! $author->author_surname !!}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default">Изменить</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default">Удалить</button>
            </div>
        </div>
    @endforeach
    <div class="form-group">
        <button type="submit" class="btn btn-default">Выйти</button>
    </div>
</div>
</div>
</div> 
</div>
@endsection