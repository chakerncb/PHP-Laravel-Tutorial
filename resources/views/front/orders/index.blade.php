@extends('front.layouts.app')

@section('content')
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">

                            <h2 class="text-center mb-4">All Orders</h2>
                            <br>

                            <table>
                                <tr>
                                    <th>{{__('messages.order_id')}}</th>
                                    <th>{{__('messages.order_name')}}</th>
                                    <th>{{__('messages.order_category')}}</th>
                                    <th>{{__('messages.order_description')}}</th>
                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->category}}</td>
                                    <td>{{$order->description}}</td>
                                </tr>
                                @endforeach
                            </table>

            </div>
        </div>
    </section>
    <!-- End: Contact Form Basic -->           
    @endsection