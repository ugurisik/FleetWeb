<?php

$type = $params['type'];
if ($type == "list") {
    $bread_title = "Yakıt Listesi";
} else if ($type == "show") {
    $bread_title = "Yakıt Göster";
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
                            <h5 class="card-title mb-0">Yakıtlar</h5>
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
                                        <th>Operatör</th>
                                        <th>Litre</th>
                                        <th>Tutar</th>
                                        <th>Alım Tarihi</th>
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
                                        <td>UĞUR IŞIK</td>
                                        <td>48 L</td>
                                        <td><span class="badge bg-info">38€</span></td>
                                        <td><span class="badge bg-warning">21.12.2023</span></td>
                                        <td class="text-end">
                                            <a href="fuel.php?type=show" class="btn btn-outline-info text-center m-1"><i class="ri-eye-fill align-bottom fs-16"></i></a>
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
                                                <h6 class="mb-3 fw-semibold text-uppercase">Kaza</h6>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row gy-3">

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Operatör</p>
                                                                <h5 class="fs-15 mb-0">Uğur IŞIK</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Araç</p>
                                                                <h5 class="fs-15 mb-0">Pejo 206</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Güncel Km</p>
                                                                <h5 class="fs-15 mb-0">298.789 km</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Litre</p>
                                                                <h5 class="fs-15 mb-0">38 L</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Tutar</p>
                                                                <h5 class="fs-15 mb-0">35€</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Alım Tarihi</p>
                                                                <h5 class="fs-15 mb-0">21.12.2023</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Yakıt Fişi</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="swiper pagination-custom-swiper rounded">
                                                <div class="swiper-wrapper">
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

