@extends('layout.plain')
@section('title', 'privacy policy')
@section('content')
    <!-- FAQ-Section start -->
    <section class="row_am faq_section">
        <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <!-- h2 -->
                <h2><span>FAQ</span> - Frequently Asked Questions</h2>
                <!-- p -->
                <p> Find answers to the most common questions about EstateGO. <br> Whether you're a new or seasoned user,
                    we’ve got you covered.
                </p>
            </div>
            <!-- faq data -->
            <div class="faq_panel">
                <div class="accordion" id="accordionExample">
                    {{-- @foreach ($howTos as $faq)
                        <div class="card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link active" data-toggle="collapse"
                                        data-target="#faq_{{ $faq->id }}">
                                        <i class="icon_faq icofont-plus"></i></i> {{ $faq->question }}</button>
                                </h2>
                            </div>
                            <div id="faq_{{ $faq->id }}" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                    <div class="card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseTwo"><i class="icon_faq icofont-plus"></i></i> How to Videos
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body app_solution_section">
                                <div class="app_images" data-aos="fade-in" data-aos-duration="1500">
                                    <ul
                                        style="display: flex; flex-wrap: wrap; justify-content: start; gap: 1rem; padding: 0;">

                                        @foreach ($howToVideos as $faq)
                                            {{-- https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1 --}}
                                            <li
                                                style="flex: 1 1 30%; max-width: 30%;  list-style: none; text-align: center;">
                                                <a class="popup-youtube play-button" style="position:unset;"
                                                    data-url="{{ $faq->answer ? json_decode($faq->answer, true)['url'] : 'https://www.youtube.com/embed/tgbNymZ7vqY' }}"
                                                    data-toggle="modal" data-target="#myModal" title="About Video">
                                                    <div style="object-fit:cover;">
                                                        @if (count($faq->images))
                                                            <img src="{{ asset('storage/faqs/images/' . $faq->images[0]->path) }}"
                                                                alt="{{ $faq->images[0]->path }}"
                                                                style="width:100%; margin-bottom: 1rem; max-height:300px">
                                                        @else
                                                            <img src="{{ asset('asset/images/about/howto.avif') }}"
                                                                style="width: 100px; " alt="">
                                                        @endif
                                                    </div>
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>

                                                    <span class="play_icon">
                                                        <img src="{{ asset('asset/images/play_black.png') }}"
                                                            alt="image">
                                                    </span>
                                                    <div>{{ $faq->question }}</div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($ownersFaq as $owner)
                        <div class="card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTenant{{ $owner->id }}"><i
                                            class="icon_faq icofont-plus"></i></i>Owner -
                                        {{ $owner->question }}</button>
                                </h2>
                            </div>
                            <div id="collapseTenant{{ $owner->id }}" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $owner->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($tenantsFaq as $tenat)
                        <div class="card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTenant{{ $tenat->id }}"><i
                                            class="icon_faq icofont-plus"></i></i>Tenant -
                                        {{ $tenat->question }}</button>
                                </h2>
                            </div>
                            <div id="collapseTenant{{ $tenat->id }}" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $tenat->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour"><i class="icon_faq icofont-plus"></i></i>Contact us</button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Contact</p>
                                <ul class="contact_info_list">
                                    <li>
                                        <div class="img">
                                            <img src="{{ asset('asset/images/mail_icon.png') }}" alt="image">
                                        </div>
                                        <div class="text">
                                            <span>Email Us</span>
                                            <a href="mailto:example@gmail.com">{{ $contact->email }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="{{ asset('asset/images/call_icon.png') }}" alt="image">
                                        </div>
                                        <div class="text">
                                            <span>Call Us</span>
                                            <a href="tel:+1(888)553-46-11">{{ $contact->phone_number }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="{{ asset('asset/images/location_icon.png') }}" alt="image">
                                        </div>
                                        <div class="text">
                                            <span>Visit Us</span>
                                            <p>{{ $contact->address }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- FAQ-Section end -->
@endsection
