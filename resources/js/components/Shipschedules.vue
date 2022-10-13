<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" v-if="$gate.isAdmin()">
            <div class="card-header">
              <h3 class="card-title">Ship Schedule</h3>

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
                    <th>Liner</th>
                    <th>Vessel_Name</th>
                    <th>Voyage_Number</th>
                    <th>Vessel_Type</th>
                    <th>Rtn_No.</th>
                    <th>Arrival_Status</th>
                    <th>Arrivale_Date</th>
                    <th>Departure_Status</th>
                    <th>Departure_Date</th>
                    <th>ETA</th>
                    <th>Invoicing_Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="shipschedule in shipschedules.data" :key="shipschedule.id">
                    <td>{{ shipschedule.id }}</td>
                    <td class="text-capitalize">{{ shipschedule.liner }}</td>
                    <td class="text-capitalize">{{ shipschedule.vessel_name }}</td>
                    <td class="text-capitalize">{{ shipschedule.voyage_no }}</td>
                    <td class="text-capitalize">{{ shipschedule.vessel_type }}</td>
                    <td class="text-capitalize">{{ shipschedule.rotation_no }}</td>
                    <td class="text-capitalize">{{ shipschedule.arrival_status }}</td>
                    <td class="text-capitalize">{{ shipschedule.arrival_date }}</td>
                    <td class="text-capitalize">{{ shipschedule.departure_status }}</td>

                    <td class="text-capitalize">{{ shipschedule.departure_date }}</td>
                    <td class="text-capitalize">{{ shipschedule.eta }}</td>
                    <td class="text-capitalize">{{ shipschedule.invoice_status }}</td>

                    <!-- <td>{{shipschedule.created_at}}</td> -->

                    <td>
                      <a href="#" @click="editModal(shipschedule)">
                        <i class="fa fa-edit blue"></i>
                      </a>
                      /
                      <a href="#" @click="deleteUser(shipschedule.id)">
                        <i class="fa fa-trash red"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <pagination
                :data="shipschedules"
                @pagination-change-page="getResults"
              ></pagination>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div v-if="!$gate.isAdmin()">
        <not-found></not-found>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">Create New Shipschedule</h5>
              <h5 class="modal-title" v-show="editmode">Update Shipschedule's Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- <form @submit.prevent="createUser"> -->

            <form @submit.prevent="editmode ? updateUser() : createUser()">
              <div class="modal-body">
                <div class="form-group">
                  <label>Liner</label>
                  <input
                    v-model="form.liner"
                    type="text"
                    name="liner"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('liner') }"
                  />
                  <has-error :form="form" field="liner"></has-error>
                </div>
                <div class="form-group">
                  <label>Vessel Name</label>
                  <input
                    v-model="form.vessel_name"
                    type="text"
                    name="vessel_name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('vessel_name') }"
                  />
                  <has-error :form="form" field="vessel_name"></has-error>
                </div>
                <div class="form-group">
                  <label>Voyage Number</label>
                  <input
                    v-model="form.voyage_no"
                    type="text"
                    name="voyage_no"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('voyage_no') }"
                  />
                  <has-error :form="form" field="voyage_no"></has-error>
                </div>

                <div class="form-group">
                  <label>Vessel Type</label>
                  <input
                    v-model="form.vessel_type"
                    type="text"
                    name="vessel_type"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('vessel_type') }"
                  />
                  <has-error :form="form" field="vessel_type"></has-error>
                </div>

                <div class="form-group">
                  <label>Rtn Number</label>
                  <input
                    v-model="form.rotation_no"
                    type="text"
                    name="rotation_no"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('rotation_no') }"
                  />
                  <has-error :form="form" field="rotation_no"></has-error>
                </div>

                <div class="form-group">
                  <label>Arrival Status</label>
                  <input
                    v-model="form.arrival_status"
                    type="text"
                    name="arrival_status"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('arrival_status') }"
                  />
                  <has-error :form="form" field="arrival_status"></has-error>
                </div>

                <div class="form-group">
                  <label>Arrival Date</label>
                  <input
                    v-model="form.arrival_date"
                    type="text"
                    name="arrival_date"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('arrival_date') }"
                  />
                  <has-error :form="form" field="arrival_date"></has-error>
                </div>

                <div class="form-group">
                  <label>Departure status</label>
                  <input
                    v-model="form.departure_status"
                    type="text"
                    name="departure_status"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('departure_status') }"
                  />
                  <has-error :form="form" field="departure_status"></has-error>
                </div>

                <div class="form-group">
                  <label>Departure date</label>
                  <input
                    v-model="form.departure_date"
                    type="text"
                    name="departure_date"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('departure_date') }"
                  />
                  <has-error :form="form" field="departure_date"></has-error>
                </div>

                <div class="form-group">
                  <label>ETA</label>
                  <input
                    v-model="form.eta"
                    type="text"
                    name="eta"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('eta') }"
                  />
                  <has-error :form="form" field="eta"></has-error>
                </div>

                <div class="form-group">
                  <label>Invoice_Status</label>
                  <input
                    v-model="form.invoice_status"
                    type="text"
                    name="invoice_status"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('invoice_status') }"
                  />
                  <has-error :form="form" field="invoice_status"></has-error>
                </div>

                <!-- <div class="form-group">
                            <label>User Role</label>
                            <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">Select User Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">Standard User</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  Close
                </button>
                <button v-show="editmode" type="submit" class="btn btn-success">
                  Update
                </button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">
                  Create
                </button>
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
  data() {
    return {
      editmode: false,
      shipschedules: {},
      form: new Form({
        id: "",
        liner: "",
        vessel_name: "",
        voyage_no: "",
        vessel_type: "",
        rotation_no: "",
        arrival_date: "",
        arrival_status: "",
        departure_status: "",
        departure_date: "",
        eta: "",
        invoice_status: "",
      }),
    };
  },
  methods: {
    getResults(page = 1) {
      this.$Progress.start();

      axios
        .get("api/shipschedule?page=" + page)
        .then(({ data }) => (this.shipschedules = data.data));

      this.$Progress.finish();
    },
    updateUser() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("api/shipschedule/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');

          this.loadUsers();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(shipschedule) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(shipschedule);
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteUser(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("api/shipschedule/" + id)
            .then(() => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              // Fire.$emit('AfterCreate');
              this.loadUsers();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    loadUsers() {
      this.$Progress.start();

      // if(this.$gate.isAdmin()){
      axios.get("api/shipschedule").then(({ data }) => (this.shipschedules = data.data));
      console.log(shipschedules);
      // }

      this.$Progress.finish();
    },

    createUser() {
      this.form
        .post("api/shipschedule")
        .then((response) => {
          $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$Progress.finish();
          this.loadUsers();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
  },
  mounted() {
    console.log("shipschedule Component mounted.");
  },
  created() {
    this.$Progress.start();
    this.loadUsers();
    this.$Progress.finish();
  },
};
</script>
