<?php 
session_start();

$function = $_POST['function'];
    //for login
    if ($function =='login'){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        login($username, $password);
    }
    // for adding asset
    else if ($function == 'save_new_asset'){
        
        $n_asset_tag = $_POST['asset_tag'];
        $n_date_purchase = date("Y-m-d H:i:s", strtotime($_POST['date_purchase']));
        $n_asset_name = $_POST['asset_name'];
        $n_serial_no = $_POST['serial_no'];
        $n_description = $_POST['description'];
        $type_of_asset = $_POST['type_of_asset'];
        $n_sbu = $_POST['sbu'];
        $n_price = $_POST['price'];
        $n_installed_os = $_POST['installed_os'];
        $n_ms_office = $_POST['ms_office'];
        $n_remarks = $_POST['remarks'];
        $n_type = $_POST['type'];
        $n_status = $_POST['status'];

        save_new_asset($n_asset_tag, $n_date_purchase, $n_asset_name, $n_serial_no, $n_description, $type_of_asset, $n_sbu, $n_price, $n_installed_os, $n_ms_office, $n_remarks, $n_type, $n_status);
    }

    else if($function == 'type_of_device'){
        type_of_device();
    }
    //getting assets list
    else if ($function == 'asset_lists'){
        $filter_SBU = $_POST['filter_sbu'];
        asset_lists($filter_SBU);
    }
    //load asset detail from modal
    else if ($function == 'load_asset'){
        
        $id = $_POST['id'];
        load_asset($id);
    }
    //update asset details
    else if ($function == 'save_edited_asset'){
        
        $id = $_POST['id'];
        $asset_tag = $_POST['asset_tag'];
        $date_purchase = date("Y-m-d H:i:s", strtotime($_POST['date_purchase']));
        $asset_name = $_POST['asset_name'];
        $serial_no = $_POST['serial_no'];
        $description = $_POST['description'];
        $sbu = $_POST['sbu'];
        $price = $_POST['price'];
        $installed_os = $_POST['installed_os'];
        $ms_office = $_POST['ms_office'];
        $remarks = $_POST['remarks'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        save_edited_asset($id, $asset_tag, $date_purchase, $asset_name, $serial_no, $description, $sbu, $price, $installed_os, $ms_office, $remarks, $type, $status);
    }
    //delete asset
    else if($function == 'delete_asset'){
        
        $id = $_POST['id'];
        delete_asset($id);
    }

    else if($function == 'assignasset_loader'){
        $id = $_POST['id'];
        assignasset_loader($id);
    }

    else if($function == 'get_employee'){
        $employee_details = $_POST['employee_details'];
        get_employee($employee_details);
    }

    else if($function == 'submit_assign'){
        $assign_id = $_POST['id'];
        $assign_asset_tag = $_POST['assign_asset_tag'];
        $assign_asset_name = $_POST['assign_asset_name'];
        $assign_type = $_POST['assign_type'];
        $assign_serial_no = $_POST['assign_serial_no'];
        $assign_description = $_POST['assign_description'];
        $assign_status = $_POST['assign_status'];
        $assign_remarks = $_POST['assign_remarks'];
        $emp_id = $_POST['emp_id'];
        $date_assigned = date("Y-m-d H:i:s", strtotime($_POST['date_assigned']));
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emp_sbu = $_POST['emp_sbu'];
        $position = $_POST['position'];
        $location = $_POST['location'];
        submit_assign($assign_id, $assign_asset_tag, $assign_asset_name, $assign_type, $assign_serial_no, $assign_description, $assign_status, $assign_remarks, $emp_id, $date_assigned, $firstname, $lastname, $emp_sbu, $position, $location);
    }

    else if($function == 'record_lists'){
        
        record_lists();
    }

    else if($function == 'get_asset'){
        $asset = $_POST['asset'];
        get_asset($asset);
    }
    
    else if($function == 'save_assign_record'){
        $asset_id = $_POST['asset_id'];
        $assign_asset_tag_record = $_POST['assign_asset_tag_record'];
        $assign_asset_name_record = $_POST['assign_asset_name_record'];
        $assign_type_record = $_POST['assign_type_record'];
        $assign_serial_record = $_POST['assign_serial_record'];
        $assign_description_record = $_POST['assign_description_record'];
        $assign_status_record = $_POST['assign_status_record'];
        $assign_remarks_record = $_POST['assign_remarks_record'];
        $emp_id_record = $_POST['emp_id_record'];
        $emp_date_assigned_record = date("Y-m-d H:i:s", strtotime($_POST['emp_date_assigned_record']));
        $firstname_record = $_POST['firstname_record'];
        $lastname_record = $_POST['lastname_record'];
        $emp_sbu_record = $_POST['emp_sbu_record'];
        $position_record = $_POST['position_record'];
        $location_record = $_POST['location_record'];
        save_assign_record($asset_id, $assign_asset_tag_record, $assign_asset_name_record, $assign_type_record, $assign_serial_record, $assign_description_record, $assign_status_record, $assign_remarks_record, $emp_id_record, $emp_date_assigned_record, $firstname_record, $lastname_record, $emp_sbu_record, $position_record, $location_record);
    }

    else if($function == 'load_recorded_detail'){
        $id = $_POST['id'];
        load_recorded_detail($id);
    }

    else if($function == 'save_updated_details'){
        $id = $_POST['id'];
        $update_remarks = $_POST['asset_remarks'];
        $update_location = $_POST['location'];
        save_updated_details($id, $update_remarks, $update_location);
        
    }

    else if($function == 'return_asset'){
        $record_id = $_POST['id'];
        $collectedby = $_POST['collectedby'];
        $asset_remarks = $_POST['asset_remarks'];
        $returnnote = $_POST['returnnote'];
        return_asset($record_id, $collectedby, $asset_remarks, $returnnote);
    }

    else if($function == 'return_lists'){
        return_lists();
    }
    
    else if($function == 'asset_log_details'){
        
        $assetid = $_POST['assetid'];
        asset_log_details($assetid);
    }

    else if($function == 'acc_get_employee'){
        $emp_details = $_POST['emp'];
        acc_get_employee($emp_details);
    }

    else if($function == 'generate_acc_form'){
        $emp_id = $_POST['id'];
        $pnpfullname = $_POST['pnpfullname'];
        $f_issuer = $_POST['f_issuer'];
        $asset_sbu = $_POST['asset_sbu'];
        generate_acc_form($emp_id, $pnpfullname, $f_issuer, $asset_sbu);
    }

    else if($function == 'generate_single_acf'){
        $record_id = $_POST['recordid'];
        generate_single_acf($record_id);
    }

    else if($function == 'MainDevices'){
        $selected_sbu = $_POST['selected_sbu'];
        MainDevices($selected_sbu);
    }

    else if($function == 'PheripheralDevices'){
        $selected_sbu = $_POST['selected_sbu'];
        PheripheralDevices($selected_sbu);
    }
    
    else if($function == 'dashboard_table_assets'){
        $selected_sbu = $_POST['selected_sbu'];
        dashboard_table_assets($selected_sbu);
    }

    else if($function == 'dashboard_assetsstatus_pheripherals'){
        $selected_sbu = $_POST['selected_sbu'];
        dashboard_assetsstatus_pheripherals($selected_sbu);
    }

    else if($function == 'getdatatochart'){
        $selected_sbu = $_POST['selected_sbu'];
        getdatatochart($selected_sbu);
    }

    else if($function == 'getdatatochartP'){
        getdatatochartP();
    }

    else if($function == 'userlists'){
        userlists();
    }

    else if($function == 'addusers'){
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $midinitial = $_POST['midinitial'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $user_type = $_POST['user_type'];
        $emp_sbu = $_POST['emp_sbu'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        addusers($lastname, $firstname, $midinitial, $username, $email, $password_1, $password_2, $user_type, $emp_sbu, $position, $department);
    }

    else if($function == 'get_user_details'){
        $id = $_SESSION['emp_id'];
        get_user_details($id);
    }

    else if($function == 'updateuseraccount'){
        $employee_id = $_SESSION['emp_id'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $midinitial = $_POST['midinitial'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $emp_sbu = $_POST['emp_sbu'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        updateuseraccount($employee_id, $lastname, $firstname, $midinitial, $username, $email, $password_1, $password_2, $emp_sbu, $position, $department);
    }

    else if($function == 'changeuserpass'){
        $emp_id = $_POST['id'];
        $password = $_POST['password'];
        changeuserpass($emp_id, $password);
    }

    else if($function == 'update_users_account'){
        
        $id = $_POST['empid'];
        $usertype = $_POST['user_type'];
        update_users_account($id, $usertype);
    }

    else if($function == 'mass_upload'){
        $file_value = $_POST['file_value'];
        mass_upload($file_value);
    }
    //login
    function login($username, $password){
        
        include 'dbcon.php';


        $query = "SELECT emp.id, emp.user_name, emp.password_1
                    FROM tbl_employees emp
                    WHERE emp.user_name = '$username'
                    AND emp.password_1 = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['emp_id'] = $row['id'];
                echo "Login Successfully!";
            }
            }else{
                echo "Please check Username/Email and Password if correct.";
            }
        // closing connection
        mysqli_close($conn);
                             
    }

    // adding asset
    function save_new_asset($n_asset_tag, $n_date_purchase, $n_asset_name, $n_serial_no, $n_description, $type_of_asset, $n_sbu, $n_price, $n_installed_os, $n_ms_office, $n_remarks, $n_type, $n_status){
        
        include 'dbcon.php';
        
        $query = "SELECT id from tbl_assets ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $assetid = $row[0];
        $id = str_pad($assetid + 1, 8, 0, STR_PAD_LEFT);
        $qty=1;
        
//        $insert_new_asset=mysqli_prepare($conn,"CALL new_asset(?,?,?,?,?,?,?,?,?,?,?,?,?)");
//        mysqli_stmt_bind_param($insert_new_asset,"sssssssssssss",$n_asset_tag,$n_asset_name,$n_description,$n_serial_no,$n_price,$n_sbu,$n_date_purchase,$n_installed_os,$n_ms_office,$n_remarks,$n_type,$n_status,$qty);
//        $insert_new_asset->execute();
        
        
        $query = "INSERT INTO tbl_assets (id, asset_tag, asset_name, descriptions, serial_no, price, sbu, date_purchase, installed_os, ms_office, remarks, type_of, status, quantity) VALUES ('$id', '$n_asset_tag', '$n_asset_name', '$n_description', '$n_serial_no', '$n_price', '$n_sbu', '$n_date_purchase', '$n_installed_os', '$n_ms_office', '$n_remarks', '$n_type', '$n_status', $qty)";
        
        if(mysqli_query($conn, $query)){
            echo 'yes';
        }else{
            echo $conn->error;
        }
        
        // closing connection
        mysqli_close($conn);
    }

    function type_of_device(){
        
        include 'dbcon.php';
        
        $query = "SELECT * FROM tbl_item";
        $result = mysqli_query($conn, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
            echo '<option value='.$no.'>'.$row[1].'</option>';
            $no++;
        }
        
        // closing connection
        mysqli_close($conn);
    }
    //getting assets list
    function asset_lists($filter_SBU){
        
        include 'dbcon.php';
        
        $query = "SELECT ass.id, ass.asset_tag, ass.asset_name, ass.descriptions, ass.serial_no, ass.price, ass.sbu, ass.date_purchase, ass.installed_os, ass.ms_office, ass.remarks, item.itemname, ass.`status`
        FROM tbl_assets ass
        INNER JOIN tbl_item item ON ass.type_of = item.id
        ";
        
        if(($filter_SBU == null)||($filter_SBU == "")||($filter_SBU == 'ALL')){
            
        }
        else if($filter_SBU == 'PNKC'){
            $query .="WHERE ass.sbu = 'PNKC'";
        }
        else if($filter_SBU == 'GILI'){
            $query .="WHERE ass.sbu = 'GILI'";
            
        }
        else if($filter_SBU == 'EXERGY'){
            $query .="WHERE ass.sbu = 'EXERGY'";
            
        }
        else if($filter_SBU == 'MANNVITS'){
            $query .="WHERE ass.sbu = 'MANNVITS'";
            
        }
        else if($filter_SBU == 'CLDI'){
            $query .="WHERE ass.sbu = 'CLDI'";
            
        }
        else if($filter_SBU == 'AIC'){
            $query .="WHERE ass.sbu = 'AIC'";
            
        }
        else if($filter_SBU == 'SUKIKO'){
            $query .="WHERE ass.sbu = 'SUKIKO'";
            
        }
        $result = mysqli_query($conn, $query);
                //checking if meron data
        //        echo 'Hello World';
        $no = 1;
        while($row = mysqli_fetch_array($result)){
            echo '<tr id="tr-table">
                    <th class="text-end">'.$no.'</th>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.number_format($row[5]).'</td>
                    <td>'.$row[6].'</td>
                    <td>'.date("M d, Y", strtotime($row[7])).'</td>
                    <td>'.$row[8].'</td>
                    <td>'.$row[9].'</td>
                    <td>'.$row[10].'</td>
                    <td>'.$row[11].'</td>
                    <td>'.$row[12].'</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <button class="btn btn-primary btn-sm" type="button" onclick="assignasset_loader('.$row[0].')">Assign</button>
                          <button class="btn btn-warning btn-sm" type="button" onclick="view_asset('.$row[0].')">Update</button>
                          <button class="btn btn-danger btn-sm" type="button" onclick="assetlogs('.$row[0].')">Logs</button>
                        </div>
                    </td>
                </tr>';
            $no++;
        }


    // closing connection
    mysqli_close($conn);
    }

    //load asset thru modal
    function load_asset($id){
        include 'dbcon.php';

        $query = "SELECT ass.id, ass.asset_tag, ass.asset_name, ass.descriptions, ass.serial_no, ass.price, ass.sbu, ass.date_purchase, ass.installed_os, ass.ms_office, ass.remarks, item.itemname, ass.`status`
        FROM tbl_assets ass
        INNER JOIN tbl_item item ON ass.type_of = item.id
        WHERE ass.id = '$id'";
        $result = mysqli_query($conn, $query);
        while ($rows = mysqli_fetch_array($result))
        {
            $arr[] = array(
                'id'=>$rows[0],
                'asset_tag'=>$rows[1],
                'asset_name'=>$rows[2],
                'descriptions'=>$rows[3],
                'serial_no'=>$rows[4],
                'price'=>$rows[5],
                'sbu'=>$rows[6],
                'date_purchase'=> date("Y-m-d", strtotime($rows[7])),
                'installed_os'=>$rows[8],
                'ms_office'=>$rows[9],
                'remarks'=>$rows[10],
                'type_of'=>$rows[11],
                'status'=>$rows[12]
            );
        }
        echo json_encode($arr);
        exit();
        // closing connection
        mysqli_close($conn);
    }

    //update asset details
    function  save_edited_asset($id, $asset_tag, $date_purchase, $asset_name, $serial_no, $description, $sbu, $price, $installed_os, $ms_office, $remarks, $type, $status){
        
        include 'dbcon.php';
    
        $query = "UPDATE tbl_assets SET asset_tag='$asset_tag', date_purchase='$date_purchase', asset_name='$asset_name', descriptions='$description', serial_no='$serial_no', price='$price', sbu='$sbu', installed_os='$installed_os', ms_office='$ms_office', remarks='$remarks', status='$status' WHERE id='$id'";
        
        if(mysqli_query($conn, $query)){
            echo 'updated success!';
        }else{
            echo $conn->error;
        }
        
        // closing connection
        mysqli_close($conn);
    }

    //delete asset
    function delete_asset($id){
        
        include 'dbcon.php';
        
        $query = "DELETE FROM tbl_assets WHERE id=$id";
        
        if(mysqli_query($conn, $query)){
            echo 'Delete Success!';
        }else{
            echo $conn->error;
        }
        
        // closing connection
        mysqli_close($conn);
    }

    //assigning asset thru assets
    function assignasset_loader($id){
        include 'dbcon.php';
        
        $query = "SELECT * FROM tbl_assets WHERE id = ".$id."";
        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($result)){
            
            $arr[] = array(
                'asset_tag'=>$row[1],
                'asset_name'=>$row[2],
                'descriptions'=>$row[3],
                'serial_no'=>$row[4],
                'remarks'=>$row [10],
                'type_of'=>$row[11],
                'status'=>$row[12]
            );
        }
        echo json_encode($arr);
        exit();
        
        // closing connection
        mysqli_close($conn);
    }

    function get_employee($employee_details){
        
        include 'dbcon.php';
        $search_id = mysqli_real_escape_string($conn, $employee_details);
        $query = "SELECT * 
                    FROM tbl_employees 
                    WHERE id = '$search_id'";
        
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($rows = mysqli_fetch_array($result)){
                $arr[] = array(
                    'id'=>$rows[0],
                    'first_name'=>$rows[2],
                    'last_name'=>$rows[3],
                    'sbu_id'=>$rows[10],
                    'position'=>$rows[6]
                    
                );
            }
            echo json_encode($arr);
            exit();
        }else{
            echo 'Data not Found!';
        }
        
        // closing connection
        mysqli_close($conn);
    }

    //save records
    function submit_assign($assign_id, $assign_asset_tag, $assign_asset_name, $assign_type, $assign_serial_no, $assign_description, $assign_status, $assign_remarks, $emp_id, $date_assigned, $firstname, $lastname, $emp_sbu, $position, $location){
        
        include 'dbcon.php';
        
        if($assign_status === 'In use'){
            
            echo "This asset is already assign! Choose another";
            
        }else{
            $query = "INSERT INTO tbl_records (date_created, emp_id, asset_id, location, emp_fname, emp_lname, emp_sbu, emp_position, asset_tag, asset_name, asset_descriptions, asset_serial_no, asset_type_of, asset_status, asset_remarks, record_status, acc_status) VALUES ('$date_assigned', '$emp_id', '$assign_id', '$location', '$firstname', '$lastname', '$emp_sbu', '$position', '$assign_asset_tag', '$assign_asset_name', '$assign_description', '$assign_serial_no', '$assign_type', '', '$assign_remarks', '0', '0')";
        
        
        if(mysqli_query($conn, $query)){
            echo "Assign Successful!";
            $query = "UPDATE tbl_assets ass 
                        LEFT JOIN tbl_records rec
                        ON ass.id = rec.asset_id
                        SET ass.`status` = 'In use',
                        rec.asset_status = 'In use'
                        WHERE ass.id='$assign_id'";
            if(mysqli_query($conn, $query)){
                
            }else{
                echo $conn->error;
            }

        }else{
            echo $conn->error;
        }
            
        }
        
    // closing connection
    mysqli_close($conn);
    }

    //display records
    function record_lists(){
        
        include 'dbcon.php';
        
        $query = "SELECT rec.id, ass.id, ass.asset_tag, ass.asset_name, item.itemname, ass.serial_no, ass.descriptions, CONCAT(emp.first_name,' ',emp.last_name), sbu.sbu_name, emp.position, rec.location, rec.date_created, ass.`status`, rec.asset_remarks
        FROM tbl_records rec
        INNER JOIN tbl_assets ass ON rec.asset_id = ass.id
        INNER JOIN tbl_item item ON ass.type_of = item.id
        INNER JOIN tbl_employees emp ON rec.emp_id = emp.id
        INNER JOIN tbl_sbu sbu ON emp.sbu_id = sbu.id
        WHERE rec.record_status = '0'
        ORDER BY rec.id DESC";
        $result = mysqli_query($conn, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
            echo '<tr>
            
            <th class="text-end">'.$no.'</th>
            <td>'.$row[2].'</td>
            <td>'.$row[3].'</td>
            <td>'.$row[4].'</td>
            <td>'.$row[5].'</td>
            <td>'.$row[6].'</td>
            <td>'.$row[7].'</td>
            <td>'.$row[8].'</td>
            <td>'.$row[9].'</td>
            <td>'.$row[10].'</td>
            <td>'.date("M d, Y", strtotime($row[11])).'</td>
            <td>'.$row[12].'</td>
            <td>'.$row[13].'</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button class="btn btn-warning btn-sm" type="button" onclick="view_record_detail('.$row[0].')">Update</button>
                  <button class="btn btn-danger btn-sm" type="button" onclick="return_asset_confirmation('.$row[0].')">Return</button></td>
                </div>  
            </tr>';
            
            $no++;
        }
    // closing connection
    mysqli_close($conn);
    }

    function get_asset($asset){
        
        include 'dbcon.php';
        
        $search = mysqli_real_escape_string($conn, $asset);
        $query = "SELECT ass.id, ass.asset_tag, ass.asset_name, ass.descriptions, ass.serial_no, ass.remarks, item.itemname, ass.`status`
        FROM tbl_assets ass
        INNER JOIN tbl_item item ON ass.type_of = item.id
        WHERE ass.asset_tag = '$search' 
        OR ass.id = '$search'";
        
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                $arr[] = array(
                    'id'=>$row[0],
                    'asset_tag'=>$row[1],
                    'serial_no'=>$row[4],
                    'status'=>$row[7],
                    'asset_name'=>$row[2],
                    'type_of'=>$row[6],
                    'descriptions'=>$row[3],
                    'remarks'=>$row[5],
                );
                echo json_encode($arr);
            }
        }
    
        
    // closing connection
    mysqli_close($conn);
    }

    function save_assign_record($asset_id, $assign_asset_tag_record, $assign_asset_name_record, $assign_type_record, $assign_serial_record, $assign_description_record, $assign_status_record, $assign_remarks_record, $emp_id_record, $emp_date_assigned_record, $firstname_record, $lastname_record, $emp_sbu_record, $position_record, $location_record){
        
        include 'dbcon.php';
        
        if($assign_status_record === 'In use'){
            
            echo "You can't assign this Item";
            
        }else{
            $query = "INSERT INTO tbl_records (date_created, asset_id, emp_id, location, emp_fname, emp_lname, emp_sbu, emp_position, asset_tag, asset_name, asset_descriptions, asset_type_of, asset_serial_no, asset_status, asset_remarks, record_status, acc_status) VALUES ('$emp_date_assigned_record', '$asset_id', '$emp_id_record', '$location_record', '$firstname_record', '$lastname_record', '$emp_sbu_record', '$position_record', '$assign_asset_tag_record', '$assign_asset_name_record', '$assign_description_record', '$assign_type_record', '$assign_serial_record', 'In use', '$assign_remarks_record', '0', '0')";
        
        
        if(mysqli_query($conn, $query)){
            echo "Assign Successful!";
            $query = "UPDATE tbl_assets SET status='In use' WHERE id=$asset_id";
            if(mysqli_query($conn, $query)){
                
            }else{
                echo $conn->error;
            }

        }else{
            echo $conn->error;
        }
        }
    // closing connection
    mysqli_close($conn);
    }

    function load_recorded_detail($id){
        
        include 'dbcon.php';

        $query = "SELECT * FROM tbl_records WHERE id = ".$id."";
        
        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($result)){
      
            $arr[] = array(
                'id'=>$row[0],
                'asset_id'=>$row[3],
                'asset_tag'=>$row[9],
                'asset_name'=>$row[10],
                'asset_type_of'=>$row[12],
                'asset_serial_no'=>$row[13],
                'asset_descriptions'=>$row[11],
                'asset_status'=>$row[14],
                'asset_remarks'=>$row[15],
                'emp_id'=>$row[2],
                'date_created'=>date("Y-m-d", strtotime($row[1])),
                'emp_fname'=>$row[5],
                'emp_lname'=>$row[6],
                'emp_sbu'=>$row[7],
                'emp_position'=>$row[8],
                'location'=>$row[4]

            );
        }
        echo json_encode($arr);
        exit();
    // closing connection
    mysqli_close($conn);
    }

    function save_updated_details($id, $update_remarks, $update_location){
        
        include 'dbcon.php';
        
        $query = "UPDATE tbl_records SET asset_remarks='$update_remarks', location='$update_location' WHERE id='$id'";
        
        if(mysqli_query($conn, $query)){
            echo 'Update Success!';
        }else{
            echo $conn->error;
        }
    // closing connection
    mysqli_close($conn);
    }

    function return_asset($record_id, $collectedby, $asset_remarks, $returnnote){
        
        include 'dbcon.php';
        
        $query = "INSERT INTO tbl_return (return_date, record_id, collected_by, asset_remarks, note) VALUES (NOW(), '$record_id', '$collectedby', '$asset_remarks', '$returnnote')";
        if(mysqli_query($conn, $query))
        {
            
            echo 'Return Success'; 
            
            $query = "UPDATE tbl_records rec
            LEFT JOIN tbl_assets ass ON rec.asset_id = ass.id
            SET rec.record_status = 1, rec.asset_status = '$asset_remarks', ass.`status` = '$asset_remarks'
            WHERE rec.id = '$record_id'";
            mysqli_query($conn, $query);
            
        }
        else
        {
            echo $conn->error;
        }
        // closing connection
        mysqli_close($conn);
    }
                
    function return_lists(){

            include 'dbcon.php';

            $query = "SELECT ret.id, ret.return_date, ret.collected_by, ret.asset_remarks, ret.note, ret.record_id, rec.date_created, rec.asset_id, rec.asset_tag, rec.asset_name, rec.asset_descriptions, rec.asset_type_of, rec.asset_serial_no, rec.asset_status, rec.asset_remarks, rec.emp_id, CONCAT(rec.emp_fname,' ',rec.emp_lname), rec.emp_sbu, rec.emp_position, rec.location, rec.record_status
            FROM tbl_return ret
            INNER JOIN tbl_records rec ON rec.id = ret.record_id
            WHERE rec.record_status = 1
            ORDER BY ret.return_date DESC";

            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                        <th class="text-end">'.$no.'</th>
                        <td>'.$row[0].'</td>
                        <td>'.date("M d, Y", strtotime($row[1])).'</td>
                        <td>'.$row[2].'</td>
                        <td>'.$row[3].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$row[5].'</td>
                        <td>'.date("M d, Y", strtotime($row[6])).'</td>
                        <td>'.$row[7].'</td>
                        <td>'.$row[8].'</td>
                        <td>'.$row[9].'</td>
                        <td>'.$row[10].'</td>
                        <td>'.$row[11].'</td>
                        <td>'.$row[12].'</td>
                        <td>'.$row[13].'</td>
                        <td>'.$row[14].'</td>
                        <td>'.$row[15].'</td>
                        <td>'.$row[16].'</td>
                        <td>'.$row[17].'</td>
                        <td>'.$row[18].'</td>
                        <td>'.$row[19].'</td>
                        </tr>';
                $no++;
            }
        // closing connection
        mysqli_close($conn);
        }
    
    function asset_log_details($assetid){
        
        include 'dbcon.php';

            $query = "SELECT a.id AS AssetID, r.id AS RecordID, CONCAT(r.emp_fname,' ',r.emp_lname) AS Employee, sbu.sbu_name, r.emp_position, r.location, r.date_created, ret.return_date, ret.note
            FROM tbl_assets a
            INNER JOIN tbl_records r 
            ON a.id = r.asset_id
            INNER JOIN tbl_return ret
            ON r.id = ret.record_id
            INNER JOIN tbl_employees emp
            ON r.emp_id = emp.id
            INNER JOIN tbl_sbu sbu
            ON emp.sbu_id = sbu.id
            WHERE a.id = $assetid
            GROUP BY r.id
            ORDER BY r.date_created ASC";

            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                        <th class="text-end">'.$no.'</th>
                        <td>'.$row[2].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$row[3].'</td>
                        <td>'.$row[5].'</td>
                        <td>'.date("M d, Y", strtotime($row[6])).'</td>
                        <td>'.date("M d, Y", strtotime($row[7])).'</td>
                        <td>'.$row[8].'</td>
                        </tr>';
                $no++;
            }
    // closing connection
    mysqli_close($conn);
    }

    function acc_get_employee($emp_details){
        include 'dbcon.php';
        
        if(($emp_details == '')||($emp_details == null)){
            echo 'Search Something';
        }else{
            
            $search = mysqli_real_escape_string($conn, $emp_details);
        $query = "SELECT
                        rec.id,
                        emp.id,
                        rec.date_created,
                        rec.emp_fname,
                        rec.emp_lname,
                        sbu.sbu_name,
                        dept.dept_name,
                        rec.emp_position,
                        rec.asset_tag,
                        rec.asset_name,
                        rec.asset_type_of,
                        rec.asset_descriptions,
                        rec.asset_remarks,
                        rec.record_status,
                        rec.acc_status

                    FROM tbl_employees emp
                    INNER JOIN tbl_records rec
                    ON emp.id = rec.emp_id
                    INNER JOIN tbl_sbu sbu
                    ON sbu.id = emp.sbu_id
                    INNER JOIN tbl_dept dept
                    ON dept.id = emp.dept_id

                    WHERE rec.record_status = 0
                    AND (rec.emp_id LIKE '%".$search."%'
                    OR rec.emp_fname LIKE '%".$search."%'
                    OR rec.emp_lname LIKE '%".$search."%')
                    AND rec.acc_status = 0
                    GROUP BY rec.asset_id"; 
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                        <th>Employee ID:</th>
                        <td>'.$row[1].'</td>
                        <td></td>
                        </tr>
                        <tr>
                        <th>Employee Name:</th>
                        <td>'.$row[3].' '.$row[4].'</td>
                        <td></td>
                        </tr>
                        <tr>
                        <th>Asset Tag:</th>
                        <td>'.$row[8].'</td>
                        <td></td>
                        </tr>
                        <tr style="background-color:#6A89B7;">
                        <th class="text-white">Borrowed Item:</th>
                        <td class="text-white">'.$row[10].'</td>
                        <td ><button class="btn btn-danger btn-sm" type="button" onclick="generate_single_af('.$row[0].')">Generate AF</button></td>
                        </tr>';
            }
       }else{
            echo 'No data Found';
        }
            
        }
    // closing connection
    mysqli_close($conn);
    }

    function generate_acc_form($emp_id, $pnpfullname, $f_issuer, $asset_sbu){
        include 'dbcon.php';
        
        $year = date("Y");
        $userid = $_SESSION['emp_id'];
        $_SESSION['pnpfname'] = $pnpfullname;
        $_SESSION['issuer'] = $f_issuer;
        $_SESSION['asset_SBU'] = $asset_sbu;
        $notApp = 'NA';
        
        $query = "SELECT emp_id, acc_status FROM tbl_records WHERE emp_id = '$emp_id' AND acc_status = 0";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $_SESSION['employee_id'] = $row['emp_id'];
                $accstatus = $row['acc_status'];
            }
            $query = "INSERT INTO tbl_accountability (record_id, date_created, user_id) VALUES ('$notApp', NOW(), '$userid')";
            if(mysqli_query($conn, $query))
            {
                $query = "SELECT id FROM tbl_accountability ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $acc = $row[0];
                $accid = str_pad($acc, 4, 0, STR_PAD_LEFT);
            }
        }
          
        $formid = $asset_sbu."-".$year."-".$accid;
        $_SESSION['form_id'] = $formid;
        $array[] = array(
            'Accountability_status' => $accstatus, 
            'Accountability_ID' => $accid
        );
        echo json_encode($array);

        //AF can be generate once
        $query = "UPDATE tbl_records SET acc_status = 1 WHERE emp_id = '$emp_id'";
        if(mysqli_query($conn, $query))
        {
                
        }else{
            $conn->error;
        }
    
        // closing connection
        mysqli_close($conn);

    }

    function generate_single_acf($record_id){
        include 'dbcon.php';
        $userid = $_SESSION['emp_id'];
        $query = "SELECT * FROM tbl_records WHERE id = '$record_id'";
        $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1)
            {
                while($row = mysqli_fetch_array($result))
                {
                $record_id = $row[0];
                }
                
                $query = "INSERT INTO tbl_accountability (record_id, date_created, user_id) VALUES ('$record_id', NOW(), '$userid')";
                if(mysqli_query($conn, $query))
                {
                    $query = "SELECT id FROM tbl_accountability ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    $acc = $row[0];
                    $accid = str_pad($acc, 4, 0, STR_PAD_LEFT);
                    
                    echo $accid;
                }
            }
        
                $query = "UPDATE tbl_records SET acc_status = 1 WHERE id = '$record_id'";
                if(mysqli_query($conn, $query)){
                    
                }else{
                    $conn->error;
                }
        
        $_SESSION['record_id'] = $record_id;
        $_SESSION['Acc_id'] = $accid;
    
    // closing connection
    mysqli_close($conn);
            
    }

//DASHBOARD
    function MainDevices($selected_sbu){
        include 'dbcon.php';
        
        $query = "SELECT DISTINCT(COUNT(CASE WHEN ass.`status` IN('Available','In use') then 1 ELSE NULL END)),
        COUNT(CASE WHEN ass.`status` = 'Missing' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Disposed' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Defective' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Spare of Device Available' then 1 ELSE NULL END),
        COUNT(ass.`status`)
        FROM tbl_assets ass
        LEFT JOIN tbl_item item ON ass.type_of = item.id
        WHERE item.type_of_item = 0
        ";
        
        if(($selected_sbu == null)||($selected_sbu == "")||($selected_sbu == 'ALL')){
            
        }
        else if($selected_sbu == 'PNKC'){
            $query .="AND ass.sbu = 'PNKC'";
        }
        else if($selected_sbu == 'GILI'){
            $query .="AND ass.sbu = 'GILI'";
        }
                else if($selected_sbu == 'EXERGY'){
            $query .="AND ass.sbu = 'EXERGY'";
        }
        else if($selected_sbu == 'MANNVITS'){
            $query .="AND ass.sbu = 'MANNVITS'";
        }
                else if($selected_sbu == 'CLDI'){
            $query .="AND ass.sbu = 'CLDI'";
        }
        else if($selected_sbu == 'AIC'){
            $query .="AND ass.sbu = 'AIC'";
        }
        else if($selected_sbu == 'SUKIKO'){
            $query .="AND ass.sbu = 'SUKIKO'";
        }
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $arr[] = array(
                    'Working' => $row[0],
                    'Missing' => $row[1],
                    'Disposed' => $row[2],
                    'Defective' => $row[3],
                    'Spare' => $row[4],
                    'Total' => $row[5]
                );
            }
            echo json_encode($arr);
            exit();
        }
        
    // closing connection
    mysqli_close($conn);
        
    }

    function PheripheralDevices($selected_sbu){
        include 'dbcon.php';
        
        $query = "SELECT DISTINCT(COUNT(CASE WHEN ass.`status` IN('Available','In use') then 1 ELSE NULL END)),
        COUNT(CASE WHEN ass.`status` = 'Missing' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Disposed' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Defective' then 1 ELSE NULL END),
        COUNT(CASE WHEN ass.`status` = 'Spare of Device Available' then 1 ELSE NULL END),
        COUNT(ass.`status`)
        FROM tbl_assets ass
        LEFT JOIN tbl_item item ON ass.type_of = item.id
        WHERE item.type_of_item = 1
        ";
        
        if(($selected_sbu == null)||($selected_sbu == "")||($selected_sbu == 'ALL')){
            
        }
        else if($selected_sbu == 'PNKC'){
            $query .="AND ass.sbu = 'PNKC'";
        }
        else if($selected_sbu == 'GILI'){
            $query .="AND ass.sbu = 'GILI'";
        }
                else if($selected_sbu == 'EXERGY'){
            $query .="AND ass.sbu = 'EXERGY'";
        }
        else if($selected_sbu == 'MANNVITS'){
            $query .="AND ass.sbu = 'MANNVITS'";
        }
                else if($selected_sbu == 'CLDI'){
            $query .="AND ass.sbu = 'CLDI'";
        }
        else if($selected_sbu == 'AIC'){
            $query .="AND ass.sbu = 'AIC'";
        }
        else if($selected_sbu == 'SUKIKO'){
            $query .="AND ass.sbu = 'SUKIKO'";
        }
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $arr[] = array(
                    'Working' => $row[0],
                    'Missing' => $row[1],
                    'Disposed' => $row[2],
                    'Defective' => $row[3],
                    'Spare' => $row[4],
                    'Total' => $row[5]
                );
            }
            echo json_encode($arr);
            exit();
        }
        
    // closing connection
    mysqli_close($conn);
        
    }

//table assets status
    function dashboard_table_assets($selected_sbu){
        
        include 'dbcon.php';
        
        switch($selected_sbu)
        {
            case 'PNKC':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'PNKC') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'PNKC') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'PNKC') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'PNKC') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'PNKC') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'PNKC') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'GILI':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'GILI') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'GILI') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'GILI') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'GILI') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'GILI') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'GILI') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'EXERGY':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'EXERGY') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'EXERGY') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'EXERGY') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'EXERGY') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'EXERGY') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'EXERGY') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'MANNVITS':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'MANNVITS') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'MANNVITS') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'MANNVITS') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'MANNVITS') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'MANNVITS') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'MANNVITS') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'CLDI':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'CLDI') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'CLDI') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'CLDI') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'CLDI') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'CLDI') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'CLDI') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'AIC':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'AIC') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'AIC') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'AIC') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'AIC') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'AIC') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'AIC') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'SUKIKO':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'SUKIKO') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'SUKIKO') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'SUKIKO') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'SUKIKO') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'SUKIKO') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'SUKIKO') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            default:
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')) AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of) AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 0";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
        }
        
        // closing connection
        mysqli_close($conn);

    }

//table assets status(pheripherals)
    function dashboard_assetsstatus_pheripherals($selected_sbu){
        
        include 'dbcon.php';
        switch($selected_sbu)
        {
            case 'PNKC':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'PNKC') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'PNKC') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'PNKC') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'PNKC') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'PNKC') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'PNKC') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'GILI':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'GILI') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'GILI') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'GILI') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'GILI') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'GILI') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'GILI') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'EXERGY':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'EXERGY') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'EXERGY') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'EXERGY') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'EXERGY') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'EXERGY') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'EXERGY') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'MANNVITS':
            break;
            case 'CLDI':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'CLDI') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'CLDI') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'CLDI') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'CLDI') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'CLDI') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'CLDI') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'AIC':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'AIC') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'AIC') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'AIC') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'AIC') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'AIC') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'AIC') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            case 'SUKIKO':
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')
                                AND ass.sbu = 'SUKIKO') AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing'
                                AND ass.sbu = 'SUKIKO') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed'
                                AND ass.sbu = 'SUKIKO') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective'
                                AND ass.sbu = 'SUKIKO') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available'
                                AND ass.sbu = 'SUKIKO') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.sbu = 'SUKIKO') AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
            default:
                $query = "SELECT
                                itemname,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` IN ('Available', 'In use')) AS Working,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Missing') AS Missing,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Disposed') AS Disposed,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Defective') AS Defective,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of
                                AND ass.`status` = 'Spare of Device Available') AS Spare,
                                (SELECT COUNT(type_of)
                                FROM tbl_assets ass
                                WHERE item.id = type_of) AS Total
                        FROM tbl_item item
                        WHERE item.type_of_item = 1";
                $result = mysqli_query($conn, $query);
                echo $conn->error;
                while($row = mysqli_fetch_array($result))
                {
                    echo '<tr>
                                <th>'.$row[0].'</th>
                                <td class="text-end">'.$row[1].'</td>
                                <td class="text-end">'.$row[2].'</td>
                                <td class="text-end">'.$row[3].'</td>
                                <td class="text-end">'.$row[4].'</td>
                                <td class="text-end">'.$row[5].'</td>
                                <td class="text-end">'.$row[6].'</td>
                                </tr>';
                }
            break;
        }
        
        // closing connection
        mysqli_close($conn);
        
    }

//Charts
    function getdatatochart($selected_sbu){
        include 'dbcon.php';

        $query = "SELECT itemname,count(*) FROM tbl_item A 
                    LEFT JOIN tbl_assets B ON A.id = B.type_of
                    where A.type_of_item = 0
                    group by itemname";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array(
                'itemtype'=>$row[0],
                'total'=>$row[1]
            );
        }
        echo json_encode($arr);
        // closing connection
        mysqli_close($conn);
    }

    function getdatatochartP(){
        include 'dbcon.php';
        
        $query = "SELECT itemname,count(*) FROM tbl_item A 
                    LEFT JOIN tbl_assets B ON A.id = B.type_of
                    where A.type_of_item = 1
                    group by itemname";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array(
                'itemtype'=>$row[0],
                'total'=>$row[1]
            );
        }
        echo json_encode($arr);
        // closing connection
        mysqli_close($conn);
        
    }

//Accounts
    function userlists(){
        include 'dbcon.php';
        
        $query = "SELECT
                    emp.id,
                    emp.employee_id,
                    CONCAT(emp.last_name,' ', emp.first_name) AS EmpName,
                    emp.email,
                    emp.user_name,
                    sbu.sbu_name,
                    dept.dept_name,
                    emp.position,
                    us.user_legend
                FROM tbl_employees emp
                INNER JOIN tbl_sbu sbu
                ON emp.sbu_id = sbu.id
                INNER JOIN tbl_dept dept 
                ON emp.dept_id = dept.id
                INNER JOIN tbl_users us 
                ON emp.user_type = us.id
                ORDER BY emp.id DESC";
        $result = mysqli_query($conn, $query);
//        $date = date("Ym");
        $no = 1;
        while($row = mysqli_fetch_array($result)){
            
            $id = str_pad($row[0], 4, 0, STR_PAD_LEFT);
//            $id = $date.''.$idd;
            echo '<tr>
                    <th class="text-end">'.$no.'</th>
                    
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[5].'</td>
                    <td>'.$row[8].'</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning btn-sm" type="button" onclick="updateusersaccountmodal('.$row[0].')">Update</button>
                            <button class="btn btn-danger btn-sm" type="button" onclick="changeusersmodal('.$row[0].')">Recover</button>
                        </div>
                    </td>
                </tr>';
//            $id++;
            $no++;
        }
    // closing connection
        mysqli_close($conn);
    }

    function addusers($lastname, $firstname, $midinitial, $username, $email, $password_1, $password_2, $user_type, $emp_sbu, $position, $department){
        include 'dbcon.php';
        
        $date = date('Y');
        
        $query = "SELECT id from tbl_employees ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $empid = $row[0];
        $id = strtoupper($firstname[0] . $lastname[0]) . $date . str_pad($empid + 1, 4, 0, STR_PAD_LEFT);
        
        $query = "INSERT INTO tbl_employees (employee_id, first_name, last_name, mid_initial, email, user_name, position, password_1, password_2, sbu_id, dept_id, user_type) VALUE ('$id', '$firstname', '$lastname', '$midinitial', '$email', '$username', '$position', '$password_1', '$password_2', '$emp_sbu', '$department', '$user_type')";
        
        if(mysqli_query($conn, $query)){
            echo 'created';
        }else{
            echo $conn->error;
        }
        
    // closing connection
        mysqli_close($conn);
    }

    function get_user_details($id){
        include 'dbcon.php';

        $query = "SELECT *
                    FROM tbl_employees
                    WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                
                $arr[] = array(
                    'first_name'=>$row[2],
                    'last_name'=>$row[3],
                    'mid_initial'=>$row[4],
                    'email'=>$row[5],
                    'user_name'=>$row[6],
                    'position'=>$row[7],
                    'password_1'=>$row[8],
                    'password_2'=>$row[9],
                    'sbu_id'=>$row[10],
                    'dept'=>$row[11]
                );
            }
            echo json_encode($arr);
            exit();
    // closing connection
        mysqli_close($conn);
    }

    function updateuseraccount($employee_id, $lastname, $firstname, $midinitial, $username, $email, $password_1, $password_2, $emp_sbu, $position, $department){
        include 'dbcon.php';
        
        $query = "UPDATE tbl_employees SET first_name = '$firstname', last_name='$lastname', mid_initial = '$midinitial', email = '$email', user_name = '$username', position = '$position', password_1 = '$password_1', password_2 = '$password_2', sbu_id = '$emp_sbu', dept_id = '$department' WHERE id = '$employee_id'";
        
        if(mysqli_query($conn, $query)){
            echo 'Save Changes';
        }else{
            echo $conn->error;
        }
    
    // closing connection
        mysqli_close($conn);
        
    }

    function changeuserpass($emp_id, $password){
        
        include 'dbcon.php';
        
        $query = "UPDATE tbl_employees SET password_1 = '$password', password_2 = '$password' WHERE id = '$emp_id'";
        
        if(mysqli_query($conn, $query)){
            echo 'Save Changes';
        }else{
            echo $conn->error;
        }
    // closing connection
        mysqli_close($conn);
    }

    function update_users_account($id, $usertype){
        
        include 'dbcon.php';
        
        $query = "SELECT user_type FROM tbl_employees WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                echo $row[0];
            }
            
            $query = "UPDATE tbl_employees SET user_type = '$usertype' WHERE id = '$id'";
                if(mysqli_query($conn, $query)){
                    
                }else{
                    $conn->error;
                }
        }
        
    // closing connection
        mysqli_close($conn);
    }

    function mass_upload($file_value){
        
        include 'dbcon.php';
        echo $file_value;
//        if(!empty($_FILES["assets_file"]["name"]))
//        {
//            $allowed_text = array("csv");
//            $extension = end(explode(".", $file_value));
//            if(in_array($extension, $allowed_text))
//            {
//                $file_data = fopen($file_value, 'r');
//                fgetcsv($file_data);
//                while($row = fgetcsv($file_data))
//                {
//                    $name = mysqli_real_escape_string($connect, $row[0]);  
//                    $address = mysqli_real_escape_string($connect, $row[1]);  
//                    $gender = mysqli_real_escape_string($connect, $row[2]);  
//                    $designation = mysqli_real_escape_string($connect, $row[3]);
//                    $age = mysqli_real_escape_string($connect, $row[4]);
//                    
//                    $query = "INSERT INTO tbl_sample(name, address, gender, designation, age) VALUES ($name, $address, $gender, $designation, $age)";
//                    
//                    if(mysqli_query($conn, $query))
//                    {
//                        echo 'Succes';
//                    }
//                    else
//                    {
//                        echo $conn->error;
//                    }
//                }
//            }
//        }
    }
?>


   