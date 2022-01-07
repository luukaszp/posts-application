@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center; width: 450px">
    <div style="font-size: 24px; font-weight: bold">Edytowanie postu</div>
    <form method="POST" action="/posts/{{ $post->id }}" class="mb-3">
        @csrf
        @method('PUT')
        <div class="form-group" style="padding-bottom: 10px">
            <label for="title">Tytuł postu</label>

            <div>
                <input id="title" type="text" name="title" value="{{ $post->title }}">
            </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px">
            <label for="content">Treść</label>
            <div>
                <textarea id="content" name="content">{{ $post->content }}</textarea>
            </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px">
            <label for="category">Kategoria</label>
            <div>
                <select class="form-select" id="category" name="category[]" multiple required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group" style="padding-top: 10px">
            <div>
                <button type="submit" class="btn btn-success">
                    Edytuj post
                </button>
            </div>
        </div>
    </form>
</div>
