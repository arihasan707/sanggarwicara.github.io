        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Galeri</h1> <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
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
                                            <span>Data Foto Berhasil</span> <?php echo $this->session->flashdata('sukses'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gambar</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal & Waktu</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data->result_array() as $i) :
                                                    $no;
                                                    $galeri_id = $i['galeri_id'];
                                                    $galeri_judul = $i['galeri_judul'];
                                                    $galeri_tanggal = $i['galeri_tanggal'];
                                                    $galeri_gambar = $i['galeri_gambar'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><img src="<?php echo base_url() . 'assets/images/' . $galeri_gambar; ?>" style="width:80px;"></td>
                                                        <td><?php echo $galeri_judul; ?></td>
                                                        <td><?php echo $galeri_tanggal; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $galeri_id; ?>">Ubah</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $galeri_id; ?>"><span class="fa fa-trash"></span></a>
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
        <!-- modal tambah -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Galeri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'cpaneladministrator/simpan_galeri' ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                <div class=" input-group col-sm-7">
                                    <input class="form-control" type="file" name="filefoto" required />
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

        <!--Modal Edit Album-->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['galeri_id'];
            $galeri_judul = $i['galeri_judul'];
            $galeri_tanggal = $i['galeri_tanggal'];
            $galeri_gambar = $i['galeri_gambar'];
        ?>

            <div class="modal fade" id="ModalEdit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Galeri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/update_galeri' ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                    <div class="col-sm-7">
                                        <input type="hidden" name="kode" value="<?= $id; ?>">
                                        <input type="hidden" name="gambar" value="<?= $galeri_gambar; ?>">
                                        <input type="text" name="xjudul" value="<?= $galeri_judul; ?>" class="form-control" id="inputUserName" placeholder="Judul" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                    <div class=" input-group col-sm-7">
                                        <input class="form-control" type="file" name="filefoto" required />
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

        <?php foreach ($data->result_array() as $i) :
            $galeri_id = $i['galeri_id'];
            $galeri_judul = $i['galeri_judul'];
            $galeri_tanggal = $i['galeri_tanggal'];
            $galeri_gambar = $i['galeri_gambar'];
        ?>
            <!--Modal Hapus foto-->
            <div class="modal fade" id="ModalHapus<?php echo $galeri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                            <h4 class="modal-title" id="myModalLabel">Hapus Foto</h4>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url() . 'cpaneladministrator/hapus_galeri' ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="kode" value="<?php echo $galeri_id; ?>" />
                                <input type="hidden" value="<?php echo $galeri_gambar; ?>" name="gambar">
                                <p>Apakah Anda yakin mau menghapus foto <b><?php echo $galeri_judul; ?></b> ?</p>

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