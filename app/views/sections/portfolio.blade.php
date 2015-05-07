	<section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['portfolio']['display_name']}}</h2>
                    <h3 class="section-subheading text-muted">
					{{$menu['portfolio']['description']}}</h3>
                </div>
            </div>
            <div class="row">
				@if (isset($portfolio))
				@foreach ($portfolio as $content)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#{{$content['url']}}" 
					class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="/assets/{{$content['image']}}" 
						class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$content['title']}}</h4>
                        <p class="text-muted">
						{{$content['category']}}</p>
                    </div>
                </div>
				@endforeach
				@endif
            </div>
        </div>
    </section>
