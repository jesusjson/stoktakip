<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Personel Listesi</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-center">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Personel Ara...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;"></th>
                                        <th class="sort" data-sort="customer_name">Tc Kimlik</th>
                                        <th class="sort" data-sort="email">Ad Soyad</th>
                                        <th class="sort" data-sort="phone">E-Posta</th>
                                        <th class="sort" data-sort="status">Telefon</th>
                                        <th class="sort" data-sort="action">Maaş</th>
                                        <th class="sort" data-sort="action">Kıdem</th>
                                        <th class="sort" data-sort="action">Etkileşim</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                <?php

                                    use iplikciNedim\rıfkı\rıfkı;

                                    $personelCek = rıfkı::table('users') -> get();
                                    foreach($personelCek as $p){
                                ?>
                                        <tr>
                                            <th scope="row"></th>
                                            
                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="customer_name"><?=$p -> tc?></td>
                                            <td class="email"><?=$p -> nameSurname?></td>
                                            <td class="phone"><?=$p -> email?></td>
                                            <td class="date"><?=$p -> phone?></td>
                                            <td class="date"><?=$p -> salary?></td>
                                            <td class="status"><span class="badge badge-soft-success text-uppercase"><?=($p -> userAuth == 0) ? "Yetkili" : "Personel";?></span></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Düzenle</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Kaldır</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sonuç bulunamadı</h5>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Geri
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    İleri
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
        </div>
    </div>
</div>