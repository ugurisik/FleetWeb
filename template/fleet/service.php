<?php

$type = $params['type'];
if ($type == "list") {
    $bread_title = "Servis & Bakım Listesi";
} else if ($type == "typeList") {
    $bread_title = "Servis & Bakım Türleri";
} else if ($type == "typeShow") {
    $bread_title = "Servis & Bakım Türü Görüntüle";
} else if ($type == "show") {
    $bread_title = "Servis & Bakım Görüntüle";
} else if ($type == "add") {
    $bread_title = "Servis & Bakım Türü Ekle";
}

if ($type == "list") :
?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="homepage">FLEET</a></li>
                                <li class="breadcrumb-item active"><?= $bread_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Servis & Bakım Listesi</h5>
                        </div>
                        <div class="card-body">
                            <table id="carList" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>Araç</th>
                                        <th>Servis & Bakım</th>
                                        <th>Tarih</th>
                                        <th>Masraf</th>
                                        <th class="text-end">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                        <td>Pejo 206</td>
                                        <td>Genel Bakım</td>
                                        <td>21.12.2023</td>
                                        <td><span class="badge bg-warning">178 €</span></td>
                                        <td class="text-end">
                                            <a href="service.php?type=show" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="#" class="btn btn-outline-danger text-center m-1"><i class="ri-delete-bin-fill align-bottom fs-16"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#carList').DataTable({
                select: {
                    style: 'multi'
                }
            });
        });
    </script>
<?php endif; ?>

<?php
if ($type == "typeList") :
?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="homepage">FLEET</a></li>
                                <li class="breadcrumb-item active"><?= $bread_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Servis & Bakım Türleri</h5>
                            <div class="card-toolbar">
                                <div class="dropdown">
                                    <a href="service.php?type=add" class="btn btn-sm btn-primary"><i class="ri-add-line align-middle me-2"></i> Yeni Servis & Bakım Türü Ekle</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="carList" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>Servis & Bakım</th>
                                        <th>Araç</th>
                                        <th>Periyot</th>
                                        <th>Son Bakım Tarihi</th>
                                        <th class="text-end">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                        <td>Yağ Bakımı</td>
                                        <td>Pejo 206</td>
                                        <td>3 Ay</td>
                                        <td><span class="badge bg-warning">21.12.2023</span></td>
                                        <td class="text-end">
                                            <a href="service.php?type=typeShow" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="service.php?type=add" class="btn btn-outline-warning text-center m-1"><i class="ri-pencil-fill align-bottom fs-16"></i></a>
                                            <a href="#" class="btn btn-outline-danger text-center m-1"><i class="ri-delete-bin-fill align-bottom fs-16"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                        <td>Genel Bakımı</td>
                                        <td>Hepsi</td>
                                        <td>6 Ay</td>
                                        <td><span class="badge bg-warning">-</span></td>
                                        <td class="text-end">
                                            <a href="service.php?type=typeShow" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="service.php?type=add" class="btn btn-outline-warning text-center m-1"><i class="ri-pencil-fill align-bottom fs-16"></i></a>
                                            <a href="#" class="btn btn-outline-danger text-center m-1"><i class="ri-delete-bin-fill align-bottom fs-16"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#carList').DataTable({
                select: {
                    style: 'multi'
                }
            });
        });
    </script>
<?php endif; ?>

<?php if ($type == "show") : ?>
    <link href="<?= ASSET_PATH ?>/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <style>
        .swiper-container {
            width: 100%;
            height: 500px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-container .swiper-zoom-container>img {
            width: 100% !important;
            height: auto;
            object-fit: cover;
            object-position: center;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FLEET</a></li>
                                <li class="breadcrumb-item active"><?= $bread_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Servis & Bakım Görüntüle</h6>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row gy-3">

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Araç</p>
                                                                <h5 class="fs-15 mb-0">Pejo 206</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Bakım Türü</p>
                                                                <h5 class="fs-15 mb-0">Genel Bakım</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Masraf</p>
                                                                <h5 class="fs-15 mb-0">178 €</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Tarih</p>
                                                                <h5 class="fs-15 mb-0">21.12.2023</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Açıklama</p>
                                                                <h5 class="fs-15 mb-0">Genel bakımları yetkili serviste yapıldı. Aks başlığı bulunmadığı için sanayide ustaya yaptırıldı.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Servis & Bakım Görseli</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="swiper pagination-custom-swiper rounded">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="<?= ASSET_PATH ?>/images/small/img-2.jpg" alt="" class="img-fluid" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="<?= ASSET_PATH ?>/images/small/img-2.jpg" alt="" class="img-fluid" />
                                                    </div>
                                                </div>
                                                <div class="swiper-pagination pagination-custom"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>

    <!--Swiper slider js-->
    <script src="<?= ASSET_PATH ?>/libs/swiper/swiper-bundle.min.js"></script>

    <!-- swiper.init js -->
    <script src="<?= ASSET_PATH ?>/js/pages/swiper.init.js"></script>

<?php endif; ?>


<?php if ($type == "typeShow") : ?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FLEET</a></li>
                                <li class="breadcrumb-item active"><?= $bread_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Servis & Bakım Türü Görüntüle</h6>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row gy-3">

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Araç</p>
                                                                <h5 class="fs-15 mb-0">Hepsi</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">İsim</p>
                                                                <h5 class="fs-15 mb-0">Genel Bakım</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Periyot</p>
                                                                <h5 class="fs-15 mb-0">6 Aylık</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Açıklama</p>
                                                                <h5 class="fs-15 mb-0">Tüm araçların bu bakımı yapması zorunlu. Yetkili servis dışında yaptırılan bakımlar bildirilmek zorunda.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>



<?php if ($type == "add") : ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?= ASSET_PATH ?>/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="homepage">FLEET</a></li>
                                <li class="breadcrumb-item active"><?= $bread_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">İsim</label>
                                        <input type="text" class="form-control" placeholder="Servis & Bakım İsmi">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="project-title-input">Açıklama</label>
                                        <input type="text" class="form-control" placeholder="Açıklama">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Periyot</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="0" selected>Tek Seferlik</option>
                                    <?php
                                    $count = 36;
                                    for ($i = 1; $i <= $count; $i++) {
                                        echo '<option value="' . $i . '">' . $i . ' Aylık</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Bakıma Tabii Araçlar</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" id="drivers" multiple>
                                    <option value="0">Hepsi</option>
                                    <option value="Brent Gonzalez" selected>Pejo 206</option>
                                    <option value="Darline Williams">Pejo 207</option>
                                    <option value="Sylvia Wright">Pejo 208</option>
                                    <option value="Ellen Smith">Pejo 106</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-start mb-4">
                        <button type="button" class="btn btn-success w-sm">Oluştur</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ckeditor -->
    <script src="<?= ASSET_PATH ?>/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <!-- dropzone js -->
    <script src="<?= ASSET_PATH ?>/libs/dropzone/dropzone-min.js"></script>
    <!-- project-create init -->
    <script src="<?= ASSET_PATH ?>/js/pages/project-create.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

        });
        document.addEventListener("DOMContentLoaded", function() {
            $('#drivers').select2({
                placeholder: "Şoför Seçiniz",
                allowClear: true
            });
        });
    </script>
<?php endif; ?>


