@extends('layout.inner')
@section('content')
    <div class="bred_crumb">
        <div class="container">
            <span class="banner_shape1"><img src="{{ asset('asset/images/banner-shape1.png') }}" alt=""></span>
            <span class="banner_shape2"><img src="{{ asset('asset/images/banner-shape2.png') }}" alt=""></span>
            <span class="banner_shape3"><img src="{{ asset('asset/images/banner-shape3.png') }}" alt=""></span>

            <div class="bred_text">
                <h1>Need help? Check here</h1>
                <p>Check out some of the frequently asked questions</p>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><span>»</span></li>
                    <li><a href="#">Help Center - TENANTS</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="row_am faq_section">
        <div class="container">

            {{-- Subcategory Navigation --}}
            <div class="nav-item">
                @foreach ($categories as $category)
                    @foreach ($category->SubCategory as $subCategory)
                        <a href="{{ url($subCategory->url . '/' . $subCategory->category_id . '?subcategory=' . $subCategory->subcategory_name) }}"
                            class="{{ $subcategoryName === $subCategory->subcategory_name ? 'active rounded-pill p-2' : '' }}">
                            {{ $subCategory->subcategory_name }}
                        </a>&nbsp;&nbsp;&nbsp;
                    @endforeach
                @endforeach
            </div>

            {{-- FAQ Accordion --}}
            <div class="faq_panel">
                <div class="accordion" id="accordionExample">
                    @forelse ($faqs as $index => $faq)
                        <div class="card" data-aos="fade-up">
                            <div class="card-header" id="heading{{ $index }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                        data-toggle="collapse" data-target="#collapse{{ $index }}">
                                        <i class="icon_faq icofont-plus"></i> {{ $faq->question }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $index }}" class="collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No FAQs available for this section.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    @include('partials.downloadApp')
@endsection
