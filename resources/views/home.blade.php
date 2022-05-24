@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form method="post" enctype='multipart/form-data' action="{{asset('home')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name"  class="form-label">Name</label>
                        <input type="text"  name="name" class="form-control" id="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="body"  class="form-label">Description</label>
                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                    </div>
                        <div class="mb-3">
                        <label for="picture1" class="form-label">Picture</label>
                        <input name="picture1" type="file" class="form-control" id="picture1" placeholder="picture">
                    </div>
                    <button type="submit" class="btn btn-primary">Button</button>
                </form>

                @foreach($articles as $art)
                    <h2>
                        {{$art->name}}
                        <img src="{{asset('storage/'.$art->picture)}}" height="100pm" width="100pm"/>
                        <a href ="{{asset('home/'.$art->id.'/delete')}}"> &times; </a>
                        <a href ="{{asset('home/'.$art->id.'/edit')}}"> Редактировать </a>

                    </h2>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
