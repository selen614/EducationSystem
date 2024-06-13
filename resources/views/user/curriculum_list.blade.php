@extends('layouts.app')  

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('css/curriculum_list.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<div class="main-content">
{{--  <a href="{{ route('user.show.top') }}" method="GET">← 戻る</a> --}}
  <a href="#" method="GET">← 戻る</a> 
</div>

<div id="container" style="display: flex;">
    <div id="left-panel">
        <div id="grade-buttons">
            @foreach($grades as $grade)
                <div class="button" data-grade-id="{{ $grade->id }}">{{ $grade->name }}</div>
            @endforeach
        </div>
    </div>
    <div id="main-panel" style="flex-grow: 1;">
        <div id="navigation">
            <button id="prev-month">←</button>
            <span id="current-month">{{ \Carbon\Carbon::now()->format('Y年n月') }}</span>
            <button id="next-month">→</button>
            <span id="current-grade">{{ $currentGrade->name }}</span>
        </div>
        <div id="class-list"></div>
    </div>
</div>

<script src="{{ asset('js/curriculum_list.js') }}"></script>

@endsection