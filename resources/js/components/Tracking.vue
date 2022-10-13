<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" v-if="$gate.isAdmin()">
            <div class="card-header">
              <h3 class="card-title">Tracking Records</h3>

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
                    <th>Tracking_Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Activities</th>
                    <th>Location</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="tracking in trackings.data" :key="tracking.id">
                    <td>{{ tracking.id }}</td>

                    <td class="text-capitalize">{{ tracking.gi_carrier_ref_no }}</td>
                    <td class="text-capitalize">{{ tracking.ti_date | myDate }}</td>
                    <td class="text-capitalize">{{ tracking.ti_time | myTime }}</td>
                    <td class="text-capitalize">{{ tracking.ti_activities }}</td>
                    <td class="text-capitalize">{{ tracking.ti_location }}</td>

                    <td>
                      <a href="#" @click="editModal(tracking)">
                        <i class="fa fa-edit blue"></i>
                      </a>
                      /
                      <a href="#" @click="deleteTracking(tracking.id)">
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
                :data="trackings"
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
              <h5 class="modal-title" v-show="!editmode">Create New tracking</h5>
              <h5 class="modal-title" v-show="editmode">Update tracking's Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- <form @submit.prevent="createTracking"> -->

            <form @submit.prevent="editmode ? updateTracking() : createTracking()">
              <div class="modal-body">
                <div class="form-group">
                  <label>Tracking Number</label>
                  <input
                    v-model="form.gi_carrier_ref_no"
                    type="text"
                    name="gi_carrier_ref_no"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('gi_carrier_ref_no') }"
                  />
                  <has-error :form="form" field="gi_carrier_ref_no"></has-error>
                </div>

                <!-- <input
                    type="text"
                    name="ti_date"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('ti_date') }"
                  /> -->

                <div class="form-group">
                  <label>Date</label>

                  <v-date-picker mode="" :masks="masks" v-model="form.ti_date">
                    <template v-slot="{ inputValue, inputEvents }">
                      <input
                        class="form-control"
                        :value="inputValue"
                        v-on="inputEvents"
                        name="ti_date"
                        :class="{ 'is-invalid': form.errors.has('ti_date') }"
                      />
                    </template>
                  </v-date-picker>

                  <has-error :form="form" field="ti_date"></has-error>
                </div>

                <div class="form-group">
                  <label>Activities</label>
                  <input
                    v-model="form.ti_activities"
                    type="text"
                    name="ti_activities"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('ti_activities') }"
                  />
                  <has-error :form="form" field="ti_activities"></has-error>
                </div>

                <div class="form-group">
                  <label>Time</label>

                  <v-date-picker mode="time" :masks="masks" v-model="form.ti_time">
                    <template v-slot="{ inputValue, inputEvents }">
                      <input
                        class="form-control"
                        :value="inputValue"
                        v-on="inputEvents"
                        name="ti_time"
                        :class="{ 'is-invalid': form.errors.has('ti_time') }"
                      />
                    </template>
                  </v-date-picker>

                  <has-error :form="form" field="ti_time"></has-error>
                </div>

                <div class="form-group">
                  <label>Location</label>
                  <input
                    v-model="form.ti_location"
                    type="text"
                    name="ti_location"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('ti_location') }"
                  />
                  <has-error :form="form" field="ti_location"></has-error>
                </div>
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
      masks: {
        input: "DD-MM-YYYY",
      },
      editmode: false,
      trackings: {},
      form: new Form({
        id: "",
        gi_carrier_ref_no: "",
        ti_date: "",
        ti_time: "",
        ti_activities: "",
        ti_location: "",
      }),
    };
  },
  methods: {
    getResults(page = 1) {
      this.$Progress.start();

      axios
        .get("api/tracking?page=" + page)
        .then(({ data }) => (this.trackings = data.data));

      this.$Progress.finish();
    },
    updateTracking() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("api/tracking/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');

          this.loadTrackings();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(tracking) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(tracking);
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteTracking(id) {
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
          this.form.delete("api/tracking/" + id).then(() => {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            // Fire.$emit('AfterCreate');
            this.loadTrackings();
          });
          // .catch((data) => {
          //   Swal.fire("Failed!", data.message, "warning");
          // });
        }
      });
    },
    loadTrackings() {
      this.$Progress.start();

      // if(this.$gate.isAdmin()){
      axios.get("api/tracking").then(({ data }) => (this.trackings = data.data));
      //console.log(trackings);
      // }

      this.$Progress.finish();
    },

    createTracking() {
      this.form
        .post("api/tracking")
        .then((response) => {
          $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$Progress.finish();
          this.loadTrackings();
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
    console.log("tracking Component mounted.");
  },
  created() {
    this.$Progress.start();
    this.loadTrackings();
    this.$Progress.finish();
  },
};
</script>
