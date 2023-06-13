-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 08:14 AM
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
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertise_id` int(11) NOT NULL,
  `advertise_img` varchar(200) NOT NULL,
  `advertiser_mail` varchar(90) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `validity` timestamp NULL DEFAULT NULL,
  `paymentstatus` int(1) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `advertise_hours` int(2) DEFAULT 2,
  `requested_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved_on` timestamp NULL DEFAULT NULL,
  `payment_done_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

CREATE TABLE `advertiser` (
  `mail` varchar(90) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL,
  `verification_code` varchar(90) DEFAULT NULL,
  `is_verified` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`mail`, `fname`, `lname`, `password`, `verification_code`, `is_verified`) VALUES
('jimitnayee@gmail.com', 'jimit', 'nayee', 'jimit', '4206', 0),
('sanjaythakor@gmail.com', 'Sanjay', 'Thakor', 'sanjay', NULL, 1),
('shrimalishrimalishrimali@gmail.com', 'Parth', 'Shrimali', 'parth', '3133', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertise_plans`
--

CREATE TABLE `advertise_plans` (
  `plan_price` int(5) DEFAULT NULL,
  `plan_duration` int(2) DEFAULT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advertise_plans`
--

INSERT INTO `advertise_plans` (`plan_price`, `plan_duration`, `plan_id`) VALUES
(305, 1, 1),
(800, 3, 3),
(1450, 6, 4),
(2750, 12, 5),
(5400, 24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `mail` varchar(90) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`mail`, `fname`, `lname`) VALUES
('darshan@gmail.com', 'darshan', 'shrimali'),
('kishanthakor@gmail.com', 'Kishan', 'Thakor');

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_desc` longtext NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `author_mail` varchar(90) NOT NULL,
  `state_id` int(2) DEFAULT 0,
  `news_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`news_id`, `news_title`, `news_desc`, `news_date`, `status`, `author_mail`, `state_id`, `news_img`) VALUES
(4, 'After Haridwar huddle, wrestlers rethink move to drop medals in Ganga', '<p>ON A day of high drama, the protesting wrestlers, led by Olympic \r\nmedallists Bajrang Punia and Sakshi Malik and World Championship \r\nmedallist Vinesh Phogat, announced on Tuesday that they would â€˜immerseâ€™ \r\ntheir medals in the Ganga river, and reached Har ki Pauri in Haridwar by\r\n evening.</p><p><br></p><p>After sitting in a huddle on the banks of the river for over an \r\nhour-and-a-half, where some of them could be seen sobbing as they \r\nclutched their medals and citations, the wrestlers reversed their \r\ndecision, soon after Bharatiya Kisan Union (BKU) president Naresh Tikait\r\n reached the spot and asked them to defer their decision by five days.</p><p>Before Tikaitâ€™s arrival, as the crowd at the ghat grew bigger, a human \r\nchain of family members and other pehelwans shielded the wrestlers. \r\nSakshiâ€™s mother, Sudesh, held her daughter tight; Vineshâ€™s husband, \r\nSomvir Rathee, also a grappler, embraced her as she broke down and \r\ncovered her face.</p><p><br></p><p>A little over an hour later, as Tikait and his supporters arrived at the\r\n spot, the wrestlers and the farm leader went into a brief huddle. And, \r\nminutes later, the wrestlers made their way to their parked vehicles.</p><p><br></p><p>he wrestlers said there are a couple of reasons why they changed their minds, including a phone call from a <a href=\"https://indianexpress.com/about/bjp/\" class=\"\">BJP</a> leader asking for some time, and pressure from the families not to go ahead with their plans.</p><p><br></p><p>â€œWe were assured that our demands would be met, so we stepped back. \r\nHowever, in case the government goes back on its word, we will return to\r\n the Ganga again,â€ said a wrestler who did not want to be named.</p>\r\n<p>â€œWe have sought five daysâ€™ time and told the wrestlers to wait. After\r\n that, we will have a mahapanchayat and take the next course of action,â€\r\n Tikait said, after the wrestlers left Har Ki Pauri. <br></p><p>A Union Minister from western Uttar Pradesh is also learnt to have \r\nreached out to the wrestlers and urged them not to â€˜immerseâ€™ their \r\nmedals.</p>\r\n<p>Speaking to <a href=\"https://indianexpress.com\" class=\"\">The Indian Express</a>\r\n later, Tikait said he wanted to ensure that the wrestlers did not take \r\nany step in anger. â€œBacche gusse me wahan chale gaye theâ€¦ Humne unhe \r\nmanaya ki aap aisa mat karoâ€¦(They got angry and went thereâ€¦ we convinced\r\n them not to do this),â€ he said.</p><p></p>', '2023-05-31 05:07:28', 1, 'author@gmail.com', 0, '233fa810290686c0e73befa97601ceed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `CategoryName`, `Description`, `Is_Active`) VALUES
(3, 'Sports', 'Related to sports news', 1),
(5, 'Entertainment', 'Entertainment related  News', 1),
(6, 'Politics', 'Politics', 1),
(7, 'Business', 'Business', 1),
(8, 'COVID-19', 'COVID-19', 1),
(10, 'Cyber Security', 'Cyber Security is most important topic now .', 0),
(11, 'Security', 'The Security is always concern.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(6, 25, 'Parth Shrimali', 'shrimaliparth1@gmail.com', 'it is sad news.', '2023-05-01 07:33:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_mail` varchar(90) DEFAULT NULL,
  `emp_fname` varchar(30) DEFAULT NULL,
  `emp_lname` varchar(30) DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  `emp_role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_mail`, `emp_fname`, `emp_lname`, `emp_password`, `emp_role_id`) VALUES
('parth@gmail.com', 'Parth', 'Shrimali', 'parth', 1),
('kishan@gmail.com', 'kishan', 'thakor', 'b1634c02812896b87fff3d56f89e36af', 0),
('darhshan@gmail.com', 'darshan', 'shrimali', '406f84c0877f9574a5295bb8f4d0ee6f', 0),
('sanjay@gmail.com', 'sanjay', 'thakor', '5f1c5342818bf8c161d8ff4e18ff1720', 0),
('jimit@gmail.com', 'jimit', 'nayee', '45ef8838ed870ca2225fd045e007f645', 0),
('brijesh@Gmail.com', 'brijesh', 'vaishnav', '9db077197b5f4184cd9eb439086fbdef', 0),
('dwarkesh@gmail.com', 'dwarkesh', 'dhamecha', '091c8e364b3ab9c9ba65776e7b43c43b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `description`, `feedback_id`) VALUES
('Parth Shrimali', 'I have been using the News Management Project for a few weeks now, and I must say it\'s been a great experience. The user interface is intuitive and user-friendly, making it easy to manage and publish news articles. The article management features are robust, allowing me to create, edit, and publish articles effortlessly. The search functionality is also very useful, allowing me to quickly find specific articles based on keywords or category.\n\nI particularly appreciate the commenting system, which enables user interaction and engagement. The ability to moderate comments ensures that the discussions remain productive and respectful.\n\nOverall, I find the News Management Project to be a reliable and efficient solution for news organizations. It has significantly streamlined our news publishing process, saving us time and effort. I want to commend the development team for their excellent work in creating such a powerful and user-friendly system.\n\nThank you for this fantastic tool!\n\n', 3),
('Jimit Nayee', 'I have been using the News Management Project for a few weeks now, and I must say it\'s been a great experience. The user interface is intuitive and user-friendly, making it easy to manage and publish news articles. The article management features are robust, allowing me to create, edit, and publish articles effortlessly. The search functionality is also very useful, allowing me to quickly find specific articles based on keywords or category.\r\n\r\nI particularly appreciate the commenting system, which enables user interaction and engagement. The ability to moderate comments ensures that the discussions remain productive and respectful.\r\n\r\nOverall, I find the News Management Project to be a reliable and efficient solution for news organizations. It has significantly streamlined our news publishing process, saving us time and effort. I want to commend the development team for their excellent work in creating such a powerful and user-friendly system.\r\n\r\nThank you for this fantastic tool!\r\n\r\n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(400) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `news_desc` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `news_img` varchar(255) DEFAULT NULL,
  `viewCounter` int(11) DEFAULT 0,
  `postedBy` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `state` int(2) DEFAULT 1,
  `author_mail` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `CategoryId`, `SubCategoryId`, `news_desc`, `PostingDate`, `Is_Active`, `news_img`, `viewCounter`, `postedBy`, `status`, `state`, `author_mail`) VALUES
(21, 'title', 6, 7, '<p>description<br></p>', '2023-05-01 03:38:10', 0, '088f052c9a42b521b92190c297dc2ea4.JPG', 0, 'parth@gmail.com', 1, 16, 'kishanthakor@gmail.com'),
(22, 'Through Mann Ki Baat, Mass Movements Came Into Being\": PM In Episode 100 ', 6, 7, '<p>Mann Ki Baat\' is a reflection of \'Mann Ki Baat\' of crores of Indians, it\r\n is an expression of their feelings, the PM said in his opening remarks,\r\n thanking the people of the country for making it a huge success.&nbsp;\"Mann \r\nKi Baat has been a catalyst in igniting numerous mass movements, be it \r\n\'Har Ghar Tiranga\' or \'Catch the Rain\', Mann Ki Baat has enabled mass \r\nmovements to gain momentum,\" he said.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \"Mann Ki Baat has showcased stories of talented individuals across \r\ndiverse fields, from promoting Aatmanirbhar Bharat to Make in India and \r\nspace startups,\" the PM said, adding that it&nbsp;gave him a solution to \r\nconnect with the people and was not merely a programme but a spiritual \r\njourney for him. \"For me, \'Mann Ki Baat\' has been about worshiping the qualities of the countrymen,\"&nbsp;PM Modi said.<br>Mann Ki Baat was first aired on October 3, 2014, the year the BJP came \r\nto power after the United Progressive Alliance\'s 10-year rule, and PM \r\nModi took charge. BJP-ruled states have made elaborate arrangements to \r\ncelebrate the 100th episode of Mann Ki Baat. The party will telecast the\r\n Prime Minister\'s radio address at their offices and booths. The Tourism Ministry has announced \"100 days of action\" to mark the \r\n100th episode of Mann Ki Baat. The activities include a design challenge\r\n for entrepreneurs to develop substitutes for single-use plastic items. The BJP tweeted where all people can listen to today\'s \"historic\" Mann \r\nKi Baat. \"Prime Minister Narendra Modi\'s Mann Ki Baat is going global \r\nand hitting the century tomorrow. Don\'t forget to become witness to this\r\n historic airing as the PM directly connects with people all across the \r\nworld,\" the party said.<br><br></p>', '2023-05-01 04:05:33', 0, 'f8c2646af84a8c89cdda1ec9461f9a86.jpg', 1, 'parth@gmail.com', 1, 13, 'kishanthakor@gmail.com'),
(23, 'Title: Priyanka Gandhi, Arvind Kejriwal meet protesting wrestlers at Jantar Mantar, slam Centre for â€˜protectingâ€™ WFI chief', 6, 7, '<p>Gandhi, accompanied by Rajya Sabha MP Deepender Hooda, reached the venue in the morning and held a lengthy interaction with Malik and Phogat. Talking to the reporters, she accused the government of shielding Singh and said he is facing serious allegations and should be removed from the post. However, at the same time, she also said she does not have any expectations from the Prime Minister. She said the copy of the FIR filed Friday must be shared with the wrestlers as they do not know what sections of the Indian Penal Code have been applied. â€œWhen these girls win medals, all of us tweet. It is said that they are our countryâ€™s pride. All the leaders, including me, lavish praises on them but now when they are sitting on the road and seeking to be heard, saying they have been wronged, no one is ready to listen to them,â€ said Gandhi.<br><br>Demanding the ouster of Singh, she said, â€œTill he is in that post, he will continue to exert pressure and keep destroying peopleâ€™s career. If that person is there on a post through which he can destroy the careers of the wrestlers, harass them and exert pressure, then what is the meaning of the FIRs and the investigation.â€<br><br>â€œStrip him of his powers which had enabled him to do all this,â€ she said and asked, â€œI want to understand why the government is protecting him?â€<br><br>Gandhi further said the government should have protected the wrestlers. â€œThese girls, who have done so much for the country and their homes, you should save them. Instead, they (government) are saving this person (Singh). What does it say about our country if we cannot save our girls?â€ she asked.<br>Asked about Prime Minister Narendra Modi, she said, â€œHad the Prime Minister been concerned, then he would have at least called them and spoken to them. He had called them for tea when they won medals. So, call them (now), talk to them, they are our girls,â€ she said.<br><br>Asked about the oversight panel that investigated the allegations, the Congress general secretary said, â€œWe all know what committees are, they are meant to skirt the issue. Whenever there is exploitation of women, this government goes mute. It is an old story that FIRs are not registered and women have to run from pillar to post.â€<br><br>â€œThese girls are so brave and courageous and they are standing up and saying that we will not let this happen,â€ Gandhi said.<br></p>', '2023-05-01 04:14:06', 1, 'd3b07663f6c7d3305aabd04a675c343a.jpg', 3, 'parth@gmail.com', 1, 13, 'kishanthakor@gmail.com'),
(24, 'Himachal Pradesh & Delhi: With crucial changes at top, BJP looks to rebuild party ground up', 6, 7, '<p>Smarting from back-to-back electoral defeats in December 2022 â€” first in the prestigious municipal corporation elections of Delhi, a first in 15 years, and the Assembly elections in Himachal Pradesh â€” BJP national president Jagat Prakash Nadda finally swung into action last Sunday. Keeping the 2024 Lok Sabha elections in mind, he effected organisational changes that indicate he could be seeking to be in the driverâ€™s seat on party affairs in both the national capital as well as its British-era summer standby.<br><br>Not only was Suresh Kashyap was replaced as the president of the Himachal Pradesh BJP with Dr Rajeev Bindal, Himachal BJP general secretary (organisation) Pavan Rana and his Delhi counterpart Siddharthan swapped roles. <br>&nbsp; â€œWoh to koi vivad hi nahin tha, woh to koi baat hi nahin thi. Teen din mein hi sab saaf ho gaya tha (That was no controversy, it was nothing. It got clarified within three days),â€ Bindal told The Indian Express, speaking about the unsavoury incident, in which the accused was suspected to have links with Bindal. â€œHad there been any trace of truth in those allegations, my seniors would not have reposed faith in me again, nor would I have got a ticket for the last Assembly elections,â€ he said on Monday, a day after assuming charge.<br><br>Before this, Bindal quit as health minister in the Prem Kumar Dhumal government, and then as Assembly Speaker, to take up the post of state BJP president. A five-time MLA, he lost in the 2022 Assembly polls.<br><br>Party colleagues call him energetic, while he describes himself as â€œ65-plusâ€. â€œThe energy comes when we are clear about our goals and then work wholeheartedly to achieve them,â€ he says.<br><br>Soon after his appointment as state BJP chief, he attended back-to-back video conferences on Sunday â€” one on preparations for the 100th episode of PM Modiâ€™s Mann Ki Baat, the other for the Shimla municipal corporation elections. For Bindal, the biggest challenge will be to secure victory in all four Himachalâ€™s Lok Sabha seats in 2024.The immediate hurdle is the Shimla corporation polls on May 2, for which he claims outgoing state BJP president Suresh Kashyap, 52, has already done the groundwork. â€œKashyapji has formulated a good strategy and we are hopeful of putting up a good show,â€ says Bindal.<br><br>For Kashyap, the change in role is dayitva parivartan (change of responsibility). He claims he didnâ€™t resign from his post, merely requested that he be relieved of the responsibility. The Shimla MP stepped down as BJP state president on April 20.<br><br>In the other change, Pavan Rana has been brought back to Delhi, while Siddharthan moves to Shimla. Both are considered confidants of the BJP national president. The general secretary (organisation) is a party post unique to the BJP that links its state units with the RSS. Despite the recent defeats in their respective CVs, party insiders interpret the swapping of Rana and Siddharthan as a â€œforward-looking, rather than vengefulâ€ decision.<br><br><br></p>', '2023-05-01 04:32:54', 1, 'f8b0ab1d5c065ae2e3a18a39d5953212.jpg', 1, 'parth@gmail.com', 1, 8, 'kishanthakor@gmail.com'),
(25, ' Barkha Bisht On Divorce To Indraneil Sengupta: \"One Of The Toughest Decisions Of My Life\" ', 5, 6, '<p>&nbsp;Barkha Bisht On Divorce To Indraneil Sengupta: \"One Of The Toughest Decisions Of My Life\" <br><br></p>New Delhi:<br><br>Barkha Bisht and Indraneil Sengupta have been creating a buzz on the Internet ever since they started living separately two years ago. Now, we have learnt that their divorce is to come through. Barkha, in an interview with ETimes, confirmed that the couple is parting ways after 13 years of marriage: \"Yes, our divorce should come through soon.\" The actress added that it was one of the \"toughest decisions\" of her life. \"This has been one of the toughest decisions of my life,\" the actress added. Reports regarding trouble in their marriage first made the headlines in early 2021.<br><br>Barkha Bisht and Indraneil Sengupta met on the set of Pyaar Ke Do Naam and fell in love. They got married in March 2008 after dating for several years. The couple has an 11-year-old daughter Meira. The actress refused to reveal the reasons behind the split but shared that her daughter is her top priority.<br><br>Speaking about the professional front, Barkha Bisht said, \"I am a single mother and Meira is my priority. On the work front, I have been doing interesting projects in the OTT space. I am open to good projects in TV and films, too.\" Barkha Bisht made her acting debut in the Television industry with Kitni Mast Hai Zindagi and went on to do TV shows such as Kasautii Zindagii Kay, Pyaar Ke Do Naam: Ek Raadha, Ek Shyaam, Sajan Ghar Jaana Hai and Chandragupta Maurya, to name a few. <br><br>Barkha Bisht has also worked in movies such as Raajneeti, Goliyon Ki Raasleela Ram-Leela, PM Narendra Modi, Ami Shubhash Bolchi and more.', '2023-05-01 04:59:43', 1, 'e944df1d36e9b173f74a9d545da1d0eb.jpg', 12, 'parth@gmail.com', 1, 13, 'kishanthakor@gmail.com'),
(26, 'Centre Blocks 14 Mobile Messenger Apps In Big Crackdown On Terror Groups ', 11, 11, '<p>New Delhi:<br><br>In a big crackdown on terrorist activities, the Centre has banned 14 mobile messaging applications which were allegedly being used by terror groups, largely in Jammu and Kashmir, to communicate with their supporters and Over Ground Workers (OGW) and also receive instructions from Pakistan, sources said.<br><br>The banned apps include Crypviser, Enigma, Safeswiss, Wickrme, Mediafire, Briar, BChat, Nandbox, Conion, IMO, Element, Second Line, Zangi, and Threema.<br><br>The action was taken on the recommendation of security and intelligence agencies. A list of apps that pose a threat to national security and do not follow Indian laws was prepared, and the concerned ministry was informed of the request to ban them. These apps have been blocked under Section 69A of the Information Technology Act, 2000, the official added.<br>In official communications to higher-ups, the intelligence agencies informed that these apps are spreading terror propaganda in the Valley, ANI said.<br><br>\"Agencies keep track of channels used by Overground workers (OGWs) and terrorists to communicate among themselves. While tracking down one of the communication, agencies found that the mobile application does not have representatives in India, and it is difficult to track down activities happening on the app,\" an official told news agency ANI.<br></p>', '2023-05-01 05:08:27', 1, 'b950292f5fe84fd3dc60888f965f3fb2.jpg', 1, 'parth@gmail.com', 1, 12, 'kishanthakor@gmail.com'),
(27, 'New Parliament Inauguration LIVE Updates: PM Modi Says New Parliament Is Temple Of Democracy', 6, 7, '<p><b class=\"place_cont\">New Delhi: </b></p><p>Prime Minister Narendra Modi today inaugurated the <a href=\"https://www.ndtv.com/india-news/pm-to-inaugurate-new-parliament-today-amid-opposition-boycott-10-points-4072223\">new parliament building</a>\r\n and installed a historic sceptre â€˜Sengol\' near the Lok Sabha Speaker\'s \r\nchair. Speaking at the building for the first time, the PM said that the\r\n new Parliament is a temple of democracy. A puja and a multi-faith \r\nprayer were held on the occasion. He also unveiled a commemorative \r\nplaque for the new building. Lok Sabha Speaker Om Birla and Adheenam \r\nseers were present at the event. The seers handed over the â€˜Sengol\' to \r\nPM Modi who walked into the new Parliament building and installed it.</p><p><br></p><p><font style=\"font-weight:bold\">Parliament building inauguration: Focus now shifts to VP Enclave, new PMO, Common Central Secretariat</font><br></p><div>With\r\n the new Parliament building inaugurated, the focus now shifts to the \r\nconstruction of the Vice President Enclave, Common Central Secretariat \r\nbuildings, Defence Enclave, MPs\' chambers, and prime minister\'s new \r\nresidence and office.</div><div><br></div><div>The new parliament \r\nbuilding is the second project that has been completed. The first was \r\nthe redevelopment of Central Vista avenue stretching from Vijay Chowk to\r\n India Gate. The stretch which was earlier known as Rajpath has been \r\nrenamed Kartavya Path.</div><div><br></div><div>The plan for the \r\nredevelopment of the Central Vista -- the nation\'s power corridor -- \r\nincludes the new Parliament building that was inaugurated on Sunday. The\r\n Central Public Works Department (CPWD) under the Union Housing and \r\nUrban Affairs Ministry has been executing projects under the \r\nredevelopment plan.</div>', '2023-05-28 10:42:11', 1, 'f5153aa569bc801195911e465d68eddbjpeg', 1, 'parth@gmail.com', 1, 3, 'darshan@gmail.com'),
(28, 'Wrestlers detained, protest site cleared as cops crack down on march to new Parliament ', 6, 7, '<br><p><a title=\"India Today News Desk\" href=\"https://www.indiatoday.in/author/india-today-news-desk\"><b>By India Today News Desk</b></a>:\r\n Khap panchayats of various states, farmers and supporting wrestlers \r\nprotesting at Jantar Mantar, have announced a call for a â€˜mahila samman \r\nmahapanchayatâ€™ near the Parliament building on Sunday. The protesting \r\nwrestlers, who were marching towards the new Parliament building, were \r\ndetained at Jantar Mantar and barricades were also broken.</p><p></p>', '2023-05-29 06:20:41', 1, 'ad2b63f32f0e1d7bea329c0658ff0df6.gif', 3, 'parth@gmail.com', 1, 1, 'kishanthakor@gmail.com'),
(29, 'Wrestlers detained, protest site cleared as cops crack down on march to new Parliament ', 6, 7, '<br><p><a title=\"India Today News Desk\" href=\"https://www.indiatoday.in/author/india-today-news-desk\"><b>By India Today News Desk</b></a>:\r\n Khap panchayats of various states, farmers and supporting wrestlers \r\nprotesting at Jantar Mantar, have announced a call for a â€˜mahila samman \r\nmahapanchayatâ€™ near the Parliament building on Sunday. The protesting \r\nwrestlers, who were marching towards the new Parliament building, were \r\ndetained at Jantar Mantar and barricades were also broken.</p><p></p>', '2023-05-29 09:09:22', 0, 'ad2b63f32f0e1d7bea329c0658ff0df6.gif', 0, 'parth@gmail.com', 1, 1, 'kishanthakor@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `PageTitle`, `Description`) VALUES
(1, 'aboutus', 'About News Portal', '<p><span class=\"flex-grow flex-shrink-0\"><br></span></p><p>Welcome to News Portal, a comprehensive source of news. Our mission is to provide readers with timely, accurate, and reliable news coverage that empowers them to make informed decisions about their lives and the world around them.</p><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><p>At the heart of our news portal is a team of experienced journalists and reporters who are dedicated to upholding the highest standards of journalistic integrity. Our team is committed to delivering news stories that are accurate, impartial, and fair, and to providing in-depth analysis and expert commentary on current events.</p><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><p>We understand the importance of staying up-to-date in today\'s fast-paced world, and our user-friendly platform allows readers to easily browse stories by topic or region, and to receive notifications about breaking news stories as they happen. We also believe in the power of multimedia storytelling, and our portal features a range of photos, and other interactive content to provide a more immersive news experience.</p><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><p>Our commitment to quality journalism extends beyond just reporting the news. We also believe in the importance of engaging with our readers and building a strong sense of community. That\'s why we welcome feedback and comments from our readers, and strive to foster a respectful and open dialogue around the issues that matter most.</p><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><p>Thank you for choosing News Portal as your go-to source for news and information. We look forward to serving you and keeping you informed.<br></p><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><div class=\"flex justify-between lg:block\"><div class=\"text-gray-400 flex self-end lg:self-center justify-center mt-2 gap-2 md:gap-3 lg:gap-1 lg:absolute lg:top-0 lg:translate-x-full lg:right-0 lg:mt-0 lg:pl-2 visible\"></div></div><p><span class=\"flex-grow flex-shrink-0\"><br></span></p><div class=\"text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto\"><div class=\"w-[30px] flex flex-col relative items-end\"><br></div></div><p><span class=\"flex-grow flex-shrink-0\"><br></span><br></p>'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>Ahmedabad, India<br></p><p><b>Phone Number : </b>+91 -9265282311</p><p><b>Email -id : shrimaliparth1</b>@gmail.com</p>');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(0, 'Operator'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(2) UNSIGNED NOT NULL,
  `state_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(0, 'Andhra Pradesh'),
(1, 'Arunachal Pradesh'),
(2, 'Assam'),
(3, 'Bihar'),
(4, 'Chhattisgarh'),
(5, 'Goa'),
(6, 'Gujarat'),
(7, 'Haryana'),
(8, 'Himachal Pradesh'),
(9, 'Jharkhand'),
(10, 'Karnataka'),
(11, 'Kerala'),
(12, 'Madhya Pradesh'),
(13, 'Maharashtra'),
(14, 'Manipur'),
(15, 'Meghalaya'),
(16, 'Mizoram'),
(17, 'Nagaland'),
(18, 'Odisha'),
(19, 'Punjab'),
(20, 'Rajasthan'),
(21, 'Sikkim'),
(22, 'Tamil Nadu'),
(23, 'Telangana'),
(24, 'Tripura'),
(25, 'Uttar Pradesh'),
(26, 'Uttarakhand'),
(27, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', 0),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', 1),
(5, 3, 'Football', 'Football', 1),
(6, 5, 'Television', 'TeleVision', 1),
(7, 6, 'National', 'National', 1),
(8, 6, 'International', 'International', 1),
(9, 7, 'India', 'India', 1),
(10, 8, 'Vaccination', 'Vaccination', 1),
(11, 11, 'Cyber Security', 'Since most people are using internet today, the cyber security became most important thing now.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscription_id` int(11) NOT NULL,
  `subscription_date` date NOT NULL,
  `subscription_end_date` date NOT NULL,
  `subscribed_user_email` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscription_id`, `subscription_date`, `subscription_end_date`, `subscribed_user_email`) VALUES
(17, '2023-05-26', '2023-08-26', 'thakaryash52@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_history`
--

CREATE TABLE `subscription_history` (
  `id` int(11) NOT NULL,
  `subscriber_email` varchar(255) DEFAULT NULL,
  `subscription_start_date` date DEFAULT NULL,
  `subscription_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_duration` int(3) NOT NULL,
  `plan_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`plan_id`, `plan_duration`, `plan_price`) VALUES
(1, 1, 19),
(2, 3, 50),
(3, 6, 100),
(4, 12, 190);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(90) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `is_subscriber` int(11) NOT NULL,
  `password` varchar(90) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fname`, `lname`, `is_subscriber`, `password`, `verification_code`, `is_verified`) VALUES
('darshan@gmail.com', 'Darshan', 'Shrimali', 0, 'darshan', NULL, NULL),
('shrimaliparth1010@gmail.com', 'Parth', 'Shrimali', 0, 'parth', '4527', 1),
('shrimaliparth1@gmail.com', 'Parth', 'Shrimali', 0, 'parth', '7275', 0),
('thakaryash52@gmail.com', 'Thakar', 'Yash', 0, 'yash', '5290', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertise_id`),
  ADD KEY `fk_advertiser_mail` (`advertiser_mail`);

--
-- Indexes for table `advertiser`
--
ALTER TABLE `advertiser`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `advertise_plans`
--
ALTER TABLE `advertise_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD KEY `emp_role_id` (`emp_role_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postcatid` (`CategoryId`),
  ADD KEY `postsucatid` (`SubCategoryId`),
  ADD KEY `subadmin` (`postedBy`),
  ADD KEY `fk_news_author` (`author_mail`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `fk_subscriber_user_email` (`subscribed_user_email`);

--
-- Indexes for table `subscription_history`
--
ALTER TABLE `subscription_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `advertise_plans`
--
ALTER TABLE `advertise_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscription_history`
--
ALTER TABLE `subscription_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `fk_advertiser_mail` FOREIGN KEY (`advertiser_mail`) REFERENCES `advertiser` (`mail`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`emp_role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_author` FOREIGN KEY (`author_mail`) REFERENCES `author` (`mail`),
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `subcategory` (`SubCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `fk_subscriber_user_email` FOREIGN KEY (`subscribed_user_email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
