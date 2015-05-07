	<section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['about']['display_name']}}
					</h2>
                    <h3 class="section-subheading text-muted">
					{{$menu['about']['description']}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
						@if (isset($about))
						@foreach ($about as $content)
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive"
								src="/assets/{{$content['image']}}"
								alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>
									{{date("M Y",strtotime($content['to']))}} 

							@if( $content['from'] != "0000-00-00" )
							to {{date("M Y",strtotime($content['from']))}}
							@endif
									</h4>
                                    <h4 class="subheading">
									{{$content['title']}}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
									{{$content['description']}}</p>
                                </div>
                            </div>
                        </li>
						@endforeach
						@endif
						<li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
