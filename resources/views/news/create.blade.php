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
                    <form method="post" action="{{ route('news.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
