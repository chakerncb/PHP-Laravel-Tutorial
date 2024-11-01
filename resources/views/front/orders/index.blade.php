@extends('front.layouts.app')

@section('content')
    <!-- Start: Contact Form Basic -->
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">

                            <h2 class="text-center mb-4">All Orders</h2>
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

                            <table>
                                <tr>
                                    <th>{{__('messages.order_id')}}</th>
                                    <th>{{__('messages.order_name')}}</th>
                                    <th>{{__('messages.actions')}}</th>

                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td><a href="{{URL('order/edit/'.$order->id)}}" class="btn btn-success">{{__('messages.edit')}}</a></td>
                                    <td><a href="{{URL('order/delete/'.$order->id)}}" class="btn btn-danger">{{__('messages.delete')}}</a></td>
                                    <td><a href="{{URL('order/details/'.$order->id)}}" class="btn btn-warning">{{__('messages.order_show')}}</a></td>
                                </tr>
                                @endforeach
                            </table>

            </div>
        </div>
    </section>
    <!-- End: Contact Form Basic -->           
    @endsection