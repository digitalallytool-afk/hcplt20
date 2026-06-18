@extends('frontend.layouts.main')
@section('title', 'Official Videos - Haryana Corporate Premier League (HCPL)')
@section('meta_description', 'Watch the latest matches, trials highlights, player interviews, and exciting moments from Haryana Corporate Premier League (HCPL).')
@section('meta_keywords', 'hcpl videos, haryana corporate premier league videos, hcpl highlights, cricket videos')
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
    <section class="pad100 mt-78" style="background-color: #ffffff">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="heading">Videos</h1>
                </div>


                @foreach ($videos as $video)
                    <div class="col-lg-4 mb-4">
                        <div class="video-container">
                            @if (str_contains($video->video_url, 'youtube.com') || str_contains($video->video_url, 'youtu.be'))
                                @php
                                    $url = $video->video_url;
                                    $videoId = '';
                                    if (
                                        preg_match(
                                            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
                                            $url,
                                            $match,
                                        )
                                    ) {
                                        $videoId = $match[1];
                                    }
                                @endphp
                                @if ($videoId)
                                    <iframe width="100%" height="250"
                                        src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                        allowfullscreen class="rounded-3 shadow-sm"></iframe>
                                @else
                                    <div class="bg-dark text-white p-4 text-center">Invalid Video URL</div>
                                @endif
                            @else
                                <video width="100%" controls class="rounded-3 shadow-sm">
                                    <source src="{{ $video->video_url }}" type="video/mp4">
                                </video>
                            @endif
                            <p class="text-center mt-2 font-bold text-slate-700">{{ $video->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
