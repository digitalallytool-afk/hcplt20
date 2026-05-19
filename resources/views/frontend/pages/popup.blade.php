<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <button type="button" class="close " data-bs-dismiss="modal" aria-label="Close">
                <img src="{{ asset('frontend') }}/images/close.svg" alt="close">
            </button>

            <div class="modal-body">

                <div class="modal-marge">
                    <div class="popup-img">
                        <img src="{{ asset('frontend') }}/images/popup.webp" class="w-100">
                    </div>


                    <div class="popup-thumb">
                        <span>HCPL SEASON 1</span>
                        <h5>REGISTRATON FEE</h5>
                        <div style="display: flex; align-items: baseline; gap: 6px;">
                            <span
                                style="font-size: 46px; font-weight: 900; color: #E85B0F; line-height: 1;">₹1499</span>
                            <span
                                style="font-size: 14px; color: #888; font-weight: 500;text-transform:capitalize">only</span>
                        </div>
                        <p>First <b style="color: #E85B0F;">0</b> players only</p>
                        <div class="register-btn">REGISTER NOW</div>

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
        color: #E85B0F;
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
        background: #E85B0F;
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
    }

    #myModal3 .modal-body {
        padding: 0
    }

    .modal-marge {
        display: flex;
        align-items: center
    }

    .popup-img {
        width: 50%;
        border-right: 5px solid #E85B0F
    }

    .popup-thumb {
        padding: 30px;
        width: 54%
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
        background: #E85B0F;
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
            display: inline-block;
        }

        .popup-thumb {
            width: 100%
        }

        .popup-img {
            width: 100%;
            border-right: 0px solid #E85B0F;
            border-bottom: px solid #E85B0F;
        }
    }
</style>
