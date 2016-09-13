<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $fillable =[
        'title','body','published_at', 'user_id'
    ];

    /* create the carbon instance of published_at so that we can use all the property accesser
     * like we do with created_at & updated_at columns*/
    protected $dates = ['published_at'];

    //setColumnNameAttribute  //aggregaters
    public function setPublishedAtAttribute($date){
        // below line add the current timestamp in record
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);

        //below line too add the current ttimestamp in record but time is 00:00:00(midnight)
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date){
        //return new Carbon($date);
        return Carbon::parse($date)->format('Y-m-d');
    }


    //queryScope
    //convention: scopeName
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    //queryScope
    //convention: scopeName
    public function scopeUnpublished($query){
        $query->where('published_at', '>', Carbon::now());
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListsAttribute(){
        //dd($this->tags->lists('id'));
        return $this->tags->pluck('id')->all();
    }

    public function isPublished(){
        return time() >= strtotime($this->published_at);
    }
}
