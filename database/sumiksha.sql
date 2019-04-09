
/************************** ALTER TABLE `refer_earn` ADD `required_loan` 27/03/2019 ***************************/
ALTER TABLE `refer_earn` ADD `required_loan` VARCHAR(255) NULL AFTER `sub_product_id`, ADD `approve_loan` VARCHAR(255) NULL AFTER `required_loan`, ADD `state_id` INT NULL AFTER `approve_loan`, ADD `city_id` INT NULL AFTER `state_id`;


/************************** ALTER TABLE `refer_earn` ADD `required_loan` 27/03/2019 ***************************/
ALTER TABLE `refer_earn` ADD `login_bank` VARCHAR(255) NULL AFTER `reject_reason`, ADD `login_date` VARCHAR(255) NULL AFTER `login_bank`;

ALTER TABLE `course1` CHANGE `banner_description` `information` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `course1` CHANGE `description` `current_roi` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `course1` ADD `features` LONGTEXT NOT NULL AFTER `current_roi`;

ALTER TABLE `course1` CHANGE `information` `information` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `current_roi` `current_roi` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `features` `features` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `login` ADD `verify_token` TEXT NULL DEFAULT NULL AFTER `password`;


/************************** ALTER TABLE `refer_earn` ADD `required_loan` 30/03/2019 ***************************/
ALTER TABLE `business_enquiry` ADD `middle_name` VARCHAR(255) NULL AFTER `upload_pdf`, ADD `last_name` VARCHAR(255) NULL AFTER `middle_name`, ADD `dob` VARCHAR(255) NULL AFTER `last_name`, ADD `father_name` VARCHAR(255) NULL AFTER `dob`, ADD `mother_name` VARCHAR(255) NULL AFTER `father_name`, ADD `qualification` VARCHAR(255) NULL AFTER `mother_name`, ADD `propriter` VARCHAR(255) NULL AFTER `qualification`, ADD `office_phone` VARCHAR(12) NULL AFTER `propriter`, ADD `landmark` VARCHAR(255) NULL AFTER `office_phone`, ADD `alternate_card_no` VARCHAR(255) NULL AFTER `landmark`, ADD `designation` VARCHAR(255) NULL AFTER `alternate_card_no`, ADD `current_employment` VARCHAR(255) NULL AFTER `designation`, ADD `work_experience` VARCHAR(255) NULL AFTER `current_employment`, ADD `mailing_address` VARCHAR(255) NULL AFTER `work_experience`;

ALTER TABLE `business_enquiry` ADD `qb_format` INT NULL AFTER `mailing_address`;

/************************** ALTER TABLE `refer_earn` ADD `required_loan` 30/03/2019 ***************************/
ALTER TABLE `business_enquiry` CHANGE `qb_format` `qb_format` VARCHAR(11) NULL DEFAULT NULL;

/************************** ALTER TABLE `refer_earn` ADD `required_loan` 03/04/2019 ***************************/
ALTER TABLE `refer_earn` ADD `net_premium` VARCHAR(255) NULL AFTER `login_date`, ADD `tp` VARCHAR(255) NULL AFTER `net_premium`;

/************************** ALTER TABLE `refer_earn` ADD `required_loan` 03/04/2019 ***************************/
ALTER TABLE `refer_earn` ADD `upload_file` VARCHAR(255) NULL AFTER `tp`;

/************************** ALTER TABLE `credit_card_features` ADD `required_loan` 05/04/2019 ***************************/
CREATE TABLE `credit_card_features` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sub_course_id` int(11) NOT NULL,
  `card_type_id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `annual_fees` varchar(255) NOT NULL,
  `card_details` longtext NOT NULL,
  `card_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card_features`
--

INSERT INTO `credit_card_features` (`id`, `course_id`, `sub_course_id`, `card_type_id`, `card_name`, `annual_fees`, `card_details`, `card_image`, `created_at`, `status`) VALUES
(1, 8, 32, 1, 'Jet Airways ICICI Bank Coral American Express Credit Card', '1250', '<p>hi</p>', 'c67lSeksMj.png', '2019-04-05 16:47:31', 1),
(2, 8, 32, 3, 'ICICI Bank Ferrari Signature Credit Card', '3999', '<p><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" medium;\"=\"\">VISA Lounge access -Complimentary access to Airport Lounges in India. Savings on Fuel Purchases - Get a&nbsp;complete waiver of 1% on fuel surcharge every time you refuel.</span><br></p>', 'cZYfQnBr9a.png', '2019-04-05 16:56:30', 1),
(3, 8, 32, 4, 'ICICI Bank Rubyx Credit Cards', '2000', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;; font-size: medium;\">Get up to 2 complimentary rounds/lessons of golf every calendar month if the total retail spending on the card is equal to or more than Rs 50,000 during the previous calendar month. Get Air accident insurance cover of Rs 1 crore. Get Lost card liability of Rs 50,000 that includes a loss up to 2 days prior to reporting the same.</span><br></p>', 'pDA5nlRki2.png', '2019-04-05 17:02:15', 1),
(4, 8, 33, 1, 'HDFC Superia Credit Card', '1000', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;; font-size: medium;\">Power Dining- Get 50% more rewards when you dine with HDFC Superia Credit Card.&nbsp; Rewards points validity is for a period of 2 years from the date of accumulation.</span><br></p>', 'pyYJVwEelH.png', '2019-04-05 17:37:23', 1),
(5, 8, 33, 2, 'HDFC Bank MoneyBack Card', '500', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;; font-size: medium;\">Earn zero lost card liability post reporting the loss of the card. Spend Rs 50,000 in a quarter and get an e-voucher worth Rs 500.&nbsp; Get 1% fuel surcharge waived off on fuel transactions wherein the minimum transaction should be for Rs 400. Get revolving credit facility at a nominal interest rate.</span><br></p>', 'zLHsIRVhit.png', '2019-04-05 17:39:29', 1),
(6, 8, 33, 3, 'HDFC Bank Platinum Times Card', '1000', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;; font-size: medium;\">Zero liability on the lost card â€“ In case of loss of the credit card, the cardholder has to report the matter immediately to the customer care center. Post reporting about the loss of card, the cardholder is entitled to carry zero liability on any fraudulent transactions made with the card. The validity of Reward Points- The reward points are valid only for a period of 2 years from the date of accumulation of points.</span><br></p>', 'Aknx71YuzG.png', '2019-04-05 17:43:38', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_card_features`
--
ALTER TABLE `credit_card_features`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_card_features`
--
ALTER TABLE `credit_card_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/************************** ALTER TABLE `business_enquiry` ADD `card_name` 09/04/2019 ***************************/
ALTER TABLE `business_enquiry` ADD `card_name` VARCHAR(255) NULL AFTER `qb_format`;