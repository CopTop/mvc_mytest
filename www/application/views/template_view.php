<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">




<html  xmlns="http://www.w3.org/1999/xhtml"  >

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <title>Robo shop</title>
</head>
<body>
<div id="wrapper">





    <div id="header">

        <div id="top">

            <div id="top-inner">

                <form action="" method="POST" name="formIni">
                    <td><input type="submit" name="lang" value="en"></td>
                    <td><input type="submit" name="lang" value="ru"></td>
                    <a href="cart.php" name="cart"  >
                        <img border="0" alt="" src="cart.png" width="30" >
                    </a>


                </form>

                <?

                if(isset($_POST['lang'])) {
                    $lang = $_POST['lang'];
                }


                if($lang != null) {
                    $langconst = parse_ini_file("settings_$lang.ini");
                } else {
                    $langconst = parse_ini_file("settings_en.ini");
                }


                ?>

                <h1>
                    <?
                    echo $langconst['name'];
                    ?>
                </h1>
                <div id="top-login">
                    <form action="" method="POST" name="form1">
                        <table>

                            <tr>
                                <td> <?php  echo $langconst['adm_l']?></td>
                                <td><input type="text" name="login" value=""> </td>
                            </tr>
                            <tr>
                                <td><?php  echo $langconst['adm_p']?></td>
                                <td><input type="password" name="password" value=""> </td>
                            </tr>
                            <tr>
                                <td> <a href="registration.php"><?php  echo $langconst['adm_reg']?></a></td>
                                <td><input type="submit" name="submit" value="<?php  echo $langconst['adm_enter']?>"></td>
                            </tr>

                        </table>
                        <?
                        include "aut.php";
                        ?>

                    </form>
                </div>
            </div>






        </div>












    <div id="page">





        <div id="menu">


            <div id="sidebar">

                <div class="side-box">
                    <h3>Main menu</h3>
                    <ul class="list">
                        <li class="first "><a href="/">Главная</a></li>
                        <li><a href="/services">Услуги</a></li>
                        <li><a href="/portfolio">Портфолио</a></li>
                        <li class="last"><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </div>




            <ul id="main-menu">
                <?
                $query="select * from categories";
                $result= mysql_query($query);
                $x=0;

                while($x < mysql_num_rows($result)){
                    $name=mysql_result($result,$x,'name');
                    $id=mysql_result($result,$x,'id');
                    echo "<a href=index.php?id_cat=$id><li>$name</li></a>";
                    $x++;
                }


                ?>
            </ul>



        </div>




        <div id="content">
            <div class="box">
                <?php include 'application/views/'.$content_view; ?>

            </div>
            <br class="clearfix" />
        </div>
        <br class="clearfix" />
    </div>
    <div id="page-bottom">


        <br class="clearfix" />
    </div>
</div>
<div id="footer">
    <a href="/">Robo shop</a> &copy; 2015</a>
</div>
</body>
</html>