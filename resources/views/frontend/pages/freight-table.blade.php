@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || FREIGHT TABLE PAGE')
@section('content')
    <div class="container">
        <h1 class="common_heading"> FREIGHT TABLE</h1>
        <div class="inner_nav ">
            <ul class="why_menu custom_tab">


                <li><a href="{{ asset('/how-to-buy') }}">How to Buy</a></li>
                <li><a href="{{ asset('/faq') }}">FAQ</a></li>
                <li class="hidden-md hidden-sm"><a href="{{ asset('/freight-table') }}" class="active">FREIGHT TABLE</a></li>
                <li><a href="{{ asset('/vehicle-inquiry') }}">Vehicle Inquiry</a></li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="margin_bottom_20">MH provides you with an estimated freight cost, particularly from Yokohama, Japan. The
            total amount can be calculated using the two charts provided: multiplying the Cubic Meter (m3) of the Car Size
            by
            the Shipping Rate determines the freight.</div>


        <!-- Blade View -->
        <table class="table table-responsive table-bordered table-striped table-freight">
            <tbody>
                <tr>
                    <th>Country</th>
                    <th>Port</th>
                    <th>0-14 m3</th>
                    <th>14-20 m3</th>
                    <th>Container Rate</th>
                    <th>Frequency<br><span>RORO</span><br><span>Container</span></th>
                    <th>Ship Time<br><span>RORO</span><br><span>Container</span></th>
                </tr>
                @foreach ($freights as $continent => $continentFreights)
                    <tr>
                        <th colspan="7" style="background: #666666;">{{ $continent }}</th>
                    </tr>
                    @foreach ($continentFreights as $freight)
                        <tr>
                            <td>{{ $freight->country->name }}</td>
                            <td>{{ $freight->port }}</td>
                            @foreach ($freight->volume_range as $volume)
                                <td>{{ $volume }}</td>
                            @endforeach

                            <td>{!! implode('<br/>', $freight->container_rate) !!}</td>
                            <td>{!! implode('<br/>', $freight->frequency) !!}</td>
                            <td>{!! implode('<br/>', $freight->ship_time) !!}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
