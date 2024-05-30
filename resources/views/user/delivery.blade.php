@extends('user.layouts.app')

@section('content')
<div class="return_btn">
    <a href="{{ url()->previous() }}">←戻る</a>
</div>
<div class="container">
    @if($user->grade_id >= $curriculum->grade_id)
    <div class="curriculums_wrapper">
        @if ($alwaysDeliveryFlag === 1)
            <div class="attendance_area">
                <div class="video_area">
                <!-- 常時公開フラグが立っている場合は、動画を常に再生可能とする -->
                    <video controls>
                        <source src="{{ asset($curriculum->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @if ($clearFlag === 0)
                    <div class="clear_area">
                        <form class="" action="{{ route('user.complete', ['complete_id' => $curriculum->id]) }}" method="POST">
                            @csrf
                            <button  type="submit" class="clear_btn">受講しました</button>
                        </form>
                    </div>
                @else
                    <div class="no_press_area">
                        <p class="no_press">受講しました</p>
                    </div>
                @endif
            </div>
        @else
        <!-- 配信期間中であるかをチェックし、再生可能な場合にのみ動画を表示 -->
                @if ($currentDateTime >= $deliveryFrom && $currentDateTime <= $deliveryTo)
                    <div class="attendance_area">
                        <div class="video_area">
                        <video controls>
                            <source src="{{ asset($curriculum->video_url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        </div>
                        @if ($clearFlag === 0)
                            <div class="clear_area">
                                <form class="" action="{{ route('user.complete', ['complete_id' => $curriculum->id]) }}" method="POST">
                                    @csrf
                                    <button  type="submit" class="clear_btn">受講しました</button>
                                </form>
                            </div>
                        @else
                            <div class="no_press_area">
                                <p class="no_press">受講しました</p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="attendance_area">
                        <!-- 配信期間外の場合にメッセージを表示 -->
                        <div class="hidden_video">
                            <p>申し訳ありません、現在動画はご視聴いただけません。</p>
                        </div>
                        <div class="no_press_area">
                            <p class="no_press">受講しました</p>
                        </div>
                    </div>
                @endif
        @endif
        <div class="grade_area">
            <p>{{ $curriculum->grade->name }}</p>
        </div>
        <div class="description_area">
            <div class="description_title">
                <p>{{ $curriculum->title }}</p>
            </div>
            <div class="description_text">
                <p>{{ $curriculum->description }}</p>
            </div>
        </div>
    </div>
    @else
    <p>このカリキュラムは、あなたの学年では表示できません。</p>
    @endif
</div>
@endsection
