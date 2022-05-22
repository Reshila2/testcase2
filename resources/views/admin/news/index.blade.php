@extends('admin.index')

@section('title', 'Edit')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Все новости</h2>
                    </div>
                    <div class="pull-right" style="float: right">
                        <a class="btn btn-primary" href="{{ route('news.create') }}"> Добавить</a>

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

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                No
                            </th>
                            <th>
                                Загаловок
                            </th>
                            <th>
                                Анонс
                            </th>
                            <th>
                                Текст
                            </th>
{{--                            <th>--}}
{{--                                Название рубрики--}}
{{--                            </th>--}}
{{--                            <th>--}}
{{--                              Автор--}}
{{--                            </th>--}}
                            <th style="width: 23%">Действия
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $key=>$news)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{ $news['heading'] }}
                                </td>
                                <td>
                                    {{ $news['anons'] }}
                                </td>
                                <td>
                                    {{ $news['text'] }}
                                </td>
{{--                                <td>--}}
{{--                                    {{ $news->rubric['rubric_name'] }}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{ $news->author['author_name'] }}--}}
{{--                                </td>--}}

                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="{{ route('news.edit', $news['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>
                                    <form action="{{ route('news.destroy', $news['id']) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

