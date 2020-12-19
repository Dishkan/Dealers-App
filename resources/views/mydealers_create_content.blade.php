<div class="container">
                <div class="panel-heading">
                  {{ isset($dealer->id) ? 'Edit dealer'  : 'New dealer' }}
                </div>
				
                <div class="panel-default">
                @include('errors')
<form action="{{(isset($dealer->id)) ? route('main.update', $dealer->id) : route('main.store')}}" method="POST" class="form-horizontal">
					
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       {{ (isset($dealer->id)) ? method_field('PUT') : '' }}
                        <table class="table table-striped task-table">

                            <tbody>
                                    <tr>
                  <td class="table-text"><div>
<input type="text" name="name" id="task-name" class="form-control" 
value="{{ isset($dealer->name) ? $dealer->name  : old('name') }}" placeholder="Name">
	               </div>
				   </td>
                     <td class="table-text"><div>Name</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="country" id="task-name" class="form-control"
value="{{ isset($dealer->country) ? $dealer->country  : old('country') }}" placeholder="Country">
	               </div>
				   </td>
                                        <td class="table-text"><div>Country</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="state" id="task-name" class="form-control"
value="{{ isset($dealer->state) ? $dealer->state  : old('state') }}" placeholder="State">
	               </div>
				   </td>
                                        <td class="table-text"><div>State</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="city" id="task-name" class="form-control"
value="{{ isset($dealer->city) ? $dealer->city  : old('state') }}" placeholder="City">
	               </div>
				   </td>
                                        <td class="table-text"><div>City</div></td>
                                    </tr>                       
									<tr>
                  <td class="table-text"><div>
                <input type="text" name="zip" id="task-name" class="form-control"
value="{{ isset($dealer->zip) ? $dealer->zip  : old('zip') }}" placeholder="Zip">
	               </div>
				   </td>
                                        <td class="table-text"><div>Zip</div></td>
                                    </tr>
                            </tbody>
                        </table>
						 <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> 
                  {{ isset($dealer->id) ? 'Change it'  : 'Add a dealer' }}
                                </button>
                            </div>
                        </div>
                    </form>
							 <div>
                             <a href="{{ route('main.index') }}">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-btn fa-create"></i> Back
                                                </button>
										</a>
                            </div>
                </div>
            </div>