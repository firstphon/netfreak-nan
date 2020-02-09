@extends('layouts.app')

@section('content')

@include('partials.navbar')

<div class="container mt-5">
    <h1 class="py-5">{{$serie->title}}</h1>
    <a class="btn btn-primary" href="{{url('/series/'.$serie->id.'/episodes/create')}}">เพิ่มตอน</a>
    <br/><br/>
    <ul>
        @foreach($serie->episodes as $episode)
        <li>
            <a href="{{url('/episodes/'.$episode->id)}}">{{ $episode->title }}</a>
        </li>
        @endforeach
    </ul>
</div>

@endsection