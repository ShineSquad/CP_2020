<?php
	$l = "https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/17/2018/11/1811180154585086.jpg,https://99px.ru/sstorage/17/2015/03/1003150709005037.jpg,https://99px.ru/sstorage/17/2017/06/0406170427456118.jpg,https://99px.ru/sstorage/17/2018/07/2807181716268826.jpg,https://99px.ru/sstorage/1/2020/06/image_10606200857051035534.gif,https://99px.ru/cms/templates/main_top_b.png,https://99px.ru/sstorage/1/2019/10/image_10510190005087187911.gif,https://99px.ru/sstorage/1/2019/10/image_10310192120136827368.gif,https://99px.ru/sstorage/1/2019/10/10810191922369516.gif,https://99px.ru/sstorage/1/2020/06/image_10706200038499644502.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_10606201802314417127.jpg,https://99px.ru/sstorage/17/2019/12/0112190036075972.jpg,https://99px.ru/sstorage/1/2020/06/image_10606201801116858375.jpg,https://99px.ru/sstorage/17/2019/12/0112190036075972.jpg,https://99px.ru/sstorage/1/2020/06/image_10606200857051035534.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_1060620085624617426.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10606200047562097886.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_10606200046246691654.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/10506201159234063.gif,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/1/2020/06/image_10506200648595907545.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10506200648163517708.jpg,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10506200647291276866.jpg,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_1050620062148371691.jpg,https://99px.ru/cms/modules/site_user/tpl/top_menu/default.jpg,https://99px.ru/sstorage/1/2020/06/image_10506200139239293253.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_10506200138185614521.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_10406201755066555888.jpg,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/1/2020/06/image_10406201753596813356.jpg,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/1/2020/06/image_10406200218049701973.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_1040620021641866818.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_1040620000117990527.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10406200000432270489.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10306202359438368921.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/10306201802202243.gif,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/1/2020/06/image_10306200649382214724.gif,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10306200648463761691.jpg,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10306200647542163519.png,https://99px.ru/sstorage/17/2020/06/0306202316534605.gif,https://99px.ru/sstorage/1/2020/06/image_10306200306448910406.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/image_10306200305026458848.gif,https://99px.ru/sstorage/17/2018/06/1006180438144340.png,https://99px.ru/sstorage/1/2020/06/10206202211187645.gif,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg,https://99px.ru/sstorage/1/2020/06/10206201343131258.gif,https://99px.ru/sstorage/17/2013/10/52566ecc5fa25.jpg";

	$img_links = explode(",", $l);
	$r = rand(0, count($img_links));

	$avatar = $img_links[$r];
?>