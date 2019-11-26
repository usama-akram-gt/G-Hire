@extends('layouts/POmaster')


@section('body')
	<!-- Messages -->
	<div class="row">
					<!-- Messages -->
					<div style="margin-left: 2%;">
						<h1>Messages</h1>
						<div class="nav-tabs-responsive">
							<ul class="nav nav-tabs nav-tabs-highlight flex-nowrap mb-0">
							@php
								$checking_duplicates = array();	
							@endphp
							@for ($i = 0; $i < count($users); $i++)
								@foreach($users[$i] as $user)
									@if(!in_array($user->email, $checking_duplicates, TRUE))								
										<li class="nav-item">
											<a href="#{{ $user->id , '' }}" class="nav-link @if($i === 0){{ 'active','' }}@endif show" data-toggle="tab">
												<img src="/global_assets/images/placeholders/placeholder.jpg" alt="" class="rounded-circle mr-2" width="20" height="20">
												{{ $user->fname . ' ' . $user->lname , '' }}
												@for ($j = $i; $j < count($contacts); $j++)
													@foreach($contacts[$j] as $contact)
														@if($contact->unread_count != 0)
															<span class="badge bg-success align-self-start ml-3">{{ $contact->unread_count,'' }}</span>
														@endif
														@break;
													@endforeach
													@break;
												@endfor		
											</a>		
										</li>
									@endif
									@php
										$checking_duplicates[] = $user->email;	
									@endphp
								@endforeach
							@endfor
							</ul>
						</div>

						<div class="tab-content card card-body border-top-0 rounded-0 rounded-bottom mb-0">
							@php
								$checking_duplicates = array();	
							@endphp
							@for ($i = 0; $i < count($users); $i++)
								@foreach($users[$i] as $user)
									<div class="tab-pane fade @if($i === 0){{ 'active','' }}@endif show" id="{{ $user->id,'' }}">
										@if(!in_array($user->email, $checking_duplicates, TRUE))
										<div style="overflow-y: auto; height: 300px; width:1250px; float: left;">								
											<ul id="chat_list" class="media-list media-chat mb-3">
												@for ($j = 0; $j < count($messages); $j++)
													@foreach($messages[$j] as $message)
														@if($message->to === Auth::user()->id)
															<li class="media">
																<div class="mr-3">
																	<a href="#">
																		<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
																	</a>
																</div>
						
																<div class="media-body">
																	<div class="media-chat-item">{{ $message->text, '' }}</div>
																	<div class="font-size-sm text-muted mt-2">{{ $message->created_at, ''}} <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
																</div>
															</li>
														@else
															@php
																$contact_id = $message->to;	
															@endphp	
															<li class="media media-chat-item-reverse">
																<div class="media-body">
																	<div class="media-chat-item">{{ $message->text, '' }}</div>
																	<div class="font-size-sm text-muted mt-2">{{ $message->created_at, '' }} <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
																</div>
						
																<div class="ml-3">
																	<a href="#">
																		<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
																	</a>
																</div>
															</li>
														@endif	
													@endforeach
												@endfor														
											</ul>
										</div>
										@endif
										<form id="sendmessage" method="POST" data-route="{{ route('sendMessage') }}">
											@csrf	
											<textarea id="text" name="text" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>
											<input id="contact_id" name="contact_id" value="{{ $contact_id }}" hidden/>
											<div class="d-flex align-items-center">
												<div class="list-icons list-icons-extended">
													<a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send photo"><i class="icon-file-picture"></i></a>
													<a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send video"><i class="icon-file-video"></i></a>
													<a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send file"><i class="icon-file-plus"></i></a>
												</div>
			
												<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Send</button>
											</div>
										</form>	
									</div>
									@php
										$checking_duplicates[] = $user->email;	
									@endphp	
								@endforeach
							@endfor		
						</div>
					</div>
					<!-- /Messages -->
	</div>
	<!-- /Messages -->
@endsection