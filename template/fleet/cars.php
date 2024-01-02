<?php
$type = $params['type'];
if ($type == "list") {
    $bread_title = "Araç Listesi";
} else if ($type == "add") {
    $bread_title = "Araç Ekle";
} else if ($type == "edit") {
    $bread_title = "Araç Düzenle";
} else if ($type == "show") {
    $bread_title = "Araç Göster";
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
                                <li class="breadcrumb-item active">Araç Listesi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Araçlarım</h5>
                            <div class="card-toolbar">
                                <div class="dropdown">
                                    <a href="cars.php?type=add" class="btn btn-primary btn-sm"><i class="ri-add-line align-middle me-2"></i> Araç Ekle</a>
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
                                        <th>Araç İsmi</th>
                                        <th>Yıl</th>
                                        <th>Marka</th>
                                        <th>Model</th>
                                        <th>VIN</th>
                                        <th>Plaka</th>
                                        <th>Şube</th>
                                        <th>Tür</th>
                                        <th>Durum</th>
                                        <th>Güncel Km</th>
                                        <th>Şoför</th>
                                        <th>İşlem</th>
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
                                        <td>2001</td>
                                        <td>Peugeout</td>
                                        <td>206</td>
                                        <td>6A45WDA5WD48</td>
                                        <td>07 R 2976</td>
                                        <td><span class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Turkey/Kayseri/Kocasinan/SAFARİ GPS">[Yönetim] <i class="ri-git-branch-line cursor-pointer"></i> </span></td>
                                        <td><span class="badge bg-info">Otomobil</span></td>
                                        <td>Aktif</td>
                                        <td><span class="badge bg-info-subtle text-info">297.176</span></td>
                                        <td><a href="#!"><span class="badge bg-danger">3</span></a></td>
                                        <td>
                                            <a href="cars.php?type=show" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
                                            <a href="cars.php?type=add" class="btn btn-outline-warning text-center m-1"><i class="ri-pencil-fill align-bottom fs-16"></i></a>
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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div>
                                        <label class="form-label" for="project-title-input">Araç İsmi</label>
                                        <input type="text" class="form-control" placeholder="Araç İsmi">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="project-title-input">Imei <small>[SafariGPS]</small> </label>
                                        <input type="text" class="form-control" placeholder="Imei Numarası">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Marka</label>
                                        <input type="text" class="form-control" placeholder="Araç Markası">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Model</label>
                                        <input type="text" class="form-control" placeholder="Araç Modeli">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Yıl</label>
                                        <input type="text" class="form-control" placeholder="Araç Yılı">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">VIN/SN</label>
                                        <input type="text" class="form-control" placeholder="VIN">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Plaka</label>
                                        <input type="text" class="form-control" placeholder="Araç Plakası">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Güncel Km</label>
                                        <input type="text" class="form-control" placeholder="Araç Kilometresi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Araç Görselleri</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <p class="text-muted">Varsa araç görselleri ekleyebilirsiniz!</p>

                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img src="#" alt="Project-Image" data-dz-thumbnail class="img-fluid rounded d-block" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Araç Türü</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                                    <option value="Private" selected>Otomobil</option>
                                    <option value="Team">Kamyonet</option>
                                    <option value="Public">Suv</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Şube</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <select class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                                    <option value="Private" selected>Yönetim <small class="text-muted">[Turkey/Kayseri/Kocasinan/SAFARİ GPS]</small></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Durum</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing" selected>Aktif</option>
                                    <option value="Development">Bakımda</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Şoför Seç</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" id="drivers" multiple>
                                    <option value="Brent Gonzalez" selected>Brent Gonzalez</option>
                                    <option value="Darline Williams">Darline Williams</option>
                                    <option value="Sylvia Wright">Sylvia Wright</option>
                                    <option value="Ellen Smith">Ellen Smith</option>
                                    <option value="Jeffrey Salazar">Jeffrey Salazar</option>
                                    <option value="Mark Williams">Mark Williams</option>
                                    <optgroup label="Araç 1">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Araç 2">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Yakıt Türü</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing" selected>Sonra Birleyeceğim</option>
                                    <option value="Development">Benzin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mülkiyet</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing" selected>Kiralık</option>
                                    <option value="Development">Bize Ait</option>
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


<?php if ($type == "show") : ?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $bread_title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FLEET</a></li>
                                <li class="breadcrumb-item active">Araç Göster</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-warning-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/brands/slack.png" alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">Pejo 206</h4>
                                                    <div class="badge rounded-pill bg-info fs-12 mb-3">UĞUR IŞIK</div>
                                                    <div class="badge rounded-pill bg-info fs-12 mb-3">TARIK ÖNAL</div>
                                                    <div class="badge rounded-pill bg-info fs-12 mb-3">HAMİT KARAKAYA</div>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <div><i class="ri-car-fill align-bottom me-1"></i> Otomobil</div>
                                                        <div class="vr"></div>
                                                        <div>Peugeout 206 - 2001</div>
                                                        <div class="vr"></div>
                                                        <div>AW86F745AAW</div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-primary fs-12">07 R 2976</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-1 flex-wrap">
                                            <button type="button" class="btn btn-primary py-0 fs-14 ">
                                                <i class="ri-edit-line"></i> Düzenle
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#info" role="tab">
                                            Özet
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#trips" role="tab">
                                            Geziler(Trips)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#finance" role="tab">
                                            Finansal Rapor
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#service" role="tab">
                                            Servis Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#issue" role="tab">
                                            Sorun Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#fuel" role="tab">
                                            Yakıt Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#crash" role="tab">
                                            Kaza Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#ticket" role="tab">
                                            Ceza Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#ticket" role="tab">
                                            Km Geçmişi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  fw-semibold" data-bs-toggle="tab" href="#reminder" role="tab">
                                            Hatırlatmalar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row gy-3">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Araç İsmi</p>
                                                                <h5 class="fs-15 mb-0">Pejo 206</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Marka</p>
                                                                <h5 class="fs-15 mb-0">Peugeout</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Model</p>
                                                                <h5 class="fs-15 mb-0">206</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Yıl</p>
                                                                <h5 class="fs-15 mb-0">2001</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">VIN/SN</p>
                                                                <h5 class="fs-15 mb-0">A68W4D6A5WD</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Plaka</p>
                                                                <h5 class="fs-15 mb-0">07 R 2976</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Güncel Km</p>
                                                                <div class="badge bg-danger fs-12">297.456</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Araç Türü</p>
                                                                <div class="badge bg-warning fs-12">Otomobil</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Durum</p>
                                                                <h5 class="fs-15 mb-0">Aktif</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Yakıt Türü</p>
                                                                <h5 class="fs-15 mb-0">Benzin</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Mülkiyet</p>
                                                                <div class="badge bg-danger fs-12">Kiralık</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Son Bilinen Konumu</h4>
                                        </div>

                                        <div class="card-body">
                                            <div id="gmaps-markers" class="gmaps"></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Kaza</h5>
                                                </div>
                                                <div class="card-body table-responsive" style="max-height:500px">
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                                    <i class="ri-file-text-fill align-middle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">Uğur Işık</h5>
                                                                <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 1 days ago</p>
                                                            </div>
                                                            <div class="flex-grow-1 text-end">
                                                                <p class="fs-12 mb-0 text-muted">Sürücü Hatalı</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                                    <i class="ri-file-text-fill align-middle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">Tarık ÖNAL</h5>
                                                                <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 25 days ago</p>
                                                            </div>
                                                            <div class="flex-grow-1 text-end">
                                                                <p class="fs-12 mb-0 text-muted">Karşı Taraf Hatalı</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Ceza</h5>
                                                </div>
                                                <div class="card-body table-responsive" style="max-height:500px">
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                                    <i class="ri-file-text-fill align-middle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">Uğur Işık</h5>
                                                                <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 1 days ago</p>
                                                            </div>
                                                            <div class="flex-grow-1 text-end">
                                                                <h5 class="fs-14 mb-1">Park Cezası</h5>
                                                                <p class="fs-12 mb-0 text-muted">25 €</p>
                                                                <p class="fs-12 mb-0 text-muted">Ödendi</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                                    <i class="ri-file-text-fill align-middle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1">Tarık ÖNAL</h5>
                                                                <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 12 days ago</p>
                                                            </div>
                                                            <div class="flex-grow-1 text-end">
                                                                <h5 class="fs-14 mb-1">Hız Limiti</h5>
                                                                <p class="fs-12 mb-0 text-muted">21 €</p>
                                                                <p class="fs-12 mb-0 text-muted">Ödenmedi</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Araç Sorunları</h5>
                                        </div>
                                        <div class="card-body table-responsive" style="max-height:500px">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Fren Lambası</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 2 days ago</p>
                                                    </div>
                                                    <div class="flex-grow-1 text-end">
                                                        <p class="fs-12 mb-0 text-muted">Uğur IŞIK</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Yağ Kaçağı</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 4 days ago</p>
                                                    </div>
                                                    <div class="flex-grow-1 text-end">
                                                        <p class="fs-12 mb-0 text-muted">Uğur IŞIK</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Direksiyon Hidroliği</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 6 days ago</p>
                                                    </div>
                                                    <div class="flex-grow-1 text-end">
                                                        <p class="fs-12 mb-0 text-muted">Uğur IŞIK</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Servis & Bakım</h5>
                                        </div>
                                        <div class="card-body table-responsive" style="max-height:500px">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Yağ Bakımı</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> Her 3 ay ya da 10.000 Km</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Lastik Bakımı</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> Her 3 ay ya da 10.000 Km</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Yakıt</h5>
                                        </div>
                                        <div class="card-body table-responsive" style="max-height:500px">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Uğur Işık</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 1 days ago</p>
                                                    </div>
                                                    <div class="flex-grow-1 text-end">
                                                        <h5 class="fs-14 mb-1">38 L</h5>
                                                        <p class="fs-12 mb-0 text-muted">25 €</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-primary">
                                                            <i class="ri-file-text-fill align-middle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-1">Uğur Işık</h5>
                                                        <p class="fs-12 mb-0 text-muted"><i class="ri-time-line align-middle me-1"></i> 2 days ago</p>
                                                    </div>
                                                    <div class="flex-grow-1 text-end">
                                                        <h5 class="fs-14 mb-1">33 L</h5>
                                                        <p class="fs-12 mb-0 text-muted">21 €</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="trips" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1">Documents</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Upload Date</th>
                                                            <th scope="col" style="width: 120px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-body">Artboard-documents.zip</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Zip File</td>
                                                            <td>4.57 MB</td>
                                                            <td>12 Dec 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                            <i class="ri-file-pdf-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Bank Management System</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>PDF File</td>
                                                            <td>8.89 MB</td>
                                                            <td>24 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-video-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Tour-video.mp4</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>MP4 File</td>
                                                            <td>14.62 MB</td>
                                                            <td>19 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-success rounded fs-24">
                                                                            <i class="ri-file-excel-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Account-statement.xsl</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>XSL File</td>
                                                            <td>2.38 KB</td>
                                                            <td>14 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-warning rounded fs-24">
                                                                            <i class="ri-folder-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Project Screenshots Collection</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Folder File</td>
                                                            <td>87.24 MB</td>
                                                            <td>08 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                            <i class="ri-image-2-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Velzon-logo.png</a></h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>PNG File</td>
                                                            <td>879 KB</td>
                                                            <td>02 Nov 2021</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-more-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="javascript:void(0);" class="text-success "><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-activities" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Activities</h5>
                                    <div class="acitivity-timeline py-3">
                                        <div class="acitivity-item d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= ASSET_PATH ?>/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Oliver Phillips <span class="badge bg-primary-subtle text-primary align-middle">New</span></h6>
                                                <p class="text-muted mb-2">We talked about a project on linkedin.</p>
                                                <small class="mb-0 text-muted">Today</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    N
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Nancy Martino <span class="badge bg-secondary-subtle text-secondary align-middle">In Progress</span></h6>
                                                <p class="text-muted mb-2"><i class="ri-file-text-line align-middle ms-2"></i> Create new project Building product</p>
                                                <div class="avatar-group mb-2">
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Christi">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-4.jpg.png" alt="" class="rounded-circle avatar-xs" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Frank Hook">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title=" Ruby">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-light text-primary">
                                                                R
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="more">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle">
                                                                2+
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= ASSET_PATH ?>/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Natasha Carey <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                <p class="text-muted mb-2">Adding a new event with attachments</p>
                                                <div class="row">
                                                    <div class="col-xxl-4">
                                                        <div class="row border border-dashed gx-2 p-2 mb-2">
                                                            <div class="col-4">
                                                                <img src="<?= ASSET_PATH ?>/images/small/img-2.jpg" alt="" class="img-fluid rounded" />
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-4">
                                                                <img src="<?= ASSET_PATH ?>/images/small/img-3.jpg" alt="" class="img-fluid rounded" />
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-4">
                                                                <img src="<?= ASSET_PATH ?>/images/small/img-4.jpg" alt="" class="img-fluid rounded" />
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <small class="mb-0 text-muted">25 Nov</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= ASSET_PATH ?>/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Bethany Johnson</h6>
                                                <p class="text-muted mb-2">added a new member to velzon dashboard</p>
                                                <small class="mb-0 text-muted">19 Nov</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                        <i class="ri-shopping-bag-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Your order is placed <span class="badge bg-danger-subtle text-danger align-middle ms-1">Out of Delivery</span></h6>
                                                <p class="text-muted mb-2">These customers can rest assured their order has been placed.</p>
                                                <small class="mb-0 text-muted">16 Nov</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= ASSET_PATH ?>/images/users/avatar-7.jpg.png" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Lewis Pratt</h6>
                                                <p class="text-muted mb-2">They all have something to say beyond the words on the page. They can come across as casual or neutral, exotic or graphic. </p>
                                                <small class="mb-0 text-muted">22 Oct</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                        <i class="ri-line-chart-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Monthly sales report</h6>
                                                <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                <small class="mb-0 text-muted">15 Oct</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?= ASSET_PATH ?>/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">New ticket received <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span> submitted a ticket.</p>
                                                <small class="mb-0 text-muted">26 Aug</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-team" role="tabpanel">
                            <div class="row g-4 mb-3">
                                <div class="col-sm">
                                    <div class="d-flex">
                                        <div class="search-box me-2">
                                            <input type="text" class="form-control" placeholder="Search member...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="team-list list-view-filter">
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Nancy Martino</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Team Leader & HR</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">225</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">197</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                            HB
                                                        </div>
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Henry Baird</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Full Stack Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">352</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">376</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-3.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Frank Hook</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Project Manager</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">164</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">182</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-8.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Jennifer Carter</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">UI/UX Designer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">225</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">197</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                            ME
                                                        </div>
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Megan Elmore</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Team Leader & Web Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">201</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">263</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-4.jpg.png" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Alexis Clarke</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Backend Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">132</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">147</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <div class="avatar-title bg-info-subtle text-info rounded-circle">
                                                            NC
                                                        </div>
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Nathan Cole</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Front-End Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">352</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">376</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-7.jpg.png" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Joseph Parker</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Team Leader & HR</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">64</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">93</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <img src="<?= ASSET_PATH ?>/images/users/avatar-5.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Erica Kernan</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Web Designer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">345</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">298</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                                <div class="card team-box">
                                    <div class="card-body px-4">
                                        <div class="row align-items-center team-row">
                                            <div class="col team-settings">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="flex-shrink-0 me-2">
                                                            <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-end dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill fs-17"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="team-profile-img">
                                                    <div class="avatar-lg img-thumbnail rounded-circle">
                                                        <div class="avatar-title border bg-light text-primary rounded-circle">
                                                            DP
                                                        </div>
                                                    </div>
                                                    <div class="team-content">
                                                        <a href="#" class="d-block">
                                                            <h5 class="fs-16 mb-1">Donald Palmer</h5>
                                                        </a>
                                                        <p class="text-muted mb-0">Wed Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col">
                                                <div class="row text-muted text-center">
                                                    <div class="col-6 border-end border-end-dashed">
                                                        <h5 class="mb-1">97</h5>
                                                        <p class="text-muted mb-0">Projects</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-1">135</h5>
                                                        <p class="text-muted mb-0">Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col">
                                                <div class="text-end">
                                                    <a href="pages-profile.html" class="btn btn-light view-btn">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!-- end team list -->

                            <div class="row g-0 text-center text-sm-start align-items-center mb-3">
                                <div class="col-sm-6">
                                    <div>
                                        <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                        <li class="page-item disabled"> <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a> </li>
                                        <li class="page-item"> <a href="#" class="page-link">1</a> </li>
                                        <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
                                        <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                                        <li class="page-item"> <a href="#" class="page-link">4</a> </li>
                                        <li class="page-item"> <a href="#" class="page-link">5</a> </li>
                                        <li class="page-item"> <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a> </li>
                                    </ul>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>

    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

    <!-- gmaps plugins -->
    <script src="<?= ASSET_PATH ?>/libs/gmaps/gmaps.min.js"></script>

    <!-- gmaps init -->
    <script src="<?= ASSET_PATH ?>/js/pages/gmaps.init.js"></script>

<?php endif; ?>