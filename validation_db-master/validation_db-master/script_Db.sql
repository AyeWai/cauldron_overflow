/*CREATION DATABASE*/

DROP DATABASE IF EXISTS valid_db;
CREATE DATABASE IF NOT EXISTS valid_db ; 

/*CREATION TABLES AND TABLES*/


create table valid_db.products (
    product_id int,
    name varchar(30),
    description varchar(400),
    create_date timestamp,
    price float,
    img varchar(200),
    constraint pk_products primary key(product_id)
    );

CREATE VIEW valid_db.ten_last3 AS
SELECT * FROM valid_db.products ORDER BY products.create_date DESC LIMIT 10;/*Ne retourne aucune erreur dans MySQL*/

create table valid_db.users (
    user_id int,
    pseudo varchar(30),
    mdp varchar(30),
    fname varchar(30),
    lname varchar(30),
    capacity int,
    constraint pk_users primary key(user_id)
    );

create table valid_db.basket (
    user_id int,
    product_id int,
    basket_id int,
    quantity int,
    primary key(basket_id),
    constraint fk_basket1 foreign key(product_id) references products(product_id)
    );
    /*constraint fk_basket2 foreign key(user_id) references users(user_id)*/
create table valid_db.total_basket (
    total_quantity int
    );


insert into valid_db.products(product_id, name, description, create_date, price, img) values(1, "Once Or", "La monnaie des dieux. Apprécié depuis l'aube de l'humanité, il aura toujours de la valeur après le déclin de celle-ci" , CURRENT_TIMESTAMP(), 1321.79, "https://cdn.pixabay.com/photo/2016/10/16/10/11/bullion-1744773_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(2, "Diamant 5.50ct", "Sans doute la plus mythique de toutes les pierres précieuses, le diamant est recherché depuis des siècles pour son éclat exceptionnel. Une gemme d'excellence qui habille les plus iconiques collections." , CURRENT_TIMESTAMP(), 10794.20, "https://cdn.pixabay.com/photo/2016/02/14/09/45/precious-1199183_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(3, "Baril de pétrole", "Le pétrole, aussi surnommé or noir, est une substance noire, liquide, qui est une énergie fossile, que l'on trouve par forage dans le sol." , CURRENT_TIMESTAMP(), 64.76, "https://cdn.pixabay.com/photo/2015/07/17/00/37/pump-jack-848300_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(4, "Tonne de blé", "Au cours des 60 dernières années, la consommation mondiale de blé a plus que quadruplé. Le blé dur sert essentiellement à la confection de pâtes alimentaires, tandis que le blé tendre permet la fabrication du pain et est employé pour l’alimentation animale." , CURRENT_TIMESTAMP(), 183.250, "https://cdn.pixabay.com/photo/2015/07/28/22/11/wheat-865152_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(5, "Tête de Bétail", "L’idée est simple : le particulier achète une ou plusieurs vaches (1 530 euros par tête actuellement) en versant des fonds à l’AFIC, qui s’occupe de tout et loue ensuite ce cheptel à un exploitant." , CURRENT_TIMESTAMP(), 1530.80, "https://cdn.pixabay.com/photo/2017/09/24/17/19/cow-2782461_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(6, "Unité de Cryptomonnaie", "Une cryptomonnaie, dite aussi cryptoactif, cryptodevise, monnaie cryptographique ou encore cybermonnaie, est une monnaie émise de pair à pair, sans nécessité de banque centrale, utilisable au moyen d'un réseau informatique décentralisé." , CURRENT_TIMESTAMP(), 6442.42, "https://cdn.pixabay.com/photo/2018/06/06/22/35/bitcoin-3458994_960_720.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(7, "Kilo d'Uranium 235", "L'uranium, est l'isotope radioactif le plus utilisé dans la production d'énergie nucléaire. Egalement l'ingrédient clé de la première bombe atomique utilisée, les militaires l'utilisent aussi sous forme pour son pouvoir pénétrant et incendiaire." , CURRENT_TIMESTAMP(), 303.41,"https://cdn.pixabay.com/photo/2017/02/20/14/18/nuclear-2082637_1280.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(8, "Compagnie privée/24h", " Groupe de combat fourni par une société fournissant des services de sécurité et de la défense à des gouvernements, organisations internationales, ONG ou entreprises privées.", CURRENT_TIMESTAMP(), 109113.3,"https://cdn.pixabay.com/photo/2010/12/06/22/soldiers-1002_1280.jpg");
insert into valid_db.products(product_id, name, description, create_date, price, img) values(9, "Satellite 2,9 tonnes", "Un satellite est utilisé pour transmettre des informations d'un point à l'autre bout de la Terre, notamment des communications téléphoniques ou de la transmission de données, les communications satellitaires et les programmes télévisés.", CURRENT_TIMESTAMP(), 55000000,"https://cdn.pixabay.com/photo/2015/03/26/18/36/spacex-693229_1280.jpg");


insert into valid_db.users (user_id, pseudo, mdp, fname, lname, capacity) values(1, "admin", "1234","Chris","SIMON", 1);
insert into valid_db.users (user_id, pseudo, mdp, fname, lname, capacity) values(2, "jjrousseau_91", "azerty","Jean-Jacques","ROUSSEAU", 2);
insert into valid_db.users (user_id, pseudo, mdp, fname, lname, capacity) values(3, "rudy_972", "poiuyt","Rudy","SAXEMARD", 2);
insert into valid_db.users (user_id, pseudo, mdp, fname, lname, capacity) values(4, "n.p", "9876","Napoléon","BONAPARTE", 3);
insert into valid_db.users (user_id, pseudo, mdp, fname, lname, capacity) values(5, "imperator_nene", "aqwzsxedc","Warren","BUFFET", 2);


insert into valid_db.basket (user_id, product_id, basket_id, quantity) values (2, 1, 1, 4);
insert into valid_db.basket (user_id, product_id, basket_id, quantity) values (2, 3, 2, 6);

/*SELECTION DES PRODUITS DANS LES TABLES*/

select * from valid_db.products;
select * from valid_db.users;
select * from valid_db.basket;


CREATE TRIGGER `totquantity` AFTER INSERT ON `basket` FOR EACH ROW INSERT INTO valid_db.total_basket SELECT (basket.quantity * products.price) FROM basket, products WHERE basket.product_id = products.product_id;
CREATE VIEW valid_db.sumtotbask AS SELECT SUM(total_quantity) AS total_price FROM valid_db.total_basket;
