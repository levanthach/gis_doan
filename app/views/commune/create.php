   <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Thêm quận, huyện</div>
                <hr>
                <form action="<?= BASEURL ?>/commune/store" method="post">
                
                  <div class="form-group">
	                  <label for="input-2">Chọn quận huyện</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="district_id" required aria-invalid="false">
                        <?php foreach ($data['district'] as $key => $value): ?>
                          <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                        <?php endforeach ?>
	                    </select>
	                  </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="input-1">Tên xã phường</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Tên xã phường" name="name">
              

                  <div class="form-group">
                    <label for="input-1">Diện tích</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Diện tích" name="acreage">
                  </div>
	             
                 <div class="form-footer">
                    <a href="<?= BASEURL ?>/district/index" class="btn btn-danger"><i class="fa fa-times"></i> Hủy</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Thêm</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="overlay toggle-menu"></div>
      </div>
    </div>
  