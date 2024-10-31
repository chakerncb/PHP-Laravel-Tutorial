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
                            <form method="POST" action="{{route('orders.store')}}" enctype="multipart/form-data">
                               @csrf
                                <!-- Start: Success Example -->
                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_en"
                                        name="name_en"
                                        placeholder="Name in English"
                                    />
                                    @error('name_en')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_ar"
                                        name="name_ar"
                                        placeholder="Arabic Name"
                                    />
                                    @error('name_ar')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name_fr"
                                        name="name_fr"
                                        placeholder="French Name"
                                    />
                                    @error('name_fr')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>
                                <!-- End: Success Example --><!-- Start: Error Example -->
                                <div class="mb-3">
                                    <select name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($ord_catg as $category)
                                        <option>{{$category}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                    </div>
                                </div>
                                
                                <!-- End: Error Example -->
                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        id="description_en"
                                        name="description_en"
                                        rows="6"
                                        placeholder="description in English"
                                    ></textarea>
                                    @error('description_en')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        id="description_ar"
                                        name="description_ar"
                                        rows="6"
                                        placeholder="description in Arabic"
                                    ></textarea>
                                    @error('description_ar')
                                    <small class="form-text text-danger">{{$message}}</small>    
                                    @enderror
                                    
                                </div>

                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        id="description_fr"
                                        name="description_fr"
                                        rows="6"
                                        placeholder="description in french"
                                    ></textarea>
                                    @error('description_fr')
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