<?

class Products {
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


    public function __construct(string $title, string $description,?float $price = null, ?bool $isActive = null ){
        if (strlen($title) < Products::$MIN_CHARAC || strlen($title) > Products::$MAX_CHARAC) {
            throw new Exception('Le titre doit contenir entre 3 et 100 caractères.');
        }

        $this->price = $price ?? Products::$DEFAULT_PRICE;

        if ($this->price < Products::$MIN_PRICE || $this->price > Products::$MAX_PRICE) {
            throw new Exception('Le prix doit être compris entre 1€ et 500€.');
        }

        $this->title = $title;
        $this->description = $description;
        $this->isActive = $isActive ?? Products::$DEFAULT_IS_ACTIVE_STATUS;

    }   
}