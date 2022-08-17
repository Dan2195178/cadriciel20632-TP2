<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareFile extends Model
{
    use HasFactory;
    protected $fillable = ['title','date', 'user_id', 'file_url', 'file_extension'];

    public $timestamps = false;
    
    public function getFile($id){
        $query = ShareFile::Select()
        ->JOIN('users', 'share_files.user_id', '=', 'users.id')
        ->where('share_files.id',$id)
        ->get();
        return $query;

    }
}
