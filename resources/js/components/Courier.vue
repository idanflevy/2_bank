<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <router-link to="/courier" class="nav-link active show"
                    >Add Shipper & Reciever Information
                  </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="/courier-records" class="nav-link"
                    >Update Cargo Info
                  </router-link>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- Activity Tab -->
                <div class="tab-pane active show" id="activity"></div>
                <!-- Setting Tab -->

                <h4>Shippers Information</h4>
                <div>
                  <p>Tracking ID: {{ GeneratetrackingNumber() }}</p>
                </div>
                <hr />

                <form @click.prevent="" class="form-horizontal">
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Full Name</label>

                      <input
                        v-model="form.si_name"
                        type="text"
                        name="si_name"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('si_name') }"
                      />
                    </div>
                    <has-error :form="form" field="si_name"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Region</label>

                      <input
                        v-model="form.si_region"
                        type="text"
                        name="si_region"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('si_region') }"
                      />
                    </div>
                    <has-error :form="form" field="si_region"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Phone Number</label>
                      <input
                        v-model="form.si_phone_number"
                        type="text"
                        name="si_phone_number"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('si_phone_number') }"
                      />
                    </div>
                    <has-error :form="form" field="si_phone_number"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Tracking ID</label>
                      <input
                        v-model="form.gi_carrier_ref_no"
                        type="text"
                        readonly
                        name="gi_carrier_ref_no"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('gi_carrier_ref_no') }"
                      />
                    </div>
                    <has-error :form="form" field="si_phone_number"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Email</label>
                      <input
                        v-model="form.si_email"
                        type="text"
                        name="si_email"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('si_email') }"
                      />
                    </div>
                    <has-error :form="form" field="si_email"></has-error>
                  </div>

                  <h4 style="margin-top: 30px">Reciever Information</h4>
                  <hr />

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Full Name</label>
                      <input
                        v-model="form.ri_name"
                        type="text"
                        name="ri_name"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('ri_name') }"
                      />
                    </div>
                    <has-error :form="form" field="ri_name"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Address</label>
                      <input
                        v-model="form.ri_address"
                        type="text"
                        name="ri_name"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('ri_address') }"
                      />
                    </div>
                    <has-error :form="form" field="ri_address"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Phone Number</label>
                      <input
                        v-model="form.ri_number"
                        type="text"
                        name="ri_number"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('ri_number') }"
                      />
                    </div>
                    <has-error :form="form" field="ri_number"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6">
                      <label>Email</label>
                      <input
                        v-model="form.ri_email"
                        type="email"
                        name="email"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('ri_email') }"
                      />
                    </div>
                    <has-error :form="form" field="ri_email"></has-error>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6">
                      <!-- <button type="submit" class="btn btn-success">Save</button> -->
                      <button type="submit" @click="createNew" class="btn btn-primary">
                        Create
                      </button>
                      <!-- <div class="float-right d-sm-inline text-muted"></div> -->
                    </div>
                  </div>
                </form>
                <!-- Setting Tab -->

                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
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
  mounted() {
    console.log("Component mounted.");
  },

  data() {
    return {
      form: new Form({
        // tracking: "",

        si_name: "",
        si_region: "",
        si_phone_number: "",
        gi_carrier_ref_no: "",
        si_email: "",

        ri_name: "",
        ri_address: "",
        ri_number: "",
        ri_email: "",
      }),
    };
  },

  methods: {
    GeneratetrackingNumber() {
      // const num = Math.floor(Math.random() * (1000 - 1 + 1)) + 1;
      // // return (this.form.gi_carrier_ref_no = "BHL" + num + "-CARGO");
      const a = Math.round(Date.now() / 1000); // 1405792937;
      return (this.form.gi_carrier_ref_no = a);
    },

    createNew() {
      this.form
        .post("api/courier")
        .then((response) => {
          // $('#addNew').modal('hide');

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$Progress.finish();
          // this.loadUsers();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
  },
};
</script>
