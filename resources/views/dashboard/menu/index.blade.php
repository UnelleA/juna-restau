@extends('dashboard.app')
@section('content')
<div class="container">
   {{-- @php
        dd($categories);
   @endphp --}}
	<div class="limiter container">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead style="margin-top: -50px">
								<tr class="row100 head">
									<th class="cell100 column1">Numero</th>
									<th class="cell100 column2">Nom du met</th>
									<th class="cell100 column3">Prix Unitaire</th>
									<th class="cell100 column4">Description</th>
									<th class="cell100 column5">Image</th>
									<th class="cell100 column6">Action</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>

							<tbody style="margin-top: 50px">
                                @foreach ($mets as $met)
								<tr class="row100 body">
									<td class="cell100 column1">{{$loop->index +1}}</td>
									<td class="cell100 column2">{{$met->title}}</td>
									<td class="cell100 column3">{{$met->price}}</td>
									<td class="cell100 column4">{{$met->description}}</td>
									<td class="cell100 column5">
                                        <div class="col-8 offset-2">
                                            <img src="{{Storage::url($met->image)}}" alt="" class="mw-100">
                                        </div>
                                    </td>
									<td class="cell100 column6" style="margin-top: 50px">
                                        {{-- <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> --}}
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                              <a href="{{ route('menu.edit', $met)}}" class="btn btn-warning btn-sm micon dw dw-edit" data-toggle="tooltip" data-placement="top" title="Modifier"></a>
                                              <a href="#" class="btn btn-danger btn-sm btn-delete micon dw dw-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"></a>
                                              <form action="{{ route('menu.destroy', $met)}}" method="POST" class="delete-form">
                                                  @method('DELETE')
                                                  @csrf
                                              </form>
                                            </div>
                                    </td>
								</tr>
                                @endforeach
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
