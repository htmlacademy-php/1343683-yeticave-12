CREATE DATABASE yeticave DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE yeticave;
CREATE TABLE categories (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cat_name VARCHAR(100) NOT NULL,
	char_code VARCHAR(100) NOT NULL,
	INDEX cat_name_index (cat_name)
);
CREATE TABLE lots (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cat_id INT UNSIGNED NOT NULL,
	user_id INT UNSIGNED NOT NULL,
	pub_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	title VARCHAR(255) NOT NULL DEFAULT '',
	description VARCHAR(1000) NOT NULL DEFAULT '',
	image VARCHAR(100) NOT NULL DEFAULT '',
	price_init INT UNSIGNED NOT NULL DEFAULT 0,
	date_exp DATE NOT NULL,
	step MEDIUMINT UNSIGNED NOT NULL DEFAULT 0

);
CREATE TABLE users (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	join_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	email VARCHAR(100) NOT NULL DEFAULT '',
	user_name VARCHAR(100) NOT NULL DEFAULT '',
	password VARCHAR(100) NOT NULL DEFAULT '',
	contact VARCHAR(255) NOT NULL DEFAULT '',
	UNIQUE KEY user_name (user_name),
	UNIQUE KEY email (email)
);
CREATE TABLE bets (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT UNSIGNED NOT NULL,
	lot_id INT UNSIGNED NOT NULL,
	call_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	call_price INT UNSIGNED NOT NULL DEFAULT 0
)
