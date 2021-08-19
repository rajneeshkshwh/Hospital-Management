-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 04:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_rk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`UniqueId`, `Title`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(2, 'EXPERIENCE WORLD-CLASS HEALTHCARE SERVICES.', 'assets/uploads/aboutus/49449.jpg', 'Today, the medical field is witnessing a host of multi-specialty hospitals mushrooming all over the country. In the windfall of the various state-of-the-art hospitals, personalized care often takes a disappointing backseat. This is where R.k Hospital comes into the picture making a much needed difference.', 'Y', 'HSR', 'Admin', '2018-12-20 05:24:31', 'Admin', '2018-12-22 10:53:38'),
(3, 'FULL TIME CONSULTANTS', 'assets/uploads/about/product-unknow.jpg', '<strong>DR. SINGARAVELU</strong><br>\r\nManaging director & Consultant paediatrician <br>\r\n\r\n<strong>DR. SARASWATHI</strong><br>\r\nMedical director , Consultant O & G and Infertility specialist<br>\r\n\r\n<strong>DR.MANI RAM KRISHNA</strong><br>\r\nConsultant Paediatric Interventional Cardiologist<br>\r\n\r\n<strong>DR.S.USHA NANDINI MBBS </strong><br>\r\nConsultant Fetal Medicine & Fetal Echocardiologist<br>\r\n\r\n<strong>DR.RAJESHWARAN., D.Ch.,DNB </strong><br>\r\nConsultant Paediatrician<br>\r\n<strong>DR.PRANAHITHA M.D.,</strong><br>\r\nConsultant Obstetrician & Gynaecologist<br>', 'Y', 'HSR', 'Admin', '2019-03-19 06:19:26', 'Admin', '2019-03-19 14:58:09'),
(4, 'VISITING CONSULTATNTS', 'assets/uploads/about/23960.jpg', '<strong>DR. SATHYABAMA M.S.,</strong><br>\r\n<strong>DR. MARDUDURAI M.S., M.Ch (vascular SURGERY)</strong><br>\r\nKanaga shanthi ., MEDICAL ONCOLOGIST dmrt</strong><br>\r\n<strong>DR.RAJESHWARAN., M.D</strong><br>\r\nConsultant paediatrician</strong><br>\r\n<strong>DR.PRANAHITHA M.D.,</strong><br>\r\nand other on – call doctors<br>\r\n<strong>DR. DHEENADAYALAN PAED.HEMATO</strong><br>\r\nPONCHIDABARAM SURG GASTRO<br>\r\n<strong>KANAGA SHANTHI .,MBBS., DMRT.,</strong><br>\r\n Medical oncologist', 'Y', 'HSR', 'Admin', '2019-03-19 14:30:24', 'Admin', '2019-03-19 14:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`UniqueId`, `Title`, `Link`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(4, 'new Adverts', 'assets/uploads/advert/56363.mp4', 'ok', 'Y', 'HSR', 'Admin', '2018-12-14 14:24:13', 'Admin', '2018-12-14 14:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`UniqueId`, `Title`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'We serve better  than any other', 'assets/uploads/banner/53796.png', 'Our team of over 100 doctors join me in giving you the best  of modern healthcare to ensure you stay healthy, always.', 'Y', 'HSR', 'Admin', '2018-12-14 11:07:26', 'Admin', '2019-03-19 05:11:53'),
(2, 'We provide most  proffesional service.', 'assets/uploads/banner/18566.jpg', 'Primary care isn’t just about getting treatment when you’re sick it’s about taking control of overall health and wellness.', 'Y', 'HSR', 'Admin', '2018-12-14 11:07:56', 'Admin', '2019-03-19 05:12:01'),
(3, 'WE OFFER MOST PROFESSIONAL SRVICE', 'assets/uploads/banner/74724.jpg', 'Stay in touch and in shape with periodic tips from our in-house  experts on wellness, fitness and nutrition.', 'Y', 'HSR', 'Admin', '2018-12-14 11:08:33', 'Admin', '2019-03-19 06:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `UniqueId` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`UniqueId`, `CategoryName`, `Title`, `Photo`, `Description`, `Date`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, '2', 'KILOS & KIDDIEWINKS: THE CAUSES BEHIND CHILDHOOD OBESITY', 'assets/uploads/blog/76437.jpg', '<p>Processed, sugary and high-calorie foods, consumed regularly, can pave the way for an unhealthy lifestyle. Translation: pizza, pakoras, puri, mithai, sweets, desserts are best left off the table. If your child is prone to snacking between meals, introduce healthy mid-morning and evening snacks to their routine. Explore recipes with nuts, fruits and veggies, and mix things up to keep the menu exciting. Kids love colours and shapes, so get creative with cookie cutter-veggies and teddy bear omelettes.</p>\r\n\r\n<p>Pellentesque eleifend metus vitae commodo finibus. Proin eget mi a sem placerat facilisis. Aenean interdum aliquet sapien, non scelerisque massa vestibulum ut.</p>', '22-12-2018', 'Y', 'HSR', 'Admin', '2018-12-20 09:22:40', 'Admin', '2018-12-22 12:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `UniqueId` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`UniqueId`, `Name`, `Photo`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(3, 'Weighing', 'assets/uploads/service/90410.jpg', 'Y', 'HSR', 'Admin', '2018-12-14 12:46:32', NULL, NULL),
(4, 'Packaging', 'assets/uploads/service/82354.jpg', 'Y', 'HSR', 'Admin', '2018-12-14 12:48:52', NULL, NULL),
(5, 'Brand & Marketing', 'assets/uploads/service/22192.jpg', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:13', NULL, NULL),
(6, 'Inventory & Storage', 'assets/uploads/service/78135.jpg', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companysetting`
--

CREATE TABLE `companysetting` (
  `UniqueId` int(11) NOT NULL,
  `ApplicationName` varchar(300) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `State` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL,
  `Address` varchar(1500) NOT NULL,
  `PinCode` decimal(10,0) NOT NULL,
  `MobileNo` decimal(10,0) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `Footer` varchar(255) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companysetting`
--

INSERT INTO `companysetting` (`UniqueId`, `ApplicationName`, `Country`, `State`, `City`, `Address`, `PinCode`, `MobileNo`, `EmailId`, `Footer`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'SMS Application', '101', '35', 'Hosur', 'KINGSON SUPER MARKET\r\n# 9/1,OPP RAILWAY STSTION\r\nDENKANIKOTTAI ROAD\r\nHOSUR-635109', '635109', '9894020065', 'kingsonsupermarket@yahoo.in', 'Copyrights @ 2018', 'Y', 'HSR', 'Admin', '2018-11-21 11:31:29', 'Admin', '2018-12-01 06:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `UniqueId` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Description` longtext NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`UniqueId`, `CategoryName`, `Title`, `Description`, `Photo`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(2, '2', 'CARDIOLOGIST DEPARTMENT', '<p>R.K Heart Centre offers a whole range of cardiology and cardiothoracic surgical services from early disease detection to complex interventions. Our diagnostic services include ECG, 2-D and 3-D Echocardiography, Stress Echocardiography, Transesophageal Echocardiography and Treadmill Testing.</p>\r\n\r\n<p>R.K Heart Centre was established by the vision of our Chairman Dr. Bakthavathsalam. He is the backbone and instrumental for the all-round development of the institute. He has infused the medical professionals and employees with R.K Culture of Quality, Teamwork, Service Motto, Moral Integrity, Compassion towards the patients, Commitment to work and Innovation.R.K Heart Centre incorporates ethical practices and the advancement management.</p>\r\n\r\n<p>R.K Heart Centre is an important unit of Trust-run R.K Hospital which is fuelled by the motive to serve all sections of the society. R.K Heart Centre is one of the best heart institutes in the country providing cardiac care for over 25 years. He has infused the medical professionals and employees with R.K Culture of Quality, Teamwork, Service Motto, Moral Integrity, Compassion towards the patients, Commitment to work and Innovation.</p>', 'assets/uploads/department/89140.jpg', 'Y', 'HSR', 'Admin', '2018-12-20 09:40:23', 'Admin', '2019-03-19 06:30:23'),
(3, '3', 'ORTHOPAEDICS DEPARTMENT', '<p>The Joint Replacement Centre is one of the most active units in K.G. Hospital, endowed with world-class facilities for Joint Replacement procedures. It is an advanced high-tech centre, manned by 3 full time Consultants, Resident Doctors and paramedical staff trained to deliver 100% success rate.</p>\r\n\r\n<p>The Centre also works in tandem with the Orthopedic Outpatient Department&#39;s various clinics like Sports and Arthroscopy Clinic, Back Pain Clinic and Arthritis Clinic.Orthopaedics is the medical specialty that focuses on injuries and diseases of your body&#39;s musculoskeletal system. This complex system, which includes your bones, joints, ligaments, tendons, muscles, and nerves, allows you to move, work, and be active.The various replacement surgeries carried out in the Centre include:</p>\r\n\r\n<ul>\r\n	<li>Knee Replacement (Partial/Total)</li>\r\n	<li>Arthroscopy</li>\r\n	<li>Hip Replacement</li>\r\n	<li>Shoulder Replacement</li>\r\n	<li>Elbow Replacement</li>\r\n	<li>Total Knee Arthroplasty</li>\r\n	<li>Hemiarthroplasty</li>\r\n	<li>Total Hip Replacement</li>\r\n</ul>', 'assets/uploads/department/78273.jpg', 'Y', 'HSR', 'Admin', '2018-12-20 10:14:07', 'Admin', '2019-03-19 06:30:57'),
(4, '4', 'DIABETOLOGY DEPARTMENT', '<p>The Department of Diabetics in R.K. Hospital, headed by Dr J.Girithara Gopalakrishnan (Dr Giri), has been set up to provide much needed help and guidance to Diabetic patients and assist them in leading a normal, healthy and productive life. The Department also organizes regular Diabetes Public Awareness campaigns to disseminate information on dietary control along with practical diet expositions.</p>\r\n\r\n<p>Diabetology is the clinical science of diabetes mellitus, its diagnosis, treatment and follow-up. It can be considered a specialised field of endocrinology. The term diabetologist is used in several ways. In North America over the last 40 years it is most often used for an internist who through practice and interest develops expertise in diabetes care without having formal training or board certification in endocrinology e.g. retinopathy, nephropathy and peripheral neuropathy.</p>\r\n\r\n<p>Diabetology is not a recognized medical specialty and has no formal training programs leading to board certification. In other contexts the term diabetologist refers to any physician, including endocrinologists, whose practice and/or research efforts are concentrated mainly in diabetes care. Apart from regulating medication dosage and timing, a diabetologist will also concern themselves with the potential consequences of diabetes.</p>', 'assets/uploads/department/48142.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:27:09', 'Admin', '2019-03-19 06:31:13'),
(5, '5', 'NEPHROLOGY DEPARTMENT', '<p>R.K Kidney Centre, the Nephrology division of R.K Hospital, has been providing quality treatment of international standards to various types of kidney diseases.The Kidney Centre is a super-specialty tertiary care unit that has been in existence for the past 18 years. The various treatment options available in the Centre include normal medical facilities to dialysis to kidney transplantations.</p>\r\n\r\n<p>Backed by a modern theatre complex and a 24-hour fully equipped diagnostic facility, the Department also conducts a one-year Diploma Course for Dialysis Technicians. K.G. Kidney Centre is the one of the 15 centres in the country and 2nd centre in Tamil Nadu to get recognition from the National Board of Examinations, New Delhi, to conduct DNB Programme in Nephrology.</p>\r\n\r\n<p>Nephrology is specialty of medicine concerned with kidney physiology, kidney disease, the treatment of kidney problems and renal replacement therapy.Nephrology research and treatment news articles for nephrologists and medical professionals to stay updated on kidney dialysis.</p>', 'assets/uploads/department/59424.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:27:28', 'Admin', '2019-03-19 06:36:41'),
(6, '6', 'SPINAL DEPARTMENT', '<p>Spinal stenosis occurs when the space around your spinal cord narrows and causes pressure on your nerve roots. The main cause is wear-and-tear arthritis (osteoarthritis). As cartilage wears away, bone rubs against bone. This can result in an overgrowth of bone (bone spurs) that intrudes into spinal cord space.</p>\r\n\r\n<p>After a physical examination, your doctor will likely want to order some tests to determine the cause of your symptoms. Imaging tests, such as X-rays, MRI scans, and CT scans can provide detailed pictures of your spine.There is no cure for spinal stenosis, but there are treatments to help relieve symptoms. Over-the-counter anti-inflammatory medications can ease swelling and pain. If they don&rsquo;t do the trick, your doctor can prescribe higher-dose medication.</p>\r\n\r\n<p>Regular exercise can help improve flexibility and balance, enabling you to move better. Not only is it good for your physical health, but it can also improve your sense of well-being. Doctor may also recommend cortisone injections. This anti-inflammatory drug is injected directly into the area of the spinal stenosis. Cortisone can significantly ease inflammation and pain. Its effects may be temporary, however, and you shouldn&rsquo;t have more than three injections in a single year.</p>', 'assets/uploads/department/91806.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:27:44', 'Admin', '2019-03-19 06:31:45'),
(7, '7', 'CANCER DEPARTMENT', '<p>The cancer treatment options your doctor recommends depends on the type and stage of cancer, possible side effects, and the patient&#39;s preferences and overall health. In cancer care, different types of doctors often work together to create a patient&#39;s overall treatment plan that combines different types of treatments.</p>\r\n\r\n<p>Cells are the basic units that make up the human body. Cells grow and divide to make new cells as the body needs them. Usually, cells die when they get too old or damaged. Then, new cells take their place. Cancer begins when genetic changes interfere with this orderly process. Cells start to grow uncontrollably. These cells may form a mass called a tumor. A tumor can be cancerous or benign.</p>\r\n\r\n<p>A benign tumor means the tumor can grow but will not spread.A carcinoma begins in the skin or the tissue that covers the surface of internal organs and glands. Carcinomas usually form solid tumors. They are the most common type of cancer. Examples of carcinomas include prostate cancer, breast cancer, lung cancer, and colorectal cancer.A sarcoma begins in the tissues that support and connect the body.</p>', 'assets/uploads/department/38650.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:28:04', 'Admin', '2019-03-19 06:34:36'),
(8, '8', 'NEUROLOGY & NEUROSURGERY DEPARTMENT', '<p>Neurological disorders are related to any abnormal functions of the nervous system due to various conditions resulting from brain abnormalities, chemical interference, or spinal cord disorders. The nervous system consists of the brain, spinal cord, and nerves that enable you to function and go about your daily activities. A neurological disorder can affect any of these vital functions of your body, resulting in the inability to function properly on a daily basis.</p>\r\n\r\n<p>R.K Hospital and Neurosurgery is committed to providing patients with individualised care. The institutes specialise in diseases of the brain, spinal cord, muscles, and nerves. Apollo Hospitals carries out over 10,000 major neurosurgical operations yearly. The Institutes are equipped with the latest state-of-the-art diagnostics and surgical equipment, including CyberKnife, stereotactic &amp; Micro Neurosurgery.</p>\r\n\r\n<p>A benign tumor means the tumor can grow but will not spread.A carcinoma begins in the skin or the tissue that covers the surface of internal organs and glands. Carcinomas usually form solid tumors. They are the most common type of cancer. Examples of carcinomas include prostate cancer, breast cancer, lung cancer, and colorectal cancer.A sarcoma begins in the tissues that support and connect the body.</p>', 'assets/uploads/department/60113.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:28:21', 'Admin', '2019-03-19 06:31:59'),
(9, '9', 'PEDIATRIC DEPARTMENT', '<p>India needs a cohesive educational policy for both primary education and higher learning, each fraught with their own set of challenges. ASER data has shown that despite an increase in privatisation, there has been no significant increase in learning outcomes. Instead, efforts at strengthening the institutional linkages of primary learning are required. On the other hand, there is a troublesome attempt to demolish any and all credibility of institutions of higher learning that have built themselves as centres of reputable teaching and research after years of effort. In institutes like ICHR, FTII and NMML for example, the tactic employed has been politically charged nepotism through the insertion of proxy heads. Government action has rendered universities into political battlegrounds and this is likely to hurt not just the students but also these important institutions.</p>\r\n\r\n<p><strong>AIPC Position</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>The AIPC will focus on youth capacity building, education, leadership and development.</li>\r\n	<li>The AIPC will emphasize and support affordable and quality education. We will keep education at the very top of our development agenda.</li>\r\n	<li>Education is the backbone of human development and is vital to ensuring equitable social, political and economic opportunities for all citizens.</li>\r\n	<li>The AIPC believes that it is necessary to focus on improving the quality of education- we will move from &ldquo;Sarva Shiksha Abhiyan&rdquo; to &ldquo;Shreshth Shiksha Abhiyan.&rdquo;</li>\r\n	<li>We need to ensure quality learning outcomes, adequate infrastructure and facilities in schools, regular teacher training and an optimal Pupil Teacher Ratio.</li>\r\n	<li>AIPC will also advocate the need to ensure quality in teacher training by making suitable investments and amendments to regulations, wherever required.</li>\r\n	<li>The AIPC will help establish an independent regulatory mechanism to oversee State and private institutions to ensure quality standards.</li>\r\n	<li>We will support regional and context specific curricula as well as focus on developing life skills including leadership development.</li>\r\n	<li>We are committed to the cause of special education. We will lobby for strengthening facilities for children with special needs and disabilities.</li>\r\n	<li>The AIPC will explore possible partnerships with the private sector in the delivery of education. New Public Private Partnership could be developed as ideas for further government action.</li>\r\n</ul>', 'assets/uploads/department/73378.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:28:38', 'Admin', '2019-03-19 06:32:21'),
(10, '0', 'Sanitation and Solid Waste Management', '<p>Research has shown that a direct relationship exists between water, sanitation, health, nutrition, and human development. Consumption of contaminated drinking water, improper disposal of human excreta, lack of personal and food hygiene, and improper disposal of solid and liquid wastes are major causes of disease in India. Providing accessible, affordable, and equitable sanitation, to all sections of the population is very important.</p>\r\n\r\n<p><strong>AIPC Position</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Almost 60% of open defecation in the world takes place in India. Poor sanitation is a serious health hazard. AIPC will help create awareness of the need for a functional toilet in every school and every household.</li>\r\n	<li>The AIPC will support efforts to improve quality of life in rural areas by promoting cleanliness, hygiene, and eliminating open defecation</li>\r\n	<li>In both urban and rural areas, AIPC will advocate the need for developing solid &amp; liquid waste management systems.</li>\r\n	<li>The AIPC should promote appropriate policies and institutions to ensure all stakeholders are aware of the framework in which clean water and sanitation services are being provided.</li>\r\n	<li>We will also promote medium-term thinking around sanitation issues, including on infrastructure and necessary financing.</li>\r\n</ul>', 'assets/uploads/department/31487.jpg', 'Y', 'HSR', 'Admin', '2018-12-21 11:28:55', 'Admin', '2019-03-19 06:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(255) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `state_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `state_id`) VALUES
(1, 'Ariyalur', 31),
(2, 'Chennai', 31),
(3, 'Coimbatore', 31),
(4, 'Cuddalore', 31),
(5, 'Dharmapuri', 31),
(6, 'Dindigul', 31),
(7, 'Erode', 31),
(8, 'Kanchipuram', 31),
(9, 'Kanyakumari', 31),
(10, 'Karur', 31),
(11, 'Krishnagiri', 31),
(12, 'Madurai', 31),
(13, 'Nagapattinam', 31),
(14, 'Namakkal', 31),
(15, 'Nilgiris', 31),
(16, 'Perambalur', 31),
(17, 'Pudukkottai', 31),
(18, 'Ramanathapuram', 31),
(19, 'Salem', 31),
(20, 'Sivaganga', 31),
(21, 'Thanjavur', 31),
(22, 'Theni', 31),
(23, 'Thoothukudi (Tuticorin)', 31),
(24, 'Tiruchirappalli', 31),
(25, 'Tirunelveli', 31),
(26, 'Tiruppur', 31),
(27, 'Tiruvallur', 31),
(28, 'Tiruvannamalai', 31),
(29, 'Tiruvarur', 31),
(30, 'Vellore', 31),
(31, 'Viluppuram', 31),
(32, 'Virudhunagar', 31);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `UniqueId` int(11) NOT NULL,
  `DoctorName` varchar(300) NOT NULL,
  `DoctorDesignation` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `List` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `UniqueId` int(11) NOT NULL,
  `ProductId` varchar(255) NOT NULL,
  `EmailId` varchar(300) NOT NULL,
  `Feedback` varchar(300) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mstrcategory`
--

CREATE TABLE `mstrcategory` (
  `UniqueId` int(11) NOT NULL,
  `CategoryName` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `BranchCode` varchar(250) NOT NULL,
  `CreatedBy` varchar(250) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(250) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstrcategory`
--

INSERT INTO `mstrcategory` (`UniqueId`, `CategoryName`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(2, 'CARDIOLOGIST DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-19 00:00:00', 'Admin', '2018-12-22 11:24:00'),
(3, 'ORTHOPAEDICS DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:44:47', 'Admin', '2018-12-22 11:24:16'),
(4, 'DIABETOLOGY DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:45:07', 'Admin', '2018-12-22 11:24:32'),
(5, 'NEPHROLOGY DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:45:32', 'Admin', '2018-12-22 11:24:44'),
(6, 'SPINAL DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:45:44', 'Admin', '2018-12-22 11:24:56'),
(7, 'CANCER DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:46:01', 'Admin', '2018-12-22 11:25:09'),
(8, 'NEUROLOGY & NEUROSURGERY DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:46:15', 'Admin', '2018-12-22 11:25:25'),
(9, 'PEDIATRIC DEPARTMENT', 'Y', 'HSR', 'Admin', '2018-12-20 09:47:10', 'Admin', '2018-12-22 11:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `mstrproduct`
--

CREATE TABLE `mstrproduct` (
  `UniqueId` int(11) NOT NULL,
  `CategoryCode` varchar(150) NOT NULL,
  `ProductCode` int(255) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstrproduct`
--

INSERT INTO `mstrproduct` (`UniqueId`, `CategoryCode`, `ProductCode`, `ProductName`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, '1', 232323, 'new', 'assets/uploads/99495.jpg', 'dfsdfdsf', 'Y', 'HSR', 'Admin', '2018-12-14 08:32:41', 'Admin', '2018-12-14 09:19:45'),
(2, '2', 1234, 'new2', 'assets/uploads/12592.jpg', 'ok2', 'Y', 'HSR', 'Admin', '2018-12-14 08:46:37', 'Admin', '2018-12-15 09:31:30'),
(4, '1', 1212, 'new four', 'assets/uploads/55194.jpg', 'okkk', 'Y', 'HSR', 'Admin', '2018-12-15 09:30:47', NULL, NULL),
(5, '1', 121212, 'new five', 'assets/uploads/47170.jpg', 'ok', 'Y', 'HSR', 'Admin', '2018-12-15 09:31:02', NULL, NULL),
(6, '2', 2323, 'new two', 'assets/uploads/45551.jpg', 'ok', 'Y', 'HSR', 'Admin', '2018-12-15 09:31:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mstrsupplier`
--

CREATE TABLE `mstrsupplier` (
  `UniqueId` int(11) NOT NULL,
  `SupplierCode` varchar(150) NOT NULL,
  `SupplierName` varchar(300) NOT NULL,
  `ContactPerson` varchar(250) NOT NULL,
  `Area` varchar(250) NOT NULL,
  `Place` varchar(250) NOT NULL,
  `Religion` varchar(250) NOT NULL,
  `SoftwareCode` varchar(250) NOT NULL,
  `State` varchar(250) NOT NULL,
  `Address` varchar(1500) NOT NULL,
  `PinCode` decimal(10,0) NOT NULL,
  `MobileNo` decimal(10,0) DEFAULT NULL,
  `mob2` decimal(10,0) DEFAULT NULL,
  `EmailId` varchar(150) DEFAULT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(300) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstrsupplier`
--

INSERT INTO `mstrsupplier` (`UniqueId`, `SupplierCode`, `SupplierName`, `ContactPerson`, `Area`, `Place`, `Religion`, `SoftwareCode`, `State`, `Address`, `PinCode`, `MobileNo`, `mob2`, `EmailId`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, '1', 'Prasanth', 'Prasanth', '1', '1', '1', '1', '1', 'Hosur', '635109', '7200523109', NULL, NULL, 'Y', 'HSR', 'Admin', '2018-12-10 16:51:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `UniqueId` int(11) NOT NULL,
  `NewsType` varchar(255) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL,
  `PDF` varchar(255) DEFAULT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`UniqueId`, `NewsType`, `Title`, `Photo`, `Description`, `Date`, `PDF`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(7, 'News', 'Is India being REDEFINED? An AIPC National Interactive - curated by AIPC Delhi', 'assets/uploads/news/83539.jpg', '..', '20-12-2018', NULL, 'Y', 'HSR', 'Admin', '2018-12-20 10:31:36', 'Admin', '2018-12-20 10:57:16'),
(8, 'Events', 'Event', 'assets/uploads/news/44978.jpg', '..', '20-12-2018', NULL, 'Y', 'HSR', 'Admin', '2018-12-20 11:02:22', NULL, NULL),
(9, 'Whitepapers', 'q', 'assets/uploads/news/product-unknow.jpg', 'q', '20-12-2018', '', 'Y', 'HSR', 'Admin', '2018-12-20 11:51:32', 'Admin', '2018-12-20 12:04:58'),
(10, 'News', 'saas', 'assets/uploads/news/48337.jpg', 'asdsad', '13-12-2018', '', 'Y', 'HSR', 'Admin', '2018-12-20 11:53:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE `overview` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`UniqueId`, `Title`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(4, 'SPECIALITIES OVERVIEW', 'assets/uploads/overview/90045.jpg', 'Trusted by over 45,000 mothers. At R.K Hospitals, we understand that your life takes a colossal turn the moment you find out you are expecting a child.As India’s premier healthcare center dedicated to woman and child care, we understand the complexities of women’s health. In an endeavour to enhance customer convenience, R.K Hospitals started the initiative of offering Cryonine stem cell services.', 'Y', 'HSR', 'Admin', '2018-12-14 12:48:52', 'Admin', '2019-03-19 06:51:58'),
(5, 'MATERNITY', 'assets/uploads/overview/21063.jpg', 'At R.K Pregnancy Hospital, we believe that a child is life’s greatest gift and pregnancy is one of the most magical experiences one can go through. We can ensure you have a healthy and happy pregnancy, with the help of our team of Pregnancy doctors and nurses providing you with the best pregnancy care. With world-class medical expertise, state-of-the-art facilities, a space filled with love and laughter and dedicated staff, we’ll ensure the holistic well-being of you and your baby is taken care of.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:13', 'Admin', '2019-03-19 06:52:07'),
(6, 'PAEDIATRICS', 'assets/uploads/overview/45250.jpg', 'R.K Hospitals have a simple and valuable mission of providing quality care to the new born babies and children up to 18 years of age. The consultants here are not only a source of medical care but also information, advice, compassion and support, working cohesively 24×7 throughout a year. At any given time, one of them is always available to treat your baby.Hence, whichever doctor examines the child at any stage is fully aware of the child’s history. So there is no reason to worry if your regular Paediatrician is away or not available in times of need.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:36', 'Admin', '2019-03-19 06:52:17'),
(7, 'INTENSIVE CARE', 'assets/uploads/overview/64456.jpg', 'At R.K, we are thoroughly prepared to take on even the most complicated cases. In order to deliver truly reliable intensive care. We provide specialized nursery care for babies from 24 weeks gestation onwards. Premature babies (born before 37 weeks & after 24 weeks gestation) and sick babies are clinically assessed and cared for in the NICU until they can be transferred to the ward.Once your baby is ready to be discharged from NICU, we ensure that you are ready and confident about handling your new born. We provide a home-like environment in our Luxury room and guide and support you in this transition phase.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:57', 'Admin', '2019-03-19 06:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`UniqueId`, `Title`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(11, 'Indian National Congress', 'assets/uploads/parent/15714.png', '<p>All India Professionals&rsquo; Congress (AIPC) is an official department of the Indian National Congress (INC). The INC has always been the champion of liberal and secular politics in the country. Recognizing the need to enable professionals to contribute to the political discourse on India, the Indian National Congress (INC) launched the All India Professionals&rsquo; Congress (AIPC) in July 2017.&nbsp;<br />\r\n<br />\r\nThe Indian National Congress (INC) is the largest and oldest democratically-operating political parties in the world.</p>', 'Y', 'HSR', 'Admin', '2018-12-20 08:18:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `UniqueId` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`UniqueId`, `Type`, `Name`, `Photo`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(10, 'CAMP', 'Room', 'assets/uploads/portfolio/96946.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:03:37', NULL, NULL),
(11, 'PROGRAMS', 'CAMP1', 'assets/uploads/portfolio/74464.PNG', 'Y', 'HSR', 'Admin', '2019-03-19 15:03:56', 'Admin', '2019-03-19 15:12:06'),
(12, 'PROGRAMS', 'Block', 'assets/uploads/portfolio/35783.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:04:10', NULL, NULL),
(13, 'PROGRAMS', 'CAMP3', 'assets/uploads/portfolio/89791.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:04:20', NULL, NULL),
(14, 'SURGERY', 'Room', 'assets/uploads/portfolio/87235.jpeg', 'Y', 'HSR', 'Admin', '2019-03-19 15:04:30', NULL, NULL),
(15, 'PROGRAMS', 'CAMP3', 'assets/uploads/portfolio/62917.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:04:40', NULL, NULL),
(16, 'SURGERY', 'Block', 'assets/uploads/portfolio/91589.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:01', NULL, NULL),
(17, 'PROGRAMS', 'Block', 'assets/uploads/portfolio/35285.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:10', 'Admin', '2019-03-19 15:19:43'),
(18, 'ATMOSPHERE', 'Room', 'assets/uploads/portfolio/94829.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:17', NULL, NULL),
(19, 'PROGRAMS', 'Room', 'assets/uploads/portfolio/39907.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:25', NULL, NULL),
(20, 'PROGRAMS', 'CAMP1', 'assets/uploads/portfolio/21630.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:33', NULL, NULL),
(21, 'PROGRAMS', 'Room', 'assets/uploads/portfolio/84348.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:41', NULL, NULL),
(22, 'PROGRAMS', 'Room', 'assets/uploads/portfolio/60733.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:05:56', NULL, NULL),
(23, 'PROGRAMS', 'Room', 'assets/uploads/portfolio/54435.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:05', NULL, NULL),
(24, 'ATMOSPHERE', 'Block', 'assets/uploads/portfolio/13176.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:16', 'Admin', '2019-03-19 15:13:20'),
(25, 'PROGRAMS', 'Block', 'assets/uploads/portfolio/13843.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:24', NULL, NULL),
(26, 'PROGRAMS', 'CAMP3', 'assets/uploads/portfolio/80637.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:32', NULL, NULL),
(27, 'PROGRAMS', 'Block', 'assets/uploads/portfolio/42056.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:40', NULL, NULL),
(28, 'ATMOSPHERE', 'Block', 'assets/uploads/portfolio/63329.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:06:48', NULL, NULL),
(29, 'SURGERY', 'Room', 'assets/uploads/portfolio/40990.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:07:01', NULL, NULL),
(30, 'PROGRAMS', 'Block', 'assets/uploads/portfolio/90910.jpg', 'Y', 'HSR', 'Admin', '2019-03-19 15:07:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `principle`
--

CREATE TABLE `principle` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principle`
--

INSERT INTO `principle` (`UniqueId`, `Title`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'Our Vision', 'Committed to provide health care of the best standards in all specialities to women and children with compassion and highest ethical standards', 'Y', 'HSR', 'Admin', '2018-12-14 12:18:12', 'Admin', '2019-03-19 05:39:40'),
(2, 'Our Mission', '‘ To provide the best possible standard of care for  patients - women & children and to establish a dedicated referral centre to our colleagues, allowing them to manage their patients with our experience and expertise’.', 'Y', 'HSR', 'Admin', '2018-12-14 12:24:11', 'Admin', '2019-03-19 05:40:03'),
(3, 'Our journey', 'R K Hospital for women & children has a 40 years legacy behind  Our journey started in 1977 at shivaji nagar , Thanjavur by our respected DR.R.KRISHNAMURTHY MBBS., NHS(U.K.)', 'Y', 'HSR', 'Admin', '2019-03-19 14:27:55', 'Admin', '2019-03-19 14:28:34'),
(4, 'THE DREAM OF PARENTHOOD COMES TRUE', 'The journey through fertility treatment can be a long road and this can be achieved through several paths.\r\nWe try to make this transition easy to experience the most beautiful moment  of our life  - The Parenthood', 'Y', 'HSR', 'Admin', '2019-03-19 14:37:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `UniqueId` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`UniqueId`, `Name`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(12, 'fdgdfgdfg', 'Y', 'HSR', 'Admin', '2018-12-20 13:03:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `UniqueId` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(1500) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`UniqueId`, `Title`, `Photo`, `Description`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(4, 'CARDIOLOGY', 'assets/uploads/service/70081.png', 'Fuelled by a motive to serve all sections of the society.', 'Y', 'HSR', 'Admin', '2018-12-14 12:48:52', 'Admin', '2018-12-23 09:25:45'),
(5, 'LAPAROSCOPIC SURGERY', 'assets/uploads/service/46771.png', 'Tremendous changes in General Surgery and advanced patient care.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:13', 'Admin', '2018-12-23 09:26:00'),
(6, 'WOMEN HEALTH', 'assets/uploads/service/70193.png', 'woman has a significant impact on health of biological differences.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:36', 'Admin', '2018-12-23 09:26:09'),
(7, 'HEALTH CARE', 'assets/uploads/service/72154.png', 'The maintenance or improvement of health via the prevention, diagnosis, and treatment of disease.', 'Y', 'HSR', 'Admin', '2018-12-14 12:49:57', 'Admin', '2018-12-23 09:26:18'),
(8, 'ANESTHESIOLOGY', 'assets/uploads/service/99707.png', 'Anesthesia is a medical specialty concerned with the administration of medication to aid pain management.', 'Y', 'HSR', 'Admin', '2018-12-22 11:17:43', 'Admin', '2018-12-23 09:26:26'),
(9, 'EMERGENCY HELP', 'assets/uploads/service/29332.png', 'R.K Hospital’s “next generation Responder” makes medical transportation safer for patients.', 'Y', 'HSR', 'Admin', '2018-12-22 11:17:57', 'Admin', '2018-12-23 09:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `subcribe`
--

CREATE TABLE `subcribe` (
  `UniqueId` int(11) NOT NULL,
  `EmailId` varchar(300) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcribe`
--

INSERT INTO `subcribe` (`UniqueId`, `EmailId`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'sabari@gmail.com', 'Y', 'HSR', 'Admin', '2018-12-14 11:07:26', 'Admin', '2018-12-14 13:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `userrights`
--

CREATE TABLE `userrights` (
  `UniqueId` int(11) NOT NULL,
  `User` varchar(250) NOT NULL,
  `Dashboard` varchar(250) NOT NULL,
  `Setting` varchar(250) NOT NULL,
  `Master` varchar(250) NOT NULL,
  `Sms` varchar(250) NOT NULL,
  `Report` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `BranchCode` varchar(250) NOT NULL,
  `CreatedBy` varchar(250) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(250) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrights`
--

INSERT INTO `userrights` (`UniqueId`, `User`, `Dashboard`, `Setting`, `Master`, `Sms`, `Report`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, '1', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'HSR', 'Admin', '2018-12-10 09:51:18', 'Admin', '2018-12-14 14:14:03'),
(2, '2', 'Y', 'N', 'N', 'Y', 'Y', 'Y', 'HSR', 'Admin', '2018-12-10 11:18:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BranchCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `status`, `BranchCode`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@gmail.com', '$2y$10$YeRA8KV6.S4CCZWvhAIxg.O1.Aa3Ffq4/yqu0wSfMSw4T.TwUJ9hS', 't26WrCiwWerSyiQJILjK7M7eW3xlU3b73mIRMzCgu3OxuolpJn9LCJhVqx61', 'Admin', 'Y', 'HSR', '2018-11-20 05:03:00', '2018-11-21 05:19:16'),
(3, 'sabari', 'sabari@gmail.com', '$2y$10$Zl48fpHf7W/hh94BkhC5ye4zWcsHnD9.vD2lEyZxaXSFVCIVs3wHO', NULL, 'User', 'N', 'HSR', '2018-12-21 23:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websitesetting`
--

CREATE TABLE `websitesetting` (
  `UniqueId` int(11) NOT NULL,
  `WebSiteName` varchar(300) NOT NULL,
  `ContactPersonName` varchar(1500) NOT NULL,
  `ContactNo` varchar(250) NOT NULL,
  `MailID` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `FaceBookUrl` varchar(255) DEFAULT NULL,
  `InstagramUrl` varchar(255) DEFAULT NULL,
  `TwitterUrl` varchar(255) DEFAULT NULL,
  `GooglePlusUrl` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `BranchCode` varchar(150) NOT NULL,
  `CreatedBy` varchar(150) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdatedBy` varchar(150) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websitesetting`
--

INSERT INTO `websitesetting` (`UniqueId`, `WebSiteName`, `ContactPersonName`, `ContactNo`, `MailID`, `Address`, `FaceBookUrl`, `InstagramUrl`, `TwitterUrl`, `GooglePlusUrl`, `Logo`, `Status`, `BranchCode`, `CreatedBy`, `CreateDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'R.K.Hospital', 'R.K.Hospital', '+91 9380312340', 'info@rkhospital.com', 'VOC Nagar 1st Cross,\r\nThanjavur-613007,\r\nTamil Nadu,Hosur.', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://twitter.com/', 'https://plus.google.com/discover', 'assets/uploads/logo/88461.png', 'Y', 'HSR', 'Admin', '2018-12-10 15:17:35', 'Admin', '2019-03-19 14:41:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `companysetting`
--
ALTER TABLE `companysetting`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstrcategory`
--
ALTER TABLE `mstrcategory`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `mstrproduct`
--
ALTER TABLE `mstrproduct`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `mstrsupplier`
--
ALTER TABLE `mstrsupplier`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `overview`
--
ALTER TABLE `overview`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `principle`
--
ALTER TABLE `principle`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `subcribe`
--
ALTER TABLE `subcribe`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `userrights`
--
ALTER TABLE `userrights`
  ADD PRIMARY KEY (`UniqueId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitesetting`
--
ALTER TABLE `websitesetting`
  ADD PRIMARY KEY (`UniqueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companysetting`
--
ALTER TABLE `companysetting`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mstrcategory`
--
ALTER TABLE `mstrcategory`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mstrproduct`
--
ALTER TABLE `mstrproduct`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mstrsupplier`
--
ALTER TABLE `mstrsupplier`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `overview`
--
ALTER TABLE `overview`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `principle`
--
ALTER TABLE `principle`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcribe`
--
ALTER TABLE `subcribe`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userrights`
--
ALTER TABLE `userrights`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `websitesetting`
--
ALTER TABLE `websitesetting`
  MODIFY `UniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
