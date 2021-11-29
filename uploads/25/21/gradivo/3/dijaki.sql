-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql11.freesqldatabase.com
-- Generation Time: Nov 23, 2021 at 06:44 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql11448214`
--

-- --------------------------------------------------------

--
-- Table structure for table `dijaki`
--

CREATE TABLE `dijaki` (
  `id_dijaki` int(11) NOT NULL,
  `ime` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Priimek` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geslo` varchar(255) NOT NULL,
  `geslo_vidno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dijaki`
--

INSERT INTO `dijaki` (`id_dijaki`, `ime`, `Priimek`, `mail`, `geslo`, `geslo_vidno`) VALUES
(2, 'nusaa', 'pederusaaa', 'vaucc@jebomajku.com', '$2y$10$iorjgYBZWAmlufpdJOXjOu5ZLodwBilDvCaHB/Z6.cYzKoTODCo/.', '123'),
(5, 'kunuz', 'makur', 'dasjnv@djan-com', '$2y$10$erCKZtDLqzR0fkQy0tm5je.Ii3.UfjCnXzuFDa.SXJRpDOwEIsy2K', '1345'),
(6, 'otaÅ¡i', 'makaron', 'nujez@gmail.com', '$2y$10$azqa/UW.3dHbApLprYbmH.qZlHwEg1FsNVhJWUTDUQqyOqo6nNJjK', '391348'),
(7, 'cheken', 'meren', 'skf@dijak.com', '$2y$10$VjmwwJo8BswZxfHzFPpBYePF9XczN8xLaoWnP35hTXXAY90WmKYnq', 'dsjaks'),
(8, 'jukan', 'juannd', 'ndsand@fgkma.com', '$2y$10$Usmd7cwxuIuvwEJ585ymde.JfCLKuGUFSQCTR3hI4Ng0/J7MXnAny', 'djsamm'),
(9, 'sadd', 'sddasddsda', 'sads@gmail.com', '$2y$10$7.zI8xRJ6O4cF.8XjHPX4.Ci57KmlwRCOAy1Ljb.TuWOi0i3xOTiq', 'sdkdsk'),
(10, 'dslal', 'dscl,cmdsdsasds', 'dsdasds@sasdad.com', '$2y$10$mNOEiQqMbeuVvwI25Rin1e5LBqWgKMareLfhXiRjZS5MA9..wIe5i', 'sdadsds'),
(11, 'sdasdads', 'dsdasads', 'dsasdds@sddsads.saads', '$2y$10$sZgcN6IOsknWTL5VniuSWegZ.HRK6Am2isNg3YCOB/08n6TkJn.Ea', 'dsadsadsadas'),
(12, 'sdadsadsa', 'sdadsaads', 'dsasdsadd@sdsaads.com', '$2y$10$vSDxy3IQ20VzLQIbvyJKj..AOhjprjfxfO.OfSvY3sMGsmpRdxSfm', 'sdadsadsa'),
(13, 'kgrkfsssmgkll', 'dfsmovsmÄ', 'vsvmvsmk@dmdfsmmv.cdkv', '$2y$10$UVFO6gTyKkzGHTxBJuCAzuOahTpX97j.DwsK2NZU1X4g0kEwOrWnu', 'fdkadkvÄ'),
(15, 'addakÄvkvkadÄ', 'dvkmvkamlkmvld', 'vdkavmkd@vkmadvmkd.cdavm', '$2y$10$oHdOOcxexe5Hfv5maizakuMUmvLyvhDmezJVdBKR8fN1Im1Jk61Cq', 'vadkavklv'),
(17, 'clkaclk', 'cakack', 'aippcin@ammcm.cacas', '$2y$10$xtiWlA5NFuBP.l4S7M1r2O2lMh57ShOyp1Pu.zTFvfhsg.ry.pqSW', 'skacsmmk'),
(18, 'cakckmcal', 'ckackmlcamk', 'cmlkaclcmk@ckmÄmac@camcam', '$2y$10$O.dXhp5wa2ICjILXl8uPCOglpP7L0zuujDOt5HSdciRVb8TNy7nCW', 'ckmlacklkmlc'),
(19, 'cacc acmcaklm', 'cakmcakdk', 'calcmckla@caclmvmmer@vdv', '$2y$10$dfuclwsF3d/syM6oMlq5oOY2UCaf1IZVMurmozVl8oak87MAu64cm', 'adkmvkmbgioo'),
(20, 'mkcsmkacskmvamvm', 'camkckmc', 'vvmÄmvadÄvÄ@mvadÄvak.ckmavkmav', '$2y$10$vSrPqiFXMw6Jpdh4u6QxOe.F9g2N4IKV5LBA7EJCGWdTZKQyh6GEG', 'vaÄkvv'),
(21, 'vmadav', 'vÄmamvaÄa', 'vmÄamv@kmvakvkÄv.vmv', '$2y$10$m4q5JhGeY1n0jF.yw7lDO.xoty8qEQPlZw6PjpwNsH1ldXYCmpKJC', 'vmaÄvvÄ'),
(22, 'vooaoepÅ¡vÅ¡', 'povvjm vaa', 'vÅ¡avmae@epÅ¡avvn@avkovo', '$2y$10$ntPCHmPx.DUwwrOF2Z2bwOYCT759jXVXM5tX.qWVTAPaLRV2Knt4K', 'vmavbnÅ¡'),
(23, 'mukur', 'fiaipvn', 'ipnvnia@ipneap@vnan', '$2y$10$nRghCmO6kl57tfsn.dLTeOTCa.4n6tNq3Rq1nZ/HSIWKlRop2Bp6u', 'vanvpvfw'),
(24, 'pavÅ¡pfw', 'fÅ¡jqqnv', 'Å¡nvda@iaÅ¡fnq.vpjavÅ¡f', '$2y$10$WBMd4UJ82DLyOItixeX37uQNWOJTQUxJXU6f4rrTY2JnURAWlBsTG', 'vanÅ¡pqea'),
(25, 'nÅ¡vqnvÅ¡', 'noÄva  bgneani', 'saadadsda@akovÄ‘ojo', '$2y$10$T1CgzZHwd3DqalOgikK1FOkcRbd6zikJs1pyMTw74pSgXTYjw1arO', 'vaqÅ¡ng'),
(26, 'vanpv', 'vqvopiie', 'vnqovnq@qionino.qvn', '$2y$10$YFX9KvlqraMk.Qkyq6qWsuBvbFUS03ouiLZbcVWkJFNhKVtav4Axe', 'vqnoinoipvoniq'),
(27, 'qvnÅ¡qne', 'qvnqnivqqp', 'vÅ¡qniv@qipevi.qpe', '$2y$10$nho0N8baL75/faFBKLLX.eJqu1FCd1QLqVjc9b.dqKT9nr9I6yCE.', 'qvviniinebnqvn'),
(28, 'qvenvoqep', 'vioqvnevo', 'vqnvoqi@vqenivn.noqvevn', '$2y$10$iJhvCr7HabfO67g5u.zgeurWj.nmTp9APQ0Uwvwgya0SYa/uOXKOW', 'voiqivonk yvmlvdk'),
(29, 'vanova', 'iovneqoin', 'vqoivn@bnnvcomoavn.fqe', '$2y$10$h1zb1wMB3MPatHPUAEnuceru8ZDZ.QINGmVvSF3Dgqh3hcU4ujNCC', 'vionegqvin i'),
(30, 'vjqvjcmcmÄ‘qevÅ¡qnvn', 'vqini cma', 'viqviiqnmp@qmenviqne.qÅ¡oqe', '$2y$10$lQFZKNUplVPGmE2Pdsf4veKfm4Eb1Yu.GvuYCFggCdy/7Hr15dJve', 'giovioKMSsdsvnipgq'),
(31, 'qfcmaeiq', 'inqoecm', 'iffomqima@ijfia.ckafqp', '$2y$10$1PSWl/zZWnlKeLpaRKJ/O.DOU9sLZqtC7C9G6ibIOyWgaolOA54Fq', 'fqimvinam vpgf'),
(32, 'afnqwip', 'fienpafna', 'anifepi@afniÅ¡.afipfpwi', '$2y$10$0pQ76Byne5hPPKq5/DKM6OG0RSDvE5/s1KKeIK8XHqu3SmdL/eq8S', 'foqionnfgninia'),
(33, 'afvnanifwpa', 'fawinpfna', 'faniÅ¡fnpaw@pqf.fapwf', '$2y$10$35wstAu0p2AaxTnJYnaRb.p3/R.LzRgKmthSHILg4jnVdUKoZPGa2', 'fwpafg'),
(34, 'ajpfÅ¡gwjanvm', 'qfonfna', 'fnioaiÅ¡fa@amifiaÅ¡.afwajp', '$2y$10$ElTPVQd18qibCqoAJUlMcuVRP9XSArU9TprJS7XVw0IkHJgNqLuVW', 'fawpjf'),
(35, 'nofaofnn', 'fioafnfncami', 'faifajÅ¡wiij@gefjawfi.ajfpawg', '$2y$10$c7K3vcdSnWhEXIKLVYwhtuJtP8O8zif8qmPa8eXocb0qK.LFis5NC', 'fiaÅ¡fjjgjawpj'),
(36, 'fapoaaj', 'fpÅ¡ajfjoaw', 'fjoaofpfjo@awpf.wafkpo', '$2y$10$Ol2kWDIK77b.vLotQNb8beGvT.N3agfIz0u7fki2guxHwqtiVz6na', 'fjawjfppa'),
(37, 'asfawpm', 'diamfa', 'maiwfima@affpÅ¡aw.fwqpo', '$2y$10$PRgFsbx5DMFmy3y4oxheuujqJgDMDXIjTO86.HavuGsGBLBqHde1q', 'faopmfwpm'),
(38, 'afpapokwokf', 'koawokf', 'koakof@afja.cinfawp', '$2y$10$ERtCzSmuKgVl/yGc68CqfeW9nowNRhBkgCzbN45uz8sSEzlvLMPL.', 'kopafjaj'),
(39, 'ofaf', 'ofokaf', 'Äfawkf@adkofwa.wadpkdk', '$2y$10$EIAql6vs2HaQjylgItQg/uo6HCa4XkXCOHEBDhAoD1DN0wIXjOvm2', 'owÄwkÄafkaf'),
(40, 'awmfpafwo', 'fomaofc', 'afwÄ‡mfpw@ampwfnaf.FÄ†AW', '$2y$10$CNzIEjJbQT/GJn.06qtU5OWboror.nzYvu/ebQ6DxbW8lPRbfTZ8e', 'APOFKAFK'),
(41, 'afnioieawpo', 'indaiofvm aww', 'fiaÅ¡opfmw@ifnuwaonspm.fjajwf', '$2y$10$GmFuLLyzT/RWjef0.gY0kOiuQSLS0RH2N8vQLLTCR4Xlj3D8nzg0i', 'oifamfawf'),
(42, 'jdsaooidfa', 'oidwajifaw', 'owaiifja@afwoina.vawjwf', '$2y$10$WmA7NQ23xSStv0TPxZnTButI2M1n2bV3sPY6Oy3WaP9Hc7VT/5yyK', 'oiwjajfwf'),
(43, 'dafwjoa', 'fioaowifoaji', 'jioafijow@ajifnvmacf.afwfaw', '$2y$10$kNJt7RFZc7bo8FGXE8Gu.OLsgfuD7YXyDZv1zhrrW1ZTS9aEjVdE2', 'fioawfjoga'),
(44, 'gfafgrjaf', 'ojiafjioaj', 'oadjfjjoaiwof@joawjd.jafwpj', '$2y$10$c0tAG3LAjpQTzhCPpxsNuOZn5K768p.Y6ZUrlyHYaxmWall9QAsRO', 'fojiaoifoja'),
(45, 'amcac mvjaw', 'pfjawfjripai', 'dioaofjia@mafjiwaijsp.cpajfjawij', '$2y$10$Zr/JyczHqmHtgNROdeebaeeme0Z01XlGnO.XFLxreZqzISwilzgiK', 'fiawjfiawop'),
(46, 'faÅ¡pwap', 'fpajwpjofw', 'fwojafjoapv@ajfÅ¡pcmaw.kÅ¡fawpo', '$2y$10$IRdBkSaNALrD/x4eCtCENuzl2OlrK6adW2.DV57DX63A9oz2m6jSe', 'fpoawpjofjpa'),
(47, 'ifajfijwao', 'ijfowaoifijoajio', 'foiafwjfo@jawijfjiaw.mfpawjp', '$2y$10$DIAtzqBWFWZZFwD74SuyIOYUCBgCD55mehKRkN4TTHphokDhA/ywS', 'fijawoifji'),
(48, 'fafijaiiwf', 'fioawiojfojioij', 'fijoawjoifoj@pafpjjpa.ofjoapwp', '$2y$10$5LAJJDwMriCfNZ/6NBdWVOtO6yD.r1eFyUumBbTwlAYpsBH/Nfmiq', 'foijwaoofij'),
(49, 'nekdo', 'beseda', 'en.mal.pac', '$2y$10$m5DejiGceTJGSqH2qjKO8.16PpqsDnEEvEdDxAfaQyy4FvsU40Toa', 'niGlihIzvirno'),
(50, 'fafwoii', 'foioawjfjio', 'jfjoiajoif@moafojjaw.fkawij', '$2y$10$6CrmTwZ310oSKEiy46s4Be/BjDG8ZTUCeSMiUGH9/uBSR/P07VUJm', 'jfwjoapofp'),
(51, 'fawfaopo', 'iofawfioaoj', 'foiajiojfajfi.kpodwoapof@aowfo.kofpoaw', '$2y$10$A6OFb3/PxC9dg9vw7ie1XO5D70wDEt8N8POoqEupmq/AQCW7MyhDS', 'ifijoaoifiojf'),
(52, 'awfowijaio', 'fioajfjawoi', 'iofeaiojiowf@ijafowija.waffaw', '$2y$10$C057X1clamzQKB5v5zFVhejV.abRN6D9hDt.Eqc0mcNBuGvPVTwpa', 'wkofoaoj'),
(53, 'foawfajoioa', 'ijfoaoifioapi', 'fiojaijof@faijojiwajoi.fioowpajjofi', '$2y$10$rFaq6SBNEufIDST0RU1FXODRXJ/DUoo57zQqrEjATrzz69cl9n1gO', 'wiofoijfawjofjiofwa'),
(54, 'jowaffawjo', 'jjiaifioaiw', 'iofjioafjofi@aijofjwjwiof.wfkfpwkap', '$2y$10$gulR1sF7X2sKJhInaf4ZFuwEk7selbNjFonXKLV2H0kTF48cXdtVq', 'fawjifjighap'),
(55, 'fijoigapvif', 'fpsgjiajiij', 'ijofaoifijoo@akfoiajf.waiofwoij', '$2y$10$kkCeUUCm59E/dzbDq3Y9A.Yw2zSzLZPxom9BiyyG50IiutjCzOTU6', 'wjfiaijfijoa'),
(56, 'isjojicijaojadjoicj', 'dwoajojiwi', 'diawijoofwjp@offijjaio.fijojiowfia', '$2y$10$CORMr2A9votlGj8i3OsCquGf3Rmh72qd.WVSFUnPApQweVIgYtbZG', 'fawjifaoi'),
(57, 'pdajdiw', 'wjdpajfiaww', 'pojwaopfjwa@ajfjwjaÅ¡.awÄadpp', '$2y$10$HPW4/XWhfl/ZFgyx0VEtTepMnKHeIJWGvUccsCQ.JZTZOaYmCwnGi', 'idjiwajifwo'),
(58, 'oafjwfoifoiafopoi', 'ijoawfjijiaooif', 'oifwaofpija@iafoimcawij.fpoafjoif', '$2y$10$USzAFuBqfQC21KgTmQRA4OBwIKQPsNSJjvZ2AOWLEB9J/KAsh.n72', 'woifiafjiofa'),
(59, 'kaffowij', 'iaijofojiap', 'fijajioafio@jajiofoijfaw.mowowafo', '$2y$10$sHeARSmQRC29zLImchJ8SOd7lwlgT4xYdtGlp8NlPvHfVZvJVAlO6', 'wfijaijffjaoi'),
(60, 'oifwawjoj', 'ofoiawijofdakÄdfpoafw', 'klfaksjfkaÄ‡Äfa@aijfijaija.awjijifo', '$2y$10$dKneWiQU1gb2tCJoFTJh0uiP4a5f1M1jkQQe1B0x8IKH8p8na7zSO', 'fioiowjfjiofjig'),
(61, 'giaiguhguaoifo', 'fuhaofjgho', 'pfijaogpoppa@iofijafpf.fijaijoijg', '$2y$10$TGR70z.xt3wICrRn7EFDB.zBBv/PmNDYsTzebK0YEVltHAH4JwNrW', 'joifjajf'),
(62, 'afkgigji', 'ifijoaji', 'jifjiaifija@jaijofoa.fijoaaioj', '$2y$10$Ld1k/iA2tpiMtLI0RQS8aeoDKTkRBSRmddzthtJvxwDqpjom5quIS', 'ijofjafakf'),
(63, 'askmfijfajÅ¡i', 'fjajifjapojgjo', 'affjajfopopjf<@afpaf.ojfajwiijopf', '$2y$10$MHytqO1WCEUjZnkKOBr.Gum.b65Hc4DaYqu8x4Ptkjngkwh3704Ta', 'jfj'),
(64, 'sdjofaijfijo', 'jidfjifiapio', 'jfiajifopjaio@jajfoa.kfaoijfaijo', '$2y$10$iXfX.atvGn6ulc8Og6iCm.NWfGZfWrfIPXQyL7Gl1hCYtZZubyAKG', 'wjoifjafoi'),
(65, 'aofopfaoijf', 'fiaijfjaoi', 'jifiaif@jiafiojjafooijaw.fakoijwaoip', '$2y$10$U7Y0/ZGfMivGjT98jWDT3Oa9ZCZozLoASvgWbP8fKiS8v51GCVK7a', 'fioafjoijfio'),
(66, 'oijfaijofjifo', 'jifajiwfijo', 'iofajiojfioa@ajoiofijjoa.adkoijadw', '$2y$10$VYSGyoLQB39MOLfk160eNOv0UyqmzunOlii5moeqP0fKKon.zYWKu', 'jjfajoifoji'),
(67, 'daijojwijwido', 'jdjawojiadijodw', 'idijoaijofjivij@oijaoijfijoa.iofaiowaijo', '$2y$10$Ox6CCAjAXJr450EdJNyZLenXtq2vRzl6xHIoLsP1r1HqQrKWZTdyC', 'jfaiojw'),
(68, '|ZZ', 'asdasda', 'adad.asdad', '$2y$10$zAh7/ehoxLCdAlpLs8e2dOQlAbKWsLFs.KZNamSl2YUf/a0sTKQZu', 'asdad'),
(69, 'iojajiowfjio', 'jifajifojioajioi', 'ifijofwjiao@ijoajiofjioaw.aojofijioaw', '$2y$10$8Zutmd2xQApT.Rxbah6/Euu9xvwpJWW8l.jH0mT04Y0UfyF1HBMRW', 'fjjioafijofaijo'),
(70, 'ijodaifjoijofijo', 'jfijawoijfoij', 'ijfajifjiawijof@jiajifjaio.jifoijfaijo', '$2y$10$/D6GYTOt7bZcKCpCT7P.T.V7P44mE5YPd6hSFQYKoEowjN5kBFV9q', 'ifjioajiofjo'),
(71, 'asdad', 'asdasd', 'fhfh.hfh', '$2y$10$TCQH7DDYkIhjLC8HZxM9D.2bDTS9GsGOPERAfWOOH5VchfQ4Mo20K', 'fdh fxdfg'),
(72, 'aofoijfajiw', 'wifijawjiwfioj', 'jifaiowjfiojwfioja@iojajoif.faipjowfijo', '$2y$10$aWX/XqkOy4AiP6SlD4w.TODutPpTAQApY9KUVI2nc3kihIiep4Xje', 'fijajiowjoifa'),
(73, 'njowaofwijfwajwioio', 'fijaiwjwfijooafiw', 'ijfijfawjifijoafoij@aijojfiojiowa.fwooijawfj', '$2y$10$40akLq3whNKMKSjqFLOluuDqaxw0bH2q2wRqQSQMR93yR6EbYG/Em', 'fijoawjifijow'),
(74, 'wnofawffoi', 'wifjjaiowfjiojwiaow', 'ijofjwiajiof@miaijofjiaw.affwa', '$2y$10$LC00voFVzm9b5M1T/sKc0.D7C0rgFwscjMS5LQ9LHo8dRo/uWG8mG', 'ijofijowwafijo'),
(75, 'wiojaifjoijow', 'ioiaijfwijofijo', 'ifajoojf@ijoaoifjioa.jiiofjwaijoijo', '$2y$10$dBcI0OXWk8EG5ZDcuLzZNO9SqTd3NDecfBdMlDRPbDTUSj1.l0dqG', 'ijwafjioafijo'),
(76, 'iawfjifaijow', 'iwijffiojijofa', 'wjaiafjiofijo@jiajiofjoiaw.ijfaijofijo', '$2y$10$Vp5brb396ayUY3MEocN91exkCB0R7d6QNHhAVJfwINN3XjvT.34by', 'fiajojwdoai'),
(77, 'aioffwiojawjoiw', 'fjiawiofwoiijo', 'ifaijfwjiowa@jioaijofjiaw.kwdaowdoij', '$2y$10$hsZckbMJUbTZZjZOWJ./xOLOKjMqIAvnvV.ZTv.7SRHGOmIivDI7q', 'jijfoajofiw'),
(78, 'wdijoawdijodawijo', 'idjwajwioaiodwjoi', 'diojawoijd@jiajfoajio.jowowji', '$2y$10$OQvr7zNMUXwV47fOqarx9OmuCUi2nJ8aPUCECBUbQnANrdvq8dmrW', 'widjoi'),
(79, 'kdwoawfaio', 'popawkofawo', 'fjajwfajopw@afjwja.fijwifaj', '$2y$10$OiYo57GFzKFw98566MWUCOCG/rxu1egZMyDtUfIBITptE/t0t4jkK', 'fjawpjpfj'),
(80, 'wfjpfawjpwfo', 'wfojawwfojpj', 'fjoafwjo@jajfaojw.jfwajfwjpo', '$2y$10$xzVefzs.FT0zTqsuddJtoOyPfkoVx/bW/nmqr6w/c0Fq6Atf3dq5W', 'fjpapwjofpjow'),
(81, 'fafpopdkaodo', 'kodawkofjajdo', 'kofjoawojfa@ijpiajfaopw.Å¡kafwpoa', '$2y$10$QNWPQaM0FXpICGepjSo3h.yO7wnoWcE65P4cId893rDxaT/kE/MJK', 'pjfojajf'),
(82, 'jifaifi', 'wiofioawj', 'fiawiof@jiaofijoai.iojfaji', '$2y$10$4nb9sXADB0fY0o8Lai5yI.PeXQIp6SfQI7IBKf7I4T5AJBW/0Rq6u', 'fioaofiw'),
(83, 'awijofopiafwoji', 'fioawfiojafjio', 'fijawfijofijoa@ijoajoifjioa.ijofwjofiawijo', '$2y$10$acJUXm65Y38NlE95ZSg0Uu9tPOudeGGwwW8WwTP6OKZVxy01mw0Ra', 'fwijawjof'),
(84, 'aasdad', 'adads', 'asdadasd', '$2y$10$EWBu3sucBtrdVUpfz.x4UOLOCLy7OrLrV8QwVTK9Ygm367R6md9ja', 'asdasd'),
(85, 'wfajfo', 'jiwajifjioaw', 'fojiawdifijo@kopaopfjaw.lkowfoijafw', '$2y$10$VDPzgVEydVePQ/w0udf.judmPvt/TyZjuKGr2u5gbuOZOI8REDts.', 'iowfaijojifaw'),
(86, 'jfi0aifoij', 'iofjajfjoi', 'fijajwojia@jaijfawo.adpokaiofj', '$2y$10$LcPuivUAEaBoPf.1.6mJUeQkN1e48GKPweJmCXluvq6XDp9YsRLHW', 'iaowjdjoiad'),
(87, 'adad', 'dadadasd', 'gjgjg', '$2y$10$5blohrMB3MVhsbUdka3f2eYBNN3gH5BvQFg1yw2bYRpxgDW60GuGe', 'asdadasd'),
(88, 'iojfawowji', 'oijfjaiowfjfoiw', 'jdawjfio@jajpfifwaioj.ijofijopawdjoi', '$2y$10$WcunmiemRVQcsh5TvHvOQ.hQvVXZyFUoW.9YOBpq1jhog.QteOi4i', 'ioajoiwdow'),
(89, 'pafwjafjw', 'owkfajofoj', 'jofawofjp@poajfjpwjapo.mfwkma', '$2y$10$T45.fA6Rw5FAT/8QeNXpF.sRTNgbLb3IP/6Ah0i0SkhhY20gu9P46', 'pojfjapwj'),
(90, 'awffowfjpofowaj', 'wjofojpapjawfjo', 'jofwjoajopf@ajpfjpsajo.ajfjw', '$2y$10$/VvUkQoPSz..PimVvRXncemYPWPNL63.gcWfIz4cA0NqIkcL6/D4.', 'fajwiofjppaojfw'),
(91, 'iowfiafjjio', 'ijfaijofjwi', 'wjijowdajio@jiajifaoijw.jfifwijoijo', '$2y$10$5Ndf5xBeZPc/jJZddHQwS.PIIYkESwpRr5O.hGdI9YclMHBJvOwRC', 'wfjajifjioa'),
(92, 'lfaofp', 'fjopawjoojw', 'jofajofjo@jajfppo.wkpfjpfawjp', '$2y$10$x5NEzYSmS7B/ln1Be.0LzO0qGq/9S3KT8sQumnYDRHQ4FmZjBnmKq', 'jopfjpoapo'),
(93, 'kaffjpow', 'ojfjowajofw', 'jojopfjowafoj@afjos.awfjjfppo', '$2y$10$aIQ651by5OV.YVVYCbOw8.MYQt7OUPnA5dAgH5FoWjOsalFtvMax6', 'wjfojaof'),
(94, 'neDaSEmiVEC', 'paSjbo', 'upam', '$2y$10$NjofFJZJqdmPellAawYNoOdp7RNxUhLNzpQoKfKCxoi1lvIlAlGRy', 'adasd'),
(95, 'neDaSEmiVEC', 'paSjbo', 'upam', '$2y$10$29g6o/e/1Ib328DYqwZzR.A/Hww3.XgOM6/.2ZnbvZ5C0skdZ/67i', 'adasd'),
(96, 'neDaSEmiVEC', 'paSjbo', 'upam', '$2y$10$/4My0B7irseFVslU/LKgYeIDRfvse0.qm5yKbokmUUeawAnG0WnUe', 'adasd'),
(97, 'fpajfpwjo', 'ojfjoapojpawjo', 'wwfojawjoof@jafopaÅ¡of,.fwpjpfao', '$2y$10$d.5tbRJ2bG82d53fufKDZ.o0fIFtamZ0iakD3ySXLdIrBAaddoVgq', 'awjofjopa'),
(98, 'nofawkfkw', 'kfkakfklwk', 'nkkwanlfknlvmaf@majfjpawjof.mfwajowfjp', '$2y$10$ppImgBtTjCelgXvya8yPpuGh6UKIWFwbkBOfFkeI4e/pZR7Hailau', 'jpfjpoawjofpa'),
(99, 'fawamlaflmÄfmÄ', 'mlfwamlflammlw', 'mlfmlawÄmÄlf@oafpjwojpw.kwijod', '$2y$10$0NBBAHb0IuoF6goGk5XceOy5fFRaxuRplG8cTjUNM3eJTr4UfQNNm', 'lflalfwjawfl'),
(100, 'asd', 'pederusa', 'adasd', '$2y$10$aDmHtAmf/02E4zPzlToKDOam.h8PG7xarDeM1NSKUd4oqJ2k8.H.C', '123'),
(101, 'dafokwdko', 'okdwkaodkowkw', 'ookkaofko@oakopf.kpofkpoa', '$2y$10$HFyjklJYRivi2PMfh3bE0e2RD4ehos3CZp4MU9dKozm/obQNXdgVa', 'qpofpfwa'),
(102, 'sgdsgd', 'sdgsdg', 'dsf', '$2y$10$XPO7zSk7l1Dixz403.A5iefa6.ulaD7no52cCyaDwAbDAL06qNlUm', 'dsgdfgs'),
(103, 'fkawafkfawkop', 'kofakofkow', 'Å¡fkowakofko@afpoawko.fwopawfpo', '$2y$10$KmLMlFyryv.8ltubnPPHe.uLFHgN28gDN.qIvJcP5lcMm6/Khw5S.', 'wpfjowajpofwjopf'),
(104, 'sdfgdf', 'sdfgcv', 'dfcv sf', '$2y$10$CMkCaHcQO/ohcsqDtG/iTeN4RNyXDUdllu7ACLWDO.BPGGnkm4UMG', 'cvdfdgsd'),
(105, 'klwafwaop', 'foakofkwo', 'kfwakopf@jafjwa,.kwfap', '$2y$10$Q.HE5Umv.HZGBAJu6y19.uVpKBw64chtL5al9VG5v8V.7biVF1Sn.', 'koakfkoa'),
(106, 'sfgcv', 'xcbfddfgv', 'sfcvxcngfb', '$2y$10$mVk26NlUgAnwe8YSvXPnOO.qvcU.8PBHobL4KtlCEA16cogU5bJ5.', 'xcv xfvzc'),
(107, 'pfawofko', 'kofaokfokw', 'kofoaokf@oafkowkakpo', '$2y$10$pdEz.ghqmDnnu7x.eMp1V.MFVzm21UgDIXX0qg29jORjqFEzjRkAa', 'kookkofka'),
(108, 'kpoawfkook', 'ko', 'kofwkoakfookawofw', '$2y$10$EUj9I8gky661yI.jbhGiXO1.WqEmid0YEiCO913ktEnNSu4LorzpG', 'opfwkaofko'),
(109, 'testIme', 'AKSD', 'asdasda', '$2y$10$GDYA8s6c1dVMqMU6HXF2neioZXNErpZnpMAfxJIs/FYiIpW38fDJ2', 'asdadad'),
(110, 'testIme', 'AKSD', 'asdasda', '$2y$10$tgWMjGMRVlywMzJGj9mjluWxIiXx56VZaqYrOPG2Y4Ho74ZS7OG7S', 'asdadad'),
(111, 'testIme', 'AKSD', 'asdasda', '$2y$10$PP9sCOKE5R.wOlnbe0Xetu3IU8D0q5kaWaD1kCAcCItad5Hlyx/iO', 'asdadad'),
(112, 'testIme', 'AKSD', 'asdasda', '$2y$10$2E94F99bpoKliuaXCZRj/.rJ7iY9OGitUev4se/1holfMJJMzYHqe', 'asdadad'),
(113, 'testIme', 'AKSD', 'asdasda', '$2y$10$fWVHugSDtG2zEAIwGiH.3.uK5WuykOwtfJws6j.xXGYa7cPzZfbh.', 'asdadad'),
(114, 'testIme', 'AKSD', 'asdasda', '$2y$10$kapMfDGSD6mpO7KlPR1uhe/x4uIkVUudKdaL2E6ZmGCzOUh5UKLx6', 'asdadad'),
(115, 'testIme', 'AKSD', 'asdasda', '$2y$10$XO5dp05eetliQJZsFHp7kOt2o/LN1gs/APgN3R7UZZnl6bnuWdPCW', 'asdadad'),
(116, 'testIme', 'AKSD', 'asdasda', '$2y$10$cVfMot.l2YpC1UkKWc0tLOVi9vdcHM21UtgrtNpgpEFjUCpWp2kq2', 'asdadad'),
(117, 'testIme', 'AKSD', 'asdasda', '$2y$10$wQQaPNAUlMEcqIS7pqm3regOcd1Sm3QYaCLLkyfayloK0R6OLNLdO', 'asdadad'),
(118, 'testIme', 'AKSD', 'asdasda', '$2y$10$cMIUmfzojRJnR3k5xpQXEenoO1a60V3rKqkFd5m.fmZgGH5XPsqUG', 'asdadad'),
(119, 'testIme', 'AKSD', 'asdasda', '$2y$10$n0xhZqS4o7d4x2SdhYNr0ec5fvoJO8HW.oFlL/nRayhFlA070eep6', 'asdadad'),
(120, 'testIme', 'AKSD', 'asdasda', '$2y$10$iqtwiwWQf/Yte2ml8BAl7ejirecvBkq0x8hvw2BPc/PEsKFk0JuYa', 'asdadad'),
(121, 'testIme', 'AKSD', 'asdasda', '$2y$10$eMJagdF2pKDHzLvBJN.rSOmGoghxsZwEJmBuEPNXNre6NizCFqLim', 'asdadad'),
(122, 'testIme', 'AKSD', 'asdasda', '$2y$10$JbYW6UAefKwTqerfzAmm/O0ORXtBR4wle6EjvIvURzXIFn4vY0h8O', 'asdadad'),
(123, 'testIme', 'AKSD', 'asdasda', '$2y$10$SZSG11OodM0McgyJIg7pnOehlEbOku/7yfRDyuxx1/wFHtCM1OOmm', 'asdadad'),
(124, 'testIme', 'AKSD', 'asdasda', '$2y$10$UQT3F1rJCoYk9e3QtEnore.ef/sKLAtYshvDdKODOuZjMOni6OWiO', 'asdadad'),
(125, 'testIme', 'AKSD', 'asdasda', '$2y$10$hJXZ2sMBxlEAu0iojBe.nel7J8S2TXSuNGjsdomEOPnv4qQ3R6S2.', 'asdadad'),
(126, 'testIme', 'AKSD', 'asdasda', '$2y$10$aRYIp2JeCJ0or0rCLPC2ueo2c.sGJm5mKB2umtI9SmtKmhoSpNht.', 'asdadad'),
(127, 'testIme', 'AKSD', 'asdasda', '$2y$10$h6tr5wdD.2NIjHB2skxWfOliKy2lS3ILc9lDtGytCH3FNv/78foNu', 'asdadad'),
(128, 'testIme', 'AKSD', 'asdasda', '$2y$10$TIJsaiw2F4q650kXd6baVuOIzg7RbyCRMouHsP7H.Oj8cXhrVQ6JS', 'asdadad'),
(129, 'testIme', 'AKSD', 'asdasda', '$2y$10$dco.mTRVbYA/paczuivl7emAmgWSTNOLtSIIgfHSJg/0yd0J7FNuG', 'asdadad'),
(130, 'testIme', 'AKSD', 'asdasda', '$2y$10$jpau12yfPdrMoGrUHRfvVO/kE9khYw0xVZz6YoyciWCSpxTY77J3.', 'asdadad'),
(131, 'Domzi', 'Domzi', 'domzi.coolman@gmail.com', '$2y$10$dzKL7BDr8MBxD9Y8ShGgSeEzslJTSZ4vWXWz7LQ0s/hoMvREzVlZS', ''),
(132, 'asd', 'asd', 'asd@gmail.com', '$2y$10$AQQ0XA7wmFFVIfikmfCJ7uhj1yGHjOdzxD85fZc60QVfQEF9xvfZS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dijaki`
--
ALTER TABLE `dijaki`
  ADD PRIMARY KEY (`id_dijaki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dijaki`
--
ALTER TABLE `dijaki`
  MODIFY `id_dijaki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
