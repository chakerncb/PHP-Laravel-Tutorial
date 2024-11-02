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
                                <div class="card p-2 Card{{$product->id}}" style="width: 20rem; height: 20rem ">
                                    <br>
                                    <img class="h-25"  src="{{URL::asset('images/products/'.$product->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$product->name}}</h5>
                                      <p class="card-text">{{$product->description}}</p>
                                      <p class="card-price text-info">{{$product->price}} DZ</p>
                                      <div class="d-flex justify-content-start gap-3">
                                        <a class="rounded bg-danger text-bg-primary p-1" product_id="{{$product->id}}" id="delete_btn" class="btn btn-primary delete_btn">delete</a>
                                        <a class="rounded bg-warning text-bg-light p-1" href="{{route('product.edit',$product->id)}}"  id="edit_btn" class="btn btn-success">Edit</a>
                                      </div>
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
         $(document).on('click', '#delete_btn', function(e){
        e.preventDefault();
        console.log('delete');
        var product_id = $(this).attr('product_id');
        $.ajax({
            type: "POST",
            url: "{{route('product.delete')}}",
            data: {
                product_id: product_id,
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                if(response.status == true){
                    alert(response.message);
                    $('.Card'+product_id).remove();
                }else{
                    alert(response.message);
                }
            }
        });
    });
    </script>

    @endsection