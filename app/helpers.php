<?php

namespace App;

use App\Models\Tags;

class CustomHelpers
{

    static function addTagIfNotExist($tags)
    {
        $arr = [];
        foreach ($tags as $value) {
            $tag = Tags::firstOrCreate(['name' => $value]);
            $arr[] = $tag->id;
        }

        return \json_encode($arr);
    }


    static function getTagsName($tags)
    {
        $arr = [];
        foreach ($tags as $value) {
            $tag = Tags::where(['id' => $value])->first();
            $arr[] = $tag->name;
        }
        return $arr;
    }
}
