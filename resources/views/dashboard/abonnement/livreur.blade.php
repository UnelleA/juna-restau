@extends('dashboard.app')
@section('content')
<div>
    <div class="container">

<div class="limiter container">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110">
                <div class="table100-head">
                    <table>
                        <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Numero</th>
                                <th class="cell100 column2">Nom de la Compagnie</th>
                                <th class="cell100 column3">Status</th>
                                <th class="cell100 column4">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="table100-body js-pscroll">
                    <table>

                        <tbody>
                            @foreach ($companies as $company)

                              <tr class="row100 body">
                                <td class="cell100 column1">{{$loop->index +1}}</td>
                                <td class="cell100 column2">{{$company->name}}</td>
                                <td class="cell100 column3">
                                    @if ($company->status==1)
                                    <span class="text-success font-weight-bold">Activé</span>

                                    @else
                                    <span class="text-danger font-weight-bold">Désactivé</span>

                                    @endif
                                            </td>
                                <td class="cell100 column4">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                    @if ($company->status ==0)
                                        <form action="{{route('activation')}}" method="POST">
                                            @csrf
                                        <input type="hidden" value="{{$company->id}}" name="company">

                                            <input type="submit" class="btn btn-success" value="Activer">
                                        </form>
                                    @else
                                    <form action="{{route('desactivation')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$company->id}}" name="company">
                                        <input type="submit" class="btn btn-danger" value="Désactiver">
                                    </form>
                                    @endif
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
</div>
@endsection
