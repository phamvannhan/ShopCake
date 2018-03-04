
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> {!! __('f_top.address_shop') !!}</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
						 <li><a href="{{URL::asset('')}}language/vi">{!! __('f_top.lang_vi') !!}</a></li>
                        <li><a href="{{URL::asset('')}}language/en">{!! __('f_top.lang_en') !!}</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="#"><i class="fa fa-user"> <span style="color: red; font-size: 18px;">{!! __('f_top.hello') !!} {{Auth::user()->name}}</span></i></a></li>
						<li><a href="{{route('getLogout')}}">{!! __('f_top.logout') !!}</a></li>
					@else

						<li><a href="{{ trans('routes.register')}}">{!! __('f_top.register') !!}</a></li>
						<li><a href="{{ trans('routes.login')}}">{!! __('f_top.login') !!}</a></li>
					@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="GET" id="searchform" action="{{route('search')}}">
							
					        <div class="header__tools__search__inner">
		                        <input type="text" name="tukhoa" id="s" class="form-control" value="{{isset($tukhoa) ? $tukhoa:''}}" placeholder="{!! __("f_menu.search_products") !!}">
		                        <button class="btn" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		                        <input type="submit" style="position: absolute; left: -9999px" style="float: right;" />
		                    </div>
						</form>
					</div>

					<div class="beta-comp">
						
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart">
								</i> {!! __("f_menu.shopping_carts") !!} ({{Cart::count()}})<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							
								<div class="cart-item">

									<div class="media">
										<a class="pull-left" href="#"><img src="#" alt=""></a>
										<a href="#" class="cart-item-delete"><i class="fa fa-times"></i></a>
										<div class="media-body">
											<span class="cart-item-title"></span>
											<span class="cart-item-amount">sluong*<span>
											giasp
										</div>
									</div>
								</div>
							
								<!--end cart item-->
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">143.000 VNĐ</span></div>
									<div class="clearfix"></div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('giohang')}}" class="beta-btn primary text-center">{!! __("f_menu.shopping_carts") !!}<i class="fa fa-chevron-right"></i></a>
									</div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('checkout')}}" class="beta-btn primary text-center"> {!! __("f_menu.checkout") !!}<i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">

						<li><a href="{{ trans('routes.home') }}" class="{{ currentPageMenu(['/', '/en']) }}" title="{!! __('f_menu.home') !!}"><span class="icon_house hidden-sm hidden-md hidden-lg"></span> {!! __('f_menu.home') !!}</a></li>


						<li><a @if($composer_categories->first()) class="{{ currentPageMenu(['en/products*', 'san-pham*']) }}" href="{!! route("loaisanpham", $composer_categories->first()->id) !!}" @else href="#" @endif title="{!! __("f_menu.products") !!}"> {!! __("f_menu.products") !!} </a>
							<ul class="sub-menu">
							@foreach($composer_categories as $categories)
								@if($categories->children->count())
	                            <li class="dropdown"><a href="{!! route('loaisanpham',$categories->id)!!}" title="{{ $categories->name }}">{{ $categories->name }}</a>
	                                <a class="button-dropdown hidden-sm hidden-md hidden-lg" href="javascript:void(0)"><span class="icon-toggle"></span></a>
	                                <ul class="sub-menu">
	                                    @foreach($categories->children as $rs)
	                                        <li><a href="{!! route('loaisanpham',$rs->id)!!}" title="{{ $rs->name }}" >{{ $rs->name }}</a></li>
	                                    @endforeach
	                                </ul>
	                            </li>
                                    
								@else
								<li><a href="{{route('loaisanpham',$categories->id)}}">{{$categories->name}}</a></li>
								@endif
							@endforeach
							</ul>
						</li>
						<li>
							<a href="{!! route('frontend.page.index', trans('routes.about_us')) !!}" class="{{ currentPageMenu(['en/about-us', 'gioi-thieu']) }}" title="{!! __('f_menu.about_us') !!}"><span class="icon_menu_about hidden-sm hidden-md hidden-lg"></span> {!! __('f_menu.about_us') !!}</a>
						</li>
						<li>
							<a href="{!! route('frontend.page.index', trans('routes.contact_us')) !!}" class="{{ currentPageMenu(['en/contact_us', 'lien-he']) }}" title="{!! __('f_menu.contact_us') !!}"><span class="icon_menu_about hidden-sm hidden-md hidden-lg"></span> {!! __('f_menu.contact_us') !!}</a>
						</li>
						
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->