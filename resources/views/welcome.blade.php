@extends('layouts.app')

@section('content')
@guest
    <div class="container">
        <h1>Welcome!</h1>
    </div>
@else
    <div class="container">
        <h1>Welcome {{ Auth::user()->firstname }}!</h1>
    </div>
@endguest

@endsection