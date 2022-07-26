<footer class="ftco-footer bg-bottom" id="footer">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">About Myanmar</h2>
					<p>Myanmar was such an incredibly beautiful country.It is an unexplored natural and cultural wonder.The natural attractions include caves, corals, lakes, rivers, beaches, islands, and mountains, whilst the connoisseur of culture and history will find pagodas, an array of vibrant festivals, 135 tribes and a spread of delicious cuisine to tantalise their taste buds.</p>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Popular Destinations</h2>
					<ul class="list-unstyled">
						<li>
							@foreach($popularDestinations as $index => $popularDestination)
                            @if($index <4 )
							<p><a href="{{route('destination.detail',$popularDestination->id)}}">
								{{ $popularDestination->name }}</a></p>
                            @endif
							@endforeach
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">122/124 1F, 4th Quarter, Botahtaung Pagoda Rd, Yangon</span></li>
								<li><span class="icon icon-phone"></span><span class="text">+95 1 203853</span></li>
								<li><span class="icon icon-envelope"></span><span class="text">goldenland.travelagency@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Developed by Seattle Consulting Myanmar Internship Group (2020 batch) during covid-19 pandemic</i>
					</p>
				</div>
			</div>
		</div>
	</footer>
