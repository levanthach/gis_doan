   <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Thêm dân số</div>
                <hr>
                <form action="<?= BASEURL ?>/population/store" method="post">
                
                  <div class="form-group">
	                  <label for="input-2">Chọn xã phường</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="commune_id" required aria-invalid="false">
                        <?php foreach ($data['commune'] as $key => $value): ?>
                          <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                        <?php endforeach ?>
	                    </select>
	                  </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="input-1">Thời gian</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Thời gian" name="time">
              

                  <div class="form-group">
                    <label for="input-1">Dân số</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Dân số" name="count">
                  </div>
	             
                 <div class="form-footer">
                    <a href="<?= BASEURL ?>/population/index" class="btn btn-danger"><i class="fa fa-times"></i> Hủy</a>
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
  