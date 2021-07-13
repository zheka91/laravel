@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="{{ route('category.create') }}">Добавить категорию</a>
                </div>
                @forelse($catList as $id => $cat)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{ route('news.catid', ['catid' => $cat->id]) }}">
                        <h2 class="post-title">{{ $cat->id . ") " . $cat->title }}</h2>
                    </a>
                    <div style="text-align: right;">
                        <a class="btn btn-primary text-uppercase" href="{{ route('category.edit', ['catid' => $cat->id]) }}" style="color:white;">Изменить категорию</a>
                    </div>
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
