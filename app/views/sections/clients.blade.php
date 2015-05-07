	<aside class="clients">
        <div class="container">
            <div class="row">
				@if (isset($clients))
				@foreach ($clients as $client)
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="assets/{{$client['image']}}" 
						class="img-responsive img-centered" alt="">
                    </a>
                </div>
				@endforeach
				@endif
            </div>
        </div>
    </aside>
