@extends('layout.app')

@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden;
                font-size: 9px;
            }

            svg {
                width: 60px;
                height: 60px;
            }

            .printable-area,
            .printable-area * {
                width: 800px;
                padding: 0;
                margin: 0;
                font-size: 9px;
                visibility: visible;
            }

            /* Ẩn các phần tử không cần thiết */
            .no-print {
                display: none;
                visibility: hidden;
            }
        }
    </style>

    <section class="container my-3 py-3 printable-area">
        <!-- Nội dung mà bạn muốn in -->
        <div class="col-12">
            <div class="row g-1 justify-content-center">
                {{-- template 1 --}}
                @if ($selectedFields['template'] === 'template1')
                    @for ($i = 0; $i < 10; $i++)
                        @if (isset($assetsData[$i]))
                            <div class="col-6 g-2 border p-0 bg-white h-100 mx-1" style="width:48%; position: relative;">
                                <div class="p-2 fs-6">
                                    <p class="m-0">
                                        <strong>
                                            Property of Apps Cyclone Co., LTD
                                        </strong>
                                    </p>
                                    @if (isset($assetsData[$i]['asset_name']))
                                        <p class="m-0">Asset Name: {{ $assetsData[$i]['asset_name'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['asset_code']))
                                        <p class="m-0">Asset Code: {{ $assetsData[$i]['asset_code'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['date_purchased']))
                                        <p class="m-0">Data Purchased: {{ $assetsData[$i]['date_purchased'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['warranty']))
                                        <p class="m-0">Warranty: {{ $assetsData[$i]['warranty'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['vendor']))
                                        <p class="m-0">Vendor: {{ $assetsData[$i]['vendor'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['model_serial']))
                                        <p class="m-0">Model/Serial: {{ $assetsData[$i]['model_serial'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['loca_depart']))
                                        <p class="m-0">Location/Department: {{ $assetsData[$i]['loca_depart'] }}</p>
                                    @endif
                                    <div class="position-absolute" style="top:7%; transform: translateX(-50%); left:83%">
                                        {!! $qrCode !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endif

                {{-- template 2 --}}
                @if ($selectedFields['template'] === 'template2')
                    @for ($i = 0; $i < 21; $i++)
                        @if (isset($assetsData[$i]))
                            <div class="col-6 g-2 border p-0 bg-white h-100 mx-1" style="width:31.5%; position: relative;">
                                <div class="p-2 fs-6">
                                    <p class="m-0">
                                        <strong>
                                            Property of Apps Cyclone Co., LTD
                                        </strong>
                                    </p>
                                    @if (isset($assetsData[$i]['asset_name']))
                                        <p class="m-0">Asset Name: {{ $assetsData[$i]['asset_name'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['asset_code']))
                                        <p class="m-0">Asset Code: {{ $assetsData[$i]['asset_code'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['date_purchased']))
                                        <p class="m-0">Data Purchased: {{ $assetsData[$i]['date_purchased'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['warranty']))
                                        <p class="m-0">Warranty: {{ $assetsData[$i]['warranty'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['vendor']))
                                        <p class="m-0">Vendor: {{ $assetsData[$i]['vendor'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['model_serial']))
                                        <p class="m-0">Model/Serial: {{ $assetsData[$i]['model_serial'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['loca_depart']))
                                        <p class="m-0">Location/Department: {{ $assetsData[$i]['loca_depart'] }}</p>
                                    @endif
                                    <div class="position-absolute" style="top:7%; transform: translateX(-50%); left:83%">
                                        {!! $qrCode !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endif
                {{-- template 3 --}}
                @if ($selectedFields['template'] === 'template3')
                    @for ($i = 0; $i < 24; $i++)
                        @if (isset($assetsData[$i]))
                            <div class="col-3 g-2 border p-0 bg-white h-100 mx-1" style="width:31.5%; position: relative;">
                                <div class="p-2 fs-6">
                                    <p class="m-0">
                                        <strong>
                                            Property of Apps Cyclone Co., LTD
                                        </strong>
                                    </p>
                                    @if (isset($assetsData[$i]['asset_name']))
                                        <p class="m-0">Asset Name: {{ $assetsData[$i]['asset_name'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['asset_code']))
                                        <p class="m-0">Asset Code: {{ $assetsData[$i]['asset_code'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['date_purchased']))
                                        <p class="m-0">Data Purchased: {{ $assetsData[$i]['date_purchased'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['warranty']))
                                        <p class="m-0">Warranty: {{ $assetsData[$i]['warranty'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['vendor']))
                                        <p class="m-0">Vendor: {{ $assetsData[$i]['vendor'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['model_serial']))
                                        <p class="m-0">Model/Serial: {{ $assetsData[$i]['model_serial'] }}</p>
                                    @endif
                                    @if (isset($assetsData[$i]['loca_depart']))
                                        <p class="m-0">Location/Department: {{ $assetsData[$i]['loca_depart'] }}</p>
                                    @endif
                                    <div class="position-absolute" style="top:7%; transform: translateX(-50%); left:83%">
                                        {!! $qrCode !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endif
                {{-- template 4 --}}
                @if ($selectedFields['template'] === 'template4')
                    @for ($i = 0; $i < 40; $i++)
                        @if (isset($assetsData[$i]))
                            <div class="col-2 g-2 border p-0 bg-white h-100 mx-1" style="width:20%; position: relative;">
                                <div class="p-2 fs-6">
                                    <div class="position-absolute" style="top:35%; transform: translateX(-50%); left:80%">
                                        {!! $qrCode !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endif
            </div>
        </div>

        <div class="d-flex text-center justify-content-center my-4 no-print">
            <button class="btn btn-primary no-print" id="print-button">PRINT</button>
        </div>
    </section>
    <!-- Phần URL sẽ bị ẩn khi in -->
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });
    </script>
@endsection
