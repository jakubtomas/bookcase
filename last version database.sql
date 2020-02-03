-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 07.Jan 2020, 10:56
-- Verzia serveru: 10.4.8-MariaDB
-- Verzia PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `bookcase`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ajax`
--

CREATE TABLE `ajax` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `ajax`
--

INSERT INTO `ajax` (`id`, `name`) VALUES
(1, 'Peter'),
(2, 'Janko'),
(3, 'Janko'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `book_name` varchar(60) NOT NULL,
  `book_autor` varchar(60) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `pages` int(5) NOT NULL,
  `made_year` int(5) NOT NULL,
  `publisher` varchar(11) NOT NULL,
  `desription` varchar(6000) NOT NULL,
  `bookPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `book_name`, `book_autor`, `genre`, `pages`, `made_year`, `publisher`, `desription`, `bookPic`) VALUES
(108, 2147483647, 'Tools of Titans', 'Timothy Ferriss', 'English', 674, 2016, 'Vermillion', 'Fitness, Money, and Wisdom - here are the Tool. Over the last two years, #1 New York Times best-selling author Tim Ferriss has collected the routines and tools of world-class performers around the globe. Now, the distilled notebook of tips and tricks that helped him double his income, flexibility, happines, and more is available as Tools of Titans.', '503808.jpg'),
(109, 2147483647, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'English', 512, 2012, 'Penguin Boo', 'The New York Times Bestseller, acclaimed by author such as Freakonomics co- author Steven D. Levitt, Black Swan author Nassim Nicholas Taleb and Nudge co- author Richard Thaler, Thinking Fast and Slow offers a whole new look at the way our minds work, and how we make decisions.\r\n\r\nWhy is there more chance we&#039;ll believe something if it&#039;s in a bold type face?\r\nWhy are judges more likely to deny parole before lunch?\r\nWhy do we assume a good-looking person will be more competent?\r\n\r\nThe answer lies in the two ways we make choices: fast, intuitive thinking, and slow, rational thinking. This book reveals how our minds are tripped up by error and prejudice (even when we think we are being logical), and gives you practical techniques for slower, smarter thinking. It will enable to you make better decisions at work, at home, and in everything you do.', '218836.jpg'),
(110, 2147483647, 'The 4-Hour Workweek:', 'Timothy Ferriss', 'English', 416, 2009, 'Harmony', 'The New York Times bestselling author of The 4-Hour Body shows readers how to live more and work less, now with more than 100 pages of new, cutting-edge content.\r\n\r\nForget the old concept of retirement and the rest of the deferred-life plan–there is no need to wait and every reason not to, especially in unpredictable economic times. Whether your dream is escaping the rat race, experiencing high-end world travel, or earning a monthly five-figure income with zero management, The 4-Hour Workweek is the blueprint.\r\n\r\nThis step-by-step guide to luxury lifestyle design teaches:\r\n• How Tim went from $40,000 per year and 80 hours per week to $40,000 per month and 4 hours per week\r\n• How to outsource your life to overseas virtual assistants for $5 per hour and do whatever you want\r\n• How blue-chip escape artists travel the world without quitting their jobs\r\n• How to eliminate 50% of your work in 48 hours using the principles of a forgotten Italian economist\r\n• How to trade a long-haul career for short work bursts and frequent “mini-retirements”\r\n\r\nThe new expanded edition of Tim Ferriss’ The 4-Hour Workweek includes:\r\n• More than 50 practical tips and case studies from readers (including families) who have doubled income, overcome common sticking points, and reinvented themselves using the original book as a starting point\r\n• Real-world templates you can copy for eliminating e-mail, negotiating with bosses and clients, or getting a private chef for less than $8 a meal\r\n• How Lifestyle Design principles can be suited to unpredictable economic times\r\n• The latest tools and tricks, as well as high-tech shortcuts, for living like a diplomat or millionaire without being either', '248788.jpg'),
(111, 2147483647, 'The 4 Hour Body', 'Timothy Ferris', 'English', 592, 2011, 'Ebury', 'Do you want to lose fat, double testosterone, get the perfect posterior or give your partner a fifteen-minute female orgasm? Whatever your physical goal, The 4-Hour Body eclipses every other health manual by sharing the best kept secrets in the latest science and research to provide new strategies for redesigning the human body. And you don&#039;t need to exhaust yourself. International bestselling author, Timothy Ferriss, helps you reach your true genetic potential in 3-6 months with a commitment of less than four hours per week. You can pick and choose from a menu of options, from simple to extreme, for dramatic body changes. Based on over 15 years of research and with personal stories, amazing before and after photos, recipes and sidebars, The 4-Hour Body will give unbelievable results and change the way you look forever.', '441328.jpg'),
(112, 1328519163, 'The 4-Hour Chef:', 'Timothy Ferris', 'English', 672, 2012, 'Houghton Mi', 'The Simple Path to Cooking Like a Pro, Learning Anything, and Living the Good Life. What if you could become World-Class in anything in 6 Months or Less? The 4-Hour Chef isn&#039;t just a cookbook. It&#039;s a choose-your-own-adventure guide to the world of rapid learning. #1 &quot;New York Times&quot; bestselling author (and lifelong non-cook) Tim Ferriss takes you from Manhattan to Okinawa, and from Silicon Valley to Calcutta, unearthing the secrets of the world&#039;s fastest learners and greatest chefs. Ferriss uses cooking to explain &quot;meta-learning,&quot; a step-by-step process that can be used to master anything, whether searing steak or shooting 3-pointers in basketball. That is the real &quot;recipe&quot; of &quot;The 4-Hour Chef.&quot;\r\n\r\nYou&#039;ll train inside the kitchen for everything outside the kitchen. Featuring tips and tricks from chess prodigies, world-renowned chefs, pro athletes, master sommeliers, super models, and everyone in between, this &quot;cookbook for people who don&#039;t buy cookbooks&quot; is a guide to mastering cooking and life.\r\n\r\nThe 4-Hour Chef is a five-stop journey through the art and science of learning:\r\n\r\n1. META-LEARNING. Before you learn to cook, you must learn to learn. META charts the path to doubling your learning potential.\r\n2. THE DOMESTIC. DOM is where you learn the building blocks of cooking. These are the ABCs (techniques) that can take you from Dr, Seuss to Shakespeare.\r\n3. THE WILD. Becoming a master student requires self-sufficiency in all things. WILD teaches you to hunt, forage, and survive.\r\n4. THE SCIENTIST. SCI is the mad scientist and modernist painter wrapped into one. This is where you rediscover whimsy and wonder.\r\n5. THE PROFESSIONAL. Swaraj, a term usually associated with Mahatma Gandhi, can be translated as &quot;self-rule.&quot; In PRO, we&#039;ll look at how the best in the world become the best in the world, and how you can chart your own path far beyond this book.', '21756.jpg'),
(113, 1147483647, 'Tribe of Mentors:', 'Timothy Ferris', 'English', 671, 2017, 'Vermilion,', 'When facing life’s questions, who do you turn to for advice? We all need mentors, particularly when the odds seem stacked against us. To find his own, bestselling author and podcast guru Tim Ferriss tracked down more than 100 eclectic experts to help him, and you, navigate life. Through short, action-packed profiles, he shares their secrets for success, happiness, meaning, and more. No matter the challenge or opportunity, something in these pages can help.\r\n\r\nThe three books legendary investor Ray Dalio recommends most often\r\nLessons and tips from elite athletes like Maria Sharapova, Kelly Slater, Tony Hawk and Dan Gable\r\nHow and why Facebook co-founder Dustin Moskovitz says no to most incoming requests\r\nThe meditation and mindfulness practices of David Lynch, Jimmy Fallon, Sharon Salzberg, Rick Rubin, Sarah Elizabeth Lewis and others\r\nThe high-school loss that motivated actor Terry Crews for life . . . and how you can use the lesson\r\nWhy TED curator Chris Anderson thinks ‘pursue your passion’ is terrible advice\r\nHow Yuval Noah Harari’s Sapiens went from repeated rejections to global mega-bestseller\r\nWhy comedian Patton Oswalt wishes at least one catastrophic failure on anyone in the arts\r\nAstrophysicist Janna Levin’s unique reframe that helps her see obstacles as opportunities\r\nWhy actor Ben Stiller likes to dunk his head in a bucket of ice in the morning', '925282.jpg'),
(114, 2147483647, 'The Little Prince', 'Antoine de Saint-Exupéry', 'English', 192, 2007, 'INFOA', 'The Little Prince was written and published first by Antoine de Saint-Exupéry in 1943, only a year before his plane disappeared on a reconnaissance flight over Corsica. And there are only a few books cherished by adults as well as children. This lyrical story with a fairy tale feel that explores the very meaning of life creates a unique relationship with each reader.', '623032.jpg'),
(115, 2147483647, 'The Communication Book', 'Mikael Krogerus', 'English', 208, 2018, 'Portfolio', 'The authors of the international bestseller The Decision Book teach us how to communicate better at work and in everyday life. The internationally bestselling duo Mikael Krogerus and Roman Tschäppeler have tested the 44 most important communication theories - from Aristotle&#039;s thoughts on presenting through Proust on asking questions to the Harvard Negotiation Project - for their practicality in daily business life. In The Communication Book they distil them into a single volume that in their winning way turns seemingly difficult ideas into clear and entertaining diagrams. From running better meetings and improving the conversations in your head to brushing up on your listening skills and small talk, the pair masterfully fuses theoretical knowledge and business advice with humour and practicality. With sections on work, the self, relationships and language, they show that we can improve not only what we communicate, but how we do so. Whether you&#039;re a CEO or starting out - or want to improve your relationships at home - this smartly-illustrated and compact guide will improve your communication skills and help you form more meaningful connections at work, while smiling too.', '890635.jpg'),
(116, 2147483647, 'Start With Why', 'Simon Sinek', 'English', 256, 2011, 'Penguin Boo', 'Simon Sinek&#039;s recent video on &#039;The Millennial Question&#039; went viral with over 150 million views. Start with Why is a global bestseller and the TED Talk based on it is the third most watched of all time.Why are some people and organisations more inventive, pioneering and successful than others? And why are they able to repeat their success again and again?In business, it doesn&#039;t matter what you do, it matters WHY you do it.Start with Why analyses leaders like Martin Luther King Jr and Steve Jobs and discovers that they all think in the same way - they all started with why.Simon Sinek explains the framework needed for businesses to move past knowing what they do to how they do it, and then to ask the more important question-WHY?Why do we do what we do? Why do we exist? Learning to ask these questions can unlock the secret to inspirational business. Sinek explains what it truly takes to lead and inspire and how anyone can learn how to do it.', '653560.jpg'),
(117, 2147483647, 'The Power of Habit', 'Charles Duhigg', 'English', 371, 2013, 'Random Hous', 'In The Power of Habit, award-winning New York Times business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed. With penetrating intelligence and an ability to distill vast amounts of information into engrossing narratives, Duhigg brings to life a whole new understanding of human nature and its potential for transformation.\r\n\r\nAlong the way we learn why some people and companies struggle to change, despite years of trying, while others seem to remake themselves overnight. We visit laboratories where neuroscientists explore how habits work and where, exactly, they reside in our brains. We discover how the right habits were crucial to the success of Olympic swimmer Michael Phelps, Starbucks CEO Howard Schultz, and civil-rights hero Martin Luther King, Jr. We go inside Procter &amp; Gamble, Target superstores, Rick Warren&#039;s Saddleback Church, NFL locker rooms, and the nation&#039;s largest hospitals and see how implementing so-called keystone habits can earn billions and mean the difference between failure and success, life and death.\r\n\r\nAt its core, The Power of Habit contains an exhilarating argument: The key to exercising regularly, losing weight, raising exceptional children, becoming more productive, building revolutionary companies and social movements, and achieving success is understanding how habits work.\r\n\r\nHabits aren&#039;t destiny. As Charles Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', '792308.jpg'),
(118, 451528824, 'Anne of Green Gables', 'Lucy Maud Montgomery', 'Novel', 320, 2003, 'Signet', 'When Matthew and Marilla Cuthbert decide to adopt an orphan who can help manage their family farm, they have no idea what delightful trouble awaits them. 11-year-old Anne with red hair and incredible imagination can turn everyday moments into something extraordinary. Will Green Gables become her home?', '639594.jpg'),
(119, 2147483647, 'The Last Wish', 'Andrzej Sapkowski', 'Fantasy', 288, 2008, 'Gollancz', 'The Last Wish is one of the two collections of short stories (the other being Sword of Destiny - Miecz przeznaczenia), preceding the main Witcher Saga, written by Polish fantasy writer Andrzej Sapkowski. The first Polish edition was published in 1993, the first English edition in 2007. The book has also been translated into several other languages.', '386690.jpg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `active_account` int(11) DEFAULT NULL,
  `hash` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active_account`, `hash`) VALUES
(1, '$2y$10$UGPKF21l8k7EvG9vGpFi3.QqgG7XQbW0zAXqt0UL7Zf61zQca1RNS', 'admin@admin.com', 2, '548f45be9b6c68f10bed527bce14246e');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `ajax`
--
ALTER TABLE `ajax`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexy pre tabuľku `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `ajax`
--
ALTER TABLE `ajax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pre tabuľku `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
