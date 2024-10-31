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
                            <form method="POST" action="{{route('orders.update' ,$order -> id)}}">
                               @csrf
                                <!-- Start: Success Example -->
                                <div class="mb-3">
                                    <label for="name_en">Name in English</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_en"
                                        name="name_en"
                                        value="{{$order->name_en}}"
                                        placeholder="Name in English"
                                    />
                                    @error('name_en')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="name_ar">Name in Arabic</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_ar"
                                        value="{{$order->name_ar}}"
                                        name="name_ar"
                                        placeholder="Arabic Name"
                                    />
                                    @error('name_ar')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="name_ar">Name in French</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_fr"
                                        value="{{$order->name_fr}}"
                                        name="name_fr"
                                        placeholder="Arabic Name"
                                    />
                                    @error('name_fr')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>
                                <!-- End: Success Example --><!-- Start: Error Example -->
                                <div class="mb-3">
                                    <label for="category">Order Category</label>
                                    <div class="mb-3">
                                        <input
                                            class="form-control"
                                            id="Category"
                                            name="category"
                                            value="{{$order->category}}"
                                            placeholder="Category"
                                        ></input>
                                        @error('category')
                                        <small  class="form-text text-danger">{{$message}}</small>    
                                        @enderror
                                        
                                    </div>
                                    </div>
                                </div>
                                
                                <!-- End: Error Example -->
                                <div class="mb-3">
                                    <label for="description_en">Description in English</label>
                                    <input
                                        class="form-control"
                                        id="description_en"
                                        name="description_en"
                                        value="{{$order->description_en}}"
                                        placeholder="description in English"
                                    ></input>
                                    @error('description_en')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar">Description in Arabic</label>
                                    <input
                                        class="form-control"
                                        id="description_ar"
                                        name="description_ar"
                                        value="{{$order->description_ar}}"
                                        placeholder="description in Arabic"
                                    ></input>
                                    @error('description_ar')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="description_fr">Description in French</label>
                                    <input
                                        class="form-control"
                                        id="description_fr"
                                        name="description_fr"
                                        value="{{$order->description_fr}}"
                                        placeholder="description in french"
                                    ></input>
                                    @error('description_fr')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>
                                

                                <div>
                                    <button
                                        class="btn btn-primary d-block w-100"
                                        type="submit"
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