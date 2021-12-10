
@extends($activeTemplate .'layouts.user')
@section('content')
    @include($activeTemplate.'breadcrumb')
    <section class="cmn-section price">
 <div class="col-10 mx-auto">
<p><h4>Keep remind that Your membership plan price is non refundable money for all. So you will never back this money. You have to earn money and withdraw money from your plan package and you can earn from your refer </h4> </p>
</div>      <br>
    	<div class="container">
    		<div class="row justify-content-center">
    			@foreach($plans as $plan)
    			<div class="col-xl-4 col-lg-4 col-md-6 mb-4">
    				<div class="single-price">
    					<div class="part-top">
    						<h3>{{ __($plan->name) }}</h3>
    						<h4>{{ __($plan->price + 0) }} {{$general->cur_text}}<br></h4>
    					</div>
    					<div class="part-bottom">
                            <ul>
                                <li>@lang('Plan Details')</li>
                                <li>@lang('Daily Limit') : {{ $plan->daily_limit }} @lang('Ads Click')</li>
                                <li>@lang('Daily Survey Limit') : {{ $plan->survey_limit }} @lang('Survey task')</li>
                                <li>@lang('Daily income') : {{ $plan->daily_income }} @lang('TK Daily income')</li>
                                <li>@lang('Refer monthly') : {{ $plan->refer_monthly }} @lang('People Refer monthly')</li>
                                <li>@lang('Monthly income') : {{ $plan->monthly_income }} @lang('TK Monthly income')</li>
                                <li>@lang('Commission') : {{ $plan->refer_commission }} @lang('Percent Refer commission')</li>
                                <li>@lang('Referral Bonus') : @lang('Upto') {{ $plan->ref_level }} @lang('Level')</li>
                                <li>@lang('Plan Price') : {{ getAmount($plan->price) }} {{ __($general->cur_text) }}</li>
                                <li>@lang('Validity') : @lang('Yearly')</li>
                            </ul>
                            @if(auth()->check())
                            @if(auth()->user()->plan_id == $plan->id)
                            <button disabled>@lang('Current Plan')</button>
                            @else
                            <button class="buyBtn" data-id="{{ $plan->id }}">@lang('Subscribe Now')</button>
                            @endif
                            @else
                            <button class="buyBtn" data-id="{{ $plan->id }}">@lang('Subscribe Now')</button>
                            @endif
                        </div>
    				</div>
    			</div>
    			@endforeach
    		</div>
    	</div>
</section>

    <div id="BuyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Confirmation')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('user.buyPlan')}}" method="POST">
                    <div class="modal-body text-center">

                        {{csrf_field()}}
                        <div class="form-group m-0">
                            <input type="hidden" name="id">
                        </div>
                        <strong>@lang('Are you sure to subscribe this plan ?')</strong>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">@lang('Confirm')</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
     <div id="awn-z5213671"></div>
@endsection
@push('script')
<script type="text/javascript">
    (function ($) {
        "use strict";
    	$('.buyBtn').click(function(){
    		var modal = $('#BuyModal');
    		modal.find('input[name=id]').val($(this).data('id'));
    		modal.modal('show');
    	});
    })(jQuery);
</script>
@endpush