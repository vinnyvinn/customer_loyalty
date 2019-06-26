<template>

  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Customers
        </div>
        <div class="panel-body">
          <table class='table table-hover table-condensed datatable-vue'>
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Gender</th>
                <th class="currency">Balance</th>
                <th class="currency">Loyalty points</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(customer, index) in customers">
                <td>{{index+1}}</td>
                <td class="names">{{ customer.firstname }} {{customer.lastname }}</td>
                <td>{{ customer.email}}</td>
                <td class="names">{{ customer.address}}</td>
                <td>{{ customer.gender == 0 ? "Female" : "Male" }}</td>
                <td class="currency">{{ customer.balance}}</td>
                <td class="currency">
                  {{ customer.loyalty_points ? customer.loyalty_points.points: "N/A" }}
                </td>
                <td>
                  <a class="btn btn-success btn-sm" @click="enroll(customer)" v-if="customer.loyalty_points == null">Enroll</a>
                  <a class="btn btn-warning btn-sm" @click="enroll(customer)" v-if="customer.loyalty_points != null">Enrolled</a>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Gender</th>
                <th class="currency">Balance</th>
                <th class="currency">Loyalty points</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
    </div>

</template>
<script>
export default {
  data(){
    return {
      customers: "",
    }
  },
  created() {
    this.fetchCustomers();

  },
  mounted() {
    //do something after mounting vue instance
    this.initDatatable();
  },
  methods: {
    fetchCustomers() {
      axios.get('/customers').then((response)=>{
        this.customers = response.data.customers;
      })
    },
    initDatatable(){
      $(()=>{
        setTimeout(()=>{
          $('.datatable-vue').dataTable();
          $('.dataTables_filter').css('float', 'right');
          $('.dataTables_paginate').css('float', 'right');
        },250);

      });
    },
    destroy(){
      $(()=>{
        setTimeout(()=>{
        $('.datatable-vue').fnDestroy();
        } , 250);
      });
    },
    enroll(customer){
      axios.post('/loyaltypoints', {
        customer_id: customer.id,
      }).then((r)=>{
        this.fetchCustomers();
        this.initDatatable();
      });
    },
  }
}
</script>
<style scoped>
  .names {
    text-transform: capitalize;
  }
  .currency {
    text-align: right;
    padding-right: 20px;
  }
</style>
