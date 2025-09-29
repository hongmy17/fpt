<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div class="container mt-2">
  <a href="/product/add" class="btn btn-primary">Add Product</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $product): ?>
        <tr>
          <td><?=$product["id"];?></td>
          <td><?=$product["name"];?></td>
          <td><?=$product["price"];?></td>
          <td>
              <a href="/product/edit?id=<?=$product["id"];?>" class="btn btn-warning">Edit</a>
              <a href="/product/delete?id=<?=$product["id"];?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>