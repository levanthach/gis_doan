<div class="content-wrapper">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Sửa quận huyện</div>
                <hr>
          	
                    <form action="<?= BASEURL ?>/district/update/<?= $data['district']['id'] ?>" method="post">
                    <div class="form-group">
	                  <label for="input-2">Chọn tỉnh</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="province_id" required aria-invalid="false">
                        <?php foreach ($data['province'] as $key => $value): ?>
                          <?php if($data['district']['id'] == $value['id']) :
                              echo "<option value=" . $value['id'] . "selected>" . $value['name'] . "</option>";
                          else :
                            echo "<option value=" . $value['id'] . ">" . $value['name'] . "</option>";
                          endif;
                          ?>
                          
                        <?php endforeach ?>
	                    </select>
	                  </div>
                  </div>
                  
	                  <div class="form-group">
	                    <label for="input-1">Tên quận huyện</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Tên quận huyện" name="name" value="<?= $data['district']['name'] ?>">
	                  </div>
		             
	                   <div class="form-footer">
	                      <button class="btn btn-danger"><a href="<?= BASEURL;  ?>/district/index">Hủy</a></button>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
	                   </div> 
	                </form>
	                 
              </div>
            </div>
          </div>
        </div>
        <div class="overlay toggle-menu"></div>
      </div>
    </div>
  