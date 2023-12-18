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
    private $ingredientsRepository;
    public function __construct() {
        parent::__construct();
        $this->cocktailRepository = new CocktailRepository();
        $this->cocktailsIngredientsRepository = new CocktailsIngredientsRepository();
        $this->ingredientsRepository = new IngredientRepository();
    }

    public function searchPage() {
        $cocktails = $this->cocktailRepository->getCocktails();
        $ingredients = $this->ingredientsRepository->getIngredients();
        $this->render('searchPage', ['cocktails' => $cocktails, 'ingredients' => $ingredients]);
    }
    public function addCocktail()
    {

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $cocktail = new Cocktail($_POST['name'],$_FILES['file']['name']);
            $this->cocktailRepository->addCocktail($cocktail);
            // Pobierz ID ostatnio dodanego koktajlu
            $lastCocktailId = $this->cocktailRepository->getLastInsertedId();

            // Pobierz wybrane składniki z formularza
            $selectedIngredients = $_POST['selectedIngredients'] ?? [];
            $decodedIngredients = json_decode($selectedIngredients, true);
            // Dodaj składniki do koktajlu w Ingredients_Cocktails
            var_dump($decodedIngredients);
            foreach ($decodedIngredients as $ingredientId) {
                die("asddsa");
                $ingredient = $this->ingredientsRepository->getIngredient($ingredientId);
                if ($ingredient) {
                    $this->cocktailsIngredientsRepository->addIngredientToCocktail($ingredient, $lastCocktailId);
                }
            }

            header('Location: searchPage');
            exit;

//             $this->render('searchPage', [
//                'cocktails' => $this->cocktailRepository->getCocktails(),
//                ['messages' => $this->messages]
//            ]);
        }
        return $this->render('addCocktailPage', ['messages' => $this->messages]);
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