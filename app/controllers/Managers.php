<?php

class Managers extends Controller
{

  private $managerModel;

  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    $this->managerModel = $this->model('Manager');
  }

  public function index()
  {
    $data = [
      'title' => 'Admin dashboard'
    ];

    $this->view('managers/dashboard', $data);
  }

  public function products()
  {
    // Get cruises
    $products = $this->managerModel->getProducts();
    $data = [
      'products' => $products
    ];

    $this->view('managers/products', $data);
  }

  public function ships()
  {
    $data = [
      'title' => 'Edit ships'
    ];

    $this->view('managers/ships', $data);
  }

  public function features()
  {
    $data = [
      'title' => 'Edit features'
    ];

    $this->view('managers/features', $data);
  }


  public function addproductPage()
  {
    $categories = $this->managerModel->getCategories();
        $data = [
            'category' => $categories
        ];
    $this->view('managers/addProduct', $data);
  }

  public function addProduct()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
    }
    $data['img'] = $_FILES["image"]["name"];
    
    if($this->managerModel->addProduct($data)){
      move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
      Flash('prd_added','Your product has been added successfully');
      redirect('Managers/products');
    }
    
  }

  public function updateProduct($id){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here we process the form
      // Sanitize POST data

      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
      $data['id'] = $id;
      $data['img'] = $_FILES["image"]["name"];
    }
    if($this->managerModel->updateProduct($data)){
      Flash('cruise_updated', 'Your product has been successfully updated');
      redirect('Managers/products');
    }
  }
}
