-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 10:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `username`, `password_hash`) VALUES
(6, 'phgthanhng', '$2y$10$ZnlZ6hO26GbC0ujkSi867eWqgx791W4UfImDk133p1OMhY6ZLCVGy'),
(15, 'Jiahui', '$2y$10$vF8igfakJdKDlwbuWAh9huOjz6c.A0bPxNDaVrrHmR/nzEvIH93Wm'),
(16, '111', '$2y$10$JHugM9gvxGEu05IzC8gXJeob.PCYWIznD/PtuloLwEXufElDFZN8G'),
(17, 'hahahahaha', '$2y$10$z8KWxAXnub3QEcLVokO4bOvsosQ6.Se6.IxS1J6kD6Azbz1kJgzsy'),
(18, 'Phyllis', '$2y$10$s5ntiHCJuRLRXb9KHnxb2eCzSFoiDoX3HwIa4vR5ZKwILDmtYM//u'),
(19, 'Jonathan', '$2y$10$1OulyZ6px5UsQelQKmTAcutKXXiuxfCqhaWLK3zGaygYjJFB2AhmG');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(20) NOT NULL,
  `author_id` int(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `author_id`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 6, 'Phuong Thanh', '', 'Nguyen'),
(6, 15, 'Jiahui', '', 'Xia'),
(7, 16, 'huizi', 'jia', 'Xia'),
(8, 17, 'Chilka', 'Karen', 'Langston'),
(9, 18, 'Phyllis', 'H.', 'Floyd'),
(10, 19, 'Jonathan', 'M.', 'Bunting');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(20) NOT NULL,
  `profile_id` int(20) NOT NULL,
  `publication_title` varchar(50) NOT NULL,
  `publication_text` varchar(3000) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `publication_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(6, 1, 'This is another post', 'abc', '2022-03-16 23:12:03.000000', 'public'),
(15, 6, 'Black Rifle Coffee Has a Problem Most Companies Dr', 'Black Rifle Coffee has taken a certain amount of flak, particularly from a harsh July 2021 article describing its resonance and popularity with the American extreme right-wing.\r\n\r\nThe company, which says it was founded in 2014 to support veterans, active-duty military, first responders, and average coffee consumers, is a relatively small but ambitious and growing player in a sharply competitive sector. \r\n\r\nCoffee is dominated by Starbucks  (SBUX) - Get Starbucks Corporation Report but features massively popular companies like Dunkin’ Brands, Tim Hortons  (QSR) - Get Restaurant Brands International Inc Report, Peet’s, and Blue Bottle. And coffee is sold everywhere, from McDonald’s  (MCD) - Get McDonald\'s Corporation Report to, well, everywhere.\r\n\r\nBut notwithstanding the New York Times magazine feature, the upstart coffee retailer and coffee-bar chain also has an enormous advantage, described by Co-Chief Executive Tom Davin on the fourth-quarter-earnings conference call as a “large and growing community who love interacting with our brand on a daily basis.”\r\n\r\nBRC Inc.,  (BRCC) - Get BRC Inc Class A Report the Salt Lake City parent of Black Rifle Coffee, went public on Feb. 10 in a merger with a special purpose acquisition company. \r\n\r\nAnd on March 16, the company reported that it swung to a fourth-quarter loss from a year-earlier profit as inflation lifted costs of production and shipping, among other factors. The stock in the past few weeks has wavered, from a bit below its $10 SPAC price to near $23.', '2022-03-20 20:36:33.000000', 'public'),
(16, 6, 'What Kind of Fruit Does a Rose Flower Produce', 'If left on the plant, rose hips will persist throughout most of winter, and they serve as an important food source for birds, deer, rabbits, squirrels. Once the flowers fade, visiting wildlife keeps the garden interesting and takes on new importance for gardeners. If you want to attract wildlife, consider planting R. rugosa, a species that produces an abundant crop of large, ornamental hips. There are many native or \"wild\" species that require very little attention and produce an abundance of hips.\r\n\r\nBe careful if you find multiflora rose (R. multiflora), which has a tendency to take over yards and is nearly impossible to fully remove once it has spread. This plant is considered a noxious, invasive weed in many parts of the United States.', '2022-03-20 20:38:15.000000', 'public'),
(17, 6, 'What Are the Functions of the Cherokee Rose Flower', 'The Cherokee rose flower attracts pollinators that transfer pollen between plants. The result: Cherokee rose plants reproduce and the number of plants increase. But pollinators are not the only ones that seek out the large, open, white rose flowers. Planted in the garden, this climbing wild rose adds floral interest with large, fragrant blossoms. Cherokee rose (Rosa laevigata) is hardy in U.S. Department of Agriculture plant hardiness zones 7 through 9.\r\n\r\nFlower Functions\r\nPlants produce flowers that attract pollinators. When a pollinator, such as a bee, hummingbird or a butterfly, visits multiple flowers of the same type of plant, it transfers pollen, and genetic information needed to reproduce, between the plants. Flower color, scent and shape are characteristics that developed to attract specific pollinators. The large, open, simple flowers of the Cherokee rose attract a variety of pollinators including bees, butterflies, flies and other insects.\r\n\r\nThe Flower\r\nCherokee rose flowers have the simple, five-petal, open structure characteristic of wild roses. The flowers are 4 inches in diameter and have creamy white petals. At the center, the yellow stamen is clearly exposed. The yellow stamen contains the pollen that visiting insects feed on and transfer between plants. The white petals attract pollinators and act as a landing pad for the feasting visitors. Cherokee rose plants flower in spring, producing abundant blossoms that fade by early summer.', '2022-03-20 20:38:46.000000', 'public'),
(18, 7, 'This blooming moss rose garden in Alappuzha is eve', 'Are you garden-person? A fan of flowers? Someone who finds it best relaxing to be in the middle of a plethora of colours bursting from the nature? Then this little garden in Alappuzha would entice you for sure.\r\n\r\nKappil Mathew Joseph, a civil police office at the Alappuzha South police station has been earning quite a name for growing and nurturing a yard full of Pathumani chedi or portulaca moss rose flowers. This young farmer grows the plants in half-an-acre of land at his home in Thathampally. The flowers that bloom at 10 in the morning surely offers a fabulous view.\r\n\r\nMathew Joseph has more than 100 varieties of portulaca moss rose in his collection. These shrubs are grown in more than 6000 grow bags. Mathew expanded his flower garden rigorously by obtaining as many varieties of the flowering plant he could find.\r\n\r\nMany throng to Mathew’s house to enjoy the mesmerizing view of the blooming garden, one of the largest in Alappuzha district.\r\n\r\nMathew began growing portulaca moss rose during the early days of the lockdown. He would tend to his beloved plants when he doesn’t have official duty. Interestingly, Mathew had made it a habit of gifting 10 plants each to those who visit the garden.', '2022-03-20 20:49:08.000000', 'public'),
(19, 7, 'FYI: You Should Be Cleaning Your Computer Screen A', 'You and your laptop have been though a lot together. Besides the usual typing and clicking, your computer has stuck by your side through countless cups of coffee, lunches, and snacks. Then, there are those almost-spills and pet hair incidents, or maybe even a few close calls with little ones running around (hey, it happens).\r\n\r\nAnd, if you work in an office, there are coworkers touching your screen to point things out, nearby coughs and sneezes, handshakes before typing up emails... you get the picture. Basically, your computer is around dirt and germs—yours and others\'—all day long.\r\n\r\nLaptops \"get thrown in bags, they travel, they find themselves under your couch,\" says Gary Power, co-founder and director of client services at Power Consulting Group, an IT consulting firm based in NYC. All that adds up to grimy screens, dirt-filled keyboards, and ports clogged with dust. So, it\'s important to have a quick and easy cleaning routine at the ready.\r\n\r\nStill wondering if your computer is *really* gross enough to need a deep clean? Even if it looks like new, your tech can harbor viruses, bacteria, molds, and even fungi, one study in the Journal of Medical Science and Clinical Research found. But researchers confirmed that just one cleaning can remove over 95 percent of germs and bacteria from a laptop\'s surfaces, so there\'s never been a better time to set aside a few minutes for a spring sprucing.\r\n\r\nAnd, if you use any additional accessories (like a Bluetooth keyboard or mouse), it\'s a good idea to give those a quick scrub, too, Power says. He adds cleaning isn\'t just great for your peace of mind—it can also extend the life of your tech, too.\r\n\r\nSo, what\'s the best way to make sure your laptop is germ-free? Ahead, learn how to clean your laptop screen and keyboard, according to the pros:\r\n\r\n1. Turn off your computer.\r\nStory continues\r\n\r\nBefore you grab any supplies, make sure all of your tech is completely turned off (not just in sleep mode). \"Remove the charger as well so that way there\'s no potential that there could be surges to it,\" explains Joe Silverman, founder of New York Computer Help.\r\n\r\nAfter you turn it off, your laptop is still warm. So, wait three to five minutes before you start to clean, advises Silverman: \"You don\'t want that heat to cause any issues when you\'re using some water on it.\" Once your computer has had a short rest, you\'re ready to go.\r\n\r\n2. Wipe down the screen.\r\nFirst up: the screen. A microfiber rag with water will do the trick—or, pick up some electronic wipes. Power recommends the brand WHOOSH! because \"it\'s one of the best screen cleaning and laptop cleaning devices out there.\" Go over the screen once or twice gently with your wipe or rag and make sure not to press too hard, Silverman adds.\r\n\r\n3. Avoid too much moisture.\r\nDon\'t apply the water or cleaning solution directly to your computer. As for your microfiber towel, just use a tiny amount of liquid. \"Worst case, you use too much liquid, and that could get within', '2022-03-20 20:54:28.000000', 'public'),
(20, 8, 'Fantasy Baseball Rankings 2022: Best sleepers from', 'MLB news continues to drop at a dizzying rate as Opening Day approaches on April 7. The Minnesota Twins were the somewhat surprising winners of the Carlos Correa sweepstakes, signing the star shortstop to a three-year, $105.3 million deal. He was one of the final major pieces in the free-agent puzzle, so the 2022 Fantasy baseball rankings are beginning to solidify.\r\n\r\nBut with a condensed spring training and plenty of signings and possible trades to come, there\'s a lot to factor when doing your 2022 Fantasy baseball draft prep. Who are the 2022 Fantasy baseball sleepers who will outperform their ADP this year? Before going on the clock, be sure to see the 2022 Fantasy baseball rankings and cheat sheets from the proven computer model at SportsLine.\r\n\r\nLast season, SportsLine\'s Projection Model identified several top Fantasy baseball sleepers, breakouts and busts, including Guardians designated hitter Franmil Reyes.\r\n\r\nReyes had a 2021 Fantasy baseball ADP outside the top 200 but the model predicted that he\'d outperform that draft position. The result: Reyes hit 30 home runs and drove in 85 in 115 games for Cleveland and slashed .254/.324/.522 for an OPS+ of 127. Anybody who followed its advice and picked up Reyes late in their Fantasy baseball drafts received a huge power boost in their Fantasy baseball lineups.\r\n\r\nThe SportsLine model is engineered by the same people who powered projections for all three major Fantasy sites. And that same group is sharing its 2022 Fantasy baseball rankings and cheat sheets over at SportsLine, helping you find Fantasy baseball sleepers, breakouts and busts long before your competition. Their cheat sheets, available for leagues on many major sites, are updated multiple times every day.\r\n\r\nAny time more MLB news comes out about the updated 2022 MLB schedule, free agency signings or Fantasy baseball injuries, the team at SportsLine updates its projections. Go to SportsLine now to see these proven Fantasy baseball cheat sheets.\r\n\r\nTop 2022 Fantasy baseball sleepers\r\nOne of the 2022 Fantasy baseball sleepers the model is projecting: Los Angeles Angels catcher Max Stassi. He\'s going undrafted in some leagues, but the model projects him as a player worth targeting late in drafts at a position where it\'s tough to find offense. He made some noise in the pandemic-shortened 2020 season, hitting .278 with seven home runs.\r\n\r\nIn 87 games last year, he produced a .241 average with 13 home runs and 35 RBI. He\'s projected to hit in the middle of a lineup that includes Shohei Ohtani, Mike Trout and Anthony Rendon, so there will be pitches to hit and opportunities to drive in runs. He\'s projected to finish in the same tier as players like Gary Sanchez and Mitch Garver, players with much higher ADPs, so Stassi is well-positioned to be a late-round steal. \r\n\r\nAnother sleeper that SportsLine\'s Fantasy baseball rankings 2022 are extremely high on: Brewers second baseman Kolten Wong. Wong had a sensational first season in Milwaukee, fin', '2022-03-20 21:05:16.000000', 'public'),
(21, 9, 'PGA Film Awards Push ‘CODA,’ ‘Summer of Soul,’ and', 'In a year when many awards voters saw their films on television and not in theaters, Netflix’s “The Power of the Dog” dominated predictive Oscar precursors: the Directors Guild, BAFTAs, and the Critics Choice Awards. But Jane Campion’s twisty ’20s western did not take them all.\r\n\r\nApple’s “CODA” has now won two powerful guild awards that could presage how Oscar members will vote: the Screen Actors and the Producers. Like “Parasite” in 2020, the SAG Ensemble award for “CODA” signaled widespread support for a low-budget indie, which broke out big at digital Sundance 2021 and generated interest from multiple buyers before AppleTV+ cleared the table with a $25 million buy.\r\n\r\nWith this pivotal win, “CODA” is now positioned to take home all three of its possible Oscars: Troy Kotsur in Supporting Actor, Sian Heder for Adapted Screenplay (who will likely win the WGA on Sunday), and Best Picture.\r\n\r\nRelated Related\r\n“CODA” winning the top PGA film award — which shows how a movie can move up the ranks with a preferential ballot — gives the heartfelt family drama a serious momentum boost just as Oscar voters fill out their ballots (which are due Tuesday).\r\n\r\nThat does not guarantee a Best Picture Oscar win. More often than not, the two awards match up. But in recent years, “The Big Short,” “La La Land,” and “1917” won the PGA but not the top Oscar, while Oscar-winners “Spotlight,” “Moonlight,” and “Parasite” did not score the top PGA nods.\r\n\r\n“CODA” is popular, and its story of a New England deaf family’s resilience under duress is resonating with mainstream awards voters. That’s key. Both SAG and PGA are more mainstream than Oscar voters, who went highbrow with this year’s nominations, including Guillermo del Toro’s hardboiled noir “Nightmare Alley” and three-hour Japanese Oscar entry “Drive My Car” among the top 10. (The PGA went with “Being the Ricardos and “Tick, Tick, Boom.”)\r\n\r\nAlong with the writers and actors, the more mainstream branches of the Academy most likely to vote for “CODA” are the executives, producers, and publicists. And some of these voters are among those who are not necessarily rooting for disruptive streamer Netflix to win Best Picture. “CODA” is the alternative to “The Power of the Dog,” as “Green Book” was to “Roma.”', '2022-03-20 21:10:47.000000', 'public'),
(22, 9, 'The COVID Variant That Could Define Your Summer', 'There are signs a new wave of COVID is building. BA.2, a more contagious cousin of the dominant BA.1 subvariant of the Omicron variant of SARS-CoV-2, has been spreading fast in Europe and China in recent weeks.\r\n\r\nNow it’s starting to show up more frequently in samples of waste water in major American cities, including Atlanta, New York City, Chicago, and Seattle, according to the U.S. Centers for Disease Control and Prevention.\r\n\r\nThe warning signs come as most of the U.S. and Europe drop the last few major restrictions on business, travel, schooling, and public gatherings. Stores and restaurants are fully open. Concerts and other events are back on. Mask mandates are disappearing.\r\n\r\nMitigation efforts ending at the same time cases are increasing might seem like a recipe for disaster. But don’t panic—at least not yet. We’re probably reasonably ready for BA.2, even without a bunch of public-health mandates. Whether we’ll be ready for whatever comes after BA.2… well, that remains to be seen.\r\n\r\n“I’m not necessarily at the level of being worried right now, but this is something to watch because BA.2 is even more transmissible than BA.1,” Cindy Prins, a University of Florida epidemiologist, told The Daily Beast.\r\n\r\nExperts disagree on just how much more transmissible BA.2 is, compared to BA.1. Some say 30 percent more. Others, 50 percent more. In any event, it’s all but inevitable that the subvariant will outcompete other forms of the novel coronavirus and become the dominant variant in the U.S.\r\n\r\nMore than two years into the pandemic, the march of new variants and subvariants, once they first appear, is pretty predictable. “The trend in Europe has been three-to-six weeks ahead of us, five waves of COVID-19 and counting,” Eric Bortz, a University of Alaska-Anchorage virologist and public-health expert, told The Daily Beast.\r\n\r\nMark your calendar. Around half of European countries registered increases in new COVID cases in the past week—almost all of them BA.2. At the same time, Chinese authorities have locked down the city of Shenzhen, near Hong Kong, after detecting a surge in infections that experts attribute to the new subvariant.\r\n\r\nStory continues\r\n\r\nWe’re Barely Keeping a Lid on Our Next Huge Global Crisis\r\n\r\nNow project a month or so into the future. BA.2, with its elevated transmission rate, could be dominant in the U.S. in early summer, Edwin Michael, an epidemiologist at the Center for Global Health Infectious Disease Research at the University of South Florida, told The Daily Beast. That chimes with Bortz’s prediction of a six-week delay between European and U.S. COVID surges.\r\n\r\nWhether BA.2’s coming takeover in America will drive major increases in the metrics that really matter—serious illness, hospitalizations, deaths and long COVID—is an open question.\r\n\r\nSurveillance of sewer systems—in essence, scooping up water samples and testing them for the virus—only hints at a possible increase in infections. And an increase in infections m', '2022-03-20 21:11:48.000000', 'public'),
(23, 10, 'Which ‘Love Island’ USA Couples Are Still Together', 'Islanders — assemble! With perhaps one of the most iconic TV show commentators (Matthew Hoffman) and a picturesque tropical paradise, Love Island USA rings in viewers every summer with its sizzling, dramatic events. And while some relationships sadly didn’t last, a few others have survived! So, which couples from season 3 are still together?\r\n\r\nAlthough Olivia Kaiser and Korey Gandy were the winners of the season, they sadly called it quits in November 2021. Korey was the one who broke the news to fans that month in an Instagram post.\r\n\r\n“Alright, so I figured I’d get up here and address the question I get at least 20 times a day,” he began in his lengthy caption. “Are me and Olivia still together? I feel like I owe everyone an answer, so the answer is unfortunately ‘no,’ we are not anymore.”\r\n\r\nThe reality star continued in his announcement, “My time with Liv taught me so much about myself. I realized I can be vulnerable again and truly care for someone. When we were on Love Island, everything was perfect and I can say that was honestly the happiest moment of my life. Unfortunately that’s not real life and In the real world we’re now faced with real world challenges. Some that we couldn’t overcome…. We went through that experience together and no one can ever take that away from us.”\r\n\r\nDespite their split, Korey insisted he would “always respect her and care for [Olivia]” and described her as “one of the most beautiful people I’ve ever met, inside and out.”\r\n\r\nFans of the CBS series shouldn’t give up on love, though, because Shannon St. Clair and Josh Goldstein are still going strong today! The couple were a fan-favorite to win the $100,000 prize, especially after Josh adorably asked her to be his girlfriend on their first official date.\r\n\r\nHowever, they had to exit the show early when Josh found out his sister Lindsey Goldstein had tragically died. Shannon seemingly stayed by his side throughout the grieving process, and they both got even closer, celebrating the winter holidays together at the end of 2021. In early 2022, the pair moved to Florida together.\r\n\r\n“Happy birthday to the love of my life,” Shannon captioned a sweet Instagram video post that February. “Thank you for always being there for me! I’m so happy we get to celebrate in our new apartment in Florida together. This is our year.”\r\n\r\nScroll down to see which couples are still together from season 3.', '2022-03-20 21:18:49.000000', 'public'),
(24, 10, '‘Roll on the summer of love’: UK music festivals o', 'For a while it felt so far away: listening to your favourite artist, pints flying overhead, queueing for portable toilets, losing your friends and finding new ones. But after two years of cancellations and delays, music lovers can once again look forward to an array of festivals and gigs this summer.\r\n\r\nFrom Paul McCartney at Glastonbury and Tyler, the Creator at Parklife, to Adele and Elton John at BST Hyde Park and Liam Gallagher at the Etihad Stadium, there’s something in the music calendar for everyone.\r\n\r\n“Summer 2022 marks the beginning of the next era of the musical summer season,” said Emily Eavis, co-organiser of Glastonbury festival, which is returning in June for the first time since 2019.\r\n\r\nAlongside headliners McCartney, Kendrick Lamar and Billie Eilish, the festival has announced more than 80 names so far, including Olivia Rodrigo and Diana Ross.\r\n\r\n(Clockwise from centre) Glastonbury 2022 acts Paul McCartney, Kendrick Lamar, Kacey Musgraves, Olivia Rodrigo and Megan Thee Stallion. Composite: AP/Getty/PA\r\n“All gigs are back, festivals will return with bells on and people will be streaming through many gates all summer long full of excitement,” Eavis said. “It’s a huge relief that these life-affirming gatherings are back, and it feels like we have actually turned a corner in this long, difficult pandemic trajectory. We can’t wait to welcome people back to Worthy Farm.”\r\n\r\nNot only has music helped shape Britain’s identity, but the UK music industry contributed £5.8bn to the economy pre-pandemic, according to UK Music, the umbrella organisation representing the commercial music industry from artists and record labels to the live music sector. The industry now has the potential to play a key role in the nation’s recovery from the pandemic.\r\n\r\n“Live music is emerging from a Covid-enforced hibernation that saw around a third of jobs right across the music industry wiped out and many stages empty for almost two years,” said the UK Music chief executive, Jamie Njoku-Goodwin.\r\n\r\n“The absence of live music left a big hole in many people’s lives and helped us realise the power of music when it comes to lifting people’s spirits and having fun.\r\n\r\n“It’s been an awful two years for the whole industry – but there is now a cautious optimism that we’ve turned a corner and everyone is determined to deliver the best summer of festivals and gigs ever.”\r\n\r\nOther hugely popular acts billed this year include Ed Sheeran and AJ Tracey at Radio 1’s Big Weekend, a stadium tour by the Red Hot Chili Peppers, the Rolling Stones at BST Hyde Park, Muse at Isle of Wight and Iron Maiden at Download.\r\n\r\nEd Sheeran performing at BBC Radio 1’s Big Weekend in 2018. Photograph: Ben Birchall/PA\r\n“It very much feels like the return is very real and its significance for us as promoters, but also for artists and attendees, is huge,” said Melvin Benn, the managing director of Festival Republic, which is behind some of the UK’s biggest festivals including Latitude, Wildernes', '2022-03-20 21:19:12.000000', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(20) NOT NULL,
  `profile_id` int(20) NOT NULL,
  `publication_id` int(20) NOT NULL,
  `publication_comment_text` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication_comment`
--

INSERT INTO `publication_comment` (`publication_comment_id`, `profile_id`, `publication_id`, `publication_comment_text`, `timestamp`) VALUES
(29, 6, 6, 'Hi! This is a comment from Jiahui', '2022-03-20 21:07:19.023091'),
(30, 7, 17, 'good article', '2022-03-20 20:43:22.000000'),
(31, 7, 17, 'nice', '2022-03-20 20:43:40.000000'),
(32, 7, 15, 'WOWwow', '2022-03-20 20:48:19.000000'),
(33, 8, 17, 'Awesome article', '2022-03-20 21:05:46.000000'),
(34, 8, 15, 'Great!!!', '2022-03-20 21:08:15.000000'),
(35, 9, 15, 'Its an amazing article', '2022-03-20 21:13:08.000000'),
(36, 9, 20, 'Funny', '2022-03-20 21:13:33.000000'),
(37, 9, 19, 'It\'s a helpful article', '2022-03-20 21:14:18.000000'),
(38, 9, 18, 'have fun to read this article', '2022-03-20 21:14:46.000000'),
(39, 9, 16, 'best article so far i read', '2022-03-20 21:15:19.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `FK_profile_author` (`author_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `FK_publication_profile` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `FK_publication_comment_profile` (`profile_id`),
  ADD KEY `FK_publication_comment_publication` (`publication_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK_publication_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `FK_publication_comment_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_publication_comment_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
