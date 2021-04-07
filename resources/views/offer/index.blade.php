@extends('layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Offers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('my.posts')}}">Posts</a></li>
                    <li class="breadcrumb-item active">Offers</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Simple Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Offer owner</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <td>{{$offer->getUser->name}}</td>
                                    <td>
                                        {{$offer->price}}$
                                    </td>
                                    <td>
                                        {{date_format($offer->created_at, 'd M Y h:m')}}
                                    </td>
                                    <td style="display: inline-flex;">
                                        <a class="btn btn-primary btn-sm" href="{{route('offer.detail', $offer->id)}}" style="margin-right: 10px;">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection