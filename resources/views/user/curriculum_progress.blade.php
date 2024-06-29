@extends('user.layouts.app')

@section('title', '授業進捗')

@section('content')
<a href="{{ route('user.show.top') }}">&larr;戻る</a>
<div class="user_curriculumProgress_profile">
    <img src="{{ $user->profile_image ? asset('storage/images/profile/'.$user->profile_image) : asset('storage/images/noimage.png') }}" alt="プロフィール画像">
    <div class="user_curriculumProgress_info">
        <p>{{ $user->name }}さんの授業進捗</p>
        <p>現在の学年：{{ $user->grade }}</p>
    </div>
</div>

<div class="user_curriculumProgress_grades">
    @foreach ($grades as $grade)
    <div class="user_curriculumProgress_grade">
        <h2>{{ $grade }}</h2>
        @foreach ($curriculums->where('grade', $grade) as $curriculum)
        <p class="user_curriculumProgress_title">
            <a href="{{ route('user.show.delivery', $curriculum->id) }}">
                {{ $curriculum->title }}
            </a>
            @if ($progresses->where('curriculum_id', $curriculum->id)->isNotEmpty())
            - 受講済
            @endif
        </p>
        @endforeach
    </div>
    @endforeach
</div>
@endsection