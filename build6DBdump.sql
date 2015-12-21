SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` text,
  `category_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `title`, `post`, `category_id`, `created`, `modified`) VALUES
(5, 'TEAM 18 NEWS - Ways to create labels for rick', '<p>Ways to generate labels for rick from css are shown here i havent read it all yet but it may hold some info http://www.codeproject.com/Articles/90577/Building-a-Label-Printing-Software-using-HTML-CSS hope we can get this site up to scratch for MYOB sync dev stages. also found http://www.labelgrid.net/</p>', NULL, '2015-06-08 07:27:17', '2015-08-24 13:12:46'),
(7, 'August Sale!', '<h1>Dont forget our sale coming up</h1>\r\n<p>the month of August 2015, there will be a 0.5% discount on orders over $10,000! great savings for all ;) &nbsp;<img src="/testBuild/js/tinymce/plugins/emoticons/img/smiley-cool.gif" alt="cool" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src="/testBuild/img/graphics/23-7093.jpg" alt="doormat" width="180" height="108" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, '2015-08-02 15:59:37', '2015-08-25 02:35:58'),
(8, 'Added the data table plugin', '<p>I added a jQuery plugin as dora and pod said its a easy no config plug in for searching and sorting large tables of data i think it will come in handy for thisa assignement&nbsp;</p>\r\n<p>&nbsp;also added in the data Table plugin in CSS file to help with the pagination buttons, it also add''s the images for the sorting of any columns. i think it looks ok now.</p>\r\n<p><img src="/team18/build6/development/js/tinymce/plugins/emoticons/img/smiley-money-mouth.gif" alt="money-mouth" /></p>\r\n<p style="text-align: center;">&nbsp;</p>', NULL, '2015-09-06 14:57:23', '2015-10-15 13:35:58'),
(9, 'Ricks Quote about sustainability', '<p>Ricks Quote for the title bar.</p>\r\n<p><em><strong>"All our matts are produced with enviromentally friendly and sustainable processes, using all natural materials"</strong></em></p>', NULL, '2015-09-07 11:02:11', '2015-09-07 11:02:11'),
(10, 'StarTrek Filla', '<p>The game''s not big enough unless it scares you a little. Ensign Babyface! A surprise party? Mr. Worf, I hate surprise parties. I would *never* do that to you. Mr. Crusher, ready a collision course with the Borg ship. I''d like to think that I haven''t changed those things, sir. In all trust, there is the possibility for betrayal. Sorry, Data. Computer, lights up! Is it my imagination, or have tempers become a little frayed on the ship lately? Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody. Yesterday I did not know how to eat gagh. You did exactly what you had to do. You considered all your options, you tried every alternative and then you made the hard choice. We have a saboteur aboard. Shields up! Rrrrred alert! Did you come here for something in particular or just general Riker-bashing? I recommend you don''t fire until you''re within 40,000 kilometers. Wait a minute - you''ve been declared dead. You can''t give orders around here. and attack the Romulans. Our neural pathways have become accustomed to your sensory input patterns. Not if I weaken first. I am your worst nightmare! Why don''t we just give everybody a promotion and call it a night - ''Commander''? Earl Grey tea, watercress sandwiches... and Bularian canap&eacute;s? Are you up for promotion? I think you''ve let your personal feelings cloud your judgement. When has justice ever been as simple as a rule book? Damage report! Now, how the hell do we defeat an enemy that knows us better than we know ourselves? Your head is not an artifact! We finished our first sensor sweep of the neutral zone. The look in your eyes, I recognize it. You used to have it for me. You''re going to be an interesting companion, Mr. Data. Besides, you look good in a dress. Fear is the true enemy, the only enemy. You bet I''m agitated! I may be surrounded by insanity, but I am not insane. I can''t. As much as I care about you, my first duty is to the ship. They were just sucked into space. I''ll be sure to note that in my log.</p>', NULL, '2015-09-22 02:20:53', '2015-09-22 02:20:53'),
(11, 'More from startrek', '<p>And blowing into maximum warp speed, you appeared for an instant to be in two places at once. Fear is the true enemy, the only enemy. A lot of things can change in twelve years, Admiral. Not if I weaken first. The look in your eyes, I recognize it. You used to have it for me. I guess it''s better to be lucky than good. Computer, belay that order. Wouldn''t that bring about chaos? We finished our first sensor sweep of the neutral zone. We have a saboteur aboard. The game''s not big enough unless it scares you a little. Why don''t we just give everybody a promotion and call it a night - ''Commander''? I think you''ve let your personal feelings cloud your judgement. Travel time to the nearest starbase? Damage report! Now, how the hell do we defeat an enemy that knows us better than we know ourselves? Well, that''s certainly good to know. Sure. You''d be surprised how far a hug goes with Geordi, or Worf. This is not about revenge. This is about justice. Commander William Riker of the Starship Enterprise. Earl Grey tea, watercress sandwiches... and Bularian canap&eacute;s? Are you up for promotion? That might''ve been one of the shortest assignments in the history of Starfleet. Mr. Worf, you sound like a man who''s asking his friend if he can start dating his sister. Your head is not an artifact! I''m afraid I still don''t understand, sir. Congratulations - you just destroyed the Enterprise. They were just sucked into space. How long can two people talk about nothing? We know you''re dealing in stolen ore. But I wanna talk about the assassination attempt on Lieutenant Worf. Could someone survive inside a transporter buffer for 75 years? You did exactly what you had to do. You considered all your options, you tried every alternative and then you made the hard choice. I can''t. As much as I care about you, my first duty is to the ship. The Enterprise computer system is controlled by three primary main processor cores, cross-linked with a redundant melacortz ramistat, fourteen kiloquad interface modules. Sorry, Data. Flair is what marks the difference between artistry and mere competence. You''re going to be an interesting companion, Mr. Data. Talk about going nowhere fast. We could cause a diplomatic crisis. Take the ship into the Neutral Zone Is it my imagination, or have tempers become a little frayed on the ship lately? About four years. I got tired of hearing how young I looked. You bet I''m agitated! I may be surrounded by insanity, but I am not insane. Besides, you look good in a dress. I will obey your orders. I will serve this ship as First Officer. And in an attack against the Enterprise, I will die with this crew. But I will not break my oath of loyalty to Starfleet. Fate protects fools, little children and ships named Enterprise. The Federation''s gone; the Borg is everywhere! Yes, absolutely, I do indeed concur, wholeheartedly! Wait a minute - you''ve been declared dead. You can''t give orders around here. and attack the Romulans. When has justice ever been as simple as a rule book? In all trust, there is the possibility for betrayal.</p>\r\n<p>&nbsp;</p>', NULL, '2015-09-22 02:23:45', '2015-09-22 02:23:45'),
(12, 'Batman Flys High', '<p>And why do we fall? So we can learn to pick ourselves up.</p>\r\n<p>Now choice is yours: exile or death?</p>\r\n<p>That''s a lovely lovely voice!</p>\r\n<p>Never start with the head. The victim gets all fuzzy. He can''t feel the next... See?</p>\r\n<p>Your Punishment Must Be More Severe.</p>\r\n<p>Pretty soon we will be chasing down over due library books.</p>\r\n<p>Gordon... You do like to play things pretty close to the chest.</p>\r\n<p>Seven hundred twelve counts of extortion. Eight hundred and forty-nine counts of racketeering. Two hundred and forty-six counts of fraud. Eighty-seven counts of conspiracy murder.Five hundred and twenty-seven counts of obstruction of justice. How do the defendants plead?</p>\r\n<p>It''s not who I am underneath but what I do that defines me.</p>\r\n<p>They scream and they cry much as you''re doing now.</p>\r\n<p>You''re taller than you look in the tabIoids, Mr. Wayne.</p>\r\n<p>As Gotham''s favored son you will be ideally placed to strike at the heart of criminality.</p>\r\n<p>Why do we fall, sir? So that we can learn to pick ourselves up.</p>\r\n<p>It means you''re hatred, and it also means losing someone, who I''ve cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important.</p>', NULL, '2015-09-22 02:24:03', '2015-09-22 02:24:03'),
(13, 'More Batman Adventures', '<p>To manipulate the fears in others, you must first master your own. Are you ready to begin?</p>\r\n<p>You know how to fight six men. We can teach you how to engage 600.</p>\r\n<p>Are you so desperate to fight criminals that you lock yourself in to take them on one at a time ?</p>\r\n<p>Just you, sir? Don''t worry, Master Wayne. It takes a little time to get back in the swing of things.</p>\r\n<p>I''m Batman</p>\r\n<p>Someone like you. Someone who''ll rattle the cages.</p>\r\n<p>Are you so desperate to fight criminals that you lock yourself in to take them on one at a time ?</p>\r\n<p>I am the League of Shadows.</p>\r\n<p>You should use your full name. I like that name, Robin.</p>\r\n<p>You can swapnot sleeping in a penthouse... for not sleeping in a mansion. Whenever you stitch yourself up, you do make a bloody mess.</p>\r\n<p>It means you''re hatred, and it also means losing someone, who I''ve cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important.</p>\r\n<p>You have nothing, nothing to threaten me with. Nothing to do with all your strength.</p>\r\n<p>This is what happens when an unstoppable force meets an immovable object.</p>\r\n<p>I got another another job. Your.</p>', NULL, '2015-09-22 02:24:21', '2015-09-22 02:24:21'),
(14, 'Who Dosent Love Hodor', '<p>Hodor hodor; hodor hodor hodor... Hodor hodor hodor?! Hodor hodor HODOR! Hodor hodor hodor hodor; hodor hodor? Hodor, HODOR hodor, hodor hodor hodor hodor hodor! Hodor. Hodor hodor hodor; hodor hodor? Hodor, hodor hodor hodor?!</p>\r\n<p>Hodor hodor hodor hodor - hodor... Hodor hodor hodor hodor? Hodor. Hodor hodor, hodor. Hodor hodor? Hodor hodor hodor hodor, hodor, hodor hodor. Hodor, hodor, hodor. Hodor hodor. Hodor hodor - hodor hodor hodor? Hodor, hodor. Hodor. Hodor, hodor; hodor hodor hodor hodor; hodor hodor? Hodor! Hodor hodor, hodor... Hodor hodor HODOR hodor, hodor hodor hodor hodor?! Hodor, hodor. Hodor. Hodor, hodor, hodor. Hodor hodor; hodor hodor hodor!</p>\r\n<p>Hodor hodor HODOR! Hodor hodor, hodor. Hodor hodor - hodor. Hodor. Hodor HODOR hodor, hodor hodor - hodor - hodor. Hodor. Hodor. Hodor hodor, hodor. Hodor hodor; hodor hodor. Hodor hodor - HODOR hodor, hodor hodor. Hodor. Hodor! Hodor hodor, hodor, hodor. Hodor hodor hodor; hodor hodor, hodor, hodor hodor.</p>\r\n<p>Hodor, hodor. Hodor. Hodor, hodor... Hodor hodor HODOR hodor, hodor HODOR hodor, hodor hodor, hodor. Hodor hodor hodor! Hodor. Hodor hodor hodor - hodor... Hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor HODOR hodor, hodor hodor. Hodor. Hodor, hodor - hodor hodor HODOR hodor, hodor hodor, hodor, hodor hodor. Hodor hodor - HODOR hodor, hodor hodor hodor!</p>\r\n<p>Hodor! Hodor hodor, hodor... Hodor hodor hodor hodor hodor HODOR hodor, hodor hodor. Hodor. Hodor hodor HODOR! Hodor hodor; hodor hodor; hodor hodor... Hodor hodor hodor?! Hodor hodor HODOR! Hodor hodor... Hodor hodor hodor. Hodor hodor HODOR! Hodor hodor, hodor. Hodor hodor - hodor, hodor. Hodor hodor hodor! Hodor, hodor hodor hodor hodor. Hodor hodor HODOR! Hodor hodor; hodor hodor, hodor. Hodor hodor? Hodor hodor - hodor HODOR hodor, hodor HODOR hodor, hodor hodor.</p>\r\n<p>&nbsp;</p>\r\n<p>Made by a generator not eddie going nuts!</p>', NULL, '2015-09-22 02:25:34', '2015-09-22 02:25:34'),
(15, 'Batmans Latest Adventure', '<p>Just know that there are those of us who care about what you do with your future.</p>\r\n<p>I can''t do that as Bruce Wayne... as a man. I''m flesh and blood. I can be ignored, destroyed. But as a symbol, I can be incorruptible, I can be everlasting.</p>\r\n<p>Your Punishment Must Be More Severe.</p>\r\n<p>I''m here to ensure the League of Shadow fulfills its duty to restore balance to civilization. You yourself fought the decadence of Gotham for years with all your strength, all your resources, all your moral authority. And the only victory you achieved was a lie. Now, you understand? Gotham is beyond saving and must be allowed to die.</p>\r\n<p>Breathe in your fears. Face them. To conquer fear, you must become fear. You must bask in the fear of other men. And men fear most what they cannot see. You have to become a terrible thought. A wraith. You have to become an idea! Feel terror cloud your senses. Feel its power to distort. To control. And know that this power can be yours. Embrace your worst fear. Become one with the darkness.</p>\r\n<p>How can you move faster than possible, fight longer than possible, without the most powerful impulse of the spirit? The fear of death.</p>\r\n<p>Someone like you. Someone who''ll rattle the cages.</p>\r\n<p>Ah yes! I was wondering what would weight first. Your spirit... or your body?</p>\r\n<p>I am the League of Shadows.</p>\r\n<p>It means you''re hatred, and it also means losing someone, who I''ve cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important.</p>\r\n<p>To manipulate the fears in others, you must first master your own. Are you ready to begin?</p>\r\n<p>Behind you, stands a symbol of oppression. Blackgate Prison, where a thousand men have languished under the name of this man: Harvey Dent.</p>\r\n<p>You can swapnot sleeping in a penthouse... for not sleeping in a mansion. Whenever you stitch yourself up, you do make a bloody mess.</p>\r\n<p>No guns, no killing.</p>', NULL, '2015-09-22 02:25:58', '2015-09-22 02:25:58'),
(16, 'Morgen Freeman Vs Clint', '<p class="caps">That tall drink of water with the silver spoon up his ass. i once heard a wise man say there are no perfect men. only perfect intentions. multiply your anger by about a hundred, kate, that''s how much he thinks he loves you. the man likes to play chess; let''s get him some rocks. here. put that in your report!" and "i may have found a way out of here. this is the ak-47 assault rifle, the preferred weapon of your enemy; and it makes a distinctive sound when fired at you, so remember it. well, what is it today? more spelunking? are you feeling lucky punk you want a guarantee, buy a toaster. you see, in this world there''s two kinds of people, my friend: those with loaded guns and those who dig. you dig. man''s gotta know his limitations. let me tell you something my friend. hope is a dangerous thing. hope can drive a man insane.</p>\r\n<p class="caps">That tall drink of water with the silver spoon up his ass. i now issue a new commandment: thou shalt do the dance. i did the same thing to gandhi, he didn''t eat for three weeks. boxing is about respect. getting it for yourself, and taking it away from the other guy. when a naked man''s chasing a woman through an alley with a butcher knife and a hard-on, i figure he''s not out collecting for the red cross. rehabilitated? well, now let me see. you know, i don''t have any idea what that means. no, this is mount everest. you should flip on the discovery channel from time to time. but i guess you can''t now, being dead and all. bruce... i''m god. i did the same thing to gandhi, he didn''t eat for three weeks. boxing is about respect. getting it for yourself, and taking it away from the other guy. this is my gun, clyde! dyin'' ain''t much of a livin'', boy.</p>\r\n<p class="caps">Cities fall but they are rebuilt. heroes die but they are remembered. no, this is mount everest. you should flip on the discovery channel from time to time. but i guess you can''t now, being dead and all. well, do you have anything to say for yourself? ever notice how sometimes you come across somebody you shouldn''t have f**ked with? well, i''m that guy. when a naked man''s chasing a woman through an alley with a butcher knife and a hard-on, i figure he''s not out collecting for the red cross. circumstances have taught me that a man''s ethics are the only possessions he will take beyond the grave. don''t p!ss down my back and tell me it''s raining. multiply your anger by about a hundred, kate, that''s how much he thinks he loves you. i now issue a new commandment: thou shalt do the dance. this is my gun, clyde! well, do you have anything to say for yourself? dyin'' ain''t much of a livin'', boy.</p>\r\n<p class="caps">Bruce... i''m god. i don''t think they tried to market it to the billionaire, spelunking, base-jumping crowd. it only took me six days. same time it took the lord to make the world. it only took me six days. same time it took the lord to make the world. here. put that in your report!" and "i may have found a way out of here. i don''t think they tried to market it to the billionaire, spelunking, base-jumping crowd. you measure yourself by the people who measure themselves by you. i once heard a wise man say there are no perfect men. only perfect intentions. man''s gotta know his limitations. mister wayne, if you don''t want to tell me exactly what you''re doing, when i''m asked, i don''t have to lie. but don''t think of me as an idiot. cities fall but they are rebuilt. heroes die but they are remembered. cities fall but they are rebuilt. heroes die but they are remembered.</p>', NULL, '2015-09-22 02:28:33', '2015-09-22 02:29:45'),
(17, 'Zombies', '<p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.</p>', NULL, '2015-09-22 02:33:40', '2015-09-22 02:33:40');

DROP TABLE IF EXISTS `couriers`;
CREATE TABLE IF NOT EXISTS `couriers` (
  `id` int(11) NOT NULL,
  `courier_name` varchar(100) NOT NULL,
  `courier_charge` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `couriers` (`id`, `courier_name`, `courier_charge`) VALUES
(1, 'Vally Fast couriers', 12.22),
(2, 'free couriers', 12.99),
(3, 'Startrek couriers', 25.50),
(4, 'International shipping', 105.50),
(5, 'The Flash', 1002.20),
(6, 'drunk couriers Inc', 244.20);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `customer_url` varchar(255) DEFAULT NULL,
  `notes` text,
  `customer_type` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`, `address`, `postcode`, `phone`, `customer_url`, `notes`, `customer_type`, `user_id`) VALUES
(1, 'lliu147@student.monash.edu', 'Clothes R US', 'NA', '102 street st streetville', '3111', '98878787', 'http://microsoft.com.au/', 'met at ciarns trade show ', 'customer', 2),
(2, 'phill@phillsPlace.com', 'phills mats', 'Phill', '104 Given up lane', '3243', '9887887', NULL, '', 'customer', 4),
(3, 'edster2007@gmail.com', 'Eddie', 'Power', '105 some place', '3199', '0404556778', NULL, 'met at university 2015 meet and greet.', 'sole trader', 1),
(4, 'eddie.power@icloud.com', 'Solemate', 'Admin', '108 Mathews street', '3200', '97787676', '', 'brother of matt''s mats the supplier, so i give him good discount of  +150% ;)', 'Sales Rep', 6),
(5, 'sgami1@student.monash.edu', 'Shash', 'DaMan', '123 youWishYouLivedHere street Caulfield', '3232', '0456689999', NULL, 'Very Rich met at the "we pwn you" seminar 2015.', 'Chemist', 12),
(9, 'rugs@rugville.com', 'john', 'Rando', '243 chapel street melbourne', '3154', '87763232', NULL, 'some small shop in Chapel street parahn.', 'sole trader', 13),
(10, 'repco@email.com', 'Bill', 'Johnes', '23 silly av Frankston', '3199', '97783232', NULL, 'Big car store only interested in safety mats for workshops.', 'autoParts', 13),
(11, 'autobarn@shop.com', 'Frankenstien', 'Blacksmith', '23 foot street new zealand', '2321', '98332332', NULL, 'lives on a mountain and sells auto parts, loves the safety floor mats for auto shops.', 'autoParts shop', 13),
(12, 'empow3@student.monash.edu', 'Eddie', 'Power', 'Monash University Caulfield campus,\r\nDandenong Road', '3145', '0456689999', NULL, 'noted', 'knowItAll', 3);

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `bale_cost` decimal(9,2) NOT NULL COMMENT 'cost for a full bale of each item or Matt',
  `matt_weight` decimal(9,2) NOT NULL COMMENT 'The individual weight of the door matt this is for easy calculations',
  `base_price` decimal(10,2) NOT NULL COMMENT 'used to store the base customer price for each unit of stock.',
  `item_number` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `barcode` varchar(14) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `items` (`id`, `item_name`, `quantity_on_hand`, `bale_cost`, `matt_weight`, `base_price`, `item_number`, `photo`, `photo_dir`, `barcode`) VALUES
(1, 'door matt car shaped 1', 488, '250.00', '1.10', '12.50', 222343, '23-7093.jpg', NULL, '4294967295234'),
(2, 'Back Door matt', 255, '60.00', '1.20', '10.50', 233454, '23-7186.jpg', NULL, '9874329056733'),
(3, 'Safety Matt -- 8x8', 117, '180.00', '1.80', '15.90', 100212, '23-7007.jpg', NULL, '5654335623234'),
(4, 'Safety Matt 16x16', 489, '155.00', '1.10', '25.00', 233211, '23-1197 a.jpg', NULL, '2342343425232'),
(5, 'Harley Davidson Doormat 3', 1050, '250.00', '1.20', '21.20', 7885332, '23-2110.jpg', NULL, '4765456433453'),
(7, 'Front Door "Welcome Home" Matt', 775, '160.00', '1.00', '18.90', 2245321, '23-6005.JPG', NULL, '1231236765777'),
(8, 'Kids Live here Matt', 53951, '150.00', '1.30', '19.70', 7654222, '23-7053A.jpg', NULL, '6799677865333'),
(9, 'Beware Dog Bites Matt', 53206, '180.00', '1.75', '12.50', 865543, '23-7051.jpg', NULL, '2134123453424'),
(10, 'Kids Bite Doormat ', 5071, '125.00', '0.95', '32.45', 675443, '23-7110.jpg', NULL, '6453624567865'),
(11, 'saftey matt 1', 2036, '125.00', '0.79', '80.90', 9887673, '23-7411.jpg', NULL, '1145234523452'),
(12, 'saftey matt 1', 2045, '180.00', '0.49', '75.90', 9887673, '23-X7379.jpg', NULL, '3452345234523'),
(13, 'test item', 2294, '250.00', '1.95', '12.50', 987789, 'mat4.jpg', NULL, '9873214674329');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `required_date` date NOT NULL,
  `customer_comments` varchar(100) NOT NULL DEFAULT '',
  `courier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`id`, `ordered_date`, `required_date`, `customer_comments`, `courier_id`, `customer_id`, `user_id`) VALUES
(2, '2015-05-12', '2015-05-19', 'shipped.', 1, 3, 1),
(4, '2015-05-26', '2015-07-26', 'Order', 5, 3, 1),
(5, '2014-06-08', '2014-06-09', 'Shipped', 4, 3, 1),
(6, '2015-04-09', '2015-04-15', 'Ordered -- Awaiting picking.', 6, 4, 6),
(11, '2015-09-18', '2015-09-02', '', 3, 4, 6),
(12, '2015-09-18', '2015-09-16', '', 4, 4, 6),
(13, '2015-09-18', '2015-09-16', '', 4, 4, 6),
(14, '2015-09-18', '2015-09-16', '', 4, 4, 6),
(15, '2015-09-18', '2015-09-05', '', 3, 4, 6),
(16, '2015-09-19', '2015-09-08', '', 2, 2, 4),
(20, '2015-09-19', '2015-09-09', '', 1, 3, 1),
(22, '2015-10-21', '2015-10-22', '', 1, 3, 1),
(23, '2015-10-21', '2015-10-22', 'order made by admin today', 1, 3, 1),
(24, '2015-10-23', '2015-10-23', 'Ship to buisness address', 1, 3, 1),
(25, '2015-11-02', '2015-11-02', 'Leave with Bob', 1, 1, 2),
(26, '2015-11-02', '2015-11-02', '', 1, 1, 2);

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `per_unit` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity_ordered`, `per_unit`, `discount`) VALUES
(2, 2, 1, 255, 2.00, 0.00),
(3, 2, 1, 12, 12.50, 0.00),
(7, 3, 3, 23, 12.22, 12.00),
(8, 2, 3, 233, 15.45, 2.00),
(46, 7, 26, 96, 25.45, 15.00),
(48, 10, 2, 143, 15.00, 12.00),
(50, 7, 2, 77, 154.00, 0.00),
(51, 8, 6, 245, 23.00, 12.00),
(52, 3, 2, 21, 12.43, 0.00),
(54, 8, 5, 123, 12.50, 1.00),
(56, 7, 11, 23, 21.50, 0.00),
(57, 4, 10, 2, 2.00, 1.00),
(64, 1, 12, 3, 3.00, 3.00),
(65, 1, 12, 3, 3.00, 3.00),
(66, 1, 12, 3, 3.00, 3.00),
(67, 1, 12, 3, 3.00, 3.00),
(68, 8, 20, 1, 2.00, 1.00),
(69, 8, 20, 1, 2.00, 1.00),
(70, 13, 20, 3, 12.50, 1.00),
(71, 13, 20, 3, 12.50, 1.00),
(72, 13, 20, 3, 12.50, 1.00),
(73, 13, 20, 3, 12.50, 1.00),
(74, 3, 23, 12, 15.90, 0.00),
(75, 7, 23, 56, 18.90, 2.00),
(76, 9, 23, 15, 12.50, 45.00),
(78, 9, 26, 10, 18.90, 0.00);

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_status` varchar(80) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `purchases` (`id`, `purchase_date`, `purchase_status`, `supplier_id`) VALUES
(1, '2015-05-19', 'ordered', 1),
(2, '2015-06-26', 'ordered', 2),
(3, '2015-05-26', 'Ordered', 4),
(4, '2015-05-31', 'awaiting shipping', 4),
(5, '2015-06-09', 'Ordered', 3),
(6, '2015-09-06', 'ordering', 5);

DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `price_of_item` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `purchase_details` (`id`, `purchase_id`, `item_id`, `quantity_purchased`, `price_of_item`) VALUES
(1, 1, 1, 250, 10),
(2, 1, 3, 10, 10),
(3, 2, 9, 500, 10),
(4, 3, 8, 1000, 6),
(5, 2, 5, 120, 19),
(6, 2, 9, 1100, 11),
(7, 3, 8, 2041, 10),
(8, 6, 12, 24675, 8);

DROP TABLE IF EXISTS `shopcart`;
CREATE TABLE IF NOT EXISTS `shopcart` (
  `id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO `shopcart` (`id`, `user_id`, `created`) VALUES
(17, 1, '2015-10-16 04:23:16'),
(18, 2, '2015-10-18 07:47:01'),
(19, 6, '2015-10-21 15:28:51'),
(20, 3, '2015-10-25 12:49:45');

DROP TABLE IF EXISTS `shopcart_items`;
CREATE TABLE IF NOT EXISTS `shopcart_items` (
  `id` int(8) NOT NULL,
  `shopcart_id` int(8) NOT NULL,
  `item_id` int(8) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

INSERT INTO `shopcart_items` (`id`, `shopcart_id`, `item_id`, `quantity`) VALUES
(38, 19, 2, 12),
(45, 17, 2, 5);

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_description`) VALUES
(1, 'Matt Maker Matt', 'Guy named matt who makes mat''s great fit for his name.'),
(2, 'Matt Factory', 'A super factory for producing matts.'),
(3, 'Nylex Australia', 'A factory production supplier in melbourne keeping the shipping costs down, met at QLD trade show and was put in touch with Joe Blow in melbourne branch.'),
(4, 'Doors are US', 'Local Supplier of Doors and Doormats'),
(5, 'Peumal Pukmakumar', 'Young Indian family producing completely producing matts with biodegradable fully sustainable practices ');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL COMMENT 'The log in user name for each user/customer on the system',
  `email` varchar(255) NOT NULL COMMENT 'users email address for correspondence',
  `password` varchar(255) NOT NULL COMMENT 'user log in password',
  `reset` varchar(64) DEFAULT NULL COMMENT 'a reset string for checking user has asked for a new password.',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset`, `created`, `modified`, `role`) VALUES
(1, 'ed', 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', '6ab4e1d3a1e1436c3797d6f463c3197c4b38d12c51544ff9512f3069b0a2e203', '2015-04-03 05:45:16', '2015-06-06 06:46:52', 'admin'),
(2, 'tester1', 'user@iTest.com', '$2y$10$tcTEwARwQ//3dJAL9q2hyuar7uRepke3Wpr92ZF78wQlgDc7amb66', NULL, '2015-04-03 17:31:54', '2015-09-16 18:53:07', 'user'),
(3, 'linc', 'lliu147@student.monash.edu', '$2y$10$EdWfOnju7g1Hk5FRCkQsjeFBefvh7sSmp/t.O1XHaKfJLaFPkY47a', NULL, '2015-04-23 00:00:00', '2015-05-19 12:27:56', 'admin'),
(4, 'jus', 'ss4.justin@gmail.com', '$2y$10$SOC0M376y8xtWVtqKkLaOOEgav4qGO0ut2jz4x4Xx5FqgzRDMVjMm', NULL, '2015-04-25 00:00:00', '2015-05-19 12:28:03', 'admin'),
(6, 'ep', 'eddie.power@icloud.com', '$2y$10$ez7IT5c7eWGfhyNFVPUvpuoVGkdPrv/eKPWHWpAW0E7H9.Ai9mPG2', 'd555aaab38d54920b124840bc056b08b0ef919514adc7394c50cde24c6c88225', '2015-06-08 06:30:11', '2015-09-22 09:22:00', 'admin'),
(10, 'lliu', 'hhh@gmail.com', '$2y$10$.JpVuT/dOuqD8P0Dcg6GIub1Db1UCdSToBu6G93pLDPmoEcb1i1hu', NULL, '2015-07-31 01:01:19', '2015-07-31 01:01:19', 'user'),
(11, 'shash7', 'shashwat.amin@yahoo.com', '$2y$10$nkmeAyGtKYVge1O62nJDkO/6v.I1UGWeK20CLb7vo6mY8nqY4kW0i', NULL, '2015-08-07 04:39:42', '2015-08-07 04:39:42', 'admin'),
(12, 'dicksmith', 'shash122tfu@gmail.com', '$2y$10$WT5U5poJZsXRAonxsYildu8BPaCYoIFwIg78G8iMGXRwiZ2RwgfUu', NULL, '2015-08-07 04:40:49', '2015-08-07 04:40:49', 'user'),
(13, 'testRep1', 'empow3@student.monash.edu', '$2y$10$dkTnLm0g0rkp2JY3Ti85MOSMVn0ax1gMT7CD/TTpInhGsVs2S4Tbm', NULL, '2015-09-16 13:52:42', '2015-09-16 14:13:15', 'salesRep'),
(14, 'edtest', 'ed@email.com', '$2y$10$S2s26yh4s9Zl4x2j3..L9.fJWGopaV/gGpC1.KUCuowbKbUaFT/3a', NULL, '2015-09-17 08:01:16', '2015-09-17 08:01:16', 'admin'),
(15, 'tester21', 'ed@power.com', '$2y$10$thI1Nw27ZXjV3Bj1orutGe/pms/7h/Wopule68LAI0GoBDpPLJMIO', NULL, '2015-09-17 15:49:43', '2015-09-17 15:54:21', 'salesRep'),
(16, 'Dora', 'dora@email.com', '$2y$10$ol4WIvJu8TKco4/nLKjI2eZAl2NxZj.suuLy0QSut/EQz61mJklom', NULL, '2015-09-19 15:52:29', '2015-09-19 15:52:29', 'admin'),
(17, 'DoraAdmin', 'Dora2@email.com', '$2y$10$ieRUbqfvLNfMiuXbcJZSReYtSgxoSN5jN.tl6BxwXLV.hWzonPwpa', NULL, '2015-10-07 06:43:15', '2015-10-07 06:45:47', 'admin'),
(18, 'DoraUser', 'dora.he@monash.edu', '$2y$10$H4uGkHWOY97AJMYQOU13QeLoN8fzrV6yzrvojplHkMdySf3gUnLay', NULL, '2015-10-07 06:43:43', '2015-10-07 06:43:43', 'user');


ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`), ADD KEY `customers_fk` (`user_id`);

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`), ADD KEY `orders_fk1` (`customer_id`), ADD KEY `orders_fk2` (`courier_id`);

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`), ADD KEY `purchase_fk1` (`supplier_id`);

ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `shopcart`
  ADD PRIMARY KEY (`id`), ADD KEY `shopcart_fk` (`user_id`);

ALTER TABLE `shopcart_items`
  ADD PRIMARY KEY (`id`), ADD KEY `shopcart_items_fk1` (`item_id`), ADD KEY `shopcart_items_fk2` (`shopcart_id`);

ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
ALTER TABLE `shopcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
ALTER TABLE `shopcart_items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;

ALTER TABLE `customers`
ADD CONSTRAINT `customers_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `orders`
ADD CONSTRAINT `order_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_fk2` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `purchases`
ADD CONSTRAINT `purchase_fk1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `shopcart`
ADD CONSTRAINT `shopcart_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `shopcart_items`
ADD CONSTRAINT `shopCart_items_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `shopcart_items_fk1` FOREIGN KEY (`shopcart_id`) REFERENCES `shopcart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
