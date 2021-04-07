@extends('layouts.layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Offer detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Offer Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Offer Detail</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                                    <span class="info-box-number text-center text-muted mb-0">2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                    <span class="info-box-number text-center text-muted mb-0">20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">

                                @foreach($messages as $message)
                                    @if($message->recipient == auth()->user()->id)
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">You</span>
                                            <span class="direct-chat-timestamp float-left">{{$message->created_at}}</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <div class="direct-chat-text">
                                            {{$message->content}}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    @else
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">{{$message->getSender->name}}</span>
                                            <span class="direct-chat-timestamp float-right">{{$message->created_at}}</span>
                                        </div>
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{$message->content}}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    @endif
                                @endforeach
                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Count Dracula
                                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contatcts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
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