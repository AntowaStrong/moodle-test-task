<?php

namespace App\Services\MoodleService;

use Illuminate\Support\Facades\Http;
use App\Services\MoodleService\Exceptions\MoodleException;

class Moodle
{
    private $config = null;

    public function __construct ($config)
    {
        $this->config = $config; 
    }

    protected function api (string $function): array
    {
        $url = $this->config['url'];
        $apiKey = $this->config['apiKey'];

        if (empty(($apiKey))) {
            throw new MoodleException('Moodle api key not found. Please set moodle api key.');
        }

        // TODO: Caching...
    
        $response = Http::get(
            sprintf('%s%s%s',
                $url,
                substr($url, -1) === '/' ? '' : '/',
                'webservice/rest/server.php'
            ),
            [
                'wstoken' => $apiKey,
                'wsfunction' => $function,
                'moodlewsrestformat' => 'json'
            ]
        );
        
        $data = $response->json();

        if (isset($data['exception']) || isset($data['errorcode'])) {
            throw new MoodleException(sprintf('Moodle error: %s', $data['message']));
        }

        return $data;
    }

    public function getUsers (): array
    {
        return $this->api('local_testtask_users');
    }

    public function getCourses (): array
    {
        return $this->api('local_testtask_courses');
    }

    public function getGrades (): array
    {
        return $this->api('local_testtask_grades');
    }
}