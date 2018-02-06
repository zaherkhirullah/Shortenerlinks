@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
	<section class="scrollable">
		<section class="hbox stretch">
			<section class="vbox">
				<section class="scrollable wrapper">
					<div class="box box-info">
						<div class="box-body">
							@include('_includes.forms.changepass')
						</div>
					</div>
				</section>
			</section>
			@include('_includes.nav.SettingAside')
		</section>
	</section>
</section>
@endsection
