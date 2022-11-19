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
                                    if($personelCek){

                                    
                                    foreach($personelCek as $p){
                                ?>      
                                        <!-- Duzenle Modals -->
                                        <div id="kullaniciDuzenleModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Personel Düzenle</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" class="row g-3">
                                                            <div class="col-md-12">
                                                                <label for="fullnameInput" class="form-label">Tc Kimlik</label>
                                                                <input type="text" value="<?=$p -> tc?>" name="editTc" class="form-control" id="personelKayitTc" placeholder="Lütfen Personelin Tc Kimlik Numarasını giriniz">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="fullnameInput" class="form-label">Adı Soyadı</label>
                                                                <input type="text" value="<?=$p -> nameSurname?>" name="editName" class="form-control" id="editName" placeholder="Lütfen Personelin Adını ve Soyadını giriniz">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputEmail4" class="form-label">Email</label>
                                                                <input name="kayitEmail" value="<?=$p -> email?>" type="email" class="form-control" id="editMail" placeholder="Lütfen Personelin Email adresini giriniz">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputPassword4" class="form-label">Şifre</label>
                                                                <input type="password" name="kayitPassword" class="form-control" id="editSifre" placeholder="Lütfen Personelin Şifresini giriniz">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputCity" class="form-label">Telefon</label>
                                                                <input type="text" value="<?=$p -> phone?>" name="kayitTelefon" class="form-control" id="editPhone" placeholder="Lütfen Personelin Telefon Numarasını giriniz">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="choices-single-no-search" class="form-label text-muted">Personel Yetki Durumu</label>
                                                                <select selected = "0" name="editAuth" class="form-control" id="editAuth" data-choices data-choices-search-false data-choices-removeItem>
                                                                    <option value="1">Personel</option>
                                                                    <option value="0">Yetkili</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputZip" value="<?=$p -> salary?>" class="form-label">Maaş</label>
                                                                <input type="text" name="kayitMaas" class="form-control" id="editSalary" placeholder="Maaş Miktarı">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                                                        <button onclick="personalEdit(<?=$p -> id?>,document.forms[0].editTc.value, document.forms[0].editName.value, document.forms[0].editMail.value, document.forms[0].editSifre.value, document.forms[0].editPhone.value, document.forms[0].editAuth.value, document.forms[0].editSalary.value)" type="button" class="btn btn-primary ">Save Changes</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--- Duzenle Modals End-->
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
                                                <div class="d-flex gap-2 justify-content-sm-center">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#kullaniciDuzenleModal">Düzenle</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn" onclick="personalDelete(<?=$p -> id?>)">Kaldır</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } }?>
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


