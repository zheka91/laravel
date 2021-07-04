@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @forelse($catList as $id => $cat)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{ route('news.catid', ['catid' => $id]) }}">
                        <h2 class="post-title">{{ $cat }}</h2>
                    </a>
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
