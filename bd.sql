drop table if exists sizeImg;


CREATE TABLE sizeImg(
id int(11) unsigned auto_increment primary key,
name text(3000),
size_x text(3000),
size_y text(3000)
);
INSERT INTO `sizeImg` (`id`, `name`, `size_x`,`size_y`) VALUES
(null, 'big', '800', '600'),
(null, 'med', '640', '480'),
(null, 'min', '320', '240'),
(null, 'mic', '150', '150');
