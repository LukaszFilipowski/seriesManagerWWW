@extends('../layout')

@section('content')

<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home') }}">Home</a></li>
				  <li class="active">{{ Auth::user()->name }}</li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-12 single-left">
					<div class="song">
						<div class="song-info">
                                                    <h3>{{ Auth::user()->name }}</h3>

                                                </div>


					</div>

                                    <p>o mnie</p>



                                <div class="col-md-12 single-right">
					<h3>Lista seriali</h3>
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">
                                            @foreach($seriesData as $show)
                                                <div class="col-md-2 w3l-movie-gride-agile">
								<a href="{{ route('show', ['showId' => $show->id]) }}" class="hvr-shutter-out-horizontal"><img style="width:100%;" src="{{ $imageDir.$show->poster_path }}" title="album-name" class="img-responsive" alt=" " />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="{{ route('show', ['showId' => $show->id]) }}">{{ $show->name }}</a></h6>
									</div>
									<div class="mid-2 agile_mid_2_home">
										<p>2016</p>
										<div class="block-stars">
											<ul class="w3l-ratings">
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben">
									<p>odcinek</p>
								</div>
                                                </div>

                                            @endforeach
                                        </div>

                                    </div>
                                </div>
				<div style="margin-top:10px;" class="col-md-12 single-right">
					<h3>Aktywność użytkownika</h3>

				</div>



				<div class="clearfix"> </div>
			</div>
				</div>
				<!-- //w3l-latest-movies-grids -->
			</div>
		</div>
	<!-- //w3l-medile-movies-grids -->

@endsection