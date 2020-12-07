<div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Sửa quận huyện</div>
                <hr>
                    <form action="<?= BASEURL ?>/commune/update/<?= $data['commune']['id'] ?>" method="post">
                    <div class="form-group">
	                  <label for="input-2">Chọn quận huyện</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="district_id" required aria-invalid="false">
                        <?php foreach ($data['district'] as $key => $value): ?>
                          <?php if($data['commune']['id'] == $value['id']) :
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
	                    <label for="input-1">Tên xã phường</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Tên quận huyện" name="name" value="<?= $data['commune']['name'] ?>">
                    </div>
                    
                    <div class="form-group">
	                    <label for="input-1">Diện tích</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Diện tích" name="acreage" value="<?= $data['commune']['acreage'] ?>">
	                  </div>
		             
	                   <div class="form-footer">
	                      <button class="btn btn-danger"><a href="<?= BASEURL;  ?>/commune/index">Hủy</a></button>
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