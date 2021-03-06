<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\DbConnection\Db;
class IndexController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();
        Db::connection('default')->select('SELECT * FROM hf_user;');
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
