
    <div class="content-wrapper">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Thêm tỉnh</div>
                <hr>
                <form action="<?= BASEURL ?>/province/store" method="post">
                
                  <div class="form-group">
                    <label for="input-1">Tên quận, huyện</label>
                    <input type="text" class="form-control" id="input-1" placeholder="Tên quận huyện" name="name">
                  </div>
                 <div class="form-footer">
                    <a href="<?= BASEURL ?>/province/index" class="btn btn-danger"><i class="fa fa-times"></i> Hủy</a>
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
  