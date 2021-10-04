<div class="container-fluid pb-4">
    <div class="m-3 px-3 rounded" style="background-color: #6A89B7;">
        <h4 class="py-1 text-white">Dashboard</h4>
    </div>
    <div class="row px-3">
        <div class="col">
            <select class="form-select" id="select_sbu">
                <option selected disabled value="">Select SBU</option>
                <option value="ALL">ALL</option>
                <option value="AIC">AIC</option>
                <option value="EXERGY">EXERGY</option>
                <option value="GILI">GILI</option>
                <option value="PNKC">PNKC</option>
                <option value="MANNVITS">MANNVITS</option>
                <option value="CLDI">CLDI</option>
                <option value="SUKIKO">SUKIKO</option>
            </select>
        </div>
    </div>
    <div class="row mx-3 mt-2 rounded justify-content-center ">
        <div class="row gx-1">
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="working_items">
                    <p class="text-center text-white pt-2 m-0">WORKING</p>
                    <h2 class="text-white text-center" id="working"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="missing_items">
                    <p class="text-center text-white pt-2 m-0">MISSING</p>
                    <h2 class="text-white text-center" id="missing"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 ">
                <div class="rounded-3 border shadow-sm" id="dispose_items">
                    <p class="text-center text-white pt-2 m-0">FOR DISPOSE</p>
                    <h2 class="text-white text-center" id="dispose"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="damage_items">
                    <p class="text-center text-white pt-2 m-0">DAMAGE/DEFECTIVE</p>
                    <h2 class="text-white text-center" id="damage_or_defective"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="available_spare_items">
                    <p class="text-center text-white pt-2 m-0">SPARE DEVICES</p>
                    <h2 class="text-white text-center" id="spare_devices_avail"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="available_spare_items">
                    <p class="text-center text-white pt-2 m-0">TOTAL DEVICES</p>
                    <h2 class="text-white text-center" id="totaldevices"></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 mx-3 mt-1">
        <div class="col-lg-6 col-md-12">
            <div class="p-3 rounded shadow-sm bg-light h-100 table-responsive">
                <div class="text-center pt-3 g-5 ">TABLE ASSET STATUS INTERPRETATION</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>TYPE</th>
                            <th>WORKING</th>
                            <th>MISSING</th>
                            <th>DISPOSE</th>
                            <th>DAMAGE/DEFECTIVE</th>
                            <th>SPARE DEVICES/AVAILABLE</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="table_assets">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="p-3 rounded shadow-sm bg-light h-100">
                <div class="text-center pt-3">GRAPH ASSET STATUS INTERPRETATION</div>
                <canvas id="myChartAssets"></canvas>
            </div>
        </div>
    </div>
    <div class="my-2 d-flex mt-3 justify-content-center">
        <hr style="width: 90%;"/>
    </div>
    <div class="row mx-3 mt-2 rounded justify-content-center ">
        <div class="row gx-1">
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="working_items">
                    <p class="text-center text-white pt-2 m-0">WORKING</p>
                    <h2 class="text-white text-center" id="working_pheripherals"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="missing_items">
                    <p class="text-center text-white pt-2 m-0">MISSING</p>
                    <h2 class="text-white text-center" id="missing_pheripherals"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="dispose_items">
                    <p class="text-center text-white pt-2 m-0">FOR DISPOSE</p>
                    <h2 class="text-white text-center" id="dispose_pheripherals"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="damage_items">
                    <p class="text-center text-white pt-2 m-0">DAMAGE/DEFECTIVE</p>
                    <h2 class="text-white text-center" id="damage_or_defective_pheripherals"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 ">
                <div class="rounded-3 border shadow-sm" id="available_spare_items">
                    <p class="text-center text-white pt-2 m-0">SPARE DEVICES</p>
                    <h2 class="text-white text-center" id="spare_devices_avail_pheripherals"></h2>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="rounded-3 border shadow-sm" id="available_spare_items">
                    <p class="text-center text-white pt-2 m-0">TOTAL DEVICES</p>
                    <h2 class="text-white text-center" id="totaldevicespheripherals"></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 mx-3 mt-1">
        <div class="col-lg-6 col-md-12">
            <div class="p-3 rounded shadow-sm bg-light h-100 table-responsive">
                <div class="text-center pt-3 g-5">TABLE ASSET STATUS INTERPRETATION</div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>TYPE</th>
                            <th>WORKING</th>
                            <th>MISSING</th>
                            <th>DISPOSE</th>
                            <th>DAMAGE/DEFECTIVE</th>
                            <th>SPARE DEVICES/AVAILABLE</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="table_assets_pheripherals">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="p-3 rounded shadow-sm bg-light h-100">
                <div class="text-center pt-3">GRAPH ASSET STATUS INTERPRETATION(Pheripherals)</div>
                <canvas id="myChartPheripherals"></canvas>
            </div>
        </div>
    </div>
    
</div>
<script>
$(function(){

    dashboard_assets_status();
    dashboard_assets_status_pheripherals();
    mychartsAssets();
    mychartsPheripherals();
    sumOfMainDevices();
    sumOfPheripheralDevices();
});
$(document).ready(function()
    {
    $("select#select_sbu").change(function () {
        var select_sbu = $('#select_sbu option:selected').val();
        dashboard_assets_status();
        dashboard_assets_status_pheripherals();
        sumOfMainDevices();
        sumOfPheripheralDevices();
    
    });
})
    


</script>

