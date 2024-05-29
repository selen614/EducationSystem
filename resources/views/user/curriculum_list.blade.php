@extends('layouts.app')                  <!-- ビューのコメントアウト -->

@section('content')
<div class="main-content">
@include('layouts.header')  
<a href="{{ route('show.top') }}" method="GET">← 戻る</a>

<div class="date-grade-selector">
        <button id="prevDate">&lt;</button>
        <span id="selectedDate">{{ $selectedDate }}</span>
        <button id="nextDate">&gt;</button>
        <span><!-- 現在選択中の学年 --></span>
</div>

<div class="sidebar">
        <ul id="gradeList" style="display: none;">
            <li><button class="gradeButton">小学1年生</button></li>
            <li><button class="gradeButton">小学2年生</button></li>
            <li><button class="gradeButton">小学3年生</button></li>
            <li><button class="gradeButton">小学4年生</button></li>
            <li><button class="gradeButton">小学5年生</button></li>
            <li><button class="gradeButton">小学6年生</button></li>
            <li><button class="gradeButton">中学1年生</button></li>
            <li><button class="gradeButton">中学2年生</button></li>
            <li><button class="gradeButton">中学3年生</button></li>
            <li><button class="gradeButton">高校1年生</button></li>
            <li><button class="gradeButton">高校2年生</button></li>
            <li><button class="gradeButton">高校3年生</button></li>
        </ul>
    </div>

<div class="schedule">
    <h2>{{ $currentYear }}年{{ $currentMonth }}月スケジュール</h2>
    <div class="schedule-list">
        @foreach($schedules as $schedule)
            <div class="schedule-item">
                <img src="{{ $schedule->image }}" alt="授業画像">
                <h3>{{ $schedule->title }}</h3>
                <p>{{ $schedule->date }}</p>
                <p>{{ $schedule->time }}</p>
            </div>
        @endforeach
    </div>
</div>

</div>



@endsection