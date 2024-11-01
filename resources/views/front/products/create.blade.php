@extends('front.layouts.master')

@section('content')
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Add new Product :</h2>
                            <br>
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <br>
                            <form enctype="multipart/form-data">
                               @csrf
                                <!-- Start: Success Example -->
                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name"
                                        name="name"
                                        placeholder="Product Name"
                                    />
                                    @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="price"
                                        name="price"
                                        placeholder="Product Price"
                                    />
                                    @error('price')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                </div>
                                
                                <!-- End: Error Example -->
                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        rows="6"
                                        placeholder="Product Description"
                                    ></textarea>
                                    @error('description')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="file"
                                        id="image"
                                        name="image"
                                    />
                                <div>
                                    
                                    @error('image')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                    <button
                                        class="btn btn-primary d-block w-100"
                                        id="save_product"
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

    console.log('test');

    $(document).on('click', '#save_product', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{route('product.store')}}",
            data: {
                '_token' : "{{csrf_token()}}",
                'name' : $("input[name='name']").val(),
                'price' : $("input[name='price']").val(),
                'description' : $("textarea[name='description']").val(),
               // 'image' : $("input[name='image']").val(),
                
            },
            // success: function(response){
            //     console.log(response);
            // }
        });
    });
</script>

@endsection