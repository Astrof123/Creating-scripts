<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {

    public function __construct() {

    }

    public function index() {
        return view('form');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'passport' => 'required',
            'president' => 'required',
            'privacy' => 'accepted'
        ]);

        $dataDir = storage_path('ourform');
        if (!file_exists($dataDir)) {
            mkdir($dataDir, 0777, true);
        }

        $name = $request->only([
            'name',
            'email',
            'phone',
            'passport',
            'president',
            'privacy'
        ]);

        $filename = $dataDir . '\\' . date('Ymd-His') . '-' . uniqid() . '.txt';

        $contents = [
            'ФИО' => $name['name'],
            'Почта' => $name['email'],
            'Телефон' => $name['phone'],
            'Паспортные данные' => $name['passport'],
            'Голос за' => $name['president'],
            'Подпись' => $name['privacy'],
        ];

        $json = json_encode($contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        file_put_contents($filename, $json);

        return back()->with('status', 'Данные успешно сохранены!');
    } 

    public function table() {
        $allFiles = [];
        $directory = storage_path('ourform');

        foreach (glob("$directory/*.txt") as $filename) {
            $jsonData = file_get_contents($filename);
            $data = json_decode($jsonData, true);
            $allFiles[] = $data;
        }

        return view("table", ["allFiles" => $allFiles]);
    }
}
