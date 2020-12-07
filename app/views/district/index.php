    <div class="content-wrapper">
      <div class="container-fluid">
        <!--End Row-->
        <div class="row">
          <div class="col-lg-12">
            <button class="add-catalog"><a href="<?= BASEURL ?>/district/create">Thêm quận huyện</a></button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Danh sách quận huyện</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên quận huyện </th>
                        <th scope="col">Thuộc tỉnh</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      foreach ($data['district'] as $key => $value): ?>
                      <tr>
                        <td scope="row"><?= ++$key ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?php foreach ($data['province'] as $key_pro => $value_pro) :
                                if ($value['province_id'] == $value_pro['id']) : 
                                echo $value_pro['name'];
                                endif;
                                endforeach;
                        ?></td>
        			
        				 <td>
                          <button class="btn btn-success"><a href="<?= BASEURL; ?>/district/edit/<?= $value['id']; ?>">Sửa</a></button>
                          <button class="btn btn-danger"><a href="<?= BASEURL; ?>/district/destroy/<?= $value['id'] ?>">Xóa</a></button>
                        </td>
                     </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 