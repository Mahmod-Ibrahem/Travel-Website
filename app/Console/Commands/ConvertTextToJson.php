<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class ConvertTextToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-text-to-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $blogs = Blog::all();
        foreach ($blogs as $blog)
        {
            $blog->title=json_encode([
                "en"=>$blog->title
            ],JSON_UNESCAPED_UNICODE);
            $blog->save();
        }
    $this->info('completed');
    }
}
