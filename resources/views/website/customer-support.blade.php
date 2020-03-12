@extends('layouts.website')

@section('title')
    Login | Discover Barròco
@endsection

@section('content')
    <div id="page-inner-login">
        <div class="container container-expanded">
            <div class="page-cover">
                <div><h2>Customer Service</h2></div>
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <div class="alert-black" style="padding-bottom: 20px"><strong>Error:</strong> Please provide a valid email address.</div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="page-inner">
                <div class="container">
                    <form action="{{ route('customer.support') }}" id="form-resi" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="fields">
                            <div class="field"><label>Name<span>*</span></label>
                                <input type="text" name="name" required></div>
                            <div class="field">
                                <label>Surname<span>*</span></label>
                                    <input type="text" name="lastname" data-rules="required"></div>
                        </div>
                        <div class="fields">
                            <div class="field"><label>Email<span>*</span></label> <input type="text" name="email"
                                                                                         data-rules="email"></div>
                            <div class="field"><label>Order number<span>*</span></label> <input type="text" name="order"
                                                                                                data-rules="required">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field full"><label>REASON FOR RETURN<span>*</span></label><textarea
                                        name="message" data-rules="required"></textarea></div>
                        </div>
                        <div class="fields">
                            <div class="field field--send"><input type="hidden" name="action" value="md_resi">
                                <button class="btn">SEND</button>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="feedback">Your email has been sent to Shipping and Return department. We will
                                replay you as soon as possibile.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
