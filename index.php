<?php
declare(strict_types=1);

class Page 
{
    protected string $name = "page";
    protected string $template = "<div><h1>Главная страница</h1><p>It is a default page</p></div>";

    public function render(): void 
    {
        echo "<div style='text-align:center; font-family: Arial, sans-serif; margin-top: 50px;'>";
        echo $this->template;
        echo "</div>";
    }
}

class BlogPage extends Page 
{
    public function __construct() 
    {
        $this->name = "blog";
        $this->template = "
            <h1>Мир котиков 🐾</h1>
            <div style='display: flex; justify-content: center; gap: 20px;'>
                <div style='border: 1px solid #ccc; padding: 10px; border-radius: 10px;'>
                    <img src='https://placecats.com/150/150' alt='cat1'>
                    <p>Британская короткошерстная</p>
                </div>
                <div style='border: 1px solid #ccc; padding: 10px; border-radius: 10px;'>
                    <img src='https://placecats.com/151/151' alt='cat2'>
                    <p>Мейн-кун</p>
                </div>
            </div>";
    }
}

echo "<nav style='text-align:center; padding: 20px; background: #eee;'>";
echo "<a href='?page=page' style='margin-right: 15px;'>Главная (Page)</a>";
echo "<a href='?page=blog'>Блог (Cats)</a>";
echo "</nav>";

$currentPage = $_GET['page'] ?? 'page';

if ($currentPage === 'blog') {
    $view = new BlogPage();
} else {
    $view = new Page();
}

$view->render();
