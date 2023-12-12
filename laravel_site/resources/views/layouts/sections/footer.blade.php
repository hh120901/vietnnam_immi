@php
    $settings = \App\Models\Setting::first();
@endphp
<div class="container mt-5 pt-3">
    <div class="site-footer bg-red-primary">
        <div class="row justify-content-between">
            <div class="col-lg-7 px-3">
                <div class="d-flex flex-column flex-sm-row mt-4 ms-sm-3">
                    <div class="w-sm-25">
                        <h4 class="footer-title">
                            About Us
                        </h4>
                    </div>
                    <div class="w-sm-25">
                        <h4 class="footer-title">
                            News
                        </h4>
                    </div>
                    <div class="w-sm-25">
                        <h4 class="footer-title">
                            Travel
                        </h4>
                    </div>
                    <div class="w-sm-25">
                        <h4 class="footer-title">
                            Visa Tip
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 px-3">
                <div class="d-flex justify-content-center justify-content-lg-end">
                    <div class="help-box border-0 mb-3">
                        <div class="mx-4">
                            <h2 class="text-white py-2 fw-semibold text-uppercase mt-3">
                                need help 24/7
                            </h2>	
                        </div>
                        <div class="mx-4">
                            <p class="fw-normal text-white">Phone: {{ $settings->company_phone }}</p>
                            <div class="d-flex">
                                <span class="fw-normal text-white">Hotline: </span>
                                <ul class="mb-3 px-2" style="list-style-type: none;">
                                    <li class="mb-2 text-white"><img src="{{ asset('assets/images/icons/vn.jpg') }}" alt=""> {{ $settings->hotline_vn }}</</li>
                                    <li class="mb-2 text-white"><img src="{{ asset('assets/images/icons/en.jpg') }}" alt=""> {{ $settings->hotline_en }}</li>
                                    <li class="mb-2 text-white"><img src="{{ asset('assets/images/icons/us.png') }}" alt=""> {{ $settings->hotline_usa }}</li>
                                </ul>
                            </div>
                            <p class="fw-normal text-white">Email: {{ $settings->company_email ?? '' }}</</p>
                            <p class="fw-normal text-white">Whats app: {{ $settings->whatsapp ?? '' }}</</p>
                            <p class="fw-normal text-white">Viber: {{ $settings->viber ?? '' }}</</p>
                            <p class="fw-normal text-white">Skype: {{ $settings->skype ?? '' }}</</p>
                            <p class="fw-normal text-white">Telegram: {{ $settings->telegram ?? ''}}</</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>