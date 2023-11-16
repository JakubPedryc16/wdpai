<?php


require_once 'AppController.php';
require_once __DIR__ .'/../models/Cocktail.php';
require_once __DIR__.'/../repository/CocktailRepository.php';
class CocktailController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $cocktailRepository;

    public function __construct() {
        parent::__construct();
        $this->cocktailRepository = new CocktailRepository();
    }

    public function searchPage() {
        $cocktails = $this->cocktailRepository->getCocktails();
        $this->render('searchPage', ['cocktails' => $cocktails]);
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
            return $this->render('searchPage', [
                'cocktails' => $this->cocktailRepository->getCocktails(),
                ['messages' => $this->messages]
            ]);
        }
        return $this->render('addCocktailPage', ['messages' => $this->messages]);
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
}