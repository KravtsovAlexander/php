# php

#### Домашнее задание
#### lesson_3
1. Вывести в html информацию о товарах из массива $goods. Информацию о характеристиках товара (description) выводить в таблице. 
Добавить страницу для вывода информации по каждому товару (использовать передачу id товара в гет запросе, как в лекции lesson5/get). 
        
        $goods = [
            [
                'id' => 1,
                'title' => 'Flute',
                'price' => 20000,
                'img' => 'flute.jpg',
                'description' => [
                    'color' => 'white',
                    'material' => 'bamboo'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Гитара',
                'price' => 18000,
                'img' => 'guitar.jpg',
                'description' => [
                    'color' => 'brown',
                    'material' => 'linden'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Барабан',
                'price' => 68000,
                'img' => 'drum.jpg',
                'description' => [
                    'color' => 'brown',
                    'material' => 'steel'
                ]
            ],
        ];
2. Отсортировать массив по price. Используйте функцию для работы с массивами (вручную сортировать не нужно).

        $items = [
            [
                'title' => 'Телефон',
                'price' => 100000,
                'count' => 4
            ],
            [
                'title' => 'Часы',
                'price' => 500000,
                'count' => 2
            ],
            [
                'title' => 'Кольцо',
                'price' => 80000,
                'count' => 10
            ],
            [
                'title' => 'Браслет',
                'price' => 120000,
                'count' => 7
            ],
            [
                'title' => 'Галстук',
                'price' => 8000,
                'count' => 50
            ],
        ];
        
3. Задача про спортсмена.
    
        Дано:
        $x - количество километров, которое спортсмен пробежал в первый день
        $y - количество километров (не может быть меньше $x)

        В первый день спортсмен пробежал $x километров, а затем он каждый день увеличивал пробег на 10% от предыдущего значения. 
        Определить номер дня, на который пробег спортсмена составит не менее $y километров.

#### lesson_4
4. Написать функцию (функции) по созданию нового массива на основе существующего.
   Массивы, описывающие дочерние категории должны стать вложенными массивами в родительский массив-категорию по ключу children_elems.
     
#### lesson_6
5. Написать функцию удаления непустого каталога.

6. Реализовать возможность загрузки нескольких файлов через \<input multiple type="file"\>

        1. загружаемые файлы необходимо проверять на соответствие типа
        2. загружаемые файла необходимо проверять на соответствие размера
        3. выводить информацию о том, какие файлы удалось загрузить, а какие нет и почему
        
7. Реализовать сокращатель ссылок:
      
        1. пользователь вводит url в поле формы (используйте input type="url")
        2. на сервере полученные данные необходимо обработать:
           * проверка на пустоту,
           * посмотрите функцию filter_var - FILTER_VALIDATE_URL
           * посмотрите функцию trim
        3. если данные введены некорректно (то, что ввел пользоваль не url), сообщить об этом пользователю. 
        4. если данные введены корректно:
           * проверить присутствует ли в файле ссылка, которую ввел пользователь
           * если ссылка присутствует, то получить короткую ссылку и вывести на экран.
           * если ссылки еще нет, создать хэш определенной длины (алгоритм придумать самостоятельно).
           Если созданный хэш уже есть в файле, то создавать новый до тех пор, пока хэш не станет уникальным. 
           После этого записать хэш в файл

#### lesson_11
Автозагрузка:
1. инициализировать пакет (composer init / php composer.phar init),
2. в composer.json добавить правила автозагруки (автозагрузка должна работать в src)
3. сгенерировать файлы автозагрузки (composer dump-autoload / php composer.phar dump-autoload)
4. в файле units.php подключить автозагрузчик классов
5. прописать все необходимые namespace и use

Фабричный метод для создания боевых юнитов:
В классе BattleUnit реализовать статический метод get_unit(string $type), создающий юнитов.
Метод принимает на вход строку с типом юнита, создает соответствующий объект и возвращает его.
Значения свойств здоровья, ловкости и атаки задавать рандомно rand(min, max).
Например, если в метод передана строка 'infantry' метод должен вернуть объект new Infantry,
если в метод передана строка 'knight' метод должен вернуть объект new Knight и тд

Интерфейсы
1. Объявить интерфейс RestAble с методом rest().
Данный интерфейс должны имплементировать все юниты (Unit),
при этом у каждого юнита должна быть своя реализация метода rest (каждый тип юнита отдыхает по своему)
2. Объявить интерфейс AttackAble с методом атаки противника.
Данный интерфейс должны имплементировать все боевые юниты (BattleUnit),
при этом у каждого юнита должна быть своя реализация метода атаки (каждый тип юнита атакует по своему)

В качестве дополнительной тренировки можно добавть королю возможности:
1. нанимать юнитов за золото, формировать из них армию
2. нападать своей армией на армию другого короля
