@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center; width: 450px">
    <div style="font-size: 24px; font-weight: bold">Dodawanie postu</div>
    <form method="POST" action="/posts/add">
        @csrf

        <div class="form-group" style="padding-bottom: 10px">
            <label for="title">Tytuł postu</label>

            <div>
                <input id="title" type="text" class="@error('title') is-invalid @enderror">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px">
            <label for="content">Treść</label>
            <div>
                <textarea id="content" class="@error('content') is-invalid @enderror"></textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px">
            <label for="category">Kategoria</label>
            <div>
                <select class="form-select" id="category" type="text" aria-label=".form-select" name="category"
                    required>
                    @forelse($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                    <option>Brak kategorii</option>
                    @endforelse
                </select>
            </div>
        </div>

        <div class="form-group" style="padding-top: 10px">
            <div>
                <button type="submit" class="btn btn-success">
                    Dodaj post
                </button>
            </div>
        </div>
    </form>
</div>
