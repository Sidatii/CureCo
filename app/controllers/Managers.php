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
        // Get products
        $products = $this->managerModel->getProducts();
        $categories = $this->managerModel->getCategories();
        $data = [
            'products' => $products,
            'category' => $categories
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

            $data['image'] = $_FILES["image"]["name"];

            if ($this->managerModel->addProduct($data)) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['image']);
                Flash('prd_added', 'Your product has been added successfully');
                redirect('Managers/products');
            }
        }
    }

    public function updateProduct($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // here we process the form
            // Sanitize POST data

            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;
            $data['id'] = $id;
            $data['img'] = $_FILES["image"]["name"];
//            var_dump($data['img']);

            if ($this->managerModel->updateProduct($data)) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
                Flash('cruise_updated', 'Your product has been successfully updated');
                redirect('Managers/products');
            } else{
                Flash('cruise_updated', 'Your product has not been updated', 'flex items-center p-2 w-full max-w-xs text-gray-500 text-center rounded-sm shadow font-light');
                redirect('Managers/products');
            }
        }
    }

    public function delete($id){
        if ($this->managerModel->delete($id)){
            Flash('prd_deleted', 'Your product has been deleted');
            redirect('managers/products');

        }

    }

    public function Sort($by, $order){
        $products = $this->managerModel->Sort($by, $order);
        $categories = $this->managerModel->getCategories();
        $data = [
            'products' => $products,
            'category' => $categories
        ];
        $this->view('Managers/products', $data);
    }

    public function liveSearch(){
        $categories = $this->managerModel->getCategories();
        if (isset($_POST['input'])){
            $input = $_POST['input'];
            $data =[
                'products' => $this->managerModel->search($input),
                'categories' => $categories
            ] ;
            header('Content-type: application/json' );
            echo json_encode($data);
        }
    }

}
