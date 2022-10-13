<template>
  <section class="content">
    <div class="container-fluid">
        <div class="row">


           <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vessel Operation </h3>

               
              </div>
               
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
               
                      <th>Liner</th>
                      <th>Vessel_Name</th>
                      <th>Voyage_Number</th>
                      <th>Vessel_Type</th>
                      <th>Rtn_No.</th>
                     
                      <th>Invoicing_Status</th>
                  
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="shipschedule in shipschedules.data" :key="shipschedule.id">

                 
                   <td class="text-capitalize">{{shipschedule.liner}}</td>
                   <td class="text-capitalize">{{shipschedule.vessel_name}}</td>
                   <td class="text-capitalize">{{shipschedule.voyage_no}}</td>
                   <td class="text-capitalize">{{shipschedule.vessel_type}}</td>
                   <td class="text-capitalize">{{shipschedule.rotation_no}}</td>
                 
                   <td class="text-capitalize">{{shipschedule.invoice_status}}</td>
                     
                      <!-- <td>{{shipschedule.created_at}}</td> -->

                    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                  <pagination :data="shipschedules" @pagination-change-page="getResults"></pagination>
              </div> -->
            </div>
            <!-- /.card -->
          </div>

           <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vessel Schedule </h3>

               
              </div>
               
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    
                      <th>Vessel_Name</th>
                      <th>Voyage_Number</th>
                      <th>Vessel_Type</th>
               
                   
                      <th>Arrivale_Date</th>
                      <th>Departure_Status</th>
                      <th>Departure_Date</th>
                   
                  
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="shipschedule in shipschedules.data" :key="shipschedule.id">

             
                   <td class="text-capitalize">{{shipschedule.vessel_name}}</td>
                   <td class="text-capitalize">{{shipschedule.voyage_no}}</td>
                   <td class="text-capitalize">{{shipschedule.vessel_type}}</td>
               
              
                   <td class="text-capitalize">{{shipschedule.arrival_date}}</td>
                   <td class="text-capitalize">{{shipschedule.departure_status}}</td>
               
                   <td class="text-capitalize">{{shipschedule.departure_date}}</td>
                  
                     
                      <!-- <td>{{shipschedule.created_at}}</td> -->

                    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                  <pagination :data="shipschedules" @pagination-change-page="getResults"></pagination>
              </div> -->
            </div>
            <!-- /.card -->
          </div>

           <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ship Schedule </h3>

               
              </div>
               
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    
                       <th>Vessel_Name</th>
                      <th>Voyage_Number</th>
                
                      <th>Rtn_No.</th>
                 
                      <th>Departure Date</th>
                     
                    
                      <th>Departure Status</th>
                  
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="shipschedule in shipschedules.data" :key="shipschedule.id">

                                     <td class="text-capitalize">{{shipschedule.vessel_name}}</td>
                   <td class="text-capitalize">{{shipschedule.voyage_no}}</td>
                
                   <td class="text-capitalize">{{shipschedule.rotation_no}}</td>
                  
                   <td class="text-capitalize">{{shipschedule.departure_date}}</td>
                    <td class="text-capitalize">{{shipschedule.departure_status}}</td>
                 
                
                     
                      <!-- <td>{{shipschedule.created_at}}</td> -->

                    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                  <pagination :data="shipschedules" @pagination-change-page="getResults"></pagination>
              </div> -->
            </div>
            <!-- /.card -->
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
                shipschedules : {},
                form: new Form({
                    id : '',
                    liner : '',
                    vessel_name: '',
                    voyage_no: '',
                    vessel_type: '',
                    rotation_no :'',
                    arrival_date: '',
                    arrival_status: '',
                    departure_status: '',
                    departure_date: '',
                    eta: '',
                    invoice_status: '',
                   
                })
            }
        },
        methods: {

            getResults(page = 1) {

                  this.$Progress.start();
                  
                  axios.get('api/shipschedule_one?page=' + page).then(({ data }) => (this.shipschedules = data.data));

                  this.$Progress.finish();
            },
          
           
         
          
          loadUsers(){
            this.$Progress.start();

           // if(this.$gate.isAdmin()){
              axios.get("api/shipschedule_one").then(({ data }) => (this.shipschedules = data.data));
              console.log(shipschedules)
           // }

            this.$Progress.finish();
          },
          
        
        },
        mounted() {
            console.log('shipschedule Component mounted.')
        },
        created() {
            
            Swal.fire({
  title: '<strong>Info for our existing customers</strong>',
  icon: 'info',
  html:
    'For Existing users you can use this ' +
    '<a href="https://eservices.comet.nalcometgroup.com/password/reset">links</a> ' +
    'to reset your password and proceed',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Okay!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
 
})

            this.$Progress.start();
            this.loadUsers();
            this.$Progress.finish();
        }
    }
</script>
