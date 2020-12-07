   <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Thêm quận, huyện</div>
                <hr>
                <form action="<?= BASEURL ?>/district/store" method="post">
                
                  <div class="form-group">
	                  <label for="input-2">Chọn tỉnh</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="province_id" required aria-invalid="false">
                        <?php foreach ($data['province'] as $key => $value): ?>
                          <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                        <?php endforeach ?>
	                    </select>
	                  </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="input-1">Tên quận, huyện</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Tên quận huyện" name="name">
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
  