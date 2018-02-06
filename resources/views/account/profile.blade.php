@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
	<section class="scrollable">
		<section class="hbox stretch">

			<section class="vbox">
				<section class="scrollable wrapper">

					<div class="row">
						<section class="col-md-12">
							<div class="box box-primary">
								<div class="box-body">
									@include('_includes.forms.profile')
								
								</div>
							</div>
						</section>
					</div>
					<!--/ row 2-->
				</section>
			</section>

			@include('_includes.nav.SettingAside')

		</section>
	</section>
</section>
@endsection
