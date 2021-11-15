#!/usr/bin/php
<?php

        $db_account     = "root" ;
        $db_password    = "1234567890" ;
        $db_name_list   = array(
                                "sbd_"
                                );

        $sql_file_format= "sql" ;


echo "********** DataBase Auto Import Start **********\n" ;

	$local_path = dirname(__FILE__) ;
        //echo "local path : ".$local_path."\n";

        if(is_array($db_name_list) && count($db_name_list) > 0){
                foreach($db_name_list as $lk => $lv){
                        if($lv == null){
                                continue;
                        }
                        //echo "lk : ".$lk.", lv : ".$lv."\n"; exit ;

                        // 取得 Database 清單列表
                        unset($arr);
			$command = "ls ".$local_path." | grep ".$lv." | grep ".$sql_file_format ;
			//echo "command : ".$command."\n";
                        exec( $command, $arr );
                        //print_r( $arr ) ; exit ;

                        if(is_array($arr) && count($arr) > 0){
                                foreach($arr as $ak => $av){
                                        if($av == null){
                                                continue;
                                        }
                                        //echo "ak : ".$ak.", av : ".$av."\n"; exit ;

                                        $file_path = $local_path."/".$av ;
                                        //echo "file_path : ".$file_path."\n";
                                        $command = "mysql -u ".$db_account." -p'".$db_password."' < ".$file_path ;
                                        //echo "command : ".$command."\n" ;
                                        //echo "mysqldump[".$ak."]\t:\t".$av."\t is ok !\n" ;
                                        system( $command ) ;
                                }
                        }
                }
        }

echo "\n********** DataBase Auto Import End   **********\n\n\n" ;

?>
