<template>
  <div>

    <div class="card mb-3">
      <div class="card-header">Grafik Kegiatan</div>
      <div class="card-body">
        <echarts-kegiatan></echarts-kegiatan>
      </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Kota</div>
          <div class="card-body">
            <echarts-kegiatan-kota></echarts-kegiatan-kota>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Tahunan</div>
          <div class="card-body">
            <echarts-kegiatan-tahun></echarts-kegiatan-tahun>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </div>

  </div>
</template>
