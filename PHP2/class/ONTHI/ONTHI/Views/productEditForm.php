<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div class="container">
  <form action="/product/update?id=<?= $data["id"]; ?>" method="post">
    <div class="mb-3">
      <label for="Name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="nameError" value="<?= $data["name"]; ?>">
      <div id="nameError" class="form-text alert alert-danger <?= empty($data["nameError"]) ? 'd-none' : 'd-block'; ?>"><?= $data["nameError"] ?? ""; ?></div>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price:</label>
      <input type="number" class="form-control" id="price" name="price" aria-describedby="priceError" value="<?= $data["price"]; ?>">
      <div id="priceError" class="form-text alert alert-danger <?= empty($data["priceError"]) ? 'd-none' : 'd-block'; ?>"><?= $data["priceError"] ?? ""; ?></div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>