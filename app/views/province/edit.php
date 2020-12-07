<div class="content-wrapper">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Sửa tỉnh</div>
                <hr>
          	
                    <form action="<?= BASEURL ?>/province/update/<?= $data['province']['id'] ?>" method="post">
	                  <!-- <div class="form-group">
	                    <label for="input-1">ID</label>
	                    <input type="text" class="form-control" readonly id="input-1" placeholder="ID" name="id" value="<?= $data['province']['id'] ?>">
	                  </div> -->
	                  <div class="form-group">
	                    <label for="input-1">Tên tỉnh</label>
	                    <input type="text" class="form-control" id="input-1" placeholder="Tên tỉnh" name="name" value="<?= $data['province']['name'] ?>">
	                  </div>
		             
	                   <div class="form-footer">
	                      <button class="btn btn-danger"><a href="<?= BASEURL;  ?>/province/index">Hủy</a></button>
                         
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
  