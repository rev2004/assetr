-- phpMyAdmin SQL Dump
-- version 2.10.3deb1ubuntu0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 22, 2008 at 04:57 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3-1ubuntu6.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `assetr`
-- 
CREATE DATABASE `assetr` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `assetr`;

-- --------------------------------------------------------

-- 
-- Table structure for table `assets`
-- 

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL auto_increment,
  `filename` text collate utf8_unicode_ci NOT NULL,
  `desc` longtext collate utf8_unicode_ci NOT NULL,
  `filesize` text collate utf8_unicode_ci NOT NULL,
  `filetype` text collate utf8_unicode_ci NOT NULL,
  `repository` text collate utf8_unicode_ci NOT NULL,
  `folder` longtext collate utf8_unicode_ci NOT NULL,
  `checkedout` tinytext collate utf8_unicode_ci NOT NULL,
  `userchecked` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `assets`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `folders`
-- 

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  `repositoryid` tinytext collate utf8_unicode_ci NOT NULL,
  `parentfolder` longtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `folders`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `repositories`
-- 

CREATE TABLE IF NOT EXISTS `repositories` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  `currver` text collate utf8_unicode_ci NOT NULL,
  `subver` tinytext collate utf8_unicode_ci NOT NULL,
  `buildnum` tinytext collate utf8_unicode_ci NOT NULL,
  `datecreate` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `repositories`
-- 

INSERT INTO `repositories` (`id`, `name`, `currver`, `subver`, `buildnum`, `datecreate`) VALUES 
(1, 'assetr', '1', '0', '0000', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` text collate utf8_unicode_ci NOT NULL,
  `password` text collate utf8_unicode_ci NOT NULL,
  `realname` text collate utf8_unicode_ci NOT NULL,
  `salt` text collate utf8_unicode_ci NOT NULL,
  `type` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `versions`
-- 

CREATE TABLE IF NOT EXISTS `versions` (
  `id` int(11) NOT NULL auto_increment,
  `assetid` text collate utf8_unicode_ci NOT NULL,
  `version` text collate utf8_unicode_ci NOT NULL,
  `data` longblob NOT NULL,
  `date` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `versions`
-- 

