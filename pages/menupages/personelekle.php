<div class="container-fluid">
    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="fullnameInput" class="form-label">Tc Kimlik</label>
            <input type="text" name="kayitTc" class="form-control" id="personelKayitTc" placeholder="Lütfen Personelin Tc Kimlik Numarasını giriniz">
        </div>
        <div class="col-md-6">
            <label for="fullnameInput" class="form-label">Adı Soyadı</label>
            <input type="text" name="kayitAd" class="form-control" id="personelKayitAdi" placeholder="Lütfen Personelin Adını ve Soyadını giriniz">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input name="kayitEmail" type="email" class="form-control" id="personelKayitMail" placeholder="Lütfen Personelin Email adresini giriniz">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Şifre</label>
            <input type="password" name="kayitPassword" class="form-control" id="personelKayitSifre" placeholder="Lütfen Personelin Şifresini giriniz">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Telefon</label>
            <input type="text" name="kayitTelefon" class="form-control" id="personelKayitTel" placeholder="Lütfen Personelin Telefon Numarasını giriniz">
        </div>
        <div class="col-md-4">
            <label for="choices-single-no-search" class="form-label text-muted">Personel Yetki Durumu</label>
            <select name="kayitAuth" class="form-control" id="personelKayitAuth" data-choices data-choices-search-false data-choices-removeItem>
                <option value="1">Personel</option>
                <option value="0">Yetkili</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Maaş</label>
            <input type="text" name="kayitMaas" class="form-control" id="personelKayitMaas" placeholder="Maaş Miktarı">
        </div>
        
        <div class="col-12">
            <div class="text-end">
                <button type="sumbit" name="personelKayitButton" class="btn btn-primary">Personel Kaydı Oluştur</button>
            </div>
        </div>
    </form>
    <?=System::register()?>
</div>