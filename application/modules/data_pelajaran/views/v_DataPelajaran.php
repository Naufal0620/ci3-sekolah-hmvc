<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Pelajaran</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Data Pelajaran</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card">
                    <div class="card-body">
                        <table id="table_data_pelajaran" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nama Pelajaran</th>
                                    <th>Guru Pengajar</th>
                                    <th>Nama Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modal_DataPelajaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Form Data Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_DataPelajaran" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Pelajaran</label>
                        <div class="col-md-10">
                            <select class="form-select" name="nama_pelajaran" id="nama_pelajaran">
                                <option class="d-none" value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Kelas</label>
                        <div class="col-md-10">
                            <select class="form-select" name="nama_kelas" id="nama_kelas">
                                <option class="d-none" value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Tingkat</label>
                        <div class="col-md-10">
                            <select class="form-select" name="tingkat" id="tingkat">
                                <option class="d-none" value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Hari</label>
                        <div class="col-md-10">
                            <select class="form-select" name="hari" id="hari">
                                <option class="d-none" value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Guru Pengajar</label>
                        <div class="col-md-10">
                            <select class="form-select" name="guru_pengajar" id="guru_pengajar">
                                <option class="d-none" value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Jam Mulai</label>
                        <div class="col-md-10">
                            <input class="form-control" type="time" value="" name="jam_mulai" id="jam_mulai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Jam Selesai</label>
                        <div class="col-md-10">
                            <input class="form-control" type="time" value="" name="jam_selesai" id="jam_selesai">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn"></button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>