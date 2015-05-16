<section id="{{$title}}">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
                <h2 class="section-heading">
					@if (isset ($display_name))
						{{$display_name}}
					@endif
				</h2>
                <h3 class="section-subheading text-muted">
					@if (isset ($description))
						{{$description}}
					@endif
				</h3>
            </div>

		<div class="row">
			<div class="col-lg-12">
				@if (isset($html))
				{{$html}}
				@endif
			</div>
		</div>
	</div>
</section>
