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
                @if (Route::current()->getName() == 'my.posts')
                <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-folder-plus"></i> Create a post
                </a>
                @endif
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped projects" id="postTable">
                <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Tags
                        </th>
                        @if(Route::is('post.index'))
                            <th>
                                User Name
                            </th>
                        @endif
                        <th>
                            Price range
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            @foreach($post->getTagsName() as $tag)
                                <button class="btn btn-primary btn-xs">{{$tag}}</button>
                            @endforeach
                        </td>
                        @if(Route::is('post.index'))
                            <td>{{ $post->getUser->name }}</td>
                        @endif
                        <td>
                           {{$post->minPrice}}$ - {{$post->maxPrice}}$
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('post.show', $post->id)}}">
                                <i class="fas fa-folder"></i>
                                View
                            </a>
                            @if(Route::is('my.posts'))
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
            <div class="float-right mt-4 mr-4">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection