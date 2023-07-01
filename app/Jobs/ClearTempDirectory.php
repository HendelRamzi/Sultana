<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\UnauthorizedException;
use Nette\IOException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class ClearTempDirectory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        try{

            $tempDirectory  = storage_path('app/temp');
            if(\File::isDirectory($tempDirectory)){
                $directories = \File::directories($tempDirectory);
    
                foreach($directories as $directory){
                    \File::deleteDirectory($directory); 
                }
    
            }

        }catch (FileNotFoundException $e) {
            \Log::error($e->getMessage());
        } catch (IOException $e) {
            // Handle I/O exception
            \Log::error($e->getMessage());
        } catch (UnauthorizedException $e) {
            // Handle unauthorized exception
            \Log::error($e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            \Log::error($e->getMessage());
        }



    }
}
