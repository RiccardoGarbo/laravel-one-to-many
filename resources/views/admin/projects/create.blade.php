@extends('layouts.app')
@section('title','Create Form')
@section('content')
<div class="container">
<h1 class="text-center">Create a new project!</h1>

<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title project</label>
      <input name="title" type="text" class="form-control">
      <div class="form-text">Add title for new project.</div>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Content project</label>
      <input name="content" type="text" class="form-control">
      <div class="form-text">Add content for new project.</div>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image project</label>
      <input type="file" name="image"  class="form-control">
      <div  class="form-text">Add image for new project.</div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection
