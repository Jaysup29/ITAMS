//functions
function loginBtn() {
    var username = $('#username').val(); //admin
    var password = $('#password').val(); //admin

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: {
            function: 'login',
            username: username,
            password: password
        },
        dataType: 'text',
        success: function (data) {
            alert(data);
            if (data.includes("Login Successfully!")) {
                //                alert("Login Successfully!")
                window.location = "index.php";
            }
            else {
                // console.log(data);
                //                alert("Please check Username/Email and Password if correct.");
            }
        }
    });
}

function logoutBtn() {
    alert("You Logged Out!");
    setTimeout(function(){
        window.location = "logout.php";
    }, 500);   
}

//modal add asset
function addasset() {
    $('#addasset').modal('show');
}

function save_asset() {
    var asset_tag = $('#new_asset_tag').val().toUpperCase();
    var date_purchase = $('#new_date_purchase').val();
    var asset_name = $('#new_asset_name').val();
    var serial_no = $('#new_serial_no').val();
    var description = $('#new_description').val();
    var type_of_asset = $('#type_of_asset').val();
    var sbu = $('#new_sbu').val();
    var price = $('#new_price').val();
    var installed_os = $('#new_installed_os').val();
    var ms_office = $('#new_ms_office').val();
    var remarks = $('#new_remarks').val();
    var type = $('#new_type').val();
    var status = $('#new_status').val();

    if ((asset_tag == "") || (asset_tag == null) && (date_purchase == null) || (date_purchase == "") && (asset_name == null) || (asset_name == "") && (sbu == null) || (sbu == "") && (type == null) || (type == "")) {


        document.getElementById('val_tag').classList.add('was-validated');
        document.getElementById('val_date').classList.add('was-validated');
        document.getElementById('val_asset').classList.add('was-validated');
        document.getElementById('val_type').classList.add('was-validated');
        document.getElementById('val_sbu').classList.add('was-validated');
        ////        return false;

    } else {
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: {
                function:
                    'save_new_asset',
                asset_tag: asset_tag,
                date_purchase: date_purchase,
                asset_name: asset_name,
                serial_no: serial_no,
                description: description,
                type_of_asset:type_of_asset,
                sbu: sbu,
                price: price,
                installed_os: installed_os,
                ms_office: ms_office,
                remarks: remarks,
                type: type,
                status: status

            },
            dataType: 'text',
            success: function (data) {
                //console.log(data)
                alert("Success");
                setTimeout(function(){
                $('#addasset').modal('hide');
                asset_list();
                },500);
              
            } 
        });
    }
}
$('#addasset').on('hidden.bs.modal', function (e) {
    $('#myForm_addAsset')[0].reset();
    document.getElementById('val_tag').classList.remove('was-validated');
    document.getElementById('val_date').classList.remove('was-validated');
    document.getElementById('val_asset').classList.remove('was-validated');
    document.getElementById('val_type').classList.remove('was-validated');
    document.getElementById('val_sbu').classList.remove('was-validated');
    
})

function asset_list() {
    
    var filter_sbu = $('#filter_sbu').val();
    
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: { function: 'asset_lists', filter_sbu:filter_sbu},
        dataType: 'text',
        success: function (data) {

            $('#assetlist').empty();
            $('#assetlist').append(data);
        },
        complete: function()
            {
                $("#spinner").hide();
            }
    });
}

//modal view asset 
function view_asset(id) {

    $('#viewasset').modal('show');

    $('#viewasset').attr('assetid', id);

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'load_asset', id: id },
        dataType: 'json',
        success: function (data) {
            $('#asset_tag').val(data[0]['asset_tag']);
            $('#date_purchase').val(data[0]['date_purchase']);
            $('#asset_name').val(data[0]['asset_name']);
            $('#serial_no').val(data[0]['serial_no']);
            $('#type').val(data[0]['type_of']);
            $('#description').val(data[0]['descriptions']);
            $('#sbu').val(data[0]['sbu']);
            $('#price').val(data[0]['price']);
            $('#installed_os').val(data[0]['installed_os']);
            $('#ms_office').val(data[0]['ms_office']);
            $('#status').val(data[0]['status']);
            $('#remarks').val(data[0]['remarks']);
        }
    });
}

//save updated asset detail
function save_edited_assets() {

    var id = $('#viewasset').attr('assetid');

    var asset_tag = $('#asset_tag').val();

    var date_purchase = $('#date_purchase').val();

    var asset_name = $('#asset_name').val();

    var serial_no = $('#serial_no').val();

    var type = $('#type').val();

    var description = $('#description').val();

    var sbu = $('#sbu').val();

    var price = $('#price').val();

    var installed_os = $('#installed_os').val();

    var ms_office = $('#ms_office').val();

    var status = $('#status').val();

    var remarks = $('#remarks').val();


    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'save_edited_asset', id: id, asset_tag: asset_tag, date_purchase: date_purchase, asset_name: asset_name, serial_no: serial_no, type: type, description: description, sbu: sbu, price: price, installed_os: installed_os, ms_office: ms_office, status: status, remarks: remarks },
        dataType: 'text',
        success: function (data) {
            console.log(data);
            setTimeout(function(){
                $('#viewasset').modal('hide');
                asset_list();
                },500);
        }
    });
}

//modal message delete
function delete_asset_confirmation(id) {

    $('#deleteasset').modal();
    $('#deleteasset').attr('confirmation_delete', id);
}

function delete_asset() {

    var id = $('#deleteasset').attr('confirmation_delete');

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'delete_asset', id: id },
        dataType: 'text',
        success: function (data) {
            location.reload();
        }
    });
}

function loadassets(keys) {
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'getasset', keys: keys },
        dataType: 'text',
        success: function (data) {

            $('#assetlist').empty();
            $('#assetlist').append(data);
        }
    });

}

function selection_type_of_device(){
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'type_of_device' },
        dataType: 'text',
        success: function(data){
            $('#new_type').empty();
            $('#new_type').append(data);
        }
    });
}
//Assigning an Asset

//modal for assign asset
function assignasset_loader(id) {

    $('#assignassetthruassets').modal('show');
    $('#assignassetthruassets').attr('assign_assetid', id);

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'assignasset_loader', id: id },
        dataType: 'json',
        success: function (data) {
            $('#assign_asset_tag').val(data[0]['asset_tag']);
            $('#assign_asset_name').val(data[0]['asset_name']);
            $('#assign_type').val(data[0]['type_of']);
            $('#assign_serial_no').val(data[0]['serial_no']);
            $('#assign_description').val(data[0]['descriptions']);
            $('#assign_status').val(data[0]['status']);
            $('#assign_remarks').val(data[0]['remarks']);
        }
    });
}
$('#assignassetthruassets').on('hidden.bs.modal', function (e) {

    $('#assigning-asset')[0].reset(); 
})

//load employee details thru their id
function get_employees_detail(){
    var employee_details = $('#emp_id').val();
    
    if(employee_details == null || employee_details == ''){
        alert("Input Employee's ID");
    }
    else
    {
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'get_employee', employee_details: employee_details },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#firstname').val(data[0]['first_name']);
            $('#lastname').val(data[0]['last_name']);
            $('#emp_sbu').val(data[0]['sbu_id']);
            $('#position').val(data[0]['position']);

        }
    });
    } 
}

//save assign to records
function submit_assignasset() {

    var id = $('#assignassetthruassets').attr('assign_assetid');
    var assign_asset_tag = $('#assign_asset_tag').val();
    var assign_asset_name = $('#assign_asset_name').val();
    var assign_type = $('#assign_type').val();
    var assign_serial_no = $('#assign_serial_no').val();
    var assign_description = $('#assign_description').val();
    var assign_status = $('#assign_status').val();
    var assign_remarks = $('#assign_remarks').val();
    var emp_id = $('#emp_id').val();
    var date_assigned = $('#emp_date_assigned').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var emp_sbu = $('#emp_sbu').val();
    var position = $('#position').val();
    var location = $('#location').val();
    
    if((assign_asset_tag == '')||(assign_asset_tag == null)||(assign_asset_name == '')||(assign_asset_name == null)||(assign_type == '')||(assign_type == null)||(assign_serial_no == '')||(assign_serial_no == null)||(assign_status == '')||(assign_status == null)||(assign_remarks == '')||(assign_remarks == null)||(emp_id == '')||(emp_id == null)||(date_assigned == '')||(date_assigned == null)||(firstname == '')||(firstname == null)||(lastname == '')||(lastname == null)||(emp_sbu == '')||(emp_sbu == null)||(position == '')||(position == null)||(location == '')||(location == null)){
        alert('Fill out the all field properly!');
    }else{
        if(assign_status == 'Missing'){
            alert("This item is Missing can't assign");
        }else{
            if(assign_status == 'Disposed'){
                alert("This item is for Dispose can't assign");
            }else{
                $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: { function: 'submit_assign', id: id, assign_asset_tag: assign_asset_tag, assign_asset_name: assign_asset_name, assign_type: assign_type, assign_serial_no: assign_serial_no, assign_description: assign_description, assign_status: assign_status, assign_remarks: assign_remarks, emp_id: emp_id, date_assigned: date_assigned, firstname: firstname, lastname: lastname, emp_sbu: emp_sbu, position: position, location: location },
                dataType: 'text',
                success: function (data) {

                    alert(data);
                    setTimeout(function(){
                        $('#assignassetthruassets').modal('hide');
                        asset_list();
                        },500);  
                }
            });
            }
            
        }
        
    }
    
}

//display record list
function record_list() {

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: { function: 'record_lists' },
        dataType: 'text',
        success: function (data) {

            $('#recordlist').empty();
            $('#recordlist').append(data);
        },
        complete: function()
            {
                $("#spinner").hide();
            }
    });
}

//add assign modal
function add_assign_record() {
    $('#assignassetthrurecord').modal('show');
}

//assign thru record
function assign_asset_record() {

    var asset = $('#search_asset_record').val();
    if((asset == null) || (asset == ""))
    {

    }
    else
    {
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: { function: 'get_asset', asset:asset},
            dataType: 'json',
            success: function(data){
            $('#assign_asset_id_record').val(data[0]['id']);
            $('#assign_asset_tag_record').val(data[0]['asset_tag']);
            $('#assign_serial_record').val(data[0]['serial_no']);
            $('#assign_status_record').val(data[0]['status']);
            $('#assign_asset_name_record').val(data[0]['asset_name']);
            $('#assign_type_record').val(data[0]['type_of']);
            $('#assign_description_record').val(data[0]['descriptions']);
            $('#assign_remarks_record').val(data[0]['remarks']);
            }
        });
    }
}


function assign_emp_record() {
    
    var employee_details = $('#emp_id_record').val();
    
    if((employee_details == null) || (employee_details == ""))
    {
        alert("Input Employee's ID");
    }
    else
    {
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'get_employee', employee_details: employee_details },
        dataType: 'json',
        success: function (data) {
            $('#firstname_record').val(data[0]['first_name']);
            $('#lastname_record').val(data[0]['last_name']);
            $('#emp_sbu_record').val(data[0]['sbu_id']);
            $('#position_record').val(data[0]['position']);

        }
    });
    }
}

//save assign to records
function submit_assign_record() {

    var asset_id = $('#assign_asset_id_record').val();
    var assign_asset_tag_record = $('#assign_asset_tag_record').val();
    var assign_asset_name_record = $('#assign_asset_name_record').val();
    var assign_type_record = $('#assign_type_record').val();
    var assign_serial_record = $('#assign_serial_record').val();
    var assign_description_record = $('#assign_description_record').val();
    var assign_status_record = $('#assign_status_record').val();
    var assign_remarks_record = $('#assign_remarks_record').val();
    var emp_id_record = $('#emp_id_record').val();
    var emp_date_assigned_record = $('#emp_date_assigned_record').val();
    var firstname_record = $('#firstname_record').val();
    var lastname_record = $('#lastname_record').val();
    var emp_sbu_record = $('#emp_sbu_record').val();
    var position_record = $('#position_record').val();
    var location_record = $('#location_record').val();

    if((asset_id == '')||(asset_id == null)||(assign_asset_tag_record == '')||(assign_asset_tag_record == null)||(assign_asset_name_record == '')||(assign_asset_name_record == null)||(assign_type_record == '')||(assign_type_record == null)||(assign_serial_record == '')||(assign_serial_record == null)||(assign_status_record == '')||(assign_status_record == null)||(assign_remarks_record == '')||(assign_remarks_record == null)||(emp_id_record == '')||(emp_id_record == null)||(firstname_record == '')||(firstname_record == null)||(lastname_record == '')||(lastname_record == null)||(emp_sbu_record == '')||(emp_sbu_record == null)||(position_record == '')||(position_record == null)||(location_record == '')||(location_record == null)){
        
        alert('Fill out the all field properly!');
        
    }
    else if((emp_date_assigned_record == '')||(emp_date_assigned_record == null))
    {
        alert('Please Select Date');
    }
    else
    {
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'save_assign_record', asset_id: asset_id, assign_asset_tag_record: assign_asset_tag_record, assign_asset_name_record: assign_asset_name_record, assign_type_record: assign_type_record, assign_serial_record: assign_serial_record, assign_description_record: assign_description_record, assign_status_record: assign_status_record, assign_remarks_record: assign_remarks_record, emp_id_record: emp_id_record, emp_date_assigned_record: emp_date_assigned_record, firstname_record: firstname_record, lastname_record: lastname_record, emp_sbu_record: emp_sbu_record, position_record: position_record, location_record: location_record },
        dataType: 'text',
        success: function(data){
            alert(data);
            setTimeout(function(){
                $('#assignassetthrurecord').modal('hide');
                record_list();
                },500); 
        }
    });
    }
    
}

$('#assignassetthrurecord').on('hidden.bs.modal', function (e) {
    $('#myForm_record')[0].reset();
})

function view_record_detail(id) {

    $('#viewrecorddetails').modal('show');

    $('#viewrecorddetails').attr('record_id', id);


    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'load_recorded_detail', id: id },
        dataType: 'json',
        success: function (data) {

            $('#asset_id_record').val(data[0]['asset_id']);
            $('#asset_tag_record').val(data[0]['asset_tag']);
            $('#asset_name_record').val(data[0]['asset_name']);
            $('#type_record').val(data[0]['asset_type_of']);
            $('#serial_record').val(data[0]['asset_serial_no']);
            $('#description_record').val(data[0]['asset_descriptions']);
            $('#status_record').val(data[0]['asset_status']);
            $('#remarks_record').val(data[0]['asset_remarks']);
            $('#emp_id_recorded').val(data[0]['emp_id']);
            $('#emp_date_assigned_recorded').val(data[0]['date_created']);
            $('#firstname_recorded').val(data[0]['emp_fname']);
            $('#lastname_recorded').val(data[0]['emp_lname']);
            $('#emp_sbu_recorded').val(data[0]['emp_sbu']);
            $('#position_recorded').val(data[0]['emp_position']);
            $('#location_recorded').val(data[0]['location']);
        }
    });
}

////save updated asset detail
function submit_updated_details() {

    var id = $('#viewrecorddetails').attr('record_id');
    var asset_remarks = $('#remarks_record').val();
    var location = $('#location_recorded').val();

    if((asset_remarks == "")||(asset_remarks == null)||(location == "")||(location == null)){
        document.getElementById('val_remarks_record').classList.add('was-validated');
        document.getElementById('val_location_recorded').classList.add('was-validated');
        
    }else{
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'save_updated_details', id: id, asset_remarks: asset_remarks, location: location },
        dataType: 'text',
        success: function (data) {
            
            setTimeout(function(){
                $('#viewrecorddetails').modal('hide');
                record_list();
                },500);
        }
    });
        
    }   
}
$('#viewrecorddetails').on('hidden.bs.modal', function (e) {
    document.getElementById('val_remarks_record').classList.remove('was-validated');
    document.getElementById('val_location_recorded').classList.remove('was-validated');
    $('#update-assign-details')[0].reset();
})

//modal message confirmation return
function return_asset_confirmation(return_id){
    $('#returnconfirmationmessage').modal('show');
    $('#returnconfirmationmessage').attr('confirmation_return', return_id); 
}

function return_asset_trigger(id) {
    
    var id = $('#returnconfirmationmessage').attr('confirmation_return');
    var collectedby = $('#textfieldforcollectedby').val();
    var asset_remarks = $('#textfieldforassetstatus').val();
    var returnnote = $('#textfieldfornotes').val();
    
    if((collectedby == "")||(collectedby == null) || (asset_remarks == "")||(asset_remarks == null) || (returnnote == "")||(returnnote == null)){
        
        document.getElementById('val_collect').classList.add('was-validated');
        document.getElementById('val_asstatus').classList.add('was-validated');
        document.getElementById('val_notes').classList.add('was-validated');
        
    }
    else
    {
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'return_asset', id: id, collectedby:collectedby, asset_remarks:asset_remarks, returnnote:returnnote},
        dataType: 'text',
        success: function (data) {
            alert(data);
            
            setTimeout(function(){
                $('#returnconfirmationmessage').modal('hide');
                record_list();
            }, 500);
        }
        });
    
    }
    
}

$('#returnconfirmationmessage').on('hidden.bs.modal', function (e) {
    document.getElementById('val_collect').classList.remove('was-validated');
    document.getElementById('val_asstatus').classList.remove('was-validated');
    document.getElementById('val_notes').classList.remove('was-validated');
    $('#form-return')[0].reset();
})

function return_list() {

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: { function: 'return_lists' },
        dataType: 'text',
        success: function (data) {

            $('#returnlist').empty();
            $('#returnlist').append(data);
        },
        complete: function()
            {
                $("#spinner").hide();
            }
    });
}

function assetlogs(assetid){

    $('#assetlogsmodal').modal('show');
    $('#assetlogsmodal').attr('asset_id', assetid);

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'asset_log_details', assetid:assetid},
        dataType: 'text',
        success: function(data){
            $('#assetloglist').empty();
            $('#assetloglist').append(data);
        }
    });
    
}


//ACCOUNTABILITY
function acc_get_emp_record(emp){   
    
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'acc_get_employee', emp: emp},
        dataType: 'text',
        success: function(data){
            
            $('#emp_borrowed_details').empty();
            $('#emp_borrowed_details').append(data);
                    
        }
    });
}

function generate_acc_form(id){
    
    var id = $('#acc_search_employee').val();
    var pnpfullname = $('#fullname').val();
    var f_issuer = $('#field_issuer').val();
    var asset_sbu = $('#af_sbu_selector').val();
    
    if((id == '')||(id == null)||(pnpfullname == '')||(pnpfullname == null)||(f_issuer == '')||(f_issuer == null)||(asset_sbu == '')||(asset_sbu == null)){
        alert('Please fill out all fields marked by Asterisk(*)');

    }else{
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'generate_acc_form', id: id, pnpfullname:pnpfullname, f_issuer:f_issuer, asset_sbu:asset_sbu },
        dataType: 'json',
        success: function(data)
        {
            console.log(data);
            var status = data[0].Accountability_status;
            var id = data[0].Accountability_ID;
            console.log(status);
            console.log(id);
            if(status == 0)
            {
                setTimeout(function(){
                    window.open("accountability_form.php?id=" +id, "_blank");
                    location.reload();
                }, 500);
            }
            else
            {
                alert("Already got Accountability Form");
            }
        }
        
    })
        
    } 
}

function generate_single_af(recordid){
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'generate_single_acf', recordid:recordid },
        dataType: 'text',
        success: function(data)
        {
            console.log(data);
            var id = data;
            
            setTimeout(function(){
                //$("#acform")[0].reset();
                window.open("single_gen_af.php?id=" +id, "_blank");
                location.reload();
                },500);
        }
    });
}


//Dashboard
function sumOfMainDevices(){
    var selected_sbu = $("#select_sbu").val();
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'MainDevices', selected_sbu:selected_sbu},
        dataType: 'json',
        success: function(data)
        {
            var Working = data[0].Working;
            var Missing = data[0].Missing;
            var Disposed = data[0].Disposed;
            var Defective = data[0].Defective;
            var Spare = data[0].Spare;
            var Total = data[0].Total;
            
            $("#working").empty();
            $('#working').append(Working);
            $("#missing").empty();
            $('#missing').append(Missing);
            $("#dispose").empty();
            $('#dispose').append(Disposed);
            $("#damage_or_defective").empty();
            $('#damage_or_defective').append(Defective);
            $("#spare_devices_avail").empty();
            $('#spare_devices_avail').append(Spare);
            $("#totaldevices").empty();
            $('#totaldevices').append(Total);
            
        }
    });
}

// pheripherals
function sumOfPheripheralDevices(){
    var selected_sbu = $("#select_sbu").val();
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'PheripheralDevices', selected_sbu:selected_sbu},
        dataType: 'json',
        success: function(data)
        {
            var Working = data[0].Working;
            var Missing = data[0].Missing;
            var Disposed = data[0].Disposed;
            var Defective = data[0].Defective;
            var Spare = data[0].Spare;
            var Total = data[0].Total;
            
            $("#working_pheripherals").empty();
            $('#working_pheripherals').append(Working);
            $("#missing_pheripherals").empty();
            $('#missing_pheripherals').append(Missing);
            $("#dispose_pheripherals").empty();
            $('#dispose_pheripherals').append(Disposed);
            $("#damage_or_defective_pheripherals").empty();
            $('#damage_or_defective_pheripherals').append(Defective);
            $("#spare_devices_avail_pheripherals").empty();
            $('#spare_devices_avail_pheripherals').append(Spare);
            $("#totaldevicespheripherals").empty();
            $('#totaldevicespheripherals').append(Total);
            
        }
    });
}

//table status of asset mismo
function dashboard_assets_status(){
    
    var selected_sbu = $("#select_sbu").val();
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'dashboard_table_assets', selected_sbu:selected_sbu},
        dataType: 'text',
        success: function(data){

            $('#table_assets').empty();
            $('#table_assets').append(data);
        }
    });
}

//table status of assets pheripherals
function dashboard_assets_status_pheripherals(){
    
    var selected_sbu = $("#select_sbu").val();
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'dashboard_assetsstatus_pheripherals', selected_sbu:selected_sbu},
        dataType: 'text',
        success: function(data){
            
            $('#table_assets_pheripherals').empty();
            $('#table_assets_pheripherals').append(data);
        }
    });
}


//charting
function mychartsAssets(){
    
    var selected_sbu = $("#select_sbu").val();
    
    $.ajax({
       type: 'POST',
        url: 'ajax.php',
        data: { function: 'getdatatochart', selected_sbu:selected_sbu},
        dataType: 'json',
        success: function(data){    

        var labels = data.map(function(e) {
           return e.itemtype;
        });
        var totality = data.map(function(e) {
           return e.total;
        });;

            var ctx = document.getElementById('myChartAssets').getContext('2d');
            
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Overall Assets Record',
                        data:   totality,
                        backgroundColor:[
                            '#6A89B7'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
        }
    });
}

function mychartsPheripherals(){
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'getdatatochartP'},
        dataType: 'json',
        success: function(data){
            var labels = data.map(function(e) {
               return e.itemtype;
            });
            var totality = data.map(function(e) {
               return e.total;
            });;
            
            var ctx = document.getElementById('myChartPheripherals').getContext('2d');
            
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Overall Assets Pheripherals Record',
                        data: totality,
                        backgroundColor:[
                            '#6A89B7'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
}

//Accounts

//tablelist of users
function userlist(){
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'userlists'},
        dataType: 'text',
        success: function(data){

            $('#users').empty();
            $('#users').append(data);
            
        },
        complete: function()
            {
                $("#spinner").hide();
            }
    });  
}

//adding account
function adduser(){
    
    var lastname = $('#add_lname').val();
    var firstname = $('#add_fname').val();
    var midinitial = $('#add_mi').val();
    var username = $('#add_uname').val();
    var email = $('#add_email').val();
    var password_1 = $('#add_pword1').val();
    var password_2 = $('#add_pword2').val();
    var user_type = $('#usertype').val();
    var emp_sbu = $('#add_sbu').val();
    var position = $('#add_pos').val();
    var department = $('#add_dept').val();
    
    if((lastname == "")||(lastname == "")||(firstname == "")||(firstname == "")||(username == "")||(username == "")||(email == "")||(email == "")||(password_1 == "")||(password_1 == "")||(password_2 == "")||(password_2 == "")||(emp_sbu == "")||(emp_sbu == "")||(department == "")||(department == "")){
        
        alert("Please fill out the fields properly!");
        
    }else if((password_1 !== password_2)){
        
        alert("Password are not the same!");
        
    }else{
        
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'addusers', lastname:lastname, firstname:firstname, midinitial:midinitial, username:username, email:email, password_1:password_1, password_2:password_2, user_type:user_type, emp_sbu:emp_sbu, position:position, department:department},
        dataType: 'text',
        success: function(data){
            console.log(data);
            setTimeout(function(){
                $("#form1")[0].reset();
                userlist();
                },500);
        }
    });
        
    }
}

function getuserdetails() {

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'get_user_details'},
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            $('#update_fname').val(data[0]['first_name']);
            $('#update_lname').val(data[0]['last_name']);
            $('#update_mi').val(data[0]['mid_initial']);
            $('#update_email').val(data[0]['email']);
            $('#update_uname').val(data[0]['user_name']);
            $('#update_pos').val(data[0]['position']);
            $('#update_pword1').val(data[0]['password_1']);
            $('#update_pword2').val(data[0]['password_2']);
            $('#update_sbu').val(data[0]['sbu_id']);
            $('#update_dept').val(data[0]['dept']);

        }
    });
}

function updateuserdetails(){
    
    var lastname = $('#update_lname').val();
    var firstname = $('#update_fname').val();
    var midinitial = $('#update_mi').val();
    var username = $('#update_uname').val();
    var email = $('#update_email').val();
    var password_1 = $('#update_pword1').val();
    var password_2 = $('#update_pword2').val();
    var emp_sbu = $('#update_sbu').val();
    var position = $('#update_pos').val();
    var department = $('#update_dept').val();
    
    if((lastname == "")||(lastname == "")||(firstname == "")||(firstname == "")||(username == "")||(username == "")||(email == "")||(email == "")||(password_1 == "")||(password_1 == "")||(password_2 == "")||(password_2 == "")||(emp_sbu == "")||(emp_sbu == "")||(department == "")||(department == "")){
        
        alert("Please fill out the fields properly!");
        
    }else if((password_1 !== password_2)){
        
        alert("Password are not the same!");
        
    }else{
        $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'updateuseraccount', lastname:lastname, firstname:firstname, midinitial:midinitial, username:username, email:email, password_1:password_1, password_2:password_2, emp_sbu:emp_sbu, position:position, department:department},
        dataType: 'text',
        success: function(data){
            alert(data);
            setTimeout(function(){
                userlist();
                },500);
        }
    });
    }
}

function changeusersmodal(id){
    
    $('#changeusersmodal').modal('show');
    $('#changeusersmodal').attr('emp_id', id);
}

function changeuserpassword(){
    
    var id = $('#changeusersmodal').attr('emp_id');
    var password = $('#change_pword').val();
    
    if((password == '')||(password == null)){
        alert('Please input new password');
        
       }else{
           
           $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'changeuserpass', id:id, password:password},
        dataType: 'text',
        success: function(data){
            alert(data);
            setTimeout(function(){
                $('#changeusersmodal').modal('hide');
                },500);
        }
    });
           
    }
    
}

function updateusersaccountmodal(id){
    
    $('#updateusersaccount').modal('show');
    $('#updateusersaccount').attr('emp_id', id);
}

function update_users_accounts(){
    
    var empid = $('#updateusersaccount').attr('emp_id');
    var user_type = $('#user_type').val();
    
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { function: 'update_users_account', empid:empid, user_type:user_type},
        dataType: 'text',
        success: function(data){

            setTimeout(function(){
                $('#updateusersaccount').modal('hide');
                userlist();
            }, 500);
        }
    });                                            
}

function upload_file(){
    var file_value = $('#upload_csv').val();
    console.log('clicked');
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: { function: 'mass_upload', file_value:file_value},
        success: function(data){
            alert(data);
        }
    });
}