-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 07 2019 г., 22:29
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cube_parsing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
                                   `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                                   `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                                   `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
                                                                         ('Admin', '1', 1571749533),
                                                                         ('Admin', '2', 1573154821);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
                             `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                             `type` smallint(6) NOT NULL,
                             `description` text COLLATE utf8_unicode_ci,
                             `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
                             `data` blob,
                             `created_at` int(11) DEFAULT NULL,
                             `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
                                                                                                             ('/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/assignment/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/assignment/assign', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/assignment/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/assignment/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/default/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/default/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/create', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/delete', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/update', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/menu/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/assign', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/create', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/delete', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/remove', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/update', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/permission/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/assign', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/create', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/delete', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/remove', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/update', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/role/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/assign', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/create', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/refresh', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/route/remove', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/create', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/delete', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/update', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/rule/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/activate', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/change-password', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/delete', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/login', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/logout', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/reset-password', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/signup', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/admin/user/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/app/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/db-explain', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/download-mail', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/toolbar', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/default/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/user/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/debug/user/set-identity', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/action', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/diff', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/preview', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/gii/default/view', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeight/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeight/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeight/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeightp/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeightp/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneeightp/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneseven/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneseven/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneseven/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesevenp/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesevenp/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesevenp/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesix/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesix/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesix/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesixplus/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesixplus/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonesixplus/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneten/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneten/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phoneten/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexr/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexr/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexr/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexs/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexs/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexs/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexsm/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexsm/original', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/phonexsm/used', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/*', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/about', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/captcha', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/contact', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/error', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/index', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/login', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('/site/logout', 2, NULL, NULL, NULL, 1573154838, 1573154838),
                                                                                                             ('Admin', 1, 'admin users', NULL, NULL, 1571749522, 1571749522),
                                                                                                             ('adminAccess', 2, 'admin', NULL, NULL, 1571749507, 1573154847),
                                                                                                             ('managerAccess', 2, 'manager users\r\n', NULL, NULL, 1571749672, 1571749672),
                                                                                                             ('userAccess', 2, NULL, NULL, NULL, 1571749754, 1571749927);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
                                   `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                                   `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
                                                      ('adminAccess', '/*'),
                                                      ('adminAccess', '/admin/*'),
                                                      ('adminAccess', '/admin/assignment/*'),
                                                      ('adminAccess', '/admin/assignment/assign'),
                                                      ('adminAccess', '/admin/assignment/index'),
                                                      ('adminAccess', '/admin/assignment/revoke'),
                                                      ('adminAccess', '/admin/assignment/view'),
                                                      ('adminAccess', '/admin/default/*'),
                                                      ('adminAccess', '/admin/default/index'),
                                                      ('adminAccess', '/admin/menu/*'),
                                                      ('adminAccess', '/admin/menu/create'),
                                                      ('adminAccess', '/admin/menu/delete'),
                                                      ('adminAccess', '/admin/menu/index'),
                                                      ('adminAccess', '/admin/menu/update'),
                                                      ('adminAccess', '/admin/menu/view'),
                                                      ('adminAccess', '/admin/permission/*'),
                                                      ('adminAccess', '/admin/permission/assign'),
                                                      ('adminAccess', '/admin/permission/create'),
                                                      ('adminAccess', '/admin/permission/delete'),
                                                      ('adminAccess', '/admin/permission/index'),
                                                      ('adminAccess', '/admin/permission/remove'),
                                                      ('adminAccess', '/admin/permission/update'),
                                                      ('adminAccess', '/admin/permission/view'),
                                                      ('adminAccess', '/admin/role/*'),
                                                      ('adminAccess', '/admin/role/assign'),
                                                      ('adminAccess', '/admin/role/create'),
                                                      ('adminAccess', '/admin/role/delete'),
                                                      ('adminAccess', '/admin/role/index'),
                                                      ('adminAccess', '/admin/role/remove'),
                                                      ('adminAccess', '/admin/role/update'),
                                                      ('adminAccess', '/admin/role/view'),
                                                      ('adminAccess', '/admin/route/*'),
                                                      ('adminAccess', '/admin/route/assign'),
                                                      ('adminAccess', '/admin/route/create'),
                                                      ('adminAccess', '/admin/route/index'),
                                                      ('adminAccess', '/admin/route/refresh'),
                                                      ('adminAccess', '/admin/route/remove'),
                                                      ('adminAccess', '/admin/rule/*'),
                                                      ('adminAccess', '/admin/rule/create'),
                                                      ('adminAccess', '/admin/rule/delete'),
                                                      ('adminAccess', '/admin/rule/index'),
                                                      ('adminAccess', '/admin/rule/update'),
                                                      ('adminAccess', '/admin/rule/view'),
                                                      ('adminAccess', '/admin/user/*'),
                                                      ('adminAccess', '/admin/user/activate'),
                                                      ('adminAccess', '/admin/user/change-password'),
                                                      ('adminAccess', '/admin/user/delete'),
                                                      ('adminAccess', '/admin/user/index'),
                                                      ('adminAccess', '/admin/user/login'),
                                                      ('adminAccess', '/admin/user/logout'),
                                                      ('adminAccess', '/admin/user/request-password-reset'),
                                                      ('adminAccess', '/admin/user/reset-password'),
                                                      ('adminAccess', '/admin/user/signup'),
                                                      ('adminAccess', '/admin/user/view'),
                                                      ('adminAccess', '/app/*'),
                                                      ('adminAccess', '/category/*'),
                                                      ('managerAccess', '/category/*'),
                                                      ('userAccess', '/category/index'),
                                                      ('adminAccess', '/clients/*'),
                                                      ('managerAccess', '/clients/*'),
                                                      ('userAccess', '/clients/index'),
                                                      ('adminAccess', '/debug/*'),
                                                      ('adminAccess', '/debug/default/*'),
                                                      ('adminAccess', '/debug/default/db-explain'),
                                                      ('adminAccess', '/debug/default/download-mail'),
                                                      ('adminAccess', '/debug/default/index'),
                                                      ('adminAccess', '/debug/default/toolbar'),
                                                      ('adminAccess', '/debug/default/view'),
                                                      ('adminAccess', '/debug/user/*'),
                                                      ('adminAccess', '/debug/user/reset-identity'),
                                                      ('adminAccess', '/debug/user/set-identity'),
                                                      ('adminAccess', '/elfinder/*'),
                                                      ('adminAccess', '/fines/*'),
                                                      ('managerAccess', '/fines/*'),
                                                      ('userAccess', '/fines/index'),
                                                      ('adminAccess', '/gii/*'),
                                                      ('adminAccess', '/gii/default/*'),
                                                      ('adminAccess', '/gii/default/action'),
                                                      ('adminAccess', '/gii/default/diff'),
                                                      ('adminAccess', '/gii/default/index'),
                                                      ('adminAccess', '/gii/default/preview'),
                                                      ('adminAccess', '/gii/default/view'),
                                                      ('adminAccess', '/inventory/*'),
                                                      ('managerAccess', '/inventory/*'),
                                                      ('userAccess', '/inventory/index'),
                                                      ('adminAccess', '/off/*'),
                                                      ('managerAccess', '/off/*'),
                                                      ('userAccess', '/off/index'),
                                                      ('adminAccess', '/order/*'),
                                                      ('managerAccess', '/order/*'),
                                                      ('userAccess', '/order/index'),
                                                      ('adminAccess', '/other/*'),
                                                      ('managerAccess', '/other/*'),
                                                      ('userAccess', '/other/index'),
                                                      ('adminAccess', '/phoneeight/*'),
                                                      ('adminAccess', '/phoneeight/original'),
                                                      ('adminAccess', '/phoneeight/used'),
                                                      ('adminAccess', '/phoneeightp/*'),
                                                      ('adminAccess', '/phoneeightp/original'),
                                                      ('adminAccess', '/phoneeightp/used'),
                                                      ('adminAccess', '/phoneseven/*'),
                                                      ('adminAccess', '/phoneseven/original'),
                                                      ('adminAccess', '/phoneseven/used'),
                                                      ('adminAccess', '/phonesevenp/*'),
                                                      ('adminAccess', '/phonesevenp/original'),
                                                      ('adminAccess', '/phonesevenp/used'),
                                                      ('adminAccess', '/phonesix/*'),
                                                      ('adminAccess', '/phonesix/original'),
                                                      ('adminAccess', '/phonesix/used'),
                                                      ('adminAccess', '/phonesixplus/*'),
                                                      ('adminAccess', '/phonesixplus/original'),
                                                      ('adminAccess', '/phonesixplus/used'),
                                                      ('adminAccess', '/phoneten/*'),
                                                      ('adminAccess', '/phoneten/original'),
                                                      ('adminAccess', '/phoneten/used'),
                                                      ('adminAccess', '/phonexr/*'),
                                                      ('adminAccess', '/phonexr/original'),
                                                      ('adminAccess', '/phonexr/used'),
                                                      ('adminAccess', '/phonexs/*'),
                                                      ('adminAccess', '/phonexs/original'),
                                                      ('adminAccess', '/phonexs/used'),
                                                      ('adminAccess', '/phonexsm/*'),
                                                      ('adminAccess', '/phonexsm/original'),
                                                      ('adminAccess', '/phonexsm/used'),
                                                      ('adminAccess', '/prize/*'),
                                                      ('managerAccess', '/prize/*'),
                                                      ('userAccess', '/prize/index'),
                                                      ('adminAccess', '/products/*'),
                                                      ('managerAccess', '/products/*'),
                                                      ('userAccess', '/products/index'),
                                                      ('adminAccess', '/salary/*'),
                                                      ('managerAccess', '/salary/*'),
                                                      ('userAccess', '/salary/index'),
                                                      ('adminAccess', '/site/*'),
                                                      ('managerAccess', '/site/*'),
                                                      ('userAccess', '/site/*'),
                                                      ('adminAccess', '/site/about'),
                                                      ('adminAccess', '/site/captcha'),
                                                      ('adminAccess', '/site/contact'),
                                                      ('adminAccess', '/site/error'),
                                                      ('adminAccess', '/site/index'),
                                                      ('userAccess', '/site/index'),
                                                      ('adminAccess', '/site/login'),
                                                      ('adminAccess', '/site/logout'),
                                                      ('adminAccess', '/sources/*'),
                                                      ('managerAccess', '/sources/*'),
                                                      ('userAccess', '/sources/index'),
                                                      ('adminAccess', '/waybill/*'),
                                                      ('managerAccess', '/waybill/*'),
                                                      ('userAccess', '/waybill/index'),
                                                      ('adminAccess', '/workers/*'),
                                                      ('managerAccess', '/workers/*'),
                                                      ('userAccess', '/workers/index'),
                                                      ('Admin', 'adminAccess'),
                                                      ('Managers', 'managerAccess'),
                                                      ('Users', 'userAccess');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
                             `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                             `data` blob,
                             `created_at` int(11) DEFAULT NULL,
                             `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
                        `id` int(11) NOT NULL,
                        `name` varchar(128) NOT NULL,
                        `parent` int(11) DEFAULT NULL,
                        `route` varchar(255) DEFAULT NULL,
                        `order` int(11) DEFAULT NULL,
                        `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
                             `version` varchar(180) NOT NULL,
                             `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
                                                      ('m000000_000000_base', 1573153718),
                                                      ('m140602_111327_create_menu_table', 1573153720),
                                                      ('m160312_050000_create_user', 1573153720);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
                        `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
                        `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                        `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                        `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                        `status` smallint(6) NOT NULL DEFAULT '10',
                        `created_at` int(11) NOT NULL,
                        `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
                                                                                                                                              (1, 'Superadmin', 'A0sBAcxysmgUOtP9b4j1H1OnCVhMz3TR', '$2y$13$5/fEp0P2OaNu8gjE4wF/oO17fYKmXXBhhFOONN/KkaX5kumSN89ye', NULL, 'admin@myprojects.info', 10, 1573153910, 1573153910),
                                                                                                                                              (2, 'Vladislav', 'eYtuhsefjPCIL5jkkOnexQHWZFlED_Z8', '$2y$13$IbY6BwDisERQ.fXu5XDELecgWwiuk1pZzf9xC7c9ppEyFOyOrnHWe', NULL, 'mycubeua@gmail.com', 10, 1573153983, 1573153983);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
    ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
    ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
    ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
    ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
    ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
    ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
    ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
    ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
    ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;