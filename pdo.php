<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=shop', 'daddyingrave', 'secret');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)  {
    exit('Something went wrong' . $e->getMessage());
}

//$pdo->exec('
//    drop table goods;
//    drop table category;
//');

//$pdo->exec('
//    create table category (
//        id int unsigned auto_increment not null,
//        title varchar(255) not null default "",
//        created timestamp default 0,
//        updated timestamp default current_timestamp on update current_timestamp,
//        primary key (id)
//        )
//');
//
//$pdo->exec('
//    create table goods (
//	    id int unsigned auto_increment not null,
//        category_id int unsigned not null,
//        title varchar(255) not null default "",
//        price int not null,
//        description text not null,
//        image text not null,
//        created timestamp default 0,
//	    updated timestamp default current_timestamp on update current_timestamp,
//        primary key (id),
//        foreign key (category_id) references category(id)
//        )
//');

$sql = 'select title from category';
$sql2 = 'select title, price, description
        from goods
        order by created
        limit 5';

$stmtGood = $pdo->prepare('
    insert into goods
        (category_id, title, price, description, created)
        values
        (:category_id, :title, :price, :description, now())
');

$stmtCategory = $pdo->prepare('insert into category
(title, created) values(:title, now())');

//$data = ['title' => 'Капибары не без грешка'];
//
//$stmtCategory->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Упрямая капибара',
//    'price' => '4990',
//    'description' => 'Капибара, которая упрямится быть как все остальные',
//];
//
//$stmtGood->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Невзрачная капибара',
//    'price' => '20990',
//    'description' => 'Капибара, которая хочет походить на других',
//];
//
//$stmtGood->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Гордая капибара',
//    'price' => '45990',
//    'description' => 'Капибара, которая бесконечно гордится собой',
//];
//
//$stmtGood->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Задумчивая капибара',
//    'price' => '78900',
//    'description' => 'Капибара, которая... а о чем это я?',
//];
//
//$stmtGood->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Вычурная капибара',
//    'price' => '37400',
//    'description' => 'Капибара, которая хочет казаться, а не быть',
//];
//
//$stmtGood->execute($data);
//
//$data = [
//    'category_id' => '1',
//    'title' => 'Абстрактная капибара',
//    'price' => '23200',
//    'description' => 'Капибара, которая может не учитывать некоторые части тела',
//];

//$stmtGood->execute($data);

$stmt = $pdo->query($sql2);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);

