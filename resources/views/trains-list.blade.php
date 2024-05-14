@extends('layouts.main')

@section('content')
    <h1>I treni disponibili</h1>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Codice treno</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Stazione di arrivo</th>
                    <th scope="col">Orario di partenza</th>
                    <th scope="col">Orario di arrivo</th>
                    <th scope="col">Carrozze</th>
                    <th scope="col">In orario</th>
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
                        <td>{{ $train->is_on_time }}</td>
                        <td>{{ $train->is_cancelled }}</td>
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
