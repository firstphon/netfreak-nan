@extends('layouts.app')

@section('content')

@include('partials.navbar')

<div class="container mt-5">
    <h1 class="py-5">{{$episode->title}}</h1>
    <a class="d-block" href="{{url('/series/'.$episode->serie_id)}}">กลับไปก่อนหน้า</a>
    @include($player)
</div>

@endsection