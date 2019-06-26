<template>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Loyalty customers
      </div>
      <div class="panel-body">
        <table class='table table-hover table-condensed datatable-vue'>
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Address</th>
              <th class="currency">Balance</th>
              <th class="text-right currency">Loyalty points</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(customer, index) in customers" :key="customer.key">
              <td>{{index+1}}</td>
              <td class="uppercase">{{customer.firstname}} {{customer.lastname}}</td>
              <td>{{customer.email}}</td>
              <td class="uppercase">{{customer.address}}</td>
              <td class="currency">{{customer.balance}}</td>
              <td class="text-right currency">{{customer.loyalty_points.points}}</td>
              <td>
                <a  data-toggle="modal" :data-target="'#debit' + customer.id" class="btn btn-primary btn-xs">Debit</a>
                <a  data-toggle="modal" :data-target="'#' + customer.id" class="btn btn-warning btn-xs">Redeem</a>
                <a  data-toggle="modal" :data-target="'#transfer' + customer.id" class="btn btn-info btn-xs">Tranfer</a>
                <a class="btn btn-danger btn-xs" @click="enroll(customer)"> Disenroll</a>

              <!-- Modal -->
              <div :id="customer.id" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Redeem <span class="uppercase">{{customer.firstname}}</span> points</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="form-group col-md-12">
                            <label for="points">Points to redeem:</label>
                            <input type="number" min="0" name="points" class="form-control"  onfocus="this.select" v-model="pointsToRedeem">
                            <label class="error" v-if="pointsToRedeem > parseFloat(customer.loyalty_points.points)"> Points entered exceed the customer's loyalty points</label>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success pull-right"  v-if="pointsToRedeem <= parseFloat(customer.loyalty_points.points)" @click="redeemPoints(customer)" data-dismiss="modal">Redeem</button>
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Modal -->
              <div :id="'transfer' + customer.id" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Transfer <span class="uppercase">{{customer.firstname}}</span> points</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="form-group col-md-12">
                            <label for="customer_id">Customer to be transfered</label>
                            <select class="form-control" name="customer_id" v-model="customerTransfer">
                              <option v-for="customer_id in customers" :value="customer_id.id">{{customer_id.firstname}} {{customer_id.lastname}}</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="points">Points to transfer:</label>
                            <input type="number" min="0" name="points" class="form-control"  onfocus="this.select" v-model="pointsToTransfer">
                            <label class="error" v-if="pointsToTransfer > parseFloat(customer.loyalty_points.points)"> Points entered exceed the customer's loyalty points</label>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success pull-right"  v-if="pointsToRedeem <= parseFloat(customer.loyalty_points.points)" @click="transferPoints(customer)" data-dismiss="modal">Transfer</button>
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Modal -->
              <div :id="'debit' + customer.id" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Debit points for <span class="uppercase">{{customer.firstname}}</span></h4>
                    </div>

                    <div class="modal-body">
                      <div class="row">

                          <div class="form-group col-md-12">
                            <label for="amount">Amount spent</label>
                            <input type="number" name="amount" min="0" class="form-control" placeholder="Enter amount spent" v-model="amountSpent">
                          </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success pull-right" @click="debitPoints(customer)"  data-dismiss="modal">Debit points</button>
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

            </td>

            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Address</th>
              <th class="currency">Balance</th>
              <th class="text-right currency">Loyalty points</th>
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
  data() {
    return {
      customers: '',
      amountSpent: '',
      pointsToRedeem: '',
      pointsToTransfer: '',
      customerTransfer: ''
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
      axios.post('/loyaltycustomers')
            .then((r)=>{
              this.customers = r.data.customers;
            });
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
    debitPoints(customer){
      axios.post('/loyaltycustomers', {
        amount: this.amountSpent,
        customer_id: customer.id,
      }).then((r)=>{
        this.customers = r.data.customers;
        this.amountSpent = '';
      });
    },
    redeemPoints(customer){
      axios.post('/loyaltycustomers', {
        points: this.pointsToRedeem,
        customer_id: customer,
      }).then((r)=> {
        this.customers = r.data.customers;
        this.pointsToRedeem = '';
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
    transferPoints(customer){
      axios.post('/loyaltycustomers', {
        points: this.pointsToTransfer,
        customer_transferring: customer.id,
        customer_transfered: this.customerTransfer,
      }).then((r)=>{
        this.customers = r.data.customers;
        this.pointsToTransfer = '';
        this.customerTransfer = '';
      });
    },
  }
}
</script>
<style scoped>
.uppercase {
  text-transform: capitalize;
}
.currency {
  text-align: right;
  padding-right: 20px;
}
.form-control {
  width: 100%;
}
label.error {
  color: red;
}
</style>
