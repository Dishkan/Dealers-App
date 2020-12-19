@if ($dealers)
<div class="container">
        <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My User ID is <b>{{ $user_id }} </b>
                    </div>                   
					<div class="panel-heading">
                        Current Dealers 
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead >
                                <th>Name</th>
								<th>Country</th>
								<th>State</th>
								<th>City</th>
								<th>Zip</th>
								<th>User ID</th>
                            </thead>
                            <tbody >
                                @foreach ($dealers as $dealer)
                                    <tr>
                                        <td class="table-text"><div>{{ $dealer->name }}</div></td>
                                        <td class="table-text"><div>{{ $dealer->country }}</div></td>
                                        <td class="table-text"><div>{{ $dealer->state }}</div></td>
                                        <td class="table-text"><div>{{ $dealer->city }}</div></td>
                                        <td class="table-text"><div>{{ $dealer->zip }}</div></td>
                                        <td style="text-align:center;" class="table-text"><div>{{ $dealer->user_id }}</div></td>
                                        <td>
										<a href="{{ route('main.edit', $dealer->id) }}">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-btn fa-edit"></i> Edit
                                                </button>
										</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('main.destroy',$dealer->id) }}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">			
                                {{ method_field('DELETE') }}

                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
								<tr>
                                        <td>
                                        <a href="{{ route('main.create') }}">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-create"></i> Add a dealer
                                                </button>
										</a>
                                        </td>
								</tr>  								
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endif