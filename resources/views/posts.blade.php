				@include('layouts.header')
				<div id="booking">
					<center><div id="circlebig"><div id="circle"></div></div></center>
					<div class="contact" id="contact" style="border-radius: 5%;">
						<h3 class="tittle two"><strong>Search</strong></h3>
						<div class="contact-top">
							<div class="col-md-4 col-md-offset-3 col-xs-4 col-xs-offset-3 contact-top-right" style="float: none; width: 50%;">
								<div class="">
									@if (count($errors) > 0)
										<div class="alert alert-danger">
											<ul style="list-style:none;">
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
								</div>
								
								<form class="form-horizontal" role="form" method="POST" action="{{ url('search') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<select class="universitycourses-select" name="category">
										<option value="0">All</option>
										<option value="1">IT</option>
										<option value="2">Buisness</option>
										<option value="3">Science</option>
									</select>
									<div class="sub-button col-md-12 col-xs-12">
										<center><button type="submit" class="btn btn-primary">Search</button><center>
									</div>
								</form>
							</div>
							<div class="col-md-4 col-xs-4">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

				<div id="booking">
					<center><div id="circlebig"><div id="circle"></div></div></center>
					<div class="contact" id="contact" style="border-radius: 5%;">
						<h3 class="tittle two"><strong>Posts</strong></h3>
						<div class="gallery-bottom">
							@if (count($posts) > 0)
								@foreach ($posts as $post)
									<div class="view view-fifth" style="height: 225px;">
										<h2>
											<a href="" class="title">
												{{ $post->title }}
												<div class="mask"  style="height: 225px;">
													<a href="post/{{ $post->id }}" class="info">View</a>
												</div>
											</a>
										</h2>
									</div>
								@endforeach
							@else
								No Data
							@endif
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				@include('layouts.footer')