	<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['services']['display_name']}}</h2>
                    <h3 class="section-subheading text-muted">
					{{$menu['services']['description']}}</h3>
                </div>
            </div>
            <div class="row text-center">
				@if (isset($services))
				@foreach ($services as $content)
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa {{$content['image']}} fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">
					{{$content['title']}}</h4>
                    <p class="text-muted">
					{{$content['description']}}</p>
                </div>
				@endforeach
				@endif
            </div>
        </div>
    </section>
