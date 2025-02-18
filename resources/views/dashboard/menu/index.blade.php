@extends('dashboard.app')
@section('content')
    <div class="card-box mb-30">
        <div class="pd-20 table-responsive">
            <h4 class="text-blue" style="text-align: center">Liste des mets.</h4>
        </div>
        <div class="pb-20">
            <table class=" table hover multiple-select-row data-export nowrap">
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">Numero</th>
                        <th class="cell100 column2">Nom du met</th>
                        <th class="cell100 column3">Prix Unitaire</th>
                        <th class="cell100 column4">Description</th>
                        <th class="cell100 column5">Image</th>
                        <th class="cell100 column6">Action</th>
                        <th class="cell100 column7">categories</th>

                    </tr>
                </thead>
                    <tbody>
                        @foreach ($mets as $met)
                        <tr class="row100 body">
                            <td class="cell100 column1">{{$loop->index +1}}</td>
                            <td class="cell100 column2">{{$met->title}}</td>
                            <td class="cell100 column3">{{$met->price}}</td>
                            <td class="cell100 column4">{{$met->description}}</td>
                            <td class="cell100 column5">
                                <div class="col-8 offset-2">
                                    <img src="{{Storage::url($met->image)}}" alt="" class="rounded img-fluid" style=" width: auto; height: auto;">
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
                            <td class="cell100 column7">{{ $met->category->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>


@endsection
