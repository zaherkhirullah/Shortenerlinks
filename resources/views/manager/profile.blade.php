@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
	<section class="scrollable">
		<section class="hbox stretch">
			@include('_includes.nav.SettingAside')
			<section class="vbox">
				<section class="scrollable wrapper"><form method="POST" action="http://ouo.io/manage/account/profile" accept-charset="UTF-8">
					<input name="_token" type="hidden" value="1m4qlv29NhVRkvO9Rse6NZQqpM2HLI8g8r4Hzp8l">
					<section class="panel no-borders"><header class="panel-heading"><h4 class="font-thin">User <b>Profile</b>
					</h4>
				</header>
				<div class="panel-body">
					<div class="form-group pull-in clearfix">

						<div class="col-sm-6">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" placeholder="John" value="test" data-required="true">
						</div>

						<div class="col-sm-6">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" placeholder="Doe" value="test" data-required="true">
						</div>
					</div>
					<div class="form-group pull-in clearfix">

						<div class="col-sm-6">
							<label>Address 1</label>
							<input type="text" class="form-control" name="address1" value="teest" data-required="true">
						</div>

						<div class="col-sm-6">
							<label>Address 2</label>
							<input type="text" class="form-control" name="address2" value="teeest">
						</div>
					</div>
					<div class="line line-dashed line-lg pull-in">
					</div>
					<div class="form-group">

						<label>Withdrawal Method</label>
						<select class="form-control" name="withdrawal_method"><option value="">Please choose</option>
							<option value="1" selected="">PayPal</option>
							<option value="8">Payza</option>
						</select>
					</div>
					<div class="form-group">
						<label>Withdrawal Email</label>
						<input type="text" class="form-control" name="withdrawal_email" value="uobabylon@mohmal.com" data-required="true">
					</div>
				</div>
				<footer class="panel-footer text-right bg-light lter"><button type="submit" class="btn btn-success btn-s-xs">Update</button>
				</footer>
			</section>
		</form>
	</section>
</section>
</aside>
</section>
</section>
</section>
@endsection
