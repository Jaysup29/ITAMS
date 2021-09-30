<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">
        <h4 class="py-1 text-white">Account</h4>
    </div>
    <div class="container-fluid mt-3" id="ac_sample">
        <div class="row g-2 mx-1">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="">
                    <div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
                      <div class="accordion-item rounded-top">
                        <h2 class="accordion-header rounded-top" id="flush-headingOne">
                          <button class="accordion-button collapsed rounded-top " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" id="wan">
                            Add User
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-parent="#accordionFlushExample">
                          <div class="accordion-body">
                              <form class="row g-1" id="form1">
                                <div class="col-lg-5 col-md-12">
                                    <label for="add_lname" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="add_lname" placeholder="">
                                  </div>
                                <div class="col-lg-5 col-md-12">
                                    <label for="add_fname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="add_fname" placeholder="">
                                  </div>
                                <div class="col-lg-2 col-md-12">
                                    <label for="add_mi" class="form-label">M.I</label>
                                    <input type="text" class="form-control" id="add_mi" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="add_uname" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="add_uname" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="add_email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="add_email" placeholder="">
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="add_pword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="add_pword1" placeholder="">
                                    <input type="checkbox" onclick="addshowpass()">&nbsp;Show Password
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="add_pword" class="form-label">Re-type Password</label>
                                    <input type="password" class="form-control" id="add_pword2" placeholder="">
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                      <label for="usertype" class="form-label">User Type</label>
                                      <select id="usertype" class="form-select" required>
                                        <option value="2">User</option>
                                        <option value="1">Admin</option>
                                        <option value="0">SuperAdmin</option>
                                      </select>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                      <label for="add_sbu" class="form-label">SBU</label>
                                      <select id="add_sbu" class="form-select" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="1">AIC</option>
                                        <option value="2">EXERGY</option>
                                        <option value="3">GILI</option>
                                        <option value="4">PNKC</option>
                                        <option value="5">MANNVITS</option>
                                        <option value="6">CLDI</option>
                                        <option value="7">SUKIKO</option>
                                      </select>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="add_pos" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="add_pos" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="add_dept" class="form-label">Department</label>
                                      <select id="add_dept" class="form-select" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="1">Engineering</option>
                                        <option value="2">Accounting</option>
                                        <option value="3">HR</option>
                                        <option value="4">IT</option>
                                      </select>
                                  </div>
                              </form>
                                <div class="col-lg-12 col-md-12 mt-3 d-grid">
                                    <button class="btn btn-primary" onclick="adduser()">Save</button>
                                  </div>
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Update Account
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                                <form class="row g-1" id="form2">
                                <div class="col-lg-5 col-md-12">
                                    <label for="update_lname" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="update_lname" placeholder="">
                                  </div>
                                <div class="col-lg-5 col-md-12">
                                    <label for="update_fname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="update_fname" placeholder="">
                                  </div>
                                <div class="col-lg-2 col-md-12">
                                    <label for="update_mi" class="form-label">M.I</label>
                                    <input type="text" class="form-control" id="update_mi" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="update_uname" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="update_uname" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="update_email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="update_email" placeholder="">
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="update_pword1" class="form-label">Password</label>
                                    <input type="password" class="form-control mb-1" id="update_pword1" placeholder="">
                                    <input type="checkbox" onclick="updateshowpass()">&nbsp;Show Password
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="update_pword2" class="form-label">Re-type Password</label>
                                    <input type="password" class="form-control" id="update_pword2" placeholder="">
                                  </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                      <label for="update_sbu" class="form-label">SBU</label>
                                      <select id="update_sbu" class="form-select" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="1">AIC</option>
                                        <option value="2">EXERGY</option>
                                        <option value="3">GILI</option>
                                        <option value="4">PNKC</option>
                                        <option value="5">MANNVITS</option>
                                        <option value="6">CLDI</option>
                                        <option value="7">SUKIKO</option>
                                      </select>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="update_pos" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="update_pos" placeholder="">
                                  </div>
                                <div class="col-lg-6 col-md-12 mt-2">
                                    <label for="update_dept" class="form-label">Department</label>
                                      <select id="update_dept" class="form-select" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="1">Engineering</option>
                                        <option value="2">Accounting</option>
                                        <option value="3">HR</option>
                                        <option value="4">IT</option>
                                      </select>
                                  </div>
                              </form>
                                <div class="col-lg-12 col-md-12 mt-3 d-grid">
                                    <button class="btn btn-primary" onclick="updateuserdetails()">Save Changes</button>
                                  </div>
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item rounded-bottom">
                        <h2 class="accordion-header rounded-bottom" id="flush-headingThree">
                          <button class="accordion-button collapsed rounded-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Deactivate
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body bg-dark">
                                <h3 class="text-center text-danger">Under Construction Function</h3>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="bg-white shadow-sm p-3 rounded" style="height: 86vh; overflow: auto;">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h5 class="">Registered Users</h5>
                        </div>
                        <div class="input-group rounded w-25">
                            <input type="search" class="form-control rounded-pill" name="search_text" id="search_users" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        </div>
                    </div>
                    <table class="table table-hover table-default" >
                        <thead class="shadow-sm sticky-top" style="background-color: #6A89B7;">
                            <tr>
                            <th scope="col" class="text-end">#</th>
<!--                            <th scope="col">ID</th>-->
                            <th scope="col" class="fs-6">Employee ID</th>
                            <th scope="col" class="fs-6">Employee Name</th>
                            <th scope="col" class="fs-6">Email</th>
                            <th scope="col" class="fs-6">Username</th>
                            <th scope="col" class="fs-6">SBU</th>
                            <th scope="col" class="fs-6">Type</th>
                            <th scope="col" class="text-center fs-6">Action</th>
                            </tr>
                        </thead>
                        <tbody id="users">
                        </tbody>
                    </table>
<!--
                    <div class="spinner-border text-primary" role="status" id="spinner" style="position: absolute; top: 50%; left: 65%;">
                  <span class="visually-hidden">Loading...</span>
                </div>
-->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    userlist();
    getuserdetails();
});
    
$(document).ready(function(){
  $("#search_users").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#users tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
function addshowpass(){
  var x = document.getElementById("add_pword1");
  var y = document.getElementById("add_pword2");
  if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}
function updateshowpass() {
  var x = document.getElementById("update_pword1");
  var y = document.getElementById("update_pword2");
  if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}
</script>

