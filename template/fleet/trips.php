
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<style>
    .tripRow {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .tripRow:hover {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        transition: all .2s ease-in-out;
        cursor: pointer;
    }

    .alert {
        padding: 5px 30px;
        margin-bottom: 5px;
        border-radius: 10px;
        margin-top: 10px;
    }

    .alert i {
        font-size: 22px !important;
    }

    .alert i:hover {
        cursor: pointer;
        text-shadow: 0 0 11px rgba(33, 33, 33, .4);
        transition: all .2s ease-in-out;
    }

    .alert-bottom-border {
        background-color: var(--vz-secondary-bg);
        border-color: var(--vz-border-color);
        border-bottom: 2px solid;
        color: var(--vz-body-color);
        border-bottom-color: var(--vz-secondary);
    }

    .custom-hover-nav-tabs .nav-item .nav-link {
        width: auto;
    }

    .tabBody {
        border-bottom: 1px dashed #e5e5e5;
        border-left: 1px dashed #e5e5e5;
        border-right: 1px dashed #e5e5e5;
    }

    .border-top-left {
        border-top-left-radius: 10px;
    }

    .border-top-right {
        border-top-right-radius: 10px;
    }

    .mischfahrt.active {
        background-color: rgb(59 130 246 / 69%) !important;
    }

    .betriebsfahrt.active {
        background-color: rgb(249 115 22 / 69%) !important;
    }

    .merge {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        display: none;
    }

    .merge .btn-info {
        width: 80px;
        height: 80px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 11px rgb(167 167 167) !important;
    }

    .merge i {
        font-size: 24px !important;
    }
</style>


<div class="page-content">
    <div id="detailModal" class="modal fade modal-xl " tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div id="gmaps-markers" class="gmaps"></div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="border border-top-left border-top-right">
                                    <ul class="nav nav-pills custom-hover-nav-tabs nav-justified gap-2 border-top-left border-top-right">
                                        <li class="nav-item border-top-left">
                                            <a href="#mischfahrt" data-bs-toggle="tab" aria-expanded="false" class="nav-link mischfahrt active">
                                                <i class="ri-slack-line nav-icon nav-tab-position"></i>
                                                <h5 class="nav-titl nav-tab-position m-0">Mischfahrt</h5>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#betriebsfahrt" data-bs-toggle="tab" aria-expanded="true" class="nav-link betriebsfahrt">
                                                <i class="ri-suitcase-3-line nav-icon nav-tab-position"></i>
                                                <h5 class="nav-titl nav-tab-position m-0">Betriebsfahrt</h5>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" onclick="Arbeitsweg()" class="nav-link">
                                                <i class="ri-suitcase-fill nav-icon nav-tab-position"></i>
                                                <h5 class="nav-titl nav-tab-position m-0">Arbeitsweg</h5>
                                            </a>
                                        </li>
                                        <li class="nav-item border-top-right">
                                            <a href="#" onclick="Privatfahrt()" class="nav-link">
                                                <i class="ri-shield-keyhole-line nav-icon nav-tab-position"></i>
                                                <h5 class="nav-titl nav-tab-position m-0">Privatfahrt</h5>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body tabBody">
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane show active" id="mischfahrt">
                                            <div class="row">
                                                <div class="col-md-12 d-flex justify-content-between mb-3">
                                                    <div class="totalDistance fs-14">Mischfahrt <small class="fw-bold value">5 Km</small> </div>
                                                    <div class="remainingDistance fs-14">Verbleibende Distanz: <small class="fw-bold value">5 Km</small></div>
                                                </div>
                                                <div class="col-md-12 d-flex justify-content-between mb-3">
                                                    <div class="row w-100">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="betrieblich fs-14">Betrieblich: <span class="value fw-semibold">2 Km</span></div>
                                                            <input type="range" class="form-range" name="betrieblich">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="privat fs-14">Privat: <span class="value fw-semibold">2 Km</span></div>
                                                            <input type="range" class="form-range" name="privat">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="arbeitsweg fs-14">Arbeitsweg: <span class="value fw-semibold">2 Km</span></div>
                                                            <input type="range" class="form-range" name="arbeitsweg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary btn-block" onclick="saveMischfahrt()">Kaydet</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="betriebsfahrt">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" placeholder="İş Ortağı Giriniz...">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" placeholder="Firma Giriniz...">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <select class="form-select" id="sebep">
                                                        <option value="0" selected>Seyahat Sebebi Seçiniz</option>
                                                        <option value="Brent Gonzalez">Toplantı</option>
                                                        <option value="Darline Williams">Gezi</option>
                                                        <option value="Sylvia Wright">Satın Alma</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <select class="form-select" id="surucu">
                                                        <option value="0" selected>Sürücü Seçiniz</option>
                                                        <option value="Brent Gonzalez">Brent Gonzalez</option>
                                                        <option value="Darline Williams">Darline Williams</option>
                                                        <option value="Sylvia Wright">Sylvia Wright</option>
                                                        <option value="Ellen Smith">Ellen Smith</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="Açıklama Giriniz...">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary btn-block" onclick="saveBetriebsfahrt()">Kaydet</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Trips</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fleet</a></li>
                            <li class="breadcrumb-item active">Trips</li>
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

                                        <div class="col-md">
                                            <div>
                                                <h6>Araçlar</h6>
                                            </div>
                                            <div>
                                                <select class="form-control" id="choices-single-no-sorting" name="choices-single-no-sorting" data-choices data-choices-sorting-false>
                                                    <option value="pejo">Pejo 206</option>
                                                    <option value="0" disabled> --> Şoför - Uğur IŞIK</option>
                                                    <option value="0" disabled> --> Şoför - Tarık ÖNAL</option>
                                                    <option value="0" disabled> --> Şoför - Hamit KARAKAYA</option>
                                                    <option value="pejo">Fiat Siena</option>
                                                    <option value="0" disabled> --> Şoför - Hamit KARAKAYA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto" style="display: flex; justify-content: center; align-items: center; align-content: center;">
                                    <div class="hstack gap-1 flex-wrap">
                                        <button type="button" class="btn btn-md btn-primary py-2 fs-14 ">
                                            <i class="ri-eye-line"></i> Seç
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php
                $count = 0;
                for ($i = 0; $i < 10; $i++) {
                ?>
                    <?php
                    $rand = rand(1, 4);
                    $randKm = rand(1, 1254);

                    if ($i * $rand % 3 == 0) :
                    ?>
                        <div class="alert alert-secondary alert-bottom-border" role="alert">
                            <i class="ri-check-double-line me-3 align-middle fs-16 text-secondary"></i><strong>Gestern, 20.12.2023</strong>
                        </div>
                    <?php
                    endif;
                    ?>
                    <div class="card tripRow" onclick="showModal('<?= $randKm ?>')">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle fs-5">
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" value="" id="<?= $count ?>">
                                            <label class="form-check-label" for="merge<?= $i ?>"></label>
                                        </div>
                                    </span>
                                </div>
                                <div class="flex-grow-0 ms-3">
                                    <p class="text-uppercase fw-semibold fs-13 text-dark mb-1"> 18:18</p>
                                    <p class="text-uppercase fw-semibold fs-13 text-dark mb-1"> 18:12</p>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-13 text-muted mb-1"> Memelstraße 7, 27777 Ganderkesee, Deutschland</p>
                                    <p class="text-uppercase fw-semibold fs-13 text-muted mb-1"> dm-drogerie markt, Seestraße 5, 27755 Delmenhorst, Deutschland</p>
                                </div>
                                <div class="flex-shrink-0 align-self-center">
                                    <span class="badge bg-info-subtle text-info fs-13"><?= $randKm ?> Km<span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $count++;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="merge" onclick="mergeData()">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2">
        <i class="ri-git-merge-line fs-22"></i>
        Merge
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     $('#isortak').select2({
    //         placeholder: "İş Ortağı Seçiniz",
    //         allowClear: true
    //     });
    // });
</script>
<?php
include 'inc/footer.php';
?>
<script>
    function setMaxValues(max) {
        $('input[name="betrieblich"]').attr('max', max - 1);
        $('input[name="privat"]').attr('max', max - 1);
        $('input[name="arbeitsweg"]').attr('max', max - 1);
        $('input[name="betrieblich"]').val(0);
        $('input[name="privat"]').val(0);
        $('input[name="arbeitsweg"]').val(0);
        rangeValues();
    }
</script>
<script>
    function showModal(totalDistance) {
        $('.totalDistance .value').text(totalDistance + ' Km');
        $('.remainingDistance .value').text(totalDistance + ' Km');
        setMaxValues(totalDistance);
        $('#detailModal').modal('show');
    }

    function hideModal() {
        $('#detailModal').modal('hide');
    }
</script>
<script>
    function Arbeitsweg() {
        hideModal();
        Swal.fire({
            title: 'Arbeitsweg',
            text: "Arbeitsweg olarak kaydedilsin mi?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Evet',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Kaydedildi!',
                    'Arbeitsweg olarak kaydedildi.',
                    'success'
                )
            }
            // showModal(getTotalValue());
        })

    }
</script>

<script>
    function Privatfahrt() {
        hideModal();
        Swal.fire({
            title: 'Privatfahrt',
            text: "Privatfahrt olarak kaydedilsin mi?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Evet',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Kaydedildi!',
                    'Privatfahrt olarak kaydedildi.',
                    'success'
                )
            }
            // showModal(getTotalValue());
        })

    }
</script>


<script>
    function getTotalValue() {
        var betrieblich = $('input[name="betrieblich"]').val();
        var privat = $('input[name="privat"]').val();
        var arbeitsweg = $('input[name="arbeitsweg"]').val();
        return parseInt(betrieblich) + parseInt(privat) + parseInt(arbeitsweg);

    }
</script>


<script>
    function rangeValues() {
        var betrieblich = $('input[name="betrieblich"]').val();
        var privat = $('input[name="privat"]').val();
        var arbeitsweg = $('input[name="arbeitsweg"]').val();
        $('.betrieblich .value').text(betrieblich + ' Km');
        $('.privat .value').text(privat + ' Km');
        $('.arbeitsweg .value').text(arbeitsweg + ' Km');
        var totalDistance = $('.totalDistance .value').text().split(' ')[0];
        var remainingDistance = totalDistance - getTotalValue();
        $('.remainingDistance .value').text(remainingDistance + ' Km');
    }

    $('input[name="betrieblich"], input[name="privat"], input[name="arbeitsweg"]').on('input', function() {
        var thisVal = $(this).val();
        var totalDistance = $('.totalDistance .value').text().split(' ')[0];
        var otherValues = getTotalValue() - thisVal;
        var remainingDistance = totalDistance - otherValues;
        if (thisVal > remainingDistance) {
            $(this).val(remainingDistance);
            thisVal = remainingDistance;
        }
        rangeValues();
        console.log(remainingDistance);
    });
</script>

<script>
    function saveMischfahrt() {
        var totalVal = getTotalValue();
        if (totalVal != $('.totalDistance .value').text().split(' ')[0]) {
            Swal.fire({
                title: 'Hata!',
                text: "Toplam mesafe ile girdiğiniz mesafe uyuşmuyor.",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Tamam'
            })
            return false;
        }
        hideModal();
        Swal.fire({
            title: 'Mischfahrt',
            text: "Mischfahrt olarak kaydedilsin mi?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Evet',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Kaydedildi!',
                    'Mischfahrt olarak kaydedildi.',
                    'success'
                )
            }
            // showModal(totalVal);
        })
    }
</script>

<script>
    function saveBetriebsfahrt() {
        hideModal();
        Swal.fire({
            title: 'Betriebsfahrt',
            text: "Betriebsfahrt olarak kaydedilsin mi?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Evet',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Kaydedildi!',
                    'Betriebsfahrt olarak kaydedildi.',
                    'success'
                )
            }
            // showModal(getTotalValue());
        })
    }
</script>


<script>
    var checkboxes = document.querySelectorAll('.tripRow input[type=checkbox]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var selectedIds = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => parseInt(checkbox.id));

            var isSequential = selectedIds.every((id, index) => index === 0 || id === selectedIds[index - 1] + 1);
            console.log(selectedIds, isSequential)
            if (!isSequential) {
                Swal.fire({
                    title: 'Hata!',
                    text: "Seçtiğiniz kayıtlar arasında boşluk var.",
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Tamam'
                })
                checkbox.checked = false;



            } else {
                if (selectedIds.length > 1) {
                    $('.merge').fadeIn();
                } else {
                    $('.merge').fadeOut();
                }
            }
        });
    });

    $('.tripRow input[type="checkbox"]').on('click', function(event) {
        event.stopPropagation();
    });
</script>

<script>
    function mergeData() {
        var selectedIds = Array.from(document.querySelectorAll('.tripRow input[type=checkbox]'))
            .filter(checkbox => checkbox.checked)
            .map(checkbox => parseInt(checkbox.id));
        if (selectedIds.length >= 2) {
            Swal.fire({
                title: 'Başarılı!',
                text: "Seçtiğiniz kayıtlar birleştirildi.",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Tamam'
            })
        }
    }
</script>

<script>
    $('.alert i').on('click', function() {
        // Select all checkboxes in .tripRow elements until the next .alert
        var checkboxes = $(this).parent().nextUntil('.alert').find('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkboxes[i].checked = false;
            } else {
                checkboxes[i].checked = true;
            }
        }


        var selectedIds = Array.from(document.querySelectorAll('.tripRow input[type=checkbox]'))
            .filter(checkbox => checkbox.checked)
            .map(checkbox => parseInt(checkbox.id));

        var isSequential = selectedIds.every((id, index) => index === 0 || id === selectedIds[index - 1] + 1);

        if (selectedIds.length >= 2 && isSequential) {
            $('.merge').fadeIn();
        } else {
            $('.merge').fadeOut();
        }

    });
</script>