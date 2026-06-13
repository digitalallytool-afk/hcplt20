<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <button type="button" class="close " data-bs-dismiss="modal" aria-label="Close">
                <img src="{{ asset('frontend') }}/images/close.svg" alt="close">
            </button>

            <div class="modal-body">

                <div class="modal-marge">
                    <div class="popup-img">
                        <img src="{{ asset('frontend') }}/images/pop-up-image.jpeg" class="w-100" width="100%">
                    </div>


                    <div class="popup-thumb">
                        <span>HCPL SEASON 1</span>
                        <h5>REGISTRATON FEE</h5>
                        @php
                            $setting = \App\Models\WebSetting::first();
                            $remainingSlots = \App\Models\WebSetting::getRemainingDiscountSlots();
                            $currentPrice = \App\Models\WebSetting::getCurrentRegistrationPrice();
                            $actualPrice = $setting ? $setting->registration_actual_price : 2999;
                            $maxPlayers = $setting ? $setting->registration_max_discount_players : 3000;
                        @endphp
                        <div style="display: flex; align-items: baseline; gap: 6px;">
                            <span
                                style="font-size: 46px; font-weight: 900; color: #ff6600; line-height: 1;">₹1499</span>
                            @if($remainingSlots > 0 && $currentPrice < $actualPrice)
                                <span style="font-size: 20px; color: #888; text-decoration: line-through;">₹{{ $actualPrice }}</span>
                            @else
                                <span
                                    style="font-size: 14px; color: #888; font-weight: 500;text-transform:capitalize">only</span>
                            @endif
                        </div>
                        
                        @if($remainingSlots > 0)
                            <p style="margin-bottom: 2px;">First <b style="color: #ff6600;">{{ $maxPlayers }}</b> players only.</p>
                            <p style="font-size: 0.85em; color: #d9534f; font-weight: 800; margin-top:0;">Only {{ $remainingSlots }} spots left!</p>
                        @else
                            <p>Registration Open</p>
                        @endif
                        
                        <a href="{{ route('player-registration') }}" class="register-btn" style="display:block; text-decoration:none;">REGISTER NOW</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<style>
    .popup-thumb span {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 3px;
        color: #ff6600;
        text-transform: uppercase;
        margin: 0 0 6px;
    }

    .popup-thumb h5 {
        font-size: 23px;
        font-weight: 600;
        color: #111;
        margin: 0 0 6px;
        line-height: 1.15;
        margin-bottom: 20px
    }

    .popup-thumb p {
        font-size: 13px;
        color: #333;
        font-weight: 600;
    }

    .register-btn {
        width: 100%;
        background: #ff6600;
        color: #fff;
        text-align: center;
        border: none;
        border-radius: 10px;
        padding: 10px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 20px
    }

    #myModal3 .modal-dialog {
        max-width: 650px;
    }

    #myModal3 .modal-content {
        border-radius: 15px;
        overflow: hidden;
        padding: 0 !important;
        border: none !important;
    }

    #myModal3 .modal-body {
        padding: 0 !important;
        margin: 0 !important;
    }

    .modal-marge {
        display: flex;
        align-items: center;
        margin: 0 !important;
        padding: 0 !important;
    }

    .popup-img {
        width: 50%;
        border-right: 5px solid #ff6600;
        margin: 0 !important;
        padding: 0 !important;
    }

    .popup-img img {
        width: 100% !important;
        height: auto;
        display: block;
        margin: 0 !important;
        padding: 0 !important;
    }

    .popup-thumb {
        padding: 30px;
        width: 50%;
        margin: 0 !important;
    }

    #myModal3 .form-group {
        margin-bottom: 8px
    }

    .modal-content .close {
        width: 35px;
        height: 35px;
        position: absolute;
        right: 0px;
        top: 0px;
        z-index: 99;
        border: none;
        background: #ff6600;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content .close img {
        width: 35px;
        max-width: max-content;
    }

    .modal-body {
        padding: 30px
    }

    .modal-content .form-group {
        margin-bottom: 15px;
    }

    @media(max-width:560px) {
        .modal-marge {
            display: flex !important;
            flex-direction: column !important;
            align-items: stretch !important;
        }

        .popup-img {
            width: 100% !important;
            border-right: none !important;
            border-bottom: 5px solid #ff6600 !important;
        }

        .popup-img img {
            width: 100% !important;
            height: auto !important;
            display: block !important;
        }

        .popup-thumb {
            width: 100% !important;
            padding: 25px !important;
        }
    }
</style>
