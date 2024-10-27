@extends('layout.main')
@section('title', 'about us')
@section('content')
    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
        <div class="container">
            <!-- shape animation  -->
            <span class="banner_shape1"> <img src="{{ asset('asset/images/banner-shape1.png') }}" alt="image"> </span>
            <span class="banner_shape2"> <img src="{{ asset('asset/images/banner-shape2.pn') }}g" alt="image"> </span>
            <span class="banner_shape3"> <img src="{{ asset('asset/images/banner-shape3.png') }}" alt="image"> </span>

            <div class="bred_text">
                <h1>Terms and Condition </h1>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><span>»</span></li>
                    <li><a href="#">Terms and Condition </a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- App-Solution-Section-Start -->
    <section class="row_am app_solution_section">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- UI content -->
                    <div class="app_text">
                        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                            <h2>Terms of Use for EstateGO App</h2>
                        </div>


                        <p>





                            These Terms of Use ("Terms") govern your access to and use of the EstateGO mobile application
                            ("App") and website ("Website"), operated by EstateGO Projects Limited ("EstateGO," "we," "us,"
                            or "our"). By accessing or using the App or Website, you agree to comply with these Terms. If
                            you do not agree with these Terms, you may not access or use the App or Website.
                        </p>
                        <h4>1. Use of the App and Website:</h4>
                        <p>

                            a. License: EstateGO grants you a limited, non-exclusive, revocable license to access and use
                            the App and Website for your personal or internal business purposes.
                        </p>
                        <p>

                            b. Restrictions: You may not:
                            i. Copy, modify, or distribute the App or Website;
                            ii. Reverse engineer, decompile, or disassemble the App or Website;
                            iii. Use the App or Website for any unlawful purpose or in violation of these Terms;
                            iv. Interfere with or disrupt the operation of the App or Website;
                            v. Transmit any viruses, malware, or harmful code through the App or Website.
                        </p>
                        <h4>2. User Accounts:</h4>

                        <p>

                            a. Registration: In order to access certain features of the App or Website, you may be required
                            to register an account. You agree to provide accurate, current, and complete information during
                            the registration process.
                        </p>
                        <p>
                            b. Security: You are responsible for maintaining the confidentiality of your account credentials
                            and for all activities that occur under your account. You agree to notify EstateGO immediately
                            of any unauthorized use of your account or any other breach of security.
                        </p>
                        <h4> 3. Content:</h4>

                        <p>

                            a. User Content: You may submit content, such as text, images, or other materials, through the
                            App or Website ("User Content"). By submitting User Content, you grant EstateGO a worldwide,
                            royalty-free, perpetual, irrevocable, and sublicensable license to use, reproduce, modify,
                            adapt, publish, translate, distribute, and display the User Content in connection with the
                            operation of the App and Website.
                        </p>
                        <p>
                            b. Prohibited Content: You may not submit User Content that is unlawful, defamatory, obscene,
                            offensive, or infringes upon the rights of others.
                        </p>

                        <h4> 4. Intellectual Property:</h4>
                        <p>
                            a. Ownership: The App, Website, and all content, features, and functionality thereof are owned
                            by EstateGO and protected by copyright, trademark, and other intellectual property laws.
                        </p>
                        <p>
                            b. Trademarks: The EstateGO name, logo, and other marks are trademarks of EstateGO. You may not
                            use these trademarks without prior written permission from EstateGO.
                        </p>
                        <h4> 5. Privacy:</h4>

                        <p>

                            Your use of the App and Website is subject to our Privacy Policy, which governs the collection,
                            use, and disclosure of your personal information. By using the App or Website, you consent to
                            the terms of the Privacy Policy.
                        </p>

                        <h4> 6. Termination:</h4>
                        <p>
                            EstateGO may suspend or terminate your access to the App or Website at any time, with or without
                            cause, and without prior notice or liability.
                        </p>
                        <h4> 7. Disclaimers:</h4>

                        <p>

                            a. No Warranty: The App and Website are provided on an "as is" and "as available" basis, without
                            any warranties of any kind, either express or implied. EstateGO disclaims all warranties,
                            including, but not limited to, implied warranties of merchantability, fitness for a particular
                            purpose, and non-infringement.
                        </p>
                        <p>
                            b. Limitation of Liability: In no event shall EstateGO be liable for any indirect, incidental,
                            special, consequential, or punitive damages arising out of or in connection with your use of the
                            App or Website.
                        </p>

                        <h4> 8. Governing Law:</h4>
                        <p>

                            These Terms shall be governed by and construed in accordance with the laws of Nigeria, without
                            regard to its conflict of law provisions.
                        </p>
                        <h4>9. Changes to the Terms:</h4>

                        <p>

                            EstateGO reserves the right to update or modify these Terms at any time. We will notify you of
                            any material changes by posting the updated Terms on the Website or through other means. Your
                            continued use of the App or Website after the posting of changes constitutes your acceptance of
                            such changes.
                        </p>

                        <h4> 10. Contact Us:</h4>
                        <p>

                            If you have any questions, concerns, or complaints regarding these Terms, please contact us at:
                        </p>
                        <p>
                        <address>

                            EstateGO Projects Limited
                            3rd Floor Brasas'R MALL, 69 Admiralty way Lekki Phase 1, Lekki, Lagos State.
                            Email: <a href="mailto:legal@estatego.co">legal@estatego.co</a>
                        </address>
                        </p>
                        <p>
                            By using the EstateGO App and Website, you agree to abide by these Terms of Use.
                        </p>
                    </div>
                </div>

            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    <!-- App-Solution-Section-end -->



@endsection
