<style type="text/css">
	.nav .nav-pills li:hover{
    box-shadow: 1px 10px 20px -5px rgba(0,0,0,1);
	}
</style>
<aside class="aside-lg bg-light">
	<section class="vbox">
		<section class="scrollable">
			<div class="wrapper">
				<center>
					<a href="#" class="thumb ">
						<img src="https://ouo.io/images/avatar.jpg" class="img-circle">
					</a>
					<div class="clear">
						<div class="h3 m-t-xs m-b-xs font-thin">
						 {{Auth::user()->username}}
						  </div>
						<small class="text-muted">
							<i class="fa fa-envelope-o"> </i>
							 {{ Auth::user()->email }}
						</small>
					</div>
				</div>
			</div>
			<section class="hidden-xs text-center" id="mail-nav">
				   <h4 style="border-top:1px solid #aaa;border-bottom:1px solid #aaa; background:#fff; padding: 5px;">
				   	<i class="fa fa-link"></i> Menu Info   	<i class="fa fa-link"></i>
				   </h4>
				</div>
			
				<ul class="nav nav-pills nav-stacked no-radius">
					<li class="active">
						<a href="/account/profile">
							<i class="fa fa-fw fa-file-text">
							</i> Profile
						</a>
					</li>
					<li class="">
						<a href="/account/changePassword">
							<i class="fa fa-fw fa-key">
							</i> Change Password
						</a>
					</li>
							<!-- 	<li>
							<a href="/account/change-email">
							<i class="fa fa-fw fa-envelope-o">
							</i> Change Email</a>
						</li> -->
					</ul>
				</section>
			<!-- 	<div class="wrapper">
					<a class="btn btn-facebook btn-block m-b-sm" href="#" disabled="true">
						<i class="fa fa-facebook pull-left">
						</i> Connect with Facebook
					</a>
				</div> -->
			</section>
		</section>
</aside>