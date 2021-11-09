        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Pengumuman</h1> <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->flashdata('alert')) { ?>
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Gagal</strong> <?php echo $this->session->flashdata('alert'); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('sukses')) { ?>
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <span>Data Pengumuman Berhasil </span> <?php echo $this->session->flashdata('sukses'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Judul</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal Post</th>
                                                    <th>Admin</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data->result_array() as $i) :
                                                    $no++;
                                                    $id = $i['pengumuman_id'];
                                                    $judul = $i['pengumuman_judul'];
                                                    $deskripsi = $i['pengumuman_deskripsi'];
                                                    $admin = $i['pengumuman_author'];
                                                    $tanggal = $i['tanggal'];

                                                ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $judul; ?></td>
                                                        <td><?php echo $deskripsi; ?></td>
                                                        <td><?php echo $tanggal; ?></td>
                                                        <td><?php echo $admin; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">Ubah</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pengumuman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'cpaneladministrator/simpan_pengumuman' ?>" method="post">
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="12" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['pengumuman_id'];
            $judul = $i['pengumuman_judul'];
            $deskripsi = $i['pengumuman_deskripsi'];
            $admin = $i['pengumuman_author'];
            $tanggal = $i['tanggal'];
        ?>
            <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Pengumuman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/update_pengumuman' ?>" method="post">
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                    <div class="col-sm-7">
                                        <input type="hidden" name="kode" value="<?php echo $id; ?>">
                                        <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="12" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $deskripsi; ?></textarea>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-flat" id="simpan">Ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <!-- hapus agenda -->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['pengumuman_id'];
            $judul = $i['pengumuman_judul'];
            $deskripsi = $i['pengumuman_deskripsi'];
            $tanggal = $i['tanggal'];
        ?>
            <!--Modal Hapus Pengguna-->
            <div class="modal fade" id="ModalHapus<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Pengumuman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/hapus_pengumuman' ?>" method="post">
                                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                                <p>Apakah Anda yakin mau menghapus <b> <?php echo $judul; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger btn-flat" id="simpan">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <!-- /page content -->