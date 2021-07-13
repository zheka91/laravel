@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div>
                    <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ $news->description }}">
                        </div>
                        <button class="btn btn-primary" type="submit" style="margin: 25px 0; float: right;">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
