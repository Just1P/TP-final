<?

class Product {
    private string $title;

    private float $price;

    private string $description;

    private bool $isActive;
    public static $DEFAULT_PRICE = 2;

    public static $MIN_CHARAC = 3;

    public static $MAX_CHARAC = 100;

    public static $MIN_PRICE = 1;

    public static $MAX_PRICE = 500;

    public static $DEFAULT_IS_ACTIVE_STATUS = false;

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function isActive(): bool {
        return $this->isActive;
    }


    public function __construct(string $title, string $description,?float $price = null, ?bool $isActive = null ){
        if (strlen($title) < Product::$MIN_CHARAC || strlen($title) > Product::$MAX_CHARAC) {
            throw new Exception('Le titre doit contenir entre 3 et 100 caractères.');
        }

        $this->price = $price ?? Product::$DEFAULT_PRICE;

        if ($this->price < Product::$MIN_PRICE || $this->price > Product::$MAX_PRICE) {
            throw new Exception('Le prix doit être compris entre 1€ et 500€.');
        }

        $this->title = $title;
        $this->description = $description;
        $this->isActive = $isActive ?? Product::$DEFAULT_IS_ACTIVE_STATUS;

    }   
}