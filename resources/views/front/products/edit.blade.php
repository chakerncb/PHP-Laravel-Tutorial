@extends('front.layouts.master')

@section('content')
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">add your order</h2>
                            <br>
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <br>
                            <form id="updateForm">
                               @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <!-- Start: Success Example -->
                                <div class="mb-3">
                                    <label for="name">Name in English</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{$product->name}}"
                                        placeholder="Product Name"
                                    />
                                    @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="price">Price in DZD</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="price"
                                        name="price"
                                        value="{{$product->price}}"
                                        placeholder="Product Price"
                                    />
                                    @error('price')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror

                                
                                <!-- End: Error Example -->
                                <div class="mb-3">
                                    <label for="description">Description in English</label>
                                    <input
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        value="{{$product->description}}"
                                        placeholder="Product Description"
                                    ></input>
                                    @error('description')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>
                                <div>
                                    <button
                                        class="btn btn-primary d-block w-100"
                                        id="update_product"
                                    >
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Contact Form Basic -->           
    @endsection

@section('scripts')

<script>
    $(document).on('click', '#update_product', function(e){
        e.preventDefault();
        var formData = new FormData($('#updateForm')[0]);
        let product_id = {{$product->id}};

        $.ajax({
            type: "POST",        
            enctype: 'multipart/form-data',
            url: "{{route('product.update')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                if(response.status == true){
                    $('#update_form').trigger('reset');
                    alert(response.message);
                }else{
                    alert(response.message);
                }
            },
        });
    });
</script>
@endsection