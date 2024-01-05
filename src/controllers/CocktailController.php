<?php


require_once 'AppController.php';
require_once __DIR__ .'/../models/Cocktail.php';
require_once __DIR__.'/../repository/CocktailRepository.php';
require_once __DIR__.'/../repository/CocktailsIngredientsRepository.php';
require_once __DIR__.'/../repository/IngredientRepository.php';

class CocktailController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $cocktailRepository;
    private $cocktailsIngredientsRepository;
    private $ingredientRepository;
    public function __construct() {
        parent::__construct();
        $this->cocktailRepository = new CocktailRepository();
        $this->cocktailsIngredientsRepository = new CocktailsIngredientsRepository();
        $this->ingredientRepository = new IngredientRepository();
    }

    public function searchPage() {
        $cocktails = $this->cocktailRepository->getCocktails();
        $ingredients = $this->ingredientRepository->getIngredients();
        $this->render('searchPage', ['cocktails' => $cocktails, 'ingredients' => $ingredients]);
    }
    public function addCocktail()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');

            if (isset($decoded['name'], $decoded['image'], $decoded['ingredients'])) {
                $name = $decoded['name'];
                $image = $decoded['image'];
                $ingredients = $decoded['ingredients'];

                $cocktail = new Cocktail($name, $image);

                $idNewCocktail = $this->cocktailRepository->addCocktail($cocktail);
                foreach ($ingredients as $ingredient) {
                    $this->cocktailsIngredientsRepository->addIngredientToCocktail(
                        $ingredient['id'],
                        $idNewCocktail,
                        $ingredient['amount']
                    );
                }
                echo '<script>window.location.href = "/searchPage";</script>';

            }
            else {
                echo json_encode(['status' => 'error', 'message' => 'Required fields are missing.', 'received_data' => $decoded]);
                echo json_encode("Fill Everything Mate");
            }
        }
        else {
            echo json_encode(['status' => 'error', 'message' => 'szasza']);
            echo json_encode("Fill Everything Mate");

        }
    }
    public function upload(){

        header('Content-type: application/json');

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            echo json_encode(['messages' => ['success' => 'File uploaded successfully']]);
        }
        else {
            echo json_encode(['messages' => ['error' => 'File upload failed']]);
        }

    }
    public function addCocktailPage() {
        $cocktails = $this->cocktailRepository->getCocktails();
        $ingredients = $this->ingredientRepository->getIngredients();
        $this->render('addCocktailPage', ['cocktails' => $cocktails, 'ingredients' => $ingredients]);
    }
    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->cocktailRepository->getCocktailByName($decoded['search']));

        }
        
    }


    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

    public function like(int $cocktails_id) {
        $this->cocktailRepository->like($cocktails_id);
        http_response_code(200);
    }

}