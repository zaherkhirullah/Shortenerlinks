@extends('layouts.accountLayout')

@section('content')
<div class=" col-md-12">
	<section class="scrollable wrapper">
		<div class="row">
			<section class="col-md-12">
				<div class="box box-info">
					<div class="box-body">
					@include('_includes.forms.account.changepass')
					</div>
				</div>
			</section>
		</div>
	</section>
</div>
@endsection
