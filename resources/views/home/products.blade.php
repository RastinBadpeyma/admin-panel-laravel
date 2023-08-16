@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="card-body">
            <div class="row mb-5">
                @foreach ($products as $product)
                    <div class="col-md-2 mb-5  ">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text"> {{$product->description}} </p>
                                <a href="/products/{{ $product->id }}" class="btn btn-info">جزئیات محصول</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

