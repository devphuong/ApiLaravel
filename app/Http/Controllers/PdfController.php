<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PdfController extends Controller
{
    public function download(Request $request, $file)
    {
        $path = storage_path("app/public/pdf/{$file}");

        if (!file_exists($path)) {
            abort(404);
        }

        $fileSize = filesize($path);
        $fileName = basename($path);
        $mimeType = mime_content_type($path);

        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Content-Length' => $fileSize,
            'Accept-Ranges' => 'bytes',
        ];

        $range = $request->header('Range');

        if ($range) {
            $ranges = explode('=', $range)[1];
            $start = explode('-', $ranges)[0];
            $end = $fileSize - 1;

            if (!empty(explode('-', $ranges)[1])) {
                $end = intval(explode('-', $ranges)[1]);
            }

            $end = min($end, $fileSize - 1);
            $start = intval($start);

            $response = new StreamedResponse(function () use ($path, $start, $end) {
                $handle = fopen($path, 'rb');
                fseek($handle, $start);
                $chunkSize = 8192;

                while (!feof($handle) && ftell($handle) <= $end) {
                    echo fread($handle, $chunkSize);
                }

                fclose($handle);
            });

            $response->headers->add([
                'Content-Range' => "bytes {$start}-{$end}/{$fileSize}",
            ]);

            return $response->setStatusCode(206);
        } else {
            return response()->download($path, $fileName, $headers);
        }
    }
}
