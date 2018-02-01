<aside class="aside-lg bg-light">
	<section class="vbox">
		<section class="scrollable">
			<div class="wrapper">
				<div class="clearfix">
					<a href="#" class="pull-right thumb m-r">
						<img src="https://ouo.io/images/avatar.jpg" class="img-circle">
					</a>
					<div class="clear">
						<div class="h3 m-t-xs m-b-xs font-thin"> {{Auth::user()->username}} </div>
						<small class="text-muted">
							<i class="fa fa-envelope-o"> </i> {{ Auth::user()->email }}
						</small>
					</div>
				</div>
			</div>
			<section class="hidden-xs" id="mail-nav">
				<ul class="nav nav-pills nav-stacked no-radius">
					<li class="active"> </li>
					<li class="active">
						<a href="/user/account/profile">
							<i class="fa fa-fw fa-file-text">
							</i> Profile
						</a>
					</li>
					<li class="">
						<a href="/user/account/change-password">
							<i class="fa fa-fw fa-key">
							</i> Change Password
						</a>
					</li>
							<!-- 	<li>
							<a href="/user/account/change-email">
							<i class="fa fa-fw fa-envelope-o">
							</i> Change Email</a>
						</li> -->
					</ul>
				</section>
				<div class="wrapper">
					<a class="btn btn-facebook btn-block m-b-sm" href="#" disabled="true">
						<i class="fa fa-facebook pull-left">
						</i> Connect with Facebook
					</a>
				</div>
			</section>
		</section>
</aside>