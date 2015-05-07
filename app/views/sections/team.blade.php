	<section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['team']['display_name']}}</h2>
                    <h3 class="section-subheading text-muted">
					{{$menu['team']['description']}}</h3>
                </div>
            </div>
            <div class="row">
				@if (isset($team))
				@foreach ($team as $content)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/assets/{{$content['image']}}"
 						class="img-responsive img-circle" alt="">
                        <h4>{{$content['name']}}</h4>
                        <p class="text-muted">
						{{$content['designation']}}</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter">
							</i></a>
                            </li>
                            <li><a href="#">
							<i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#">
							<i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
				@endforeach
				@endif
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">
					Lorem ipsum</p>
                </div>
            </div>
        </div>
    </section>
