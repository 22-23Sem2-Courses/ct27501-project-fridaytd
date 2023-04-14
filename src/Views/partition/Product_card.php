<div id="<?= $i ?>" class="card col-xl-3 col-lg-4 col-sm-6 my-2 mx-2" style="width: 18rem;">
    <div class="d-flex justify-content-center mt-3">
        <img id="img<?= $i ?>" src="/images/Tea/traolongmangcau.png" width="60%" class="" alt="...">
    </div>
    <div class="card-body ">
        <h5 id="name<?= $i ?>" class="card-title text-center">Trà Ô Long Mãng Cầu</h5>
        <h5 id="price<?= $i ?>" class="text-center my-3" style="color: #0C713D">55.000</h5>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="setValue(<?= $i ?>)" class="btn button" data-bs-toggle="modal"
                data-bs-target="#productModal">
                Thêm vào giỏ hàng
            </button>
        </div>
    </div>
</div>