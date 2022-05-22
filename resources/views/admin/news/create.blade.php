@extends('admin.index')

@section('title', 'Добавать')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Добавать новость</h2>
                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('news.index') }}"> Назад</a>

                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('news.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Загаловок</label>
                                    <input type="text" name="heading" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите название заголовка" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Анонс</label>
                                    <input type="text" name="anons" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите анонс" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Текст</label>
                                    <input type="text" name="text" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите текст" required>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Выберите рубрику</label>
                                        <select name="rubric_news_id" class="form-control" required>
                                            @foreach ($rubric as $rubric)
                                                <option  value="{{ $rubric['id'] }}">{{ $rubric['rubric_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Выберите автора</label>
                                        <select name="news_author_id" class="form-control" required>
                                            @foreach ($author as $a)
                                                <option value="{{ $a['id'] }}">{{ $a['author_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

