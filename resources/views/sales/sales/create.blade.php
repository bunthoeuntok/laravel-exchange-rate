 <!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- Title -->
        <title>Exchange Rate</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Theme Styles -->
        <link href="{{ asset('css/concept.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	<style>
		input.form-control, select.form-control {
			border: 1px solid #888888 !important;
		}
	</style>
    </head>
    <body>

        <!-- Page Container -->
        <div class="page-container">
            <div class="login">
                <div class="login-bg">

				</div>
                <div class="login-content">
                    <div class="login-box">
                        <div class="login-header">
                            <h3>Exchange Rate System</h3>
                        </div>
                        <div class="login-body">
                            <form method="post" action="{{ route('sale.sales.store') }}" id="form-login">
                                @csrf
                                <div class="form-group">
									<label for="from_currency" class="required">From Currency</label>
									<select name="from_currency" id="from_currency" class="form-control" required>
										<option value="">Select Currency</option>
										@foreach($currencies as $currency)
											<option value="{{ $currency->id }}">
												{{ $currency->name }}
											</option>
										@endforeach
									</select>
                                </div>
								<div class="form-group">
									<label for="to_currency" class="required">To Currency</label>
									<select name="to_currency" id="to_currency" class="form-control" required>
										<option value="">Select Currency</option>
									</select>
                                </div>
								<div class="form-group">
									<label for="rate" class="required">Exchange Rate</label>
									<input name="rate" id="rate" class="form-control" readonly placeholder="Exchange Rate" required>
                                </div>

                                <div class="form-group">
									<label for="amount" class="required">Amount</label>
                                    <input type="number" class="form-control" placeholder="Amount" id="amount" name="amount" required />
                                </div>
								<div class="form-group" style="display: flex; justify-content: space-between">
									<h5>Total exchange Amount:</h5>
									<h5>
										<span id="total_exchange_amount">00.00</span>
										<span id="exchange_symbol"></span>
									</h5>
								</div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_print">
                                        <label class="custom-control-label" for="is_print">Print Receipt</label>
                                    </div>
                                </div>
                                <button type="submit" id="btn-summit" disabled class="btn btn-lg btn-block btn-primary">EXCHANGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Page Container -->


        <!-- Javascripts -->
        <script src="{{ asset('plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form-login').validate({
					rules: {
					    amount: {
					        required: true,
							number: true
						}
					}
				});


                $('#from_currency').change(function () {
					var id = $(this).val();

					$.ajax({
						url: '{{route('sale.sales.get-to-currencies')}}',
						type: 'get',
						dataType: 'html',
						data: {
						    id: id,
							_token: '{{ csrf_token() }}'
						},
						success: function (data) {
							$('#to_currency').html(data);
                        }
					})
                });

				$('#to_currency').change(function () {
					var from_id = $('#from_currency').val();
					var to_id = $(this).val();

					$.ajax({
						url: '{{route('sale.sales.get-exchange-rate')}}',
						type: 'get',
						dataType: 'json',
						data: {
						    from_id: from_id,
						    to_id: to_id,
							_token: '{{ csrf_token() }}'
						},
						success: function (data) {
						    if (data.rate == null) {
						        alert('No rate setup for this one');
						        $('#rate').val(0.00);
							} else {
						        var rate = data.rate.exchange_rate;
						        var amount = $('#amount').val();
						        var exchange_amount = rate * amount;
								$('#rate').val(rate.toFixed(5));
								$('#total_exchange_amount').text(exchange_amount.toFixed(2));
								$('#exchange_symbol').text(data.rate.to_currency_symbol);
								$('#btn-summit').prop('disabled', false);
							}
                        }
					})
                });

				$('#amount').keyup(function () {
					var rate = $('#rate').val();
					var amount = $(this).val();
					var currency_id = $('#to_currency').val();

					var total_exchange_amount = rate * amount;
					$('#total_exchange_amount').text(total_exchange_amount.toFixed(2));
					$.ajax({
						url: '{{route('sale.sales.get-currency-amount')}}',
						type: 'get',
						dataType: 'json',
						data: {
						    currency_id: currency_id,
							_token: '{{ csrf_token() }}'
						},
						success: function (data) {
						   if (total_exchange_amount > data.currency_amount.total_amount) {
						       $('#btn-summit').prop('disabled', true);
						   } else {
						       $('#btn-summit').prop('disabled', false);
						   }
                        }
					})
                });
            });


        </script>
    </body>

</html>
