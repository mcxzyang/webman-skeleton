<?php

namespace support;

use Illuminate\Validation\ValidationException;
use Tinywan\ExceptionHandler\Handler;
use Webman\Http\Request;
use Webman\Http\Response;
use Throwable;

class ErrorHandler extends Handler
{
    /**
     * @inheritDoc
     */
    protected function solveExtraException(\Throwable $e): void
    {
        // 当前项目下的异常扩展
        if ($e instanceof ValidationException) {
            $this->errorMessage = $e->validator->errors()->first();
            $this->errorCode = 422;
            return;
        }

        parent::solveExtraException($e);
    }

    /**
     * @inheritDoc
     */
    protected function triggerNotifyEvent(\Throwable $e): void
    {
        // ... 这里省略触发其他错误推送渠道

        parent::triggerNotifyEvent($e);
    }

    /**
     * @inheritDoc
     */
    protected function buildResponse(): Response
    {
        // 构造自己项目下的响应
        return apiError( $this->errorMessage, $this->statusCode,$this->responseData);
    }

    public function render(Request $request, Throwable $exception): Response
    {
        $this->config = array_merge($this->config, config('plugin.tinywan.exception-handler.app.exception_handler', []) ?? []);

//        $this->addRequestInfoToResponse($request);
        $this->solveAllException($exception);
        $this->addDebugInfoToResponse($exception);
        $this->triggerNotifyEvent($exception);
        $this->triggerTraceEvent($exception);

        return $this->buildResponse();
    }
}
