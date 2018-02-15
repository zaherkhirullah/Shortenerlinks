<section class="vbox">
	<section class="w-f scrollable">
		<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
		

			<nav class="nav-primary hidden-xs">
					<a href="{{route('link.create')}}" data-toggle="modal" class="clearfix wrapper dk nav-user block " style="border-bottom: 1px solid #eee;">
				<button class="btn btn-rounded btn-md btn-icon btn-success pull-left m-r">
					<i class="fa fa-link"></i>
				</button>
				<span class="hidden-nav-xs clear">
					<span class="block m-t-xs">
						<strong class="h5 font-bold text-success ">
							<span class="hidden-xs">Shorter </span>New Link</strong>
					</span>
				</span>
			</a>
			<a href="{{route('file.create')}}" data-toggle="modal" class="clearfix wrapper dk nav-user block ">
				<button class="btn btn-rounded btn-md btn-icon btn-info pull-left m-r">
					<i class="fa fa-file">
					</i>
				</button>
				<span class="hidden-nav-xs clear">
					<span class="block m-t-xs">
						<strong class="h5 font-bold text-info">
							<span class="hidden-xs">Upload </span> New File
						</strong>
					</span>
				</span>
			</a>
				<ul class="nav">
					<li class="active">
						<a href="{{route('user.dashboard')}}">
							<i class="fa fa-dashboard">
								<b class="bg-info">
								</b>
							</i>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
					<a href="#links">
						<i class="fa fa-link">
							<b class="bg-success">
							</b>
						</i>
						<span class="pull-right">
							<i class="fa fa-angle-down text">
							</i>
							<i class="fa fa-angle-up text-active">
							</i>
						</span>
						<span>Links</span>
					</a>
					<ul class="nav lt">
					<li>
						<a href="{{route('link.index')}}">
							<i class="fa fa-eye">
								<b class="bg-info dker">
								</b>
							</i>
							<span>active Links</span>
						</a>
					</li>
					<li>
						<a href="{{route('link.deletedLinks')}}">
							<i class="fa fa-eye-slash">
								<b class="bg-warning dker">
								</b>
							</i>
							<span>Hide Links</span>
						</a>
					</li>
						</ul>
					</li>
					<li>
					<a href="#files">
						<i class="fa fa-file-o">
							<b class="bg-info">
							</b>
						</i>
						<span class="pull-right">
							<i class="fa fa-angle-down text">
							</i>
							<i class="fa fa-angle-up text-active">
							</i>
						</span>
						<span>Files</span>
					</a>
					<ul class="nav lt">
					<li>
						<a href="{{route('file.index')}}">
							<i class="fa fa-eye">
								<b class="bg-info dker">
								</b>
							</i>
							<span>active Files</span>
						</a>
					</li>
					<li>
						<a href="{{route('file.deletedFiles')}}">
							<i class="fa fa-eye-slash">
								<b class="bg-warning dker">
								</b>
							</i>
							<span>Hide Files</span>
						</a>
					</li>
						</ul>
					</li>
					<li>
						<a href="{{route('user.referrals')}}">
							<i class="fa fa-columns">
								<b class="bg-primary dker">
								</b>
							</i>
							<span>Referrals</span>
						</a>
					</li>
					<li>
					<a href="{{url('/withdraw')}}">
						<i class="fa fa-dollar">
							<b class="bg-success">
							</b>
						</i>
						<span>Withdraws</span>
					</a>
				</li>
				<li>
					<a href="#settings">
						<i class="fa fa-cog">
							<b class="bg-danger">
							</b>
						</i>
						<span class="pull-right">
							<i class="fa fa-angle-down text">
							</i>
							<i class="fa fa-angle-up text-active">
							</i>
						</span>
						<span>Settings</span>
					</a>
					<ul class="nav lt">
						<li>
							<a href="{{route('account.profile')}}">
								<i class="fa fa-angle-right">
								</i>
								<span>Profile</span>
							</a>
						</li>
						<li>
							<a href="{{route('account.changePassword')}}">
								<i class="fa fa-angle-right">
								</i>
								<span>Change Password</span>
							</a>
						</li>
							<!-- <li>
								<a href="/account/change-email">
									<i class="fa fa-angle-right"> </i>
									<span>Change Email</span>
								</a>
							</li> -->
						</ul>
					</li>
					
				<!-- 	<li>
						<a href="#Tools">
							<i class="fa fa-flask">
								<b class="bg-info"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span>Tools</span>
						</a>
						<ul class="nav lt">
							<li>
								<a href="/user/tools/multi-links">
									<i class="fa fa-angle-right"></i>
									<span>Mass Shrinker</span>
								</a>
							</li>
							<li>
								<a href="/user/tools/quick-link">
									<i class="fa fa-angle-right"></i>
									<span>Quick Link</span>
								</a>
							</li>
							<li>
								<a href="user/tools/full-page-script">
									<i class="fa fa-angle-right"></i>
									<span>Full Page Script</span>
								</a>
							</li>
						</ul>
					</li>
				-->
				
				</ul>
			</nav>

		</div>
	</section>
	<footer class="footer lt hidden-xs b-t b-dark">
		@guest
		@else
		<div class="btn-group hidden-nav-xs pull-right">
			<a href="{{ route('logout') }}" class=" btn btn-icon btn-sm btn-danger"
			onclick="event.preventDefault();
			document.getElementById('logout-form1').submit();">
			<i class="fa fa-power-off"></i>
		</a>
		<form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
	@endguest
		<a href="{{route('user.dashboard')}}" data-toggle="class:nav-xs" class="pull-left btn btn-sm btn-dark btn-icon">
			<i class="fa fa-angle-left text"></i>
			<i class="fa fa-angle-right text-active"></i>
		</a>
</footer>
</section>