-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 05:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `flash`
--

CREATE TABLE IF NOT EXISTS `flash` (
  `flash_id` int(11) NOT NULL AUTO_INCREMENT,
  `flash_title` varchar(99) NOT NULL,
  `flash_note` varchar(999) NOT NULL,
  `flash_file` varchar(99) NOT NULL,
  `flash_privacy` varchar(99) NOT NULL,
  `flash_level` varchar(99) NOT NULL,
  `flash_author` varchar(99) NOT NULL,
  PRIMARY KEY (`flash_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `flash`
--

INSERT INTO `flash` (`flash_id`, `flash_title`, `flash_note`, `flash_file`, `flash_privacy`, `flash_level`, `flash_author`) VALUES
(1, 'Array', 'Arrays are useful critters that often show up when it would be convenient to have one name for a group of variables of the same type that can be accessed by a numerical index. For example, a tic-tac-toe board can be held in an array and each element of the tic-tac-toe board can easily be accessed by its position (the upper left might be position 0 and the lower right position 8). At heart, arrays are essentially a way to store many values under the same name. You can make an array out of any data-type including structures and classes. ', '1.swf', 'public', 'easy', 'tp1'),
(2, 'C-String', 'Note that along with C-style strings, which are arrays, there are also string literals, such as the keyword this. In reality, both of these string types are merely just collections of characters sitting next to each other in memory. The only difference is that you cannot modify string literals, whereas you can modify arrays. Functions that take a C-style string will be just as happy to accept string literals unless they modify the string (in which case your program will crash). Some things that might look like strings are not strings; in particular, a character enclosed in single quotes, like this (a), is not a string. It is a single character, which can be assigned to a specific location in a string, but which cannot be treated as a string. (Remember how arrays act like pointers when passed into functions, Characters dont, so if you pass a single character into a function, it wont work; the function is expecting a char*, not a char.) ', '2.swf', 'public', 'easy', 'tp1'),
(3, 'Do While loop', 'DO..WHILE - DO..WHILE loops are useful for things that want to loop at least once. Notice that the condition is tested at the end of the block instead of the beginning, so the block will be executed at least once. If the condition is true, we jump back to the beginning of the block and execute it again. A do..while loop is almost the same as a while loop except that the loop body is guaranteed to execute at least once. A while loop says Loop while the condition is true, and execute this block of code, a do..while loop says Execute this block of code, and then continue to loop while the condition is true. ', '3.swf', 'public', 'easy', 'tp1'),
(4, 'For Loop', 'The variable initialization allows you to either declare a variable and give it a value or give a value to an already existing variable. Second, the condition tells the program that while the conditional expression is true the loop should continue to repeat itself. The variable update section is the easiest way for a for loop to handle changing of the variable. It is possible to do things like x++, x = x + 10, or even x = random ( 5 ), and if you really wanted to, you could call other functions that do nothing to the variable but still have a useful effect on the code. Notice that a semicolon separates each of these sections, that is important. Also note that every single one of the sections may be empty, though the semicolons still have to be there. If the condition is empty, it is evaluated as true and the loop will repeat until something else stops it. ', '4.swf', 'public', 'easy', 'tp1'),
(5, 'Function', 'Functions that a programmer writes will generally require a prototype. Just like a blueprint, the prototype gives basic structural information: it tells the compiler what the function will return, what the function will be called, as well as what arguments the function can be passed. When I say that the function returns a value, I mean that the function can be used in the same manner as a variable would be. For example, a variable can be set equal to a function that returns a value between zero and four. A function consist parameter which accept user input and return statement which give output.', '5.swf', 'public', 'easy', 'tp1'),
(6, 'Your first C Program : Hello World', 'Every full C program begins inside a function called main. A function is simply a collection of commands that do something. The main function is always called when the program first executes. From main, we can call other functions, whether they be written by us or by others or use built-in language features. To access the standard functions that comes with your compiler, you need to include a header with the #include directive. What this does is effectively take everything in the header and paste it into your program. Lets look at a working program:', '6.swf', 'public', 'easy', 'tp1'),
(7, 'If Else statement', 'Sometimes when the condition in an if statement evaluates to false, it would be nice to execute some code instead of the code executed when the statement evaluates to true. The else statement effectively says that whatever code after it (whether a single line or code between brackets) is executed if the if statement is FALSE. ', '7.swf', 'public', 'easy', 'tp1'),
(8, 'If statement', 'The ability to control the flow of your program, letting it make decisions on what code to execute, is valuable to the programmer. The if statement allows you to control if a program enters a section of code or not based on whether a given condition is true or false. One of the important functions of the if statement is that it allows the program to select an action based upon the users input. For example, by using an if statement to check a user-entered password, your program can decide whether a user is allowed access to the program. ', '8.swf', 'public', 'easy', 'tp1'),
(9, 'Pointer', 'Pointers are aptly name: they point to locations in memory. Think of a row of safety deposit boxes of various sizes at a local bank. Each safety deposit box will have a number associated with it so that you can quickly look it up. These numbers are like the memory addresses of variables. A pointer in the world of safety deposit box would simply be anything that stored the number of another safety deposit box. Perhaps you have a rich uncle who stored valuables in his safety deposit box, but decided to put the real location in another, smaller, safety deposit box that only stored a card with the number of the large box with the real jewelry. The safety deposit box with the card would be storing the location of another box; it would be equivalent to a pointer. In the computer, pointers are just variables that store memory addresses, usually the addresses of other variables. ', '9.swf', 'public', 'easy', 'tp1'),
(10, 'Switch case', 'Switch case statements are a substitute for long if statements that compare a variable to several integral values (integral values are simply values that can be expressed as an integer, such as the value of a char). The basic format for using switch case is outlined below. The value of the variable given into switch is compared to the value following each of the cases, and when one value matches the value of the variable, the computer continues executing the program from that point.', '10.swf', 'public', 'easy', 'tp1'),
(11, 'While loop', 'WHILE - WHILE loops are very simple. The basic structure is while ( condition ) { Code to execute while the condition is true } The true represents a boolean expression which could be x == 1 or while ( x != 7 ) (x does not equal 7). It can be any combination of boolean statements that are legal. Even, (while x ==5 || v == 7) which says execute the code while x equals five or while v equals 7. Notice that a while loop is like a stripped-down version of a for loop-- it has no initialization or update section. However, an empty condition is not legal for a while loop as it is with a for loop. ', '11.swf', 'public', 'easy', 'tp1'),
(12, 'Quiz : The basic of C Programming', 'Quiz : The basic of C Programming', '12.swf', 'public', 'xpert', 'tp1'),
(13, 'Quiz : Array', 'Quiz : Array', '13.swf', 'public', 'xpert', 'tp1'),
(14, 'Quiz : Command Line argument', 'Quiz : Command Line argument', '14.swf', 'public', 'xpert', 'tp1'),
(15, 'Quiz : C-Style string', 'Quiz : C-Style string', '15.swf', 'public', 'xpert', 'tp1'),
(16, 'Quiz : File IO', 'Quiz : File IO', '16.swf', 'public', 'xpert', 'tp1'),
(17, 'Quiz : Function', 'Quiz : Function', '17.swf', 'public', 'xpert', 'tp1');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forum_file` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `forum_sender_id` varchar(99) NOT NULL,
  `forum_sender` varchar(999) NOT NULL,
  `forum` varchar(9999) NOT NULL,
  PRIMARY KEY (`forum_file`,`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(5) NOT NULL,
  `user_password` varchar(99) NOT NULL,
  `user_name` varchar(99) NOT NULL,
  `user_phone_no` varchar(99) NOT NULL,
  `user_email` varchar(99) NOT NULL,
  `user_photo` varchar(99) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_password`, `user_name`, `user_phone_no`, `user_email`, `user_photo`) VALUES
('tp1', '0cc175b9c0f1b6a831c399e269772661', 'AHMAD JAWWAD', '012-1234567', 'ahmad@apu.edu.my', 'user/tp1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
