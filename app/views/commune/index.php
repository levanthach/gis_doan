    <div class="content-wrapper">
      <div class="container-fluid">
        <!--End Row-->
        <div class="row">
          <div class="col-lg-12">
            <button class="add-catalog"><a href="<?= BASEURL ?>/commune/create">Thêm xã phường</a></button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Danh sách xã phường</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên xã phường </th>
                        <th scope="col">Thuộc quận huyện</th>
                        <th scope="col">Diện tích</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      foreach ($data['commune'] as $key => $value): ?>
                      <tr>
                        <td scope="row"><?= ++$key ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?php foreach ($data['district'] as $key_pro => $value_dis) :
                                if ($value['district_id'] == $value_dis['id']) : 
                                echo $value_dis['name'];
                                endif;
                                endforeach;
                        ?></td>
                        <td><?= $value['acreage']; ?></td>

        			
        				 <td>
                          <button class="btn btn-success"><a href="<?= BASEURL; ?>/commune/edit/<?= $value['id']; ?>">Sửa</a></button>
                          <button class="btn btn-danger"><a href="<?= BASEURL; ?>/commune/destroy/<?= $value['id'] ?>">Xóa</a></button>
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
 