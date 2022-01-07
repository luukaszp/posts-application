@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center; width: 450px">
    <div style="font-size: 24px; font-weight: bold">Dodawanie kategorii</div>
    <form method="POST" action="/posts/add">
        @csrf

        <div class="form-group" style="padding-bottom: 10px">
            <label for="name">Nazwa kategorii</label>

            <div>
                <input id="name" type="text" class="@error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group" style="padding-top: 10px">
            <div>
                <button type="submit" class="btn btn-success">
                    Dodaj kategorię
                </button>
            </div>
        </div>
    </form>
</div>
