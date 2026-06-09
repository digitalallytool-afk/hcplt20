@extends('frontend.layouts.main')
@section('title', 'Frequently Asked Questions (FAQ) - HCPL')
@section('meta_description', 'Frequently Asked Questions about Haryana Cricket Premier League (HCPL T20) trials, rules, eligibility, registration and more.')
@section('meta_keywords', 'hcpl faq, trials registration fee, age limit hcpl, leather ball league')
@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
<style>
    .faq-header-banner {
        background: linear-gradient(135deg, #050e1e 0%, #0a1c3e 100%);
        padding: 100px 0 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-bottom: 3px solid #ff6600;
        margin-top: 78px;
    }
    .faq-header-banner h1 {
        font-family: 'DM Sans', sans-serif;
        font-weight: 800;
        font-size: clamp(2.2rem, 5vw, 3.2rem);
        color: #ffffff;
        margin-bottom: 12px;
    }
    .faq-header-banner p {
        color: #cbd5e1;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        padding: 0 15px;
    }
    .faq-container {
        padding: 80px 0;
        background: #ffffff;
    }
    .faq-accordion .accordion-item {
        border: 1px solid rgba(10, 28, 62, 0.08);
        border-radius: 12px !important;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(10, 28, 62, 0.03);
        transition: all 0.3s ease;
    }
    .faq-accordion .accordion-item:hover {
        box-shadow: 0 10px 30px rgba(10, 28, 62, 0.08);
        border-color: rgba(255, 102, 0, 0.25);
    }
    .faq-accordion .accordion-button {
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: #0a1c3e;
        padding: 22px 28px;
        background: #ffffff;
        border: none;
        box-shadow: none !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
        text-align: left;
    }
    .faq-accordion .accordion-button:not(.collapsed) {
        color: #ffffff;
        background: #0a1c3e;
    }
    .faq-accordion .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230a1c3e'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transition: transform 0.3s ease;
        width: 1.25rem;
        height: 1.25rem;
        background-size: 1.25rem;
    }
    .faq-accordion .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transform: rotate(-180deg);
    }
    .faq-accordion .accordion-body {
        padding: 24px 28px;
        background: #f8fafc;
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.7;
        border-top: 1px solid rgba(10, 28, 62, 0.05);
    }
    .faq-accordion .accordion-body ul {
        list-style: none;
        padding-left: 0;
        margin-top: 12px;
        margin-bottom: 0;
    }
    .faq-accordion .accordion-body ul li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 10px;
    }
    .faq-accordion .accordion-body ul li::before {
        content: "🏏";
        position: absolute;
        left: 0;
        top: 2px;
        font-size: 1rem;
    }
    .faq-accordion .accordion-body ul li:last-child {
        margin-bottom: 0;
    }
</style>

<div class="faq-header-banner">
    <h1>Frequently Asked Questions</h1>
    <p>Everything you need to know about the Haryana Cricket Premier League (HCPL T20) registration, trials, and rules.</p>
</div>

<div class="faq-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12">
                <div class="accordion faq-accordion" id="faqAccordion">
                    
                    <!-- Question 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1. Is this league only for players from Haryana?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No. HCPL T20 is a Pan-India league and is open to players from across the country. Trial registrations will be conducted across all 30+ Districts & Cities across North India.
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. What is the registration fee for?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The fee covers:
                                <ul>
                                    <li>Official HCPL T20 trial registration</li>
                                    <li>Opportunity to showcase your cricketing skills in front of selectors</li>
                                    <li>One official HCPL T20 trial T-shirt</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Is this a leather-ball or tennis-ball league?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                HCPL T20 will be played with a white leather ball under professional cricketing standards.
                            </div>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. Do I need to upload a video for selection?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No. There is no requirement to upload a video. Simply register for the trials and attend the physical selection process.
                            </div>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. Will the matches be broadcasted?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes. HCPL T20 matches will be broadcast live on OTT platforms and television, providing players with significant visibility.
                            </div>
                        </div>
                    </div>

                    <!-- Question 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. What is the format of the league?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                HCPL T20 is an 8-franchise T20 cricket league, featuring competitive matches in the T20 format.
                            </div>
                        </div>
                    </div>

                    <!-- Question 7 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. What is the age limit for participation?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <strong>For Men's</strong> - Players Under-16 and 16 years of age and above are eligible to participate in the league.<br>
                                <strong>For Women's</strong> - Players 16 years of age and above are eligible to participate in the league.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
