<?php

namespace App\Http\Controllers;

use Throwable;
use App\Services\MoodleService\Facades\Moodle;
use App\Http\Controllers\Controller as BaseController;

class MoodleController extends BaseController
{
    public function users ()
    {
        try {
            return view('moodle.users', [
                'users' => Moodle::getUsers()
            ]);
        } catch (Throwable $e) {
            return view('moodle.users', [
                'error' => $e
            ]);
        }
    }

    public function courses ()
    {
        try {
            return view('moodle.courses', [
                'courses' => Moodle::getCourses()
            ]);
        } catch (Throwable $e) {
            return view('moodle.courses', [
                'error' => $e
            ]);
        }
    }

    public function grades ()
    {
        try {
            return view('moodle.grades', [
                'grades' => Moodle::getGrades()
            ]);
        } catch (Throwable $e) {
            return view('moodle.grades', [
                'error' => $e
            ]);
        }
    }
}