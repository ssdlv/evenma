<?php


namespace App\Services;


class EvenmaService
{
    public function encodeBase64($value)
    {
        $path = "files/events/$value";
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $data = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $data;
    }
}
