#!/usr/bin/php
<?php

	$db_account	= "update" ;
	$db_password	= "QAZXSWEDCVFR" ;
	$db_name_list	= array(
				"sbd_",
				"sbdj_",
				"sbdjn_",
				"trial_",
				"trialj_",
				"trial3_",
				"trial4_",
				"cloud_",
				"sbdso_"
				);

	$sql_path       = "/var/lib/mysql" ;
        $sql_file_format= "sql" ;


echo "\n\n========== MysqlUpdate ===========\n\n" ;



echo "********** DataBase Auto Export Start **********\n" ;

	if(is_array($db_name_list) && count($db_name_list) > 0){
		foreach($db_name_list as $lk => $lv){
			if($lv == null){
				continue;
			}
			//echo "lk : ".$lk.", lv : ".$lv."\n"; exit ;

			// 取得 Database 清單列表
			$arr = null;
                        exec( "ls ".$sql_path." | grep ".$lv, $arr );
                        //print_r( $arr ) ; exit ;

			if(is_array($arr) && count($arr) > 0){
                                foreach($arr as $ak => $av){
                                        if($av == null){
                                        	continue;
                                        }
					//echo "ak : ".$ak.", av : ".$av."\n"; exit ;
					
					$file_path = dirname(__FILE__)."/".$av.".".$sql_file_format ;
                                        $command = "mysqldump -u ".$db_account." -p'".$db_password."' -B ".$av." > ".$file_path ;
					//echo "command : ".$command."\n";
                                        echo "mysqldump[".$ak."]\t:\t".$av."\t is ok !\n" ;
                                        system( $command ) ;
                                }
                        }
		}
	}

echo "\n********** DataBase Auto Export End   **********\n\n\n" ;

?>
