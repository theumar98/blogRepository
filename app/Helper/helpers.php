<?php

declare(strict_types=1);

function returnResponse(int $status, array $data, string $msg): object|array
{
    return response()->json([ 'status' => $status, 'result' => $data, 'message' => $msg ]);
}

function stringLower(string $str)
{
    return strtolower(strtoupper(trim($str)));
}

function stringUpper(string $str)
{
    return strtoupper(trim($str));
}

function add(int|float  $x, int|float $y): int|float
{
    return $x + $y;
}
