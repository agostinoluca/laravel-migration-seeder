@extends('layouts.app')

<title>@yield('pagetitle', 'Trenilania | partenze di oggi')</title>

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            @if ($trainsToday->isEmpty())
                <div class="text-center mt-5">
                    <h1 class="my-3"> Oops... &#x1F625; </h1>
                    <h2 class="mt-5">Nessun viaggio in programma oggi.</h2>
                </div>
            @else
                {{-- itero per recuperare i dati filtrati della tabella trains --}}
                @foreach ($trainsToday as $train)
                    <div class="col-12 col-xxl-auto p-2 mx-auto">
                        <div class="card h-100">
                            {{-- stampo dei dati in pagina aggiungendo una classe con il ternario --}}
                            <div
                                class="bg-secondary p-3 {{ $train->company === 'Italo' ? 'text-danger bg-secondary bg-opacity-25' : 'bg-success text-light' }}">
                                <h5> {{ $train->company }} </h5>
                            </div>
                            <div class="p-3 text-center">
                                <div class="row">
                                    <div class="col">
                                        <span>DATA DEL VIAGGIO:</span>
                                        <h6>{{ $train->travel_date }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>TIPOLOGIA TRENO:</span>
                                        <h6>{{ $train->train_type }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>IDENTIFICATIVO TRENO:</span>
                                        <h6>{{ $train->train_code }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>NUMERO CARROZZE:</span>
                                        <h6>{{ $train->number_of_carriages }}</h6>
                                    </div>
                                </div>
                                {{-- /.row data del viaggio e info sul treno --}}
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <span>STAZIONE DI PARTENZA:</span>
                                        <h6>{{ $train->departure_station }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>STAZIONE DI ARRIVO:</span>
                                        <h6>{{ $train->arrival_station }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>ORA DI PARTENZA:</span>
                                        @if ($train->departure_time == null)
                                            <h6 class="text-danger">NON DISPONIBILE</h6>
                                        @endif
                                        <h6>{{ $train->departure_time }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>ORA DI ARRIVO:</span>
                                        @if ($train->arrival_time == null)
                                            <h6 class="text-danger">NON DISPONIBILE</h6>
                                        @endif
                                        <h6>{{ $train->arrival_time }}</h6>
                                    </div>
                                </div>
                                {{-- /row arrivo-partenza stazione e orari --}}
                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <span>PREZZO BIGLIETTO INTERO:</span>
                                        <h6>{{ $train->ticket_price }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>PREZZO BIGLIETTO RIDOTTO:</span>
                                        <h6>{{ $train->reduced_ticket_price }}</h6>
                                    </div>
                                    <div class="col">
                                        <span>BIGLIETTI DISPONIBILI:</span>
                                        <h6>{{ $train->available_seats }}</h6>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <span>PUNTUALE:</span>
                                            @if ($train->on_time)
                                                <strong class="text-success">SI</strong>
                                            @else
                                                <strong class="text-danger">IN RITARDO</strong>
                                            @endif

                                        </div>
                                        <div>
                                            <span>ANNULLATO:</span>
                                            @if ($train->cancelled)
                                                <strong class="text-danger">SI</strong>
                                            @else
                                                <strong>NO</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- /.row info sui biglietti e informazioni sullo stato del viaggio --}}
                                <hr>
                            </div>
                            <div class="text-center p-2">
                                <h6>INFO:</h6>
                                <span>
                                    {{ $train->additional_information }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
