<?php

namespace App\Controller;

use App\Framework\Viewer;
use App\Model\Product;
use App\Model\User;
use Exception;

class HomeController {
  public function index() {
    $model = new Product();
    $products = $model->findAll();

    $viewer = new Viewer();
    echo $viewer->render("products.php", $products);
  }

  public function showUser() {
    $model = new User();
    $users = $model->findAll();

    $viewer = new Viewer();
    echo $viewer->render("users.php", $users);
  }

  public function productAdd() {
    $viewer = new Viewer();
    echo $viewer->render("productAddForm.php");
  }

  public function xulyProductAdd() {
    $model = new Product();
    $isValid = $model->validate($_POST);

    if ($isValid) {
      try {
        $isAdded = $model->store($_POST);
        if ($isAdded) {
          header("Location: /product");
          exit;
        }
      } catch (Exception $e) {
        echo "<div class='form-text alert alert-danger'>{$e->getMessage()}</div>";
      }
    } else {
      echo "<div class='form-text alert alert-danger'>Invalid data</div>";
    }

    $viewer = new Viewer();
    echo $viewer->render("productAddForm.php", $_POST);
  }

  public function editProduct() {
    $model = new Product();
    $product = $model->find($_GET["id"]);
    
    $viewer = new Viewer();
    echo $viewer->render("productEditForm.php", $product);
  }

  public function xulyEditProduct() {
    $model = new Product();
    $isValid = $model->validate($_POST);

    if ($isValid) {
      try {
        $isUpdated = $model->update($_GET["id"], $_POST["name"], $_POST["description"]);
        if ($isUpdated) {
          header("Location: /product");
          exit;
        }
      } catch (Exception $e) {
        echo "<div class='form-text alert alert-danger'>{$e->getMessage()}</div>";
      }
    } else {
      echo "<div class='form-text alert alert-danger'>Invalid data</div>";
    }

    $viewer = new Viewer();
    echo $viewer->render("productEditForm.php", $_POST);
  }

  public function deleteProduct() {
    $model = new Product();
    $isDeleted = $model->delete($_GET["id"]);

    if ($isDeleted) {
      header("Location: /product");
      exit;
    }
  }
}