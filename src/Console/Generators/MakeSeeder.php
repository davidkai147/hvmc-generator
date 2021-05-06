<?php

namespace HMVCTools\Console\Generators;

use Symfony\Component\Process\Process;


class MakeSeeder extends AbstractGenerator
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make:seed
    	{alias : The alias of the module}
    	{name : The class name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new seeder for the specified module.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Seeder';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../../../resources/stubs/databases/seeders/seeder.stub';
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle(): void
    {
        parent::handle();
        $process = Process::fromShellCommandline('composer du');
        $process->run();
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     * @return string
     */
    protected function getPath($name): string
    {
        return $this->modulePath() . 'database/seeders/' . str_replace('\\', '/', $name) . '.php';
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getClass(string $name): string
    {
        return $name;
    }
}