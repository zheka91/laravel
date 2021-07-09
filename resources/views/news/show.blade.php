@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <h2 class="post-title">{{ $newsList->title }}</h2>
                    <p>{{ $newsList->description }}</p>
                    <p class="post-meta">
                        Опубликовал
                        <a href="#!">Админ</a>
                        от {{ $newsList->created_at }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
