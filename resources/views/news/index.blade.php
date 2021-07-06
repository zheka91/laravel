@extends('layouts.main')
@section('title') Новости - @parent @stop
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="{{ route('news.create') }}">Добавить новость</a>
                </div>
                @forelse($newsList as $news)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{ route('news.id', ['id' => $loop->iteration]) }}">
                        <h2 class="post-title">{{ $news['name'] }}</h2>
                        <h3 class="post-subtitle">{!! $news['description']  !!}</h3>
                    </a>
                    <p class="post-meta">
                        Опубликовал
                        <a href="#!">Админ</a>
                        от {{ now()->format('d-m-Y H:i') }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @empty
                    <h2>Записей нет</h2>
                @endforelse
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
                </div>
            </div>
        </div>
    </div>
@endsection
