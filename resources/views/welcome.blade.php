@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7" style="text-align: center; margin-bottom: 150px;">
                <h1>Добро пожаловать!</h1>
                <a href="<?= route("category") ?>">Перейти в категории</a>
            </div>
        </div>
    </div>
@endsection
