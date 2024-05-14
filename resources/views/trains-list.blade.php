@extends('layouts.main')

@section('content')
    <h1 class="text-center my-4">I treni disponibili</h1>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Codice treno</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Stazione di arrivo</th>
                    <th scope="col">Orario di partenza</th>
                    <th scope="col">Orario di arrivo</th>
                    <th scope="col">Carrozze</th>
                    <th scope="col">Partenza prevista</th>
                    <th scope="col">Cancellato</th>
                    <th scope="col">Descrizione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->id }}</td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->code }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->wagons }}</td>

                        @if ($train->is_on_time)
                            <td>{{ $train->departure_time }}</td>
                        @else
                            <td class="fw-bold">Ritardo</td>
                        @endif

                        @if (!$train->is_cancelled)
                            <td>-</td>
                        @else
                            <td class="fw-bold">Cancellato</td>
                        @endif

                        <td>{{ $train->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $trains->links() }}
        </div>
    </div>
@endsection

@section('title')
    I treni
@endsection
