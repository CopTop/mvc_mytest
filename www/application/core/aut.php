<?
                                        if(isset($_POST['submit']))
                                        {
                                      if(isset($_POST['login'])&& isset($_POST['password'])){
                                        
                                          
                                        $login=$_POST['login'];
                                        $password=md5(md5($_POST['password']));
                                        $query = "select * from users where (login='$login') and (password='$password')";
                                        $res=mysql_query($query);
                                        $count=mysql_num_rows($res);
                                           
                                        
                                        if($count>0){
                                              echo "Hi $login";  
                                         
                                        }
                                        else
                                            echo"<meta http-equiv='refresh' content='0; url=registration.php'>";
                                        
                                        
                                        
                                      } 
                                    
                                       }
                                    ?>