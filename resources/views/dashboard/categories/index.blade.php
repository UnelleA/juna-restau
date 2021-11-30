@extends('dashboard.app')
@section('content')
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue" style="text-align: center">Liste des categories.</h4>
        </div>
        <div class="pb-20 table-responsive">
            <table class="table hover multiple-select-row nowrap">
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">Numero</th>
                        <th class="cell100 column2">Nom de la categorie</th>
                        <th class="cell100 column3">Image de la categorie</th>
                        <th class="cell100 column4">Action</th>
                        <th class="cell100 column5">ID</th>

                    </tr>
                </thead>
                    <tbody>
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
                            <td class="cell100 column5">{{$category->id}}</td>

                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
