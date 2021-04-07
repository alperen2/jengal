@extends('layouts.layout')

@section('content')
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form method="post" action="{{route('offer', $post->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Offer message</label>
                        <textarea name="message" class="summernote" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputDescription"> Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure to delete this post?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">No, cancel.</button>
                <form action="{{route('post.destroy', $post->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes, remove.</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Posting Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Job Postings</a></li>
                    <li class="breadcrumb-item active">Posting Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Posting Detail</h3>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Count of offer</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$offerCount}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Avg of offer price</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$avgPrice}}$</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> it is active since</span>
                                    <span class="info-box-number text-center text-muted mb-0">
                                        {{date_format($post->created_at, 'd M Y')}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if($post->user_id === auth()->user()->id)
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> <a href="{{route('my.post.offers', $post->id)}}">All Offers</a></span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 ">
                    <h3 class="text-primary"><i class="fas fa-folder"></i> {{$post->title}}</h3>
                    <p class="text-muted">
                        {{$post->detail}}
                    </p>
                    <br>
                    <h5 class="mt-5 text-muted">Tags</h5>
                    <ul class="list-unstyled">
                        @foreach($post->getTagsName() as $tag)
                        <button class="btn btn-primary btn-xs">{{$tag}}</button>
                        @endforeach
                    </ul>
                    <div class="mt-5 mb-3">
                        @if($post->user_id === auth()->user()->id)
                        <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Remove</a>
                        @else
                            @if($hasOffer)
                            <span class="btn btn-sm btn-warning">Offer given</span>
                            @else
                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-lg">Give Offer</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection