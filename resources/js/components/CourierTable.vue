<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <router-link to="/courier" class="nav-link"
                    >Add Shipper & Reciever Information
                  </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="/courier-records" class="nav-link active show"
                    >Update Cargo Info
                  </router-link>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <section class="content p-3">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card" v-if="$gate.isAdmin()">
                      <div class="card-header">
                        <h3 class="card-title">Update Cargo Information</h3>

                        <div class="card-tools">
                          <!-- <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            @click="newModal"
                          >
                            <i class="fa fa-plus-square"></i>
                            Add New
                          </button> -->
                        </div>
                      </div>

                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Tracking_Number</th>
                              <th>Origin</th>
                              <th>Destination</th>
                              <th>Weight</th>
                              <th>Product</th>
                              <th>Total_Freight</th>
                              <th>Pick_Up_Date</th>
                              <th>Package</th>
                              <th>Shipment_Mode</th>
                              <th>Qty</th>
                              <th>Delievery_Time(Expected)</th>
                              <th>Pick_Up_Time</th>
                              <th>Status</th>
                              <th>Type_Of_Shipment</th>
                              <th>Payment_Mode</th>
                              <th>Departure_time</th>
                              <th>Comments</th>

                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="courier in couriers.data" :key="courier.id">
                              <td>{{ courier.id }}</td>
                              <td class="text-capitalize">
                                {{ courier.gi_carrier_ref_no }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_origin }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_destination }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_weight }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_product }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_total_freight }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_pickup_date | myDate }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_package }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_shipment_mode }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_qty }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_edd | myDate }}
                              </td>
                              <td class="text-capitalize">
                                {{ courier.gi_pickup_time | myTime }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_status }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_typeof_shipment }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_payment_mode }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_departure_time | myTime }}
                              </td>

                              <td class="text-capitalize">
                                {{ courier.gi_comments }}
                              </td>

                              <!-- <td>{{shipschedule.created_at}}</td> -->

                              <td>
                                <a href="#" @click="editModal(courier)">
                                  <i class="fa fa-edit blue"></i>
                                </a>
                                /
                                <a href="#" @click="deleteUser(courier.id)">
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
                          :data="couriers"
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
                        <h5 class="modal-title" v-show="!editmode">Create New Courier</h5>
                        <h5 class="modal-title" v-show="editmode">
                          Update Courier's Info
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <!-- <form @submit.prevent="createUser"> -->

                      <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                          <!-- Sender information -->
                          <div class="form-group">
                            <label>Sender Name</label>
                            <input
                              v-model="form.si_name"
                              type="text"
                              name="si_name"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('si_name'),
                              }"
                            />
                            <has-error :form="form" field="si_name"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Sender Region</label>
                            <input
                              v-model="form.si_region"
                              type="text"
                              name="si_region"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('si_region'),
                              }"
                            />
                            <has-error :form="form" field="si_region"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Phone Number</label>
                            <input
                              v-model="form.si_phone_number"
                              type="text"
                              name="si_phone_number"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('si_phone_number'),
                              }"
                            />
                            <has-error :form="form" field="si_phone_number"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Tracking Number</label>
                            <input
                              v-model="form.gi_carrier_ref_no"
                              type="text"
                              name="gi_carrier_ref_no"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_carrier_ref_no'),
                              }"
                            />
                            <has-error :form="form" field="gi_carrier_ref_no"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Sender Email</label>
                            <input
                              v-model="form.si_email"
                              type="email"
                              name="si_email"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('si_email'),
                              }"
                            />
                            <has-error :form="form" field="si_email"></has-error>
                          </div>

                          <!-- reciever information -->
                          <div class="form-group">
                            <label>Receiver Name</label>
                            <input
                              v-model="form.ri_name"
                              type="text"
                              name="ri_name"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('ri_name'),
                              }"
                            />
                            <has-error :form="form" field="ri_name"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Receiver Address</label>
                            <input
                              v-model="form.ri_address"
                              type="text"
                              name="ri_address"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('ri_address'),
                              }"
                            />
                            <has-error :form="form" field="gi_origin"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Receiver Number</label>
                            <input
                              v-model="form.ri_number"
                              type="text"
                              name="ri_number"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('ri_number'),
                              }"
                            />
                            <has-error :form="form" field="ri_number"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Receiver Email</label>
                            <input
                              v-model="form.ri_email"
                              type="text"
                              name="ri_email"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('ri_email'),
                              }"
                            />
                            <has-error :form="form" field="ri_email"></has-error>
                          </div>

                          <!-- Goods information -->

                          <div class="form-group">
                            <label>Origin</label>
                            <input
                              v-model="form.gi_origin"
                              type="text"
                              name="gi_origin"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_origin'),
                              }"
                            />
                            <has-error :form="form" field="gi_origin"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Destination</label>
                            <input
                              v-model="form.gi_destination"
                              type="text"
                              name="gi_destination"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_destination'),
                              }"
                            />
                            <has-error :form="form" field="gi_destination"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Weight</label>
                            <input
                              v-model="form.gi_weight"
                              type="text"
                              name="gi_weight"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_weight'),
                              }"
                            />
                            <has-error :form="form" field="gi_weight"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Product</label>
                            <input
                              v-model="form.gi_product"
                              type="text"
                              name="gi_product"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_product'),
                              }"
                            />
                            <has-error :form="form" field="gi_product"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Total Freight</label>
                            <input
                              v-model="form.gi_total_freight"
                              type="text"
                              name="gi_total_freight"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_total_freight'),
                              }"
                            />
                            <has-error :form="form" field="gi_total_freight"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Pick Up Date</label>

                            <v-date-picker
                              mode=""
                              :masks="masks"
                              v-model="form.gi_pickup_date"
                            >
                              <template v-slot="{ inputValue, inputEvents }">
                                <input
                                  class="form-control"
                                  :value="inputValue"
                                  v-on="inputEvents"
                                  name="gi_pickup_date"
                                  :class="{
                                    'is-invalid': form.errors.has('gi_pickup_date'),
                                  }"
                                />
                              </template>
                            </v-date-picker>

                            <has-error :form="form" field="gi_pickup_date"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Package</label>
                            <input
                              v-model="form.gi_package"
                              type="text"
                              name="gi_package"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_package'),
                              }"
                            />
                            <has-error :form="form" field="gi_package"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Shipment Mode</label>
                            <input
                              v-model="form.gi_shipment_mode"
                              type="text"
                              name="gi_shipment_mode"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_shipment_mode'),
                              }"
                            />
                            <has-error :form="form" field="gi_shipment_mode"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Qty</label>
                            <input
                              v-model="form.gi_qty"
                              type="text"
                              name="gi_qty"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('gi_qty') }"
                            />
                            <has-error :form="form" field="gi_qty"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Delivery Date(Expected)</label>

                            <v-date-picker
                              mode="date"
                              :masks="masks"
                              v-model="form.gi_edd"
                            >
                              <template v-slot="{ inputValue, inputEvents }">
                                <input
                                  class="form-control"
                                  :value="inputValue"
                                  v-on="inputEvents"
                                  name="gi_edd"
                                  :class="{
                                    'is-invalid': form.errors.has('gi_edd'),
                                  }"
                                />
                              </template>
                            </v-date-picker>

                            <has-error :form="form" field="gi_edd"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Pick Up Time</label>

                            <v-date-picker
                              mode="time"
                              :masks="masks"
                              v-model="form.gi_pickup_time"
                            >
                              <template v-slot="{ inputValue, inputEvents }">
                                <input
                                  class="form-control"
                                  :value="inputValue"
                                  v-on="inputEvents"
                                  name="gi_pickup_time"
                                  :class="{
                                    'is-invalid': form.errors.has('gi_pickup_time'),
                                  }"
                                />
                              </template>
                            </v-date-picker>

                            <has-error :form="form" field="gi_pickup_time"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <input
                              v-model="form.gi_status"
                              type="text"
                              name="gi_status"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_status'),
                              }"
                            />
                            <has-error :form="form" field="gi_status"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Type of Shipment</label>
                            <input
                              v-model="form.gi_typeof_shipment"
                              type="text"
                              name="gi_typeof_shipment"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_typeof_shipment'),
                              }"
                            />
                            <has-error
                              :form="form"
                              field="gi_typeof_shipment"
                            ></has-error>
                          </div>

                          <div class="form-group">
                            <label>Payment Mode</label>
                            <input
                              v-model="form.gi_payment_mode"
                              type="text"
                              name="gi_payment_mode"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_payment_mode'),
                              }"
                            />
                            <has-error :form="form" field="gi_payment_mode"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Departure Time</label>

                            <v-date-picker
                              mode="time"
                              :masks="masks"
                              v-model="form.gi_departure_time"
                            >
                              <template v-slot="{ inputValue, inputEvents }">
                                <input
                                  class="form-control"
                                  :value="inputValue"
                                  v-on="inputEvents"
                                  name="gi_departure_time"
                                  :class="{
                                    'is-invalid': form.errors.has('gi_departure_time'),
                                  }"
                                />
                              </template>
                            </v-date-picker>

                            <has-error :form="form" field="gi_departure_time"></has-error>
                          </div>

                          <div class="form-group">
                            <label>Comments</label>
                            <input
                              v-model="form.gi_comments"
                              type="text"
                              name="gi_comments"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('gi_comments'),
                              }"
                            />
                            <has-error :form="form" field="gi_comments"></has-error>
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
                          <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                          >
                            Close
                          </button>
                          <button v-show="editmode" type="submit" class="btn btn-success">
                            Update
                          </button>
                          <button
                            v-show="!editmode"
                            type="submit"
                            class="btn btn-primary"
                          >
                            Create
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- end tabs -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      couriers: {},
      form: new Form({
        id: "",
        si_name: "",
        si_region: "",
        si_phone_number: "",
        gi_carrier_ref_no: "",
        si_email: "",

        ri_name: "",
        ri_address: "",
        ri_number: "",
        ri_email: "",

        gi_origin: "",
        gi_destination: "",
        gi_weight: "",
        gi_product: "",
        gi_total_freight: "",
        gi_pickup_date: "",
        gi_package: "",
        gi_shipment_mode: "",
        gi_qty: "",
        gi_edd: "",
        gi_pickup_time: "",
        gi_status: "",
        gi_typeof_shipment: "",
        gi_payment_mode: "",
        gi_departure_time: "",
        gi_comments: "",
      }),
    };
  },
  methods: {
    getResults(page = 1) {
      this.$Progress.start();

      axios
        .get("api/courier?page=" + page)
        .then(({ data }) => (this.couriers = data.data));

      this.$Progress.finish();
    },
    async updateUser() {
      this.$Progress.start();
      // console.log('Editing data');
      await this.form.put("api/courier/" + this.form.id).then((response) => {
        // success;
        $("#addNew").modal("hide");
        Toast.fire({
          icon: "success",
          title: response.data.message,
        });
        this.$Progress.finish();
        //  Fire.$emit('AfterCreate');
        this.loadUsers();
      });
      // .catch(() => {
      //   this.$Progress.fail();
      // });
    },
    editModal(courier) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(courier);
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
          this.form.delete("api/courier/" + id).then(() => {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            // Fire.$emit('AfterCreate');
            this.loadUsers();
          });
          // .catch((data) => {
          //   Swal.fire("Failed!", data.message, "warning");
          // });
        }
      });
    },
    loadUsers() {
      this.$Progress.start();

      // if(this.$gate.isAdmin()){
      axios.get("api/courier").then(({ data }) => (this.couriers = data.data));
      console.log(couriers);
      // }

      this.$Progress.finish();
    },

    async createUser() {
      await this.form.post("api/courier").then((response) => {
        $("#addNew").modal("hide");

        Toast.fire({
          icon: "success",
          title: response.data.message,
        });

        this.$Progress.finish();
        this.loadUsers();
      });
      // .catch(() => {
      //   Toast.fire({
      //     icon: "error",
      //     title: "Some error occured! Please try again",
      //   });
      // });
    },
  },
  mounted() {
    console.log("courier Component mounted.");
  },
  created() {
    this.$Progress.start();
    this.loadUsers();
    this.$Progress.finish();
  },
};
</script>
