    <div id="content-wrapper">

      <div class="container-fluid">
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-header">
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
          Tambah Data
        </button>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruang</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($ruang as $b): ?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td width="">
                      <?php echo $b->NAMA_RUANG ?>
                    </td>
                    <td width="250">
                      <a href="<?php echo site_url('admin/Ruang/edit/'.$b->ID_RUANG) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
          <a onclick="deleteConfirm('<?php echo site_url('admin/Ruang/delete/'.$b->ID_RUANG) ?>')"
                       href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>

      </div>

      <!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><?= $sub ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form action="<?php echo site_url('admin/Ruang') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="NAMA_RUANG">Ruang*</label>
                <input class="form-control <?php echo form_error('NAMA_RUANG') ? 'is-invalid':'' ?>"
                 type="text" name="NAMA_RUANG" placeholder="ruang kelas" />
                <div class="invalid-feedback">
                  <?php echo form_error('NAMA_RUANG') ?>
                </div>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="ID_TINGKAT">Tingkat Kelas</label>
                </div>
              <select class="custom-select <?php echo form_error('ID_TINGKAT') ? 'is-invalid':'' ?>" name="ID_TINGKAT"> 
                  <?php foreach ($kelas as $s2): ?>
                  <option value="<?php echo $s2->ID_KELAS?>"><?php echo $s2->TINGKAT_KELAS ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
              <div class="modal-footer">
                <div class="card-footer small text-muted">
            <h4>field tanda * Harus Di isi</h4>
          </div>
              </div>
            </div>
          </div>
        </div>