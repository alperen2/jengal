@extends('layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create a job posting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Job Postings</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('post.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control summernote" name="detail" value="{{ old('detail') }}" rows="4"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="inputDescription">Min Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="minPrice" value="{{ old('minPrice') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="inputDescription">Max Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="maxPrice" value="{{ old('maxPrice') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 offset-md-1">
                                <div class="control-group">
                                    <label for="select-beast">Tags</label>
                                    <select id="select-beast" class="selectize" placeholder="Select tags" name="tags[]" multiple>
                                        <option value="">Select a person...</option>
                                        <option value="4">Thomas Edison</option>
                                        <option value="1">Nikola</option>
                                        <option value="3">Nikola Tesla</option>
                                        <option value="5">Arnold Schwarzenegger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" value="Create new posting" class="btn btn-success float-right">
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

</section>
@endsection