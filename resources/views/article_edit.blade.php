@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form method="post" enctype='multipart/form-data' action="{{asset('home/'.$article->id.'/edit')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name"  class="form-label">Name</label>
                        <input type="text"  name="name" class="form-control" id="name"  value="{{$article->name}}" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="body"  class="form-label">Description</label>
                        <textarea class="form-control" name="body" id="body"  rows="3" > {{$article->body}}</textarea>
                    </div>
                        <div class="mb-3">
                        <label for="picture1" class="form-label">Picture</label>
                        <input name="picture1" type="file" class="form-control" id="picture1" placeholder="picture">
                            <img src="{{asset('storage/'.$article->picture)}}" height="100pm" width="100pm"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Button</button>
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
