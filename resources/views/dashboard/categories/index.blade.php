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
									<th class="cell100 column2">Nom de la categorie</th>
									<th class="cell100 column3">Image de la categorie</th>
									<th class="cell100 column4">Action</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>

							<tbody style="margin-top: 50px">
                                @foreach ($categories as $category)
								<tr class="row100 body">
									<td class="cell100 column1">{{$loop->index +1}}</td>
									<td class="cell100 column2">{{$category->name}}</td>
									<td class="cell100 column3">
                                        <img src="{{Storage::url($category->image)}}" alt="" class="rounded" style="height: 50px; width: 50px">
                                    </div>
                                </td>
                                <div class="col-8 offset-2">
									<td class="cell100 column4" style="margin-top: 50px">
                                        {{-- <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"> --}}
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                              <a href="{{ route('categories.edit', $category)}}"
                                               class="btn btn-warning btn-sm btn-sm micon dw dw-edit" data-toggle="tooltip" data-placement="top" title="Modifier"></a>
                                              <a href="#" class="btn btn-danger btn-sm btn-delete btn-sm micon dw dw-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"></a>
                                              <form action="{{ route('categories.destroy', $category)}}" method="POST" class="delete-form">
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
