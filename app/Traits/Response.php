<?php


namespace App\Traits;


trait Response
{
    public function responseWithToken($token)
    {
        return $this->success([
                'access_token' => 'bearer '. $token,
                'expire_in' => auth()->factory()->getTTL() * 60
            ]);
    }

    /**
     * @param null $data
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse |\Illuminate\Http\Response
     */
    public function success($data = null, $msg='')
    {
        return response()->json(
            [
                'code' => 'success',
                'message' => $msg,
                'data' => $data,
                'time' => time(),
            ]
        );
    }

    /**
     * @param null $data
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse |\Illuminate\Http\Response
     */
    public function fail($message,$data=[], $code = 500)
    {
        return response()->json(
            [
                'code' => 'error',
                'message' => $message,
                'data' => $data,
                'time' => time()
            ],$code);
    }

    public function toSuccess($msg = '',$ext=[])
    {
        return [
            'code' => 'success',
            'message' => $msg,
            'time' => time(),
        ];
    }

    public function toError($msg = '')
    {
        return [
            'code' => 'error',
            'message' => $msg,
            'time' => time(),
        ];
    }
}
