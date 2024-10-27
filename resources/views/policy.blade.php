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
                <h1>Privacy Policy </h1>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><span>»</span></li>
                    <li><a href="#">Privacy Policy </a></li>
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
                            <h2>Privacy Policy for EstateGO App</h2>
                        </div>


                        <p>

                            At EstateGO Projects Limited, we are committed to protecting the privacy and security of your
                            personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard
                            your information when you use our EstateGO mobile application ("App") and website ("Website").
                        </p>

                        <h4>1. Information We Collect:</h4>

                        <p>
                            a. Personal Information: We may collect personal information, such as your name, email address,
                            phone number, and payment details when you register an account, make payments, or communicate
                            with us.
                        </p>
                        <p>


                            b. Usage Information: We may collect information about your interactions with the App and
                            Website, including your device type, IP address, browsing history, and usage patterns.
                        </p>
                        <p>
                            c. Location Information: With your consent, we may collect your precise or approximate location
                            data when you use location-based features of the App or Website.
                        </p>

                        <h4>2. How We Use Your Information:</h4>
                        <p>

                            a. Provide and Improve Services: We use your information to provide and improve our services,
                            personalize your experience, and analyze usage patterns to enhance functionality.
                        </p>
                        <p>
                            b. Communicate with You: We may use your contact information to send you service-related
                            notifications, updates, and promotional messages.
                        </p>
                        <p>
                            c. Process Payments: We use your payment information to process transactions, verify payment
                            details, and prevent fraudulent activities.
                        </p>
                        <p>
                            d. Ensure Security: We use your information to authenticate users, detect and prevent security
                            threats, and comply with legal obligations.
                        </p>
                        <h4>3. How We Share Your Information:</h4>


                        <p>
                            a. Service Providers: We may share your information with third-party service providers who
                            assist us in operating the App and Website, such as payment processors, cloud storage providers,
                            and analytics platforms.
                        </p>
                        <p>
                            b. Legal Compliance: We may disclose your information to comply with legal requirements, respond
                            to lawful requests, protect our rights or property, or enforce our policies.
                        </p>
                        <p>
                            c. Business Transfers: In the event of a merger, acquisition, or sale of assets, your
                            information may be transferred as part of the transaction. We will notify you of any such change
                            in ownership or control of your personal information.
                        </p>

                        <h4>4. Your Choices and Rights:</h4>

                        <p>

                            a. Opt-Out: You may opt-out of receiving promotional communications from us by following the
                            instructions provided in the messages or by contacting us directly.
                        </p>
                        <p>
                            b. Access and Update: You may access or update your personal information through your account
                            settings or by contacting us.
                        </p>
                        <p>
                            c. Location Services: You may enable or disable location services through your device settings
                            or the App settings.
                        </p>

                        <h4>5. Data Retention:</h4>

                        <p>

                            We retain your personal information for as long as necessary to fulfill the purposes outlined in
                            this Privacy Policy or as required by law. We will securely delete or anonymize your information
                            when it is no longer needed.
                        </p>

                        <h4>

                            6. Security Measures:
                        </h4>
                        <p>

                            We implement technical, administrative, and physical security measures to protect your
                            information from unauthorized access, disclosure, alteration, or destruction.
                        </p>
                        <h4> 7. Children's Privacy:</h4>

                        <p>


                            The App and Website are not intended for use by individuals under the age of 18. We do not
                            knowingly collect personal information from children without parental consent. If you believe
                            that we have inadvertently collected information from a child, please contact us immediately.
                        </p>
                        <h4>8. Updates to this Privacy Policy:</h4>

                        <p>

                            We may update this Privacy Policy from time to time to reflect changes in our practices or legal
                            requirements. We will notify you of any material changes by posting the updated policy on the
                            Website or through other means.
                        </p>

                        <h4> 9. Contact Us:</h4>
                        <p>
                            If you have any questions, concerns, or complaints regarding this Privacy Policy or our data
                            practices, please contact us at:
                        </p>
                        <p>
                            <adxdress>

                                EstateGO Projects Limited
                                3rd Floor Brasas'R MALL, 69 Admiralty way Lekki Phase 1, Lekki, Lagos State.
                                Email: <a href="mailto:privacy@estatego.co">privacy@estatego.co</a>
                            </adxdress>
                        </p>
                        <p>
                            By using the EstateGO App and Website, you consent to the collection, use, and disclosure of
                            your information as described in this Privacy Policy.

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
