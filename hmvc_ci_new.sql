-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 09:44 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmvc_ci_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_loginstatus`
--

CREATE TABLE `admin_loginstatus` (
  `lid` int(20) NOT NULL,
  `adm_id` int(20) NOT NULL,
  `logindate` varchar(40) NOT NULL,
  `lastlogindate` varchar(40) NOT NULL,
  `Status` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_loginstatus`
--

INSERT INTO `admin_loginstatus` (`lid`, `adm_id`, `logindate`, `lastlogindate`, `Status`) VALUES
(1, 9, '2017-03-08 17:15:42 PM', '2017-03-08 11:41:37 AM', ''),
(2, 52, '2017-01-13 12:10:20 PM', '', ''),
(3, 11, '', '', ''),
(4, 12, '2017-09-27 08:40:53 AM', '2017-09-26 14:43:57 PM', ''),
(5, 13, '', '', ''),
(6, 14, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `setting_id` int(15) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `company_address1` text NOT NULL,
  `company_address2` text NOT NULL,
  `company_address3` text NOT NULL,
  `language` varchar(50) NOT NULL,
  `support_tel` varchar(25) NOT NULL,
  `contact_tel` varchar(25) NOT NULL,
  `Mobile` varchar(25) NOT NULL,
  `web_site_logo_large` varchar(255) NOT NULL,
  `web_site_logo_small` varchar(255) NOT NULL,
  `web_site_footer_logo` varchar(255) NOT NULL,
  `fab_icon` varchar(255) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `admin_index_page` varchar(255) NOT NULL,
  `gogle_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `pineinterest_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`setting_id`, `domain`, `support_email`, `website_name`, `company_name`, `contact_email`, `company_address1`, `company_address2`, `company_address3`, `language`, `support_tel`, `contact_tel`, `Mobile`, `web_site_logo_large`, `web_site_logo_small`, `web_site_footer_logo`, `fab_icon`, `Added_Date`, `Updated_Date`, `Status`, `admin_index_page`, `gogle_link`, `facebook_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `pineinterest_link`) VALUES
(1, 'http://localhost/onlinedeals2offer/', 'support@onlinedeals2offer.com.au', 'onlinedeals2offer', 'onlinedeals2offer', 'info@onlinedeals2offer.com.au', '', '', '', 'en', '', '', '', '1530613538-logo.png', '1530613538-logo.png', '1530613538-logo.png', '1530613538-logo.png', '', '2018-07-03 15:55:38 PM', 'Y', 'admin_desktop.php', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `adm_id` int(20) UNSIGNED NOT NULL,
  `adm_login_id` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_conpwd` varchar(255) NOT NULL,
  `Salt` varchar(30) NOT NULL,
  `adm_name` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `adm_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `adm_privi` text NOT NULL,
  `adm_email` varchar(200) NOT NULL,
  `adm_address` text NOT NULL,
  `adm_city` varchar(255) NOT NULL,
  `adm_state` varchar(255) NOT NULL,
  `adm_zipcode` varchar(255) NOT NULL,
  `adm_phone` varchar(200) NOT NULL,
  `status` enum('O','S') NOT NULL DEFAULT 'S',
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `logindate` varchar(30) NOT NULL,
  `lastlogindate` varchar(30) NOT NULL,
  `View` enum('Y','N') NOT NULL DEFAULT 'N',
  `Generate` enum('Y','N') NOT NULL DEFAULT 'N',
  `Edit` enum('Y','N') NOT NULL DEFAULT 'N',
  `Remove` enum('Y','N') NOT NULL DEFAULT 'N',
  `Role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`adm_id`, `adm_login_id`, `adm_password`, `adm_conpwd`, `Salt`, `adm_name`, `user_image`, `adm_status`, `adm_privi`, `adm_email`, `adm_address`, `adm_city`, `adm_state`, `adm_zipcode`, `adm_phone`, `status`, `Added_Date`, `Updated_Date`, `logindate`, `lastlogindate`, `View`, `Generate`, `Edit`, `Remove`, `Role`) VALUES
(12, 'admin', '$2y$10$qp8qDxXqIxeI6n3gDDCR6uP4d3q96icDV4Z7FQmEAWDEXoQ6ej9Ku', 'ON@lIn#3E@dE9l}S[O6)2', '44d9$A[z{1@Z)a', 'Adminstration', '1517997436-admin.png', 'Active', 'admin,Category List,change password,Cities,CMS,Company Details,Countries,FAQS,Manage Products,Modules,Reviews,States,User Queries', 'aaaa@gmail.com', 'test', 'test', 'test', '122022', '9911444456', 'O', '2017-03-08 17:28:41 PM', '2018-09-26 06:13:48 AM', '2018-07-04 10:42:25 AM', '2018-07-03 15:51:02 PM', 'Y', 'Y', 'Y', 'Y', ''),
(13, 'Test', '$2y$10$Z4mJ4bCcZxdvkRp6Y9gNSOrmqWW.xtBAapsF0saFHPKnfcGhkHmBi', 'BBBB@08061990', '', 'bhagabat behera', 'logo3.png', 'Active', 'admin,change password,Cities,CMS,Company Details,Countries,FAQS,Manage Products,Modules,Product Categories,Reviews,States,User Queries', 'bhagabat@gmail.com', 'ggggg', 'ggggggg', 'erftryt', 'ggggggggg', '03333333333', 'S', '2018-09-07 11:06:53 AM', '2018-09-07 14:22:00 PM', '', '', 'Y', 'Y', 'Y', 'Y', 'Admin Manger'),
(14, 'hfgj', '$2y$10$bkm2FTWM4pTgV7ba263O5eRcElu5tEvcVhSbPmx/B/vqfUw4kjTiW', 'aaaaaaaaaa', '', 'bhagabat behera', '1536322972-computer-optimizer.png', 'Active', 'admin,CMS,Company Details,FAQS,Modules,Product Categories,Reviews,States,User Queries', 'bhagabat@gmail.com', 'ggggg', 'ggggggg', 'hfghgjgjh', 'ggggggggg', '03333333333', 'S', '2018-09-07 11:23:16 AM', '2018-09-07 14:22:52 PM', '', '', 'Y', 'Y', 'N', 'N', 'Executive');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_master`
--

CREATE TABLE `enquiry_master` (
  `eid` int(5) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `msg` text NOT NULL,
  `status` int(1) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_master`
--

INSERT INTO `enquiry_master` (`eid`, `uname`, `email`, `phone`, `subject`, `msg`, `status`, `date`) VALUES
(2, 'sagar', 'sagarswtboy@gmail.com', '3242342', 'asd', 'asdadsaMessage', 1, '14-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `front_banner`
--

CREATE TABLE `front_banner` (
  `bid` bigint(20) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_subtitle` varchar(255) NOT NULL,
  `banner_description` text NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `sortorder` float(10,2) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `front_blog`
--

CREATE TABLE `front_blog` (
  `blg_id` bigint(25) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `postedBy` varchar(80) NOT NULL,
  `postedBy_img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Tags` varchar(255) NOT NULL,
  `featured_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_blog`
--

INSERT INTO `front_blog` (`blg_id`, `subject`, `postedBy`, `postedBy_img`, `description`, `Added_Date`, `Updated_Date`, `Status`, `Tags`, `featured_img`) VALUES
(11, 'Expertise You Require To Be At Top In SEO Work', 'Administrator', '', '&lt;div&gt;If you&amp;rsquo;re keen to go in the career of SEO, or you&amp;rsquo;re at present an SEO expert looking to enhance your skills, it&amp;rsquo;s beneficial to take a logical glance at the expertise most crucial to grow to be a better marketer and discover ways to enhance them in yourself.&lt;/div&gt;\r\n&lt;div&gt;Clearly, there are several factors that decide the efficiency of an &lt;strong&gt;SEO approach&lt;/strong&gt;, however at the heart of each approach are as a minimum one individual taking the necessary actions. This individual will be the team lead of all members, setting goals, doing proper research and finishing a series of diverse tasks; however without the correct expertise to support these duties, your whole &lt;strong&gt;SEO approach&lt;/strong&gt; could crumble.&lt;br /&gt;&lt;a title=&quot;SEO Services India&quot; href=&quot;http://www.megicbytesolutions.com/seo-services&quot;&gt;&lt;img src=&quot;http://www.megicbytesolutions.com/uploaded_files/home/Best%20SEO%20Company%20in%20India.jpg&quot; border=&quot;0&quot; width=&quot;800&quot; height=&quot;445&quot; /&gt;&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;So what are the most vital skills you&amp;rsquo;ll be employing in SEO?&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;1. Research&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;The most important skill is research and you&amp;rsquo;ll be doing a lot of it. Doing research for an SEO campaign often begins with a basic keyword and competitor analysis that offers the insights required to create the strategic groundwork for your campaign. But SEO needs far more research than that; you&amp;rsquo;ll also require reading up the latest changes about search engine optimization technology.&lt;/div&gt;\r\n&lt;div&gt;Next, you&amp;rsquo;ll require running experiments to check how your tricks affect your search rankings as well as user perceptions. You&amp;rsquo;ll even require looking up answers to your issues when you without doubt run into challenges. The quicker and more efficiently you research, the better is that.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;2. Analysis&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;One of the most important skills is analysis, an idea that is beneficial to a series of SEO areas. What an individualrequires as an &lt;strong&gt;SEO expert&lt;/strong&gt; is the skill to know all informationtake data about what, when, who, and where, and know the &amp;ldquo;how&amp;rdquo; and &amp;ldquo;why&amp;rdquo; queriesthat always comes in front of you.&lt;/div&gt;\r\n&lt;div&gt;For instance, you&amp;rsquo;ll have to observe details on pure traffic boosts and reveal which of your skills were liable for that raise. You&amp;rsquo;ll have to look at low ranking, and check down the major reasons for that problem. You&amp;rsquo;ll have to analyze information on hundreds of keywords to know the top direction for your SEO approach, and you&amp;rsquo;ll have to check out which part of website content best connect with your target viewers and why.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;3. Basics of Coding &lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;You don&amp;rsquo;t have to be an expert programmer to be thriving person in SEO. Today&amp;rsquo;s CMS platform mostly include basic &lt;strong&gt;SEO operations&lt;/strong&gt; included, and if the necessity occurs, you can readthe instructions line by line online if you require making changes to your website backend.&lt;/div&gt;\r\n&lt;div&gt;Still, it offers some knowledge with coding; you must be capableof check the source code of aparticular website and see the important qualities required to your SEO approach&lt;strong&gt;. &lt;/strong&gt;You should also be capable to make changes easily without slowing down your website.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;4. Communication&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;The significance of meeting in an &lt;strong&gt;SEO &lt;/strong&gt;atmosphere can&amp;rsquo;t be understated. You&amp;rsquo;ll require meeting actively with your other team executivesto make sure your orders are performed properly. You&amp;rsquo;ll require explaining intricate instructions to your customers, who may or may not have technical expertise in the issue.&lt;/div&gt;\r\n&lt;div&gt;You&amp;rsquo;ll also require producing unique content that your target readers can connect with. All these servicesneed amazing meeting skills; without them, you&amp;rsquo;ll have a difficult time staying competitive.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;5. Humbleness&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;After a few years on the SEO job, SEO experts may seem that they&amp;rsquo;ve learned everything and that they&amp;rsquo;re the best experts in the &lt;strong&gt;SEO business&lt;/strong&gt;. But SEO field is a full of surprises; just because you seems you know something doesn&amp;rsquo;t mean that&#039;s fully true for all customers, or that things won&amp;rsquo;t change in a few days.&lt;/div&gt;\r\n&lt;div&gt;Staying modest opens you up to new possibilities, and helps you fix problems faster, particularly when you&amp;rsquo;re leading a team.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;6. Persistence &lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;Persistence isn&amp;rsquo;t really a talent; however it is a quality you&amp;rsquo;ll require if you wish for a successful search engine marketer.&lt;strong&gt; SEO&lt;/strong&gt; can be a competitive method at times: Your theories will be reversed, your hard work will sometimes be unproductive, and you might countenance disapproval from your customers. Being capable to persist past those low jiffies, and find meticulous solutions to your issues no issue what, is important if you&amp;rsquo;re going to do well.&lt;/div&gt;\r\n&lt;div&gt;If you presently don&amp;rsquo;t have these techniques, or there&amp;rsquo;s any one technique you see the requirement to improve, there&amp;rsquo;s always specific time to build yourself an improved one for your selected career path.These significant initial techniqueswill help you in the whole thing from keyword research and campaign planning, to reporting analysis, so enhancing even one of them could increase your efficiency in several areas at the same time. The more you devote in yourself, the more you&amp;rsquo;ll be able to do to accomplish your goals.&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;Megicbytesolutions &lt;/strong&gt;is a renowned company that is cheap and reliable to avail the &lt;strong&gt;SEO Services&lt;/strong&gt; from. We have hired experienced technicians, website designers as well as the experts that are proficient enough to perform SEO services and &lt;strong&gt;design responsive website&lt;/strong&gt;. Simply contact us and avail the reliable outsources web design facility. Many customers are new to their business and are getting good reaction from the website we have designed for them. Their business has increased and user base has also increased.&amp;nbsp;&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div&gt;If you are searching for the top class &lt;strong&gt;SEO Services&lt;/strong&gt;, and then your wait is over. We are a renowned &lt;a title=&quot;Best SEO Company in India&quot; href=&quot;http://www.megicbytesolutions.com/seo-services&quot;&gt;&lt;strong&gt;SEO Company in India&lt;/strong&gt;&lt;/a&gt;. The fee of our service is within the budget of every client. We are popular all over India for Professional as well as Affordable Search Engine Optimization. Call our support number for immediate assistance regarding the plan.&amp;nbsp; We assure that our customer website reaches to top ranks in the popular search engine and its online presence is also increased. The deadline of every task is provided from our experts. We are committed to our Affordable&lt;strong&gt; SEO Services&lt;/strong&gt; and don&amp;rsquo;t let the customer to lose its faith in our service.&amp;nbsp;&amp;nbsp;&lt;/div&gt;', '2018-03-20', '', 'Y', 'Seo Online Marketing, Seo Company India, Seo Services India, Seo Link Building Services, Local Search Engine Optimization, Best Seo Company In India, Professional Search Engine Optimization, Affordable Search Engine Optimization, Seo Reseller Packages, Se', '');

-- --------------------------------------------------------

--
-- Table structure for table `front_cart`
--

CREATE TABLE `front_cart` (
  `cart_id` bigint(25) NOT NULL,
  `ProductID` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_cart`
--

INSERT INTO `front_cart` (`cart_id`, `ProductID`, `qty`, `Added_Date`, `Updated_Date`, `session_id`, `ip`, `browser`, `Status`) VALUES
(56, 48, 1, '2018-02-06 09:46:49 AM', '', 'mjnav0gq3hhoovd3287ajm4hu6', '69.12.70.122', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 'Y'),
(53, 5, 54, '2018-01-24 09:43:12 AM', '2018-01-24 09:44:24 AM', '1u98h1nbt3l8m36msmpcidvt47', '110.172.142.162', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 'Y'),
(54, 2, 1, '2018-01-24 09:44:31 AM', '', '1u98h1nbt3l8m36msmpcidvt47', '182.156.72.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 'Y'),
(55, 2, 1, '2018-01-24 09:45:45 AM', '', '1u98h1nbt3l8m36msmpcidvt47', '110.172.142.162', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 'Y'),
(79, 12, 1, '2018-07-04 17:48:56 PM', '', '11vgm2kta69s6gkj26ilc41m95', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `front_categories`
--

CREATE TABLE `front_categories` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `IsTopNav` enum('Y','N') NOT NULL DEFAULT 'N',
  `IsFooter` enum('Y','N') NOT NULL DEFAULT 'N',
  `parent_category_id` bigint(20) NOT NULL,
  `SortOrder` int(11) NOT NULL,
  `catname_short` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `CompanyInFooter` enum('Y','N') NOT NULL DEFAULT 'N',
  `SupportInFooter` enum('Y','N') NOT NULL DEFAULT 'N',
  `MyAcInFooter` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `front_categories`
--

INSERT INTO `front_categories` (`category_id`, `category_name`, `url`, `IsTopNav`, `IsFooter`, `parent_category_id`, `SortOrder`, `catname_short`, `Status`, `Added_Date`, `Updated_Date`, `CompanyInFooter`, `SupportInFooter`, `MyAcInFooter`) VALUES
(1, 'Electronics', '', 'N', 'N', 0, 1, 'Electronics', 'Y', '2018-11-20 15:07:05 PM', '', 'N', 'N', 'N'),
(2, 'Laptops', '', 'N', 'N', 1, 2, 'Laptops', 'Y', '2018-11-20 15:07:53 PM', '', 'N', 'N', 'N'),
(3, 'Desktop', '', 'N', 'N', 1, 3, 'Desktop', 'Y', '2018-11-20 15:08:38 PM', '2018-11-20 15:09:12 PM', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `front_city`
--

CREATE TABLE `front_city` (
  `city_id` int(20) NOT NULL,
  `country_id` int(20) NOT NULL,
  `StatesID` int(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL,
  `Sortorder` int(11) NOT NULL,
  `district_id` int(9) NOT NULL,
  `MetaTitle` text NOT NULL,
  `MetaDescription` text NOT NULL,
  `MetaKeyword` text NOT NULL,
  `IsViewHome` enum('Y','N') NOT NULL DEFAULT 'N',
  `CityJobDesc` longtext NOT NULL,
  `CityConsultentDesc` longtext NOT NULL,
  `CityEducation` longtext NOT NULL,
  `ShortCityJobDesc` text NOT NULL,
  `cityshort` varchar(255) NOT NULL,
  `IsLeftMenu` enum('N','Y') NOT NULL,
  `Courier` float(10,2) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `employer_id` bigint(25) NOT NULL COMMENT 'city_created_by',
  `employees_id` bigint(25) NOT NULL COMMENT 'city_created_by'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_city`
--

INSERT INTO `front_city` (`city_id`, `country_id`, `StatesID`, `city`, `Status`, `Sortorder`, `district_id`, `MetaTitle`, `MetaDescription`, `MetaKeyword`, `IsViewHome`, `CityJobDesc`, `CityConsultentDesc`, `CityEducation`, `ShortCityJobDesc`, `cityshort`, `IsLeftMenu`, `Courier`, `Added_Date`, `Updated_Date`, `employer_id`, `employees_id`) VALUES
(90, 99, 98, 'Dehli/NCR', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Dehli/NCR', '', 0.00, '2018-04-09 13:51:56 PM', '', 0, 0),
(63, 99, 64, 'Karnal', 'Y', 0, 0, '', '', '', '', '', '', '', '', '', '', 60.00, '', '', 0, 0),
(65, 99, 98, 'Hyderabad', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Hyderabad', '', 0.00, '2018-03-30 16:10:48 PM', '2018-04-09 11:57:18 AM', 0, 0),
(66, 99, 86, 'Bhubaneswar', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Bssr', '', 0.00, '2018-03-30 16:12:39 PM', '2018-04-02 10:46:14 AM', 0, 0),
(67, 99, 98, 'Gurgaon', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'ggn', '', 0.00, '2018-04-02 09:16:40 AM', '2018-04-02 09:19:56 AM', 0, 0),
(70, 99, 98, 'Faridabad', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Faridabad', '', 0.00, '2018-04-02 10:10:43 AM', '2018-04-02 10:15:17 AM', 0, 0),
(71, 99, 98, 'Bangalore/Bengaluru', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Bangalore/Bengaluru', '', 0.00, '2018-04-02 10:18:49 AM', '2018-04-02 10:34:45 AM', 0, 0),
(72, 99, 79, 'Mayesore', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Mayesore', '', 0.00, '2018-04-02 10:35:57 AM', '2018-04-09 11:49:43 AM', 0, 0),
(73, 99, 98, 'Chandigarh ', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Chandigarh ', '', 0.00, '2018-04-02 10:37:56 AM', '', 0, 0),
(74, 99, 98, 'Dehli', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Dehli', '', 0.00, '2018-04-02 10:39:45 AM', '', 0, 0),
(75, 99, 98, 'Noida', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Noida', '', 0.00, '2018-04-02 10:40:37 AM', '', 0, 0),
(76, 99, 98, 'Chennai ', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Chennai ', '', 0.00, '2018-04-02 10:41:36 AM', '', 0, 0),
(78, 99, 98, 'Pune', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Pune', '', 0.00, '2018-04-02 10:42:26 AM', '', 0, 0),
(80, 99, 98, 'Kolkata', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Kolkata', '', 0.00, '2018-04-02 10:44:29 AM', '', 0, 0),
(81, 99, 90, 'Kharagpur', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Kharagpur', '', 0.00, '2018-04-02 10:44:52 AM', '2018-04-09 11:46:20 AM', 0, 0),
(89, 99, 98, 'Mumbai', 'Y', 0, 0, '', '', '', '', '', '', '', '', 'Mumbai', '', 0.00, '2018-04-09 11:58:15 AM', '', 0, 0),
(82, 222, 0, 'London', 'Y', 0, 0, '', '', '', 'N', '', '', '', '', '', 'N', 0.00, '2018-04-06 11:38:26 AM', '', 0, 36),
(83, 222, 0, 'Wales', 'Y', 0, 0, '', '', '', 'N', '', '', '', '', '', 'N', 0.00, '2018-04-06 12:38:19 PM', '', 0, 36),
(85, 222, 0, 'Birmingham', 'Y', 0, 0, '', '', '', 'N', '', '', '', '', '', 'N', 0.00, '2018-04-06 13:21:42 PM', '', 0, 36),
(87, 222, 0, 'Bradford', 'Y', 0, 0, '', '', '', 'N', '', '', '', '', '', 'N', 0.00, '2018-04-06 15:32:09 PM', '', 0, 36),
(88, 223, 0, 'New York', 'Y', 0, 0, '', '', '', 'N', '', '', '', '', '', 'N', 0.00, '2018-04-06 16:48:41 PM', '', 0, 36);

-- --------------------------------------------------------

--
-- Table structure for table `front_cms`
--

CREATE TABLE `front_cms` (
  `cmsid` int(11) NOT NULL,
  `category_id` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `page_title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `SEOKeyword` varchar(255) NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaDescription` text NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Updated_Date` varchar(40) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `CMS_Editor_Type` enum('WYSIWYG','Custom') NOT NULL DEFAULT 'WYSIWYG',
  `LeftSideBar` enum('Y','N') NOT NULL DEFAULT 'N',
  `RightSideBar` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `front_cms`
--

INSERT INTO `front_cms` (`cmsid`, `category_id`, `page_title`, `Description`, `SEOKeyword`, `MetaTitle`, `MetaDescription`, `Status`, `Updated_Date`, `Added_Date`, `CMS_Editor_Type`, `LeftSideBar`, `RightSideBar`) VALUES
(1, 0, 'Home', 'Home', 'Home', 'Home', 'Home', 'Y', '', '', 'WYSIWYG', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `front_country`
--

CREATE TABLE `front_country` (
  `country_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT '',
  `country_iso_code` char(2) NOT NULL DEFAULT '',
  `Sortorder` int(11) NOT NULL DEFAULT '0',
  `Status` enum('Y','N') NOT NULL DEFAULT 'N',
  `Added_Date` varchar(30) NOT NULL,
  `Updated_Date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_country`
--

INSERT INTO `front_country` (`country_id`, `country`, `country_iso_code`, `Sortorder`, `Status`, `Added_Date`, `Updated_Date`) VALUES
(1, 'Afghanistan', 'AF', 2, 'Y', '', '2018-03-30 16:31:45 PM'),
(2, 'Albania', 'AL', 2, 'Y', '', ''),
(3, 'Algeria', 'DZ', 2, 'Y', '', ''),
(4, 'American Samoa', 'AS', 2, 'Y', '', ''),
(5, 'Andorra', 'AD', 2, 'Y', '', ''),
(6, 'Angola', 'AO', 2, 'Y', '', ''),
(7, 'Anguilla', 'AI', 2, 'Y', '', ''),
(8, 'Antarctica', 'AQ', 2, 'Y', '', ''),
(9, 'Antigua and Barbuda', 'AG', 2, 'Y', '', ''),
(10, 'Argentina', 'AR', 2, 'Y', '', ''),
(11, 'Armenia', 'AM', 2, 'Y', '', ''),
(12, 'Aruba', 'AW', 2, 'Y', '', ''),
(13, 'Australia', 'AU', 2, 'Y', '', ''),
(14, 'Austria', 'AT', 2, 'Y', '', ''),
(15, 'Azerbaijan', 'AZ', 2, 'Y', '', ''),
(16, 'Bahamas', 'BS', 2, 'Y', '', ''),
(17, 'Bahrain', 'BH', 2, 'Y', '', ''),
(18, 'Bangladesh', 'BD', 2, 'Y', '', ''),
(19, 'Barbados', 'BB', 2, 'Y', '', ''),
(20, 'Belarus', 'BY', 2, 'Y', '', ''),
(21, 'Belgium', 'BE', 2, 'Y', '', ''),
(22, 'Belize', 'BZ', 2, 'Y', '', ''),
(23, 'Benin', 'BJ', 2, 'Y', '', ''),
(24, 'Bermuda', 'BM', 2, 'Y', '', ''),
(25, 'Bhutan', 'BT', 2, 'Y', '', ''),
(26, 'Bolivia', 'BO', 2, 'Y', '', ''),
(27, 'Bosnia and Herzegowina', 'BA', 2, 'Y', '', ''),
(28, 'Botswana', 'BW', 2, 'Y', '', ''),
(29, 'Bouvet Island', 'BV', 2, 'Y', '', ''),
(30, 'Brazil', 'BR', 2, 'Y', '', ''),
(31, 'British Indian Ocean Territory', 'IO', 2, 'Y', '', ''),
(32, 'Brunei Darussalam', 'BN', 2, 'Y', '', ''),
(33, 'Bulgaria', 'BG', 2, 'Y', '', ''),
(34, 'Burkina Faso', 'BF', 2, 'Y', '', ''),
(35, 'Burundi', 'BI', 2, 'Y', '', ''),
(36, 'Cambodia', 'KH', 2, 'Y', '', ''),
(37, 'Cameroon', 'CM', 2, 'Y', '', ''),
(38, 'Canada', 'CA', 1, 'Y', '', ''),
(39, 'Cape Verde', 'CV', 2, 'Y', '', ''),
(40, 'Cayman Islands', 'KY', 2, 'Y', '', ''),
(41, 'Central African Republic', 'CF', 2, 'Y', '', ''),
(42, 'Chad', 'TD', 2, 'Y', '', ''),
(43, 'Chile', 'CL', 2, 'Y', '', ''),
(44, 'China', 'CN', 2, 'Y', '', ''),
(45, 'Christmas Island', 'CX', 2, 'Y', '', ''),
(46, 'Cocos (Keeling) Islands', 'CC', 2, 'Y', '', ''),
(47, 'Colombia', 'CO', 2, 'Y', '', ''),
(48, 'Comoros', 'KM', 2, 'Y', '', ''),
(49, 'Congo', 'CG', 2, 'Y', '', ''),
(50, 'Cook Islands', 'CK', 2, 'Y', '', ''),
(51, 'Costa Rica', 'CR', 2, 'Y', '', ''),
(52, 'Cote D\'Ivoire', 'CI', 2, 'Y', '', ''),
(53, 'Croatia', 'HR', 2, 'Y', '', ''),
(54, 'Cuba', 'CU', 2, 'Y', '', ''),
(55, 'Cyprus', 'CY', 2, 'Y', '', ''),
(56, 'Czech Republic', 'CZ', 2, 'Y', '', ''),
(57, 'Denmark', 'DK', 2, 'Y', '', ''),
(58, 'Djibouti', 'DJ', 2, 'Y', '', ''),
(59, 'Dominica', 'DM', 2, 'Y', '', ''),
(60, 'Dominican Republic', 'DO', 2, 'Y', '', ''),
(61, 'East Timor', 'TP', 2, 'Y', '', ''),
(62, 'Ecuador', 'EC', 2, 'Y', '', ''),
(63, 'Egypt', 'EG', 2, 'Y', '', ''),
(64, 'El Salvador', 'SV', 2, 'Y', '', ''),
(65, 'Equatorial Guinea', 'GQ', 2, 'Y', '', ''),
(66, 'Eritrea', 'ER', 2, 'Y', '', ''),
(67, 'Estonia', 'EE', 2, 'Y', '', ''),
(68, 'Ethiopia', 'ET', 2, 'Y', '', ''),
(69, 'Falkland Islands (Malvinas)', 'FK', 2, 'Y', '', ''),
(70, 'Faroe Islands', 'FO', 2, 'Y', '', ''),
(71, 'Fiji', 'FJ', 2, 'Y', '', ''),
(72, 'Finland', 'FI', 2, 'Y', '', ''),
(73, 'France', 'FR', 2, 'Y', '', ''),
(74, 'France, Metropolitan', 'FX', 2, 'Y', '', ''),
(75, 'French Guiana', 'GF', 2, 'Y', '', ''),
(76, 'French Polynesia', 'PF', 2, 'Y', '', ''),
(77, 'French Southern Territories', 'TF', 2, 'Y', '', ''),
(78, 'Gabon', 'GA', 2, 'Y', '', ''),
(79, 'Gambia', 'GM', 2, 'Y', '', ''),
(80, 'Georgia', 'GE', 2, 'Y', '', ''),
(81, 'Germany', 'DE', 2, 'Y', '', ''),
(82, 'Ghana', 'GH', 2, 'Y', '', ''),
(83, 'Gibraltar', 'GI', 2, 'Y', '', ''),
(84, 'Greece', 'GR', 2, 'Y', '', ''),
(85, 'Greenland', 'GL', 2, 'Y', '', ''),
(86, 'Grenada', 'GD', 2, 'Y', '', ''),
(87, 'Guadeloupe', 'GP', 2, 'Y', '', ''),
(88, 'Guam', 'GU', 2, 'Y', '', ''),
(89, 'Guatemala', 'GT', 2, 'Y', '', ''),
(90, 'Guinea', 'GN', 2, 'Y', '', ''),
(91, 'Guinea-bissau', 'GW', 2, 'Y', '', ''),
(92, 'Guyana', 'GY', 2, 'Y', '', ''),
(93, 'Haiti', 'HT', 2, 'Y', '', ''),
(94, 'Heard and Mc Donald Islands', 'HM', 2, 'Y', '', ''),
(95, 'Honduras', 'HN', 2, 'Y', '', ''),
(96, 'Hong Kong', 'HK', 2, 'Y', '', ''),
(97, 'Hungary', 'HU', 2, 'Y', '', ''),
(98, 'Iceland', 'IS', 2, 'Y', '', ''),
(99, 'India', 'IN', 2, 'Y', '', ''),
(100, 'Indonesia', 'ID', 2, 'Y', '', ''),
(101, 'Iran (Islamic Republic of)', 'IR', 2, 'Y', '', ''),
(102, 'Iraq', 'IQ', 2, 'Y', '', ''),
(103, 'Ireland', 'IE', 2, 'Y', '', ''),
(104, 'Israel', 'IL', 2, 'Y', '', ''),
(105, 'Italy', 'IT', 2, 'Y', '', ''),
(106, 'Jamaica', 'JM', 2, 'Y', '', ''),
(107, 'Japan', 'JP', 2, 'Y', '', ''),
(108, 'Jordan', 'JO', 2, 'Y', '', ''),
(109, 'Kazakhstan', 'KZ', 2, 'Y', '', ''),
(110, 'Kenya', 'KE', 2, 'Y', '', ''),
(111, 'Kiribati', 'KI', 2, 'Y', '', ''),
(112, 'Korea', 'KP', 2, 'Y', '', ''),
(113, 'Korea, Republic of', 'KR', 2, 'Y', '', ''),
(114, 'Kuwait', 'KW', 2, 'Y', '', ''),
(115, 'Kyrgyzstan', 'KG', 2, 'Y', '', ''),
(116, 'Lao People\'s ', 'LA', 2, 'Y', '', ''),
(117, 'Latvia', 'LV', 2, 'Y', '', ''),
(118, 'Lebanon', 'LB', 2, 'Y', '', ''),
(119, 'Lesotho', 'LS', 2, 'Y', '', ''),
(120, 'Liberia', 'LR', 2, 'Y', '', ''),
(121, 'Libyan Arab Jamahiriya', 'LY', 2, 'Y', '', ''),
(122, 'Liechtenstein', 'LI', 2, 'Y', '', ''),
(123, 'Lithuania', 'LT', 2, 'Y', '', ''),
(124, 'Luxembourg', 'LU', 2, 'Y', '', ''),
(125, 'Macau', 'MO', 2, 'Y', '', ''),
(126, 'Macedonia', 'MK', 2, 'Y', '', ''),
(127, 'Madagascar', 'MG', 2, 'Y', '', ''),
(128, 'Malawi', 'MW', 2, 'Y', '', ''),
(129, 'Malaysia', 'MY', 2, 'Y', '', ''),
(130, 'Maldives', 'MV', 2, 'Y', '', ''),
(131, 'Mali', 'ML', 2, 'Y', '', ''),
(132, 'Malta', 'MT', 2, 'Y', '', ''),
(133, 'Marshall Islands', 'MH', 2, 'Y', '', ''),
(134, 'Martinique', 'MQ', 2, 'Y', '', ''),
(135, 'Mauritania', 'MR', 2, 'Y', '', ''),
(136, 'Mauritius', 'MU', 2, 'Y', '', ''),
(137, 'Mayotte', 'YT', 2, 'Y', '', ''),
(138, 'Mexico', 'MX', 2, 'Y', '', ''),
(139, 'Micronesia', 'FM', 2, 'Y', '', ''),
(140, 'Moldova', 'MD', 2, 'Y', '', ''),
(141, 'Monaco', 'MC', 2, 'Y', '', ''),
(142, 'Mongolia', 'MN', 2, 'Y', '', ''),
(143, 'Montserrat', 'MS', 2, 'Y', '', ''),
(144, 'Morocco', 'MA', 2, 'Y', '', ''),
(145, 'Mozambique', 'MZ', 2, 'Y', '', ''),
(146, 'Myanmar', 'MM', 2, 'Y', '', ''),
(147, 'Namibia', 'NA', 2, 'Y', '', ''),
(148, 'Nauru', 'NR', 2, 'Y', '', ''),
(149, 'Nepal', 'NP', 2, 'Y', '', ''),
(150, 'Netherlands', 'NL', 2, 'Y', '', ''),
(151, 'Netherlands Antilles', 'AN', 2, 'Y', '', ''),
(152, 'New Caledonia', 'NC', 2, 'Y', '', ''),
(153, 'New Zealand', 'NZ', 2, 'Y', '', ''),
(154, 'Nicaragua', 'NI', 2, 'Y', '', ''),
(155, 'Niger', 'NE', 2, 'Y', '', ''),
(156, 'Nigeria', 'NG', 2, 'Y', '', ''),
(157, 'Niue', 'NU', 2, 'Y', '', ''),
(158, 'Norfolk Island', 'NF', 2, 'Y', '', ''),
(159, 'Northern Mariana Islands', 'MP', 2, 'Y', '', ''),
(160, 'Norway', 'NO', 2, 'Y', '', ''),
(161, 'Oman', 'OM', 2, 'Y', '', ''),
(162, 'Pakistan', 'PK', 2, 'Y', '', ''),
(163, 'Palau', 'PW', 2, 'Y', '', ''),
(164, 'Panama', 'PA', 2, 'Y', '', ''),
(165, 'Papua New Guinea', 'PG', 2, 'Y', '', ''),
(166, 'Paraguay', 'PY', 2, 'Y', '', ''),
(167, 'Peru', 'PE', 2, 'Y', '', ''),
(168, 'Philippines', 'PH', 2, 'Y', '', ''),
(169, 'Pitcairn', 'PN', 2, 'Y', '', ''),
(170, 'Poland', 'PL', 2, 'Y', '', ''),
(171, 'Portugal', 'PT', 2, 'Y', '', ''),
(172, 'Puerto Rico', 'PR', 2, 'Y', '', ''),
(173, 'Qatar', 'QA', 2, 'Y', '', ''),
(174, 'Reunion', 'RE', 2, 'Y', '', ''),
(175, 'Romania', 'RO', 2, 'Y', '', ''),
(176, 'Russian Federation', 'RU', 2, 'Y', '', ''),
(177, 'Rwanda', 'RW', 2, 'Y', '', ''),
(178, 'Saint Kitts and Nevis', 'KN', 2, 'Y', '', ''),
(179, 'Saint Lucia', 'LC', 2, 'Y', '', ''),
(180, 'Saint Vincent', 'VC', 2, 'Y', '', ''),
(181, 'Samoa', 'WS', 2, 'Y', '', ''),
(182, 'San Marino', 'SM', 2, 'Y', '', ''),
(183, 'Sao Tome and Principe', 'ST', 2, 'Y', '', ''),
(184, 'Saudi Arabia', 'SA', 2, 'Y', '', ''),
(185, 'Senegal', 'SN', 2, 'Y', '', ''),
(186, 'Seychelles', 'SC', 2, 'Y', '', ''),
(187, 'Sierra Leone', 'SL', 2, 'Y', '', ''),
(188, 'Singapore', 'SG', 2, 'Y', '', ''),
(189, 'Slovakia (Slovak Republic)', 'SK', 2, 'Y', '', ''),
(190, 'Slovenia', 'SI', 2, 'Y', '', ''),
(191, 'Solomon Islands', 'SB', 2, 'Y', '', ''),
(192, 'Somalia', 'SO', 2, 'Y', '', ''),
(193, 'South Africa', 'ZA', 2, 'Y', '', ''),
(194, 'South Georgia', 'GS', 2, 'Y', '', ''),
(195, 'Spain', 'ES', 2, 'Y', '', ''),
(196, 'Sri Lanka', 'LK', 2, 'Y', '', ''),
(197, 'St. Helena', 'SH', 2, 'Y', '', ''),
(198, 'St. Pierre and Miquelon', 'PM', 2, 'Y', '', ''),
(199, 'Sudan', 'SD', 2, 'Y', '', ''),
(200, 'Suriname', 'SR', 2, 'Y', '', ''),
(201, 'Svalbard ', 'SJ', 2, 'Y', '', ''),
(202, 'Swaziland', 'SZ', 2, 'Y', '', ''),
(203, 'Sweden', 'SE', 2, 'Y', '', ''),
(204, 'Switzerland', 'CH', 2, 'Y', '', ''),
(205, 'Syrian Arab Republic', 'SY', 2, 'Y', '', ''),
(206, 'Taiwan', 'TW', 2, 'Y', '', ''),
(207, 'Tajikistan', 'TJ', 2, 'Y', '', ''),
(208, 'Tanzania', 'TZ', 2, 'Y', '', ''),
(209, 'Thailand', 'TH', 2, 'Y', '', ''),
(210, 'Togo', 'TG', 2, 'Y', '', ''),
(211, 'Tokelau', 'TK', 2, 'Y', '', ''),
(212, 'Tonga', 'TO', 2, 'Y', '', ''),
(213, 'Trinidad and Tobago', 'TT', 2, 'Y', '', ''),
(214, 'Tunisia', 'TN', 2, 'Y', '', ''),
(215, 'Turkey', 'TR', 2, 'Y', '', ''),
(216, 'Turkmenistan', 'TM', 2, 'Y', '', ''),
(217, 'Turks and Caicos Islands', 'TC', 2, 'Y', '', ''),
(218, 'Tuvalu', 'TV', 2, 'Y', '', ''),
(219, 'Uganda', 'UG', 2, 'Y', '', ''),
(220, 'Ukraine', 'UA', 2, 'Y', '', ''),
(221, 'United Arab Emirates', 'AE', 2, 'Y', '', ''),
(222, 'United Kingdom', 'GB', 2, 'Y', '', ''),
(223, 'United States', 'US', 0, 'Y', '', ''),
(224, 'United States Minor Outlying Islands', 'UM', 2, 'Y', '', ''),
(225, 'Uruguay', 'UY', 2, 'Y', '', ''),
(226, 'Uzbekistan', 'UZ', 2, 'Y', '', ''),
(227, 'Vanuatu', 'VU', 2, 'Y', '', ''),
(228, 'Vatican City State (Holy See)', 'VA', 2, 'Y', '', ''),
(229, 'Venezuela', 'VE', 2, 'Y', '', ''),
(230, 'Viet Nam', 'VN', 2, 'Y', '', ''),
(231, 'Virgin Islands (British)', 'VG', 2, 'Y', '', ''),
(232, 'Virgin Islands (U.S.)', 'VI', 2, 'Y', '', ''),
(233, 'Wallis and Futuna Islands', 'WF', 2, 'Y', '', ''),
(234, 'Western Sahara', 'EH', 2, 'Y', '', ''),
(235, 'Yemen', 'YE', 2, 'Y', '', ''),
(236, 'Yugoslavia', 'YU', 2, 'Y', '', ''),
(237, 'Zaire', 'ZR', 2, 'Y', '', ''),
(238, 'Zambia', 'ZM', 2, 'Y', '', ''),
(239, 'Zimbabwe', 'ZW', 2, 'Y', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `front_currency`
--

CREATE TABLE `front_currency` (
  `currency_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(12) NOT NULL,
  `symbol_right` varchar(12) NOT NULL,
  `decimal_place` char(1) NOT NULL,
  `value` float(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_currency`
--

INSERT INTO `front_currency` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_place`, `value`, `status`, `date_modified`) VALUES
(1, 'Pound Sterling', 'GBP', '$', '', '2', 0.77740002, 0, '2017-05-30 20:12:10'),
(2, 'US Dollar', 'USD', 'USD', '', '2', 1.00000000, 1, '2017-05-30 20:12:10'),
(3, 'Euro', 'EUR', '', '€', '2', 0.89550000, 0, '2017-05-30 20:12:10'),
(4, 'Australia Dollar', 'AUD', 'AUD', '', '', 1.35022509, 1, '2017-05-30 20:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `front_customer_transaction`
--

CREATE TABLE `front_customer_transaction` (
  `customer_transaction_id` bigint(25) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `AddedDate` varchar(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `additional` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `Invoice` varchar(255) NOT NULL,
  `user_key` varchar(255) NOT NULL,
  `user_keystatus` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `ProductIDs` varchar(255) NOT NULL,
  `ProQtys` varchar(255) NOT NULL,
  `Models` text NOT NULL,
  `payment_attempt` int(11) NOT NULL,
  `planid` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_customer_transaction`
--

INSERT INTO `front_customer_transaction` (`customer_transaction_id`, `customer_id`, `order_id`, `description`, `amount`, `AddedDate`, `name`, `CompanyName`, `street`, `additional`, `city`, `state`, `zip`, `country`, `phone`, `email`, `payment_id`, `Invoice`, `user_key`, `user_keystatus`, `sessionId`, `Price`, `ProductIDs`, `ProQtys`, `Models`, `payment_attempt`, `planid`) VALUES
(1, 0, 0, 'test', '0.0000', '2017-12-21 15:06:12 PM', 'test', 'test', '', '', '', '', '', '', '1234567890', 'bhagabat.sunrisepc@gmail.com', '8a8294496073d24e0160786fc91c555e', '111111', '111111M8NsY', 0, '36d0c970c5915e769b5595db912c701321813988', 39.99, '', '', '', 15, 0),
(2, 0, 0, 'test', '0.0000', '2017-12-21 15:15:33 PM', 'parvinder', 'test', '', '', '', '', '', '', '1234567890', 'bhagabat.sunrisepc@gmail.com', '8a8294496073d24e01607877e39f6f22', '333333', '333333ZMXV7', 0, '36d0c970c5915e769b5595db912c701321813988', 10.99, '', '', '', 3, 0),
(3, 0, 0, '', '0.0000', '2017-12-21 16:19:18 PM', 'bhagabat behera', '', '', '', '', '', '', '', '', 'bhagabat.sunrisepc@gmail.com', '8a82944a6073f963016078b1de730bb0', '55555', '55555QaGft', 0, '36d0c970c5915e769b5595db912c701321813988', 99.99, '', '', '', 3, 1),
(4, 0, 0, 'test', '0.0000', '2017-12-21 16:21:53 PM', 'test', 'test', '', '', '', '', '', '', '1234567890', 'bhagabat.sunrisepc@gmail.com', '8a8294496073d24e016078b45ff04849', '44444', '4444409VAR', 0, '36d0c970c5915e769b5595db912c701321813988', 5.00, '', '', '', 1, 0),
(5, 0, 0, '', '0.0000', '2017-12-21 17:03:50 PM', 'test test', '', '', '', '', '', '', '', '', 'bhagabat.sunrisepc@gmail.com', '', '111111', '111111yH4yi', 0, '36d0c970c5915e769b5595db912c701321813988', 1.00, '', '', '', 4, 12),
(6, 0, 0, 'Test Transaction', '0.0000', '2017-12-22 11:17:54 AM', 'Bhasker Parmar', 'Zintel', '', '', '', '', '', '', '0800-368-7588', 'support@zinteltechnologies.co.uk', '8acda4a86055ad2401607cc606637f21', 'test1234', 'test1234mlEaS', 0, '13d2c189357a3fa529675e46223f32ead6875313', 1.00, '', '', '', 3, 0),
(7, 0, 0, 'ttest', '0.0000', '2017-12-22 11:15:58 AM', 'test', 'test', '', '', '', '', '', '', '1234567890', 'bhagabat.sunrisepc@gmail.com', '', '111111', '111111keupV', 0, '3d930e3d91d67b627edf87f13f7ec08790664ba2', 1.00, '', '', '', 4, 0),
(8, 0, 0, '', '0.0000', '2017-12-22 11:35:28 AM', 'Bhasker Parmar', '', '', '', '', '', '', '', '', 'admin@zinteltechnologies.co.uk', '8acda4a06055ad2201607cd53e382b9d', 'test1122', 'test1122HgFrJ', 0, '13d2c189357a3fa529675e46223f32ead6875313', 5.00, '', '', '', 2, 12),
(9, 0, 0, '', '0.0000', '2017-12-22 12:42:51 PM', 'Bhasker Parmar', '', '', '', '', '', '', '', '', 'admin@zinteltechnologies.co.uk', '8acda49f6065b70d01607d12d63a269c', 'test14785', 'test14785vvYY4', 0, '13d2c189357a3fa529675e46223f32ead6875313', 5.00, '', '', '', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `front_faqs`
--

CREATE TABLE `front_faqs` (
  `faq_id` bigint(20) NOT NULL,
  `faqs_question` varchar(255) NOT NULL,
  `faqs_answer` text NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `Sortorder` float(10,2) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `faqs_cat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `front_product`
--

CREATE TABLE `front_product` (
  `product_id` bigint(22) NOT NULL,
  `ProductTitle` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `category_id` int(20) NOT NULL,
  `ProQty` int(11) NOT NULL,
  `MinOrderQty` int(11) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Currency` varchar(40) NOT NULL,
  `Tax` float(10,2) NOT NULL,
  `SustractStock` enum('Y','N') NOT NULL DEFAULT 'Y',
  `OutOfStock` varchar(255) NOT NULL,
  `DateAvailable` date NOT NULL,
  `Dimensions` varchar(255) NOT NULL,
  `LengthUnit` varchar(255) NOT NULL,
  `Weight` float(10,4) NOT NULL,
  `WeightUnit` varchar(150) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `imageLarge` text NOT NULL,
  `imageMedium` text NOT NULL,
  `imageThumbnail` text NOT NULL,
  `RequiresShipping` enum('Y','N') NOT NULL DEFAULT 'Y',
  `SortOrder` float(10,2) NOT NULL,
  `Description` text NOT NULL,
  `KeyBenefit` text NOT NULL,
  `ProductTags` varchar(255) NOT NULL COMMENT 'comma separated',
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `SystemRequirment` text NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `OldStatus` varchar(100) NOT NULL,
  `StarRating` varchar(10) NOT NULL DEFAULT '0',
  `NewArrivals` enum('Y','N') NOT NULL DEFAULT 'N',
  `BestOffers` enum('Y','N') NOT NULL DEFAULT 'N',
  `HotSale` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `front_product`
--

INSERT INTO `front_product` (`product_id`, `ProductTitle`, `Model`, `category_id`, `ProQty`, `MinOrderQty`, `Price`, `Currency`, `Tax`, `SustractStock`, `OutOfStock`, `DateAvailable`, `Dimensions`, `LengthUnit`, `Weight`, `WeightUnit`, `SKU`, `imageLarge`, `imageMedium`, `imageThumbnail`, `RequiresShipping`, `SortOrder`, `Description`, `KeyBenefit`, `ProductTags`, `Added_Date`, `Updated_Date`, `SystemRequirment`, `Status`, `OldStatus`, `StarRating`, `NewArrivals`, `BestOffers`, `HotSale`) VALUES
(115, 'ASUS SDRW-08D2S-U LITE External Slimline SATA DVD Writer - Black', 'SDRW-08D2S-U', 3, 0, 0, 25.00, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506486767-ascd1.jpg,1506486767-ascd2.jpg', '1506486767-ascd1.jpg,1506486767-ascd2.jpg', '1506486767-ascd1.jpg,1506486767-ascd2.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for ASUS SDRW-08D2S-U LITE External Slimline SATA DVD Writer - Black&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;External DVD writer&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Interface&lt;/th&gt;\r\n&lt;td&gt;USB&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatibility&lt;/th&gt;\r\n&lt;td&gt;PC &amp;amp; Mac&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;Black&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Supported media&lt;/th&gt;\r\n&lt;td&gt;Audio CD, Video CD, CD-I, CD-Extra, Photo CD, CD-Text, CD-ROM/XA, Multi-session CD, CD-R, CD-RW, CD-ROM , DVD&amp;plusmn;R(SL/DL), DVD&amp;plusmn;RW, DVD-ROM(SL/DL), DVD-RAM, DVD Video&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Read / Write speed&lt;/th&gt;\r\n&lt;td&gt;Read:&lt;br /&gt;&lt;br /&gt;- DVD+R: 8x&lt;br /&gt;- DVD-R: 8x&lt;br /&gt;- DVD+RW: 8x&lt;br /&gt;- DVD-RW: 8x&lt;br /&gt;- DVD-ROM: 8x&lt;br /&gt;- DVD+R(DL): 8x&lt;br /&gt;- DVD-R(DL): 8x&lt;br /&gt;- DVD-ROM(DL): 8x&lt;br /&gt;- DVD-RAM: 5x&lt;br /&gt;- CD-R: 24x&lt;br /&gt;- CD-RW: 24x&lt;br /&gt;- CD-ROM: 24x&lt;br /&gt;- DVD Video Playback: 4x&lt;br /&gt;- VCD Playback: 10x&lt;br /&gt;- Audio CD Playback: 10x&lt;br /&gt;&lt;br /&gt;Write:&lt;br /&gt;&lt;br /&gt;- DVD+R: 8x&lt;br /&gt;- DVD-R: 8x&lt;br /&gt;- DVD+RW: 8x&lt;br /&gt;- DVD-RW: 6x&lt;br /&gt;- DVD+R(DL): 6x&lt;br /&gt;- DVD-R (DL): 6x&lt;br /&gt;- DVD-RAM: 5x&lt;br /&gt;- CD-R: 24x&lt;br /&gt;- CD-RW: 16x&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Memory buffer&lt;/th&gt;\r\n&lt;td&gt;5.8 MB&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other features&lt;/th&gt;\r\n&lt;td&gt;- Drag-and-Burn&lt;br /&gt;- Disc Encryption double security with password-controlled and hidden-file functionality&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;GENERAL&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Power supply&lt;/th&gt;\r\n&lt;td&gt;USB 2.0&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;System requirements&lt;/th&gt;\r\n&lt;td&gt;- Windows XP, Vista, 7, 8&lt;br /&gt;- OS X 10.5 onwards&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Dimensions&lt;/th&gt;\r\n&lt;td&gt;20 x 142 x 142 mm (H x W x D)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Weight&lt;/th&gt;\r\n&lt;td&gt;280 g&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Manufacturer&amp;rsquo;s guarantee&lt;/th&gt;\r\n&lt;td&gt;3 years&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:02:47 AM', '2018-06-14 10:19:09 AM', '', 'Y', '', '0', 'N', 'N', 'N'),
(116, 'ASUS BC-12D2HT Internal Blu-ray Combo', 'BC-12D2HT', 2, 0, 0, 70.00, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506486906-asuscd2.jpg', '1506486906-asuscd2.jpg', '1506486906-asuscd2.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for ASUS BC-12D2HT Internal Blu-ray Combo&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;Internal Blu-ray Combo&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Interface&lt;/th&gt;\r\n&lt;td&gt;SATA&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatibility&lt;/th&gt;\r\n&lt;td&gt;PC&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Supported media&lt;/th&gt;\r\n&lt;td&gt;Audio CD, Video CD, CD-I, CD-Extra, Photo CD, CD-Text, CD-ROM/XA, Multi-session CD, BD video, DVD Video&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Read / Write speed&lt;/th&gt;\r\n&lt;td&gt;- Blu-ray Read: 12 x&lt;br /&gt;- DVD Write: 16 x&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Memory buffer&lt;/th&gt;\r\n&lt;td&gt;5.8 MB&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;GENERAL&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Power supply&lt;/th&gt;\r\n&lt;td&gt;SATA&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;System requirements&lt;/th&gt;\r\n&lt;td&gt;- Processor: Intel&amp;reg; Pentium&amp;reg; D 945 (3.4 GHz) or higher&lt;br /&gt;- RAM: 1 GB or more&lt;br /&gt;- Hard drive: 10 GB more&lt;br /&gt;- Graphics Card: NVIDIA&amp;reg; GeForce 7600GT or ATI X1600 series or above&lt;br /&gt;- Use HDCP Compatible display and VGA card to High Definition digital output&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Software included&lt;/th&gt;\r\n&lt;td&gt;- Cyberlink Power2Go 8&amp;nbsp;&lt;br /&gt;- E-Green&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Dimensions&lt;/th&gt;\r\n&lt;td&gt;42 x 146 x 170 mm (H x W x D)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Weight&lt;/th&gt;\r\n&lt;td&gt;680 g&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Manufacturer&amp;rsquo;s guarantee&lt;/th&gt;\r\n&lt;td&gt;3 years&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:05:06 AM', '2018-06-14 10:19:13 AM', '', 'Y', '', '0', 'N', 'N', 'N'),
(118, 'CANON PIXMA MG3650 All-in-One Wireless Inkjet Printer', 'MG3650 ', 3, 0, 0, 35.00, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506487362-ca1.jpg,1506487362-ca2.jpg,1506487362-ca3.jpg,1506487362-ca4.jpg', '1506487362-ca1.jpg,1506487362-ca2.jpg,1506487362-ca3.jpg,1506487362-ca4.jpg', '1506487362-ca1.jpg,1506487362-ca2.jpg,1506487362-ca3.jpg,1506487362-ca4.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for CANON PIXMA MG3650 All-in-One Wireless Inkjet Printer&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;All-in-one home printer&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Function&lt;/th&gt;\r\n&lt;td&gt;- Print&lt;br /&gt;- Copy&lt;br /&gt;- Scan&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Print technology&lt;/th&gt;\r\n&lt;td&gt;Inkjet&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;CONNECTIVITY&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Wired connectivity&lt;/th&gt;\r\n&lt;td&gt;USB 2.0&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Wireless connectivity&lt;/th&gt;\r\n&lt;td&gt;- WiFi&lt;br /&gt;- Apple AirPrint&amp;nbsp;&lt;br /&gt;- Google Cloud Print&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;App available&lt;/th&gt;\r\n&lt;td&gt;Canon PRINT inkjet/SELPHY app&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;PRINTER&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatible cartridges&lt;/th&gt;\r\n&lt;td&gt;- Black: PG-540&lt;br /&gt;- Black XL: PG-540XL&lt;br /&gt;- Colour: CL-541&lt;br /&gt;- Colour XL: CL-541XL&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Average compatible cartridge yield&lt;/th&gt;\r\n&lt;td&gt;- Black: 180&lt;br /&gt;- Black XL: 600&lt;br /&gt;- Colour: 180&lt;br /&gt;- Colour XL: 400&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Print resolution&lt;/th&gt;\r\n&lt;td&gt;4800 x 1200 dpi&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Pages per minute (black &amp;amp; white)&lt;/th&gt;\r\n&lt;td&gt;Up to 9.9 ipm&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Pages per minute (colour)&lt;/th&gt;\r\n&lt;td&gt;Up to 5.7 ipm&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Page format&lt;/th&gt;\r\n&lt;td&gt;- A4&lt;br /&gt;- Letter&lt;br /&gt;- 20 x 25 cm&lt;br /&gt;- 13 x 18 cm&lt;br /&gt;- 10 x 15 cm&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Double-sided printing&lt;/th&gt;\r\n&lt;td&gt;Automatic (A4, A5, B5, Letter)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;SCANNER&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type of scanner&lt;/th&gt;\r\n&lt;td&gt;CIS flatbed scanner&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Scan resolution&lt;/th&gt;\r\n&lt;td&gt;1200 x 2400 dpi&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Scan speed&lt;/th&gt;\r\n&lt;td&gt;14 seconds per scan&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Page format&lt;/th&gt;\r\n&lt;td&gt;A4&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Light source&lt;/th&gt;\r\n&lt;td&gt;LED&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour depth&lt;/th&gt;\r\n&lt;td&gt;48-bit / 24-bit&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;GENERAL&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Paper tray capacity&lt;/th&gt;\r\n&lt;td&gt;100 sheets&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;White&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;System requirements&lt;/th&gt;\r\n&lt;td&gt;- Windows XP SP3 (32-bit), Vitsa, 7, 8, 10&lt;br /&gt;- Mac OS X 10.7.5 - 10.10&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Software included&lt;/th&gt;\r\n&lt;td&gt;- MP Driver including Scanning Utility&lt;br /&gt;- My Image Garden with Full HD Movie Print&amp;nbsp;&lt;br /&gt;- Quick Menu&lt;br /&gt;- Easy-WebPrintEX (download)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Box contents&lt;/th&gt;\r\n&lt;td&gt;- FINE cartridges&lt;br /&gt;- Power cord&lt;br /&gt;- Setup CD-ROM&lt;br /&gt;- Manuals &amp;amp; other documents&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Dimensions&lt;/th&gt;\r\n&lt;td&gt;152 x 449 x 304 mm (H x W x D)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Weight&lt;/th&gt;\r\n&lt;td&gt;7.3 kg&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Manufacturer&amp;rsquo;s guarantee&lt;/th&gt;\r\n&lt;td&gt;1 year&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:12:06 AM', '2018-07-04 10:44:54 AM', '', 'Y', '', '0', '', 'Y', 'Y'),
(119, 'HP OfficeJet 4658 All-in-One Wireless Inkjet Printer with Fax', '4658 ', 1, 0, 0, 50.00, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506487601-hpp1.jpg,1506487601-hpp2.jpg,1506487601-hpp3.jpg,1506487601-hpp4.jpg,1506487601-hpp5.jpg', '1506487601-hpp1.jpg,1506487601-hpp2.jpg,1506487601-hpp3.jpg,1506487601-hpp4.jpg,1506487601-hpp5.jpg', '1506487601-hpp1.jpg,1506487601-hpp2.jpg,1506487601-hpp3.jpg,1506487601-hpp4.jpg,1506487601-hpp5.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for HP OfficeJet 4658 All-in-One Wireless Inkjet Printer with Fax&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;All-in-one&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Function&lt;/th&gt;\r\n&lt;td&gt;- Print&lt;br /&gt;- Copy&lt;br /&gt;- Scan&lt;br /&gt;- Fax&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Print technology&lt;/th&gt;\r\n&lt;td&gt;Inkjet&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Display&lt;/th&gt;\r\n&lt;td&gt;2.2&quot; LCD screen&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;CONNECTIVITY&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Wired connectivity&lt;/th&gt;\r\n&lt;td&gt;USB 2.0&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Wireless connectivity&lt;/th&gt;\r\n&lt;td&gt;- WiFi&lt;br /&gt;- Apple AirPrint&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;App available&lt;/th&gt;\r\n&lt;td&gt;HP ePrint&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;PRINTER&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatible cartridges&lt;/th&gt;\r\n&lt;td&gt;- Black: HP 302&lt;br /&gt;- Colour: HP 302 Tri-colour&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Average compatible cartridge yield&lt;/th&gt;\r\n&lt;td&gt;- Black: 190 pages&lt;br /&gt;- Black XL: 480 pages&lt;br /&gt;- Colour: 165 pages&lt;br /&gt;- Colour XL: 330 pages&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Print resolution&lt;/th&gt;\r\n&lt;td&gt;- 1200 x 1200 dpi&lt;br /&gt;- Up to 4800 x 1200 with HP photo paper &amp;amp; 1200 dpi input&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Pages per minute (black &amp;amp; white)&lt;/th&gt;\r\n&lt;td&gt;- Up to 9.5 ppm (ISO)&lt;br /&gt;- Up to 21 ppm&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Pages per minute (colour)&lt;/th&gt;\r\n&lt;td&gt;- Up to 6.8 ppm (ISO)&lt;br /&gt;- Up to 18 ppm&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Page format&lt;/th&gt;\r\n&lt;td&gt;- A4&lt;br /&gt;- A5&lt;br /&gt;- B5&lt;br /&gt;- DL&lt;br /&gt;- C6&lt;br /&gt;- A6&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Double-sided printing&lt;/th&gt;\r\n&lt;td&gt;Automatic&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;SCANNER&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type of scanner&lt;/th&gt;\r\n&lt;td&gt;Colour flatbed scanner&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Scan resolution&lt;/th&gt;\r\n&lt;td&gt;1200 x 1200 dpi&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Page format&lt;/th&gt;\r\n&lt;td&gt;A4&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Scanning element&lt;/th&gt;\r\n&lt;td&gt;CIS&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other scanner features&lt;/th&gt;\r\n&lt;td&gt;- Scan to email&lt;br /&gt;- Scan to file (PDF/JPG)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;GENERAL&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Paper tray capacity&lt;/th&gt;\r\n&lt;td&gt;Up to 100 sheets&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Monthly duty cycle&lt;/th&gt;\r\n&lt;td&gt;1,200 pages per month&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Automatic document feeder&lt;/th&gt;\r\n&lt;td&gt;Yes&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;Black&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;System requirements&lt;/th&gt;\r\n&lt;td&gt;- Windows 7, 8, 8.1, 10&lt;br /&gt;- OS X Mountain Lion, Mavericks, Yosemite&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Software included&lt;/th&gt;\r\n&lt;td&gt;- HP Photo Creations&lt;br /&gt;- HP Printer Software&lt;br /&gt;- HP Update&lt;br /&gt;- OCR&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Box contents&lt;/th&gt;\r\n&lt;td&gt;- HP 302 black ink cartridge (~155 pages)&lt;br /&gt;- HP 302 tri-color ink cartridge (~100 pages)&lt;br /&gt;- Software CD&lt;br /&gt;- Setup flyer&lt;br /&gt;- Power cable&lt;br /&gt;- Phone cable&lt;br /&gt;- Print guide&lt;br /&gt;- USB cable&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Dimensions&lt;/th&gt;\r\n&lt;td&gt;369 x 190 x 445 mm (H x W x D)&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Weight&lt;/th&gt;\r\n&lt;td&gt;6.55 kg&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Manufacturer&amp;rsquo;s guarantee&lt;/th&gt;\r\n&lt;td&gt;1 year&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:16:41 AM', '2018-07-04 10:44:42 AM', '', 'Y', 'Sale', '0', 'Y', 'Y', 'Y'),
(121, 'APPLE MC461B/B 60 W MagSafe Power Adapter - for MacBook and 13-inch MacBook Pro', 'MC461B', 2, 0, 0, 79.99, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506488567-apadptr1.jpg,1506488567-apadptr2.jpg', '1506488567-apadptr1.jpg,1506488567-apadptr2.jpg', '1506488567-apadptr1.jpg,1506488567-apadptr2.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for APPLE MC461B/B 60 W MagSafe Power Adapter - for MacBook and 13-inch MacBook Pro&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;MagSafe power adapter&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatibility&lt;/th&gt;\r\n&lt;td&gt;- MacBook&lt;br /&gt;- MacBook Pro&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;White&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Connections&lt;/th&gt;\r\n&lt;td&gt;- Magnetic DC connector&lt;br /&gt;- Power adapter&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other features&lt;/th&gt;\r\n&lt;td&gt;- Charging status indicator light for charging status&lt;br /&gt;- Magnetic DC connector safely disconnects with undue strain &amp;amp; prevents fraying &amp;amp; weakening&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:32:47 AM', '2018-06-14 10:19:34 AM', '', 'Y', '', '0', 'N', 'N', 'N'),
(122, 'APPLE MagSafe 2 45 W Power Adapter - White', 'MagSafe ', 1, 0, 0, 79.99, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506488712-apad1.jpg,1506488712-apad2.jpg,1506488712-apad3.jpg', '1506488712-apad1.jpg,1506488712-apad2.jpg,1506488712-apad3.jpg', '1506488712-apad1.jpg,1506488712-apad2.jpg,1506488712-apad3.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for&amp;nbsp;&lt;/h2&gt;\r\n&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for APPLE MagSafe 2 45 W Power Adapter - White&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatible products&lt;/th&gt;\r\n&lt;td&gt;- MacBook Pro with Retina display&lt;br /&gt;- MacBook Air&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Connections&lt;/th&gt;\r\n&lt;td&gt;- Magnetic DC connector&lt;br /&gt;- Power adapter&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other features&lt;/th&gt;\r\n&lt;td&gt;- Safe-disconnect magnetic DC connector&lt;br /&gt;- Battery charging indicator light&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Power&lt;/th&gt;\r\n&lt;td&gt;45 W&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;CHARACTERISTICS&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;White&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatible products&lt;/th&gt;\r\n&lt;td&gt;- MacBook Pro with Retina display&lt;br /&gt;- MacBook Air&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Connections&lt;/th&gt;\r\n&lt;td&gt;- Magnetic DC connector&lt;br /&gt;- Power adapter&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other features&lt;/th&gt;\r\n&lt;td&gt;- Safe-disconnect magnetic DC connector&lt;br /&gt;- Battery charging indicator light&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Power&lt;/th&gt;\r\n&lt;td&gt;45 W&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;CHARACTERISTICS&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;White&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:35:12 AM', '2018-06-14 10:19:38 AM', '', 'Y', '', '0', 'N', 'N', 'N'),
(123, 'APPLE Refurbished 85W MagSafe Power Adapter', 'MagSafe ', 3, 0, 0, 65.00, '$', 0.00, 'Y', 'In Stock', '0000-00-00', ',,', 'Centimeter', 0.0000, 'Kilogram', '', '1506488879-adptrapp1.jpg,1506488879-adptrapp2.jpg', '1506488879-adptrapp1.jpg,1506488879-adptrapp2.jpg', '1506488879-adptrapp1.jpg,1506488879-adptrapp2.jpg', 'Y', 0.00, '&lt;h2 class=&quot;section-title border-b&quot;&gt;Technical specifications for APPLE Refurbished 85W MagSafe Power Adapter&lt;/h2&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;OVERVIEW&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Type&lt;/th&gt;\r\n&lt;td&gt;Refurbished MacBook Pro charger&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Compatibility&lt;/th&gt;\r\n&lt;td&gt;Apple MacBook Pro&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;FEATURES&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Other features&lt;/th&gt;\r\n&lt;td&gt;Magnetic&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;table class=&quot;simpleTable&quot;&gt;&lt;caption&gt;GENERAL&lt;/caption&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;&lt;th scope=&quot;row&quot;&gt;Colour&lt;/th&gt;\r\n&lt;td&gt;White&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', '', '', '2017-09-27 10:37:59 AM', '2018-06-14 10:19:42 AM', '', 'Y', '', '0', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `front_reviews`
--

CREATE TABLE `front_reviews` (
  `rid` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `CommentedBy` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Updated_Date` varchar(40) NOT NULL,
  `Ratings` int(2) NOT NULL,
  `DateTime` varchar(40) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `blg_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `front_reviews`
--

INSERT INTO `front_reviews` (`rid`, `category_id`, `CommentedBy`, `Description`, `Status`, `Updated_Date`, `Ratings`, `DateTime`, `Added_Date`, `ProductID`, `blg_id`) VALUES
(1, 3, 'Mia	Davies', 'I called a local tech support company in New South Wales, Australia to get some help with My Norton. I was so surprised to see the way they treated. They were very rude and annoying. Then one of my colleagues told me to call you. I am awestruck to see the way you handle my issues. Million thanks to you!!!!!!', 'Y', '2017-05-24 14:50:16 PM', 4, '', '2017-09-25 15:14:25 PM', 3, 0),
(2, 1, 'Isabella	Williams', 'I was trying to install an AVG update on my computer, but stuck in between because of any random issues. I contacted askme.bar for help. I am amazed how help you guys are and the quality of services you provide to your customers.', 'Y', '2017-05-24 14:48:21 PM', 3, '', '2017-03-17 16:56:27 PM', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `front_states`
--

CREATE TABLE `front_states` (
  `StatesID` int(11) NOT NULL,
  `StatesName` varchar(255) NOT NULL,
  `country_id` int(9) NOT NULL,
  `Status` enum('Y','N') NOT NULL,
  `MetaTitle` text NOT NULL,
  `MetaDescription` text NOT NULL,
  `MetaKeyword` text NOT NULL,
  `StateJobDesc` longtext NOT NULL,
  `StateConsultent` longtext NOT NULL,
  `ShortStateJobDesc` text NOT NULL,
  `Statesshort` varchar(255) NOT NULL,
  `IsLeftMenu` enum('N','Y') NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `employer_id` bigint(25) NOT NULL,
  `employees_id` bigint(25) NOT NULL,
  `Sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_states`
--

INSERT INTO `front_states` (`StatesID`, `StatesName`, `country_id`, `Status`, `MetaTitle`, `MetaDescription`, `MetaKeyword`, `StateJobDesc`, `StateConsultent`, `ShortStateJobDesc`, `Statesshort`, `IsLeftMenu`, `Updated_Date`, `Added_Date`, `employer_id`, `employees_id`, `Sortorder`) VALUES
(64, 'Haryana', 99, 'Y', '', '', '', '', '', '', 'HR', '', '', '', 0, 0, 0),
(66, 'Andhra Pradesh', 99, 'Y', '', '', '', '', '', '', 'AP', '', '2018-03-30 16:31:38 PM', '', 0, 0, 0),
(67, 'Jammu & Kashmir', 99, 'Y', '', '', '', '', '', '', 'J&K', '', '', '', 0, 0, 0),
(68, 'Punjab', 99, 'Y', '', '', '', '', '', '', 'PB', '', '', '', 0, 0, 0),
(69, 'Rajasthan', 99, 'Y', '', '', '', '', '', '', 'RJ', '', '', '', 0, 0, 0),
(70, 'Uttar Pradesh', 99, 'Y', '', '', '', '', '', '', 'UP', '', '', '', 0, 0, 0),
(71, 'Gujrat', 99, 'Y', '', '', '', '', '', '', 'GJ', '', '', '', 0, 0, 0),
(72, 'Madhya Pradesh', 99, 'Y', '', '', '', '', '', '', 'MP', '', '', '', 0, 0, 0),
(73, 'Arunachal Pradesh', 99, 'Y', '', '', '', '', '', '', 'AR', '', '', '', 0, 0, 0),
(74, 'Assam', 99, 'Y', '', '', '', '', '', '', 'AS', '', '', '', 0, 0, 0),
(75, 'Chhattisgarh', 99, 'Y', '', '', '', '', '', '', 'CG', '', '', '', 0, 0, 0),
(76, 'Goa', 99, 'Y', '', '', '', '', '', '', 'GA', '', '', '', 0, 0, 0),
(77, 'Himachal Pradesh', 99, 'Y', '', '', '', '', '', '', 'HP', '', '', '', 0, 0, 0),
(78, 'Jharkhand', 99, 'Y', '', '', '', '', '', '', 'JH', '', '', '', 0, 0, 0),
(79, 'Karnataka', 99, 'Y', '', '', '', '', '', '', 'KA', '', '', '', 0, 0, 0),
(80, 'Kerala', 99, 'Y', '', '', '', '', '', '', 'KL', '', '', '', 0, 0, 0),
(81, 'Maharashtra', 99, 'Y', '', '', '', '', '', '', 'MH', '', '', '', 0, 0, 0),
(82, 'Manipur', 99, 'Y', '', '', '', '', '', '', 'MN', '', '', '', 0, 0, 0),
(83, 'Meghalaya', 99, 'Y', '', '', '', '', '', '', 'ML', '', '', '', 0, 0, 0),
(84, 'Mizoram', 99, 'Y', '', '', '', '', '', '', 'MZ', '', '', '', 0, 0, 0),
(85, 'Nagaland', 99, 'Y', '', '', '', '', '', '', 'NL', '', '', '', 0, 0, 0),
(86, 'Orissa', 99, 'Y', '', '', '', '', '', '', 'OR', '', '', '', 0, 0, 0),
(87, 'Sikkim', 99, 'Y', '', '', '', '', '', '', 'SK', '', '', '', 0, 0, 0),
(88, 'Tamil Nadu', 99, 'Y', '', '', '', '', '', '', 'TN', '', '', '', 0, 0, 0),
(89, 'Tripura', 99, 'Y', '', '', '', '', '', '', 'TR', '', '', '', 0, 0, 0),
(90, 'West Bengal', 99, 'Y', '', '', '', '', '', '', 'WB', '', '', '', 0, 0, 0),
(91, 'Andaman and Nicobar Islands', 99, 'Y', '', '', '', '', '', '', 'AN', '', '', '', 0, 0, 0),
(92, 'Dadra and Nagar Haveli', 99, 'Y', '', '', '', '', '', '', 'DH', '', '', '', 0, 0, 0),
(93, 'Daman and Diu', 99, 'Y', '', '', '', '', '', '', 'DD', '', '', '', 0, 0, 0),
(94, 'Delhi-NCR', 99, 'N', '', '', '', '', '', '', 'NCR', '', '', '', 0, 0, 0),
(95, 'Lakshadweep', 99, 'Y', '', '', '', '', '', '', 'LD', '', '', '', 0, 0, 0),
(97, 'Chandigarh ', 99, 'N', '', '', '', '', '', '', 'Chandigarh ', '', '2018-04-02 10:37:31 AM', '2018-03-30 16:03:52 PM', 0, 0, 0),
(96, 'Telengana', 99, 'Y', '', '', '', '', '', '', 'TEL', '', '', '2018-03-30 14:57:52 PM', 0, 0, 0),
(98, 'Top Metropolitan Cities', 99, 'Y', '', '', '', '', '', '', 'Top Metropolitan Cities', '', '', '2018-04-02 09:05:13 AM', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `front_user_queries`
--

CREATE TABLE `front_user_queries` (
  `uquery_id` bigint(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(100) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `url_veiwing` varchar(255) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `front_user_queries`
--

INSERT INTO `front_user_queries` (`uquery_id`, `name`, `email`, `phone`, `subject`, `message`, `ip`, `session_id`, `browser`, `os`, `user_agent`, `url_veiwing`, `Added_Date`, `Updated_Date`, `country`, `Status`) VALUES
(34, 'bhagabat behera', 'bhagabata_sec@rediffmail.com', '3333333333', 'test', 'testing', '168.1.46.42', 'nqi6j2m8hdrnsmk1ftncddakf6', 'Chrome', 'Windows 7', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '/get-project-estimate-request.php', '2018-03-08 13:10:33 PM', '', 'Australia, New South Wales, Sydney', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `front_user_traffic`
--

CREATE TABLE `front_user_traffic` (
  `trfic_id` bigint(30) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `url_veiwing` varchar(255) NOT NULL,
  `Added_Date` varchar(30) NOT NULL,
  `Updated_Date` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `front_whislist`
--

CREATE TABLE `front_whislist` (
  `whishlist_id` bigint(25) NOT NULL,
  `ProductID` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `front_whislist`
--

INSERT INTO `front_whislist` (`whishlist_id`, `ProductID`, `qty`, `Added_Date`, `Updated_Date`, `session_id`, `ip`, `browser`, `Status`) VALUES
(14, 98, 1, '2018-01-02 09:03:44 AM', '2018-01-02 09:03:49 AM', 'tta2tp776789fk1c9u4u7aa0s2', '110.172.142.162', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `module_managements`
--

CREATE TABLE `module_managements` (
  `module_id` int(11) NOT NULL,
  `modulename` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ModuleStatus` int(9) NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `target` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `Added_Date` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `Updated_Date` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `glyph_icon` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fa_icon` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `mdi_icon` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `has_sub` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `module_managements`
--

INSERT INTO `module_managements` (`module_id`, `modulename`, `ModuleStatus`, `url`, `target`, `Status`, `Added_Date`, `Updated_Date`, `glyph_icon`, `fa_icon`, `mdi_icon`, `has_sub`) VALUES
(15, 'admin', 20, 'adminUserList', '_self', 'Y', '', '2017-03-09 16:33:43 PM', '<span class=\"glyphicons glyphicons-arrow-right\"></span>', '<i class=\"fas fa-long-arrow-alt-right\"></i>', '', 'N'),
(16, 'change password', 20, 'adminUserChangePassword', '_self', 'Y', '', '2017-03-09 16:33:34 PM', '<span class=\"glyphicons glyphicons-arrow-right\"></span>', '<i class=\"fa fa-long-arrow-alt-right\"></i>', '', 'N'),
(17, 'CMS', 19, 'CmsList', '_self', 'Y', '2017-03-09 11:49:26 AM', '2017-05-19 14:50:20 PM', '', '', '', 'N'),
(18, 'Category List', 19, 'CategoryList', '_self', 'Y', '2017-03-09 11:50:20 AM', '2018-06-14 09:47:32 AM', '', '', '', 'N'),
(19, 'Landing Pages', 0, 'javascript:void(0);', '', 'Y', '2017-03-09 15:44:10 PM', '2018-02-16 11:13:54 AM', '', '<i class=\"fa fa-globe\"></i>', '<i class=\"mdi mdi-google-pages\"></i>', 'Y'),
(20, 'Admin Profiles', 0, 'javascript:void(0);', '', 'Y', '2017-03-09 15:56:03 PM', '2018-02-16 11:14:07 AM', '', '<i class=\"fa fa-desktop\"></i>', '<i class=\"mdi mdi-account-key\"></i>', 'Y'),
(21, 'Modules', 27, 'modulesList', '_self', 'Y', '2017-03-09 15:59:52 PM', '2018-02-07 10:01:04 AM', '', '', '', 'N'),
(22, 'Reviews', 19, 'reviewsList', '_self', 'Y', '2017-05-19 14:58:48 PM', '2017-05-19 16:02:49 PM', '', '', '', 'N'),
(23, 'Manage Products', 19, 'productsList', '_self', 'N', '2017-05-30 11:29:13 AM', '2018-06-14 09:48:10 AM', '', '', '', 'N'),
(26, 'Slider', 19, 'bannerList', '_self', 'N', '2018-02-06 16:40:46 PM', '', '', '', '', 'N'),
(28, 'Company Details', 27, 'webSettingsList', '_self', 'Y', '2018-02-07 10:06:01 AM', '', '', '', '', 'N'),
(27, 'Settings', 0, 'javascript:void(0);', '', 'Y', '2018-02-07 10:00:01 AM', '', '', '<i class=\"fa fa-cogs\"></i>', '<i class=\"mdi mdi-settings\"></i>', 'Y'),
(29, 'Port Folio', 19, 'portfolioList', '_self', 'N', '2018-02-12 12:00:47 PM', '', '', '', '', 'N'),
(30, 'FAQS', 19, 'faqsList', '_self', 'Y', '2018-02-12 17:09:00 PM', '2018-02-12 17:09:06 PM', '', '', '', 'N'),
(31, 'View Site', 19, 'http://localhost/onlinedeals2offer/', '_blank', 'N', '2018-02-13 10:29:22 AM', '2018-07-03 16:08:20 PM', '', '', '', 'N'),
(32, 'Website Traffic', 19, 'trafficList', '_self', 'N', '2018-02-14 11:05:13 AM', '', '', '', '', 'N'),
(33, 'User Queries', 19, 'userQueryList', '_self', 'Y', '2018-02-14 12:14:12 PM', '', '', '', '', 'N'),
(34, 'Blog Management', 19, 'blogList', '_self', 'N', '2018-02-23 13:32:00 PM', '', '', '', '', 'N'),
(35, 'Location Manager', 0, 'javascript:void(0);', '', 'Y', '2018-03-30 10:39:54 AM', '', '', '<i class=\"fa fa-map-marker\"></i>', '<i class=\"mdi mdi-home-map-marker\"></i>', 'Y'),
(36, 'Cities', 35, 'cityList', '_self', 'Y', '2018-03-30 10:41:46 AM', '2018-03-30 14:19:56 PM', '', '', '', 'N'),
(37, 'States', 35, 'stateList', '_self', 'Y', '2018-03-30 14:19:33 PM', '2018-03-30 14:21:11 PM', '', '', '', 'N'),
(38, 'Countries', 35, 'countryList', '_self', 'Y', '2018-03-30 15:37:44 PM', '', '', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `myapp_application_settings`
--

CREATE TABLE `myapp_application_settings` (
  `setting_id` int(5) UNSIGNED NOT NULL,
  `domain` varchar(200) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `company_address1` text NOT NULL,
  `company_address2` text NOT NULL,
  `company_address3` text NOT NULL,
  `language` varchar(50) NOT NULL,
  `support_tel` varchar(25) NOT NULL,
  `contact_tel` varchar(25) NOT NULL,
  `Mobile` varchar(25) NOT NULL,
  `web_site_logo_large` varchar(255) NOT NULL,
  `web_site_logo_small` varchar(255) NOT NULL,
  `web_site_footer_logo` varchar(255) NOT NULL,
  `fab_icon` varchar(255) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `Updated_Date` varchar(40) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `admin_index_page` varchar(255) NOT NULL,
  `gogle_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `pineinterest_link` varchar(255) NOT NULL,
  `customStyles` text NOT NULL,
  `customScriptsHead` text NOT NULL,
  `customScriptsFooter` text NOT NULL,
  `metaAuthor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myapp_application_settings`
--

INSERT INTO `myapp_application_settings` (`setting_id`, `domain`, `support_email`, `website_name`, `company_name`, `contact_email`, `company_address1`, `company_address2`, `company_address3`, `language`, `support_tel`, `contact_tel`, `Mobile`, `web_site_logo_large`, `web_site_logo_small`, `web_site_footer_logo`, `fab_icon`, `Added_Date`, `Updated_Date`, `Status`, `admin_index_page`, `gogle_link`, `facebook_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `pineinterest_link`, `customStyles`, `customScriptsHead`, `customScriptsFooter`, `metaAuthor`) VALUES
(1, 'http://localhost/ci_hmvc_new/', 'support@onlinedeals2offer.com.au', 'ci_hmvc_new', 'ci_hmvc_new', 'info@ci_hmvc_new.com', '', '', '', 'en', '', '', '', '1530613538-logo.png', '1530613538-logo.png', '1530613538-logo.png', '1530613538-logo.png', '', '2018-07-03 15:55:38 PM', 'Y', 'admin_desktop.php', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', 'javascript:viod(0);', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `myapp_cms`
--

CREATE TABLE `myapp_cms` (
  `cmsid` int(11) NOT NULL,
  `category_id` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `page_title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `SEOKeyword` varchar(255) NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaDescription` text NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Updated_Date` varchar(40) NOT NULL,
  `Added_Date` varchar(40) NOT NULL,
  `CMS_Editor_Type` enum('WYSIWYG','Custom') NOT NULL DEFAULT 'WYSIWYG',
  `LeftSideBar` enum('Y','N') NOT NULL DEFAULT 'N',
  `RightSideBar` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `myapp_cms`
--

INSERT INTO `myapp_cms` (`cmsid`, `category_id`, `page_title`, `Description`, `SEOKeyword`, `MetaTitle`, `MetaDescription`, `Status`, `Updated_Date`, `Added_Date`, `CMS_Editor_Type`, `LeftSideBar`, `RightSideBar`) VALUES
(1, 0, 'Home', 'Home', 'Home', 'Home', 'Home', 'Y', '', '', 'WYSIWYG', 'N', 'N'),
(2, 0, 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'Y', '', '', 'WYSIWYG', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `myapp_users`
--

CREATE TABLE `myapp_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `activation_code` varchar(20) NOT NULL,
  `forgotten_password_code` varchar(20) NOT NULL,
  `forgotten_password_time` bigint(20) NOT NULL,
  `two_step_verify_on` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL,
  `verify_code` varchar(20) NOT NULL,
  `created_on` bigint(20) UNSIGNED NOT NULL,
  `updated_on` bigint(20) UNSIGNED NOT NULL,
  `last_login` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `roles` varchar(200) NOT NULL DEFAULT 'User',
  `permissions` text NOT NULL,
  `View` enum('Y','N') NOT NULL DEFAULT 'N',
  `Generate` enum('Y','N') NOT NULL DEFAULT 'N',
  `Edit` enum('Y','N') NOT NULL DEFAULT 'N',
  `Remove` enum('Y','N') NOT NULL DEFAULT 'N',
  `ip` varchar(60) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `myapp_users_profile`
--

CREATE TABLE `myapp_users_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `dp_image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(60) NOT NULL,
  `state` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `oid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `cusine` varchar(150) NOT NULL,
  `other` varchar(50) DEFAULT 'NA',
  `rest_loca` varchar(150) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `deliver_date` varchar(20) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  `restname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`oid`, `username`, `order_type`, `cusine`, `other`, `rest_loca`, `city`, `deliver_date`, `order_date`, `status`, `restname`) VALUES
(1, 'sagar', 'Delivery', 'Break Fast', 'NA', 'Sardar Patel Square', 'Rajkot', '2017-06-07', '11-06-2017', 0, 'Domino`s Pizza'),
(2, 'sagar', 'Delivery', 'Dinner', 'NA', 'Sardar Patel Square', 'Surat', '2017-06-22', '13-06-2017', 0, 'Domino`s Pizza'),
(3, 'mahesh', 'Take away', 'Lunch', 'NA', 'Subway', 'Ahmedabad', '2017-06-23', '13-06-2017', 0, 'Subway'),
(5, 'Pooja', 'Take away', '120.00', 'NA', NULL, 'Rajkot', '2017-06-21', '13-06-2017', 0, 'Pizz Hut');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `resid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `picture` varchar(20) NOT NULL,
  `price` double(6,2) NOT NULL DEFAULT '0.00',
  `proprice` double(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `isSpcl` int(2) DEFAULT '0',
  `spclprice` decimal(8,0) DEFAULT '0',
  `validaty` varchar(20) DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `resid`, `name`, `details`, `picture`, `price`, `proprice`, `status`, `isSpcl`, `spclprice`, `validaty`) VALUES
(30, 1, 'Pizaa', 'pizaaa', 'whole-pizza.png', 120.00, 120.00, 0, 0, '0', ''),
(31, 3, 'BIG BURGER', 'SO BIG BURGER', '1.jpg', 50.00, 50.00, 0, 1, '40', '2017-06-15'),
(32, 3, 'Triple Treat Box Veg', 'Meal for 4. Any 2 Veg Medium pizza + 1 Garlic Bread stix + 1 Dip + 1 Potato Poppers + 1 Tandoori Paneer Stuffed Pocket', '1371860.png', 320.00, 320.00, 0, 1, '220', '2017-06-21'),
(33, 5, 'Exotica', 'Red Capsicum, Green Capsicum, Baby Corn, Black Olives, Jalapenos', '1371007.png', 490.00, 490.00, 0, 1, '400', '2017-06-27'),
(34, 3, '420 PUNJABI MASALA PAPAD', '420 PUNJABI MASALA PAPAD', 'masaa045_1_.jpg', 120.00, 120.00, 0, 1, '80', '2017-06-16'),
(35, 5, 'Margherita | Classic', 'Margherita | Classic', 'Farm_Fresh_1.jpg', 250.00, 250.00, 0, NULL, '0', ''),
(36, 5, 'Classic Veggie', 'lassic Veggie', 'Classic_Veggie.jpg', 250.00, 250.00, 0, NULL, '0', ''),
(37, 3, 'Egg & Cheese', 'A classic for a reason. Our Egg and Cheese is simply delicious. Enjoy a fluffy egg omelet with melte', 'as.jpg', 200.00, 200.00, 0, NULL, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `rest_master`
--

CREATE TABLE `rest_master` (
  `rid` int(5) NOT NULL,
  `rest_name` varchar(50) NOT NULL,
  `rest_address` varchar(255) NOT NULL,
  `rest_phone` varchar(12) NOT NULL,
  `rest_logo` varchar(255) NOT NULL,
  `rest_city` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_master`
--

INSERT INTO `rest_master` (`rid`, `rest_name`, `rest_address`, `rest_phone`, `rest_logo`, `rest_city`, `status`, `createdate`) VALUES
(1, 'Pizz Hut', 'SG Highway', '6565656', 'margherita3.jpg', 'Ahmedabad', 'False', '14-04-2017'),
(3, 'Subway', 'Subway', '135649898', 'restaurent-logo2.jpg', 'Surat', 'False', '29-03-2017'),
(4, 'Barista', 'Maninagar', '956655', 'restaurent-logo3.jpg', 'Ahmedabad', 'False', '29-03-2017'),
(5, 'Papa Johns', 'Gota Chowkdi', '999556556', 'restaurent-logo4.jpg', 'Vadodara', 'False', '29-03-2017'),
(6, 'Domino`s Pizza', 'Sardar Patel Square', '32343243243', 'restaurent-logo5.jpg', 'Ahmedabad', 'True', '29-03-2017');

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `sid` int(5) NOT NULL,
  `offername` varchar(250) NOT NULL,
  `offer_date` varchar(20) NOT NULL,
  `restid` varchar(10) NOT NULL,
  `spcl_price` decimal(8,0) NOT NULL,
  `offer_img` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `uid` int(5) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`uid`, `fname`, `lname`, `email`, `password`, `role`, `date`) VALUES
(1, 'sagar', 'rathod', 'sagarswtboy@gmail.com', 'sagar', 'User', '29-03-2017'),
(2, 'deepak', 'asddddd', '123@123.123', '12345', 'User', '15-04-2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_loginstatus`
--
ALTER TABLE `admin_loginstatus`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`adm_id`,`adm_login_id`);

--
-- Indexes for table `enquiry_master`
--
ALTER TABLE `enquiry_master`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `front_banner`
--
ALTER TABLE `front_banner`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `front_blog`
--
ALTER TABLE `front_blog`
  ADD PRIMARY KEY (`blg_id`);

--
-- Indexes for table `front_cart`
--
ALTER TABLE `front_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `front_categories`
--
ALTER TABLE `front_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `front_city`
--
ALTER TABLE `front_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `front_cms`
--
ALTER TABLE `front_cms`
  ADD PRIMARY KEY (`cmsid`);

--
-- Indexes for table `front_country`
--
ALTER TABLE `front_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `front_currency`
--
ALTER TABLE `front_currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `front_customer_transaction`
--
ALTER TABLE `front_customer_transaction`
  ADD PRIMARY KEY (`customer_transaction_id`);

--
-- Indexes for table `front_faqs`
--
ALTER TABLE `front_faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `front_product`
--
ALTER TABLE `front_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `front_reviews`
--
ALTER TABLE `front_reviews`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `front_states`
--
ALTER TABLE `front_states`
  ADD PRIMARY KEY (`StatesID`);

--
-- Indexes for table `front_user_queries`
--
ALTER TABLE `front_user_queries`
  ADD PRIMARY KEY (`uquery_id`);

--
-- Indexes for table `front_user_traffic`
--
ALTER TABLE `front_user_traffic`
  ADD PRIMARY KEY (`trfic_id`);

--
-- Indexes for table `front_whislist`
--
ALTER TABLE `front_whislist`
  ADD PRIMARY KEY (`whishlist_id`);

--
-- Indexes for table `module_managements`
--
ALTER TABLE `module_managements`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `myapp_application_settings`
--
ALTER TABLE `myapp_application_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `myapp_cms`
--
ALTER TABLE `myapp_cms`
  ADD PRIMARY KEY (`cmsid`);

--
-- Indexes for table `myapp_users`
--
ALTER TABLE `myapp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myapp_users_profile`
--
ALTER TABLE `myapp_users_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resid` (`resid`);

--
-- Indexes for table `rest_master`
--
ALTER TABLE `rest_master`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_loginstatus`
--
ALTER TABLE `admin_loginstatus`
  MODIFY `lid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `setting_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `adm_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enquiry_master`
--
ALTER TABLE `enquiry_master`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `front_banner`
--
ALTER TABLE `front_banner`
  MODIFY `bid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_blog`
--
ALTER TABLE `front_blog`
  MODIFY `blg_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `front_cart`
--
ALTER TABLE `front_cart`
  MODIFY `cart_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `front_categories`
--
ALTER TABLE `front_categories`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `front_city`
--
ALTER TABLE `front_city`
  MODIFY `city_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `front_cms`
--
ALTER TABLE `front_cms`
  MODIFY `cmsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `front_country`
--
ALTER TABLE `front_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `front_currency`
--
ALTER TABLE `front_currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `front_customer_transaction`
--
ALTER TABLE `front_customer_transaction`
  MODIFY `customer_transaction_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `front_faqs`
--
ALTER TABLE `front_faqs`
  MODIFY `faq_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_product`
--
ALTER TABLE `front_product`
  MODIFY `product_id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `front_reviews`
--
ALTER TABLE `front_reviews`
  MODIFY `rid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `front_states`
--
ALTER TABLE `front_states`
  MODIFY `StatesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `front_user_queries`
--
ALTER TABLE `front_user_queries`
  MODIFY `uquery_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `front_user_traffic`
--
ALTER TABLE `front_user_traffic`
  MODIFY `trfic_id` bigint(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_whislist`
--
ALTER TABLE `front_whislist`
  MODIFY `whishlist_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `module_managements`
--
ALTER TABLE `module_managements`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `myapp_application_settings`
--
ALTER TABLE `myapp_application_settings`
  MODIFY `setting_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myapp_cms`
--
ALTER TABLE `myapp_cms`
  MODIFY `cmsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `myapp_users`
--
ALTER TABLE `myapp_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `myapp_users_profile`
--
ALTER TABLE `myapp_users_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rest_master`
--
ALTER TABLE `rest_master`
  MODIFY `rid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
