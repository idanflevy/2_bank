<template>
  <section class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-12">
        
            <div class="card" v-if="$gate.isAdmin()">
              <div class="card-header">
                <h3 class="card-title">User List</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-sm btn-primary" @click="newModal">
                      <i class="fa fa-plus-square"></i>
                      Add New
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Type</th>                    
                      <th>Email</th>
                      <th>CustomerID</th>
                      <th>Account_Number</th>
                      <th>Account_Category</th>
                      <th>First_Name</th>
                      <th>Last_Name</th>
                      <th>Middle_Name</th>
                      <th>DOB</th>
                      <th>ID_Number</th>
                      <th>Country</th>
                      <th>City</th>
                      <th>Mobile</th>
                      <th>Street</th>
                      <th>Transfer_Count</th>
                      <th>Transfer_Status</th>
                      <th>Prefferd_Name</th>
                      <th>Prefferd_City</th>
                      <th>Status</th>

                      <th>Email Verified?</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="user in users.data" :key="user.id">

                      <td>{{user.id}}</td>
                      <td class="text-capitalize">{{user.type}}</td>
                      <td class="text-capitalize">{{user.email}}</td>
                      <td class="text-capitalize">{{user.customer_id}}</td>
                      <td class="text-capitalize">{{user.account_number}}</td>
                      <td class="text-capitalize">{{user.customer_category}}</td>
                      <td class="text-capitalize">{{user.middle_name}}</td>
                      <td class="text-capitalize">{{user.firstname}}</td>
                      <td class="text-capitalize">{{user.lastname}}</td>
                      <td class="text-capitalize">{{user.dob}}</td>
                      <td class="text-capitalize">{{user.idcard}}</td>
                      <td class="text-capitalize">{{user.country}}</td>
                      <td class="text-capitalize">{{user.city}}</td>
                      <td class="text-capitalize">{{user.mobile}}</td>
                      <td class="text-capitalize">{{user.street}}</td>
                      <td class="text-capitalize">{{user.transfer_count}}</td>
                      <td class="text-capitalize">{{user.transfer_status}}</td>
                      <td class="text-capitalize">{{user.preferred_name}}</td>
                      <td class="text-capitalize">{{user.preferred_city}}</td>
                      <td class="text-capitalize">{{user.status}}</td>
                     
                      <td :inner-html.prop="user.email_verified_at | yesno"></td>
                      <td>{{user.created_at}}</td>

                      <td>

                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>


        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode">Create New User</h5>
                    <h5 class="modal-title" v-show="editmode">Update User's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- <form @submit.prevent="createUser"> -->

                <form @submit.prevent="editmode ? updateUser() : createUser()">
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="form.email" type="text" name="email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Customer ID</label>
                            <input v-model="form.customer_id" type="text" name="customer_id"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('customer_id') }">
                            <has-error :form="form" field="customer_id"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Account Number</label>
                            <input v-model="form.account_number" type="text" name="account_number"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('account_number') }">
                            <has-error :form="form" field="account_number"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Customer Category</label>
                            <input v-model="form.customer_category" type="text" name="customer_category"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('customer_category') }">
                            <has-error :form="form" field="customer_category"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Middle Name</label>
                            <input v-model="form.middle_name" type="text" name="middle_name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('middle_name') }">
                            <has-error :form="form" field="middle_name"></has-error>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input v-model="form.firstname" type="text" name="firstname"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                            <has-error :form="form" field="firstname"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input v-model="form.lastname" type="text" name="lastname"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                            <has-error :form="form" field="lastname"></has-error>
                        </div>

                        <div class="form-group">
                            <label>DOB</label>
                            <input v-model="form.dob" type="text" name="dob"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                            <has-error :form="form" field="dob"></has-error>
                        </div>

                        <div class="form-group">
                            <label>ID Card Number</label>
                            <input v-model="form.idcard" type="text" name="idcard"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('idcard') }">
                            <has-error :form="form" field="idcard"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input v-model="form.country" type="text" name="country"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                            <has-error :form="form" field="country"></has-error>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input v-model="form.city" type="text" name="city"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                            <has-error :form="form" field="city"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input v-model="form.mobile" type="text" name="mobile"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('mobile') }">
                            <has-error :form="form" field="mobile"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input v-model="form.street" type="text" name="street"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('street') }">
                            <has-error :form="form" field="street"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Transfer Count</label>
                            <input v-model="form.transfer_count" type="text" name="transfer_count"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('transfer_count') }">
                            <has-error :form="form" field="transfer_count"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Transfer Status</label>
                            <!-- <input v-model="form.city" type="text" name="city"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('city') }"> -->

                                <textarea name="transfer_count"  v-model="form.transfer_status" id="" cols="30" rows="10"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('transfer_status') }"
                                ></textarea>
                            <has-error :form="form" field="transfer_status"></has-error>
                        </div>

                       
                        <div class="form-group">
                            <label>Prefferd Name</label>
                            <input v-model="form.preferred_name" type="text" name="preferred_name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('preferred_name') }">
                            <has-error :form="form" field="preferred_name"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Prefferd City</label>
                            <input v-model="form.preferred_city" type="text" name="preferred_city"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('preferred_city') }">
                            <has-error :form="form" field="preferred_city"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <input v-model="form.status" type="text" name="status"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                            <has-error :form="form" field="status"></has-error>
                        </div>

                        
                    
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form.password" type="password" name="password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" autocomplete="false">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    
                        <div class="form-group">
                            <label>User Role</label>
                            <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">Select User Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">Standard User</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
    export default {
        data () {
            return {
                editmode: false,
                users : {},
                form: new Form({
                    id : '',
                    type : '',
                    firstname: '',
                    email: '',
                    password: '',
                    customer_id:'',
                    account_number:'',
                    customer_category:'',
                    middle_name:'',
                    firstname:'',
                    middle_name:'',
                    lastname:'',
                    dob:'',
                    idcard:'',
                    country:'',
                    city:'',
                    mobile:'',
                    street:'',
                    transfer_count:'',
                    transfer_status:'',
                    preferred_name:'',
                    preferred_city:'',
                    status:'',
                    email_verified_at: '',
                })
            }
        },
        methods: {

            getResults(page = 1) {

                  this.$Progress.start();
                  
                  axios.get('api/user?page=' + page).then(({ data }) => (this.users = data.data));

                  this.$Progress.finish();
            },
            updateUser(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form.put('api/user/'+this.form.id)
                .then((response) => {
                    // success
                    $('#addNew').modal('hide');
                    Toast.fire({
                      icon: 'success',
                      title: response.data.message
                    });
                    this.$Progress.finish();
                        //  Fire.$emit('AfterCreate');

                    this.loadUsers();
                })
                .catch(() => {
                    this.$Progress.fail();
                });

            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        // Send request to the server
                         if (result.value) {
                                this.form.delete('api/user/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        );
                                    // Fire.$emit('AfterCreate');
                                    this.loadUsers();
                                }).catch((data)=> {
                                  Swal.fire("Failed!", data.message, "warning");
                              });
                         }
                    })
            },
          loadUsers(){
            this.$Progress.start();

            if(this.$gate.isAdmin()){
              axios.get("api/user").then(({ data }) => (this.users = data.data));
            }

            this.$Progress.finish();
          },
          
          createUser(){

              this.form.post('api/user')
              .then((response)=>{
                  $('#addNew').modal('hide');

                  Toast.fire({
                        icon: 'success',
                        title: response.data.message
                  });

                  this.$Progress.finish();
                  this.loadUsers();

              })
              .catch(()=>{

                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });
              })
          }

        },
        mounted() {
            console.log('User Component mounted.')
        },
        created() {

            this.$Progress.start();
            this.loadUsers();
            this.$Progress.finish();
        }
    }
</script>
