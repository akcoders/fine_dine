<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

abstract class BaseAdminController extends BaseController
{
    protected function render(string $view, array $data = []): string
    {
        return view('admin/' . $view, array_merge([
            'adminUser' => session()->get('adminUser'),
            'flashError' => session()->getFlashdata('error'),
            'flashSuccess' => session()->getFlashdata('success'),
        ], $data));
    }

    protected function uploadImage(string $field, string $directory, ?string $currentPath = null): ?string
    {
        $file = $this->request->getFile($field);

        if (! $file || ! $file->isValid() || $file->hasMoved()) {
            return $currentPath;
        }

        $targetDir = FCPATH . 'uploads/' . trim($directory, '/');

        if (! is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $newName = $file->getRandomName();
        $file->move($targetDir, $newName);

        return 'uploads/' . trim($directory, '/') . '/' . $newName;
    }

    protected function slugify(string $value): string
    {
        return url_title($value, '-', true);
    }

    protected function isChecked(string $field): int
    {
        return $this->request->getPost($field) ? 1 : 0;
    }

    protected function cleanPath(?string $path): ?string
    {
        if ($path === null) {
            return null;
        }

        $path = trim($path);

        return $path === '' ? null : $path;
    }
}
