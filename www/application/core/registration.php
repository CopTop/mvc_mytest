<?
include "connect.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PC Shop - Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css" >
    </head>
    
    <body>

        <div id="conteiner"> 
            
            <div id="top"> 
				<div id="top-inner">
					<h1>Robo shop</h1>
					<div id="top-login">
						<form action="" method="POST" name="form1">
						 <table>
                     
                        <tr> 
                            <td> Логин:</td>
                            <td><input type="text" name="login" value=""> </td>
                        </tr>  
                        <tr> 
                            <td> Пароль:</td>
                            <td><input type="password" name="password" value=""> </td>
                        </tr> 
                        <tr> 
                            <td> <a href="index.html">Регистрация</a></td>
                            <td><input type="submit" name="submit" value="Войти"> </td>
                        </tr>
                      
                        
                    </table>     
                                                    <?
                                                    include "aut.php";
                                                    ?>
                                                     
                                        
                                        
						</form>						
					</div>
				</div>
            </div>
            <div id="menu">
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
            <?
            include "content.php";
            ?>
                        <form  method="POST" name="registration">
			<table>
                     
                        <tr> 
                            <td> Login:</td>
                            <td><input type="text" name="login" value="" autofocus required> </td>
                        </tr>  
                        <tr> 
                            <td> Password:</td>
                            <td><input type="password" name="password" value="" autofocus required> </td>
                        </tr> 
                        <tr> 
                            <td> Email:</td>
                            <td><input type="email" name="email" value="" required pattern="\S+@[a-z]+.[a-z]+" > </td>
                        </tr> 
                        <tr> 
                            <td> Phone:</td>
                            <td><input type="text" name="phone" value="" placeholder="+3 (xxx) xxx-xxxx"> </td>
                        </tr> 
                        <tr> 
                            <td> Name:</td>
                            <td><input type="text" name="name" value=""> </td>
                        </tr> 
                        <tr> 
                            <td> </td>
                            <td><input type="submit" name="reg" value="Зарегистрироваться"> </td>
                        </tr>
                      <? if(isset ($_POST['reg'])){
						   $err =array();
						   #check login preg_match -- Выполняет проверку на соответствие регулярному выражению
						   if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
						   {
							   $err[] = "Логин может состоять только из букв английского алфавита и цифр";
						   }
						    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

							{

								$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";

							}
							#Экранирует специальные символы в строке, используемой в SQL-запросе, принмимая во внимание кодировку соединения.
							# проверяем, не сущестует ли пользователя с таким именем
							 $query = mysql_query("SELECT COUNT(id) FROM users WHERE login='".mysql_real_escape_string($_POST['login'])."'");

							if(mysql_result($query, 0) > 0)

								{
								$err[] = "Пользователь с таким логином уже существует в базе данных";

								}
							$query2 = mysql_query("SELECT COUNT(email) from users where email='".mysql_real_escape_string($_POST['email'])."'");
								if(mysql_result($query2, 0) > 0)

								{
								$err[] = "Пользователь с таким Email уже существует в базе данных";

								}							
								# Если нет ошибок, то добавляем в БД нового пользователя
							if(count($err) == 0)
							{
							
							
							$login = $_POST['login'];
							$password = md5(md5(trim($_POST['password'])));
							$email=trim($_POST['email']);
							$phone=trim($_POST['phone']);
							$name=trim($_POST['name']);
							mysql_query("UPDATE users SET login='$login', password='$password', email='$email' , phone='$phone', name='$name', id_role=4");

							header("Location: index.php"); exit();

							}

							else

							{

							echo "<b>Ошибка:</b><br>";

						foreach($err AS $error)

								{

							echo $error."<br>";

								}

							}

						}
						   ?>
                       
                    </table>     
    		</form>	   
                    
			
            </div>
            
            
			<div id="ads"> 
            
            </div>
            <div id="footer">





                <div class="col-md-6 col-sm-6">
                    <div class="social-icons" align="left">
                        <ul>
                            <li>
                                <a href="mailto:hello@ergoserv.com" title="coptop42@gmail.com" target="_blank" class="social-media-icon mail-icon">coptop42@gmail.com

                                    <img src="/images/social-media/social-media-mail">

                                </a>
                            </li>
                            <li>
                                <a href="skype:pro100zotovk?chat" title="skype" target="_blank" class="social-media-icon skype-icon"></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/CopTop42" title="@coptop42" target="_blank" class="social-media-icon twitter-icon"></a>
                            </li>
                            <li>
                                <a href="http://plus.google.com/113835785952167399745" title="+Cop Top" target="_blank" class="social-media-icon googleplus-icon" rel="publisher">





                                </a>
                            </li>
                        </ul>
                    </div>
                </div>





			
            <p>Robo Shop 2015 ©</p>
			
           </div>
            
            
        
        
        
        
        
        </div>
    </body>
    
</html>