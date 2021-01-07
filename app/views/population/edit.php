<div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Sửa quận huyện</div>
                <hr>
                    <form action="<?= BASEURL ?>/population/update/<?= $data['population']['id'] ?>" method="post">
                    <div class="form-group">
	                  <label for="input-2">Chọn quận huyện</label>
	                  <div>
	                    <select class="form-control valid" id="input-6" name="commune_id" required aria-invalid="false">
                        <?php foreach ($data['commune'] as $key => $value): ?>
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
	                    <label for="input-1">Thời gian</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Thời gian" name="time" value="<?= $data['population']['time'] ?>">
                    </div>
                    
                    <div class="form-group">
	                    <label for="input-1">Dân số</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Dân số" name="count" value="<?= $data['population']['count'] ?>">
	                  </div>
		             
	                   <div class="form-footer">
	                      <button class="btn btn-danger"><a href="<?= BASEURL;  ?>/population/index">Hủy</a></button>
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