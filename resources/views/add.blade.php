				@include('layouts.header')
				<div id="booking">
					<center><div id="circlebig"><div id="circle"></div></div></center>
					<div class="contact" id="contact" style="border-radius: 5%;">
						<h3 class="tittle two"><strong>Add</strong></h3>
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
									@if(isset($message))
										<div class="alert alert-danger">
											<ul style="list-style:none;">
												<li>{{ $message }}</li>
											</ul>
										</div>
									@endif
								</div>
								
								<form class="form-horizontal" role="form" method="POST" action="{{ url('add') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="text" class="form-control" name="title" placeholder="Title" value="@if(old('title')) {{ old('title') }} @else Title @endif">
									<textarea class="form-control" name="body" placeholder="Body">@if(old('body')) {{ old('body') }} @else Body @endif</textarea>
									<select class="universitycourses-select" name="category">
										<option value="1">IT</option>
										<option value="2">Buisness</option>
										<option value="3">Science</option>
									</select>
									<div class="sub-button col-md-12 col-xs-12">
										<center><button type="submit" class="btn btn-primary">Add</button><center>
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