@extends('layouts.main')
@section('title') Новости - @parent @stop
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="{{ route('news.create', ['catid' => $catid]) }}">Добавить новость</a>
                </div>
                @forelse($newsList as $news)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{ route('news.id', ['id' => $news->id]) }}">
                        <h2 class="post-title">{{ $news->title }}</h2>
                        <h3 class="post-subtitle">{!! $news->description  !!}</h3>
                    </a>
                    <p class="post-meta">
                        Опубликовал
                        <a href="#!">Админ</a>
                        от {{ $news->created_at }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @empty
                    <h2>Записей нет</h2>
                @endforelse
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    {{ $newsList->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
