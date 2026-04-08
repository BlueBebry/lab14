<?php
declare(strict_types=1);

class Page 
{
    protected string $name = "page";
    protected string $template = "<div><h1>Главная страница</h1><p>Добро пожаловать в систему выбора питомцев!</p></div>";

    public function render(): void 
    {
        echo "<div style='text-align:center; font-family: Arial, sans-serif; margin-top: 50px;'>";
        echo $this->template;
        echo "</div>";
    }
}

class CatPage extends Page 
{
    public function __construct() 
    {
        $this->name = "cats";
        $this->template = "
            <h1>Мир котиков 🐾</h1>
            <div style='display: flex; justify-content: center; gap: 20px;'>
                <div style='border: 1px solid #ccc; padding: 15px; border-radius: 10px; background: #fff5f8;'>
                    <img src='https://placecats.com/150/150' alt='cat1' style='border-radius: 5px;'>
                    <p><b>Уют и независимость</b></p>
                </div>
            </div>";
    }
}

class DogPage extends Page 
{
    public function __construct() 
    {
        $this->name = "dogs";
        $this->template = "
            <h1>Мир собак 🐕</h1>
            <div style='display: flex; justify-content: center; gap: 20px;'>
                <div style='border: 1px solid #ccc; padding: 15px; border-radius: 10px; background: #f0fdf4;'>
                    <img src='https://placedog.net/150/150' alt='dog1' style='border-radius: 5px;'>
                    <p><b>Верность и прогулки</b></p>
                </div>
            </div>";
    }
}

echo "<nav style='text-align:center; padding: 20px; background: #333; color: white;'>";
echo "<a href='?page=page' style='color: white; margin-right: 20px; text-decoration: none;'>🏠 Главная</a>";
echo "<a href='?page=cats' style='color: white; margin-right: 20px; text-decoration: none;'>🐱 Коты</a>";
echo "<a href='?page=dogs' style='color: white; text-decoration: none;'>🐶 Собаки</a>";
echo "</nav>";

$currentPage = $_GET['page'] ?? 'page';

if ($currentPage === 'cats') {
    $view = new CatPage();
} elseif ($currentPage === 'dogs') {
    $view = new DogPage();
} else {
    $view = new Page();
}

$view->render();
