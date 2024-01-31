<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Guru</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Data Guru</a></li>
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
                        <table id="table_data_guru" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th>Nama Guru</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Gelar</th>

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

<div class="modal fade bs-example-modal-lg" id="modal_DataGuru" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_data_guru">Form Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_DataGuru" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Guru</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="nama_guru" id="nama_guru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Bidang Keahlian</label>
                        <div class="col-md-10">
                            <select class="form-select" value="" name="bidang_keahlian" id="bidang_keahlian">
                            <option class="d-none" value="">--Pilih--</option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Gelar</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="gelar" id="gelar">
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