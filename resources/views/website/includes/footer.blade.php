<footer class="footer" id="main-footer">
    <div class="container container-expanded bottom_border">
        <div class="row text-center">
            <div class="col-md-3 col-12 mb-3 collapse-parent-footer">
                <h5 class="collapse-custom-footer">About</h5>
                <div class="collapse-manu-footer display-none-footer-responsive">
                    <p class="text-footer">Barròco has a strong and precise mission: to tell about the spectacular Italian
                        “art of
                        craft”.</p>
                    <a href="#" class="link-underline">Learn More</a>
                </div>
            </div>

            <div class=" col-md-3 col-12 mb-3 collapse-parent-footer">
                <h5 class="collapse-custom-footer">Customer Service</h5>
                <!--headin5_amrc-->
                <div class="collapse-manu-footer display-none-footer-responsive">
                    <ul class="footer_ul_amrc">
                        <li><a data-toggle="modal" data-target="#modal-shipping" href="#">Shipping</a></li>
                        <li><a data-toggle="modal" data-target="#modal-payments" href="#">Payments</a></li>
                        <li><a data-toggle="modal" data-target="#modal-returns" href="#">Returns</a></li>
                        <li><a href="{{route('extra.faqs')}}">F.A.Q.</a></li>
                        <li><a data-toggle="modal" data-target="#modal-contacts" href="#">Contacts</a></li>
                        <li><a data-toggle="modal" data-target="#modal-resi" href="#">Resi e Rimborsi</a></li>
                    </ul>
                </div>
                <!--footer_ul_amrc ends here-->
            </div>


            <div class=" col-md-3 col-12 mb-3 collapse-parent-footer">
                <h5 class="collapse-custom-footer">Legal area</h5>
                <!--headin5_amrc-->
                <div class="collapse-manu-footer display-none-footer-responsive">
                    <ul class="footer_ul_amrc">
                        <li><a href="{{route('extra.terms')}}">Terms of Use</a></li>
                        <li><a href="https://www.iubenda.com/en/login">Cookie Policy</a></li>
                        <li><a href="{{route('extra.privacy')}}">Privacy Policy</a></li>
                        <li><a data-toggle="modal" data-target="#modal-company" href="#">Company Info</a></li>
                        <li><a href="{{route('extra.work')}}">Work with Us</a></li>
                    </ul>
                </div>
                <!--footer_ul_amrc ends here-->
            </div>


            <div class=" col-md-3 col-12 mb-3 collapse-parent-footer">
                @if(!empty($follows))
                    <h5 class="collapse-custom-footer">Follow us on</h5>
                    <div class="collapse-manu-footer display-none-footer-responsive">
                        <ul class="footer_ul_amrc">
                            @foreach($follows as $follow)
                                <li>
                                    <a href="{{ $follow->social_media_link }}" target="_blank">{{ $follow->social_media_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!--footer_ul2_amrc ends here-->
            </div>
        </div>
    </div>

    <div class="container container-expanded mt-3 payments bottom_border">
        <ul>
            <li><img src="{{ asset('website/img/cart/logo-american-express.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-maestro.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-mastercard.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-visa.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-paypal.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-stripe.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-giropay.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-poste-pay.png') }}"></li>
            <li><img src="{{ asset('website/img/cart/logo-sofort.png') }}"></li>
        </ul>
    </div>

    <div class="container container-expanded footer-copyright">
        <p class="text-center">© Copyright 2019 - All rights reserved | Barròco s.r.l. - VAT 09900070963 - C.S. 10.800 €
            i.v.</p>
    </div>


   @include('website.modals.shipping')
   @include('website.modals.payments')
   @include('website.modals.returns')
   @include('website.modals.contacts')
   @include('website.modals.resi-e-rimborsi')
   @include('website.modals.company-info')
</footer>
<div id="newsletter" class="">
    <a href="#" id="close-newsletter"></a>
    <div class="container container-expanded">
        <div class="wrapper">
            <div class="text"><h4>Stay to up date</h4>
                <p>Sign up to our newsletter for news and promotions.</p></div>
            <div class="form">
                <form action="#" id="form-newsletter">
                    <div class="field"><input type="text" name="email" placeholder="E-mail address" data-rules="email">
                        <input type="hidden" name="action" value="md_newsletter">
                        <button>JOIN US</button>
                    </div>
                    <div class="feedback">Thank you for your subscription</div>
                </form>
            </div>
        </div>
    </div>
</div>
<span id="back-top" class=""><i>&gt;</i></span>
