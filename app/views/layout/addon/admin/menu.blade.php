				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="fa fa-dashboard"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="caption-subject theme-font-color bold uppercase">Data Master</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-anchor"></i>
					<span class="title"> Data UPT</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						@if(empty(UPTModel::all()))
						@else
						@foreach(UPTModel::all() as $value)
						<li>
							<a href="{{route('admin.upt.manage', 'id_upt='.Crypt::encrypt($value->id_upt))}}">
								{{$value->nama_upt}}
							</a>
						</li>
						@endforeach
						@endif
					</ul>
				</li>
				<!-- <li id="data-menu" >
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
				</li> -->
				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="fa fa-compass"></i>
					<span class="title">Data Operasi</span>
					</a>
				</li>
				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="fa fa-gear"></i>
					<span class="title">Data Pelanggaran</span>
					</a>
				</li>
				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="fa fa-ship"></i>
					<span class="title">Data Kapal</span>
					</a>
				</li>
				<li>
					<a href="{{route('admin.dashboard')}}">
					<i class="fa fa-rocket"></i>
					<span class="title">Data Speedboat</span>
					</a>
				</li>
				<li>
					<a href="">
						<span class="caption-subject theme-font-color bold uppercase">CMS Pages</span>
					</a>
				</li>
				<li>
					<a href="#">
					<i class="icon-home"></i>
					<span class="title">CMS</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{route('admin.cms.post.index.all')}}">
							<i class="fa fa-archive"></i>
							<span class="title">Pos</span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-home"></i>
								Media
							</a>
						</li>
						<li>
							<a href="{{route('admin.cms.kategori.index')}}">
							<i class="fa fa-list-ul"></i>
								Kategori
							</a>
						</li>
						<li>
							<a href="{{route('admin.cms.kategori.index')}}">
							<i class="fa fa-picture-o"></i>
								Slider
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