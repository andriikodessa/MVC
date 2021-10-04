@extends('layout')

@section('title', 'Сообщения')

@section('body')
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" @isset($post) value="{{ $post->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" @isset($post) value="{{ $post->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" name="body" class="form-control" id="body" @isset($post) value="{{ $post->body }}" @endisset>
        </div>

    @isset($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection