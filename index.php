<?php
class Page {
    protected string $name = "home";
    protected string $template = "<h1>Добро пожаловать!</h1><p>Выберите свою сторону силы ниже.</p>";

    public function render(): void {
        echo "<div class='container'>{$this->template}</div>";
    }
}

echo "<nav>
    <a href='?page=page'>Главная</a> | 
    <a href='?page=cats'>Коты</a> | 
    <a href='?page=dogs'>Собаки</a>
</nav><hr>";

$pageParam = $_GET['page'] ?? 'home';

if ($pageParam === 'home' || $pageParam === 'page') {
    $current = new Page();
    $current->render();
}
?>
