<!DOCTYPE html>
<html>
<head>
    <title>Тестовое задание</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32">
        <h1><b>MY BLOG</b></h1>
    </header>

    <button onclick="window.location='{{ url("/add") }}'"> Админ панель</button>

    <!-- Grid -->
    <div class="w3-row">

        <!-- Blog entries -->
        <div class="w3-col l7 s12">
            <!-- Blog entry -->
            @foreach($news as $n)
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h3><b>{{$n['heading']}}</b></h3>
                    <h5>{{$n['anons']}}</h5>
                </div>

                <div class="w3-container">
                    <p>{{$n['text']}}</p>
                    <div class="w3-row">
                        <div class="w3-col m12 w3-hide-small">
                            <h5>Опубликован {{ $n->rubric['rubric_name'] }}
                                <span class="w3-opacity">{{ $n['created_at'] }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <hr>
        </div>
        <div class="w3-col l4">
            <!-- About Card -->
            <div class="w3-card w3-margin w3-margin-top">
                <div class="w3-container w3-white">
                    <h4><b>Искать по статье</b></h4>
                    <form action="{{route('home')}}" method="get" class="searchable">
                        <div class="mb-3" >
                            <label for="exampleFormControlInput1" class="form-label">Искать </label>
                            <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">

                        </div>
                        <button type="submit" class="btn-primary">Поиск</button>
                    </form>
                </div>
            </div>


            <div class="w3-card w3-margin w3-margin-top">
                <div class="w3-container w3-white">
                    <h4><b>Авторы</b></h4>
                    <form action="{{route('home')}}" method="get" class="searchable">
                        <select name="author_id" class="form-control" required>

                            @foreach($author as $a)--}}
                                <option value="{{ $a['id'] }}" @if(isset($_GET['news_author_id'])) @if($_GET['news_author_id']==$a->id)
                                selected @endif @endif>{{ $a['author_name'] }}</option>
                            @endforeach
                        </select>
                    </form>
                    <button type="submit" class="btn-primary">Поиск</button>

                </div>
            </div>

            <div class="w3-card w3-margin">
                <div class="w3-container w3-padding">
                    <h4>Рубрики</h4>
                </div>
                <div class="w3-container w3-white">
                    <div class="mb-3">
                        <form>
                            <div class="mb-3">
                                <div class="form-label">Выберите рубрику</div>
                                <select name="rubric_id" class="form-control" required>
                                    @foreach ($rubric as $r)
                                        <option value="{{ $r['id'] }}" @if(isset($_GET['rubric_news_id'])) @if($_GET['rubric_news_id']==$r->id)
                                        selected @endif @endif>{{ $r['rubric_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn-primary">Поиск</button>
                        </form>
                    </div>
                </div>


            </div>


        </div>

    </div><br>
</div>

{{ $news->links() }}
</body>
</html>

