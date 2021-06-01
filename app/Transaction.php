<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "day" , "amount" , "description" , "pdf", "account_id"    
    ];
        
    public function user() {
        return $this->belongsTo(User::class);    
    }  
    
    public function account() {
        return $this->belongsTo(Account::class);    
    }
    
    public function getPdfPresignedUrl() {
        $s3 = new Aws\S3\S3Client([
            'credentials' => [
            'key'    => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'), 
            ],
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION') 
        ]);

        $command = $s3->getCommand('GetObject', array(
            'Bucket' => env('AWS_BUCKET'), 
            'Key' => $this->pdf, 
        ));

        $request = $s3->createPresignedRequest($command, '+60 minutes'); 
        
        return $request->getUrl();
    
    }
}
    