<section class="vbox">
	<section class="w-f scrollable">
		<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
		
			<nav class="nav-primary hidden-xs">
				<ul class="nav">
					<li class="active">
						<a href="{{route('admin.dashboard')}}">
							<i class="fa fa-dashboard">
								<b class="bg-danger"></b>
							</i>
							<span>@lang('lang.dashboard')</span>
						</a>
					</li>
					<!-- links -->
					<li>
						<a href="#@lang('lang.Links')">
							<i class="fa fa-link">
								<b class="bg-success"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span><span class="hidden-xs"> @lang('lang.manage') </span> @lang('lang.Links')</span>
						</a>
						<ul class="nav lt">
						<li>
							<a href="{{url('/admin/links')}}">
								<i class="fa fa-link"></i>
								<span>@lang('lang.Links')</span>
							</a>
						</li>
						
						<li>
							<a href="{{url('/admin/links/dlist')}}">
								<i class="fa fa-link"></i>
								<span>@lang('lang.hidden_links')</span>
							</a>
						</li>
							
						</ul>
					</li>
					<!-- files -->
					<li>
						<a href="#@lang('lang.Files')">
							<i class="fa fa-file-o">
								<b class="bg-info"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span><span class="hidden-xs"> @lang('lang.manage') </span> @lang('lang.Files')</span>
						</a>
						<ul class="nav lt">
						<li>
						<a href="{{url('/admin/files')}}">
							<i class="fa fa-file-text"></i>
							<span>@lang('lang.Files')</span>
							</a>
						</li>	
						<li>
						<a href="{{url('/admin/files/private')}}">
							<i class="fa fa-lock"></i>
							<span>@lang('lang.private_files')</span>
							</a>
						</li>
						<li>
						<a href="{{url('/admin/files/public')}}">
							<i class="fa fa-unlock"></i>
							<span>@lang('lang.public_files') </span>
							</a>
						</li>	
						<li>
							<a href="{{url('/admin/files/dlist')}}">
								<i class="fa fa-eye-slash"></i>
								<span>@lang('lang.hidden_files')</span>
							</a>
						</li>
							
						</ul>
					</li>
					<!-- folders -->
					<li>
						<a href="#@lang('lang.folders')">
							<i class="fa fa-folder-o">
								<b class="bg-warning"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span><span class="hidden-xs"> @lang('lang.manage') </span> @lang('lang.Folders')</span>
						</a>
						<ul class="nav lt">
						<li>
							<a href="/admin/folders">
								<i class="fa fa fa-folder-open-o"></i>
								<span>@lang('lang.Folders')</span>
							</a>
						</li>
						<li>
							<a href="/admin/folders/dlist">
								<i class="fa fa-eye-slash"></i>
								<span>@lang('lang.hidden_folders') </span>
							</a>
						</li>
						</ul>
					</li>
					<!-- Users -->
					<li>
						<a href="#folders">
							<i class="fa fa-user">
								<b class="bg-primary"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span><span class="hidden-xs"> @lang('lang.manage') </span> @lang('lang.users')</span>
						</a>
						<ul class="nav lt">
						<li>
						<a href="{{url('/admin/users')}}">
							<i class="fa fa-users"></i>
							<span> @lang('lang.users')</span>
						</a>
						</li>
						<li>
							<a href="/admin/users">
								<i class="fa fa-lock">
								</i>
								<span>@lang('lang.not_active_users') </span>
							</a>
						</li>
						</ul>
					</li>
					<!-- Roles -->
					<li>
						<a href="/admin/roles">
							<i class="fa fa-users">
							<b class="bg-info dker"></b>
							</i>

							<span> @lang('lang.roles')</span>
						</a>
						</li>
						
				<!-- Withdraw -->
				<li>
					<a href="{{route('withdraws.index')}}">
						<i class="fa fa-money">
						<b class="bg-success dker"></b>
						</i>
						<span> @lang('lang.withdraws')</span>
					</a>
					</li>
					<!-- Contatcs -->
					<li>
						<a href="#@lang('lang.contacts')">
							<i class="fa fa-phone">
								<b class="bg-warning"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span>@lang('lang.tickets') & @lang('lang.contacts') </span>
						</a>
						<ul class="nav lt">
							<li>
								<a href='{{route('contacts.index')}}'>
									<i class="fa fa-phone">
									</i>
									<span>@lang('lang.contacts')</span>
								</a>
								</li>
								
							<li>
								<li>
									<a href='{{route('tickets.index')}}' >
										<i class="fa fa-phone">
										</i>
										<span>@lang('lang.tickets')</span>
									</a>
								</li>
							<li>
						</ul>
					</li>

					<li>
						<a href="#@lang('lang.tools')">
							<i class="fa fa-flask">
								<b class="bg-primary"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span>@lang('lang.tools')</span>
						</a>
						<ul class="nav lt">
						<!-- domains -->			
						<li>
						<a href="/admin/PayMethods">
							<i class="fa fa-dollar">
								<b class="bg-success dker"></b>
							</i>
							<span>@lang('lang.pay_methods')</span>
						</a>
					</li>
								<!-- domains -->			
					<li>
					<a href="{{route('domains.index')}}">
						<i class="fa fa-code-fork">
							<b class="bg-danger dker"></b>
						</i>
						<span>@lang('lang.domains')</span>
					</a>
				</li>
					<!-- Ads Types -->
					<li>
						<a href="{{route('adstypes.index')}}">
							<i class="fa fa-area-chart">
								<b class="bg-info dker"></b>
							</i>
							<span>@lang('lang.ads_types')</span>
						</a>
					</li>
					
						</ul>
					</li>
					<li>
						<a href="#@lang('lang.settings')">
							<i class="fa fa-cog">
								<b class="bg-primary"></b>
							</i>
							<span class="pull-right">
								<i class="fa fa-angle-down text"></i>
								<i class="fa fa-angle-up text-active"></i>
							</span>
							<span>@lang('lang.settings')</span>
						</a>
						<ul class="nav lt">
							<li>
								<a href="{{route('account.profile')}}">
									<i class="fa fa-angle-right"></i>
									<span>@lang('lang.profile')</span>
								</a>
							</li>
							<li>
								<a href="{{route('account.changePassword')}}">
									<i class="fa fa-angle-right"></i>
									<span>@lang('lang.change_password')</span>
								</a>
							</li>
							<li>
								<a href="/admin/account/change-email">
									<i class="fa fa-angle-right"></i>
									<span>@lang('lang.change_email')</span>
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</nav>

		</div>
	</section>
	<footer class="footer lt hidden-xs b-t b-dark">
		<a href="/admin/" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
			<i class="fa fa-angle-left text"></i>
			<i class="fa fa-angle-right text-active"></i>
		</a>
		<div class="btn-group hidden-nav-xs">
			<a href="/auth/logout" class="btn btn-icon btn-sm btn-dark"><i class="fa fa-power-off"></i></a>
		</div>
	</footer>
</section>