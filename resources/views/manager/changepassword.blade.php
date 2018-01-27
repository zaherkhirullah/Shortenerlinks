@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
	<section class="scrollable">
		<section class="hbox stretch">
			@include('_includes.nav.SettingAside')
				<section class="vbox">
					<section class="scrollable wrapper">

						<form method="POST" action="http://ouo.io/manage/account/change-password" accept-charset="UTF-8"><input name="_token" type="hidden" value="1m4qlv29NhVRkvO9Rse6NZQqpM2HLI8g8r4Hzp8l">
							<section class="panel no-borders">
								<header class="panel-heading">
									<h4 class="font-thin">Change <b>Password</b></h4>
								</header>
								<div class="panel-body">
									<div class="form-group">

										<label>Old Password</label>
										<input type="password" class="form-control" name="old_password" value="" data-required="true">
									</div>
									<div class="line line-dashed line-lg pull-in"></div>
									<div class="form-group">

										<label>New Password</label>
										<input type="password" class="form-control" name="new_password" value="" data-required="true" aria-autocomplete="list">
									</div>
									<div class="form-group">

										<label>Confirm New Password</label>
										<input type="password" class="form-control" name="password_confirm" value="" data-required="true">
									</div>
								</div>
								<footer class="panel-footer text-right bg-light lter">
									<button type="submit" class="btn btn-success btn-s-xs">Update</button>
								</footer>
							</section>
						</form>
					</section>
				</section>
		
		</section>
	</section>
</section>
@endsection
