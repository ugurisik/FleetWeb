<?php

$type = $params['type'];
if ($type == "list") {
    $bread_title = "Şube Listesi";
} else if ($type == "addBranch") {
    $bread_title = "Şube Ekle";
} else if ($type == "listPerson") {
    $bread_title = "Personel Listesi";
} else if ($type == "addPerson") {
    $bread_title = "Personel Ekle";
} else if ($type == "showBranch") {
    $bread_title = "Şube Detayları";
} else if ($type == "showPerson") {
    $bread_title = "Personel Detayları";
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
                            <h5 class="card-title mb-0">Şubeler</h5>
                            <div class="card-toolbar">
                                <div class="dropdown">
                                    <a href="branch.php?type=addBranch" class="btn btn-primary btn-sm"><i class="ri-add-line align-middle me-2"></i> Şube Ekle</a>
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
                                        <th>Şube İsmi</th>
                                        <th>Yönetici</th>
                                        <th>Lokasyon</th>
                                        <th>Adres</th>
                                        <th>Araç</th>
                                        <th>Personel</th>
                                        <th>Şoför</th>
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
                                        <td>Yönetim</td>
                                        <td>Tarık ÖNAL</td>
                                        <td><span class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Turkey/Kayseri/Kocasinan">[SAFARİ GPS] <i class="ri-git-branch-line cursor-pointer"></i> </span></td>
                                        <td>Sahabiye mh. Başak Sk Başak Apt....</td>
                                        <td>7</td>
                                        <td>13</td>
                                        <td>7</td>
                                        <td class="text-end">
                                            <a href="branch.php?type=showBranch" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="branch.php?type=addBranch" class="btn btn-outline-warning text-center m-1"><i class="ri-pencil-fill align-bottom fs-16"></i></a>
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

<?php if ($type == "addBranch") : ?>
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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Şube İsmi</label>
                                        <input type="text" class="form-control" name="" placeholder="Şube İsmi">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="project-title-input">Adres</label>
                                        <input type="text" class="form-control" placeholder="Adres">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label" for="project-title-input">Ülke</label>
                                    <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                                        <option value="turkey" selected>Türkiye</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label" for="project-title-input">Şehir</label>
                                    <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input" disabled>

                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label class="form-label" for="project-title-input">Bölge</label>
                                        <input type="text" class="form-control" placeholder="Bölge">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Yönetici</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing">Tarık ÖNAL</option>
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

        // eline sağlık  abi bok gibi olmuş
        
    </script>
<?php endif; ?>



<?php
if ($type == "listPerson") :
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
                            <h5 class="card-title mb-0">Personel</h5>
                            <div class="card-toolbar">
                                <div class="dropdown">
                                    <a href="branch.php?type=addBranch" class="btn btn-primary btn-sm"><i class="ri-add-line align-middle me-2"></i> Personel Ekle</a>
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
                                        <th>Personel İsmi</th>
                                        <th>Şube</th>
                                        <th>Rol</th>
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
                                        <td>Tarık ÖNAL</td>
                                        <td><span class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Turkey/Kayseri/Kocasinan/SAFARİ GPS">[Yönetim] <i class="ri-git-branch-line cursor-pointer"></i> </span></td>
                                        <td>Yönetici</td>
                                        <td class="text-end">
                                            <a href="branch.php?type=showPerson" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="branch.php?type=addPerson" class="btn btn-outline-warning text-center m-1"><i class="ri-pencil-fill align-bottom fs-16"></i></a>
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

<?php if ($type == "addPerson") : ?>
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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Personel İsmi</label>
                                        <input type="text" class="form-control" placeholder="Personel Adı">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Personel Soyismi</label>
                                        <input type="text" class="form-control" placeholder="Personel Soyadı">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Telefon Numarası</label>
                                        <input type="text" class="form-control" placeholder="Telefon Numarası">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Adres</label>
                                        <input type="text" class="form-control" placeholder="İkamet">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Kullanıcı Adı</label>
                                        <input type="text" class="form-control" placeholder="Kullanıcı Adı">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="project-title-input">Şifre</label>
                                        <input type="text" class="form-control" placeholder="Şifre">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Şubeye Yönetici Olarak Ata</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                                    <option value="Private" selected>Yönetim <small class="text-muted">[Turkey/Kayseri/Kocasinan/SAFARİ GPS]</small></option>
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



