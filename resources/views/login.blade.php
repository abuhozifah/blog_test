				@include('layouts.header')
				<div id="booking">
					<center><div id="circlebig"><div id="circle"></div></div></center>
					<div class="contact" id="contact" style="border-radius: 5%;">
						<h3 class="tittle two"><strong>Login</strong></h3>
						<div class="contact-top">
							<div class="col-md-4 col-md-offset-3 col-xs-4 col-xs-offset-3 contact-top-right" style="float: none; width: 50%;">
								<div class="row" style="background-color:rgba(0, 0, 0, 0.22);padding:5px;margin:5px;border-radius:5px;color:#fff;">
									<div class="col-md-6">
										User Test<br>
										Username: user<br>
										Password: 123123
									</div>
									<div class="col-md-6">
										Admin Test<br>
										Username: admin<br>
										Password: 123123
									</div>
								</div>
								<br>
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
									@if(isset($message))
										<div class="alert alert-danger">
											<ul style="list-style:none;">
												<li>{{ $message }}</li>
											</ul>
										</div>
									@endif
								</div>
								
								<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="text" class="form-control" name="username" placeholder="Username" value="@if(old('username')) {{ old('username') }} @else Username @endif">
									<input type="password" class="form-control" name="password" placeholder="Password" value="Password">
									<div class="sub-button col-md-12 col-xs-12">
										<center><button type="submit" class="btn btn-primary">Login</button><center>
									</div>
								</form>
							</div>
							<div class="col-md-4 col-xs-4">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				@include('layouts.footer')