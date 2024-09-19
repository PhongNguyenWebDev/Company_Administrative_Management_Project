<section class="container-fluid">
    <form action="{{ route('print') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-4">
                <h4>Step 1: Select Field to be Printed on Label</h4>
                <div class="border-2 w-75">
                    <ul class="nav-item justify-content-between row">
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Asset Name</span>
                                <input type="checkbox" name="asset_name" value="1">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Asset Code</span>
                                <input type="checkbox" name="asset_code" value="2">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Date Purchased</span>
                                <input type="checkbox" name="date_purchased" value="3">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Warranty</span>
                                <input type="checkbox" name="warranty" value="4">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Vendor</span>
                                <input type="checkbox" name="vendor" value="5">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Model / Serial</span>
                                <input type="checkbox" name="model_serial" value="6">
                            </label>
                        </li>
                        <li class="nav-link d-flex justify-content-between">
                            <label>
                                <span>Location Department</span>
                                <input type="checkbox" name="loca_depart" value="7">
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <h4>Step 2: Select Print Layout</h4>
                <div class="row g-5 d-flex align-items-center justify-content-center">
                    {{-- Template 1 --}}
                    <div class="col-6 position-relative">
                        <div class="my-2 w-100 text-center border h-25 bg-white align-items-center">
                            <span><strong>Asset Details + QR Code</strong></span>
                            <p class="m-0">5 x 2</p>
                        </div>
                        <div class="row g-1 justify-content-center">
                            @for ($i = 0; $i < 10; $i++)
                                <div class="col-6 border p-0" style="height: 80px; width:48%"></div>
                            @endfor
                        </div>
                        <div class="w-100 my-3 text-center">
                            <input class="form-check-input" type="radio" id="template1" name="template"
                                value="template1" checked>
                        </div>
                        <div class="position-absolute bottom-50 rounded-3 border text-center bg-white d-flex align-items-center justify-content-center"
                            style="width: 7rem; height: 4rem; right:34% !important">
                            <h4>X10</h4>
                        </div>
                    </div>
                    {{-- Template 2 --}}
                    <div class="col-6 position-relative">
                        <div class="my-2 w-100 text-center border h-25 bg-white align-items-center">
                            <span><strong>Asset Details + QR Code</strong></span>
                            <p class="m-0">7 x 3</p>
                        </div>
                        <div class="row g-1 justify-content-center">
                            @for ($i = 0; $i < 21; $i++)
                                <div class="col-3 border p-0" style="height: 56px; width:31.5%"></div>
                            @endfor
                        </div>
                        <div class="w-100 my-3 text-center">
                            <input class="form-check-input" type="radio" id="template2" name="template"
                                value="template2">
                        </div>
                        <div class="position-absolute bottom-50 rounded-3 border text-center bg-white d-flex align-items-center justify-content-center"
                            style="width: 7rem; height: 4rem; right:34% !important">
                            <h4>X21</h4>
                        </div>
                    </div>
                    {{-- Template 3 --}}
                    <div class="col-6 position-relative">
                        <div class="my-2 w-100 text-center border h-25 bg-white align-items-center">
                            <span><strong>Asset Details + QR Code</strong></span>
                            <p class="m-0">8 x 3</p>
                        </div>
                        <div class="row g-1 justify-content-center">
                            @for ($i = 0; $i < 24; $i++)
                                <div class="col-3 border p-0" style="height: 56px; width:31.5%"></div>
                            @endfor
                        </div>
                        <div class="w-100 my-3 text-center">
                            <input class="form-check-input" type="radio" id="template3" name="template"
                                value="template3">
                        </div>
                        <div class="position-absolute bottom-50 rounded-3 border text-center bg-white d-flex align-items-center justify-content-center"
                            style="width: 7rem; height: 4rem; right:34% !important">
                            <h4>X24</h4>
                        </div>
                    </div>
                    {{-- Template 4 --}}
                    <div class="col-6 position-relative">
                        <div class="my-2 w-100 text-center border h-25 bg-white align-items-center">
                            <span><strong>Asset Details + QR Code</strong></span>
                            <p class="m-0">8 x 5</p>
                        </div>
                        <div class="row g-1 justify-content-center">
                            @for ($i = 0; $i < 40; $i++)
                                <div class="col-2 border p-0" style="height: 56px; width:20%"></div>
                            @endfor
                        </div>
                        <div class="w-100 my-3 text-center">
                            <input class="form-check-input" type="radio" id="template4" name="template"
                                value="template4">
                        </div>
                        <div class="position-absolute bottom-50 rounded-3 border text-center bg-white d-flex align-items-center justify-content-center"
                            style="width: 7rem; height: 4rem; right:34% !important">
                            <h4>X40</h4>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary ms-3" id="print-now">Print Now</button>
            </div>
        </div>
    </form>
</section>
