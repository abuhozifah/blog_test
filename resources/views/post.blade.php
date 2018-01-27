				@include('layouts.header')
				<div id="booking">
					<center><div id="circlebig"><div id="circle"></div></div></center>
					<div class="contact" id="contact" style="border-radius: 5%;">
						<h3 class="tittle two"><strong>Post</strong></h3>
						<div class="contact-top">
							<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 contact-top-right" style="float: none; width: 85%;">
								@if (count($post) > 0)
									<div class="post">
										Username: <h4><center>{{ $post->username }}</center></h4>
										<br>
										Title: <h2><center>{{ $post->title }}</center></h2>
										<br>
										Body: <h3><p style="text-align: justify;">{{ $post->body }}</p></h3>
									</div>
								@endif
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="contact-top">
							<div class="col-md-4 col-md-offset-3 col-xs-4 col-xs-offset-3 contact-top-right" style="float: none; width: 50%;">
								@if (!session('id'))
									<center><h3>Login to leave a comment</h3></center>
								@else
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
									@if(session('message'))
										<div class="alert alert-danger">
											<ul style="list-style:none;">
												<li>{{ session('message') }}</li>
											</ul>
										</div>
									@endif
								</div>
								
								<form class="form-horizontal" role="form" method="POST" action="{{ url('comment') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="post" value="{{ $post->id }}">
									<textarea class="form-control" name="body" placeholder="Body">@if(old('body')) {{ old('body') }} @else Body @endif</textarea>
									<div class="sub-button col-md-12 col-xs-12">
										<center><button type="submit" class="btn btn-primary">Comment</button><center>
									</div>
								</form>
								@endif
							</div>
							<div class="col-md-4 col-xs-4">
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class="contact-top">
							<div class="col-md-4 col-md-offset-3 col-xs-4 col-xs-offset-3 contact-top-right" style="float: none; width: 50%;">
								@foreach ($comments as $comment)
									<div class="post">
										Username: <h4><center>{{ $comment->username }}</center></h4>
										Body: <h3><p style="text-align: justify;">{{ $comment->body }}</p></h3>
									</div>
								@endforeach
							</div>
							<div class="col-md-4 col-xs-4">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				@include('layouts.footer')