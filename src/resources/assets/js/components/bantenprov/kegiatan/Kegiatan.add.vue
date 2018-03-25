<template>
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table" aria-hidden="true"></i> Add Kegiatan

      <ul class="nav nav-pills card-header-pills pull-right">
        <li class="nav-item">
          <button class="btn btn-primary btn-sm" role="button" @click="back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <vue-form class="form-horizontal form-validation" :state="state" @submit.prevent="onSubmit">
        <div class="form-row">
          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.label" required autofocus name="label" type="text" placeholder="Label">

              <field-messages name="label" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
                <small class="form-text text-danger" slot="required">Label is a required field</small>
              </field-messages>
            </validate>
          </div>

          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.description" name="description" type="text" placeholder="Description">

              <field-messages name="description" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
                <small class="form-text text-danger" slot="required">Description is a required field</small>
              </field-messages>
            </validate>
          </div>

          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.tanggal_mulai" name="tanggal_mulai" type="text" placeholder="Tanggal Mulai">

              <field-messages name="tanggal_mulai" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
                <small class="form-text text-danger" slot="required">Tanggal Mulai is a required field</small>
              </field-messages>
            </validate>
          </div>

          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.tanggal_selesai" name="tanggal_selesai" type="text" placeholder="Tanggal Selesai">

              <field-messages name="tanggal_selesai" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
                <small class="form-text text-danger" slot="required">Tanggal Selesai is a required field</small>
              </field-messages>
            </validate>
          </div>

          <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>

            <button type="reset" class="btn btn-secondary" @click="reset">Reset</button>
          </div>
        </div>
      </vue-form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      state: {},
      model: {
        label: "",
        description: "",
        tanggal_mulai: "",
        tanggal_selesai: ""
      }
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

      if (this.state.$invalid) {
        return;
      } else {
        axios.post('api/kegiatan', {
            label: this.model.label,
            description: this.model.description,
            tanggal_mulai: this.model.tanggal_mulai,
            tanggal_selesai: this.model.tanggal_selesai
          })
          .then(response => {
            if (response.data.status == true) {
              if(response.data.message == 'success'){
                alert(response.data.message);
                app.back();
              }else{
                alert(response.data.message);
              }
            } else {
              alert(response.data.message);
            }
          })
          .catch(function(response) {
            alert('Break ' + response.data.message);
          });
      }
    },
    reset() {
      this.model = {
          label: "",
          description: "",
          description: "",
          tanggal_mulai: "",
          tanggal_selesai: ""
      };
    },
    back() {
      window.location = '#/admin/kegiatan';
    }
  }
}
</script>
