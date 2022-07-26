@extends('admin.layouts.base')

@section('mainContent')
    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->image }}" alt="{{ $post->title }}">
    <p>{{ $post->content }}</p>
@endsection