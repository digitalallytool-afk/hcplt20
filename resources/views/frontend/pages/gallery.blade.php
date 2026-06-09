
 
   
    @extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
	<section class="pad100 mt-78" style="background-color: #ffffff">
    <div class="container">
        
        <div class="row">
            @foreach($images as $image)
            <div class="col-lg-4">
                <div class="gallery-thumb">
                    <img src="{{ asset('storage/' . $image->file_path) }}" class="w-100" title="{{ $image->title }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection