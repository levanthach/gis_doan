    <div class="content-wrapper">
      <div class="container-fluid">
        <!--End Row-->
        <div class="row">
          <div class="col-lg-12">
            <button class="add-catalog"><a href="<?= BASEURL ?>/province/create">Thêm tỉnh</a></button>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Danh sách tỉnh</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên tỉnh </th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['province'] as $key => $value): ?>
                      <tr>
                        <td scope="row"><?= ++$key ?></td>
                        <td><?= $value['name']; ?></td>
        			
        				 <td>
                          <button class="btn btn-success"><a href="<?= BASEURL; ?>/province/edit/<?= $value['id']; ?>">Sửa</a></button>
                          <button class="btn btn-danger"><a href="<?= BASEURL; ?>/province/destroy/<?= $value['id'] ?>">Xóa</a></button>
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
 