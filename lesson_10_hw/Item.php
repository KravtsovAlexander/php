<?php


class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    public function __construct(string $title, int $id)
    {
        $this->setTitle($title);
        $this->setId($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        if ($id <= 0) {
            throw new InvalidArgumentException('Не может быть отрицательными или 0');
        }
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        if (strlen($title) > 10) {
            throw new InvalidArgumentException('максимум 10 символов');
        }
        $this->title = $title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice(int $price) {
        if ($price <= 0) {
            throw new InvalidArgumentException('Не может быть отрицательными или 0');
        }
        $this->price = $price;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function setMaterial(string $material)
    {
        if (strlen($material) < 3) {
            throw new InvalidArgumentException('максимум 10 символов');
        }
        $this->material = $material;
    }


    // значения свойств title и id должны задаваться через конструктор,

    // добавить все необходимые геттеры и сеттеры

}
