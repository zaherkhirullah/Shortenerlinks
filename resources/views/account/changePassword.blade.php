@extends('layouts.layout')

@section('content')
<section class="vbox" data-pjax="true">
		<section class="hbox stretch">
			<section class="">
				<section class="scrollable wrapper">
					<div class="box box-info">
						<div class="box-body">
							@include('_includes.forms.account.changepass')
						</div>
					</div>
				</section>
			</section>
			@include('_includes.nav.SettingAside')
		</section>
</section>
@endsection
