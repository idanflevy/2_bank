v
<template>

  <section class="content" >
  <div class="row">
<div class="col-lg-3 col-6" >

<div class="small-box account">
<div class="inner" style="color:white;">
<p>Current Balance</p>
<h3>$150,000</h3>

</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6" >

<div class="small-box account">
<div class="inner" style="color:white;">
<p>Present Balance</p>
<h3>$150,000</h3>

</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6" >

<div class="small-box account1">
<div class="inner" style="color:white;">
<p>Total Balance</p>
<h3>$150,000</h3>

</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>




<div class="col-lg-3 col-6" >

<div class="small-box account">
<div class="inner" style="color:white;">
<p>Current Balance</p>
<h3>$150,000</h3>

</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>


<div class="card" style="border-radius:none;">
<div class="card-header">
<h3 class="card-title">Responsive Hover Table</h3>
<div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>Date</th>
<th>Descriptions</th>
<th>Type</th>
<th>Amount</th>
<th>Balance</th>
</tr>
</thead>
<tbody>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>
<tr>
<td>11-7-2014</td>
<td>Tax payment</td>
<td>Deposit</td>
<td>$100.00</td>
<td>$200</td>
</tr>



</tbody>
</table>
</div>

</div>
</section>


</template>



<script>
export default {
  data() {
    return {
      
      shipschedules: {},
     
    };
  },
 
  created() {
    this.$Progress.start();

    axios.get("api/balance").then(({ data }) => this.form.fill(data.data));

    this.$Progress.finish();
  },
};
</script>


<style scoped>

  .account{
    border-radius: 20px;

background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(51,58,218,1) 29%, rgba(0,212,255,1) 100%); 
  
  }

  .account1{
    border-radius: 20px;
    background: linear-gradient(90deg, rgba(240,30,44,1) 41%, rgba(233,172,172,1) 100%);

  }

  

</style>
