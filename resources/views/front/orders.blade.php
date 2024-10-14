@extends('front.layouts.master')

@section('content')
<body>
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">add your order</h2>
                            <form method="POST" action="{{route('orders.store')}}">
                               @csrf
                                <!-- Start: Success Example -->
                                <div class="mb-3">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="name"
                                        name="name"
                                        placeholder="Name"
                                    />
                                </div>
                                <!-- End: Success Example --><!-- Start: Error Example -->
                            {{--    <div class="mb-3">
                                    <div class="dropdown show">
                                        <button
                                            class="btn btn-primary dropdown-toggle"
                                            aria-expanded="true"
                                            data-bs-toggle="dropdown"
                                            type="button"
                                        >
                                            Dropdown
                                        </button>
                                        <div
                                            class="dropdown-menu show"
                                            data-bs-popper="none"
                                        >
                                            <a
                                                class="dropdown-item"
                                                href="#"
                                                >First Item</a
                                            ><a
                                                class="dropdown-item"
                                                href="#"
                                                >Second Item</a
                                            ><a
                                                class="dropdown-item"
                                                href="#"
                                                >Third Item</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                --}}
                                <!-- End: Error Example -->
                                <div class="mb-3">
                                    <textarea
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        rows="6"
                                        placeholder="description"
                                    ></textarea>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
           
    @stop