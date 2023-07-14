-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 02:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `live_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` text NOT NULL,
  `number_of_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `number_of_post`) VALUES
(1, 'World', 3),
(2, 'Sports', 2),
(3, 'Technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` varchar(50) NOT NULL,
  `post_desc` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `post_date` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `post_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_desc`, `category`, `post_date`, `author`, `image`, `post_title`) VALUES
('202102171000', 'Hundreds of thousands of people have taken to the streets of major cities in Myanmar, protesting the military’s power grab amid rising concern of violence in the troubled Southeast Asian nation.\r\n\r\nWednesday’s protests marked one of the largest in Myanmar since the February 1 coup and came after protesters urged people to turn out en masse and shatter the military’s claim that the public backed its decision to seize power from civilian leader Aung San Suu Kyi and her National League for Democracy (NLD).\r\n“We love democracy and hate the junta,” Sithu Maung, an elected NLD member told tens of thousands of people at the Sule Pagoda, a central protest site in the main city of Yangon. “We must be the last generation to experience a coup.”\r\n\r\nThe NLD had swept a November 8 election as widely expected, but the army alleges there was fraud. At a news conference on Tuesday, Brigadier General Zaw Min Tun, spokesman for the ruling council, maintained that the military’s seizure of power was in line with the constitution and said it remained committed to democracy.\r\n\r\nHe also said 40 million of the 53 million population supported the military’s action.\r\n\r\nSithu Maung poked fun at that saying: “We’re showing here that we’re not in that 40 million.”\r\n\r\n\r\n\r\n\r\nThe turnout in Yangon appeared to be one of the biggest so far in the city. Along with the larger crowds, some people also stopped their cars in the streets or at key junctions – their bonnets open in mass “breakdowns” – as a way of blocking off streets from security forces.\r\n\r\n\r\nDemonstrators block the road with their vehicles during a protest against the military coup in Yangon, February 17, 2021 [Stringer/ Reuters]\r\nIn Myanmar’s capital Naypyidaw, thousands marched down its wide boulevards, chanting for the release of Aung San Suu Kyi and President Win Myint.\r\nProtesters also poured into the streets of Mandalay, where on Monday security forces pointed guns at a group of 1,000 demonstrators and attacked them with slingshots and sticks. Local media reported that police also fired rubber bullets into a crowd and that a few people were wounded.\r\n\r\nTom Andrews, the United Nations’ special rapporteur on human rights in Myanmar, said earlier he was “terrified” of an escalation in violence, saying he had received reports of troop movements around the country and feared the protesters were facing real danger.\r\n\r\n“I fear that Wednesday has the potential for violence on a greater scale in Myanmar than we have seen since the illegal takeover of the government on February 1,” Andrews said in a statement.\r\n\r\n“I am terrified that given the confluence of these two developments – planned mass protests and troops converging – we could be on the precipice of the military committing even greater crimes against the people of Myanmar.”\r\n\r\n\r\n\r\n\r\n \r\n\r\n\r\n\r\n\r\nMyanmar’s military has a history of violence and impunity during the decades that it ruled the country before the transition to democracy began 10 years ago.\r\n\r\nArmed forces chief Min Aung Hlaing, who led the coup, also directed the 2017 crackdown on the Rohingya minority in the western state of Rakhine, which the United Nations has said was carried out with “genocidal intent“.\r\n\r\n“The security forces’ approach could take an even darker turn fast,” the International Crisis Group warned in a briefing released on Wednesday.\r\n\r\n“Soldiers and armoured vehicles have begun to reinforce the police lines and, should the generals become impatient with the status quo, could easily become the sharp end of a bloody crackdown, as has happened in the past.”\r\n\r\nThe February 1 coup has brought an abrupt halt to Myanmar’s fragile progress towards democracy, as Aung San Suu Kyi’s NLD was about to begin a second five-year term after winning a landslide in November’s election.\r\n\r\nAt Tuesday’s news conference, Zaw Min Tun told reporters that the military guaranteeing that an election would be held and power handed to the winner. He gave no timeframe but said the army would not be in power for long.\r\n\r\nThe last stretch of army rule lasted nearly half a century before democratic reforms began in 2011.\r\n\r\nTeachers join protests against the military coup in Myanmar, outside the UN office in Yangon [Nyein Chan Naing/EPA]\r\nThousands took to the streets of Yangon on Wednesday after Aung San Suu Kyi was charged for breaching the country’s natural disaster management law [Lynn Bo Bo/EPA]The military in 1990 held an election, but then refused to accept the result after the NLD, then a newly formed party, swept the elections.\r\n\r\nIt had earlier used force against protesters in 1988 and did so again in 2007 when a hike in fuel prices triggered mass demonstrations led by Buddhist monks.\r\n\r\nAung San Suu Kyi, 75, is thought to be under house arrest and on Tuesday was charged under the National Disaster Management Law with breaching COVID-19 regulations while campaigning for the elections. She has also been charged with illegally importing walkie-talkies that were found in her home.\r\n\r\nBritish Prime Minister Boris Johnson issued a strong denunciation of the legal manoeuvre against Aung San Suu Kyi.\r\n\r\n“New charges against Aung San Suu Kyi fabricated by the Myanmar military are a clear violation of her human rights,” he tweeted. “We stand with the people of Myanmar and will ensure those responsible for this coup are held to account.”\r\n\r\nUN spokesman Stephane Dujarric said the world body stood by its denunciation of the coup and has called for charges against Aung San Suu Kyi to be dropped and for her to be released.\r\n\r\nMeanwhile, the Assistance Association for Political Prisoners, which is keeping track of those taken into custody, says 452 people have been detained since February 1. Some 417 remain in detention.\r\n\r\nThe UN’s special rapporteur on human rights in Myanmar is worried the protesters face increasing danger given the size of the demonstrations and reports of troop movements around the country [Lynn Bo Bo/EPA]\r\nThose arrested include much of the NLD’s senior leadership.\r\nInternet networks were also taken down for the third night in a row, but connectivity was restored on Wednesday morning, according to NetBlocks, which monitors disruption and outages, and images of the rallies widely shared.\r\n\r\nAs well as the demonstrations in towns across the ethnically diverse country, a civil disobedience movement has brought strikes that are crippling many functions of government.\r\n\r\nActor Pyay Ti Oo said the opposition could not be quelled.\r\n\r\n“They say we’re like a brush fire and will stop after a while but will we? No. Won’t stop until we succeed,” he told the crowd.\r\n\r\nSOURCE : AL JAZEERA AND NEWS AGENCIES\r\nRELATED\r\nTeachers flash the defiant three-finger salute during a protest against the Myanmar military coup outside the UN office in Yangon. [Nyein Chan Naing/EPA]\r\nIn Pictures: Myanmar’s coup opponents gather for major protests\r\nSoutheast Asian country has seen daily demonstrations since February 6, drawing hundreds of thousands of people.\r\n\r\n17 Feb 2021\r\nA group representing more than 24 of Myanmar\'s ethnic minorities joined the protests last week. They are concerned some politicians have joined the generals\' new government saying the military is the \'common enemy\' of all people in Myanmar [Al Jazeera]\r\nMyanmar military tries ‘divide and rule’ in bid to cement power\r\nEthnic minorities say they feel betrayed by politicians who have taken jobs with military’s State Administration Council\r\n\r\n15 Feb 2021\r\nWhat’s happening in Myanmar?| Start Here\r\nFrom: Start Here\r\nWhat’s happening in Myanmar?| Start Here\r\nWhy did Myanmar’s military overthrow the government? And what does it mean for democracy?\r\n\r\n08:59\r\n14 Feb 2021\r\nProtesters in Yangon, many of them only in their 20s, say they are worried about the future of Myanmar under a military regime [Nyein Chan Naing/EPA]\r\nMyanmar’s youth look to future – not past – as they battle coup\r\nProtesters are all too aware of the risks of protesting, but say they cannot accept a future under military rule.\r\n\r\n11 Feb 2021\r\nMORE FROM NEWS\r\nIndian ex-minister loses high-profile #MeToo defamation case\r\nMJ Akbar stepped down as junior foreign minister and sued Ramani for defamation, citing \'irreparable damage to (my) reputation and goodwill\' [File: Kalyan Chakravorty/The The India Today Group via Getty Images]\r\nBangladeshi lawyer files sedition case over Al Jazeera report\r\nArmy chief General Aziz Ahmed, right, told reporters in Dhaka that the allegations against him and his family were false, concocted and part of a conspiracy by vested groups [File: STR/AFP]\r\nSaudi wealth fund plays to win with $3.3bn in video-game stock\r\nThe Saudi wealth fund acquired shares of three video-game makers including Activision Blizzard Inc, Electronic Arts Inc and Take-Two Interactive Software Inc [File: Buddhika Weerasinghe/Bloomberg]\r\nRihanna’s topless Hindu god photo sparks outrage\r\nRihanna recently upset the Indian government by commenting on the huge farmers\' protests [Danny Moloshok/Reuters]\r\nMOST READ\r\nExperts puzzled by dramatic fall in coronavirus cases in India\r\nWith the reasons behind India\'s success unclear, experts are concerned that people will let down their guard [Amit Dave/Reuters]\r\nProject Force: Is India a military superpower or a Paper Tiger?\r\n\r\nTrump lashes out at McConnell as Republican rift deepens\r\nWhile Mitch McConnell voted to acquit Trump in the Senate impeachment trial, McConnell says Trump is \'practically and morally responsible\' for US Capitol riot last month [File: Leah Millis/Reuters]\r\nBiden says China to pay price for human rights abuses\r\nBiden has also voiced concern about Beijing’s \'coercive and unfair\' trade practices [File: Reuters]\r\n', '1', 'Wed Feb, 2021', '1312', '1613574116-AP_21048274147457.jpg', 'Protesters create gridlock in Yangon amid fears of violence'),
('202102181100', 'Facebook has blocked Australian users of its platform from reading and sharing local and international news, stepping up its campaign against government plans to force technology giants to pay publishers for their news content.\r\n\r\n“The proposed law fundamentally misunderstands the relationship between our platform and publishers who use it to share news content,” Facebook said in a blog post announcing the move.\r\n“It has left us facing a stark choice: attempt to comply with a law that ignores the realities of this relationship, or stop allowing news content on our services in Australia. With a heavy heart, we are choosing the latter.”\r\n\r\nAustralia is trying to get technology companies, including Facebook and Google, to pay for the news that is widely shared on their sites, as the advertising revenue that once supported publishers evaporates. The law would force them to strike deals with media companies or have fees set for them.\r\n\r\nGoogle has threatened to withdraw its search services from Australia, but at the same time has also started to secure agreements on revenue-sharing with publishers.\r\n\r\nFacebook insists its relationship with the news industry is fundamentally different.', '1', 'Thu Feb, 2021', '1312', '1613647423-1.jpg', 'Broken news: Facebook blocks Australia pages in dispute over law'),
('202102181200', 'Myanmar’s military has ordered more arrests, with nearly 500 individuals facing charges or sentenced to jail in relation to the burgeoning protests and civil disobedience movement following the February 1 coup, as protesters return to the streets on Thursday following a massive demonstration the previous day.\r\n\r\nSome 495 civilian political leaders, activists and protesters have so far been detained or charged, the Assistance Association for Political Prisoners (AAPP), which has been tracking detentions in the country over the past two weeks, said in an update on Wednesday night.\r\nThree people have already been convicted to two years in jail and a third for three months, the group said. Some 460 people remain in detention.\r\n\r\nAmong those arrested in recent days was a regional minister of environment in Mandalay, while four train operators and two others were reportedly taken at gunpoint by the military, and three were arrested by police in Rakhine.\r\n\r\nEight civil servants were also put on trial on Wednesday for going on strike as part of a growing civil disobedience movement.\r\n\r\nIt is unclear if the AAPP list includes six celebrities, who are said to have been charged for inciting strikes that have paralysed many government offices. Those charges can carry up to two years in jail.', '1', 'Thu Feb, 2021', '1312', '1613629438-2.jpg', 'Myanmar detainees near 500 as hackers go after military websites'),
('202102181800', 'The head of the German football league Bundesliga has hit out at Spain’s big clubs for being “cash-burning machines” whose interest in a breakaway European Super League is driven by their business failures.\r\n\r\nChristian Seifert, chief executive of the German Football League (DFL), said the push for a breakaway was coming from Spain and some of the continent’s “super clubs” although he did not name the clubs.\r\nFormer Barcelona club president Josep Maria Bartomeu said he had signed the Catalan club up to the Super League when he resigned in October.\r\n\r\n“The brutal truth is that a few of these so-called super clubs are, in fact, poorly managed cash-burning machines that were not able, in a decade of incredible growth, to come close to a somehow sustainable business model,” Seifert told the Financial Times’ Business of Football summit on Wednesday.\r\n\r\n“If I was an investor, I’d ask if they are the right partners,” he added, suggesting that the money reportedly on offer to clubs to join such a breakaway is unlikely to resolve the club’s financial problems.\r\n\r\n“In the end, they will burn this money like that they burned in the last few years. They should think about developing a sustainable business model and salary caps.”', '2', 'Thu Feb, 2021', '1312', '1613651217-1.jpg', '‘Cash-burning machines’: Bundesliga chief slams Spanish clubs'),
('202102181840', 'The Australian Open tennis organisers have announced a ban on fans and said players would be cocooned in biosecure “bubbles” as Victoria state authorities ordered six million people into lockdown on Friday to control a new coronavirus outbreak.\r\n\r\nThe five-day, state-wide lockdown starting at midnight local time (13:00 GMT) to combat an outbreak of the highly infectious UK strain at an airport hotel, is just the latest setback for the troubled tournament.\r\nThe year’s first Grand Slam, which started three weeks late to allow international players to quarantine, has already welcomed tens of thousands of socially distanced fans in the biggest crowds seen in tennis since the pandemic.\r\n\r\nUnder the new measures, some five million people in Australia’s second-biggest city will have to remain at home for five days from midnight, except for a limited number of permitted essential activities.\r\n\r\n“These restrictions are all about making sure that we respond appropriately to the fastest-moving, most infectious strain of coronavirus that we have seen,” said state Premier Daniel Andrews.\r\n\r\n“I am confident that this short, sharp circuit-breaker will be effective. We will be able to smother this. We will be able to prevent it getting away from us.', '2', 'Thu Feb, 2021', '1', '1613652656-1.jpg', 'Australian Open bars fans after snap COVID lockdown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1319, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(1320, 'moderator', 'moderator', 'moderator', '0408f3c997f309c03b08bf3a4bc7b730', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1321;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
