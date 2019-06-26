<template>

<div class="container">
<div class="alert alert-success" v-show="showSuccess">
  You have successfully added a new policy.
</div>

<div class="alert alert-success" v-show="EditSuccess">
  You have successfully edited the policy.
</div>

<div v-show="showForm">

  <div class="form-group col-md-6">
    <label for="amount">Amount spent</label>
    <input type="number" class="form-control" name="amount" v-model="amount">
  </div>

  <div class="form-group col-md-6">
    <label for="points">Points awarded</label>
    <input type="number" class="form-control" name="points" v-model="points">
  </div>

  <div class='form-group col-md-12'>
    <button type="button" class="btn btn-primary pull-right" v-show="add" @click="addPolicy()">Add policy</button>
    <button type="button" class="btn btn-primary pull-right" v-show="!add" @click="updatePolicy()">Update policy</button>
  </div>

</div>

<h3 class="text-center">Policies</h3>
  <div class="alert alert-warning text-center" v-show="showWarning">
    No policy added yet
  </div>

  <table class='table table-hover table-condensed'  v-show="!showWarning">
    <thead>
      <tr>
        <th>No.</th>
        <th>Amount</th>
        <th>Points</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(policy, index) in this.policies">
        <td>{{index+1}}</td>
        <td>{{policy.amount}}</td>
        <td>{{policy.point}}</td>
        <td>
          <a class="btn btn-warning btn-sm" @click="editPolicy(policy)">Edit</a>
        </td>
      </tr>
    </tbody>
    <thead>
      <tr>
        <th>No.</th>
        <th>Amount</th>
        <th>Points</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>

</template>
<script>
export default {
  data(){
    return {
      policies: "",
      policy: "",
      amount: "",
      points: "",
      showWarning: false,
      showSuccess: false,
      EditSuccess: false,
      showForm: false,
      add: true
    }
  },
  created() {
    //do something after creating vue instance
    this.fetchPolicy();
  },
  computed: {

  },
  methods: {
    fetchPolicy() {
      axios.post('/policies/save')
          .then((response)=> {
            this.policies = response.data.policies;
            if(! this.policies.length) this.showWarning = true;
            if(! this.policies.length) this.showForm = true;
          });
    },
    addPolicy() {
      axios.post('/policies/save', {
        amount: this.amount,
        point: this.points,
      }).then((response)=>{
        this.policies = response.data.policies;
        if(! this.policies.length) this.showWarning = true;
        this.showSuccess = true;
        this.showWarning = false;
        this.amount = "";
        this.points = "";
        this.showForm = false;
      })
    },
    editPolicy(policy){
      this.amount = policy.amount;
      this.points = policy.point;
      this.policy = policy.id;
      this.showForm = true;
      this.add = false;
    },
    updatePolicy() {
      axios.post('/policies/save', {
        policy_id: this.policy,
        amount: this.amount,
        point: this.points,
      }).then((response)=>{
        this.policies = response.data.policies;
        if(! this.policies.length) this.showWarning = true;
        if(! this.policies.length) this.showForm = true;
        this.EditSuccess = true;
        this.amount = "";
        this.points = "";
        this.add = true;
        this.showForm = false;
      })
    },
  }
}
</script>
<style lang="scss" scoped>
</style>
