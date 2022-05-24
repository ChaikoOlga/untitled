@extends('layouts.base')

@push('styles')
    <link href="/main1.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Catalog</div>


                <div class="card-body">
                 @foreach($catalog as $item)
                    <h2>
                        {{$item->name}}
                    </h2>
                        @foreach($item->products as $prod)
                            @include('includes.product')
                        @endforeach
                    @endforeach

                     @foreach($product_name_category as $item)
                         <div>
                             {{$item->name}}
                         </div>
                     @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
