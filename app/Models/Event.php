<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{
    use HasFactory;
    protected $table = 'calendar';

    public function select($arr){
        $query = "
                    SELECT
                        id,title,start,end
                    FROM
                        calendar
                    WHERE
                        start >= '".$arr['start']."'
                        AND end <= '".$arr['end']."'
                        AND switch = 'Y'
                ";
        $res = DB::select($query);
        return $res;
    }

    public function cus_insert($arr){
        $res = DB::insert('insert into calendar (title, start, end, switch) values (?, ?, ?, ?)', [$arr['title'], $arr['start'], $arr['end'],'Y']);
        return $res;
    }

    public function cus_update($arr){
        $query = "
                    UPDATE
                        calendar
                    SET
                        title = '".$arr['title']."',
                        start = '".$arr['start']."',
                        end = '".$arr['end']."',
                        switch = 'Y'
                    WHERE
                        id = '".$arr['id']."'
                ";
        $res = DB::update($query);
        return $res;
    }

    public function cus_delete($arr){
        $query = "
                    UPDATE
                        calendar
                    SET
                        switch = 'N'
                    WHERE
                        id = '".$arr['id']."'
                ";
        $res = DB::update($query);
        return $res;
    }
}
