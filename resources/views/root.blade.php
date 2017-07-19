@extends('layout')

@section('content')

<div id="slidey" style="display:none;">
    <ul>
        @foreach ($bestSeries as $tvShow)

            <li>
                <img src="{{ $imageDir.$tvShow->backdrop_path }}" alt=" ">
                <p class='title'>{{ $tvShow->name.' ('.$tvShow->vote_average.'/10)' }}</p>
                <p class='description'> {{ $tvShow->overview }}</p>
            </li>
        @endforeach
    </ul>
    </div>
    <script src="{{ asset('js/jquery.slidey.js') }}"></script>
    <script src="{{ asset('js/jquery.dotdotdot.min.js') }}"></script>
    <script type="text/javascript">
                            $("#slidey").slidey({
                                    interval: 8000,
                                    listCount: 20,
                                    autoplay: false,
                                    showList: true,
                            });
                            $(".slidey-list-description").dotdotdot();
    </script>

<div class="general">
		<h4 class="latest-text w3_latest_text">Seriale w tym tygodniu</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Odcinki w tym tygodniu</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Najlepiej ocenione seriale</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">

                                                    <?php $i = 0; ?>
                                                    @foreach($onAir as $show)
                                                        <?php $i++; ?>
							<div class="col-md-2 w3l-movie-gride-agile">
								<a href="{{ route('show', ['showId' => $show->id]) }}" class="hvr-shutter-out-horizontal"><img src="{{ $imageDir.$show->poster_path }}" title="album-name" class="img-responsive" alt=" " />
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
                                                        @if($i==5)
                                                            <div class="clearfix"> </div>
                                                            <?php $i = 0; ?>
                                                        @endif
                                                    @endforeach

							<div class="clearfix"> </div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                                 <?php $i = 0; ?>
						@foreach($topRated as $show)
                                                    <?php $i++; ?>
							<div class="col-md-2 w3l-movie-gride-agile">
								<a href="{{ route('show', ['showId' => $show->id]) }}" class="hvr-shutter-out-horizontal"><img src="{{ $imageDir.$show->poster_path }}" title="album-name" class="img-responsive" alt=" " />
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
                                                    @if($i==5)
                                                        <div class="clearfix"> </div>
                                                        <?php $i = 0; ?>
                                                    @endif
                                                @endforeach

						<div class="clearfix"> </div>
					</div>

				</div>
			</div>
		</div>
	</div>

@stop