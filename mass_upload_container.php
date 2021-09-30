<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">
        <h4 class="py-1 text-white">Upload</h4>
    </div>
    <div class="row mx-3 mt-2">
        <form id="upload_csv" class=" d-flex justify-content-center" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <input type="file" name="assets_file" id="uploaded_file" class="form-control bg-white shadow-sm">
                <button class="btn btn-primary" type="button" onclick="upload_file()"><i class='bx bx-download'></i></button>
            </div>
        </form>
    </div>
    <div class="row" >
        <div class="col" >
            <div class="text-nowrap rounded bg-white mx-3" style="overflow: auto;" id="assetsection">
                <table class="table table-default border table-bordered table-hover table-scroll rounded" cellspacing="0" >
                <thead class="shadow-sm" style="background-color: #6A89B7;">
                    <tr>
                    <th scope="col" class="text-start">#</th>
                    <th scope="col" class="fs-6">Asset Tag</th>
                    <th scope="col" class="fs-6">Item Name</th>
                    <th scope="col" class="fs-6">Description</th>
                    <th scope="col" class="fs-6">Serial No.</th>    
                    <th scope="col" class="fs-6">Price</th>
                    <th scope="col" class="fs-6 dropdown">SBU</th>
                    <th scope="col" class="fs-6">Date Puchase</th>
                    <th scope="col" class="fs-6">OS Installed</th>
                    <th scope="col" class="fs-6">MS Office</th>
                    <th scope="col" class="fs-6">Remarks</th>
                    <th scope="col" class="fs-6">Type</th>
                    <th scope="col" class="fs-6">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="border" id="assets_table">
               
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 