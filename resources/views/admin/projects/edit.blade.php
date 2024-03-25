@extends('layouts.app')
@section('title', 'edit project')
@section('content')
<div class="container">
    <h1 class="text-center">Edit your project!</h1>
<form action="{{route('admin.projects.update', $project)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title project</label>
      <input name="title" type="text" class="form-control" value="{{old('title', '')}}">
      <div class="form-text">Edit title</div>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Content project</label>
      <input name="content" type="text" class="form-control" value="{{old('content', '')}}">
      <div class="form-text">Edit content</div>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image project</label>
      <input type="text" name="image"  class="form-control" value="{{old('image','')}}">
      <div  class="form-text">Edit image</div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>


@endsection