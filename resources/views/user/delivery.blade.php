@extends('user.layouts.app')

@section('content')
<div class="return-btn">
    <a href="{{ url()->previous() }}">←戻る</a>
</div>
<div class="container">
    @if($user->grade_id >= $curriculum->grade_id)
    <div class="curriculums-wrapper">
        @if ($alwaysDeliveryFlag === 1)
            <table class="attendance">
                <tbody>
                    <tr>
                        <td class="attendance__video-area">
                        <!-- 常時公開フラグが立っている場合は、動画を常に再生可能とする -->
                        <iframe src="{{ $videoUrl }}" 
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                        </td>
                        @if ($clearFlag === 1)
                            <td class="attendance__clear-area">
                                <p class="no-press">受講しました</p>
                            </td>
                        @else
                            <td class="attendance__clear-area">
                                <form class="" action="{{ route('user.complete', ['complete_id' => $curriculum->id]) }}" method="POST">
                                    @csrf
                                    <button  type="submit" class="clear-btn">受講しました</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        @else
        <!-- 配信期間中であるかをチェックし、再生可能な場合にのみ動画を表示 -->
            @if ($currentDateTime >= $deliveryFrom && $currentDateTime <= $deliveryTo)
                <table class="attendance">
                    <tbody>
                        <tr>
                            <td class="attendance__video-area">
                            <iframe src="{{ $videoUrl }}" 
                                title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                            </td>
                            @if ($clearFlag === 1)
                            <td class="attendance__clear-area">
                                <p class="no-press">受講しました</p>
                            </td>
                            @else
                            <td class="attendance__clear-area">
                                <form class="" action="{{ route('user.complete', ['complete_id' => $curriculum->id]) }}" method="POST">
                                    @csrf
                                    <button  type="submit" class="clear-btn">受講しました</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            @else
                <table class="attendance">
                    <tbody>
                        <td class="attendance__video-area">
                            <!-- 配信期間外の場合にメッセージを表示 -->
                            <div class="attendance__hidden-video">
                                <p>申し訳ありません、現在動画はご視聴いただけません。</p>
                            </div>
                        </td>
                        <td class="attendance__clear-area">
                                <p class="no-press">受講しました</p>
                        </td>

                    </tbody>
                </table>
            @endif
        @endif
        <div class="grade-area">
            <p>{{ $curriculum->grade->name }}</p>
        </div>
        <div class="description_area">
            <div class="description-title">
                <p>{{ $curriculum->title }}</p>
            </div>
            <div class="description-text">
                <p>{{ $curriculum->description }}</p>
            </div>
        </div>
    </div>
    @else
    <p>このカリキュラムは、あなたの学年では表示できません。</p>
    @endif
</div>
@endsection
