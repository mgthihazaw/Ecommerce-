@extends('admin.layout.master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header bg-light">Add Coupon</div>
            <div class="card-body">

                <form action="{{ route('coupons.store') }}" id="createCoupon" method="post">
                    @csrf


                   

                    <div class="form-group">
                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                        <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg.AD1008">
                    </div>

                    <div class="form-group">
                        <label for="amount" class="control-label mb-1">Amount</label>
                        <input id="amount" name="amount" type="number" class="form-control" aria-required="true" aria-invalid="false" min="0" placeholder="eg.5000">
                    </div>



                   

                    <div class="form-group ">
                        <label for="amount_type" class="control-label mb-1 ">Amount Type</label>

                        <select name="amount_type" id="amount_type" class="form-control ">

                            <option value="Percentage"> Percentage </option>
                            <option value="Fixed"> Fixed </option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="expiry_date" class="control-label mb-1">Expiration Date</label>
                        <input id="expiry_date" name="expiry_date" type="text" class="form-control " placeholder="eg-2019/2/25" autocomplete="off" >
                        
                    </div>
                    <div class="form-group">
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <label for="status" class="form-check-label ">
                            <input type="checkbox" id="status" name="status" value="option3" class="form-check-input">Enabled
                        </label>

                    </div>


                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-save fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Save</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        
        

        $( "#expiry_date" ).datepicker({
            changeMonth: true,
           changeYear: true,
           showButtonPanel: true,
           minDate : 0
        });


Form Validate with Jquery
$('form[id="createCoupon"]').validate({
rules: {
  
  amount: {
    required: true,
    
  },
  
  
  coupon_code: {
    required: true,
    
  },
  
  
  
},

submitHandler: function(form) {
  form.submit();
}
});

    })
</script>

@endsection

@section('css')
<style>
    form .error {
        color: #ff0000;
    }
</style>
@endsection