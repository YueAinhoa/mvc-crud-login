<?php
class ProductController extends Controller
{
    private $products;

    public function __construct()
    {
        Auth::requireLogin();
        $this->products = $this->model('Product');
    }

    // READ (lista)
    public function index()
    {
        $this->view('products/index', [
            'products' => $this->products->all()
        ]);
    }

    // CREATE (formulario)
    public function create()
    {
        $this->view('products/form', [
            'product' => null,
            'action'  => 'product/store',
            'errors'  => [],
        ]);
    }

    // CREATE (guardar)
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('product/index');
        }

        [$data, $errors] = $this->validate();

        if ($errors) {
            $this->view('products/form', [
                'product' => $data,
                'action'  => 'product/store',
                'errors'  => $errors,
            ]);
            return;
        }

        $this->products->create($data);
        $this->redirect('product/index');
    }

    // UPDATE (formulario)
    public function edit($id = 0)
    {
        $product = $this->products->find((int) $id);

        if (!$product) {
            $this->redirect('product/index');
        }

        $this->view('products/form', [
            'product' => $product,
            'action'  => 'product/update/' . (int) $id,
            'errors'  => [],
        ]);
    }

    // UPDATE (guardar)
    public function update($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('product/index');
        }

        [$data, $errors] = $this->validate();

        if ($errors) {
            $this->view('products/form', [
                'product' => $data,
                'action'  => 'product/update/' . (int) $id,
                'errors'  => $errors,
            ]);
            return;
        }

        $this->products->update((int) $id, $data);
        $this->redirect('product/index');
    }

    // DELETE (solo por POST)
    public function delete($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->products->delete((int) $id);
        }

        $this->redirect('product/index');
    }

    private function validate()
    {
        $data = [
            'nombre'      => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio'      => $_POST['precio'] ?? '',
            'stock'       => $_POST['stock'] ?? '',
        ];

        $errors = [];

        if ($data['nombre'] === '') {
            $errors[] = 'El nombre es obligatorio.';
        }

        if (!is_numeric($data['precio']) || $data['precio'] < 0) {
            $errors[] = 'El precio debe ser un número mayor o igual a 0.';
        }

        if (
            filter_var($data['stock'], FILTER_VALIDATE_INT) === false
            || $data['stock'] < 0
        ) {
            $errors[] = 'El stock debe ser un entero mayor o igual a 0.';
        }

        return [$data, $errors];
    }
}