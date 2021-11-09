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
							<thead>
								<tr class="row100 head">
                                    <th class="cell100 column1">Num cmd</th>
                                    <th class="cell100 column2">Date cmd</th>
                                    <th class="cell100 column3">Nom du client</th>
                                    <th class="cell100 column4">Contact du client</th>
                                    <th class="cell100 column5">Lieu de livraison</th>
									<th class="cell100 column8">Nom du met</th>
									<th class="cell100 column9">Prix Unitaire</th>
                                    <th class="cell100 column6">Quantité du mets</th>
                                    <th class="cell100 column7">Montant</th>
									<th class="cell100 column10">Action</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>

							<tbody>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
