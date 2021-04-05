@extends('layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Job Postings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Job Postings</li>
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
            <h3 class="card-title">All Job Postings</h3>

            <div class="card-tools">
                @if (Route::current()->getName() == 'my_posts')
                <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-folder-plus"></i> Create a post
                </a>
                @endif
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 20%">
                            Project Name
                        </th>
                        <th style="width: 30%">
                            Team Members
                        </th>
                        <th>
                            Project Progress
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            {{$post->tags}}
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                57% Complete
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            @if(Route::is('my_posts'))
                            <a class="btn btn-info btn-sm" href="{{route('post.edit', $post->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection