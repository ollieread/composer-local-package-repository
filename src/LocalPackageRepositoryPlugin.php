<?php
declare(strict_types=1);

namespace Smplphp\Composer\LocalPackages;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Json\JsonFile;
use Composer\Plugin\PluginInterface;

class LocalPackageRepositoryPlugin implements PluginInterface, EventSubscriberInterface
{
    /**
     * @var \Composer\Composer
     */
    private Composer $composer;

    /**
     * @var \Composer\IO\IOInterface
     */
    private IOInterface $io;

    private array $repositories = [];

    public function activate(Composer $composer, IOInterface $io): void
    {
        $this->composer = $composer;
        $this->io       = $io;
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            'init' => 'loadRepositoriesFromJson',
        ];
    }

    public function loadRepositoriesFromJson()
    {
        $composer = $this->composer;
        $io       = $this->io;

        $rootPath     = dirname(Factory::getComposerFile());
        $packagesPath = $rootPath . DIRECTORY_SEPARATOR . 'repositories.json';

        if (! is_file($packagesPath)) {
            $io->writeError('<info>No local repositories.json file found</info>');
        } else {
            $io->writeError('<info>Local repositories.json file found</info>');

            $packagesJson = file_get_contents($packagesPath);

            JsonFile::validateJsonSchema(
                $packagesPath,
                json_decode($packagesJson, false, 512, JSON_THROW_ON_ERROR),
                JsonFile::LAX_SCHEMA,
                __DIR__ . '/../resources/composer-repositories-schema.json'
            );

            $packages = json_decode($packagesJson, true, 512, JSON_THROW_ON_ERROR);

            $this->repositories = [];

            if (isset($packages['repositories'])) {
                $repositoryManager = $composer->getRepositoryManager();

                // Reverse the array so that their priority matches the order they're
                // defined in
                $repositories = array_reverse($packages['repositories']);

                $io->writeError('<info>Repositories found:</info> ' . count($repositories));

                foreach ($repositories as $name => $repositoryConfig) {

                    $repository = $repositoryManager->createRepository(
                        $repositoryConfig['type'] ?? 'path',
                        $repositoryConfig,
                        $name
                    );

                    $io->writeError('<info>Adding repository:</info> ' . $repository->getRepoName());
                    $this->repositories[] = $repository;
                    $repositoryManager->prependRepository($repository);

                    $io->writeError('Repository added successfully');
                }
            }
        }
    }
}