<template>
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table" aria-hidden="true"></i> Kegiatan

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
            <b>Label :</b> {{ model.label }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Description :</b> {{ model.description }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Tanggal Mulai :</b> {{ model.tanggal_mulai }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Tanggal Selesai :</b> {{ model.tanggal_selesai }}
          </div>
        </div>

      </vue-form>
    </div>
       <div class="card-footer text-muted">
        <div class="row">
          <div class="col-md">
            <!-- <b>Username :</b> {{ model.user.name }} -->
          </div>
          <div class="col-md">
            <div class="col-md text-right">Dibuat : {{ model.created_at }}</div>
            <div class="col-md text-right">Diperbaiki : {{ model.updated_at }}</div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios.get('api/kegiatan/' + this.$route.params.id)
      .then(response => {
        if (response.data.status == true) {
          this.model.label = response.data.kegiatan.label;
          this.model.old_label = response.data.kegiatan.label;
          this.model.description = response.data.kegiatan.description;
          this.model.tanggal_mulai = response.data.kegiatan.tanggal_mulai;
          this.model.tanggal_selesai = response.data.kegiatan.tanggal_selesai;
          this.model.created_at = response.data.kegiatan.created_at;
          this.model.updated_at = response.data.kegiatan.updated_at;
        } else {
          alert('Failed');
        }
      })
      .catch(function(response) {
        alert('Break');
        window.location.href = '#/admin/kegiatan';
      })

  },
  data() {
    return {
      state: {},
      model: {
        label: "",
        description: "",
        tanggal_mulai: "",
        tanggal_selesai: "",
        created_at: "",
        updated_at: ""
      }
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

      if (this.state.$invalid) {
        return;
      } else {
        axios.put('api/kegiatan/' + this.$route.params.id, {
            label: this.model.label,
            old_label: this.model.old_label,
            description: this.model.description,
            tanggal_mulai: this.model.tanggal_mulai,
            tanggal_selesai: this.model.tanggal_selesai,
            created_at: this.model.created_at,
            updated_at: this.model.updated_at
            
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
      axios.get('api/kegiatan/' + this.$route.params.id + '/edit')
        .then(response => {
          if (response.data.status == true) {
            this.model.label = response.data.kegiatan.label;
            this.model.description = response.data.kegiatan.description;
            this.model.tanggal_mulai = response.data.kegiatan.tanggal_mulai;
            this.model.tanggal_selesai = response.data.kegiatan.tanggal_selesai;
          } else {
            alert('Failed');
          }
        })
        .catch(function(response) {
          alert('Break ');
        });
    },
    back() {
      window.location = '#/admin/kegiatan';
    }
  }
}
</script>
