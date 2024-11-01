@extends('front.layouts.app')

@section('content')
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">

                            <h2 class="text-center mb-4">Trending Products</h2>
                            <br>
                            <br>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>

                            @endif
                             
                            <div class="d-flex justify-content-start gap-5">

                                @foreach($products as $product)
                                <div class="card p-2" style="width: 20rem; ">
                                    <br>
                                    <img src="{{URL::asset('images/products/'.$product->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$product->name}}</h5>
                                      <p class="card-text">{{$product->description}}</p>
                                      <p class="card-price text-info">{{$product->price}} DZ</p>
                                    </div>
                                  </div>
                                @endforeach

                            </div>

            </div>
        </div>
    </section>
    <!-- End: Contact Form Basic -->           
    @endsection

    @section('scripts')

    <script>

    </script>

    @endsection