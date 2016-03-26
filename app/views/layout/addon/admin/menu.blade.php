				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="icon-speedometer"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				
				<li id="data-menu" >
					<a href="javascript:;">
					<i class="icon-folder"></i>
					<span class="title">Data</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						@if(Lib::uRole() == null)
						<li>
							<a href="{{route('admin.upt.index')}}">
							<i class="icon-home"></i>
								Data UPT
							</a>
						</li>
						@else
						<li>
							<a href="{{route('admin.upt.manage')}}">
							<i class="icon-home"></i>
								Data {{Lib::uRole()}}
							</a>
						</li>
						@endif

						<li>
							<a href="{{--route('admin.upt.index')--}}">
							<i class="icon-ban"></i>
								Data Pelanggaran
							</a>
						</li>
						<li>
							<a href="{{route('admin.operasi.index')}}">
							<i class="icon-compass"></i>
								Data Operasi
							</a>
						</li>
						@if(Lib::uRole() == null)
							<li>
								<a href="{{route('master.all.index')}}">
								<i class="icon-pencil"></i>
								Data Master</a>
							</li>
						@else
						@endif
						<li>
							<a href="{{route('admin.upt.index')}}">
							<i class="icon-home"></i>
								Laporan
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
					<i class="icon-home"></i>
					<span class="title">CMS</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="icon-home"></i>
							<span class="title">Pos</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="{{route('admin.cms.post.index.all')}}">
									<i class="icon-home"></i>
										Semua
									</a>
								</li>
								<li>
									<a href="#">
									<i class="icon-home"></i>
										Draf
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
							<i class="icon-home"></i>
								Media
							</a>
						</li>
						<li>
							<a href="{{route('admin.cms.kategori.index')}}">
							<i class="icon-home"></i>
								Kategori
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{route('admin.users.index')}}">
					<i class="icon-user"></i>
					<span class="title">Users</span>
					</a>
				</li>