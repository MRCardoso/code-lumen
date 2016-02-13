<?php namespace CodeAgenda\Providers;

use CodeAgenda\Entities\Person;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->share(['letters' => $this->getLetters()]);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function getLetters()
    {
        $letter = [];
        foreach (Person::all() as $person) {
            $letter[] = strtoupper(substr($person->nickname,0,1));
        }
        sort($letter);

        return array_unique($letter);
    }
}
